<?php

class Model {
    
    private $data = array();
    
    function getData(){
        return $this->data;
    }
    
    function setData($name, $value){
        $this->data[$name] = $value;
    }
    
    function getUsers($page) {
        /*$manager = new ManageUser();
        $total = $manager->count();
        $pc = new PageController($total, $page);
        return $manager->getPage($pc->getPage());*/
    }
}