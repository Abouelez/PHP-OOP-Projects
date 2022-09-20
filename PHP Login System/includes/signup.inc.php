<?php
session_start();
if (isset($_POST['submit'])) {
    $user = $_POST;
    array_pop($user);
    require_once '../classes/Dbh.class.php';
    require_once '../classes/User.class.php';
    require_once '../classes/SignupController.class.php';
    $singUpUser = new SignUpContr($user);
    $errors = $singUpUser->signUp();
    if (!empty($errors)) {

        $_SESSION['errors'] = $errors;
        $_SESSION['user'] = $user;
        header("location: ../register.php");
        exit();
    } else {
        $_SESSION['success'] = true;
        header("location: ../login.php");
        exit();
    }
} else {
    header("Location: ../index.php");
    exit();
}
