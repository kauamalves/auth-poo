<?php

if (isset($_POST['submit'])) {

    // Grabbing the data
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwdrepeat'];
    $email = $_POST['email'];

    // Instantiate SignupContr class
    include '../Classes/Dbh.classes.php';
    include '../Classes/Signup.classes.php';
    include '../Classes/Signup-contr.classes.php';
    
    $signup = new SignUpContr($uid, $pwd, $pwdRepeat, $email);

    // Signup Controller class
    $signup->signupUser();

    // Going to index page
    header('Location: ../index.php');
}
