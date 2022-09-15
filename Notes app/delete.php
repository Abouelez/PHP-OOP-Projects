<?php
$pdo = require_once 'pdo.php';
$id = $_POST['id'];
if ($id)
    $pdo->removeNote($id);

header("Location: index.php");
