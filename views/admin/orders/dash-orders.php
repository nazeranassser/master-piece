<?php
include('views/partials/header_admin.php');
?>
<!--====== End - Main Header ======-->


<!--====== App Content ======-->
<div class="app-content">

    <!--====== Section 1 ======-->
    <div class="u-s-p-y-20">

        <!--====== Section Content ======-->
        
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

                                    <span class="dash__text u-s-m-b-30">Here you can see all products that have been
                                        delivered.</span>

                                        <div class="dash__filter">
                                                <form method="GET" action="/deliveryStatus" id="categoryForm">
                                                    <select class="select-box select-box--primary-style" style="border-radius:6px" name="id" id="categoryFilter" onchange="this.form.submit()">
                                                        <option value="all">All Orders</option>
                                                           <option value="processing" 
                                                                <?= isset($_GET['id']) && $_GET['id'] == 'processing' ? 'selected' : '' ?>>
                                                                Processing
                                                            </option>
                                                            <option value="shipped" 
                                                                <?= isset($_GET['id']) && $_GET['id'] == 'shipped' ? 'selected' : '' ?>>
                                                                Shipped
                                                            </option>
                                                            <option value="delivered" 
                                                                <?= isset($_GET['id']) && $_GET['id'] == 'delivered' ? 'selected' : '' ?>>
                                                                Delivered
                                                            </option>
                                                            <option value="cancelled" 
                                                                <?= isset($_GET['id']) && $_GET['id'] == 'cancelled' ? 'selected' : '' ?>>
                                                                Cancelled
                                                            </option>
                                                    </select>
                                                </form>
                                            </div>
                                   
                                                <table class="dash__table">
                                                    <thead>
                                                        <tr>
                                                            <th>Order Id</th>
                                                            <th>Shipping Address</th>
                                                            <th>Customer Phone</th>
                                                            <th>Placed On</th>
                                                            <th>Order Status</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php

                                                        // include('./php/show_admin.php');
                                                        
                                                        // $order = new orders();
                                                        // $order_row = $order->showOrders();

                                                        foreach ($orders as $order) {
                                                            $statusColor = '';
                                                switch ($order['order_status']) {
                                                    case 'processing':
                                                        $statusColor = 'background-color: gray; color: white; padding: 3px 6px; border-radius: 4px; width: 140px;';
                                                        break;
                                                    case 'shipped':
                                                        $statusColor = 'background-color: yellow; color: black; padding: 3px 6px; border-radius: 4px; width: 140px;';
                                                        break;
                                                    case 'delivered':
                                                        $statusColor = 'background-color: green; color: white; padding: 3px 6px; border-radius: 4px; width: 140px;';
                                                        break;
                                                    case 'cancelled':
                                                        $statusColor = 'background-color: red; color: white; padding: 3px 6px; border-radius: 4px; width: 140px;';
                                                        break;
                                                    default:
                                                        $statusColor = 'background-color: black; color: white; padding: 3px 6px; border-radius: 4px; width: 140px;'; // Default color if none of the cases match
                                                        break;
                                                }
                                                            if ($order['order_status'] == 'all') {
                                                                echo "<tr>
                                                        <td>" . $order['order_id'] . "</td>
                                                        <td>" . $order['delivery_address'] . "</td>
                                                        <td>" . $order['customer_phone'] . "</td>
                                                        <td>" . $order['created_at'] . "</td>
                                                        <td><span style ='" . $statusColor . "'>" . $order['order_status'] . "</td>
                                                        <td><div class='dash__table-total'>
                                                                <span>" . $order['order_total_amount_after'] . " JD</span>
                                                                <div class='dash__link dash__link--brand'>
                                                                    <form method='GET' action='/orderDetails'>
                                                                        <input type='text' value='" . $order['order_id'] . "' name='id' style='visibility: hidden;display: none;'>
                                                                        <button type='submit' class='address-book-edit btn--e-transparent-platinum-b-2' style='border:0;color:#ff4500'><a>MANAGE</a></button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>";
                                                            }
                                                            if ($order['order_status'] == 'processing') {
                                                                echo "<tr>
                                                        <td>" . $order['order_id'] . "</td>
                                                        <td>" . $order['delivery_address'] . "</td>
                                                        <td>" . $order['customer_phone'] . "</td>
                                                        <td>" . $order['created_at'] . "</td>
                                                        <td><span style ='" . $statusColor . "'>" . $order['order_status'] . "</td>
                                                        <td><div class='dash__table-total'>
                                                                <span>" . $order['order_total_amount_after'] . " JD</span>
                                                                <div class='dash__link dash__link--brand'>
                                                                    <form method='GET' action='/orderDetails'>
                                                                        <input type='text' value='" . $order['order_id'] . "' name='id' style='visibility: hidden;display: none;'>
                                                                        <button type='submit' class='address-book-edit btn--e-transparent-platinum-b-2' style='border:0;color:#ff4500'><a>MANAGE</a></button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>";
                                                            }
                                                            if ($order['order_status'] == 'shipped') {
                                                                echo "<tr>
                                                        <td>" . $order['order_id'] . "</td>
                                                        <td>" . $order['delivery_address'] . "</td>
                                                        <td>" . $order['customer_phone'] . "</td>
                                                        <td>" . $order['created_at'] . "</td>
                                                        <td><span style ='" . $statusColor . "'>" . $order['order_status'] . "</td>
                                                        <td><div class='dash__table-total'>
                                                                <span>" . $order['order_total_amount_after'] . " JD</span>
                                                                <div class='dash__link dash__link--brand'>
                                                                    <form method='GET' action='/orderDetails'>
                                                                        <input type='text' value='" . $order['order_id'] . "' name='id' style='visibility: hidden;display: none;'>
                                                                        <button type='submit' class='address-book-edit btn--e-transparent-platinum-b-2' style='border:0;color:#ff4500'><a>MANAGE</a></button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>";
                                                            }
                                                            if ($order['order_status'] == 'delivered') {
                                                                echo "<tr>
                                                        <td>" . $order['order_id'] . "</td>
                                                        <td>" . $order['delivery_address'] . "</td>
                                                        <td>" . $order['customer_phone'] . "</td>
                                                        <td>" . $order['created_at'] . "</td>
                                                        <td><span style ='" . $statusColor . "'>" . $order['order_status'] . "</td>
                                                        <td><div class='dash__table-total'>
                                                                <span>" . $order['order_total_amount_after'] . " JD</span>
                                                                <div class='dash__link dash__link--brand'>
                                                                    <form method='GET' action='/orderDetails'>
                                                                        <input type='text' value='" . $order['order_id'] . "' name='id' style='visibility: hidden;display: none;'>
                                                                        <button type='submit' class='address-book-edit btn--e-transparent-platinum-b-2' style='border:0;color:#ff4500'><a>MANAGE</a></button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>";
                                                            }
                                                            if ($order['order_status'] == 'cancelled') {
                                                                echo "<tr>
                                                        <td>" . $order['order_id'] . "</td>
                                                        <td>" . $order['delivery_address'] . "</td>
                                                        <td>" . $order['customer_phone'] . "</td>
                                                        <td>" . $order['created_at'] . "</td>
                                                        <td><span style ='" . $statusColor . "'>" . $order['order_status'] . "</td>
                                                        <td><div class='dash__table-total'>
                                                                <span>" . $order['order_total_amount_after'] . " JD</span>
                                                                <div class='dash__link dash__link--brand'>
                                                                    <form method='GET' action='/orderDetails'>
                                                                        <input type='text' value='" . $order['order_id'] . "' name='id' style='visibility: hidden;display: none;'>
                                                                        <button type='submit' class='address-book-edit btn--e-transparent-platinum-b-2' style='border:0;color:#ff4500'><a>MANAGE</a></button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>";
                                                            }
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
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 2 ======-->
</div>
<!--====== End - App Content ======-->


<!--====== Main Footer ======-->
<?php include('views/partials/footer_admin.php'); ?>