<!--====== Main Header ======-->
<?php include 'views/partials/header.php';
// var_dump($_SESSION);
// die();
?>
<!--====== End - Main Header ======-->

<!--====== Checkout Content ======-->
<!-- Delivery Information -->
<div class="container">
    <h1 class="section-title">DELIVERY INFORMATION & ORDER SUMMARY</h1>

    <!-- Flex Container for Delivery Info and Order Summary -->
    <div class="d-flex justify-content-between delivery-order-container">
        <!-- Delivery Info Section -->
        <div class="delivery-info flex-item">
            <h2>DELIVERY INFORMATION</h2>
            <p><strong>First Name:</strong> <?php echo htmlspecialchars($deliveryInfo['customer_name']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($deliveryInfo['customer_email']); ?></p>
            <p><strong>Phone:</strong> <?php echo htmlspecialchars($deliveryInfo['customer_phone']); ?></p>

            <?php if (!empty($deliveryInfo['customer_address2'])): ?>
                <div class="address-selection">
                    <label><strong style="color:red;">Choose one of your addresses:</strong></label><br>
                    <label>
                        <input type="radio" name="selected_address"
                            value="<?php echo htmlspecialchars($deliveryInfo['customer_address1']); ?>" checked>
                        <strong>Address 1:</strong> <?php echo htmlspecialchars($deliveryInfo['customer_address1']); ?>
                    </label><br>
                    <label>
                        <input type="radio" name="selected_address"
                            value="<?php echo htmlspecialchars($deliveryInfo['customer_address2']); ?>">
                        <strong>Address 2:</strong> <?php echo htmlspecialchars($deliveryInfo['customer_address2']); ?>
                    </label>
                </div>
            <?php else: ?>
                <p><strong>Address:</strong> <?php echo htmlspecialchars($deliveryInfo['customer_address1']); ?></p>
            <?php endif; ?>
        </div>

        <!-- Order Summary Section -->
        <div class="order-summary flex-item">
            <h2>ORDER SUMMARY</h2>
            <?php if (!empty($cartItems)): ?>
                <table class="order-summary-table">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        ?>
                        <?php foreach ($cartItems2 as $item): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($item['product_name']); ?></td>
                                <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                                <td>
                                    <?php
                                    if ($item['discount']) {
                                        $_SESSION['discount'] = $item['discount'];
                                    }
                                    if ($item['discount'] > 0): ?>
                                        <span class="original-price"><s style="color: red;"><?= number_format($item['price'], 2); ?>
                                                JD</s></span>
                                        <span class="discounted-price"><?= number_format($item['discounted_price'], 2); ?>
                                            JD</span>
                                    <?php else: ?>
                                        <?= number_format($item['price'], 2); ?> JD
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
                <p class="order-total"><strong>Subtotal:</strong> <?php echo number_format($orderTotal, 2); ?>JD</p>
                <p class="order-total"><strong>Shipping:</strong> 2.00JD</p>
                <p class="order-total"><strong>Total:</strong> <?php echo number_format($total, 2); ?>JD</p>
                <div class="coupon-section">
                    <?php if (!isset($_SESSION['coupon'])): ?>
                        <form method="post" action="/applyCoupon" id="applyForm">
                            <input type="text" id="coupon_code" name="coupon_code" placeholder="Enter coupon code" required>
                            <button type="submit" class="apply-coupon-button">Apply</button>
                        </form>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['coupon'])): ?>
                        <p><strong>Coupon Applied:</strong> <?= htmlspecialchars($_SESSION['coupon_code']); ?></p>
                        <p><strong>Discount Amount:</strong> <?=$_SESSION['coupon']; ?>JD</p>
                        <p><strong>New Total:</strong> <?= $_SESSION['total']; ?>JD</p>

                        <form method="post" action="/removeCoupon" id="removeForm">
                            <button type="submit" name="remove_coupon" class="remove-coupon-button">Remove</button>
                        </form>
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <p class="empty-cart-message">Your cart is empty.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Payment Information Section -->
    <h2 class="section-title">PAYMENT INFORMATION</h2>
    <form action="placeOrder" method="POST" class="payment-form">
        <div class="radio-box">
            <input type="radio" id="cash-on-delivery" name="payment_method" value="cod" checked>
            <label for="cash-on-delivery">Cash on Delivery</label>
        </div>
        <button type="submit" class="submit-button">PLACE ORDER</button>
    </form>
</div>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
        background-color: #f4f4f4;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .section-title {
        font-size: 24px;
        margin-bottom: 15px;
        color: #333;
        text-align: center;
        border-bottom: 2px solid #ddd;
        padding-bottom: 10px;
    }

    .delivery-order-container {
        display: flex;
        flex-direction: row;
        gap: 20px;
        margin-bottom: 30px;
    }

    .flex-item {
        flex: 1;
        padding: 15px;
        background-color: #fafafa;
        border-radius: 8px;
        border: 1px solid #ddd;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .delivery-info p,
    .order-summary p {
        margin: 5px 0;
    }

    .order-summary-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 15px;
    }

    .order-summary-table th,
    .order-summary-table td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }

    .order-summary-table th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    .original-price {
        color: red;
    }

    .discounted-price {
        color: green;
        font-weight: bold;
    }

    .order-total {
        font-size: 16px;
        margin: 5px 0;
    }

    .empty-cart-message {
        color: #888;
        font-style: italic;
        text-align: center;
    }

    .applied-coupon {
        margin-top: 10px;
        font-weight: bold;
    }

    .payment-form {
        margin-top: 30px;
        padding: 15px;
        background-color: #fafafa;
        border-radius: 8px;
        border: 1px solid #ddd;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .radio-box {
        margin-bottom: 10px;
    }

    .submit-button {
        display: block;
        width: 100%;
        padding: 10px;
        background-color: #D2691E;
        /* Custom color from your preference */
        color: #fff;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .submit-button:hover {
        background-color: #FF6F61;
    }

    .error-message {
        color: red;
        font-size: 14px;
        margin-top: 5px;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const applyForm = document.getElementById('applyForm');
        const removeForm = document.getElementById('removeForm');

        if (<?= isset($_SESSION['coupon']) ? 'true' : 'false'; ?>) {
            if (applyForm) {
                applyForm.style.display = 'none';
            }
            if (removeForm) {
                removeForm.style.display = 'block';
            }
        } else {
            if (applyForm) {
                applyForm.style.display = 'block';
            }
            if (removeForm) {
                removeForm.style.display = 'none';
            }
        }
    });
</script>

<!-- <script>
    function applyCoupon() {
        document.getElementById("coupon-form").action="/applyCoupon";
        document.getElementById("coupon-form").submit();
    }
document.getElementById('apply-coupon').addEventListener('click', function() {
    let form = document.getElementById('coupon-form');
    let formData = new FormData(form);

    // Log formData to check if the coupon code is included
    for (let pair of formData.entries()) {
        console.log(pair[0] + ': ' + pair[1]);
    }

    fetch('applyCoupon', { // Replace with your actual controller path
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.message);
            // Hide the "Apply" button and show the "Remove" button logic
            document.getElementById('apply-coupon').classList.remove('d-none');
            document.getElementById('remove-coupon').classList.add('d-none');
            alert('Coupon applied');
            location.reload(); // Reload to reflect the coupon changes
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});

// Optionally, add a remove coupon event to handle the reset
document.getElementById('remove-coupon').addEventListener('click', function() {
    // Logic to remove coupon session or reset the form
    form.reset();
    document.getElementById('apply-coupon').classList.add('d-none');
    document.getElementById('remove-coupon').classList.remove('d-none');
    alert('Coupon removed');
    location.reload();
});
</script> -->
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

                        <span class="app-setting__text">Please enable JavaScript in your browser or upgrade to a
                            JavaScript-capable browser.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</noscript>

</body>

</html>