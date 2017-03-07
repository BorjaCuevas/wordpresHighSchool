<?php

class ModelLogin extends Model{
    
    function doDelete($dni, $password){
        $manager = new ManagerProfesor();
        $resul = $manager->get($dni);
        if(Util::verificarClave($password, $resul->getPass())){
            $dniProfesor = $resul->getIdProfesor();
            $r = $manager->delete($dniProfesor);
            return $r;
        }
        return false;
    }
    
     function doLogin($dni, $password){
         $manager = new ManagerProfesor();
         $resul = $manager->get($dni);
         if(Util::verificarClave($password, $resul->getPass())){
             $resul = $resul->get();
             unset($resul['pass']);
             return $resul;
         } 
        return false;
    }
    
    function registraUsuario($nombre,$dni,$password,$password2,$departamento, $imagen){
        
        if($nombre == null || $dni == null || $password == null || $password2 == null || $departamento == null){
            return false;
        }else{
           if($password == $password2){
            $manager = new ManagerProfesor();
            $r = $manager->get($dni);
            if($r == 0){
                
                $profesor = new Profesor();
                $profesor->setNombre($nombre);
                
                $profesor->setRefColegio('refere');
                $profesor->setDni($dni);
                $profesor->setPass(Util::encriptar($password));
                $profesor->setDepartamento($departamento);
                $profesor->setTipo(2);
                $profesor->setImagen($imagen);
                
                $manager->add($profesor);
                return true;
            }else{
                return false;
            }
             }else{
                return false;
            }
        }
    }
}