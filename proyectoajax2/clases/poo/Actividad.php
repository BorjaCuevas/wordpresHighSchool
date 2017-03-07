<?php

class Actividad{
    
    private $idActividad, $idProfesor, $departamento, $idGrupo, $titulo, $descripcion, $fecha, $lugar, $horaInicio, $horaFinal, $imagen;
    function __construct($idActividad = null, $idProfesor  = null, $departamento  = null, $idGrupo  = null, $titulo  = null, $descripcion  = null, $fecha  = null, $lugar  = null, $horaInicio  = null, $horaFinal  = null, $imagen = null) {
        $this->idActividad = $idActividad;
        $this->idProfesor = $idProfesor;
        $this->departamento = $departamento;
        $this->idGrupo = $idGrupo;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->fecha = $fecha;
        $this->lugar = $lugar;
        $this->horaInicio = $horaInicio;
        $this->horaFinal = $horaFinal;
        $this->imagen = $imagen;
    }
    
    function getIdActividad() {
        return $this->idActividad;
    }

    function getIdProfesor() {
        return $this->idProfesor;
    }

    function getDepartamento() {
        return $this->departamento;
    }

    function getIdGrupo() {
        return $this->idGrupo;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getLugar() {
        return $this->lugar;
    }

    function getHoraInicio() {
        return $this->horaInicio;
    }

    function getHoraFinal() {
        return $this->horaFinal;
    }
     function getImagen() {
        return $this->imagen;
    }

    function setIdActividad($idActividad) {
        $this->idActividad = $idActividad;
    }

    function setIdProfesor($idProfesor) {
        $this->idProfesor = $idProfesor;
    }

    function setDepartamento($departamento) {
        $this->departamento = $departamento;
    }

    function setIdGrupo($idGrupo) {
        $this->idGrupo = $idGrupo;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setLugar($lugar) {
        $this->lugar = $lugar;
    }

    function setHoraInicio($horaInicio) {
        $this->horaInicio = $horaInicio;
    }

    function setHoraFinal($horaFinal) {
        $this->horaFinal = $horaFinal;
    }
    function setImagen($imagen) {
        $this->imagen = $imagen;
    }
    
    function get(){
        $nuevoArray = array();
        foreach($this as $key => $valor) {
            if($valor != null){
                $nuevoArray[$key] = $valor;
            }
        }
        return $nuevoArray;
    }
    
    function set(array $array, $inicio = 0) {
        $this->idActividad = $array[0 + $inicio];
        $this->idProfesor = $array[1 + $inicio];
        $this->departamento = $array[2 + $inicio];
        $this->idGrupo = $array[3 + $inicio];
        $this->titulo = $array[4 + $inicio];
        $this->descripcion = $array[5 + $inicio];
        $this->fecha = $array[6 + $inicio];
        $this->lugar = $array[7 + $inicio];
        $this->horaInicio = $array[8 + $inicio];
        $this->horaFinal = $array[9 + $inicio];
        $this->imagen = $array[10 + $inicio];
    }
    
    function setNoId(array $array, $inicio = 0) {
        $this->idProfesor = $array[0 + $inicio];
        $this->departamento = $array[1 + $inicio];
        $this->idGrupo = $array[2 + $inicio];
        $this->titulo = $array[3 + $inicio];
        $this->descripcion = $array[4 + $inicio];
        $this->fecha = $array[5 + $inicio];
        $this->lugar = $array[6 + $inicio];
        $this->horaInicio = $array[7 + $inicio];
        $this->horaFinal = $array[8 + $inicio];
        $this->imagen = $array[9 + $inicio];
    }
    
    
    
}