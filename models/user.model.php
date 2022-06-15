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
                $_SESSION['loggedin'] = true;
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
        $sql = "SELECT * FROM invitecode WHERE code = '$code'";
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
                $sql = "INSERT INTO users VALUES (NULL, '$fullname', '$email', '$password', '$dates' ,'$role', NULL)";
                $this->con->query($sql);
                return true;
            }
        
    }
}