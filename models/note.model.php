<?php
require "_classes/model.php";

// class for thr notes model
class note extends Model{
    // getting all the notes from the data base
    public function getNotes(){
        // sql query
        $sql = "SELECT * FROM notes";
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
    // deleting notes with 1 parameter
    public function deleteNote($id){
        // sql query
        $sql = "DELETE FROM notes WHERE noteid = '$id'";
        // getting the result as a associative array
        $result = $this->con->query($sql);
        // if there is a result
        if($result){
            // returning the data
            return true;
        }
    }
}