<?php 
namespace App\Models;
use App\Models\Model;
use PDO; // Use the global PDO class
use PDOException;

class Wishlist extends Model{

    public function __construct(){
        parent::__construct('wishlists');
    }

    // public function add($data){
    //     $query = 
    //     $stmt = $this->db->prepare($query);

    // }

    // Method to get all wishlist items with updated product details
    public function getWishlistWithProductDetails()
    {
        $stmt = $this->db->prepare("
            SELECT wishlists.*, 
                   products.product_name AS title, 
                   products.product_description AS description, 
                   products.product_price AS price, 
                   products.product_image, 
                   products.category_id, 
                   products.product_quantity, 
                   products.total_review, 
                   products.product_discount, 
                   products.created_at, 
                   products.updated_at 
            FROM {$this->table} 
            JOIN products ON wishlists.product_id = products.product_id
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    

    // Check if a product is already in the wishlist
    public function findByProductId($productId)
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE product_id = :product_id");
        $stmt->bindParam(':product_id', $productId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
