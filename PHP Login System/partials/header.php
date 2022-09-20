<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<title>EA Technology</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="header-nav">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php">Services</a></li>
            <li><a href="index.php">About</a></li>
            <li><a href="index.php">Contact us</a></li>
        </ul>
        <?php if (isset($_SESSION['access'])) { ?>
            <div>
                <span class="btn"><a href="profile.php"><?php echo $_SESSION['user'] ?? '' ?></a></span>
                <span class="btn"><a href="includes/logout.inc.php">Log out</a></span>
            </div>
        <?php } else { ?>
            <div>
                <span class="btn"><a href="register.php">Sign Up</a></span>
                <span class="btn"><a href="login.php">Log In</a></span>

            </div>
        <?php } ?>
    </nav>