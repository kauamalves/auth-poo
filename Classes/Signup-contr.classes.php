<?php

class SignUpContr extends SignUp
{
    private $uid;
    private $pwd;
    private $pwdRepeat;
    private $email;

    public function __construct($uid, $pwd, $pwdRepeat, $email)
    {
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->email = $email;
    }

    public function signupUser()
    {
        if ($this->emptyInput() == false) {
            header('Location: ../index.php?error=emptyinput');
            exit();
        }

        if ($this->invalidUid() == false) {
            header('Location: ../index.php?error=username');
            exit();
        }

        if ($this->invalidEmail() == false) {
            header('Location: ../index.php?error=email');
            exit();
        }

        if ($this->pwdMatch() == false) {
            header('Location: ../index.php?error=passwordmatch');
            exit();
        }

        if ($this->uidTakenCheck() == false) {
            header('Location: ../index.php?error=useroremailtaken');
            exit();
        }

        $this->setUser($this->uid, $this->pwd, $this->email);
    }

    private function emptyInput()
    {
        $result = true;

        if (empty($this->uid) || empty($this->pwd) || empty($this->pwdRepeat) || empty($this->email)) {
            $result = false;
        }

        return $result;
    }

    private function invalidUid()
    {

        $result = true;

        if (!preg_match('/^[a-zA-Z0-9]/', $this->uid)) {
            $result = false;
        }

        return $result;
    }

    // Verifica se o email digitado é valido

    private function invalidEmail()
    {
        $result = true;

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        }

        return $result;
    }

    // Verifica se as senhas batem

    private function pwdMatch()
    {
        $result = true;

        if ($this->pwd !== $this->pwdRepeat) {
            $result = false;
        }

        return $result;
    }

    // Verifica se já existe usuário ou email sendo usado

    private function uidTakenCheck()
    {
        $result = true;

        if (!$this->checkUser($this->uid, $this->email)) {
            $result = false;
        }

        return $result;
    }
}
