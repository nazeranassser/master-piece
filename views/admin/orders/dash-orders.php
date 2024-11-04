<?php
include('views/partials/header_admin.php');
?>
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

                                        <a href="dash">Home</a></li>
                                    <li class="is-marked">

                                        <a>Orders</a></li>
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
                                    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                        <div class="dash__pad-2">
                                            <h1 class="dash__h1 u-s-m-b-14">Orders</h1>

                                            <span class="dash__text u-s-m-b-30">Here you can see all products that have been delivered.</span>
                                            
                                            <div class="m-order__list">
    <?php foreach($orders as $order): 
        $statusClass = '';
        if ($order['order_status'] == 'processing') {
            $statusClass = 'badge--processing';
        } else if ($order['order_status'] == 'shipped') {
            $statusClass = 'badge--shipped';
        } else if ($order['order_status'] == 'delivered') {
            $statusClass = 'badge--delivered';
        }
    ?>
        <div class="m-order__get">
            <div class="manage-o__header u-s-m-b-30">
                <div class="dash-l-r">
                    <div>
                        <div class="manage-o__text-2 u-c-secondary">Order #<?php echo $order['order_id']; ?></div>
                        <div class="manage-o__text u-c-silver">Placed on <?php echo $order['created_at']; ?></div>
                    </div>
                    <div>
                        <div class="dash__link dash__link--brand">
                            <form method="POST" action="/orderDetails">
                                <input type="hidden" value="<?php echo $order['order_id']; ?>" name="id">
                                <button type="submit" class="address-book-edit btn--e-transparent-platinum-b-2">
                                    MANAGE
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="manage-o__description">
                <div class="description__container">
                    <div class="description__info-wrap" style="width:100%;display: flex; justify-content: space-between;">
                        <div>
                            <span class="manage-o__badge <?php echo $statusClass; ?>">
                                <?php echo ucfirst($order['order_status']); ?>
                            </span>
                            <span class="manage-o__text-2 u-c-silver">Total:
                                <span class="manage-o__text-2 u-c-secondary">
                                    <?php echo $order['order_total_amount_after']; ?> JD
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

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
