<?php

class User extends Dbh
{

    public function __construct()
    {
    }
    protected function saveUser($name, $username, $email, $pwd)
    {
        $sql = "INSERT INTO users (full_name, username, user_email, pwd) values (?,?,?,?)";
        $query = $this->connect()->prepare($sql);
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        if (!$query->execute([$name, $username, $email, $hashedPwd]))
            return false;
    }
    protected function findUserByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE user_email = ?";
        $query = $this->connect()->prepare($sql);
        if ($query->execute([$email])) {
            return $query->fetch(PDO::FETCH_ASSOC);
        } else
            return false;
    }
    protected function findUserByUsername($username)
    {
        $sql = "SELECT * FROM users WHERE username = ?";
        $query = $this->connect()->prepare($sql);
        if ($query->execute([$username])) {
            return $query->fetch(PDO::FETCH_ASSOC);
        } else
            return false;
    }
}
