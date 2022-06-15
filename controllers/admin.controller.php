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
    // creating a new project
    public function newProject(){
        // using the model to get the projects
        // upload image
        // getting img
        $img = $_FILES['fileToUpload']['name'];
        $img_tmp = $_FILES['fileToUpload']['tmp_name'];
        $img_folder = "./views/assets/img/$img";
        // move the img to the folder
        move_uploaded_file($img_tmp, $img_folder);
        // inseting the project to the database
        $projects = new admin();
        $data = $projects->createProject($_POST['ProjectName'], $_POST['description'], $img);
        redirect('/projects');
    }
}