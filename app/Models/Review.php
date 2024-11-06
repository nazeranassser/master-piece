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
        where r.product_id = $productID AND r.active=1;
        ";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    public function getAllReviewsAdmin()
    {
        $query = "SELECT r.*, c.customer_name 
        FROM reviews r 
        JOIN customers c ON r.customer_id = c.customer_id
        ";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function addReview( $productId,$customerId, $reviewText, $rating, $reviewImage) {
        $query= "INSERT INTO reviews ( product_id,customer_id, review_text, review_rating, review_image) VALUES (:productId, :customerId, :reviewText, :rating, :reviewImage)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':productId', $productId);
        $stmt->bindParam(':customerId', $customerId);
        $stmt->bindParam(':reviewText', $reviewText);
        $stmt->bindParam(':rating', $rating);
        $stmt->bindParam(':reviewImage', $reviewImage);
        return $stmt->execute(); // Return true or false based on execution
    }

    public function calculateAverageRating($productId) {
        $query ="SELECT AVG(review_rating) AS average_rating FROM reviews WHERE product_id = $productId";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $result['average_rating']; // Returns the average rating, or null if no reviews
    }

    public function updateProductReview($productId, $newAverageRating) {
        // Update the total_review column with the new average rating
        $query = "UPDATE products SET total_review = $newAverageRating WHERE product_id = $productId";
        $updateStmt = $this->db->prepare($query);
        $updateStmt->execute();
        
    }
    public function updateactive($id){
        $query = "UPDATE reviews SET active = 1 WHERE review_id = $id";
        $updateStmt = $this->db->prepare($query);
        $updateStmt->execute();
    }
    public function updateactive1($id){
        $query = "UPDATE reviews SET active = 0 WHERE review_id = $id";
        $updateStmt = $this->db->prepare($query);
        $updateStmt->execute();
    }

    

}

