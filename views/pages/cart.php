<?php
require_once 'CartController.php';

// Initialize CartController
$cartController = new CartController();

// Retrieve cart items and total
$cartItems = $cartController->getCartItems();
$cartTotal = $cartController->getCartTotal();
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="images/favicon.png" rel="shortcut icon">
    <title>Ludus - Electronics, Apparel, Computers, Books, DVDs & more</title>

    <!--====== Google Font ======-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">

    <!--====== Vendor Css ======-->
    <link rel="stylesheet" href="css/vendor.css">

    <!--====== Utility-Spacing ======-->
    <link rel="stylesheet" href="css/utility.css">

    <!--====== App ======-->
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="config">
    <div class="preloader is-active">
        <div class="preloader__wrap">
            <img class="preloader__img" src="images/preloader.png" alt="">
        </div>
    </div>

    <!--====== Main App ======-->
    <div id="app">

        <!--====== Main Header ======-->
        <?php include 'views/partials/navbar.php'; ?>
        <!--====== End - Main Header ======-->

        <!--====== Cart Content ======-->
        <div class="app-content">
            <!--====== Section 1 ======-->
            <div class="u-s-p-y-60">
                <div class="section__content">
                    <div class="container">
                        <div class="breadcrumb">
                            <div class="breadcrumb__wrap">
                                <ul class="breadcrumb__list">
                                    <li class="has-separator">
                                        <a href="index.php">Home</a>
                                    </li>
                                    <li class="is-marked">
                                        <a href="cart.php">Cart</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section 1 ======-->

            <!--====== Section 2 ======-->
            <div class="u-s-p-b-60">
                <div class="section__intro u-s-m-b-60">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section__text-wrap">
                                    <h1 class="section__heading u-c-secondary">SHOPPING CART</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cart items dynamically displayed -->
                <div class="section__content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 u-s-m-b-30">
                                <div class="table-responsive">
                                    <table class="table-p">
                                        <tbody>

                                            <?php if (!empty($cartItems)): ?>
                                                <!-- Loop through cart items -->
                                                <?php foreach ($cartItems as $item): ?>
                                                    <tr>
                                                        <td>
                                                            <div class="table-p__box">
                                                                <div class="table-p__img-wrap">
                                                                    <img class="u-img-fluid" src="<?php echo $item['image_url']; ?>" alt="">
                                                                </div>
                                                                <div class="table-p__info">
                                                                    <span class="table-p__name">
                                                                        <a href="product-detail.php?id=<?php echo $item['product_id']; ?>"><?php echo htmlspecialchars($item['product_name']); ?></a>
                                                                    </span>
                                                                    <ul class="table-p__variant-list">
                                                                        <li><span>Size: <?php echo htmlspecialchars($item['size']); ?></span></li>
                                                                        <li><span>Color: <?php echo htmlspecialchars($item['color']); ?></span></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <span class="table-p__price">$<?php echo number_format($item['price'], 2); ?></span>
                                                        </td>
                                                        <td>
                                                            <div class="table-p__input-counter-wrap">
                                                                <div class="input-counter">
                                                                    <span class="input-counter__minus fas fa-minus"></span>
                                                                    <input class="input-counter__text input-counter--text-primary-style" type="text" value="<?php echo htmlspecialchars($item['quantity']); ?>" min="1" max="1000">
                                                                    <span class="input-counter__plus fas fa-plus"></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="table-p__del-wrap">
                                                                <a class="far fa-trash-alt table-p__delete-link" href="CartController.php?action=removeFromCart&product_id=<?php echo $item['product_id']; ?>"></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="4">Your cart is empty!</td>
                                                </tr>
                                            <?php endif; ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="route-box">
                                    <div class="route-box__g1">
                                        <a class="route-box__link" href="shop-side-version-2.php">
                                            <i class="fas fa-long-arrow-alt-left"></i><span>CONTINUE SHOPPING</span>
                                        </a>
                                    </div>
                                    <div class="route-box__g2">
                                        <a class="route-box__link" href="CartController.php?action=clearCart">
                                            <i class="fas fa-trash"></i><span>CLEAR CART</span>
                                        </a>
                                        <a class="route-box__link" href="cart.php">
                                            <i class="fas fa-sync"></i><span>UPDATE CART</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- End Cart Section -->
        </div>
    </div>
    <footer>
    <?php include 'views/partials/footer.php'; ?>
    </footer>

<!--====== Vendor Js ======-->
<script src="js/vendor.js"></script>

    
<!--====== App ======-->
<script src="js/app.js"></script>

<!--====== Noscript ======-->
<noscript>
    <div class="app-setting">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="app-setting__wrap">
                        <h1 class="app-setting__h1">JavaScript is disabled in your browser.</h1>

                        <span class="app-setting__text">Please enable JavaScript in your browser or upgrade to a JavaScript-capable browser.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</noscript>

</body>
</html>

        
        


  
