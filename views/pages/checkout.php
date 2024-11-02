<!--====== Main Header ======-->
<?php include 'views/partials/header.php';
?>
<!--====== End - Main Header ======-->

<!--====== Checkout Content ======-->
<!-- Delivery Information -->
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f9f9f9;
    }

    .container {
        max-width: 1200px;
        margin: auto;
        padding: 20px;
        background-color: #ffffff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    .merged-section {
        display: flex;
        justify-content: space-between;
        gap: 20px;
    }

    .delivery-info,
    .order-summary {
        flex: 1;
        padding: 20px;
        background-color: #f4f4f4;
        border-radius: 8px;
    }

    .section-title {
        font-size: 24px;
        color: #333;
        margin-bottom: 15px;
    }

    h1.section-title {
        margin-top: 0;
    }

    .order-summary-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    .order-summary-table th,
    .order-summary-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .order-summary-table th {
        background-color: #e0e0e0;
    }

    .order-total {
        font-weight: bold;
        margin-top: 10px;
    }

    .applied-coupon {
        margin-top: 10px;
        font-size: 14px;
        color: green;
    }

    input[type="text"] {
        width: calc(100% - 120px);
        padding: 8px;
        margin-right: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    button {
    padding: 10px 20px;
    font-size: 14px;
    font-weight: bold;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    opacity: 0.9;
}

/* Specific styling for each button */
.apply-coupon-button {
    background-color: #28a745; /* Green for applying a coupon */
}

.apply-coupon-button:hover {
    background-color: #218838;
}

.remove-coupon-button {
    background-color: #dc3545; /* Red for removing a coupon */
}

.remove-coupon-button:hover {
    background-color: #c82333;
}

.submit-button {
    background-color: #007bff; /* Blue for place order */
    width: 100%;
    padding: 15px; /* Increased padding for emphasis */
    font-size: 16px;
}

.submit-button:hover {
    background-color: #0056b3;
}

    .payment-form {
        margin-top: 20px;
        padding: 20px;
        background-color: #f4f4f4;
        border-radius: 8px;
    }

    .radio-box {
        margin-bottom: 15px;
    }
    .error-message {
        color: red;
    }
</style>
</head>

<body>
    <div class="container">
        <div class="merged-section">
            <div class="delivery-info">
                <h1 class="section-title">DELIVERY INFORMATION</h1>
                <p><strong>First Name:</strong> <?php echo htmlspecialchars($deliveryInfo['customer_name']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($deliveryInfo['customer_email']); ?></p>
                <p><strong>Phone:</strong> <?php echo htmlspecialchars($deliveryInfo['customer_phone']); ?></p>

                <!-- Address Selection -->
                <?php if (!empty($deliveryInfo['customer_address2'])): ?>
                    <div class="address-selection">
                        <label><strong style="color:red;">Choose one of your addresses:</strong></label><br>
                        <label>
                            <input type="radio" name="selected_address"
                                value="<?php echo htmlspecialchars($deliveryInfo['customer_address1']); ?>" checked>
                            <strong>Address 1:</strong> <?php echo htmlspecialchars($deliveryInfo['customer_address1']); ?>
                        </label>
                        <br>
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
            <div class="order-summary">
                <h1 class="section-title">ORDER SUMMARY</h1>
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
                            <?php foreach ($cartItems as $item): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($item['product_name']); ?></td>
                                    <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                                    <td>$<?php echo number_format($item['price'], 2); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <p class="order-total"><strong>Subtotal:</strong> $<?php echo number_format($orderTotal, 2); ?></p>
                    <p class="order-total"><strong>Shipping:</strong> $4.00</p>
                    <p class="order-total"><strong>Total:</strong> $<?php
                    $total = $orderTotal + 4.00;
                    if (isset($_SESSION['discount'])) {
                        $total -= $_SESSION['discount'];
                        echo number_format($total, 2);
                    } else {
                        echo number_format($total, 2);
                    }
                    ?></p>

                    <!-- Coupon Input and Display -->
                    <?php if (isset($_SESSION['discount'])): ?>
                        <p class="applied-coupon"><strong>Applied Coupon:</strong>
                            <?php echo htmlspecialchars($_SESSION['coupon_code']); ?>
                        <form action="/removeCoupon" method="post" style="display:inline;">
                            <button type="submit">Remove Coupon</button>
                            <div class="radio-box">
                                <input type="radio" id="cash-on-delivery" name="payment_method" value="cod" checked>
                                <label for="cash-on-delivery">Cash on Delivery</label>
                            </div>
                            <button type="submit">PLACE ORDER</button>
                        </form>
                        </p>
                    <?php else: ?>
                        <form action="/applyCoupon" method="post">
                            <input type="text" name="coupon_code" placeholder="Enter coupon code" required>
                            <button type="submit">Apply Coupon</button>
                            <?php if (isset($_SESSION['coupon_error'])): ?>
                                <p class="error-message"><?php echo $_SESSION['coupon_error'];
                                unset($_SESSION['coupon_error']); ?>
                                </p>
                            <?php endif; ?>
                            <div class="radio-box">
                                <input type="radio" id="cash-on-delivery" name="payment_method" value="cod" checked>
                                <label for="cash-on-delivery">Cash on Delivery</label>
                            </div>
                            <button type="submit">PLACE ORDER</button>
                        </form>
                    <?php endif; ?>
                <?php else: ?>
                    <p class="empty-cart-message">Your cart is empty.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('apply-coupon').addEventListener('click', function () {
            const couponCode = document.getElementById('coupon-code').value;
            if (couponCode) {
                fetch('check_coupon.php?code=' + encodeURIComponent(couponCode))
                    .then(response => response.json())
                    .then(data => {
                        if (data.valid) {
                            // Update the total price
                            const discountAmount = data.discount; // Get discount from the response
                            const totalElement = document.getElementById('total-price');
                            const currentTotal = parseFloat(totalElement.innerText.replace('$', ''));
                            const newTotal = currentTotal - discountAmount;

                            // Update total display
                            totalElement.innerText = '$' + newTotal.toFixed(2);

                            // Change button to remove coupon
                            this.innerText = 'Remove Coupon';
                            this.setAttribute('id', 'remove-coupon');

                            // Clear the coupon input field
                            document.getElementById('coupon-code').value = '';
                        } else {
                            alert('Invalid coupon code.');
                        }
                    })
                    .catch(error => console.error('Error:', error));
            } else {
                alert('Please enter a coupon code.');
            }
        });

        // Event listener for remove coupon button
        document.addEventListener('click', function (event) {
            if (event.target.id === 'remove-coupon') {
                // Reset the total price to original
                const totalElement = document.getElementById('total-price');
                const originalTotal = <?php echo json_encode(number_format($orderTotal + 4.00, 2)); ?>; // Store original total
                totalElement.innerText = originalTotal;

                // Change button back to apply
                event.target.innerText = 'Apply';
                event.target.setAttribute('id', 'apply-coupon');

                // Clear the coupon input field
                document.getElementById('coupon-code').value = '';
            }
        });
    </script>

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