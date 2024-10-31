<?php include('views/partials/header.php'); ?>
<h1>Order Details</h1>
<p>Order ID: <?php echo htmlspecialchars($order['order_ID']); ?></p>
<p>Order Date: <?php echo date('Y-m-d H:i:s', strtotime($order['order_date'])); ?></p>
<p>Status: <?php echo htmlspecialchars($order['status']); ?></p>

<table border="1">
    <thead>
        <tr>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $grand_total = 0;
        foreach ($order_details as $item): 
            $item_total = $item['quantity'] * $item['product_price'];
            $grand_total += $item_total;
        ?>
            <tr>
                <td>
                    <img src="<?php echo htmlspecialchars($item['product_image']); ?>" 
                         alt="<?php echo htmlspecialchars($item['product_name']); ?>" 
                         width="50">
                </td>
                <td><?php echo htmlspecialchars($item['product_name']); ?></td>
                <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                <td>$<?php echo number_format($item['product_price'], 2); ?></td>
                <td>$<?php echo number_format($item_total, 2); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="4" align="right"><strong>Total Amount:</strong></td>
            <td>$<?php echo number_format($order['total_amount'], 2); ?></td>
        </tr>
    </tfoot>
</table>
<?php include('views/partials/footer.php'); ?>


//////////////////////////////////////////////////////////////////////////////////////



<?php include('views/partials/header.php') ?> 

<link rel="stylesheet" href="public/css/app.css">


<div id="app">
    <div class="app-content">
        

        <div class="u-s-p-b-60">
            <div class="section__content">
                <div class="dash">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-12">
                                <div class="dash__box dash__box--bg-white dash__box--shadow u-s-m-b-30">
                                    <div class="dash__pad-1">
                                        <span class="dash__text u-s-m-b-16"><?php echo  'Hello ' . htmlspecialchars($_SESSION['usersName']) ; ?></span>
                                        <ul class="dash__f-list">
                                            <li><a class="dash-active" href="profile-update">Manage My Account</a></li>
                                            <li><a href="profile-main">My Profile</a></li>
                                            
                                            <li><a href="profile-order">My Orders</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <table border="1">
    <thead>
        <tr>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $grand_total = 0;
        foreach ($order_details as $item): 
            $item_total = $item['quantity'] * $item['product_price'];
            $grand_total += $item_total;
        ?>
            <tr>
                <td>
                    <img src="<?php echo htmlspecialchars($item['product_image']); ?>" 
                         alt="<?php echo htmlspecialchars($item['product_name']); ?>" 
                         width="50">
                </td>
                <td><?php echo htmlspecialchars($item['product_name']); ?></td>
                <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                <td>$<?php echo number_format($item['product_price'], 2); ?></td>
                <td>$<?php echo number_format($item_total, 2); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="4" align="right"><strong>Total Amount:</strong></td>
            <td>$<?php echo number_format($order['total_amount'], 2); ?></td>
        </tr>
    </tfoot>
</table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('views/partials/footer.php') ?> 
