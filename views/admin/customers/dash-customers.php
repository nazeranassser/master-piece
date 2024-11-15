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
                                    ?>
                                    <!--====== End - Dashboard Features ======-->
                                </div>
                                <div class="col-lg-9 col-md-12">
                                    <div class="dash__box dash__box--shadow dash__box--bg-white dash__box--radius u-s-m-b-30">
                                    <div class="dash__pad-2">
                                            <div class="dash__address-header">
                                                <h1 class="dash__h1">Customers</h1>
                                            </div>
                                        </div>
                                        <div class="dash__table-2">
                                            <table class="dash__table-2">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Address 1</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                            
                                              
                                                  foreach($customers as $customer) {
                                                    if($customer['is_active']==1){
                                                        $block = "<input type='text' value='0' name='is_active' style='visibility: hidden;display: none;'>
                                                            <button type='submit' class='address-book-edit btn--e-transparent-platinum-b-2'>Block</button>";
                                                    }else{
                                                        $block = "<input type='text' value='1' name='is_active' style='visibility: hidden;display: none;'>
                                                            <button type='submit' class='address-book-edit btn--e-transparent-platinum-b-2'>Unblock</button>";
                                                    }
                                                    echo "  <tr>
                                                    <form method='POST' action='/customer-details/".$customer['customer_id']."'>
                                                            <th>".$customer['customer_name']."</th>
                                                            <th>".$customer['customer_email']."</th>
                                                            <th>".$customer['customer_address1']."</th>
                                                            <th style='display: flex;''>
                                                            </form>
                                                            <form method='POST' action='/customer/delete/".$customer['customer_id']."'>".$block."
                                                            </form></th>
                                                        </tr>";
                                                }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div>

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
        </div>
    <!--====== End - Main App ======-->


  