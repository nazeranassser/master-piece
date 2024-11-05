<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="images/favicon.png" rel="shortcut icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../css/style.css"> <!-- Adjust path if needed -->

    <!-- Additional Vendor CSS -->
    <link rel="stylesheet" href="../../public/css/vendor.css"> <!-- Adjust path if needed -->
    <link rel="stylesheet" href="../../public/css/utility.css">
    <link rel="stylesheet" href="../../public/css/app.css">


</head>

<body>

    <!--====== Main Header ======-->
    <?php include 'views/partials/header.php'; ?>
    <!--====== End - Main Header ======-->

    <!--====== Cart Content ======-->
    <div id="app">

        <!--====== Section 1 ======-->
        <!--====== End - Section 1 ======-->

        <!--====== Section 2 ======-->

        <div class="shopping-cart__intro u-s-m-b-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shopping-cart__text-wrap">
                    <h1 class="shopping-cart__heading u-c-secondary">SHOPPING CART</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Cart items dynamically displayed -->
<div class="shopping-cart__content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 u-s-m-b-30">
                <div class="table-responsive">
                    <table class="cart-table">
                        <tbody class="cart-table__body">
                            <?php
                            $cartItems = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
                            ?>
                            <!-- Loop through cart items -->
                            <?php foreach ($cartItems as $productId => $item): ?>
                                <tr class="cart-table__row">
                                    <td>
                                        <div class="cart-table__box">
                                            <div class="cart-table__img-wrap">
                                                <img class="u-img-fluid"
                                                    src="/public/images/categories/<?php echo htmlspecialchars($item['image_url']); ?>"
                                                    alt="product image">
                                            </div>
                                            <div class="cart-table__info">
                                                <span class="cart-table__name">
                                                    <a
                                                        href="/product/<?php echo htmlspecialchars($item['product_id']); ?>"><?php echo htmlspecialchars($item['product_name']); ?></a>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                    <?php if ($item['discount'] > 0): ?>
                                                    <?php
                                                    $discountedPrice = $item['price'] - ($item['price'] * ($item['discount']));
                                                    ?>
                                                    <span class="original-price"><s style="color: red;"><?= number_format($item['price'], 2); ?>
                                                            JD</s></span>
                                                        <span class="original-price"><s style="color: red;"><?= number_format($item['price'], 2); ?> JD</s></span>
                                                        <span class="total-price" data-product-id="<?php echo htmlspecialchars($item['product_id']); ?>">Total: <span class="total-display" data-product-id="<?php echo htmlspecialchars($item['product_id']); ?>"><?= number_format($item['price'], 2); ?> JD</span></span>
                                                    <span class="discounted-price"><?= number_format($discountedPrice, 2); ?>
                                                        JD</span>
                                                <?php else: ?>
                                                    <?= number_format($item['price'], 2); ?> JD
                                                <?php endif; ?>                                    </td>
                                    <td>
                                        <div class="cart-table__input-counter-wrap">
                                            <!-- Quantity Counter -->
                                           
                                            <div class="input-counter">
                                                <span class="input-counter__minus fas fa-minus"></span>
                                                <input type="number" id='inputField' class="input-counter__text input-counter--text-primary-style" min='1' value="<?php echo htmlspecialchars($item['quantity']); ?>" data-product-id="<?php echo htmlspecialchars($item['product_id']); ?>" max="<?php echo htmlspecialchars($item['stock_quantity']); ?>" />
                                                <!-- <span class="cart-quantity">Quantity: <span class="quantity-display" data-product-id="<?php echo htmlspecialchars($item['product_id']); ?>"><?php echo htmlspecialchars($item['quantity']); ?></span></span> -->
                                                <span class="input-counter__plus  fas fa-plus"></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cart-table__del-wrap">
                                            <a class="far fa-trash-alt cart-table__delete-link"
                                                href="/removeFromCart/<?php echo htmlspecialchars($item['product_id']); ?>"></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="route-box">
                    <div class="route-box__g1">
                        <a class="route-box__link" href="/">
                            <i class="fas fa-long-arrow-alt-left"></i>
                            <span>CONTINUE SHOPPING</span>
                        </a>
                    </div>
                    <div class="route-box__g2">
                        <a class="route-box__link" href="/clearCart">
                            <i class="fas fa-trash"></i>
                            <span>CLEAR CART</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Checkout button -->
<div class="checkout-button-container">
  <a href="/checkout"><button class="checkout-button">Checkout</button></a>
</div>


    </div>
    </div>
    <span class="original-price"><s style="color: red;"><?= number_format($item['price'], 2); ?> JD</s></span>
    <span id="new_price" class="total-price" data-product-id="<?php echo htmlspecialchars($item['product_id']); ?>">Total: <span id="new_price_2" class="total-display" data-product-id="<?php echo htmlspecialchars($item['product_id']); ?>"><?= number_format($item['price'], 2); ?> JD</span></span>
    <!--====== Noscript ======-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
//     document.addEventListener('DOMContentLoaded', () => {
//     document.querySelectorAll('.input-counter').forEach(counter => {
//         const minusBtn = counter.querySelector('.input-counter__minus');
//         const plusBtn = counter.querySelector('.input-counter__plus');
//         const inputField = counter.querySelector('.input-counter__text');
//         const quantityDisplay = counter.querySelector('.quantity-display');

//         // Decrease quantity when minus button is clicked
//         minusBtn.addEventListener('click', () => {
//             let value = parseInt(inputField.value);
//             if (!isNaN(value) && value > 1) {
//                 inputField.value = value - 1;
//                 updateCart(inputField); // Update the cart whenever the quantity changes
//                 updateQuantityDisplay(inputField.dataset.productId); // Update displayed quantity
//             }
//         });

//         // Increase quantity when plus button is clicked
//         plusBtn.addEventListener('click', () => {
//             let value = parseInt(inputField.value);
//             const maxValue = inputField.max ? parseInt(inputField.max) : Infinity; // Ensure max is considered if set
//             if (!isNaN(value) && value < maxValue) {
//                 inputField.value = value + 1;
//                 updateCart(inputField); // Update the cart whenever the quantity changes
//                 updateQuantityDisplay(inputField.dataset.productId); // Update displayed quantity
//             }
//         });

//         // Validate input to prevent non-numeric characters
//         inputField.addEventListener('input', () => {
//             inputField.value = inputField.value.replace(/[^0-9]/g, '');
//         });
//     });

//     // Helper function to update the cart cookie
//     function updateCart(inputField) {
//         const productId = inputField.dataset.productId; // This assumes data-product-id is set on the input
//         console.log('Product ID:', productId); // Debugging line to check product ID

//         let cart = getCookie('cart');
//         cart = cart ? JSON.parse(cart) : {}; // Parse JSON string or initialize empty object

//         const quantity = parseInt(inputField.value);
//         if (productId) { // Check that productId is not undefined
//             if (cart[productId]) {
//                 // If product exists, update the quantity
//                 cart[productId].quantity = quantity; // Update quantity for the specific product
//             } else {
//                 // If product does not exist, create a new entry with quantity and other details
//                 cart[productId] = {
//                     product_id: productId, // You may want to set other product details here too
//                     quantity: quantity
//                 };
//             }

//             // Save the updated cart back as a JSON string in the cookie
//             setCookie('cart', JSON.stringify(cart), 30); // Cookie expires in 30 days
//         } else {
//             console.log("Product ID is undefined. Check your HTML data attributes.");
//         }
//     }

//     // Function to update the displayed quantity
//     function updateQuantityDisplay(productId) {
//         const quantityDisplay = document.querySelector(`.quantity-display[data-product-id="${productId}"]`);
//         const cart = getCookie('cart');
//         if (cart) {
//             const parsedCart = JSON.parse(cart);
//             if (parsedCart[productId]) {
//                 quantityDisplay.textContent = parsedCart[productId].quantity; // Update the displayed quantity
//             }
//         }
//     }

//     // Helper function to get a cookie
//     function getCookie(name) {
//         let match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
//         return match ? decodeURIComponent(match[2]) : null;
//     }

//     // Helper function to set a cookie
//     function setCookie(name, value, days) {
//         let expires = "";
//         if (days) {
//             let date = new Date();
//             date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
//             expires = "; expires=" + date.toUTCString();
//         }
//         document.cookie = name + "=" + encodeURIComponent(value) + expires + "; path=/";
//     }
// });
document.addEventListener('DOMContentLoaded', () => {
    const totalDisplay = document.getElementById(`new_price_2`);
    const inputField1 = document.getElementById(`inputField`);
    const originalPrice = parseFloat(document.querySelector('.original-price s').textContent.replace(/[^0-9.]/g, '')); // Get original price and remove JD
    totalDisplay.textContent = inputField1.value * originalPrice + ' JD';
        
    document.querySelectorAll('.input-counter').forEach(counter => {
        const minusBtn = counter.querySelector('.input-counter__minus');
        const plusBtn = counter.querySelector('.input-counter__plus');
        const inputField = counter.querySelector('.input-counter__text');
        const quantityDisplay = counter.querySelector('.quantity-display');


        // Decrease quantity when minus button is clicked
        minusBtn.addEventListener('click', () => {
            let value = parseInt(inputField.value);
            if (!isNaN(value) && value > 1) {
                inputField.value = value - 1;
                totalDisplay.textContent = `${originalPrice * (value-1)} JD`; 
                updateCart(inputField); // Update the cart whenever the quantity changes
                updateQuantityDisplay(inputField.dataset.productId); // Update displayed quantity
                updateTotalPrice(inputField); // Update displayed total price
            }
        });

        // Increase quantity when plus button is clicked
        plusBtn.addEventListener('click', () => {
            let value = parseInt(inputField.value);
            const maxValue = inputField.max ? parseInt(inputField.max) : Infinity; // Ensure max is considered if set
            if (!isNaN(value) && value < maxValue) {
                inputField.value = value + 1;
                // alert(originalPrice);
                totalDisplay.textContent = `${originalPrice * (value+1)} JD`; 
                updateCart(inputField); // Update the cart whenever the quantity changes
                updateQuantityDisplay(inputField.dataset.productId); // Update displayed quantity
                updateTotalPrice(inputField); // Update displayed total price
            }
        });

        // Validate input to prevent non-numeric characters
        inputField.addEventListener('input', () => {
            inputField.value = inputField.value.replace(/[^0-9]/g, '');
        });
    });

    // Helper function to update the cart cookie
    function updateCart(inputField) {
        const productId = inputField.dataset.productId; // This assumes data-product-id is set on the input

        let cart = getCookie('cart');
        cart = cart ? JSON.parse(cart) : {}; // Parse JSON string or initialize empty object

        const quantity = parseInt(inputField.value);
        if (productId) { // Check that productId is not undefined
            if (cart[productId]) {
                // If product exists, update the quantity
                cart[productId].quantity = quantity; // Update quantity for the specific product
            } else {
                // If product does not exist, create a new entry with quantity and other details
                cart[productId] = {
                    product_id: productId, // You may want to set other product details here too
                    quantity: quantity
                };
            }

            // Save the updated cart back as a JSON string in the cookie
            setCookie('cart', JSON.stringify(cart), 30); // Cookie expires in 30 days
        } else {
            console.log("Product ID is undefined. Check your HTML data attributes.");
        }
    }

    // Function to update the displayed quantity
    function updateQuantityDisplay(productId) {
        const quantityDisplay = document.querySelector(`.quantity-display[data-product-id="${productId}"]`);

        const cart = getCookie('cart');
        if (cart) {
            const parsedCart = JSON.parse(cart);
            if (parsedCart[productId]) {
                quantityDisplay.textContent = parsedCart[productId].quantity; // Update the displayed quantity
            }
        }
    }

    // Function to update the total price based on quantity and original price
    function updateTotalPrice(inputField) {
        const productId = inputField.dataset.productId; // Get product ID from data attribute
        const quantity = parseInt(inputField.value); // Get current quantity
        
        // Calculate total price
        const totalPrice = (originalPrice * quantity).toFixed(2);
        // const totalDisplay = document.querySelector(`.total-display[data-product-id="${productId}"]`);
        const totalDisplay = document.getElementById(`new_price_2`);

        totalDisplay.textContent = `${totalPrice} JD`; // Update the displayed total price
    }

    // Helper function to get a cookie
    function getCookie(name) {
        let match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
        return match ? decodeURIComponent(match[2]) : null;
    }

    // Helper function to set a cookie
    function setCookie(name, value, days) {
        let expires = "";
        if (days) {
            let date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + encodeURIComponent(value) + expires + "; path=/";
    }
});
// document.addEventListener('DOMContentLoaded', () => {
//     document.querySelectorAll('.input-counter').forEach(counter => {
//         const minusBtn = counter.querySelector('.input-counter__minus');
//         const plusBtn = counter.querySelector('.input-counter__plus');
//         const inputField = counter.querySelector('.input-counter__text');
//         const productId = inputField.dataset.productId;

//         // Decrease quantity when minus button is clicked
//         minusBtn.addEventListener('click', () => {
//             let value = parseInt(inputField.value);
//             if (!isNaN(value) && value > 1) {
//                 inputField.value = value - 1;
//                 updateQuantityAndPrice(productId, inputField.value);
//             }
//         });

//         // Increase quantity when plus button is clicked
//         plusBtn.addEventListener('click', () => {
//             let value = parseInt(inputField.value);
//             const maxValue = inputField.max ? parseInt(inputField.max) : Infinity;
//             if (!isNaN(value) && value < maxValue) {
//                 inputField.value = value + 1;
//                 updateQuantityAndPrice(productId, inputField.value);
//             }
//         });
//     });

//     // Function to update quantity display and total price
//     function updateQuantityAndPrice(productId, quantity) {
//         const quantityDisplay = document.querySelector(`.quantity-display[data-product-id="${productId}"]`);
//         const originalPriceElement = document.querySelector('.original-price s');
//         const totalDisplay = document.querySelector(`.total-display[data-product-id="${productId}"]`);
//         const totalDisplay = document.getElementById(`new_price[data-product-id="${productId}"]`);


//         // Update displayed quantity
//         quantityDisplay.textContent = quantity;

//         // Get the original price from the page and calculate the new total
//         const originalPrice = parseFloat(originalPriceElement.textContent.replace(/[^\d.-]/g, ''));
//         const totalPrice = (originalPrice * quantity).toFixed(2);

//         // Update the displayed total price
//         totalDisplay.textContent = `${totalPrice} JD`;
//     }
// });

    </script>

    <footer>
        <?php include 'views/partials/footer.php'; ?>
    </footer>

  

    
