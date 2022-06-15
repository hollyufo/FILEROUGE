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
}