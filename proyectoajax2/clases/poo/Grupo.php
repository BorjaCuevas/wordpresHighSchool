<?php

class Grupo{
    
    private $idGrupo, $curso , $aula;
    
    function __construct($idGrupo = null, $curso = null, $aula = null) {
        $this->idGrupo = $idGrupo;
        $this->curso = $curso;
        $this->aula = $aula;
    }
    
    function getIdGrupo() {
        return $this->idGrupo;
    }

    function getCurso() {
        return $this->curso;
    }

    function getAula() {
        return $this->aula;
    }

    function setIdGrupo($idGrupo) {
        $this->idGrupo = $idGrupo;
    }

    function setCurso($curso) {
        $this->curso = $curso;
    }

    function setAula($aula) {
        $this->aula = $aula;
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
        $this->idGrupo = $array[0 + $inicio];
        $this->curso = $array[1 + $inicio];
        $this->aula = $array[2 + $inicio];
    }
    
    function setNoId(array $array, $inicio = 0) {
        $this->curso = $array[0 + $inicio];
        $this->aula = $array[1 + $inicio];
    }

}
