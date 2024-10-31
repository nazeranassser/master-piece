<?php
namespace App\Models;
use App\Models\Model;
use PDO; // Use the global PDO class
use PDOException;
class Product extends Model
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

  public function getAll(){
    return $this->get();
  }

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
    // $dbInstance = Database::getInstance();
    // $conn = $dbInstance->getConnection();

    if (isset($_FILES['image']) && in_array($_FILES['image']['type'], $this->allowedTypes)) {
        $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
        $targetFile = $this->uploadDir . $fileName;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            $product_image = 'images/products/' . $fileName;
        } else {
            echo "Error uploading image.";
            return; // Stop execution if image upload fails
        }
    } else {
        $product_image = $admin['image'] ?? null;
    }

    $id = $admin['product_edit'] ?? null;
    $name = $admin['product_name'] ?? '';
    $category = $admin['category'] ?? '';
    $description = $admin['description'] ?? '';
    $product_price = $admin['price'] ?? 0;
    $product_quantity = $admin['quantity'] ?? 0;

    $sql = "UPDATE products 
            SET product_name = :name, 
                category_id = :category, 
                product_description = :description, 
                product_price = :price, 
                product_quantity = :quantity, 
                product_image = :image 
            WHERE product_id = :id";

    $stmt = $this->conn->prepare($sql);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':price', $product_price);
    $stmt->bindParam(':quantity', $product_quantity);
    $stmt->bindParam(':image', $product_image);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: /products");
        exit(); // Exit after header redirect
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
        $categoryid = $_POST['category'];
        // var_dump($targetFile);


        // الاتصال بقاعدة البيانات
        $pdo = new PDO('mysql:host=localhost;dbname=cake_project', 'root', '');
        $sql = "INSERT INTO products (product_name, product_description, product_price, product_quantity, category_id, product_image) 
                  VALUES ('$productName', '$productDesc', '$productPrice', '$productQty', '$categoryid', '$product_image')";
        $stmt = $pdo->prepare($sql);
        return $pdo->query($sql);
        // $stmt->execute([$productName, $productDesc, $productPrice, $productQty, $categoryid, $targetFile]);

        // header("Location: dash-products.php");
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
            ORDER BY p.product_id DESC
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

  public function getProductsByCategoryId($category)
  {
    $query = "SELECT p.*, c.category_name FROM products p JOIN categories c ON p.category_id = c.category_id";
    if($category!=''){
      $query.="  WHERE c.category_id = :category";
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':category', $category);
    }else{
      $stmt = $this->conn->prepare($query);
    }
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

  public function getDiscountedProducts() {
    $sql = "SELECT product_id, product_name, product_image, product_price, product_discount, total_review ,category_name
            FROM products
            INNER JOIN categories ON products.category_id = categories.category_id
            WHERE product_discount IS NOT NULL
            ORDER BY product_discount DESC
            LIMIT 2";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($products as &$product) {
      $product['discounted_price'] = $product['product_price'] - ($product['product_price'] * $product['product_discount']);
    }

    return $products;
  }

  public function getProductById($productID) {
    $query = "SELECT p.*, c.category_name, AVG(r.review_rating) AS avg_rating, COUNT(r.review_id) AS review_count
              FROM products p
              LEFT JOIN categories c ON p.category_id = c.category_id
              LEFT JOIN reviews r ON p.product_id = r.product_id
              WHERE p.product_id = :productID
              GROUP BY p.product_id";
    
    $stmt = $this->conn->prepare($query);
    $stmt->execute([':productID' => $productID]);
    
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
public function getCategories() {
  try {
      $query = "SELECT c.category_name, COUNT(p.product_id) AS product_count 
                FROM categories c
                LEFT JOIN products p ON c.category_id = p.category_id
                GROUP BY c.category_name";

      $stmt = $this->conn->prepare($query);
      $stmt->execute();

      return $stmt;
  } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
      return null;
  }
}
public function getProducts($search = '', $category = '', $sort = '') {
  $query = "SELECT p.*, c.category_name, AVG(r.review_rating) AS avg_rating, COUNT(r.review_id) AS review_count
            FROM products p
            LEFT JOIN categories c ON p.category_id = c.category_id
            LEFT JOIN reviews r ON p.product_id = r.product_id
            WHERE 1=1";

  $params = [];

  // Add search filter
  if (!empty($search)) {
      $query .= " AND p.product_name LIKE :search";
      $params[':search'] = "%$search%";
  }

  // Add category filter
  if (!empty($category)) {
      $query .= " AND c.category_name = :category";
      $params[':category'] = $category;
  }

  // Sorting
  switch ($sort) {
      case 'price_asc':
          $query .= " ORDER BY p.product_price ASC";
          break;
      case 'price_desc':
          $query .= " ORDER BY p.product_price DESC";
          break;
      case 'rating':
          $query .= " ORDER BY avg_rating DESC";
          break;
      default:
          $query .= " ORDER BY p.created_at DESC";
  }

  $stmt = $this->conn->prepare($query);
  $stmt->execute($params);

  return $stmt;
}

}