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
    <link rel="stylesheet" href="new_css.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!--====== Drop Drag Img ======-->
    <link rel="stylesheet" href="css/drop_drag_img.css">
    
</head>
<body class="config">
    <div class="preloader is-active">
        <div class="preloader__wrap">

            <img class="preloader__img" src="images/preloader.png" alt=""></div>
    </div>

    <!--====== Main App ======-->
    <div id="app">

        <!--====== Main Header ======-->
        <?php include('navbar.php');?>
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

                                        <a >Edit Product</a></li>
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
                                    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
                                        <div class="dash__pad-2">
                                            <h1 class="dash__h1 u-s-m-b-14">Edit Product</h1>

                                            <span class="dash__text u-s-m-b-30"></span>
                                            <form id="productForm" enctype="multipart/form-data" class="dash-address-manipulation" method='POST' action='show_admin.php'>
                                                <div class="gl-inline">
                                                    <div class="u-s-m-b-30">
                                                        <label class="gl-label" for="product-name">Product Name *</label>
                                                        <input class="input-text input-text--primary-style" type="text" name='product_name' id="product-name" placeholder="Product Name" value='<?php echo $_POST['product_Name'];?>'></div>
                                                        <input type='hidden' value='<?php echo $_POST['edit'];?>' name='product_edit'>
                                                        <input type='hidden' value='<?php echo $_POST['product_image'];?>' name='image'>
                                                        <div class="u-s-m-b-30">

                                                            <!--====== Select Box ======-->
                                                            
                                                            <label class="gl-label" for="categories">Categories *</label>
                                                            <select name='category' class="select-box select-box--primary-style" id="categories">
                                                                <option selected value="">Choose Category</option>
                                                                <?php
                                                                include('show_admin.php');
                                                                 $categories = new categories();
                                                                 $category_row = $categories->showRow();
                                                                 
                                                                   foreach($category_row as $category) {
                                                                    $select = '';
                                                                    if($_POST['category']==$category['category_ID']){
                                                                        $select = 'selected';
                                                                    }
                                                                    echo "<option value='".$category['category_ID']."' $select>".$category['category_name']."</option>";
                                                                   }
                                                                ?>
                                                                <!-- <a href='dash-orders.php'><option>Add Category</option></a> -->
                                                            </select>
                                                            <!--====== End - Select Box ======-->
                                                        </div>
                                                    </div>
                                                <div>
                                                <label class="gl-label" for="product_description-">Product Description *</label>
                                                <textarea class='input-text--primary-style' style='width: 100%; ' id="product_description" name="description" rows="4" ><?php echo $_POST['product_description'];?></textarea>
                                                </div>
                                                <div class="gl-inline">
                                                    <div class="u-s-m-b-30">

                                                        <label class="gl-label" for="price">Price *</label>

                                                        <input class="input-text input-text--primary-style" name='price' step="0.01" type="number" id="price" value='<?php echo $_POST['product_price'];?>'></div>
                                                    <div class="u-s-m-b-30">

                                                        <label class="gl-label" for="quantity">Quantity *</label>

                                                        <input class="input-text input-text--primary-style" name='quantity' type="number" id="quantity" placeholder="" value='<?php echo $_POST['product_quantity'];?>'></div>
                                                </div>
                                                <div class="gl-inline" style='display: flex;justify-content:center; padding-left:10px;padding-bottom:10px ;'>
                                                <div class="upload-container">
                                                    <div id="drop-area" class="drop-area" style="display:none;">
                                                        <p>Drag & Drop your images here or <span id="browse">Browse</span></p>
                                                        <input type="file" id="fileElem" name="image" accept="image/*" style="display:none">
                                        
                                                    </div>
                                            
                                                    <!-- Preview and confirmation buttons -->
                                                    <div id="preview-container" class="preview-container" style="display:block;">
                                                        <img id="preview-image" alt="Image Preview" src='<?php echo $_POST['product_image'];?>'>
                                                        <div>
                                                            <a class="btn-cancel btn btn--e-brand-b-2" id="cancel-btn">Delete Image</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <button class="btn btn--e-brand-b-2" type="submit">SAVE</button>
                                            </form>
                                        </div>
                                    </div>
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
        <?php include('footer.php');?>
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
   <script src="js/drag_drop_image.js"></script>
</body>
</html>