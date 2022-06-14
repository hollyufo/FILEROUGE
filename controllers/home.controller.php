<?php

class homeController extends controller{
    
    // portfolio part

    // home page
    public function index(){
        return $this->view("index");
    }
    // project page 
    public function almajazer(){
        return $this->view("almajazer");
    }
    // vpv
    public function vpv(){
        return $this->view("vpv");
    }
    // shop-almajazer
    public function shop(){
        return $this->view("shop");
    }
}