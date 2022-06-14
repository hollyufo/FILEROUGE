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
            redirect('/login?errorlogin=1');
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
        $date = date("Y/m/d");
        $role = "user";
        // checking acces code 
        if($user->checkCode($_POST['code'])){
            $user->addUser($_POST['fullname'], $_POST['email'], password_hash($_POST['password'], PASSWORD_DEFAULT), $role, $date, $_POST['code']);
            redirect('/login?success=1');
        }else{
            redirect('/login?error=code');
        }
    }
}   