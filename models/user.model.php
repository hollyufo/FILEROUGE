<?php

require "_classes/model.php";
class user extends Model{

    public $tableName = "users";

    // verify user credentials
    public function verifyUser($useremail, $password){
        $sql = "SELECT * FROM users WHERE email = '$useremail'";
        $result = $this->con->query($sql);
        if($result->rowCount() > 0){
            $row = $result->fetch(PDO::FETCH_ASSOC);
            if(password_verify($password, $row['password'])){
                $_SESSION['useremail'] = $useremail;
                $_SESSION['userid'] = $row['userid'];
                $_SESSION['username'] = $row['FullName'];
                $_SESSION['userrole'] = $row['roll'];
                $_SESSION['userimage'] = $row['img'];
                $_SESSION['loggedin'] = true;
                $_SESSION['roll'] = $row['roll'];
                return true;
            }else{  
                return false;
            }
        }else{
            return false;
        }
    }
    // check access code
    public function checkCode($code){
        $sql = "SELECT * FROM invitecode WHERE invite = '$code'";
        $result = $this->con->query($sql);
        if($result->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
    // add user to the database
    public function addUser($fullname, $email, $password, $role, $dates, $code){
        
            // check if email already exists
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = $this->con->query($sql);
            if($result->rowCount() > 0){
                redirect('/login?emailexists=1');
            }else{
                $img = "user.jpg";
                $sql = "INSERT INTO users VALUES (NULL, '$fullname', '$email', '$password', '$dates' ,'$role', '$img')";
                $this->con->query($sql);
                return true;
            }
        
    }
    // getting all the users from db 
    public function getAllUsers(){
        $sql = "SELECT * FROM users";
        $result = $this->con->query($sql);
        if($result->rowCount() > 0){
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    }
    // deleting user from db
    public function deleteUser($userid){
        $sql = "DELETE FROM users WHERE userid = '$userid'";
        $this->con->query($sql);
        return true;
    }
    // getting all the invite code from db
    public function getAllInviteCode(){
        $sql = "SELECT * FROM invitecode";
        $result = $this->con->query($sql);
        if($result->rowCount() > 0){
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }else{
            return false;
        }
    }
    // delete invite code from db
    public function deleteInviteCode($code){
        $sql = "DELETE FROM invitecode WHERE inviteid = '$code'";
        $this->con->query($sql);
        return true;
    }
    // add invite code to db
    public function addInviteCode($invitecode, $type){
        $sql = "INSERT INTO invitecode VALUES (NULL, '$invitecode', '$type')";
        $this->con->query($sql);
        return true;
    }
}