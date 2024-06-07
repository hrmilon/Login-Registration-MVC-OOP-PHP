<?php

if (isset($_POST["submit"])) {

    //grabbing data from input
    $name = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    //initiate controller class
    include "database.php";
    include "reg.model.php";
    include "reg.controller.php";

    $newSignup = new SignupContr($name, $password, $email);
    $newSignup->signupUser();

    //send no error message in index file
    header("location: ../index.php?error=Successfully Registered");
}
