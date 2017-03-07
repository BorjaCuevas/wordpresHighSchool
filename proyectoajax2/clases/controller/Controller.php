<?php

class Controller {

    private $model, $sesion;
    
    function __construct(Model $model) {
        $this->model = $model;
        $this->sesion = Session::getInstance('iesLubois');
    }
    
    function getModel(){
        return $this->model;
    }
    
    function getSession(){
        return $this->sesion;
    }

    function index() {
        $this->getModel()->setData('pagina', 'index');
    }

}