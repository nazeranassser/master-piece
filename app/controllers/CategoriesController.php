<?php
namespace App\Controllers;
use App\Models\Product;
use App\Models\Category;
class CategoriesController
{
    private $categoriesModel;
    private $productModel;
    public $uploadDir = 'public/images/categories/';
    public $allowedTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
    public function __construct()
    {

        $this->categoriesModel = new Category();

    }
    public function get()
    {
        if (isset($_SESSION['admin_id'])) {
            if ($categories = $this->categoriesModel->getAll()) {
                require 'views/admin/categories/dash-categories.php'; // Adjust path as needed
            } else {
                echo 'No admins found.';
            }
        } else {
            require 'views/pages/404.php';
        }
    }

    public function addPage()
    {
        if (isset($_SESSION['admin_id'])) {
            require 'views/admin/categories/dash-category-add.php';
        } else {
            require 'views/pages/404.php';
        }
    }

    public function editPage($id)
    {
        if (isset($_SESSION['admin_id'])) {
            $category = $this->categoriesModel->findById($id);
            require 'views/admin/categories/dash-category-edit.php';
        } else {
            require 'views/pages/404.php';
        }
    }

    function add()
    {
        if (isset($_FILES['image']) && in_array($_FILES['image']['type'], $this->allowedTypes)) {
            $fileName = uniqid() . '' . basename($_FILES['image']['name']);
            $targetFile = $this->uploadDir . $fileName;
    
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                $category_image =  $fileName;
            } else {
                echo "Error uploading image.";
                
            }
        } else {
            $category_image = $_POST['image'] ?? null;
        }
        $data = [
            'category_name' => $_POST['category_name'],
            'category_image' => $category_image,
            'created_at' => date("Y/m/d h:m:s"),
        ];
        if ($this->categoriesModel->create($data)) {
            // Redirect or show a success message
            header("location:/categories");
        } else {
            echo "Failed to add admin.";
        }
    }

    function updateCategory()
    {
        if (isset($_FILES['image']) && in_array($_FILES['image']['type'], $this->allowedTypes)) {
            $fileName = uniqid() . '' . basename($_FILES['image']['name']);
            $targetFile = $this->uploadDir . $fileName;
    
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                $category_image =  $fileName;
            } else {
                echo "Error uploading image.";
                
            }
        } else {
            $category_image = $_POST['image'] ?? null;
        }
        $id = $_POST['category_id'];
        $data = [
            'category_name' => $_POST['category_name'],
            'category_image' => $category_image,
            // 'created_at' => date("Y/m/d h:m:s"),
        ];
        if ($this->categoriesModel->update($id, $data)) {
            // Redirect or show a success message
            header("location:/categories");
        } else {
            echo "Failed to add admin.";
        }
    }

    public function delete()
    {
        $this->categoriesModel->deleteCategory($_POST['delete_category']);
        header("location:/categories");

    }

    public function applyCategory()
    {
        if ($_POST['category_code']) {

            $categoryCode = $_POST['category_code'];
            $category = $this->categoriesModel->validateCategory($categoryCode);

            $_SESSION['total'] = $_SESSION['total'] - $category['category_amount'];

            if ($category) {
                $_SESSION['category'] = $category['category_amount'];
                $_SESSION['category_code'] = $categoryCode;
                $_SESSION['total'] = $_SESSION['total'] - $category['category_amount'];

                flash('success', 'Category applied successfully.');
            } else {
                flash('error', 'Invalid category code.');
            }

        }
        header("location:/checkout");
    }

    public function removeCategory()
    {
        unset($_SESSION['category']);
        unset($_SESSION['category_code']);
        // Recalculate the total here if needed.
        $response = ['success' => true, 'message' => 'Category removed.'];
        echo json_encode($response);
        header("location:/checkout");
    }


}