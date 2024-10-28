<?php
namespace App\Controllers;
use App\Models\Product;
use App\Models\Testimonial;
class ProductsController
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new Product();
        $this->testimonialModel = new Testimonial();
    }

    public function showHomePage()
    {
        $products = $this->productModel->getLatestProducts(); // Get the latest products
        $allProducts = $this->productModel->getAllProducts(); // Get all products
        $topSellers = $this->productModel->getTopSellers(); // Get the top sellers
        $ourCake = $this->productModel->getProductsByCategory('Cakes'); //get the cakes category
        $sugarFree = $this->productModel->getProductsByCategory('sugar free'); //get the sugar free
        $glutenFree = $this->productModel->getProductsByCategory('gluten free'); //get the gluten free
        $specialOccasions = $this->productModel->getProductsByCategory('special occasions'); //get the special occasions
        $dealOfTheDay = $this->productModel->getDiscountedProducts(); //get the discounted products
        $testimonials = $this->testimonialModel->getAll();
        // Load the view and pass the products data
        require 'views/pages/index-view.php';
    }
}
