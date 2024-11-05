<?php
namespace App\Models;
use App\Models\Model;
use PDO; // Use the global PDO class
use PDOException;

class CancelReason extends Model{

    protected $db;
    public $admin_id;
    public $order_id;
    public $cancel_reason;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection(); // Get the database connection
        parent::__construct('cancel_reasons');
    }

    public function addCancelReason($adminId, $orderId, $cancelReason)
    {
        $query = "INSERT INTO cancel_reasons (admin_id, order_id, cancel_reason, created_at) VALUES (:admin_id, :order_id, :cancel_reason, NOW())";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':admin_id', $adminId, PDO::PARAM_INT);
        $stmt->bindParam(':order_id', $orderId, PDO::PARAM_INT);
        $stmt->bindParam(':cancel_reason', $cancelReason, PDO::PARAM_STR);
        return $stmt->execute();
    }

}