<?php

class Order {

    public $order_id;
    public $customer_id;
    public $coupon_id;
    public $order_total_amount;
    public $order_total_amount_after;
    public $order_status;
    public $delivery_address;
    public $created_at;

    // Properties
    function showOrders(){
      $dbInstance = Database::getInstance();
      $conn = $dbInstance->getConnection();
      $sql = "SELECT customers.customer_phone,orders.* FROM `customers` LEFT JOIN orders ON orders.customer_ID = customers.customer_ID;";
      $start = $conn->query($sql);
      if ($start) {
          $row = $start->fetchAll(PDO::FETCH_ASSOC);  
          return  $row;
      }else {
          echo "0 results";
     }
    }
  
    function showOrderItems($order){
      $dbInstance = Database::getInstance();
      $conn = $dbInstance->getConnection();
      $id = $order;
      $sql ="SELECT products.product_name, products.product_price, products.product_image, order_products.quantity, customers.customer_name, customers.customer_phone, customers.customer_address1, orders.order_total_amount, orders.order_total_amount_after,orders.created_at,orders.order_status, coupons.coupon_amount FROM products JOIN order_products ON products.product_ID = order_products.product_ID JOIN orders ON orders.order_ID = order_products.order_ID JOIN customers ON customers.customer_ID = orders.customer_ID JOIN coupons ON coupons.coupon_ID=orders.coupon_ID WHERE order_products.order_ID = $id;";
      $start = $conn->query($sql);
      if ($start) {
          $row = $start->fetchAll(PDO::FETCH_ASSOC); 
          return $row;
      }else {
          echo "0 results";
     }
    }
  }