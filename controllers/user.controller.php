<?php
// 
require "./_classes/controller.php";
require "./models/user.model.php";


class userController extends controller{


    // returning the loginpage
    public function loginpage(){
        return $this->view("login");
    }
    // the function we were called from the route
    public function login(){
        // calling login method from the model
        $user = new user();
        $userdata = $user->verifyUser($_POST['email'], $_POST['password']);
        if($userdata){
            redirect('/dashboard');
        }else{
            redirect('/login?error=1');
        }
        //var_dump($_SESSION);
        //var_dump($userdata);
    }
    // login out
    public function logout(){
            session_destroy();
            redirect('./login');
    }
    // add user to the database
    public function addUser(){
        $user = new user();
        $user->addUser($_POST['username'], $_POST['email'], password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['role'], $_POST['matricule']);
        redirect('/admin');
    }
    // get all users
    public function getUsers(){
        $user = new user();
        $users = $user->getUsers();
        return Route::view("admin", $users);
        //return $users;
    }
    // delete user
    public function deleteUser($id){
        $user = new user();
        $data = array(
            "id" => $id
        );
        $user->deleteUser($data['id']);
        redirect('/admin');
    }
}   