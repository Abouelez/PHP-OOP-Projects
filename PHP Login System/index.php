<?php
session_start();
include_once("partials/header.php");

?>
<?php if (isset($_SESSION['access'])) { ?>
    <div class="content">Your content </div>
<?php } else { ?>
    <div class="content">Pls log in to see your content</div>
<?php } ?>
<?php
include_once("partials/footer.php");
?>