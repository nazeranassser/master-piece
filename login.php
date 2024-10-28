<?php 
include_once 'header.php';
include_once './helpers/session_helper.php';
?>
<h1 class="header">Please Login</h1>

<?php flash('login') ?>

<form method="post" action="./controllers/Users.php" style="display: flex; flex-direction: column !important; gap: 1rem; max-width: 400px; margin: auto;">
    <input type="hidden" name="type" value="login">
    <input type="text" name="name/email" placeholder="Username/Email..." required>
    <input type="password" name="usersPwd" placeholder="Password..." required>
    <button type="submit" name="submit">Log In</button>
    <div class="form-sub-msg"><a href="./reset-password.php">Forgotten Password?</a></div>

</form>

<!-- <div class="form-sub-msg"><a href="./reset-password.php">Forgotten Password?</a></div> -->

<script src="public/js/forms.js"></script>
<?php 
include_once 'footer.php';
?>
