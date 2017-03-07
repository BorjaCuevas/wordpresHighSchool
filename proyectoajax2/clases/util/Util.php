<?php

class Util{
    
    static function encriptar($cadena, $coste = 10) {
        $opciones = array(
            'cost' => $coste
        );
        return password_hash($cadena, PASSWORD_DEFAULT, $opciones);
    }
    
    static function getTemplate($file){
         if (!file_exists($file)) {
            echo 'Error: ' . $file . '<br>';
            return '';
        }
        $contenido = file_get_contents($file);
        return $contenido;
    }
    
    static function verificarClave($claveSinEncriptar, $claveEncriptada){
        return password_verify($claveSinEncriptar, $claveEncriptada);
    }
    
    static function renderFile($file, array $data = array()) {
        if (!file_exists($file)) {
            echo 'Error: ' . $file . '<br>';
            return '';
        }
        $contenido = file_get_contents($file);
        return self::renderText($contenido, $data);
    }

    static function renderText($text, array $data = array()) {
        foreach ($data as $indice => $dato) {
            $text = str_replace('{' . $indice . '}', $dato, $text);
        }
        return $text;
    }
    
    function varDump($dato){
        return '<pre>' . var_export($dato, true) . '</pre>';
    }
    
}