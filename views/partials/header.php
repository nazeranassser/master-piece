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

    <?php $cartItems = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];?>

</head>
<body>
    <nav>
        <div class="logo-section">
            <a href="#" class="logo nav-item" style="animation-delay: 0.1s;">
                <img src="/images/3-removebg-preview.png" style="margin-right: 10px; width:40px">
                Revoly Cake
            </a>
        </div>

        <div class="nav-links">
            <a href="/" class="nav-item" style="animation-delay: 0.2s;">Home</a>
            <a href="/about-us" class="nav-item" style="animation-delay: 0.3s;">About Us</a>
            <a href="/allProducts" class="nav-item" style="animation-delay: 0.4s;">Products</a>
            <a href="/contactform.php" class="nav-item" style="animation-delay: 0.5s;">Contact</a>
        </div>

        <div class="icons">
            <div class="icon nav-item" style="animation-delay: 0.6s;">
               <a style="display: flex;flex-direction: column;justify-content: center;align-items: center;" href="/wishlist">
                <!-- <i class="fas fa-heart"></i> -->
                <img style="width:24px" src="/images/products/wishlist.png" alt="">
                <span class="icon-badge">2</span></a>
            </div>
            <div class="icon nav-item" style="animation-delay: 0.7s;">
               <a style="display: flex;flex-direction: column;justify-content: center;align-items: center;" href = '/cart/<?=$_SESSION['usersId']?>'> 
               <img style="width:24px" src="/images/products/grocery-store.png" alt="">
                <span class="icon-badge"><?php echo count($cartItems); ?></span></a>
            </div>
            <div class="icon nav-item" style="animation-delay: 0.7s;">
               <a style="display: flex;flex-direction: column;justify-content: center;align-items: center;" href="<?= isset($_SESSION['usersId'])?'/profile-main':'/login'?>">
                <img style="width:30px;background-color:#fff;border-radius:200%;padding:2px" src="<?php if(!isset($_SESSION['customerImage'])){ echo 'images/user.png'; }else {echo  $_SESSION['customerImage'];} ?>" alt="">

               <!-- <img style="width:24px" src="/images/products/grocery-store.png" alt=""> -->

                <!-- <i class="fas fa-shopping-bag"></i>  -->
               </a>
            </div>
          
        </div>
    </nav>
</body>
</html>
