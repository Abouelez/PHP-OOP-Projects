<?php
include_once("partials/header.php");
session_start();
if (isset($_SESSION['access'])) {
    header("location: index.php");
}
?>




<div class="form-container">
    <?php if (isset($_SESSION['success'])) { ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Sign up Successfully </strong> Log in to see your content
            <button button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>

    <form action="includes/login.inc.php" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username or Email address</label>
            <input value="<?= $_SESSION['user'] ?? '' ?>" type="txt" name="username" class="form-control" id="username">

        </div>
        <div class="mb-3">
            <label for="pwd" class="form-label">Password</label>
            <input type="password" class="form-control" id="pwd" name="pwd">
        </div>
        <div style="color: red;" class="form-text"><?= $_SESSION['errors'] ?? '' ?></div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php
include_once("partials/footer.php");
unset($_SESSION['errors']);
?>