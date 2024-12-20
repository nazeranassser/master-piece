
        <!--====== Main Header ======-->
        <?php include('views/partials/header_admin.php');?>
        <!--====== End - Main Header ======-->


        <!--====== App Content ======-->
        
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
                                        // var_dump($product);
                                    ?>
                                    <!--====== End - Dashboard Features ======-->
                                </div>
                                <div class="col-lg-9 col-md-12">
                                    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
                                        <div class="dash__pad-2">
                                            <h1 class="dash__h1 u-s-m-b-14">Edit Product</h1>

                                            <span class="dash__text u-s-m-b-30"></span>
                                            <form id="productForm" enctype="multipart/form-data" class="dash-address-manipulation" method='POST' action='/product/update'>
                                                <div class="gl-inline">
                                                    <div class="u-s-m-b-30">
                                                        
                                                        <label class="gl-label" for="product-name">Product Name *</label>
                                                        <input class="input-text input-text--primary-style" type="text" name='product_name' id="product-name" placeholder="Product Name" value='<?php echo $product['product_name'];?>' required></div>
                                                        <input type='hidden' value='<?php echo $product['product_id'];?>' name='product_edit'>
                                                        <input type='hidden' value='<?php echo $product['product_image'];?>' name='image' >
                                                        <div class="u-s-m-b-30">

                                                            <!--====== Select Box ======-->

                                                            <label class="gl-label" for="categories">Categories *</label>
                                                            <select name='category_id' class="select-box select-box--primary-style" id="categories" required>
                                                                <option value="">Choose Category</option>
                                                                <?php
                                                                   foreach($categories as $category) {
                                                                    $select = '';
                                                                    if($product['category_id']==$category['category_id']){
                                                                        $select = 'selected';
                                                                    }
                                                                    echo "<option value='".$category['category_id']."' $select>".$category['category_name']."</option>";
                                                                   }
                                                                ?>          
                                                                <!-- <a href='dash-orders.php'><option>Add Category</option></a> -->
                                                            </select>
                                                            <!--====== End - Select Box ======-->
                                                        </div>

                                                    </div>
                                                <div>
                                                <label class="gl-label" for="product_description-">Product Description *</label>
                                                <textarea class='input-text--primary-style' style='width: 100%; padding:10px' id="product_description" name="product_description" rows="4" required><?php echo $product['product_description'];?></textarea>
                                                </div>
                                                <div class="gl-inline">
                                                    <div class="u-s-m-b-30">

                                                        <label class="gl-label" for="price">Price *</label>

                                                        <input class="input-text input-text--primary-style" name='product_price' step="0.01" type="number" id="product_price" value='<?php echo $product['product_price'];?>' required></div>
                                                    <div class="u-s-m-b-30">

                                                        <label class="gl-label" for="quantity">Quantity *</label>

                                                        <input class="input-text input-text--primary-style" name='product_quantity' type="number" id="product_quantity" placeholder="" value='<?php echo $product['product_quantity'];?>' required></div>
                                                    <div class="u-s-m-b-30">

                                                        <label class="gl-label" for="product_discount">Discount *</label>

                                                        <input class="input-text input-text--primary-style" name='product_discount' step="0.01" type="number" id="product_discount" placeholder="" value='<?php echo $product['product_discount'];?>' required></div>
                                                </div>
                                                <div class="gl-inline" style='display: flex;justify-content:center; padding-left:10px;padding-bottom:10px ;'>
                                                <div class="upload-container">
                                                    <div id="drop-area" class="drop-area" style="display:none;">
                                                        <p>Drag & Drop your images here or <span id="browse">Browse</span></p>
                                                        <input type="file" id="fileElem" name="image" accept="image/*" style="display:none" value="/public/images/products/<?php echo $product['product_image'];?>">
                                        
                                                    </div>
                                            
                                                    <!-- Preview and confirmation buttons -->
                                                    <div id="preview-container" class="preview-container" style="display:block;">
                                                        <img id="preview-image" src='/public/images/products/<?php echo $product['product_image']?>' >
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
    </div>
    <!--====== End - Main App ======-->


    <!--====== Google Analytics: change UA-XXXXX-Y to be your site's ID ======-->
    <?php include('views/partials/footer_admin.php');?>
