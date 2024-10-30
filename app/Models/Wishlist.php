<?php
class Wishlist {
   private $db;

   public function __construct($db) {
       $this->db = $db;
   }

   public function addToWishlist($userId, $productId) {
       $query = 'INSERT INTO wishlist (customer_id, product_id, created_at, updated_at)
                 VALUES (:user_id, :product_id, NOW(), NOW())
                 ON DUPLICATE KEY UPDATE updated_at = NOW()';
       $stmt = $this->db->prepare($query);
       $stmt->bindParam(':user_id', $userId);
       $stmt->bindParam(':product_id', $productId);
       return $stmt->execute();
   }

   public function getUserWishlist($userId) {
       $query = 'SELECT p.product_id, p.product_name, p.product_price, p.product_image, p.product_description 
                 FROM wishlist w
                 JOIN products p ON w.product_id = p.product_id
                 WHERE w.customer_id = :user_id';
       $stmt = $this->db->prepare($query);
       $stmt->bindParam(':user_id', $userId);
       $stmt->execute();
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }
}
?>
