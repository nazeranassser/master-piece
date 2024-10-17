<?php
session_start();
include "connection.php";

// Initialize error and success messages
$error = '';
$success = '';

// Login logic
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        $password = $row['password'];

        if (password_verify($pass, $password)) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header("Location: index.php");
            exit();
        } else {
            $error = "Wrong Password";
        }
    } else {
        $error = "Wrong Email or Password";
    }
}

// Registration logic
if (isset($_POST['register'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpass'];

    $check = "SELECT * FROM users WHERE email='$email'";
    $res = mysqli_query($conn, $check);

    if (mysqli_num_rows($res) > 0) {
        $error = "This email is already used, try another one please!";
    } else {
        if ($pass === $cpass) {
            $passwd = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (username, email, password) VALUES ('$name', '$email', '$passwd')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $success = "You are registered successfully!";
            } else {
                $error = "Registration failed, please try again!";
            }
        } else {
            $error = "Passwords do not match.";
        }
    }
}

// Check if user is logged in
$isLoggedIn = isset($_SESSION['id']);
$username = $isLoggedIn ? $_SESSION['username'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style2.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;600&display=swap" rel="stylesheet" />
    <title>Login Page</title>
</head>
<body>
<!-- Add a simple navigation -->
<nav>
    <?php if ($isLoggedIn): ?>
        <p>Welcome, <?php echo htmlspecialchars($username); ?>! <a href="logout.php">Sign Out</a></p>
    <?php endif; ?>
</nav>

<div class="container" id="container">
    <div class="sign-up">
        <form method="POST" action="">
            <h1>Create Account</h1>
            <div class="icons">
                <a href="#" class="icon"><i class="fa-brands fa-facebook"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-google"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
            </div>
            <span>or use email for registration</span>
            <input type="text" name="username" placeholder="Name" required />
            <input type="email" name="email" placeholder="Email" required />
            <input type="password" name="password" placeholder="Password" required />
            <input type="password" name="cpass" placeholder="Confirm Password" required />
            <button type="submit" name="register">Sign Up</button>
        </form>
        <?php if ($success) echo "<div class='message'><p>$success</p></div>"; ?>
        <?php if ($error) echo "<div class='message'><p>$error</p></div>"; ?>
    </div>
    <div class="sign-in">
        <form method="POST" action="">
            <h1>Sign In</h1>
            <div class="icons">
                <a href="#" class="icon"><i class="fa-brands fa-facebook"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-google"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
            </div>
            <span>or use email password</span>
            <input type="email" name="email" placeholder="Email" required />
            <input type="password" name="password" placeholder="Password" required />
            <a href="#">Forgot password</a>
            <button type="submit" name="login">Sign In</button>
        </form>
        <?php if ($error) echo "<div class='message'><p>$error</p></div>"; ?>
    </div>
    <div class="toogle-container">
        <div class="toogle">
            <div class="toogle-panel toogle-left">
                <h1>Welcome User!</h1>
                <p>If you already have an account</p>
                <button class="hidden" id="login">Sign In</button>
            </div>
            <div class="toogle-panel toogle-right">
                <h1>Hello, User!</h1>
                <p>If you don't have an account</p>
                <button class="hidden" id="register">Sign Up</button>
            </div>
        </div>
    </div>
</div>
<script src="script.js"></script>

<?php if ($isLoggedIn): ?>
<script>
    // Hide the login/register container if user is logged in
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('container').style.display = 'none';
    });

    
</script>



<?php endif; ?>

</body>
</html>
