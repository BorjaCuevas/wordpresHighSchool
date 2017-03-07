<?php

class ManagerActividad {
    
    const TABLA = 'actividad';
    private $db;

    function __construct() {
        $this->db = new DataBase();
    }

    function add(Actividad $objeto) {
        return $this->db->insertParameters(self::TABLA, $objeto->get(), false);
    }
    
    function count($parametros = array()) {
        return $this->db->countParameters(self::TABLA, $parametros);
    }
    
    function delete($idActividad) {
        return $this->db->deleteParameters(self::TABLA, array('idActividad' => $idActividad));
    }
    
    function getList() {
        $this->db->getCursorParameters(self::TABLA);
        return $this->getResultadoSelect();
    }
     private function getResultadoSelect() {
        $respuesta = array();
        while ($fila = $this->db->getRow()) {
            $objeto = new Actividad();
            $objeto->set($fila);
            $respuesta[] = $objeto;
        }
        return $respuesta;
    }
    
    function get($idActividad) {
        $this->db->getCursorParameters(self::TABLA, '*', array('idActividad' => $idActividad));
        if ($fila = $this->db->getRow()) {
            $objeto = new Actividad();
            $objeto->set($fila);
            return $objeto;
        }
        return 0;
    }
    
    function getAll($idProfesor){
        $this->db->getCursorParameters(self::TABLA, '*', array('idProfesor' => $idProfesor));
        while ($fila = $this->db->getRow()) {
            $objeto = new Actividad();
            $objeto->set($fila);
            $respuesta[] = $objeto;
        }
        return $respuesta;
    }
    
    function getAllWP(){
        $this->db->getCursorParameters(self::TABLA, '*');
        while ($fila = $this->db->getRow()) {
            $objeto = new Actividad();
            $objeto->set($fila);
            $respuesta[] = $objeto;
        }
        return $respuesta;
    }
    
    function save(User $objeto, $correopk = null) {
        if($correopk === null) {
            $correopk = $objeto->getEmail();
        }
        $campos = $objeto->get();
        if($objeto->getPassword() === null || $objeto->getPassword() === ''){
            unset($campos['password']);
        }
        return $this->db->updateParameters(self::TABLA, $campos, array('email' => $correopk));
    }
    
    function setActividad($actividad, $id){
        
        $r = $this->db->updateParameters(self::TABLA, $actividad, $id);
        return $r;
    }
    
    /*

    
    
    function jsonList() {
        $this->db->getCursorParameters(self::TABLA);
        $respuesta = array();
        while ($fila = $this->db->getRow()) {
            $objeto = new Autor();
            $objeto->set($fila);
            $respuesta[] = $objeto->get();
        }
        return json_encode($respuesta);
    }
    
    function getPage($pagina = 1, $parametros = array(), $orderby = '1',  $rpp = 10) {
        $desde = ($pagina - 1) * $rpp;
        $limit = 'limit ' . $desde . ', ' . $rpp;
        $this->db->getCursorParameters(self::TABLA, '*', $parametros, $orderby, $limit);
        return $this->getResultadoSelect();
    }

    private function getResultadoSelect() {
        $respuesta = array();
        while ($fila = $this->db->getRow()) {
            $objeto = new User();
            $objeto->set($fila);
            $respuesta[] = $objeto;
        }
        return $respuesta;
    }

    function login(User $user){
        $userDB = $this->get($user->getEmail());
        return $userDB->getPassword() === $user->getPassword();
    }

    
*/
}