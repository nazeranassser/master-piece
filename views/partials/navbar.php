<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="logo.png" width="30" height="30" class="d-inline-block align-text-top"> 
            Your Brand Name
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#projects">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contactform.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="wishlist.html"><i class="far fa-heart"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mini-cart-shop-link"><i class="fas fa-shopping-bag"></i></a>
                </li>
                <?php if (isset($user) && $user): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <!-- عرض الصورة الافتراضية إذا لم يكن هناك صورة مخصصة -->
                            <img src="uploads/<?php echo htmlspecialchars($user['customer_image'] ?? 'default-avatar.png'); ?>" style="width: 30px; height: 30px; border-radius: 50%;" alt="<?php echo htmlspecialchars($user['customer_name']); ?>" />
                            <?php echo htmlspecialchars($user['customer_name']); ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                            <li><a class="dropdown-item" href="logout.php">Sign Out</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
