<?php

if (isset($_POST["submit"])) {

    //grabbing data from input
    $name = $_POST['username'];
    $password = $_POST['password'];

    //initiate controller class
    include "database.php";
    include "login.model.php";
    include "login.controller.php";

    $newLogin = new LoginContr($name, $password);
    $newLogin->loginUser();

    // send no error message in index file
    header("location: ../index.php");
}
