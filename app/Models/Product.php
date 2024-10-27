<?php
namespace App\Models;
use PDO; // Use the global PDO class
use PDOException;
class Product
{

  private $conn;
  public $product_id;
  public $product_name;
  public $product_price;
  public $product_image;
  public $product_description;
  public $product_quantity;
  public $category_id;
  public $product_discount;
  public $quantity;


  public $uploadDir = 'images/products/';
  public $allowedTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];

  function showRow()
  {
    $dbInstance = Database::getInstance();
    $conn = $dbInstance->getConnection();

    $sql = "SELECT * FROM products;";
    $start = $conn->query($sql);
    if ($start) {
      $row = $start->fetchAll(PDO::FETCH_ASSOC);
      return $row;
    } else {
      echo "0 results";
    }
  }

  function updateProduct($admin)
  {
    $dbInstance = Database::getInstance();
    $conn = $dbInstance->getConnection();

    if (isset($_FILES['image']) && in_array($_FILES['image']['type'], $this->allowedTypes)) {

      $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
      $targetFile = $this->uploadDir . $fileName;

      if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        $product_image = 'images/products/' . $fileName;
      } else {
        echo "حدث خطأ أثناء تحميل الصورة.";
      }
      // echo 1;
    } else {
      // header("Location: dash-pr.php");
      $product_image = $admin['image'];
      // var_dump($admin);
    }
    // echo $product_image;
    $id = $admin['product_edit'];
    $name = $admin['product_name'];
    $category = $admin['category'];
    $description = $admin['description'];
    $product_price = $admin['price'];
    $product_quantity = $admin['quantity'];

    $sql = "UPDATE products SET product_name = '$name', category_ID = '$category', product_description = '$description', product_price = '$product_price', product_quantity = '$product_quantity', product_image = '$product_image' WHERE product_ID = $id";

    $stmt = $conn->prepare($sql);

    if ($stmt->execute()) {
      header("Location: dash-products.php");
      exit(); // Exit after header redirect to avoid further processing
    } else {
      echo "Database update failed.";
    }

  }

  public function __construct()
  {
    $this->conn = Database::getInstance()->getConnection(); // Get the database connection
  }
  function addNewProduct($admin)
  {
    if (isset($_FILES['image']) && in_array($_FILES['image']['type'], $this->allowedTypes)) {

      $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
      $targetFile = $this->uploadDir . $fileName;

      if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        $product_image = 'images/products/' . $fileName;
        $productName = $_POST['name'];
        $productDesc = $_POST['description'];
        $productPrice = $_POST['price'];
        $productQty = $_POST['quantity'];
        $categoryID = $_POST['category'];
        // var_dump($targetFile);


        // الاتصال بقاعدة البيانات
        $pdo = new PDO('mysql:host=localhost;dbname=cake_project', 'root', '');
        $sql = "INSERT INTO products (product_name, product_description, product_price, product_quantity, category_ID, product_image) 
                  VALUES ('$productName', '$productDesc', '$productPrice', '$productQty', '$categoryID', '$product_image')";
        $stmt = $pdo->prepare($sql);
        $pdo->query($sql);
        // $stmt->execute([$productName, $productDesc, $productPrice, $productQty, $categoryID, $targetFile]);

        header("Location: dash-products.php");
      } else {
        echo "حدث خطأ أثناء تحميل الصورة.";
      }
    } else {
      echo "نوع الملف غير مدعوم.";
    }
  }

  public function getLatestProducts($limit = 4)
  {
    // $dbInstance = Database::getInstance();
    // $conn = $dbInstance->getConnection();

    $sql = "
            SELECT p.product_id, p.product_name, p.product_price, p.product_image, p.total_review, c.category_name, c.category_id 
            FROM products p
            INNER JOIN categories c ON p.category_id = c.category_id
            ORDER BY p.product_ID DESC
            LIMIT :limit
        ";

    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);

    if ($stmt->execute()) {
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
      echo "0 results";
    }
  }

  public function getAllProducts()
  {
    $query = "SELECT p.*, c.category_name FROM products p JOIN categories c ON p.category_id = c.category_id";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getTopSellers($limit = 4)
  {
    $query = "SELECT p.*, c.category_name 
    FROM products p 
    JOIN categories c ON p.category_id = c.category_id 
    JOIN order_Products op ON p.product_id = op.product_id 
    GROUP BY p.product_id 
    ORDER BY COUNT(op.product_id) DESC 
    LIMIT :limit";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getProductsByCategory($category)
  {
    $query = "SELECT p.*, c.category_name FROM products p JOIN categories c ON p.category_id = c.category_id WHERE c.category_name = :category";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':category', $category);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

}