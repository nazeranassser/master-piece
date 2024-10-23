<?php


class Category {

    public $category_id;
    public $category_name;
    public $category_image;
    public $created_at;
    // Properties
    function showRow(){
      $dbInstance = Database::getInstance();
      $conn = $dbInstance->getConnection();
  
      $sql = "SELECT * FROM categories;";
      $start = $conn->query($sql);
      if ($start) {
          $row = $start->fetchAll(PDO::FETCH_ASSOC);  
          return  $row;
      }else {
          echo "0 results";
     }
    }
  }
  