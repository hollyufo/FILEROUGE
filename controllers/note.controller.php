<?php
// 
require "./_classes/controller.php";
require "./models/note.model.php";

// controller for the notes
class noteController extends controller{
    // getting data from model
    public function getNotes(){
        // getting the data from the model
        $model = new note();
        // getting the data
        $data = $model->getNotes();
        // returning the data with the view
        return $this->view("note", $data);
    }
    // deleting a note with 1 parameter
    public function deleteNote($id){
        // getting the data from the model
        $model = new note();
        // getting the data
        $data = $model->deleteNote($id);
        // redirecting to the notes page
        redirect("/notes");
    }
}