<?php
namespace App\Models;
use PDO; // Use the global PDO class
use PDOException;
// include '../../config.php';
class Admin {
    // Properties
    private $conn;
    private $id;
    private $name;
    private $email;
    private $password;
    private $date;

    public function __construct() {
        $this->conn = Database::getInstance()->getConnection(); // Get the database connection
    }

    function showAdminId($data) {
        $this->id = $data['admin_id'];
        $sql = "SELECT * FROM admins WHERE admin_id =:id;";
        $sql->bindParam(':id', $data['admin_id']);
        $start = $this->conn->query($sql);
        if ($start) {
            $row = $start->fetch(PDO::FETCH_ASSOC);  
            return $row;
        }
    }

    function showRow() {
        $sql = "SELECT * FROM admins;";
        $start = $this->conn->query($sql);
        if ($start) {
            $row = $start->fetchAll(PDO::FETCH_ASSOC);  
            return $row;
        } else {
            echo "0 results";
        }
    }

    function update($data) {        
        $sql = $this->conn->prepare("UPDATE admins SET admin_name=:name, admin_email=:email, admin_password=:password WHERE admin_ID =:id");
        $sql->bindParam(':id', $data['admin_id']);
        $sql->bindParam(':name', $data['admin_name']);
        $sql->bindParam(':email', $data['admin_email']);
        $sql->bindParam(':password', $data['admin_password']);
        // $sql->bindParam(':date', $data['date']);
        // $start = $this->conn->query($sql);
        return $sql->execute();
    }

    function addNew($data){
        $sql = $this->conn->prepare("INSERT INTO admins (admin_name, admin_email, admin_password, created_at) VALUES (:name, :email, :password, :date)");
        $sql->bindParam(':name', $data['admin_name']);
        $sql->bindParam(':email', $data['admin_email']);
        $sql->bindParam(':password', $data['admin_password']);
        $sql->bindParam(':date', $data['date']);
        
            return $sql->execute();

    }

    function deleteAdmin($data){
        $this->id = $data['admin_delete'];
        $sql2 = "DELETE FROM admins WHERE admin_ID = :admin_id";
        $result = $this->conn->prepare($sql2);
        return $result->execute(['admin_id' => $admin_id]);
    }
}

