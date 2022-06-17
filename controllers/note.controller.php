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
    // adding a note with 2 parameters
    public function addNote(){
        // getting the data from the model
        $model = new note();
        // getting the data
        $data = $model->addNote($_POST['notetitle'], $_POST['notebody']);
        // redirecting to the notes page
        redirect("/notes");
    }
    // getting a single note from the data base
    public function getSingleNote($id){
        $data = array (
            "id" => $id
        );
        // getting the data from the model
        $model = new note();
        // getting the data
        $data = $model->getSingleNote($data['id']);
        // returning the data with the view
        return $this->view("editnote", $data);
    }
    // updating a note
    public function updateNote(){
        // getting the data from the model
        $model = new note();
        // getting the data
        $data = $model->updateNote($_POST['noteid'], $_POST['notetitle'], $_POST['notebody']);
        // redirecting to the notes page
        redirect("/notes");
    }
}