<?php

class ViewProfesor extends View{
    
    function render(){
        return json_encode($this->getModel()->getData());
    }
    
     function showProfesor(){
        return json_encode(Util::getTemplate('plantilla/agregarProfesor.html'));
    }
    
    function showAllProfesor(){
        return json_encode(Util::getTemplate('plantilla/listProfesor.html'));
    }
    
    function noActivities(){
        return json_encode(Util::getTemplate('plantilla/noProfesor.html'));
    }
     function editProfesor(){
        return json_encode(Util::getTemplate('plantilla/editarusuario.html'));
    }
    
    // function showActivities(){
    //     return json_encode(Util::getTemplate('plantilla/listaProfesor.html'));
    // }
    
}