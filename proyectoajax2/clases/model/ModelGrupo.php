<?php

class ModelGrupo extends Model{
    
    function doDelete($idGrupo){

        $manager = new ManagerGrupo();
        $r = $manager->delete($idGrupo);
        return $r;
    }
    
     function doCreate($arrayGrupo){
        $grupo = new Grupo();
        $manager = new ManagerGrupo();
        
        $grupo->setNoId($arrayGrupo);
        $r = $manager->add($grupo);
         
        return $r;
    }
    
     function doUpdate($arrayGrupo){
        $grupo = new Grupo();
        $manager = new ManagerGrupo();
        
        $grupo->set($arrayGrupo);
        
        $r = $manager->update($grupo);
        
        return $r;
    }
    
    // convierte el array de objetos en un array bidimensional
    function getAllBy($campo){
        $manager = new ManagerGrupo();
        $grupo = $manager->getAllBy($campo);
        foreach($grupo as $g){
            $resultado[] = $g->get();
        }
        return $resultado;
    }
    
    //
    function getGruposApelo() {
        
        $manager = new ManagerGrupo();
        $grupo = $manager->getList();
        foreach($grupo as $g){
            $resultado[] = $g->get();
        }
        return $resultado;
    }
    
      function get($idgrupo){
        $manager = new ManagerGrupo();
        $actividades = $manager->get($idgrupo);
        if(!$actividades){
            return '0';
        }
        $salida = $actividades->get();
        return $salida;
    }
}