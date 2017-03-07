<?php

class ViewGrupo extends View{
    
    function render(){
        return json_encode($this->getModel()->getData());
    }
    
    function showGroups(){
        return json_encode(Util::getTemplate('plantilla/agregargrupo.html'));
    }
    function showEdit(){
        return json_encode(Util::getTemplate('plantilla/newGrupo.html'));
    }
    function listaGrupos(){
        return json_encode(Util::getTemplate('plantilla/listarGrupo.html'));
    }
   
}