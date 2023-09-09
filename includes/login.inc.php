<?php

if (isset($_POST['submit'])) {

    // Grabbing the data
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];

    // Instantiate SignupContr class
    include '../Classes/Dbh.classes.php';
    include '../Classes/Login.classes.php';
    include '../Classes/Login-contr.classes.php';
    
    $login = new LoginContr($uid, $pwd);

    // Signup Controller class
    $login->loginUser();

    // Going to index page
    header('Location: ../index.php');
}
