<?php
session_start();
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];

    require_once "../classes/Dbh.class.php";
    require_once '../classes/User.class.php';
    require_once '../classes/LoginController.class.php';

    $logInUser = new LogInController($username, $pwd);
    $_SESSION['user'] = $username;
    if ($logInUser->logIn()) {

        $_SESSION['access'] = true;
        header("location: ../index.php");
        exit();
    } else {
        $_SESSION['errors'] = "Incorrect Username or password";
        header("Location: ../login.php");
        exit();
    }
}
