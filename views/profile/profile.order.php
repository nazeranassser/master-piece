<?php include('views/partials/header.php'); ?>
<link rel="stylesheet" href="public/css/app.css">

<div class="app-content">
    

    <div class="u-s-p-b-60">
        <div class="section__content">
            <div class="dash">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-12">
                            <div class="dash__box dash__box--bg-white dash__box--shadow u-s-m-b-30">
                                <div class="dash__pad-1">
                                    <span class="dash__text u-s-m-b-16"><?php echo htmlspecialchars($_SESSION['usersName']); ?></span>
                                    <ul class="dash__f-list">
                                        <li><a href="profile-edit">Manage My Account</a></li>
                                        <li><a href="profile-main">My Profile</a></li>
                                        <li><a class="dash-active" href="/profile-order">My Orders</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-9 col-md-12">
                            <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
                            <div class="dash__pad-2">
    <h1 class="dash__h1 u-s-m-b-14">My Orders</h1>
    <span class="dash__text u-s-m-b-30">View all your orders placed.</span>

    <?php 
    $orders = $this->customerModel->getCustomerOrders($_SESSION['usersId']);
    if (empty($orders)): 
    ?>
        <div class="dash-l-r u-s-m-b-30">
            <div class="manage-o__text u-c-secondary">No orders found</div>
        </div>
    <?php else: ?>
        <?php foreach ($orders as $order): 
            $product_names = explode('|', $order['product_names']);
            $product_images = explode('|', $order['product_images']);
            $quantities = explode('|', $order['quantities']);
        ?>
            <div class="dash-l-r u-s-m-b-30 order-card">
                <div class="manage-o__header u-s-m-b-20">
                    <div>
                        <div class="manage-o__text-2 u-c-secondary">Order #<?php echo htmlspecialchars($order['order_id']); ?></div>
                        <div class="manage-o__text u-c-silver">Placed on <?php echo htmlspecialchars(date('F j, Y', strtotime($order['created_at']))); ?></div>
                    </div>
                </div>

                <div class="manage-o__description">
                    <div class="description__container">
                        <div class="description__img-wrap">
                            <?php if (!empty($product_images[0])): ?>
                                <img class="u-img-fluid" src="<?php echo htmlspecialchars($product_images[0]); ?>" alt="Product">
                            <?php endif; ?>
                        </div>
                        <div class="description-title">
                            <?php echo htmlspecialchars($product_names[0]); ?>
                            <?php if (count($product_names) > 1): ?>
                                <span class="manage-o__text-2 u-c-silver">
                                    + <?php echo count($product_names) - 1; ?> more items
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="description__info-wrap">
                        <div>
                            <span class="manage-o__badge badge--<?php echo strtolower(htmlspecialchars($order['order_status'])); ?>">
                                <?php echo htmlspecialchars($order['order_status']); ?>
                            </span>
                        </div>
                        <div>
                            <span class="manage-o__text-2 u-c-silver">Quantity: 
                                <span class="manage-o__text-2 u-c-secondary">
                                    <?php echo array_sum($quantities); ?>
                                </span>
                            </span>
                        </div>
                        <div>
                            <span class="manage-o__text-2 u-c-silver">Total:
                                <span class="manage-o__text-2 u-c-secondary">
                                    $<?php echo number_format($order['order_total_amount_after'], 2); ?>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="order-details-button">
    <a href="orders-detal/<?php echo $order["order_id"] ?>"  class="dash__link dash__link--brand">
        View Order Details
    </a>
</div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('views/partials/footer.php'); ?>