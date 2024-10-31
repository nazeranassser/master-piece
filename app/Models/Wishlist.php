<?php 

require_once 'Model.php';

class Wishlist extends Model{

    public function __construct(){
        parent::__construct('wishlist');
    }

    // Method to get all wishlist items with updated product details
    public function getWishlistWithProductDetails()
    {
        $stmt = $this->pdo->prepare("
            SELECT wishlists.*, 
                   product.product_name AS title, 
                   product.product_description AS description, 
                   product.product_price AS price, 
                   product.product_image, 
                   product.category_id, 
                   product.product_quantity, 
                   product.total_review, 
                   product.product_discount, 
                   product.created_at, 
                   product.updated_at 
            FROM {$this->table} 
            JOIN product ON wishlist.product_id = product.product_id
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Check if a product is already in the wishlist
    public function findByProductId($productId)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE product_id = :product_id");
        $stmt->bindParam(':product_id', $productId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
