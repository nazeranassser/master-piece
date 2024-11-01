<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="/public/css/vendor.css">
    <link rel="stylesheet" href="/public/css/utility.css">
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="/public/css/footer.css">
    <link rel="stylesheet" href="/public/css/index.css">
    <link rel="stylesheet" href="/public/css/product-details.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    

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
            <a href="/" class="nav-item" style="animation-delay: 0.2s;">Home</a>
            <a href="about-us" class="nav-item" style="animation-delay: 0.3s;">About Us</a>
            <a href="/allProducts" class="nav-item" style="animation-delay: 0.4s;">Products</a>
            <a href="/contactform.php" class="nav-item" style="animation-delay: 0.5s;">Contact</a>
        </div>

        <div class="icons">
            <div class="icon nav-item" style="animation-delay: 0.6s;">
               <a href="views/pages/wishlist.php">
                <i class="fas fa-heart"></i>
                <span class="icon-badge">2</span>
            </div>
            <div class="icon nav-item" style="animation-delay: 0.7s;">
               <a href = 'cart'> <i class="fas fa-shopping-bag"></i> </a>
                <span class="icon-badge">3</span>
            </div>

            <div class="auth-buttons">
                <?php if(!isset($_SESSION['usersId'])) : ?>
                    <a href="login" class="auth-btn login nav-item" style="animation-delay: 0.8s;">Login</a>
                    <a href="signup" class="auth-btn signup nav-item" style="animation-delay: 0.9s;">Sign Up</a>
                <?php else: ?>
                    <a href="/sign-out" class="auth-btn logout nav-item" style="animation-delay: 0.8s;">Logout</a>
                <?php endif; ?>
            </div>

            <!-- إضافة الترحيب واسم المستخدم والصورة هنا -->
            <?php if (isset($_SESSION['usersId'])): ?>
                <div class="user-welcome nav-item" style="animation-delay: 1.0s;">
                    <a href="profile-main"><span>Welcome, <?php echo $_SESSION['usersName']; ?></span></a>
                    <?php 
                    // عرض الصورة
                    
                        echo '<img src="' .  $_SESSION['customerImage'] . '"  />';
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </nav>
</body>
</html>
