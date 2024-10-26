
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

                                        <a href="index.html">Home</a></li>
                                    <li class="is-marked">

                                        <a href="dash-address-book.php">Admins</a></li>
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
                                                <h1 class="dash__h1">Admins</h1>
                                            </div>
                                        </div>
                                        <div class="dash__table-2-wrap gl-scroll">
                                            <table class="dash__table-2">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Password</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                            
                                              
                                                  foreach($admins as $admin) {
                                                    echo "  <tr>
                                                    <form method='POST' action='dash-admin-edit.php'>
                                                            <th>".$admin['admin_name']."<input type='hidden' value='".$admin['admin_name']."' name='admin_name' style='visibility: hidden;display: none;'></th>
                                                            <th>".$admin['admin_email']."<input type='hidden' value='".$admin['admin_email']."' name='admin_email' style='visibility: hidden;display: none;'></th>
                                                            <th>".$admin['admin_password']."<input type='text' value='".$admin['admin_password']."' name='admin_password' style='visibility: hidden;display: none;'></th>
                                                            <th style='display: flex;''>
                                                            <input type='text' value='".$admin['admin_ID']."' name='edit' style='visibility: hidden;display: none;'>
                                                            <button type='submit' class='address-book-edit btn--e-transparent-platinum-b-2' style='margin-right:4px ;'>Edit</button></form>
                                                            <form method='POST' action='show_admin.php'>
                                                            <input type='text' value='".$admin['admin_ID']."' name='admin_delete' style='visibility: hidden;display: none;'>
                                                            <button type='submit' class='address-book-edit btn--e-transparent-platinum-b-2'>Delete</button></form></th>
                                                        </tr>";
                                                }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div>

                                        <a class="dash__custom-link btn--e-brand-b-2" href="/add-admin"><i class="fas fa-plus u-s-m-r-8"></i>

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
       <?php include('views/partials/footer.php');?>
    </div>
    <!--====== End - Main App ======-->


  