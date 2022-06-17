<?php
require "_classes/model.php";

class code extends Model{
    // getting all the code snippets from the database
    public function getAllCode(){
        // sql query
        $sql = "SELECT * FROM code";
        // getting all the data as a associative array
        $result = $this->con->query($sql);
        // if there is a result
        if($result->rowCount() > 0){
            // getting the result as an associative array
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            // returning the data
            return $data;
        }
    }
    // getting a single code snippet from the database
    public function getSingleCode($id){
        // sql query
        $sql = "SELECT * FROM code WHERE codeid = $id";
        // getting all the data as a associative array
        $result = $this->con->query($sql);
        // if there is a result
        if($result->rowCount() > 0){
            // getting the result as an associative array
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            // returning the data
            return $data;
        }
    }
    // adding a code snippet to the database
    public function addCode($title, $description, $code){
        // sql query
        $sql = "INSERT INTO code VALUES (NULL , '$title', '$description', '$code')";
        // executing the query
        $result = $this->con->query($sql);
        // if there is a result
        if($result){
            // returning the data
            return $result;
        }
    }

}