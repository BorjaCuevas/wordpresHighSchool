<?php

class ModelProfesor extends Model{
    
     function getProfesor($idProfesor){
        $manager = new ManagerProfesor();
        $datos = $manager->getAll($idProfesor);
        // var_dump($datos);
        foreach($datos as $actividad){
            $imagen = base64_encode($actividad->getImagen());
            $actividad->setImagen($imagen);
            $salida[] = $actividad->get();
           
        }
        return $salida;
    }
    function getAllProfesor(){
        $manager = new ManagerProfesor();
        $datos = $manager->getList();
          foreach($datos as $profesor){
            $imagen = base64_encode($profesor->getImagen());
            $profesor->setImagen($imagen);
            $salida[] = $profesor->get();
           
        }
        return $salida;
    }
    
    function setTipo($id, $tipo){
        $manager = new ManagerProfesor();
        // echo $id.'................'.$tipo;
        $r = $manager->setTipo($id, $tipo);
        return $r;
    }
    
    function updateProfesor($aProfesor, $id){
        $manager = new ManagerProfesor();
        $r = $manager->setProfesor($aProfesor, $id);
        return $r;
    }
    
    //
    function doDelete($idProfesor){
        $managerp = new ManagerProfesor();
        $r = $managerp->delete($idProfesor);
        return $r;
    }
}