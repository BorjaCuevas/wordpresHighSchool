<?php

class Profesor{
    
    private $idProfesor, $nombre, $refColegio, $departamento, $dni, $pass, $tipo, $imagen;
    
    function __construct($idProfesor = null, $nombre = null, $refColegio = null, $departamento = null, $dni = null, $pass = null, $tipo = null, $imagen = null) {
        $this->idProfesor = $idProfesor;
        $this->nombre = $nombre;
        $this->refColegio = $refColegio;
        $this->departamento = $departamento;
        $this->dni = $dni;
        $this->pass = $pass;
        $this->tipo = $tipo;
        $this->imagen = $imagen;
    }
    function getIdProfesor() {
        return $this->idProfesor;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getRefColegio() {
        return $this->refColegio;
    }

    function getDepartamento() {
        return $this->departamento;
    }

    function getDni() {
        return $this->dni;
    }

    function getPass() {
        return $this->pass;
    }

    function getTipo() {
        return $this->tipo;
    }
    
    function getImagen() {
        return $this->imagen;
    }

    function setIdProfesor($idProfesor) {
        $this->idProfesor = $idProfesor;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setRefColegio($refColegio) {
        $this->refColegio = $refColegio;
    }

    function setDepartamento($departamento) {
        $this->departamento = $departamento;
    }

    function setDni($dni) {
        $this->dni = $dni;
    }

    function setPass($pass) {
        $this->pass = $pass;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }
    
    function setImagen($imagen) {
        return $this->imagen = $imagen;
    }
    
     function json() {
        return json_encode($this->get());
    }
    
    function read(ObjectReader $reader = null){
        if($reader===null){
            $reader = 'Request';
        }
        foreach($this as $key => $valor) {
            $this->$key = $reader::read($key);
        }
    }
    
    function get(){
        $nuevoArray = array();
        foreach($this as $key => $valor) {
            $nuevoArray[$key] = $valor;
        }
        return $nuevoArray;
    }
    
    function set(array $array, $inicio = 0) {
        $this->idProfesor = $array[0 + $inicio];
        $this->nombre = $array[1 + $inicio];
        $this->refColegio = $array[2 + $inicio];
        $this->departamento = $array[3 + $inicio];
        $this->dni = $array[4 + $inicio];
        $this->pass = $array[5 + $inicio];
        $this->tipo = $array[6 + $inicio];
        $this->imagen = $array[7 + $inicio];
    }
    


}
