<?php

class LoginContr extends LoginModel
{
    private $name;
    private $password;

    public function __construct($name, $password)
    {
        $this->name = $name;
        $this->password = $password;
    }


    public function loginUser()
    {
        if ($this->emptyInput() == false) {
            header("location: ../index.php?error=Some Field is Empty");
            exit();
        }


        $this->getUser($this->name, $this->password);
    }


    //check if user submit empty input 
    private function emptyInput()
    {
        $result = false;
        if (empty($this->name) || empty($this->password)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}
