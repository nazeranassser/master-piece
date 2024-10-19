<?php
        // PHP: Handle cart clearing
        if (isset($_POST['clear_cart'])) {
            setcookie('cart', '', time() - 3600, '/'); // Expire the cart cookie
           
        }
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

            <img class="preloader__img" src="images/preloader.png" alt=""></div>
    </div>

    <!--====== Main App ======-->
    <div id="app"> 



  <!--====== Main Header ======-->
  <?php include 'navbar.php'; ?>
  <!--====== End - Main Header ======-->

        

       
        <!--====== App Content ======-->
        <div class="app-content">
        
            <!--====== Section 1 ======-->
            <div class="u-s-p-y-60">
                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="container">
                        <div class="breadcrumb">
                            <div class="breadcrumb__wrap">
                                <ul class="breadcrumb__list">
                                    <li class="has-separator">
                                        <a href="index.html">Home</a></li>
                                    <li class="is-marked">
                                        <a href="cart.html">Cart</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section 1 ======-->
        
            <!--====== Section 2 ======-->
            <div class="u-s-p-b-60">
                <!--====== Section Intro ======-->
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
                <!--====== End - Section Intro ======-->
        
                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 u-s-m-b-30">
                                <div class="table-responsive">
                                    <table class="table-p">
                                        <tbody>
                                            <!--====== Row ======-->
                                            <tr>
                                                <td>
                                                    <div class="table-p__box">
                                                        <div class="table-p__img-wrap">
                                                            <img class="u-img-fluid" src="images/product/electronic/product3.jpg" alt="">
                                                        </div>
                                                        <div class="table-p__info">
                                                            <span class="table-p__name">
                                                                <a href="product-detail.html">Yellow Wireless Headphone</a>
                                                            </span>
                                                            <span class="table-p__category">
                                                                <a href="shop-side-version-2.html">Electronics</a>
                                                            </span>
                                                            <ul class="table-p__variant-list">
                                                                <li><span>Size: 22</span></li>
                                                                <li><span>Color: Red</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="table-p__price">$125.00</span></td>
                                                <td>
                                                    <div class="table-p__input-counter-wrap">
                                                        <div class="input-counter">
                                                            <span class="input-counter__minus fas fa-minus"></span>
                                                            <input class="input-counter__text input-counter--text-primary-style" type="text" value="1" data-min="1" data-max="1000">
                                                            <span class="input-counter__plus fas fa-plus"></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button class="btn-add-cart" data-id="1" data-name="Yellow Wireless Headphone" data-price="125.00">Add to Cart</button>
                                                </td>
                                            </tr>
                                            <!-- Add more rows as needed -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
        
                            <div class="col-lg-12">
                                <div class="route-box">
                                    <div class="route-box__g1">
                                        <a class="route-box__link" href="shop-side-version-2.html">
                                            <i class="fas fa-long-arrow-alt-left"></i>
                                            <span>CONTINUE SHOPPING</span>
                                        </a>
                                    </div>
                                    <div class="route-box__g2">
                                        <form action="" method="post">
                                            <button type="submit" name="clear_cart" class="route-box__link">
                                                <i class="fas fa-trash"></i>
                                                <span>CLEAR CART</span>
                                            </button>
                                        </form>
                                        <a class="route-box__link" href="cart.html">
                                            <i class="fas fa-sync"></i>
                                            <span>UPDATE CART</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Section Content ======-->
            </div>
            <!--====== End - Section 2 ======-->
        
            <!--====== Section 3 ======-->
            <div class="u-s-p-b-60">
                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 u-s-m-b-30">
                                <form class="f-cart">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 u-s-m-b-30">
                                            <div class="f-cart__pad-box">
                                                <h1 class="gl-h1">NOTE</h1>
                                                <span class="gl-text u-s-m-b-30">Add Special Note About Your Product</span>
                                                <div>
                                                    <label for="f-cart-note"></label>
                                                    <textarea class="text-area text-area--primary-style" id="f-cart-note"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 u-s-m-b-30">
                                            <div class="f-cart__pad-box">
                                                <div class="u-s-m-b-30">
                                                    <table class="f-cart__table">
                                                        <tbody>
                                                            <tr>
                                                                <td>SHIPPING</td>
                                                                <td>$4.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>TAX</td>
                                                                <td>$0.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>SUBTOTAL</td>
                                                                <td>$379.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>GRAND TOTAL</td>
                                                                <td>$379.00</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div>
                                                    <button class="btn btn--e-brand-b-2" type="submit"> PROCEED TO CHECKOUT</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Section Content ======-->
            </div>
            <!--====== End - Section 3 ======-->
        </div>
        <!--====== End - App Content ======-->
        
        <!-- JavaScript to manage the cart -->
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get cart from cookies
            function getCartFromCookies() {
                let cart = document.cookie.split('; ').find(row => row.startsWith('cart='));
                return cart ? JSON.parse(decodeURIComponent(cart.split('=')[1])) : [];
            }
        
            // Save cart to cookies
            function saveCartToCookies(cart) {
                document.cookie = `cart=${encodeURIComponent(JSON.stringify(cart))}; path=/; max-age=86400`; // 1 day
            }
        
            // Add item to cart
            function addToCart(productId, productName, productPrice, quantity) {
                let cart = getCartFromCookies();
                let existingItem = cart.find(item => item.id === productId);
                
                if (existingItem) {
                    existingItem.quantity += quantity;
                } else {
                    cart.push({ id: productId, name: productName, price: productPrice, quantity: quantity });
                }
        
                saveCartToCookies(cart);
                alert(`${productName} added to cart!`);
            }
        
            // Add event listeners to add-to-cart buttons
            document.querySelectorAll('.btn-add-cart').forEach(button => {
                button.addEventListener('click', function() {
                    const productId = parseInt(this.dataset.id);
                    const productName = this.dataset.name;
                    const productPrice = parseFloat(this.dataset.price);
                    const quantity = parseInt(this.closest('tr').querySelector('.input-counter__text').value);
                    addToCart(productId, productName, productPrice, quantity);
                });
            });
        });
        </script>
        
        <footer>
        <?php include 'footer.php' ?>
    </footer>



    <!--====== Google Analytics: change UA-XXXXX-Y to be your site's ID ======-->
    <script>
        window.ga = function() {
            ga.q.push(arguments)
        };
        ga.q = [];
        ga.l = +new Date;
        ga('create', 'UA-XXXXX-Y', 'auto');
        ga('send', 'pageview')
    </script>
    <script src="https://www.google-analytics.com/analytics.js" async defer></script>

    <!--====== Vendor Js ======-->
    <script src="js/vendor.js"></script>

    <!--====== jQuery Shopnav plugin ======-->
    <script src="js/jquery.shopnav.js"></script>

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
    <script>
        // JavaScript to manage the cart using cookies
        document.addEventListener('DOMContentLoaded', function() {
        
            // Function to get cart data from cookies
            function getCartFromCookies() {
                let cart = document.cookie.split('; ').find(row => row.startsWith('cart='));
                return cart ? JSON.parse(decodeURIComponent(cart.split('=')[1])) : [];
            }
        
            // Function to save cart data to cookies
            function saveCartToCookies(cart) {
                document.cookie = `cart=${encodeURIComponent(JSON.stringify(cart))}; path=/; max-age=86400`; // Store for 1 day
            }
        
            // Function to add an item to the cart
            function addToCart(productId, productName, productPrice, quantity) {
                let cart = getCartFromCookies();
                let existingItem = cart.find(item => item.id === productId);
                
                if (existingItem) {
                    existingItem.quantity += quantity;
                } else {
                    cart.push({ id: productId, name: productName, price: productPrice, quantity: quantity });
                }
                
                saveCartToCookies(cart);
                alert(`${productName} added to cart!`);
            }
        
            // Add event listeners to 'Add to Cart' buttons
            document.querySelectorAll('.btn-add-cart').forEach(button => {
                button.addEventListener('click', function() {
                    const productId = parseInt(this.dataset.id);
                    const productName = this.dataset.name;
                    const productPrice = parseFloat(this.dataset.price);
                    const quantity = parseInt(this.closest('tr').querySelector('.input-counter__text').value);
                    addToCart(productId, productName, productPrice, quantity);
                });
            });
        
        });
        </script>
        
</body>
</html>