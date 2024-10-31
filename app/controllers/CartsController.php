<?php
namespace App\Controllers;

use App\Models\CartModel;

class CartsController {
    private $cartModel;

    public function __construct() {
        $this->cartModel = new CartModel();
    }

    // Add item to cart and store it in cookies
    public function addToCart($productId, $quantity) {
        $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
        
        // Check for duplicate item in cart
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $product = $this->cartModel->getProduct($productId);
            $cart[$productId] = [
                'product_id' => $productId,
                'product_name' => $product['name'],
                'price' => $product['price'],
                'quantity' => $quantity
            ];
        }

        setcookie('cart', json_encode($cart), time() + 3600, '/');
        header("Location: cart.php");
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
