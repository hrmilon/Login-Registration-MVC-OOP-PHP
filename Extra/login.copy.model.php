<?php

class LoginModel extends Database
{
    public function getUser($name, $password)
    { //this statement will return corrsponding password in hashed fashion
        //sql
        $statment = $this->connect()->prepare('SELECT * FROM users WHERE users_name = ? AND users_password = ?;');
        //execute
        $statment->execute(array($name, $password));
        //return as a array
        $user = $statment->fetchAll(PDO::FETCH_ASSOC);
        if ($statment == true) {
           session_start();
           $_SESSION['users_name'] = $user[0]["users_name"]; //call array value
           
        }


    }
}