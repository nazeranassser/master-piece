<!--====== Main Header ======-->
<?php include('views/partials/navbar.php');?>

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
                                    include('views/admin/dashboard_features.php');
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

                                                  foreach($products as $product){
                                                    echo "  <tr>
                                                         <form method='POST' action='update_product'>
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
                                                            <form method='POST' action=''>
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

                                        <a class="dash__custom-link btn--e-brand-b-2" href="product/add"><i class="fas fa-plus u-s-m-r-8"></i>

                                            <span>Add New Product</span></a></div>
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
        <?php include('views/partials/footer.php');?>