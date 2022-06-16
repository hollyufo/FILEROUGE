<?php
require "_classes/model.php";

class admin extends Model{
    
    //getting al the projects from the data base
    public function getProjects(){
        // sql query
        $sql = "SELECT * FROM project";
        // getting the result as a associative array
        $result = $this->con->query($sql);
        // if there is a result
        if($result->rowCount() > 0){
            // getting the result as an associative array
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            // returning the data
            return $data;
        }
        
    }
    // creating a new project with 3 parameters
    public function createProject($projectname, $description, $img){
        // sql query
        $sql = "INSERT INTO project VALUES (NULL, '$projectname', '$description', '$img')";
        // getting the result as a associative array
        $result = $this->con->query($sql);
        // if there is a result
        if($result){
            // returning the data
            return true;
        }
        
    }
    // getting a single project from the data base
    public function getSingleProject($id){
        // sql query
        $sql = "SELECT * FROM project WHERE projectid = $id";
        // getting the result as a associative array
        $result = $this->con->query($sql);
        // if there is a result
        if($result->rowCount() > 0){
            // getting the result as an associative array
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            // returning the data
            return $data;
        }
        
    }
    // getting all the tasks from the data base
    public function getTasks($id){
        // sql query
        $sql = "SELECT * FROM task INNER JOIN users ON task.asignedto=users.userid WHERE task.project = '$id';";
        // getting the result as a associative array
        $result = $this->con->query($sql);
        // if there is a result
        if($result->rowCount() > 0){
            // getting the result as an associative array
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            // returning the data
            return $data;
        }
        
    }
    // creating a new task with 4 parameters
    public function createTask($description , $status , $asignedto , $startdate , $enddate , $project , $taskname){
        // sql query
        //$sql = "INSERT INTO task VALUES (NULL, '$description', '$status' ,'$asignedto' , '$startdate' , '$enddate' , '$project' ,'$taskname')";
        $sql = "INSERT INTO `task`(`taskid`, `explanation`, `Status`, `asignedto`, `startdate`, `enddate`, `project`, `taskname`) VALUES (NULL,'$description','$status','$asignedto','$startdate','$enddate','$project','$taskname');";
        // getting the result as a associative array
        var_dump($_POST);
        $result = $this->con->query($sql);
        // if there is a result
        if($result){
            // returning the data
            return true;
        }
        
    }
    // getting all the users from db and returning them as an associative array
    public function getUsers(){
        // sql query
        $sql = "SELECT * FROM users";
        // getting the result as a associative array
        $result = $this->con->query($sql);
        // if there is a result
        if($result->rowCount() > 0){
            // getting the result as an associative array
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            // returning the data
            return $data;
        }
        
    }
    // updating task status as finished
    public function updateTask($id){
        // sql query
        $sql = "UPDATE task SET status = 'Done' WHERE taskid = $id";
        // getting the result as a associative array
        $result = $this->con->query($sql);
        // if there is a result
        if($result){
            // returning the data
            return true;
        }
        
    }
}