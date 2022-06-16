<?php
require "_classes/model.php";

class revenue extends Model{
    // getting all the revnue from the data base
    public function getRevnue(){
        // sql query
        $sql = "SELECT * FROM revenue INNER JOIN project ON revenue.project=project.projectid";
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
    // deleting a revenue with 1 parameter
    public function deleteRevnue($id){
        // sql query
        $sql = "DELETE FROM revenue WHERE revenueid = '$id'";
        // getting the result as a associative array
        $result = $this->con->query($sql);
        // if there is a result
        if($result){
            // returning the data
            return true;
        }
    }
    // getting a single revenue from the data base
    public function getSingleRevnue($id){
        // sql query
        $sql = "SELECT * FROM revenue INNER JOIN project ON revenue.project=project.projectid WHERE revenueid = $id";
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
    // getting all the projects from data base
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
    // model to update the revenue
    public function updateRevnue($id, $project, $personalrevenue, $datefopayment, $allrevenue){
        // sql query
        $sql = "UPDATE revenue SET project = '$project', personalrevenue = '$personalrevenue', datefopayment = '$datefopayment', allrevenue = '$allrevenue' WHERE revenueid = '$id'";
        // getting the result as a associative array
        $result = $this->con->query($sql);
        // if there is a result
        if($result){
            // returning the data
            return true;
        }
    }
}