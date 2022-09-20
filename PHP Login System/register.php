<?php
include_once("partials/header.php");
session_start();
if (isset($_SESSION['access'])) {
    header("location: index.php");
    exit();
}
$user = [
    'name' => '',
    'username' => '',
    'email' => '',
    'pwd' => ''
];
if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    if (isset($_SESSION['user']))
        $user = $_SESSION['user'];
}
?>




<div class="form-container">
    <form action="includes/signup.inc.php" method="post">
        <div class="mb-3">
            <label for="fullName" class="form-label">Full Name</label>
            <input value="<?= $user['name'] ?? '' ?>" type="txt" class="form-control" id="fullName" name="name">
            <small class="form-text" style="color: red;"><?= $errors['name'][0] ?? '' ?></small>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input value="<?= $user['username'] ?? '' ?>" type="txt" class="form-control" id="username" name="username">
            <small class="form-text" style="color: red;"><?= $errors['username'][0] ?? ''  ?></small>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input value="<?= $user['email'] ?? '' ?>" type="email" class="form-control" name="email" id="email">
            <small class="form-text" style="color: red;"><?= $errors['email'][0] ?? '' ?></small>
        </div>
        <div class="mb-3">
            <label for="pwd" class="form-label">Password</label>
            <input type="password" class="form-control" id="pwd" name="pwd">
            <small class="form-text" style="color: red;"><?= $errors['pwd'][0] ?? ''  ?></small>
        </div>
        <div class="mb-3">
            <label for="pwdRepeated" class="form-label">Repeat Password</label>
            <input type="password" class="form-control" id="pwdRepeated" name="pwdRepeated">
            <small class="form-text" style="color: red;"><?= $errors['pwdRepeated'][0] ?? ''  ?></small>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php
include_once("partials/footer.php");
unset($_SESSION['errors']);
unset($_SESSION['user']);
?>