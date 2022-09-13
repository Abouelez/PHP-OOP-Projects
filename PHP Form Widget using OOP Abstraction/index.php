<?php
require_once 'HtmlElement.php';
require_once 'Form.php';
require_once 'BaseInput.php';
require_once 'PasswordInput.php';
require_once 'TxtInput.php';
require_once 'Button.php';


$form = new Form();
$form->addElement(new TxtInput('firstName', 'First Name'));
$form->addElement(new TxtInput('email', 'Email'));
$form->addElement(new PasswordInput('password', 'Password'));
$form->addElement(new Button('submit'));


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php echo $form->render(); ?>
</body>

</html>