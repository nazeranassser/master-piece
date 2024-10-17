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

    $stmt = $conn->prepare("SELECT * FROM customers WHERE customer_email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $stored_password = $row['customer_password'];

        if (password_verify($pass, $stored_password)) {
            $_SESSION['id'] = $row['customer_ID'];
            $_SESSION['username'] = $row['customer_name'];
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

    $stmt = $conn->prepare("SELECT * FROM customers WHERE customer_email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $error = "This email is already used, try another one please!";
    } else {
        if ($pass === $cpass) {
            $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO customers (customer_name, customer_email, customer_password) VALUES (:name, :email, :password)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashed_password);
            
            if ($stmt->execute()) {
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

<!-- Simple Navigation -->
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
        <!-- Display success or error message -->
        <?php if ($success): ?>
            <div class="message success"><p><?php echo $success; ?></p></div>
        <?php elseif ($error): ?>
            <div class="message error"><p><?php echo $error; ?></p></div>
        <?php endif; ?>
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
        <!-- Display error message -->
        <?php if ($error): ?>
            <div class="message error"><p><?php echo $error; ?></p></div>
        <?php endif; ?>
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

<!-- Hide the container if user is logged in -->
<?php if ($isLoggedIn): ?>
    <style>
        #container {
            display: none;
        }
    </style>
<?php endif; ?>
</body>
</html>
