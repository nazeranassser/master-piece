<?php
namespace App\Controllers;

use App\Models\Cart;

use App\Models\Product;


class CartsController {
    private $cartModel;
    private $productModel;

    public function __construct() {
        $this->cartModel = new Cart();
        $this->productModel = new Product();
    }

    // Add item to cart and store it in cookies
    public function addToCart($productId) {
        // Initialize the cart from cookies or create a new array
        $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
    
        // Fetch product details using the cart model
        $product = $this->cartModel->getProduct($productId);
    
        if ($product) { // Ensure the product exists
            $stockQuantity = $product['product_quantity']; // Available stock in the database
    
            // Check if the product is already in the cart
            if (isset($cart[$productId])) {
                // Check if adding 1 more would exceed the available stock
                if ($cart[$productId]['quantity'] < $stockQuantity) {
                    $cart[$productId]['quantity'] += 1; // Increment quantity
                } else {
                    // Handle the situation where adding more exceeds the stock
                    // You can add a message or notification here if needed
                    echo "<script>alert('Cannot add more. Stock limit reached.');</script>";
                }
            } else {
                // Add new product to the cart if it doesn't exist yet, with a default quantity of 1
                $cart[$productId] = [
                    'product_id' => $product['product_id'],
                    'product_name' => $product['product_name'],
                    'price' => $product['product_price'],
                    'quantity' => 1, // Start with 1 if newly added
                    'stock_quantity' => $stockQuantity, // Include stock info for client-side checks
                    'image_url' => $product['product_image'] // Assuming this is the correct field
                ];
            }
        }
    
        // Update the cart cookie with the new cart contents
        setcookie('cart', json_encode($cart), time() + 3600, '/');
        
        // Redirect to the cart page
        header("Location: /views/pages/cart.php");
        exit; // Ensure the script stops executing after redirection
    }
    
    

    public function removeFromCart($productId) {
        $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
        
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            setcookie('cart', json_encode($cart), time() + 3600, '/');
        }

        header("Location: cart.php");
    }

    public function checkout() {
        if (!isset($_SESSION['customer_id'])) {
            header("Location: login.php");
            exit;
        }

        $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
        $customerId = $_SESSION['customer_id'];
        $deliveryInfo = $this->cartModel->getCustomerInfo($customerId);

        // Calculate total
        $orderTotal = 0;
        foreach ($cart as $item) {
            $orderTotal += $item['price'] * $item['quantity'];
        }

        require 'views/checkout.php';
    }

    public function placeOrder() {
        if (!isset($_SESSION['customer_id'])) {
            header("Location: login.php");
            exit;
        }

        $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
        $customerId = $_SESSION['customer_id'];
        $orderTotal = 0;

        foreach ($cart as $item) {
            $orderTotal += $item['price'] * $item['quantity'];
        }

        $orderId = $this->cartModel->createOrder($customerId, $orderTotal, $cart);
        
        setcookie('cart', '', time() - 3600, '/');
        
        header("Location: order_confirmation.php?order_id=" . $orderId);
    }
}
