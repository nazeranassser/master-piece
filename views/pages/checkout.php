<!--====== Main Header ======-->
<?php include 'views/partials/header.php'; 
?>
<!--====== End - Main Header ======-->

<!--====== Checkout Content ======-->
    <!-- Delivery Information -->
    <h1 class="section-title">DELIVERY INFORMATION</h1>
<div class="delivery-info">
    <p><strong>First Name:</strong> <?php echo htmlspecialchars($deliveryInfo['customer_name']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($deliveryInfo['customer_email']); ?></p>
    <p><strong>Phone:</strong> <?php echo htmlspecialchars($deliveryInfo['customer_phone']); ?></p>
    
    <!-- Address Selection -->
    <?php if (!empty($deliveryInfo['customer_address2'])): ?>
        <div class="address-selection">
            <label><strong style="color:red;">Choose one of your addresses:</strong></label><br>
            <label>
                <input type="radio" name="selected_address" value="<?php echo htmlspecialchars($deliveryInfo['customer_address1']); ?>" checked>
                <strong>Address 1:</strong> <?php echo htmlspecialchars($deliveryInfo['customer_address1']); ?>
            </label>
            <br>
            <label>
                <input type="radio" name="selected_address" value="<?php echo htmlspecialchars($deliveryInfo['customer_address2']); ?>">
                <strong>Address 2:</strong> <?php echo htmlspecialchars($deliveryInfo['customer_address2']); ?>
            </label>
        </div>
    <?php else: ?>
        <p><strong>Address:</strong> <?php echo htmlspecialchars($deliveryInfo['customer_address1']); ?></p>
    <?php endif; ?>
</div>


<h1 class="section-title">ORDER SUMMARY</h1>
<div class="order-summary">
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
            <p class="applied-coupon"><strong>Applied Coupon:</strong> <?php echo htmlspecialchars($_SESSION['coupon_code']); ?> 
                <form action="/removeCoupon" method="post" style="display:inline;">
                    <button type="submit">Remove Coupon</button>
                </form>
            </p>
        <?php else: ?>
            <form action="/applyCoupon" method="post">
                <input type="text" name="coupon_code" placeholder="Enter coupon code" required>
                <button type="submit">Apply Coupon</button>
                <?php if (isset($_SESSION['coupon_error'])): ?>
                    <p class="error-message"><?php echo $_SESSION['coupon_error']; unset($_SESSION['coupon_error']); ?></p>
                <?php endif; ?>
            </form>
        <?php endif; ?>

    <?php else: ?>
        <p class="empty-cart-message">Your cart is empty.</p>
    <?php endif; ?>
</div>


    <h1 class="section-title">PAYMENT INFORMATION</h1>
    <form action="placeOrder" method="post" class="payment-form">
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
    background-color: #fffaf3;
    color: #333;
}
.coupon-section {
    margin-top: 20px; /* Spacing above the coupon section */
}

.coupon-section label {
    font-size: 16px; /* Font size for the label */
    color: #333; /* Label color */
}

.coupon-section input[type="text"] {
    padding: 10px; /* Padding for the input */
    border: 1px solid #ccc; /* Border color */
    border-radius: 5px; /* Rounded corners */
    margin-right: 10px; /* Space between input and button */
}

.coupon-section button {
    padding: 10px 15px; /* Padding for the button */
    background-color: #ff4500; /* Button background color */
    color: white; /* Button text color */
    border: none; /* Remove border */
    border-radius: 5px; /* Rounded corners */
    cursor: pointer; /* Pointer cursor on hover */
}

.coupon-section button:hover {
    background-color: #e03b00; /* Darker shade on hover */
}

.section-title {
    font-size: 24px;
    margin-bottom: 10px;
    color: #ff4500;
}

.delivery-info,
.order-summary,
.payment-form {
    background-color: #fff;
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 20px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.delivery-info p,
.order-summary p {
    margin: 8px 0;
    font-size: 16px;
}

.order-summary-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 15px;
}

.order-summary-table th,
.order-summary-table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.order-summary-table th {
    background-color: #f0f0f0;
    font-weight: bold;
}

.order-total {
    font-size: 16px;
    margin: 5px 0;
}

.empty-cart-message {
    font-size: 16px;
    color: #777;
}

.radio-box {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}
.address-selection {
    margin-bottom: 15px;
}

.address-selection label {
    display: block;
    margin: 8px 0;
    font-size: 16px;
    color: #333; /* Adjust color as needed */
}

.address-selection input[type="radio"] {
    margin-right: 8px;
}


.radio-box label {
    margin-left: 8px;
    font-size: 16px;
}

.submit-button {
    background-color: #ff4500;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.submit-button:hover {
    background-color: #e03e00;
}

</style>
<script>
document.getElementById('apply-coupon').addEventListener('click', function() {
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
document.addEventListener('click', function(event) {
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