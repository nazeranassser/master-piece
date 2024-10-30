<?php
namespace App\Models;
use App\Models\Model;
use PDO; // Use the global PDO class
use PDOException;

class Customer extends Model{
    public $uploadDir = 'images/products/';
  public $allowedTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];

  

    protected $db;
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
        $this->db = Database::getInstance()->getConnection(); // Get the database connection
        parent::__construct('customers');
    }


    function showRow() {
        $sql = "SELECT * FROM customers;";
        $start = $this->db->query($sql);
        if ($start) {
            $row = $start->fetchAll(PDO::FETCH_ASSOC);  
            return $row;
        } else {
            echo "0 results";
        }
    }

    public function findUserByEmailOrUsername($email){
        $stmt =$this->db->prepare('SELECT * FROM customers WHERE customer_email = :email');
        $stmt->bindParam(':email', $email);
        // Execute the statement
        $stmt->execute();
        // Fetch the result
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // var_dump($row);
        // die();
        // Check row
        if($row){
            return $row;
        }else{
            return false;
        }
    }

    //Register User
    public function register($data) {
        $stmt = $this->db->prepare("INSERT INTO `customers`( `customer_name`, `customer_email`, `customer_password`, `customer_address1`, `customer_address2`, `customer_phone`) VALUES
            (:name,:email,:password,:firstAddress,:secondAddress,:phoneNumber);");
        //Bind values
        $stmt->bindParam(':name', $data['customer_name']);
        $stmt->bindParam(':email', $data['customer_email']);
        $stmt->bindParam(':password', $data['customer_password']);
        $stmt->bindParam(':firstAddress', $data['customer_address']);
        $stmt->bindParam(':secondAddress', $data['customer_address2']);
        $stmt->bindParam(':phoneNumber', $data['customer_phone']);

        //Execute
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    //Login user
    public function login($nameOrEmail, $password){
        $row = $this->findUserByEmailOrUsername($nameOrEmail);

        if($row == false) return false;
        // var_dump($row);
        $hashedPassword = $row['customer_password'];
        if(password_verify($password, $hashedPassword)){
            return $row;
        }else{
            return false;
        }
    }
    public function getCustomer($id){ 
        try{
            $query = "SELECT * FROM customers WHERE customer_Id=:id";
            $stmt=$this->db->prepare($query);
            $stmt->bindParam(":id",$id);
            $stmt->execute();
            if($stmt->rowcount()>0){
                $customer =$stmt->fetch(PDO::FETCH_ASSOC);
                return $customer;
            }else{
                return null;
            }
            }catch(PDOExcption $e){
                error_log($e->getMessage());
                return FALSE;
            }
        }
        public function updatecustomer($id,$data){
            if (isset($_FILES['image']) && in_array($_FILES['image']['type'], $this->allowedTypes)) {
                $fileName = uniqid() . '' . basename($_FILES['image']['name']);
                $targetFile = $this->uploadDir . $fileName;
        
                if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                    $customer_image = 'images/products/' . $fileName;
                } else {
                    echo "Error uploading image.";
                    return; // Stop execution if image upload fails
                }
            } else {
                $customer_image = $admin['image'] ?? null;
            }
            return $this->update($id,$data);
            
        }
  

}