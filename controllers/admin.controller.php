<?php
// 
require "./_classes/controller.php";
require "./models/admin.model.php";

// controller for the admin
class adminController extends controller{
    
    // admin dashboard
    public function dashboard(){
        return $this->view("dashboard");
    }
    
}