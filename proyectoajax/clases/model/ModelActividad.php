<?php

class ModelActividad extends Model{
    
    function doDelete($idActividad){
        $managera = new ManagerActividad();
        $r = $managera->delete($idActividad);
        return $r;
    }
    
     function doCreate($arrayactividad){
         $actividad = new Actividad();
         $manager = new ManagerActividad();
         
         $actividad->setNoId($arrayactividad);
         $r = $manager->add($actividad);
        return $r;
    }
    
     function doUpdate($actividad, $id){
        $manager = new ManagerActividad();
        
        $r = $manager->setActividad($actividad, $id);
        return $r;
    }
    
    function getAll($idProfesor){
        $manager = new ManagerActividad();
        $actividades = $manager->getAll($idProfesor);
        if(!$actividades){
            return '0';
        }
        foreach($actividades as $actividad){
            $imagen = base64_encode($actividad->getImagen());
            $actividad->setImagen($imagen);
            $salida[] = $actividad->get();
        }
        return $salida;
    }
    
    function getAllWP(){
        $manager = new ManagerActividad();
        $actividades = $manager->getAllWP();
        if(!$actividades){
            return '0';
        }
        foreach($actividades as $actividad){
            $imagen = base64_encode($actividad->getImagen());
            $actividad->setImagen($imagen);
            $salida[] = $actividad->get();
        }
        return $salida;
    }
    
    function get($idActividad){
        $manager = new ManagerActividad();
        $actividades = $manager->get($idActividad);
        if(!$actividades){
            return '0';
        }
        $imagen = base64_encode($actividades->getImagen());
        $actividades->setImagen($imagen);
        $salida = $actividades->get();
        return $salida;
    }
    
    function calendar($r){
        for($i =0; $i<count($r); $i++){
            $fecha = strtotime($r[$i]['fecha'] . $r[$i]['horaInicio']);
            if($fecha>0){
                $rdos[$i]['date'] = $fecha*1000;
                $rdos[$i]['title'] = $r[$i]['titulo'];
                $rdos[$i]['description'] = $r[$i]['descripcion'];
            }
            
        }
        return $rdos;
    }
}