<?php

class ControllerLogin extends ControllerProfesor{
    
    function index(){
        
    }
    
    function delete(){
        $r = $this->getModel()->doDelete(Request::read('email'), Request::read('password'));
        self::logout();
    }
    
    function login(){
        $r = $this->getModel()->doLogin(Request::read('email'), Request::read('password'));
        
        if(!$r){
            $this->getModel()->setData('login', 0);
            
        }else{
            $this->getSession('iesLubois')->setUser($r);
            
            //var_dump($this->getSession()->getUser());
            if($r['tipo'] === 1 ){
                //tipo uno reservados para profesores administradores
              $this->getModel()->setData('login', 1);
              $this->getModel()->setData('info', $r);
            }else if($r['tipo'] === 1 ){
                
            $this->getModel()->setData('login', 2);
            $this->getModel()->setData('info', $r);
            }
        }
        // if(!$r){
        //      $this->getModel()->setData('login', 0);
        // }if($r->getTipo() === "2"){
        //     $this->getSession('iesLubois')->setUser($r);
        //     $this->getModel()->setData('login', 1);
        //     $this->getModel()->setData('info', $r);
        // }
    }
    
    function logout(){
        if($this->getSession('iesLubois')->isLogged()){
            $this->getSession('iesLubois')->destroy();
            $this->getModel()->setData('logout', true);
        }else{
            $this->getModel()->setData('logout', false);
        }
    }
    
    function registro2(){
        
        $re = $this->getModel()->registraUsuario(Request::Read('nombre'),Request::Read('dni'),Request::Read('password'),Request::Read('password2'),Request::Read('departamento'));
        $this->getModel()->setData('registro', $re);
    }
    
   
   //registro con la foto del profesor 
    function registro(){
         //Convertimos la información de la imagen en binario para insertarla en la BBDD 
	    // $imagenBinaria = addslashes(file_get_contents($_FILES['subir-imagen']['tmp_name']));
	     //var_dump($_POST);
	     
	      $imagen_temporal = $_FILES['subir-imagen']['tmp_name'];
           
        // Tipo de archivo
        $tipo = $_FILES['subir-imagen']['type'];
           
        // Leemos el contenido del archivo temporal en binario.
        $fp = fopen($imagen_temporal, 'r+b');
        $data = fread($fp, filesize($imagen_temporal));
        fclose($fp);
                   
	     
         $re = $this->getModel()->registraUsuario($_POST['nombre'],$_POST['dni'],$_POST['password'],$_POST['password2'],$_POST['departamento'], $data);
         $this->getModel()->setData('registro', $re);
    }
   
}