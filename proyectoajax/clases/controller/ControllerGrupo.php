<?php

class ControllerGrupo extends Controller{
    
    function index(){
        $view = new ViewGrupo( $this->getModel() );
        $this->getModel()->setData( 'plantilla', $view->showGroups());
    }
    
    function abirUpdate(){
        $view = new ViewGrupo( $this->getModel() );
       // var_dump(Request::read('idgrupo'));
        $r = $this->getModel()->get(Request::read('idgrupo') );
        
        $this->getModel()->setData( 'plantilla', $view->showEdit());
        
        $array[] = $r;
         $this->getModel()->setData( 'info', $array );
        
    }
    
    // Borrar grupo
    function delete(){
        $this->getModel()->doDelete(Request::read('idGrupo') );
        
    }
    
    // crear grupo
    function create() {
        
        $r = $this->getModel()->doCreate( array( Request::read('curso'), Request::read('aula') ) );
        
        if( !$r ) {
            $this->getModel()->setData( 'create', 0 );
        } else {
            $this->getModel()->setData( 'create', 1 );
            $this->getModel()->setData( 'info', $r );
        }
    }
    
    // vista de los grupos
    function getGroups() {
        
        $view = new ViewGrupo( $this->getModel() );
        $r = $this->getModel()->getGruposApelo();
        
        if( !$r ) {
            $this->getModel()->setData( 'get', 0 );
        } else {
             $this->getModel()->setData( 'plantilla', $view->listaGrupos() );
            // $this->getModel()->setData( 'tipo', 'grupo' );
            $this->getModel()->setData( 'info', $r );
            
        }
    }
    
    // modificar grupo
    function update(){
        
        $r = $this->getModel()->doUpdate(array( Request::read('idgrupo'), Request::read('curso'), Request::read('aula') ));
        $this->getModel()->setData('info', $r);
    }
}