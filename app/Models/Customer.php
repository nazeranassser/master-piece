<?php
namespace App\Models;
use PDO; // Use the global PDO class
use PDOException;
class Customer{

    private $conn;
    public $customer_id;
    public $customer_name;
    public $customer_email;
    public $customer_phone;
    public $customer_address1;
    public $customer_address2;
    public $customer_image;
    public $customer_password;
    public $created_at;
    
    public function __construct() {
        $this->conn = Database::getInstance()->getConnection(); // Get the database connection
    }


    function showRow() {
        $sql = "SELECT * FROM customers;";
        $start = $this->conn->query($sql);
        if ($start) {
            $row = $start->fetchAll(PDO::FETCH_ASSOC);  
            return $row;
        } else {
            echo "0 results";
        }
    }
}