<?php

require_once 'models/Wishlist.php';

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

        if ($productId) {
            // Check if the product is already in the wishlist to avoid duplicates
            $existingProduct = $this->wishlistModel->findByProductId($productId);

            if (!$existingProduct) {
                $this->wishlistModel->create(['product_id' => $productId]);
                header("Location: /products?message=Product added to wishlist");
                exit();
            } else {
                header("Location: /products?error=Product already in wishlist");
                exit();
            }
        } else {
            header("Location: /products?error=Failed to add product to wishlist");
            exit();
        }
    }


    // Method to display wishlist items
    public function show()
    {
        $wishlistItems = $this->wishlistModel->getWishlistWithProductDetails();
        require 'views/wishlist/show.view.php';
    }


    public function delete()
    {
        // $productId = $_POST['product_id'] ?? null;

        // if ($productId) {
        //     $this->wishlistModel->delete($productId);
        //     header("Location: /products");
        //     exit();
        // }


        $wishlistModel = new Wishlist();
        $id = $_POST['id'];
        $wishlistModel->delete($id);

        header('Location: /wishlist');
        exit;
    }
}