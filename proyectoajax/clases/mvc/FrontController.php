<?php

class FrontController {

    private $controlador;
    private $modelo;
    private $vista;
    private $session;

    function __construct($nombreRuta = null) {
        $this->session = Session::getInstance('iesLubois');
        
        $nombreRuta = strtolower($nombreRuta);

        $router = new Router();
        $ruta = $router->getRoute($nombreRuta);

        $nombreModelo = $ruta->getModel();
        $nombreVista = $ruta->getView();
        $nombreControlador = $ruta->getController();

        $this->modelo = new $nombreModelo();
        $this->vista = new $nombreVista($this->modelo);
        $this->controlador = new $nombreControlador($this->modelo);
    }

    function doAction($accion = null) {
        $accion = strtolower($accion);
        // if($this->session->isLogged() || $accion == 'getactivitieswp' || $accion == 'getallprofesor' || $accion == 'login'){
            if (method_exists($this->controlador, $accion)) {
                    $this->controlador->$accion();
                
            } else {
                $this->controlador->index();
            }
        // }
        
    }
    
    function getOutput() {
        return $this->vista->render();
    }

}