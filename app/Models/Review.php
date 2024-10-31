<?php
namespace App\Models;
use PDO; // Use the global PDO class
use PDOException;

use App\Models\Model;

class Review extends Model
{

    public $review_id;
    public $review_rating;
    public $review_text;
    public $product_id;
    public $customer_id;

    public function __construct()
    {
        parent::__construct('reviews');
    }

    public function getAllReviews($productID)
    {
        $query = "SELECT r.*, c.customer_name 
        FROM reviews r 
        JOIN customers c ON r.customer_id = c.customer_id
        where r.product_id = $productID
        ";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function insertReview($product_id, $customer_id, $product_review, $product_rating , $review_image) {

        $stmt = $this->db->prepare("INSERT INTO reviews (product_id, customer_id, review_text, review_rating , review_image) VALUES (:product_id, :customer_id, :review_text, :review_rating, :review_image)");
        $stmt->bindParam(':product_id', $product_id);
        $stmt->bindParam(':review_rating', $product_rating);    
        $stmt->bindParam(':review_text', $product_review);
        $stmt->bindParam(':customer_id', $customer_id);
        $stmt->bindParam(':review_image', $review_image);
        return $stmt->execute();
    }

}

