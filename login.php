<?php 
    include_once('views/partials/header.php');
    include_once 'app/helpers/session_helper.php';
?>

<h1 class="header">Please Login</h1>

<?php flash('login') ?>

<form method="post" action="login/add">
    <input type="hidden" name="type" value="login">
    
    <input type="text" name="customerNameOrEmail" placeholder="Username/Email..." required> <!-- Updated name for clarity -->
    <input type="password" name="customerPassword" placeholder="Password..." required> <!-- Updated name for clarity -->
    
    <button type="submit" name="submit">Log In</button>
</form>

<div class="form-sub-msg"><a href="./reset-password.php">Forgot Password?</a></div>

<script src="public/js/forms.js"></script>

<?php 
    include_once('views/partials/footer.php');
    ?>
