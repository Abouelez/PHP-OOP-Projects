<?php
class LogInController extends User
{
    private $username;
    private $pwd;

    public function __construct($username, $pwd)
    {
        $this->username = $username;
        $this->pwd = $pwd;
    }

    public function logIn()
    {
        $user = $this->getUser();
        if ($user && $this->checkPwd($user))
            return true;
        return false;
    }

    private function getUser()
    {
        if (str_contains($this->username, '@'))
            $user = $this->findUserByEmail($this->username);
        else
            $user = $this->findUserByUsername($this->username);

        return $user;
    }

    private function checkPwd($user)
    {
        if (password_verify($this->pwd, $user['pwd']))
            return true;
        return false;
    }
}
