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
    // single project page
    public function singleProject($id){
        $data = array (
            "id" => $id
        );
        // using the model to get the projects
        $projects = new admin();
        $ide = $data['id'];
        // getting the project from the data base
        $data = $projects->getSingleProject($data['id']);
        // getting the task from db
        $tasks = $projects->getTasks($ide);
        // ading values to the data array
        $data['tasks'] = $tasks;
        // getting all the users from the data base
        $users = new admin();
        $data['users'] = $users->getUsers();
        // returning the view with the data
        return $this->view("projects", $data);
    }
    // creating a new task
    public function newTask(){
        // Creating a new task
        $projects = new admin();
        $data = $projects->createTask($_POST['explanation'], $_POST['status'], $_POST['asignedto'], $_POST['startdate'], $_POST['enddate'], $_POST['project'], $_POST['taskname']);
        redirect('/projects/'.$_POST['project']);

    }
    // updating task status as finihesd
    public function taskfinihed(){
        // updating the task
        $projects = new admin();
        $data = $projects->updateTask($_POST['taskid']);
        redirect('/projects/'.$_POST['projectid']);
    }
    // editing a task
    public function editTask($id){
        $data = array (
            "id" => $id
        );
        // getting the task from the data base
        $projects = new admin();
        $data['onetask'] = $projects->getSingleTask($data['id']);
        // sending all the users to the view
        $data['users'] = $projects->getUsers();
        // returning the view with the data
        return $this->view("edittask", $data);
    }

}   