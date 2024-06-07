<?php

class SignupModel extends Database
{
    protected function setUser($name, $password, $email)
    {
        $statment = $this->connect()->prepare('INSERT INTO users (users_name, users_password, users_email) VALUES (?, ?, ?);');
        $hashedPassword =  password_hash($password, PASSWORD_DEFAULT);
        //if failed the execution
        if (!$statment->execute(array($name, $hashedPassword, $email))) {
            $statment = null;
            header("location: ../index.php?error=statmentfailed");
            exit();
        }
        $statment = null;
    }


    //check user if exist request come from controller
    protected function checkUser($name, $email)
    {
        $statment = $this->connect()->prepare('SELECT users_name, users_email FROM users WHERE users_name = ? OR users_email = ?;');
        //if failed the execution
        if (!$statment->execute(array($name, $email))) {
            $statment = null;
            header("location: ../index.php?error=statmentfailed");
            exit();
        }

        $resultCheck = false;
        if ($statment->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        return $resultCheck;
    }
}
