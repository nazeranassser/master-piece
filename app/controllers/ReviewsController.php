<?php
namespace App\Controllers;
use App\Models\Review;
use App\Models\OrderProduct;

class ReviewsController
{

    private $reviewModel;
    private $orderProductModel;
    public function __construct()
    {
        $this->reviewModel = new Review();
    }

    public function submitReview()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start(); // Ensure the session is started
            header('Content-Type: application/json'); // Set header for JSON response
    
            if (!isset($_SESSION['usersId'])) {
                // User is not logged in
                echo json_encode(['status' => 'error', 'message' => 'You need to log in before submitting a review.']);
                exit;
            }
    
            $product_id = $_POST['product_id'];
            $customer_id = $_SESSION['usersId']; // Assuming the customer ID is stored in the session
    
            // Check if the user has purchased the product
            $hasPurchased = $this->orderProductModel->checkPurchase($customer_id, $product_id);
            if (!$hasPurchased) {
                echo json_encode(['status' => 'error', 'message' => 'You need to purchase this product before submitting a review.']);
                exit;
            }
    
            // Sanitize inputs
            $review_text = htmlspecialchars($_POST['review_text']);
            $review_rating = $_POST['rating'];
            $review_image = null;
    
            // Handle image upload if provided
            if (isset($_FILES['review_image']) && $_FILES['review_image']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/public/images/reviews/';
    
                // Check if the directory exists, if not, create it
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }
    
                $review_image = basename($_FILES['review_image']['name']);
                $targetFile = $uploadDir . $review_image;
    
                if (!move_uploaded_file($_FILES['review_image']['tmp_name'], $targetFile)) {
                    echo json_encode(['status' => 'error', 'message' => 'Failed to move uploaded file.']);
                    exit;
                }
            }
    
            // Call the model method to insert the review
            if ($this->reviewModel->insertReview($product_id, $customer_id, $review_text, $review_rating, $review_image)) {
                echo json_encode(['status' => 'success', 'message' => 'Your review has been successfully submitted.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'There was an error submitting your review. Please try again.']);
            }
            exit;
        }
    }
    

}