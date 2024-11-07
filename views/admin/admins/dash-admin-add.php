<?php include('views/partials/header_admin.php');?>

        <!--====== End - Main Header ======-->

        <br>
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
                                   include('views/admin/dashboard_features.php');?>
                                    <!--====== End - Dashboard Features ======-->
                                </div>
                                <div class="col-lg-9 col-md-12">
                                    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
                                        <div class="dash__pad-2">
                                            <h1 class="dash__h1 u-s-m-b-14" style="padding-bottom: 10px;">Add new Admin</h1>

                                            <form class="dash-address-manipulation" method="POST" action="/register">
                                                <div class="gl-inline">
                                                    <div class="u-s-m-b-30">

                                                        <label class="gl-label" for="address-name">NAME *</label>

                                                        <input name="add_admin" type="hidden">
                                                        <input style="" class="input-text input-text--primary-style" name="name" type="text" id="address-name" placeholder="First Name" required></div>
                                                    <div class="u-s-m-b-30">

                                                        <label class="gl-label" for="address-email">Email *</label>

                                                        <input class="input-text input-text--primary-style" name="email" type="email" id="address-email" placeholder="name@example.com" required></div>
                                                </div>
                                                <div class="gl-inline">
                                                    <div class="u-s-m-b-30">

                                                        <label class="gl-label" for="address-password">Password *</label>

                                                        <input class="input-text input-text--primary-style" name="password" type="password" id="address-password" required></div>
                                                        <div class="u-s-m-b-30">

                                                        <label class="gl-label" for="address-password">Confirm Password *</label>

                                                        <input class="input-text input-text--primary-style" name="password2" type="password" id="address-password" required></div>
                                                        
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
        <?php
    include('views/partials/footer_admin.php');
    ?>
    </div>
    <!--====== End - Main App ======-->

