<?php

class ViewActividad extends View{
    
    function render(){
        return json_encode($this->getModel()->getData());
    }
    
    
    function showActivities(){
        return json_encode(Util::getTemplate('plantilla/actividad.html'));
    }
    
    function noActivities(){
        return json_encode(Util::getTemplate('plantilla/noActivities.html'));
    }
    
    function viewNewActivity() {
        return json_encode(Util::getTemplate('plantilla/agregaractividad.html'));
    }
    
    // ver una sola actividad
    function viewActivity() {
        
        return json_encode( Util::getTemplate( 'plantilla/veractividad.html' ) );
    }
    
    function showActivitiesWP(){
        return json_encode(Util::getTemplate('plantilla/actividadWP.html'));
    }
}