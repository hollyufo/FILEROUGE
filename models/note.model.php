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
    // add a note with 2 parameters
    public function addNote($notetitle, $notebody){
        // sql query
        $sql = "INSERT INTO notes (notename, notebody) VALUES ('$notetitle', '$notebody')";
        // getting the result as a associative array
        $result = $this->con->query($sql);
        // if there is a result
        if($result){
            // returning the data
            return true;
        }
    }
    // getting a single note from the data base
    public function getSingleNote($id){
        // sql query
        $sql = "SELECT * FROM notes WHERE noteid = $id";
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
    // updating a note 
    public function updateNote($id, $notetitle, $notebody){
        // sql query
        $sql = "UPDATE notes SET notename = '$notetitle', notebody = '$notebody' WHERE noteid = '$id'";
        // getting the result as a associative array
        $result = $this->con->query($sql);
        // if there is a result
        if($result){
            // returning the data
            return true;
        }
    }
}