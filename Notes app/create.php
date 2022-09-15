<?php
$pdo = require_once "pdo.php";
$id = $_POST['id'];
if ($id)
    $pdo->updateNote($id, $_POST);
else
    $pdo->addNote($_POST);

header("Location: index.php");
