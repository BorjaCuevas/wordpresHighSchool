<?php

class ControllerActividad extends Controller{
    
    function index(){
        $view = new ViewActividad( $this->getModel() );
        
        $this->getModel()->setData( 'plantilla', $view->viewNewActivity());
    }
    
    function delete() {
        
        $this->getModel()->doDelete(Request::read('idActividad'));
        self::getActivities();
    }
    
    function create(){
        
        $imagen_temporal = $_FILES['imagen-actividad']['tmp_name'];
        
        if($imagen_temporal == "") {
            
            $r = $this->getModel()->doCreate(array($this->getSession()->getUser()['idProfesor'], /*Request::read('departamento')*/ 'Science', 
            Request::read('idgrupo'), Request::read('titulo'), Request::read('descripcion'), Request::read('fecha'), Request::read('lugar'), 
            Request::read('horaInicio'), Request::read('horaFinal'), ""));
            var_dump($r);
            if(!$r){
                $this->getModel()->setData('set', 0);
            }else{
                $this->getModel()->setData('info', $r);
            }
        }else{
            // Tipo de archivo
            $tipo = $_FILES['imagen-actividad']['type'];
           
            // Leemos el contenido del archivo temporal en binario.
            $fp = fopen($imagen_temporal, 'r+b');
            $imagendata = fread($fp, filesize($imagen_temporal));
            fclose($fp);
            
            $r = $this->getModel()->doCreate(array($this->getSession()->getUser()['idProfesor'], Request::read('departamento'), 
            Request::read('idgrupo'), Request::read('titulo'), Request::read('descripcion'), Request::read('fecha'), Request::read('lugar'), 
            Request::read('horaInicio'), Request::read('horaFinal'), $imagendata));
            var_dump($r);
             if(!$r){
                $this->getModel()->setData('set', 0);
            }else{
                $this->getModel()->setData('info', $r);
            }
         }
        
        
        if(!$r){
            $this->getModel()->setData('create', 0);
        }else{
            $this->getModel()->setData('create', 1);
            $this->getModel()->setData('info', $r);
        }
    }
    
    function getActivities(){
        $view = new ViewActividad($this->getModel());
        $r = $this->getModel()->getAll($this->getSession()->getUser()['idProfesor']);
        
        if(!$r){
            $this->getModel()->setData('get', 0);
            $this->getModel()->setData( 'plantilla', $view->noActivities());
        }else{
            $this->getModel()->setData('plantilla', $view->showActivities());
            $this->getModel()->setData('tipo', 'actividad');
            $this->getModel()->setData('info', $r);
        }
    }
    
    function joinActivityTemplate(){
        $view = new ViewActividad($this->getModel());
        $r = $this->getModel()->get(Request::read('idActividad'));
        if(!$r){
            $this->getModel()->setData('get', 0);
        }else{
            $this->getModel()->setData('plantilla', $view->viewNewActivity());
            $this->getModel()->setData('tipo', 'actividad');
            $this->getModel()->setData('info', array($r));
        }
    }
    
    function update(){
        $imagen_temporal = $_FILES['imagen-actividad']['tmp_name'];
        
        
        
        if($imagen_temporal == "") {
            
            $imagen = $this->getModel()->get(Request::read('idActividad'))['imagen'];
            
            $r = $this->getModel()->doUpdate(array('idGrupo' => Request::read('grupo'), 
            'titulo' => Request::read('titulo'), 'descripcion' => Request::read('descripcion'), 'fecha' => Request::read('fecha'), 
            'lugar' => Request::read('lugar'), 'horaInicio' => Request::read('horaInicio'), 'horaFinal' => Request::read('horaFinal'), 
            'imagen' => $imagen), array('idActividad' => Request::read('idActividad')));
            if(!$r){
                $this->getModel()->setData('set', 0);
            }else{
                $this->getModel()->setData('info', $r);
            }
        }else{
            // Tipo de archivo
            $tipo = $_FILES['imagen-actividad']['type'];
           
            // Leemos el contenido del archivo temporal en binario.
            $fp = fopen($imagen_temporal, 'r+b');
            $imagendata = fread($fp, filesize($imagen_temporal));
            fclose($fp);
            
            $r = $this->getModel()->doUpdate(array('idGrupo' => Request::read('grupo'), 
            'titulo' => Request::read('titulo'), 'descripcion' => Request::read('descripcion'), 'fecha' => Request::read('fecha'), 
            'lugar' => Request::read('lugar'), 'horaInicio' => Request::read('horaInicio'), 'horaFinal' => Request::read('horaFinal'), 
            'imagen' => $imagendata), array('idActividad' => Request::read('idActividad')));
            
             if(!$r){
                $this->getModel()->setData('set', 0);
            }else{
                $this->getModel()->setData('info', $r);
            }
         }
        
        
        if(!$r){
            $this->getModel()->setData('create', 0);
        }else{
            $this->getModel()->setData('create', 1);
            $this->getModel()->setData('info', $r);
        }
    }
    
    // mostrar una actividad
    function getActivity() {
        
        // obtener la actividad con el id
        $id = Request::read( 'idActividad' );
        $r = $this->getModel()->get($id);
        
        $view = new ViewActividad( $this->getModel() );
        $this->getModel()->setData( 'plantilla', $view->viewActivity() );
        $array[] = $r;
        $this->getModel()->setData('info', $array);
    }
    
    function getActivitiesWP(){
        $view = new ViewActividad($this->getModel());
        $r = $this->getModel()->getAllWP();
        
        if(!$r){
            $this->getModel()->setData('get', 0);
            $this->getModel()->setData( 'plantilla', $view->noActivities());
        }else{
            $this->getModel()->setData('plantilla', $view->showActivitiesWP());
            $dos = $this->getModel()->calendar($r);
            $view->saveJSON($dos);
            $this->getModel()->setData('tipo', 'actividad');
            $this->getModel()->setData('info', $r);
            $this->getModel()->setData('calendar', $dos);
        }
    }
}