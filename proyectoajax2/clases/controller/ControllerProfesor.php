

<?php

class ControllerProfesor extends Controller{
    
    
     function index(){
        $view = new ViewProfesor( $this->getModel() );
        if(!$view->showProfesor()){
            $this->getModel()->setData( 'plantilla', $view->noProfesor());
        }else{
            $this->getModel()->setData( 'plantilla', $view->showProfesor());
        }
    }
    
    // delete
    function delete() {
        $this->getModel()->doDelete(Request::read('idProfesor'));
        self::getAllProfesor();
    }
    
    function getProfesor(){
        $view = new ViewProfesor($this->getModel());
        $r = $this->getModel()->getProfesor($this->getSession()->getUser()['idProfesor']);
     
        if(!$r){
            $this->getModel()->setData('get', 0);
        }else{
            $this->getModel()->setData('plantilla', $view->editProfesor());
            // $this->getModel()->setData('tipo','prosefor');
            $this->getModel()->setData('info', $r);
        }
    }
    
    function getAllProfesor(){
        $view = new ViewProfesor($this->getModel());
        $r = $this->getModel()->getAllProfesor();
        if(!$r){
            $this->getModel()->setData('get', 0);
        }else{
            $this->getModel()->setData('plantilla', $view->showAllProfesor());
            $this->getModel()->setData('info', $r);
        }
    }
    
    // devuelve el nombre del profesor actual
    function getNombreProfesor() {
        // $profesor = new Profesor();
        $user = $this->getSession()->getUser();
        //echo Util::varDump($user);
        $profesor = $this->getModel()->getProfesor($user["idProfesor"]);
        // return $profesor->getNombre();
        $r = $this->getModel()->setData('profe', $profesor[0]["nombre"]);
        return json_encode($r);
    }
    
    function setTipoProfesor(){
        $id = Request::read('id');
        $tipo = Request::read('tipo');
        $this->getModel()->setTipo($id, $tipo);
        self::getAllProfesor();
    }
    
    function updateProfesor(){
        $imagen_temporal = $_FILES['subir-imagen']['tmp_name'];
        
        if($_FILES['subir-imagen']['tmp_name'] == "") {
            //solo dni y nombre
          // echo('copon');
          
          
             if($_POST['newpassword'] == ""){
               
                $r = $this->getModel()->updateProfesor($datos, array('idProfesor' => $_POST['idProfesor']));
                
                if(!$r){
                    $this->getModel()->setData('set', 0);
                }else{
                    $this->getModel()->setData('info', $r);
                }
             }else{
                 $password = Util::encriptar($_POST['newpassword']);
                 $datos = array( 'nombre' => $_POST['nombre'], 'dni' => $_POST['dni'], 'pass' => $password);
            
                 $r = $this->getModel()->updateProfesor($datos, array('idProfesor' => $_POST['idProfesor']));
                
                if(!$r){
                    $this->getModel()->setData('set', 0);
                }else{
                    $this->getModel()->setData('info', $r);
                }  
                    
                 }
        }else{
            //todos los datos
            // Tipo de archivo
            $tipo = $_FILES['subir-imagen']['type'];
           
            // Leemos el contenido del archivo temporal en binario.
            $fp = fopen($imagen_temporal, 'r+b');
            $imagendata = fread($fp, filesize($imagen_temporal));
            fclose($fp);
            
            
            if($_POST['newpassword'] == ""){
               $datos = array('nombre' => $_POST['nombre'], 'dni' => $_POST['dni'], 'imagen' => $imagendata);
                 $r = $this->getModel()->updateProfesor($datos, array('idProfesor' => $_POST['idProfesor']));
                
                if(!$r){
                    $this->getModel()->setData('set', 0);
                }else{
                    $this->getModel()->setData('info', $r);
                }
            }else{
                 
                $password = Util::encriptar($_POST['newpassword']);
                $datos = array('nombre' => $_POST['nombre'], 'dni' => $_POST['dni'], 'pass'=> $password, 'imagen' => $imagendata);
                $r = $this->getModel()->updateProfesor($datos, array('idProfesor' => $_POST['idProfesor']));
            
                $r = $this->getModel()->updateProfesor($datos, array('idProfesor' => $_POST['idProfesor']));
                
                if(!$r){
                    $this->getModel()->setData('set', 0);
                }else{
                    $this->getModel()->setData('info', $r);
                }  
                    
            }
            
           
            
             if(!$r){
                $this->getModel()->setData('set', 0);
            }else{
                $this->getModel()->setData('info', $r);
            }
         }
    }
}