<?php

class LoginModel extends Database
{
    public function getUser($name, $password)
    { //this statement will return corrsponding password in hashed fashion
        $statment = $this->connect()->prepare('SELECT users_password FROM users WHERE users_name = ? OR users_email = ?;');
        if (!$statment->execute(array($name, $password))) {
            $statment = null;
            header("location: ../index.php?error=statmentfailed");
            exit();
        }
        //check if user not found in the database as well as, till, not done any work regarding if user found

        if ($statment->rowCount() == 0) {
            $statment = null;
            header('location: ../index.php?error=No user found');
            exit();
        }


        //if password match return assoc
        $hashed = $statment->fetchAll(PDO::FETCH_ASSOC);
        $pass = password_verify($password, $hashed[0]["users_password"]);

        //as well as, till, not done any work regarding if user found
        if ($pass == false) {
            $statment = null;
            header('location: ../index.php?error=Wrong password');
            exit();
        } elseif ($pass == true) {
            $statment = $this->connect()->prepare('SELECT * FROM users WHERE users_name = ? OR users_email = ? AND users_password = ?;');
            if (!$statment->execute(array(
                $name, $name,
                $password
            ))) {
                $statment = null;
                header("location: ../index.php?error=statmentfailed");
                exit();
            }
            if ($statment->rowCount() == 0) {
                $statment = null;
                header('location: ../index.php?error=No user found');
                exit();
            }
            $user = $statment->fetchAll(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION["users_name"] = $user[0]["users_name"];
            $_SESSION["users_email"] = $user[0]["users_email"];
            // $statment = null;
        }


        $statment = null;
    }
}
