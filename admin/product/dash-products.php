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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="config">
    <div class="preloader is-active">
        <div class="preloader__wrap">

            <img class="preloader__img" src="images/preloader.png" alt=""></div>
    </div>
    <?php
    // include('header.php');
    ?>
    <!--====== Main App ======-->
    <div id="app">

        <!--====== Main Header ======-->
        <?php include('navbar.php');?>
        <!--====== End - Main Header ======-->
        <!--====== End - Main Header ======-->


        <!--====== End - Main Header ======-->


        <!--====== App Content ======-->
        <div class="app-content">

            <!--====== Section 1 ======-->
            <div class="u-s-p-y-20">

                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="container">
                        <div class="breadcrumb">
                            <div class="breadcrumb__wrap">
                                <ul class="breadcrumb__list">
                                    <li class="has-separator">

                                        <a href="index.php">Home</a></li>
                                    <li class="is-marked">

                                        <a>Admins</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section 1 ======-->


            <!--====== Section 2 ======-->
            <div class="u-s-p-b-60">

                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="dash">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3 col-md-12">

                                    <!--====== Dashboard Features ======-->
                                    <?php
                                    include('dashboard_features.php');
                                    ?>
                                    <!--====== End - Dashboard Features ======-->
                                </div>
                                <div class="col-lg-9 col-md-12">
                                    <div class="dash__box dash__box--shadow dash__box--bg-white dash__box--radius u-s-m-b-30">
                                    <div class="dash__pad-2">
                                            <div class="dash__address-header">
                                                <h1 class="dash__h1">Products</h1>
                                            </div>
                                        </div>
                                        <div class="dash__table">
                                            <table class="dash__table">
                                                <thead>
                                                    <tr>
                                                        <th>Product Image</th>
                                                        <th>Product Name</th>
                                                        <th>Product Price</th>
                                                        <th>Product Quantity</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                
                                                include('show_admin.php');
                                                                                            
                                                $products = new products();
                                                $products_row = $products->showRow();
                                                // var_dump($admin_row);
                                                    // echo $admin_row;
                                                
                                                  foreach($products_row as $product){
                                                    echo "  <tr>
                                                         <form method='POST' action='dash-product-edit.php'>
                                                            <th><div  class='description__img-wrap'>
                                                            <img class='u-img-fluid' style='border-radius: 10000px;width: 90px;height: 90px;' src='".$product['product_image']."' alt=''></div></th>
                                                            <th>".$product['product_name']."<input type='hidden' value='".$product['product_name']."' name='product_Name''></th>
                                                            <th>".$product['product_price']."<input type='hidden' value='".$product['product_price']."' name='product_price''></th>
                                                            <th>".$product['product_quantity']."<input type='hidden' value='".$product['product_quantity']."' name='product_quantity''></th>
                                                            <th style='display: flex;''>
                                                            <input type='hidden' value='".$product['product_ID']."' name='edit''>
                                                            <input type='hidden' value='".$product['product_image']."' name='product_image''>
                                                            <input type='hidden' value='".$product['category_ID']."' name='category'>
                                                            <input type='hidden' value='".$product['product_description']."' name='product_description'>
                                                            <button type='submit' class='address-book-edit btn--e-transparent-platinum-b-2' style='margin-right:4px ;'>Edit</button></form>
                                                            <form method='POST' action='show_admin.php'>
                                                            <input type='hidden' value='".$product['product_ID']."' name='delete_product''>
                                                            <button type='submit' class='address-book-edit btn--e-transparent-platinum-b-2'>Delete</button></form></th>
                                                        </tr>";
                                                }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div>

                                        <a class="dash__custom-link btn--e-brand-b-2" href="dash-product-add.php"><i class="fas fa-plus u-s-m-r-8"></i>

                                            <span>Add New Admin</span></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Section Content ======-->
            </div>
            <!--====== End - Section 2 ======-->
        </div>
        <!--====== End - App Content ======-->


        <!--====== Main Footer ======-->
        <?php
    include('footer.php');
    ?>
    </div>
    <!--====== End - Main App ======-->


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
</body>
</html>