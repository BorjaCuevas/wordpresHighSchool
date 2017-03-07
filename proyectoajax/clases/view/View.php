<?php

class View {

    private $model,$sesion;
    
    function __construct(Model $model) {
        $this->model = $model;
        $this->sesion = Session::getInstance();
    }
    
    function getModel(){
        return $this->model;
    }
    
    function render() {
       
        $tipo = $this->sesion->getUser();
        if($this->sesion->isLogged()){
            
            if($tipo['tipo'] == '1'){
                return Util::renderFile('plantilla/bakendAdmin.html');
            }else{
               return Util::renderFile('plantilla/bakend.html'); 
            }
         
        }else{
            return Util::renderFile('plantilla/login.html');
            
        }
        
    }
    
}