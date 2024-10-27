<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <nav>
        <div class="logo-section">
            <a href="#" class="logo nav-item" style="animation-delay: 0.1s;">
                <img src="public/images/logo.png" class="mylog" style="margin-right: 10px;">
                Revoly Cake
            </a>
        </div>

        <div class="nav-links">
            <a href="index.php" class="nav-item" style="animation-delay: 0.2s;">Home</a>
            <a href="#" class="nav-item" style="animation-delay: 0.3s;">About Us</a>
            <a href="#" class="nav-item" style="animation-delay: 0.4s;">Products</a>
            <a href="contactform.php" class="nav-item" style="animation-delay: 0.5s;">Contact</a>
        </div>

        <div class="icons">
            <div class="icon nav-item" style="animation-delay: 0.6s;">
                <i class="fas fa-heart"></i>
                <span class="icon-badge">2</span>
            </div>
            <div class="icon nav-item" style="animation-delay: 0.7s;">
                <i class="fas fa-shopping-bag"></i>
                <span class="icon-badge">3</span>
            </div>

            <div class="auth-buttons">
                <?php if(!isset($_SESSION['usersId'])) : ?>
                    <a href="login.php" class="auth-btn login nav-item" style="animation-delay: 0.8s;">Login</a>
                    <a href="signup.php" class="auth-btn signup nav-item" style="animation-delay: 0.9s;">Sign Up</a>
                <?php else: ?>
                    <a href="./controllers/Users.php?q=logout" class="auth-btn logout nav-item" style="animation-delay: 0.8s;">Logout</a>
                <?php endif; ?>
            </div>

            <!-- إضافة الترحيب واسم المستخدم والصورة هنا -->
            <?php if (isset($_SESSION['usersId'])): ?>
                <div class="user-welcome nav-item" style="animation-delay: 1.0s;">
                    <span>Welcome, <?php echo explode(" ", $_SESSION['usersName'])[0]; ?></span>
                    <?php 
                    // عرض الصورة
                    if (isset($user['customer_image'])) {
                        echo '<img src="uploads/' . htmlspecialchars($user['customer_image']) . '" alt="' . htmlspecialchars($user['usersName']) . '" />';
                    } else {
                        echo '<img src="public/uploads/default-avatar.png" alt="Default Avatar" />';
                    }
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </nav>
