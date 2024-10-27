<?php
namespace App\Controllers;

use App\Models\Cart;

class CartsController {
    private $cart = [];

    public function __construct() {
        // Load cart from cookies or initialize it
        $this->cart = $this->getCartFromCookies();
    }

    // Get cart items from cookies
    private function getCartFromCookies() {
        if (isset($_COOKIE['cart'])) {
            return json_decode($_COOKIE['cart'], true) ?: [];
        }
        return [];
    }

    // Save cart items to cookies
    private function saveCartToCookies() {
        setcookie('cart', json_encode($this->cart), time() + (86400 * 30), "/"); // Store for 30 days
    }

    // Add item to cart
    public function addToCart($productId) {
        // Check if the product already exists in the cart
        $exists = false;
        foreach ($this->cart as &$item) {
            if ($item['id'] === $productId) {
                $exists = true;
                break;
            }
        }
        echo $productId;
        die;

        // If the product doesn't exist, add it
        if (!$exists) {
            $this->cart[] = ['id' => $productId, 'quantity' => 1];
            $_SESSION['message'] = "Product successfully added to cart!";
        } else {
            $_SESSION['message'] = "Product is already in the cart.";
        }

        // Save the updated cart to cookies
        $this->saveCartToCookies();

        // Redirect back to the index or any specified page
        header("Location: index-view.php");
        exit;
    }

    // Remove item from cart
    public function removeFromCart($productId) {
        $this->cart = array_filter($this->cart, function($item) use ($productId) {
            return $item['id'] !== $productId;
        });
        $this->saveCartToCookies();
    }

    // Clear cart
    public function clearCart() {
        $this->cart = [];
        $this->saveCartToCookies();
    }

    // Get cart items
    public function getCartItems() {
        return $this->cart;
    }

    // Get cart total
    public function getCartTotal() {
        $total = 0;
        foreach ($this->cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }

    // Checkout function
    public function checkout($customerData) {
        $orderModel = new OrderModel();
        $orderId = $orderModel->createOrder($this->cart, $customerData);
        $this->clearCart(); // Clear cart after checkout
        return $orderId;
    }
}
