<?php
namespace App\Models;

use App\Models\Model;

class Cart extends Model {

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getProduct($productId) {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE product_id = :productId");
        $stmt->execute(['productId' => $productId]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function getCustomerInfo($customerId) {
        $stmt = $this->db->prepare("SELECT * FROM customers WHERE customer_id = :customerId");
        $stmt->execute(['customerId' => $customerId]);
        return $stmt->fetch(\PDO::FETCH_ASSOC); 
    }

    public function createOrder($customerId, $orderTotal, $cartItems) {
        $this->db->beginTransaction();

        try {
            // Insert order into orders table
            $stmt = $this->db->prepare("INSERT INTO orders (customer_id, total) VALUES (:customer_id, :total)");
            $stmt->execute(['customer_id' => $customerId, 'total' => $orderTotal]);
            $orderId = $this->db->lastInsertId();

            // Insert order items into order_items table
            foreach ($cartItems as $item) {
                $stmt = $this->db->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (:order_id, :product_id, :quantity, :price)");
                $stmt->execute([
                    'order_id' => $orderId,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price']
                ]);
            }

            $this->db->commit();
            return $orderId;
        } catch (\Exception $e) {
            $this->db->rollBack();
            throw $e;
        }
    }
}
