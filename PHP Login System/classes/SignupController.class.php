<?php

class SignUpContr extends User
{
    private $name;
    private $username;
    private $email;
    private $pwd;
    private $pwdRepeated;
    private $errors = [];
    public function __construct($user)
    {
        $this->name = $user['name'];
        $this->username = $user['username'];
        $this->email = $user['email'];
        $this->pwd = $user['pwd'];
        $this->pwdRepeated = $user['pwdRepeated'];
        $this->errors = [];
    }

    public function signUp()
    {
        $this->validate();
        if (empty($this->errors)) {
            $this->saveUser($this->name, $this->username, $this->email, $this->pwd);
        }
        return $this->errors;
    }
    private function validate()
    {
        $this->EmptyInput();
        $this->validateEmail();
        $this->validateUsername();
        $this->emailExist();
        $this->userExist();
        $this->pwdMatch();
    }
    private function EmptyInput()
    {
        if (empty($this->name))  $this->errors['name'][] = "Name is required";
        if (empty($this->email))  $this->errors['email'][] = "Email is required";
        if (empty($this->username))  $this->errors['username'][] = "Username is required";
        if (empty($this->pwd))  $this->errors['pwd'][] = "Password is required";
        if (empty($this->pwdRepeated))  $this->errors['pwdRepeated'][] = "Repeated Password is required";
    }

    private function validateEmail()
    {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'][] = "Pls enter valid email";
            return false;
        }
    }

    private function validateUsername()
    {
        // for english chars + numbers only
        // valid username, alphanumeric & longer than or equals 5 chars
        if (!preg_match('/^[a-zA-Z0-9]{5,}$/', $this->username)) {
            $this->errors['username'][] = "Pls enter valid username";
            return false;
        }
    }
    private function emailExist()
    {
        $result = $this->findUserByEmail($this->email);
        if ($result !== false)
            $this->errors['email'][] = "Email already Exist";
        return $result;
    }
    private function userExist()
    {
        $result = $this->findUserByUsername($this->username);
        if ($result !== false)
            $this->errors['username'][] = "username already Exist";
        return $result;
    }
    private function pwdMatch()
    {
        if ($this->pwd !== $this->pwdRepeated) {
            $this->errors['pwdRepeated'][] = "Passwords doesn't match";
            return false;
        }
        return true;
    }
}
