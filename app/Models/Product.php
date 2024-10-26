<?php

class Products {

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
  // Properties
  function showRow(){
    $dbInstance = Database::getInstance();
    $conn = $dbInstance->getConnection();

    $sql = "SELECT * FROM products;";
    $start = $conn->query($sql);
    if ($start) {
        $row = $start->fetchAll(PDO::FETCH_ASSOC);  
        return  $row;
    }else {
        echo "0 results";
   }
  }

  function updateProduct($admin) {
    $dbInstance = Database::getInstance();
    $conn = $dbInstance->getConnection();
    
    if (isset($_FILES['image']) && in_array($_FILES['image']['type'], $this->allowedTypes)) {

        $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
        $targetFile = $this->uploadDir . $fileName;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
          $product_image = 'images/products/'.$fileName;
        } else {
          echo "حدث خطأ أثناء تحميل الصورة.";
      }
      // echo 1;
    } else {
      // header("Location: dash-pr.php");
      $product_image =  $admin['image'];
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

  function addNewProduct($admin){
    if (isset($_FILES['image']) && in_array($_FILES['image']['type'], $this->allowedTypes)) {

      $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
      $targetFile = $this->uploadDir . $fileName;

      if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        $product_image = 'images/products/'.$fileName;
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
}