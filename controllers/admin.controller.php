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
    // projects
    public function projects(){
        // using the model to get the projects
        $projects = new admin();
        $data = $projects->getProjects();
        // returning the view with the data
        return $this->view("projectsmain",$data);
    }
    
}