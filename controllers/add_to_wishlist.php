<?php
require 'connection.php';
require 'controllers/WishlistController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $customerId = $data['customer_id'];
    $productId = $data['product_id'];

    $db = new Database();
    $conn = $db->getConnection();
    $wishlistController = new WishlistController($conn);

    $success = $wishlistController->addToWishlist($customerId, $productId);
    echo json_encode(['success' => $success]);
}
?>
