<?php

class ManagerGrupo {
    
    const TABLA = 'grupo';
    private $db;

    function __construct() {
        $this->db = new DataBase();
    }

    function add(Grupo $objeto) {
        return $this->db->insertParameters(self::TABLA, $objeto->get(), false);
    }
    
    function count($parametros = array()) {
        return $this->db->countParameters(self::TABLA, $parametros);
    }
    
    function delete($idGrupo) {
        return $this->db->deleteParameters(self::TABLA, array('idGrupo' => $idGrupo));
    }
    
    function getList() {
        $this->db->getCursorParameters(self::TABLA);
        return $this->getResultadoSelect();
    }
     private function getResultadoSelect() {
        $respuesta = array();
        while ($fila = $this->db->getRow()) {
            $objeto = new Grupo();
            $objeto->set($fila);
            $respuesta[] = $objeto;
        }
        return $respuesta;
    }
     function get($idGrupo) {
        $this->db->getCursorParameters(self::TABLA, '*', array('idGrupo' => $idGrupo));
        if ($fila = $this->db->getRow()) {
            $objeto = new Grupo();
            $objeto->set($fila);
            return $objeto;
        }
        return 0;
    }
    
    function update($grupo){
        return $this->db->updateParameters(self::TABLA, $grupo->get(), array('idGrupo' => $grupo->getIdGrupo()));
    }
    
    // devuelve todos los grupos que tengan ese campo.
    function getAllBy($campo){
        $this->db->getCursorParameters(self::TABLA, '*', $campo);
        while ($fila = $this->db->getRow()) {
            $objeto = new Grupo();
            $objeto->set($fila);
            $respuesta[] = $objeto;
        }
        return $respuesta;
    }
    
   
    
    
    
    /*
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

    function get($idgrupo) {
        $this->db->getCursorParameters(self::TABLA, '*', array('idgrupo' => $idgrupo));
        if ($fila = $this->db->getRow()) {
            $objeto = new Actividad();
            $objeto->set($fila);
            return $objeto;
        }
        return 0;
    }
    
*/
}