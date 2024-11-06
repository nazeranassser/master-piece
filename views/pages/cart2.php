<?php include 'views/partials/header.php'; ?>
<style>
.title{
    margin-bottom: 5vh;
}
.card2{
    margin:40px auto;
    /* max-width: 950px; */
    /* width: 90%; */
    /* box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19); */
    box-shadow:0 0px 0px rgba(0, 0, 0, 0.1);

    border-radius: 1rem;
    /* border: transparent; */
}
.container{
    padding:0;
}
@media(max-width:767px){
    .card2{
        margin: 3vh auto;
    }
}
.cart{
    background-color: #fff;
    padding: 4vh 5vh;
    border-bottom-left-radius: 1rem;
    border-top-left-radius: 1rem;
}
@media(max-width:767px){
    .cart{
        padding: 4vh;
        border-bottom-left-radius: unset;
        border-top-right-radius: 1rem;
    }
}
.summary{
    background-color: #F8E1D4;
    border-top-right-radius: 1rem;
    border-bottom-right-radius: 1rem;
    padding: 4vh;
    /* color: rgb(65, 65, 65); */
    color:#D2691E;
}
@media(max-width:767px){
    .summary{
    border-top-right-radius: unset;
    border-bottom-left-radius: 1rem;
    }
}
.summary .col-2{
    padding: 0;
}
.summary .col-10
{
    padding: 0;
}.row{
    align-items:start;
    margin: 0;
}
.title b{
    font-size: 1.5rem;
    color:#D2691E;
}
.main{
    margin: 0;
    padding: 2vh 0;
    width: 100%;
}
.col-2, .col{
    padding: 0 1vh;
}
a{
    padding: 0 1vh;
}
.close{
    margin-left: auto;
    font-size: 0.7rem;
}
img{
    width: 3.5rem;
}
.back-to-shop{
    margin-top: 4.5rem;
}
h5{
    margin-top: 4vh;
}
hr{
    margin-top: 1.25rem;
}
form{
    padding: 2vh 0;
}
select{
    border: 1px solid rgba(0, 0, 0, 0.137);
    /* padding: 1.5vh 1vh; */
    /* margin-bottom: 4vh; */
    outline: none;
    width: 100%;
    background-color: rgb(247, 247, 247);
}
input{
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 1vh;
    margin-bottom: 3vh;
    outline: none;
    width: 100%;
    background-color: rgb(247, 247, 247);
}
input:focus::-webkit-input-placeholder
{
      color:transparent;
}
.btn{
    background-color: #000;
    border-color: #000;
    color: white;
    width: 100%;
    font-size: 0.7rem;
    margin-top: 4vh;
    padding: 1vh;
    border-radius: 0;
}
.btn:focus{
    box-shadow: none;
    outline: none;
    box-shadow: none;
    color: white;
    -webkit-box-shadow: none;
    -webkit-user-select: none;
    transition: none; 
}
.btn:hover{
    color: white;
}
a{
    color: black; 
}
a:hover{
    color: black;
    text-decoration: none;
}
 #code{
    background-image: linear-gradient(to left, rgba(255, 255, 255, 0.253) , rgba(255, 255, 255, 0.185)), url("https://img.icons8.com/small/16/000000/long-arrow-right.png");
    background-repeat: no-repeat;
    background-position-x: 95%;
    background-position-y: center;
}
.input-counter__text{
margin:0;
}
.input-counter__minus, .input-counter__plus{
    margin-top:0;
}
</style>
<?php
    $cartItems = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
?>
<div class="card2 container">
            <div class="row">
                <div class="col-md-8 cart">
                    <div class="title">
                        <div class="row">
                            <div class="col"><h4><b>Shopping Cart</b></h4></div>
                            <div class="col align-self-center text-right text-muted">3 items</div>
                        </div>
                    </div>    
                    <?php foreach ($cartItems as $productId => $item): ?>
                    <div class="row border-top border-bottom">
                        <div class="" style="display:flex;justify-content: space-between;">
                            <div class=""><div style="display: flex;align-items:center"><img class="img-fluid" style="width:100px;margin-right:24px;margin:10px 0px;border-radius:6px" src="/public/images/products/<?php echo htmlspecialchars($item['image_url']); ?>">
                            <div class="cart-table__name" style="padding-left:10px">
                                <div class="row">Shirt</div>
                                <div class="row">Cotton T-shirt</div>
                            </div></div></div>
                            <div class="original-price" style="display: flex;align-items:center;"><span class="original-price">
                            <?php $discountedPrice = number_format($item['price'], 2);?>
                                <?php if ($item['discount'] > 0): ?>
                                  <?php
                                  $discountedPrice = $item['price'] - ($item['price'] * ($item['discount']));
                                  ?>
                                      <span id="original-price_<?php echo htmlspecialchars($item['product_id']); ?>"><s style="color: red;"><?= number_format($item['price'], 2); ?> JD</s></span>
                                      </span>
                                  <span class="discounted-price"><?= number_format($discountedPrice, 2); ?>
                                      JD</span>
                              <?php else: ?>
                                  <?= $discountedPrice ?> JD
                              <?php endif; ?>
                              <span><span class="close"></span></div>
                            <div class=""style="display: flex;align-items:center">
                            <div class="cart-table__input-counter-wrap">
                                            <!-- Quantity Counter -->
                                           
                                            <div class="input-counter">
                                                <span class="input-counter__minus fas fa-minus"></span>
                                                <input type="number" id='inputField_<?php echo htmlspecialchars($item['product_id']); ?>' class="input-counter__text input-counter--text-primary-style" min='1' value="<?php echo htmlspecialchars($item['quantity']); ?>" data-product-id="<?php echo htmlspecialchars($item['product_id']); ?>" max="<?php echo htmlspecialchars($item['stock_quantity']); ?>" />
                                                <span class="cart-quantity">Quantity: <span class="quantity-display" data-product-id="<?php echo htmlspecialchars($item['product_id']); ?>"><?php echo htmlspecialchars($item['quantity']); ?></span></span>
                                                <span class="input-counter__plus  fas fa-plus"></span>
                                            </div>
                                        </div>
                            </div>
                            <div class=""style="display: flex;align-items:center"><span id="new_price" class="total-price" data-product-id="<?php echo htmlspecialchars($item['product_id']); ?>"><span id="new_price_<?php echo htmlspecialchars($item['product_id']); ?>" class="total-display" data-product-id="<?php echo htmlspecialchars($item['product_id']); ?>"><?= number_format($item['price'], 2); ?> JD</span></div>
                            <div class="cart-table__del-wrap" style="display: flex;align-items:center">
                                <a class="far fa-trash-alt cart-table__delete-link"
                                    href="/removeFromCart/<?php echo htmlspecialchars($item['product_id']); ?>"></a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?> 
                    <div class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-2"><img class="img-fluid" src="/public/images/products/<?php echo htmlspecialchars($item['image_url']); ?>"></div>
                            <div class="col">
                                <div class="row">Shirt</div>
                                <div class="row">Cotton T-shirt</div>
                            </div>
                            <div class="col">
                                <a href="#">-</a><a href="#" class="border">1</a><a href="#">+</a>
                            </div>
                            <div class="col _<?php echo htmlspecialchars($item['product_id']); ?>">&euro; 44.00 <span class="close">&#10005;</span></div>
                            <div class="col cart-table__del-wrap">
                                <a class="far fa-trash-alt cart-table__delete-link"
                                    href="/removeFromCart/<?php echo htmlspecialchars($item['product_id']); ?>"></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row main align-items-center">
                            <div class="col-2"><img class="img-fluid" src="https://i.imgur.com/ba3tvGm.jpg"></div>
                            <div class="col">
                                <div class="row text-muted">Shirt</div>
                                <div class="row">Cotton T-shirt</div>
                            </div>
                            <div class="col">
                                <a href="#">-</a><a href="#" class="border">1</a><a href="#">+</a>
                            </div>
                            <div class="col">&euro; 44.00 <span class="close">&#10005;</span></div>
                        </div>
                    </div>
                    <div class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-2"><img class="img-fluid" src="https://i.imgur.com/pHQ3xT3.jpg"></div>
                            <div class="col">
                                <div class="row text-muted">Shirt</div>
                                <div class="row">Cotton T-shirt</div>
                            </div>
                            <div class="col">
                                <a href="#">-</a><a href="#" class="border">1</a><a href="#">+</a>
                            </div>
                            <div class="col">&euro; 44.00 <span class="close">&#10005;</span></div>
                        </div>
                    </div>
                    <div class="back-to-shop"><a href="#">&leftarrow;</a><span class="text-muted">Back to shop</span></div>
                </div>
                <div class="col-md-4 summary">
                    <div><h5><b>Summary</b></h5></div>
                    <hr>
                    <div class="row">
                        <div class="col" style="padding-left:0;">ITEMS 3</div>
                        <div class="col text-right">&euro; 132.00</div>
                    </div>
                    <!-- <form>
                        <p>SHIPPING</p>
                        <select><option class="text-muted">Standard-Delivery- &euro;5.00</option></select>
                        <p>GIVE CODE</p>
                        <input id="code" placeholder="Enter your code">
                    </form> -->
                    <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                        <div class="col">TOTAL PRICE</div>
                        <div class="col text-right">&euro; 137.00</div>
                    </div>
                    <button class="btn">CHECKOUT</button>
                </div>
            </div>
            
        </div>
        <span class="original-price"><s style="color: red;"><?= number_format($item['price'], 2); ?> JD</s></span>
    <span id="new_price" class="total-price" data-product-id="<?php echo htmlspecialchars($item['product_id']); ?>">Total: <span id="new_price_2" class="total-display" data-product-id="<?php echo htmlspecialchars($item['product_id']); ?>"><?= number_format($item['price'], 2); ?> JD</span></span>
    
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
    // const totalDisplay = document.getElementById(`new_price_2`);
    // const inputField1 = document.getElementById(`inputField`);
    // const originalPrice = parseFloat(document.getElementById(`.original-price_${inputField.dataset.productId}`).textContent.replace(/[^0-9.]/g, '')); // Get original price and remove JD
    // totalDisplay.textContent = inputField1.value * originalPrice + ' JD';
        
    document.querySelectorAll('.input-counter').forEach(counter => {
        const minusBtn = counter.querySelector('.input-counter__minus');
        const plusBtn = counter.querySelector('.input-counter__plus');
        const inputField = counter.querySelector('.input-counter__text');
        const quantityDisplay = counter.querySelector('.quantity-display');
        const totalDisplay = document.getElementById(`new_price_${inputField.dataset.productId}`);
        const inputField1 = document.getElementById(`inputField_${inputField.dataset.productId}`);
        const originalPrice = parseFloat(document.getElementById(`original-price_${inputField.dataset.productId}`).textContent.replace(/[^0-9.]/g, '')); // Get original price and remove JD
        totalDisplay.textContent = inputField1.value * originalPrice + ' JD';
        

        // Decrease quantity when minus button is clicked
        minusBtn.addEventListener('click', () => {
            let value = parseInt(inputField.value);
            if (!isNaN(value) && value > 1) {
                inputField.value = value - 1;
                const totalDisplay = document.getElementById(`new_price_${inputField.dataset.productId}`);
                totalDisplay.textContent = `${originalPrice * (value-1)} JD`; 
                totalDisplay.textContent = inputField1.value * originalPrice + ' JD';
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
                const inputField1 = document.getElementById(`inputField_${inputField.dataset.productId}`);
                const totalDisplay = document.getElementById(`new_price_${inputField.dataset.productId}`);
                totalDisplay.textContent = inputField1.value * originalPrice + ' JD';
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
        const originalPrice = parseFloat(document.getElementById(`original-price_${inputField.dataset.productId}`).textContent.replace(/[^0-9.]/g, '')); // Get original price and remove JD
        // Calculate total price
        const totalPrice = (originalPrice * quantity).toFixed(2);
        // const totalDisplay = document.querySelector(`.total-display[data-product-id="${productId}"]`);
        const totalDisplay = document.getElementById(`new_price_${productId}`);

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
        </script>
        <?php include 'views/partials/footer.php'; ?>