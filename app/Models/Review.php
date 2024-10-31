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

}

