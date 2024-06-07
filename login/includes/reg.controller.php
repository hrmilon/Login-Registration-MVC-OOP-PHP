<?php

class SignupContr extends SignupModel
{
    private $name;
    private $password;
    private $email;

    public function __construct($name, $password, $email)
    {
        $this->name = $name;
        $this->password = $password;
        $this->email = $email;
    }


    public function signupUser()
    {
        if ($this->emptyInput() == false) {
            header("location: ../index.php?error=Empty Field");
            exit();
        }
        if ($this->existsCheck() == false) {
            header("location: ../index.php?error=Alredy Existed");
            exit();
        }


        $this->setUser($this->name, $this->password, $this->email);
    }


    //check if user submit empty input 
    private function emptyInput()
    {
        $result = false;
        if (empty($this->name) || empty($this->password) || empty($this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    //check if user has submitted the input which already exists 
    private function existsCheck()
    {
        $result = false;
        //go to model to check if user exist
        if (!$this->checkUser($this->name, $this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}
