<?php

class Router {

    private $rutas = array();

    function __construct() {
        $this->rutas['index'] = new Route('Model', 'View', 'Controller');
        // $this->rutas['ajax'] = new Route('Model', 'ViewAjax', 'ControllerAjax');
        $this->rutas['login'] = new Route('ModelLogin', 'ViewLogin', 'ControllerLogin');
        $this->rutas['actividad'] = new Route('ModelActividad', 'ViewActividad', 'ControllerActividad');
        $this->rutas['grupo'] = new Route('ModelGrupo', 'ViewGrupo', 'ControllerGrupo');
        $this->rutas['profesor'] = new Route('ModelProfesor','ViewProfesor','ControllerProfesor');
    }

    function getRoute($ruta) {
        if (!isset($this->rutas[$ruta])) {
            return $this->rutas['index'];
        }
        return $this->rutas[$ruta];
    }

}