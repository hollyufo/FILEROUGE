<?php
// 
require "./_classes/controller.php";
require "./models/code.model.php";

// controller for the admin
class codeController extends controller{
    // getting all the code snippets from the model
    public function getallcode(){
         // calling the modal to get the code
         $code = new code();
         $data['code'] = $code->getAllCode();
         // returning the data with the view
         return $this->view("code",$data);
 
    }
    // getting a single code snippet from the model
    public function singlecode($id){
        $data = array (
            "id" => $id
        );
        $id = $data['id'];
         // calling the modal to get the code
         $code = new code();
         $data = $code->getSingleCode($id);
         // returning the data with the view
         return $this->view("snippets",$data);
 
    }
    // adding a code snippet to the model
    public function addcode(){
        // getting the data from the form
        $title = $_POST['title'];
        $description = $_POST['description'];
        $code = $_POST['code'];
        // calling the modal to add the code
        $code = new code();
        $data = $code->addCode($_POST['title'], $_POST['description'], $_POST['code']);
        // redirecting to the code page
        redirect("/code");
    }
}