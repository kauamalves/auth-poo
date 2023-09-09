<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login system with POO</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main>
        <form action="includes/login.inc.php" method="post">
            <h1>Login</h1>
            <input type="text" name="uid" placeholder="Username">
            <input type="password" name="pwd" placeholder="Password">
            <input type="submit" name='submit' value="Login">

        </form>

        <hr>

        <form action="includes/signup.inc.php" method="post">
            <h1>Sign UP</h1>
            <input type="text" name="uid" placeholder="Username">
            <input type="password" name="pwd" placeholder="Password">
            <input type="password" name="pwdrepeat" placeholder="Repeat password">
            <input type="text" name="email" placeholder="email">
            <input type="submit" name='submit' value="Sign up">
        </form>
    </main>


    <?php

    if (isset($_SESSION['userid'])) {
    ?>
        <li><?php echo 'Id do usuário: ' . $_SESSION['userid']; ?></a></li>
        <li><a href="includes/logout.inc.php">LOGOUT</a></li>

    <?php
    }
    ?>

</body>

</html>