<?php
include('connection.php');
session_start();
?>
<?php
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Capture form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $order_note = $_POST['order_note'];

    // 2. Validate form data (basic validation)
    if (!empty($first_name) && !empty($last_name) && !empty($email) && !empty($phone) && !empty($city) && !empty($address)) {
        
        // 3. Connect to the database
        $conn = new mysqli("localhost", "root", "", "ecommerce_db");
        
        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // 4. Insert data into the database
        $sql = "INSERT INTO delivery_info (first_name, last_name, email, phone, city, address, order_note)
                VALUES ('$first_name', '$last_name', '$email', '$phone', '$city', '$address', '$order_note')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Delivery information saved successfully!');</script>";
        } else {
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }

        // 5. Close the connection
        $conn->close();
    } else {
        echo "<script>alert('Please fill in all required fields.');</script>";
    }
}
?>


<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $conn = new mysqli("localhost", "root", "", "ecommerce_db");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // 1. Capture the order details
    $products = [
        ["name" => "Yellow Wireless Headphone", "quantity" => 1, "price" => 150.00],
        ["name" => "Nikon DSLR Camera 4k", "quantity" => 1, "price" => 150.00],
        ["name" => "New Dress D Nice Elegant", "quantity" => 1, "price" => 150.00],
        ["name" => "New Fashion D Nice Elegant", "quantity" => 1, "price" => 150.00]
    ];

    // Calculate total amount
    $total_amount = 379.00; // subtotal from the form (you can calculate dynamically if needed)
    $shipping = 4.00; // fixed shipping
    $grand_total = $total_amount + $shipping;

    // 2. Get the payment method
    $payment_method = $_POST['payment'];

    // 3. Insert the order into the database
    foreach ($products as $product) {
        $product_name = $product['name'];
        $quantity = $product['quantity'];
        $price = $product['price'];

        $sql = "INSERT INTO orders (product_name, quantity, price, shipping_address, billing_address, payment_method, total_amount)
                VALUES ('$product_name', $quantity, $price, '4247 Ashford Drive Virginia VA-20006 USA', 'Default Billing Address', '$payment_method', $grand_total)";
        if ($conn->query($sql) !== TRUE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close the connection
    $conn->close();

    // Display success message and redirect (optional)
    echo "<script>alert('Order placed successfully!'); window.location.href = 'order_confirmation.php';</script>";
}
?>


<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="images/favicon.png" rel="shortcut icon">
    <title>Ludus - Electronics, Apparel, Computers, Books, DVDs & more</title>

    <!--====== Google Font ======-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">

    <!--====== Vendor Css ======-->
    <link rel="stylesheet" href="css/vendor.css">

    <!--====== Utility-Spacing ======-->
    <link rel="stylesheet" href="css/utility.css">

    <!--====== App ======-->
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="config">
    <div class="preloader is-active">
        <div class="preloader__wrap">

            <img class="preloader__img" src="images/preloader.png" alt=""></div>
    </div>

    <!--====== Main App ======-->
    <div id="app">


  <!--====== Main Header ======-->
  <?php include 'navbar.php'; ?>
  <!--====== End - Main Header ======-->





        <!--====== App Content ======-->
        <div class="app-content">

            <!--====== Section 1 ======-->
            <div class="u-s-p-y-60">

                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="container">
                        <div class="breadcrumb">
                            <div class="breadcrumb__wrap">
                                <ul class="breadcrumb__list">
                                    <li class="has-separator">

                                        <a href="index.html">Home</a></li>
                                    <li class="is-marked">

                                        <a href="checkout.html">Checkout</a></li>
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
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div id="checkout-msg-group">
                                    <div class="msg u-s-m-b-30">

                                        <span class="msg__text">Returning customer?

                                            <a class="gl-link" href="#return-customer" data-toggle="collapse">Click here to login</a></span>
                                        <div class="collapse" id="return-customer" data-parent="#checkout-msg-group">
                                            <div class="l-f u-s-m-b-16">

                                                <span class="gl-text u-s-m-b-16">If you have an account with us, please log in.</span>
                                                <form class="l-f__form">
                                                    <div class="gl-inline">
                                                        <div class="u-s-m-b-15">

                                                            <label class="gl-label" for="login-email">E-MAIL *</label>

                                                            <input class="input-text input-text--primary-style" type="text" id="login-email" placeholder="Enter E-mail"></div>
                                                        <div class="u-s-m-b-15">

                                                            <label class="gl-label" for="login-password">PASSWORD *</label>

                                                            <input class="input-text input-text--primary-style" type="text" id="login-password" placeholder="Enter Password"></div>
                                                    </div>
                                                    <div class="gl-inline">
                                                        <div class="u-s-m-b-15">

                                                            <button class="btn btn--e-transparent-brand-b-2" type="submit">LOGIN</button></div>
                                                        <div class="u-s-m-b-15">

                                                            <a class="gl-link" href="lost-password.html">Lost Your Password?</a></div>
                                                    </div>

                                                    <!--====== Check Box ======-->
                                                    <div class="check-box">

                                                        <input type="checkbox" id="remember-me">
                                                        <div class="check-box__state check-box__state--primary">

                                                            <label class="check-box__label" for="remember-me">Remember Me</label></div>
                                                    </div>
                                                    <!--====== End - Check Box ======-->
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="msg">

                                        <span class="msg__text">Have a coupon?

                                            <a class="gl-link" href="#have-coupon" data-toggle="collapse">Click Here to enter your code</a></span>
                                        <div class="collapse" id="have-coupon" data-parent="#checkout-msg-group">
                                            <div class="c-f u-s-m-b-16">

                                                <span class="gl-text u-s-m-b-16">Enter your coupon code if you have one.</span>
                                                <form class="c-f__form">
                                                    <div class="u-s-m-b-16">
                                                        <div class="u-s-m-b-15">

                                                            <label for="coupon"></label>

                                                            <input class="input-text input-text--primary-style" type="text" id="coupon" placeholder="Coupon Code"></div>
                                                        <div class="u-s-m-b-15">

                                                            <button class="btn btn--e-transparent-brand-b-2" type="submit">APPLY</button></div>
                                                    </div>
                                                </form>
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


            <!--====== Section 3 ======-->
<div class="u-s-p-b-60">
    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="container">
            <div class="checkout-f">
                <div class="row">
                    <div class="col-lg-6">
                        <h1 class="checkout-f__h1">DELIVERY INFORMATION</h1>
                        <form class="checkout-f__delivery" method="POST" action="">
                            <div class="u-s-m-b-30">
                                <div class="gl-inline">
                                    <div class="u-s-m-b-15">
                                        <label class="gl-label" for="billing-fname">FIRST NAME *</label>
                                        <input class="input-text input-text--primary-style" type="text" id="billing-fname" name="first_name" required>
                                    </div>
                                    <div class="u-s-m-b-15">
                                        <label class="gl-label" for="billing-lname">LAST NAME *</label>
                                        <input class="input-text input-text--primary-style" type="text" id="billing-lname" name="last_name" required>
                                    </div>
                                </div>
                                <div class="u-s-m-b-15">
                                    <label class="gl-label" for="billing-email">E-MAIL *</label>
                                    <input class="input-text input-text--primary-style" type="email" id="billing-email" name="email" required>
                                </div>
                                <div class="u-s-m-b-15">
                                    <label class="gl-label" for="billing-phone">PHONE *</label>
                                    <input class="input-text input-text--primary-style" type="text" id="billing-phone" name="phone" required>
                                </div>
                                <div class="u-s-m-b-15">
                                    <label class="gl-label" for="billing-town-city">CITY *</label>
                                    <input class="input-text input-text--primary-style" type="text" id="billing-town-city" name="city" required>
                                </div>
                                <div class="u-s-m-b-15">
                                    <label class="gl-label" for="billing-street">ADDRESS *</label>
                                    <input class="input-text input-text--primary-style" type="text" id="billing-street" name="address" required>
                                </div>
                                <div class="u-s-m-b-15">
                                    <label class="gl-label" for="order-note">ORDER NOTE</label>
                                    <textarea class="text-area text-area--primary-style" id="order-note" name="order_note"></textarea>
                                </div>
                                <div>
                                    <button class="btn btn--e-transparent-brand-b-2" type="submit">SAVE</button>
                                </div>
                            </div>
                        </form>
                    </div>



                        <div class="col-lg-6">
                            <h1 class="checkout-f__h1">ORDER SUMMARY</h1>

                            <!--====== Order Summary ======-->
                            <div class="o-summary">
                                <div class="o-summary__section u-s-m-b-30">
                                    <div class="o-summary__item-wrap gl-scroll">
                                        <div class="o-card">
                                            <div class="o-card__flex">
                                                <div class="o-card__img-wrap">
                                                    <img class="u-img-fluid" src="images/product/electronic/product3.jpg" alt="">
                                                </div>
                                                <div class="o-card__info-wrap">
                                                    <span class="o-card__name">
                                                        <a href="product-detail.html">Yellow Wireless Headphone</a>
                                                    </span>
                                                    <span class="o-card__quantity">Quantity x 1</span>
                                                    <span class="o-card__price">$150.00</span>
                                                </div>
                                            </div>
                                            <a class="o-card__del far fa-trash-alt"></a>
                                        </div>
                                        <div class="o-card">
                                            <div class="o-card__flex">
                                                <div class="o-card__img-wrap">
                                                    <img class="u-img-fluid" src="images/product/electronic/product18.jpg" alt="">
                                                </div>
                                                <div class="o-card__info-wrap">
                                                    <span class="o-card__name">
                                                        <a href="product-detail.html">Nikon DSLR Camera 4k</a>
                                                    </span>
                                                    <span class="o-card__quantity">Quantity x 1</span>
                                                    <span class="o-card__price">$150.00</span>
                                                </div>
                                            </div>
                                            <a class="o-card__del far fa-trash-alt"></a>
                                        </div>
                                        <div class="o-card">
                                            <div class="o-card__flex">
                                                <div class="o-card__img-wrap">
                                                    <img class="u-img-fluid" src="images/product/women/product8.jpg" alt="">
                                                </div>
                                                <div class="o-card__info-wrap">
                                                    <span class="o-card__name">
                                                        <a href="product-detail.html">New Dress D Nice Elegant</a>
                                                    </span>
                                                    <span class="o-card__quantity">Quantity x 1</span>
                                                    <span class="o-card__price">$150.00</span>
                                                </div>
                                            </div>
                                            <a class="o-card__del far fa-trash-alt"></a>
                                        </div>
                                        <div class="o-card">
                                            <div class="o-card__flex">
                                                <div class="o-card__img-wrap">
                                                    <img class="u-img-fluid" src="images/product/men/product8.jpg" alt="">
                                                </div>
                                                <div class="o-card__info-wrap">
                                                    <span class="o-card__name">
                                                        <a href="product-detail.html">New Fashion D Nice Elegant</a>
                                                    </span>
                                                    <span class="o-card__quantity">Quantity x 1</span>
                                                    <span class="o-card__price">$150.00</span>
                                                </div>
                                            </div>
                                            <a class="o-card__del far fa-trash-alt"></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="o-summary__section u-s-m-b-30">
                                    <div class="o-summary__box">
                                        <h1 class="checkout-f__h1">SHIPPING & BILLING</h1>
                                        <div class="ship-b">
                                            <span class="ship-b__text">Ship to:</span>
                                            <div class="ship-b__box u-s-m-b-10">
                                                <p class="ship-b__p">4247 Ashford Drive Virginia VA-20006 USA (+0) 900901904</p>
                                                <a class="ship-b__edit btn--e-transparent-platinum-b-2" data-modal="modal" data-modal-id="#edit-ship-address">Edit</a>
                                            </div>
                                            <div class="ship-b__box">
                                                <span class="ship-b__text">Bill to default billing address</span>
                                                <a class="ship-b__edit btn--e-transparent-platinum-b-2" data-modal="modal" data-modal-id="#edit-ship-address">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="o-summary__section u-s-m-b-30">
                                    <div class="o-summary__box">
                                        <table class="o-summary__table">
                                            <tbody>
                                                <tr>
                                                    <td>SHIPPING</td>
                                                    <td>$4.00</td>
                                                </tr>
                                                <tr>
                                                    <td>TAX</td>
                                                    <td>$0.00</td>
                                                </tr>
                                                <tr>
                                                    <td>SUBTOTAL</td>
                                                    <td>$379.00</td>
                                                </tr>
                                                <tr>
                                                    <td>GRAND TOTAL</td>
                                                    <td>$379.00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="o-summary__section u-s-m-b-30">
                                    <div class="o-summary__box">
                                        <h1 class="checkout-f__h1">PAYMENT INFORMATION</h1>
                                        <form class="checkout-f__payment" method="POST" action="">
                                            <div class="u-s-m-b-10">
                                                <!--====== Radio Box ======-->
                                                <div class="radio-box">
                                                    <input type="radio" id="cash-on-delivery" name="payment" value="Cash on Delivery" required>
                                                    <div class="radio-box__state radio-box__state--primary">
                                                        <label class="radio-box__label" for="cash-on-delivery">Cash on Delivery</label>
                                                    </div>
                                                </div>
                                                <!--====== End - Radio Box ======-->
                                                <span class="gl-text u-s-m-t-6">Pay Upon Cash on delivery. (This service is only available for some countries)</span>
                                            </div>
                                            <div>
                                                <button class="btn btn--e-brand-b-2" type="submit">PLACE ORDER</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--====== End - Order Summary ======-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 3 ======-->
</div>
<!--====== End - App Content ======-->
<footer>
        <?php include 'footer.php' ?>
    </footer>
        

        <!--====== Modal Section ======-->


        <!--====== Shipping Address Add Modal ======-->
        <div class="modal fade" id="edit-ship-address">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="checkout-modal2">
                            <div class="u-s-m-b-30">
                                <div class="dash-l-r">
                                    <h1 class="gl-modal-h1">Shipping Address</h1>
                                    <div class="dash__link dash__link--brand">

                                        <a data-modal="modal" data-modal-id="#add-ship-address" data-dismiss="modal">Add new Address</a></div>
                                </div>
                            </div>
                            <form class="checkout-modal2__form">
                                <div class="dash__table-2-wrap u-s-m-b-30 gl-scroll">
                                    <table class="dash__table-2">
                                        <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>Full Name</th>
                                                <th>Address</th>
                                                <th>Region</th>
                                                <th>Phone Number</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>

                                                    <!--====== Radio Box ======-->
                                                    <div class="radio-box">

                                                        <input type="radio" id="address-1" name="default-address" checked="">
                                                        <div class="radio-box__state radio-box__state--primary">

                                                            <label class="radio-box__label" for="address-1"></label></div>
                                                    </div>
                                                    <!--====== End - Radio Box ======-->
                                                </td>
                                                <td>John Doe</td>
                                                <td>4247 Ashford Drive Virginia VA-20006 USA</td>
                                                <td>Virginia VA-20006 USA</td>
                                                <td>(+0) 900901904</td>
                                                <td>
                                                    <div class="gl-text">Default Shipping Address</div>
                                                    <div class="gl-text">Default Billing Address</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>

                                                    <!--====== Radio Box ======-->
                                                    <div class="radio-box">

                                                        <input type="radio" id="address-2" name="default-address">
                                                        <div class="radio-box__state radio-box__state--primary">

                                                            <label class="radio-box__label" for="address-2"></label></div>
                                                    </div>
                                                    <!--====== End - Radio Box ======-->
                                                </td>
                                                <td>Doe John</td>
                                                <td>1484 Abner Road</td>
                                                <td>Eau Claire WI - Wisconsin</td>
                                                <td>(+0) 7154419563</td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="gl-modal-btn-group">

                                    <button class="btn btn--e-brand-b-2" type="submit">SAVE</button>

                                    <button class="btn btn--e-grey-b-2" type="button" data-dismiss="modal">CANCEL</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Shipping Address Add Modal ======-->


        <!--====== Shipping Address Add Modal ======-->
        <div class="modal fade" id="add-ship-address">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="checkout-modal1">
                            <form class="checkout-modal1__form">
                                <div class="u-s-m-b-30">
                                    <h1 class="gl-modal-h1">Add new Shipping Address</h1>
                                </div>
                                <div class="gl-inline">
                                    <div class="u-s-m-b-30">

                                        <label class="gl-label" for="address-fname">FIRST NAME *</label>

                                        <input class="input-text input-text--primary-style" type="text" id="address-fname" placeholder="First Name"></div>
                                    <div class="u-s-m-b-30">

                                        <label class="gl-label" for="address-lname">LAST NAME *</label>

                                        <input class="input-text input-text--primary-style" type="text" id="address-lname" placeholder="Last Name"></div>
                                </div>
                                <div class="gl-inline">
                                    <div class="u-s-m-b-30">

                                        <label class="gl-label" for="address-phone">PHONE *</label>

                                        <input class="input-text input-text--primary-style" type="text" id="address-phone"></div>
                                    <div class="u-s-m-b-30">

                                        <label class="gl-label" for="address-street">STREET ADDRESS *</label>

                                        <input class="input-text input-text--primary-style" type="text" id="address-street" placeholder="House Name and Street"></div>
                                </div>
                                <div class="gl-inline">
                                    <div class="u-s-m-b-30">

                                        <!--====== Select Box ======-->

                                        <label class="gl-label" for="address-country">COUNTRY *</label><select class="select-box select-box--primary-style" id="address-country">
                                            <option selected value="">Choose Country</option>
                                            <option value="uae">United Arab Emirate (UAE)</option>
                                            <option value="uk">United Kingdom (UK)</option>
                                            <option value="us">United States (US)</option>
                                        </select>
                                        <!--====== End - Select Box ======-->
                                    </div>
                                    <div class="u-s-m-b-30">

                                        <!--====== Select Box ======-->

                                        <label class="gl-label" for="address-state">STATE/PROVINCE *</label><select class="select-box select-box--primary-style" id="address-state">
                                            <option selected value="">Choose State/Province</option>
                                            <option value="al">Alabama</option>
                                            <option value="al">Alaska</option>
                                            <option value="ny">New York</option>
                                        </select>
                                        <!--====== End - Select Box ======-->
                                    </div>
                                </div>
                                <div class="gl-inline">
                                    <div class="u-s-m-b-30">

                                        <label class="gl-label" for="address-city">TOWN/CITY *</label>

                                        <input class="input-text input-text--primary-style" type="text" id="address-city"></div>
                                    <div class="u-s-m-b-30">

                                        <label class="gl-label" for="address-street">ZIP/POSTAL CODE *</label>

                                        <input class="input-text input-text--primary-style" type="text" id="address-postal" placeholder="Zip/Postal Code"></div>
                                </div>
                                <div class="gl-modal-btn-group">

                                    <button class="btn btn--e-brand-b-2" type="submit">SAVE</button>

                                    <button class="btn btn--e-grey-b-2" type="button" data-dismiss="modal">CANCEL</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Shipping Address Add Modal ======-->
        <!--====== End - Modal Section ======-->
    </div>
    <!--====== End - Main App ======-->


    <!--====== Google Analytics: change UA-XXXXX-Y to be your site's ID ======-->
    <script>
        window.ga = function() {
            ga.q.push(arguments)
        };
        ga.q = [];
        ga.l = +new Date;
        ga('create', 'UA-XXXXX-Y', 'auto');
        ga('send', 'pageview')
    </script>
    <script src="https://www.google-analytics.com/analytics.js" async defer></script>

    <!--====== Vendor Js ======-->
    <script src="js/vendor.js"></script>

    <!--====== jQuery Shopnav plugin ======-->
    <script src="js/jquery.shopnav.js"></script>

    <!--====== App ======-->
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