<?php
namespace App\Models;

use App\Models\Model;

class Cart {
    private $db;

    public function __construct() {
        $this->db = new \PDO(DB_DSN, DB_USER, DB_PASS); // Use fully qualified PDO for global namespace
    }

    public function getProduct($productId) {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->execute(['id' => $productId]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function getCustomerInfo($customerId) {
        $stmt = $this->db->prepare("SELECT * FROM customers WHERE id = :id");
        $stmt->execute(['id' => $customerId]);
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
