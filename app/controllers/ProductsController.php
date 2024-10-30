<?php
namespace App\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\Testimonial;
class ProductsController
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new Product();
        $this->categoryModel = new Category();
        $this->testimonialModel = new Testimonial();
    }

    public function index() {
        $products = $this->productModel->showRow();
        $categories = $this->categoryModel->get();
        require 'views/admin/product/dash-products.php';
    }

    public function filter($id) {
        // $categoryFilter = $_GET['categoryFilter'] ?? null;
        // echo "Product ID: " . $id;
        // die();
        if($id){
            $products = $this->productModel->getProductsByCategoryId($id);
        }else{
            $products = $this->productModel->showRow();
        }
        $categories = $this->categoryModel->get();
        require 'views/admin/product/dash-products.php';
    }

    
    public function edit() {
        require 'views/admin/product/dash-product-edit.php';
    }

    public function add() {
        require 'views/admin/product/dash-product-add.php';
    }

    public function create() {
        $products = $this->productModel->addNewProduct($_POST);
        require 'views/admin/product/dash-product-add.php';
    }

    public function update() {
        $products = $this->productModel->updateProduct($_POST);
        require 'views/admin/product/dash-product-edit.php';
    }

    public function addProduct() {
        $products = $this->productModel->addNewProduct($_POST);
        header('location:/products');
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
