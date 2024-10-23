<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="images/favicon.png" rel="shortcut icon">
    <title>Checkout - Ludus</title>

    <!--====== Google Font ======-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">

    <!--====== Vendor Css ======-->
    <link rel="stylesheet" href="css/vendor.css">

    <!--====== Utility-Spacing ======-->
    <link rel="stylesheet" href="css/utility.css">

    <!--====== App Css ======-->
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="config">
    <!--====== Preloader ======-->
    <div class="preloader is-active">
        <div class="preloader__wrap">
            <img class="preloader__img" src="images/preloader.png" alt="">
        </div>
    </div>

    <!--====== Main App ======-->
    <div id="app">

        <!--====== Main Header ======-->
        <?php include 'views/partials/navbar.php'; ?>
        <!--====== End - Main Header ======-->

        <!--====== Checkout Content ======-->
        <div class="container">
            <!-- Breadcrumb -->
            <div class="breadcrumb">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li>Checkout</li>
                </ul>
            </div>

            <!-- Delivery Information -->
            <h1>DELIVERY INFORMATION</h1>
            <div class="delivery-info">
                <p><strong>First Name:</strong> <?php echo htmlspecialchars($user['first_name']); ?></p>
                <p><strong>Last Name:</strong> <?php echo htmlspecialchars($user['last_name']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                <p><strong>Phone:</strong> <?php echo htmlspecialchars($user['phone']); ?></p>
                <p><strong>Street Address:</strong> <?php echo htmlspecialchars($user['street_address']); ?></p>
                <p><strong>City:</strong> <?php echo htmlspecialchars($user['city']); ?></p>
            </div>

            <!-- Order Summary -->
            <h1>ORDER SUMMARY</h1>
            <div class="order-summary">
                <?php if (!empty($cartItems)): ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cartItems as $item): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($item['product_name']); ?></td>
                                    <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                                    <td>$<?php echo number_format($item['price'], 2); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <p><strong>Subtotal:</strong> $<?php echo number_format($orderTotal, 2); ?></p>
                    <p><strong>Shipping:</strong> $4.00</p> <!-- Example static shipping -->
                    <p><strong>Total:</strong> $<?php echo number_format($orderTotal + 4.00, 2); ?></p>
                <?php else: ?>
                    <p>Your cart is empty.</p>
                <?php endif; ?>
            </div>

            <!-- Payment Information -->
            <h1>PAYMENT INFORMATION</h1>
            <form action="place_order.php" method="post">
                <div class="radio-box">
                    <input type="radio" id="cash-on-delivery" name="payment_method" value="cod" checked>
                    <label for="cash-on-delivery">Cash on Delivery</label>
                </div>
                <button type="submit">PLACE ORDER</button>
            </form>
        </div>
    </div>


    <footer>
    <?php include 'views/partials/footer.php'; ?>
    </footer>

    <!--====== Vendor Scripts ======-->
    <script src="js/vendor.js"></script>

    <!--====== App Scripts ======-->
    <script src="js/app.js"></script>
    
    <!--====== Noscript ======-->
    <noscript>
        <div class="app-setting">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="app-setting__wrap">
                            <h1 class="app-setting__h1">JavaScript is disabled in your browser.</h1>

                            <span class="app-setting__text">Please enable JavaScript in your browser or upgrade to a JavaScript-capable browser.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </noscript>

</body>
</html>


   

  