<?php
namespace App\Models;
use App\Models\Model;
class Order extends Model {

    public $order_id;
    public $customer_id;
    public $coupon_id;
    public $order_total_amount;
    public $order_total_amount_after;
    public $order_status;
    public $delivery_address;
    public $created_at;

    public function __construct() {
        // Pass the table name 'admins' to the BaseModel constructor
        parent::__construct('orders');
    }
    

    function showOrders(){
        $sql =" SELECT orders.order_ID,orders.order_total_amount_after,orders.delivery_address,orders.created_at , customers.customer_phone FROM `orders` CROSS JOIN customers WHERE customers.customer_ID = orders.customer_ID;";
        $start = $this->db->query($sql);
        if ($start) {
            $row = $start->fetchAll(PDO::FETCH_ASSOC); 
            return $row;
        }
    }
  
    function showOrderItems($id){
      $sql ="SELECT products.product_name, products.product_price, products.product_image, order_products.quantity, customers.customer_name, customers.customer_phone, customers.customer_address1, orders.order_total_amount, orders.order_total_amount_after,orders.created_at,orders.order_status, coupons.coupon_amount FROM products JOIN order_products ON products.product_ID = order_products.product_ID JOIN orders ON orders.order_ID = order_products.order_ID JOIN customers ON customers.customer_ID = orders.customer_ID JOIN coupons ON coupons.coupon_ID=orders.coupon_ID WHERE order_products.order_ID = $id;";
      $start = $this->db->query($sql);
      if ($start) {
          $row = $start->fetchAll(PDO::FETCH_ASSOC); 
          return $row;
      }else {
          echo "0 results";
     }
    }

    function totalSales(){
        $sql = "SELECT SUM(order_total_amount_after) AS total FROM orders WHERE order_total_amount_after <= DATE_SUB(CURDATE(), INTERVAL 30 DAY);";
        $start = $this->db->query($sql);
        if ($start) {
            $total = $start->fetchAll(PDO::FETCH_ASSOC);  
            return  $total;
        }else {
            echo "0 results";
       }
    }
  }