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
        // calling User method from the model
        $user = new user();
        $userdata = $user->verifyUser($_POST['email'], $_POST['password']);
        if($userdata){
            redirect('/dashboard');
        }else{
            redirect('/login?wrongcredantials=1');
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
    // getting all the invite codes from the model
    public function getAllInviteCodes(){
        $user = new user();
        $data['codes'] = $user->getAllInviteCode();
        return $this->view("codes", $data);
    }
    // displaying all the users from the model
    public function getAllUsers(){
        // checking the type of the user
        if ($_SESSION['userrole'] == 'superadmin') {
            $user = new user();
            // getting all the invite codes from the model
            $data['invitecodes']= $user->getAllInviteCode();
            $data['users'] = $user->getAllUsers();
            return $this->view("users", $data);
        }else{
            // retrun no acces view
            return $this->view("noaccess");
        }
    }
    // delete user
    public function deleteUser($id){
        $data = array (
            "id" => $id
        );
        $user = new user();
        $user->deleteUser($data['id']);
        redirect('/users');
    }
    // delete invite code
    public function deleteInvite($id){
        $data = array (
            "id" => $id
        );
        $user = new user();
        $user->deleteInviteCode($data['id']);
        redirect('/users');
    }
    // add invite code
    public function addInvite(){
        $user = new user();
        $user->addInviteCode($_POST['code'], $_POST['type']);
        redirect('/users');
    }
}   