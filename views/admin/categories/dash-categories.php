<?php include('views/partials/header_admin.php');?>

        <!--====== End - Main Header ======-->


        <!--====== App Content ======-->
        <div class="app-content">

            <!--====== Section 1 ======-->
            
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
                                    
                                    ?><div>

                                    <a class="dash__custom-link btn--e-brand-b-2" href="/category-add"><i class="fas fa-plus u-s-m-r-8"></i>

                                        <span>Add New Category</span></a></div>
                                    <!--====== End - Dashboard Features ======-->
                                </div>
                                <div class="col-lg-9 col-md-12">
                                    <div class="dash__box dash__box--shadow dash__box--bg-white dash__box--radius u-s-m-b-30">
                                    <div class="dash__pad-2">
                                            <div class="dash__address-header">
                                                <h1 class="dash__h1">Categories</h1>
                                            </div>
                                        </div>
                                        <div class="dash__table">
                                            <table class="dash__table">
                                                <thead>
                                                    <tr>
                                                        <th>Category Name</th>
                                                        <th>Category Image</th>
        
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                
                                                // include('show_admin.php');
                                                
                                                  foreach($categories as $category){
                                                    echo "  <tr>
                                                         <form method='POST' action='category-edit/".$category['category_id']."'>
                                                            <input type='hidden' value='".$category['category_id']."' name='category_id''>
                                                            <th>".$category['category_name']."<input type='hidden' value='".$category['category_name']."' name='category_name''></th>
                                                            <th><a href='/update_product/".$category['category_id']."'><div  class='description__img-wrap'>
                                                            <img class='u-img-fluid' style='border-radius: 10000px;width: 90px;height: 90px;' src='/public/images/categories/".$category['category_image']."' alt=''></div></a></th>
                                                            <th style='display: flex;'>
                                                            <input type='hidden' value='".$category['category_id']."' name='edit''>
                                                            <button type='submit' class='address-book-edit btn--e-transparent-platinum-b-2' style='margin-right:4px ;'>Edit</button></form>
                                                            <form method='POST' action='category-delete'>
                                                            <input type='hidden' value='".$category['category_id']."' name='delete_category''>
                                                            <button type='submit' class='address-book-edit btn--e-transparent-platinum-b-2'>Delete</button></form></th>
                                                        </tr>";
                                                }
                                                ?>
                                                </tbody>
                                            </table>
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
        <?php include('views/partials/footer_admin.php');?>
