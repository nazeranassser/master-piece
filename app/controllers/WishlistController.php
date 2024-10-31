<?php
namespace App\Controllers;

use App\Models\Wishlist;
class WishlistController
{
    protected $wishlistModel;

    public function __construct()
    {
        $this->wishlistModel = new Wishlist();
    }

    // Method to add a product to the wishlist
    public function store()
    {
        $productId = $_POST['product_id'] ?? null;
        
        if (!$productId) {
            header("Location: /products?error=No product ID provided");
            exit();
        }
    
        // Check if the product is already in the wishlist
        $existingProduct = $this->wishlistModel->findByProductId($productId);
        
        if (!$existingProduct) {
            $this->wishlistModel->create(['product_id' => $productId]);
            header("Location: /products?message=Product added to wishlist");
            exit();
        } else {
            header("Location: /products?error=Product already in wishlist");
            exit();
        }
    }

    // Method to display wishlist items
    public function show()
    {
        $wishlistItems = $this->wishlistModel->getWishlistWithProductDetails();
        require 'views/pages/wishlist.php';
    }

    // Method to delete from wishlist
    public function delete()
    {
        $id = $_POST['id'] ?? null;
        
        if ($id) {
            $this->wishlistModel->delete($id);  
            header("Location: /wishlist?message=Product removed from wishlist");
        } else {
            header("Location: /wishlist?error=No ID provided for deletion");
        }
        exit();
    }
    

    // New method to check if a product is in wishlist
    public function check()
    {
        $productId = $_GET['product_id'] ?? null;
        
        if ($productId) {
            $existingProduct = $this->wishlistModel->findByProductId($productId);
            echo json_encode([
                'success' => true,
                'inWishlist' => !empty($existingProduct)
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Invalid product ID'
            ]);
        }
        exit();
    }
}