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
                $_SESSION['username'] = $row['Fullname'];
                $_SESSION['loggedin'] = true;
                return true;
            }else{  
                return false;
            }
        }else{
            return false;
        }
    }
    // add user to the database
    public function addUser($fullname, $email, $password, $role, $matricule){
        // checking if code exists);

    }
}