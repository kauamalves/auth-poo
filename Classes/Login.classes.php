<?php

class Login extends Dbh
{
    protected function getUser($uid, $password)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE users_uid = :uid OR users_email = :email;");
        $stmt->bindParam(':uid', $uid, PDO::PARAM_STR);
        $stmt->bindParam(':email', $uid, PDO::PARAM_STR);

        if (!$stmt->execute()) {
            $stmt = null;
            header("Location: ../index.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("Location: ../index.php?error=usernotfound");
            exit();
        }

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $pwdHashed = $user["users_pwd"];
        
        if (password_verify($password, $pwdHashed)) {
            session_start();
            $_SESSION["userid"] = $user["users_id"];
            $_SESSION["useruid"] = $user["users_uid"];
            
            header("Location: ../index.php?error=none");
            
            exit();
        } else {
            header("Location: ../index.php?error=wrongpassword");
            exit();
        }
    }
}