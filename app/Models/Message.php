<?php
namespace App\Models;
use App\Models\Model;
use PDO; // Use the global PDO class
use PDOException;
class Message extends Model{

    public $message_id;
    public $customer_id;
    public $message_text;
    public $message_subject;
    public $created_at;

    public function __construct() {
        // Pass the table name 'admins' to the BaseModel constructor
        parent::__construct('messages');
    }
    
    function showMessage(){
        $sql =" SELECT messages.message_id,messages.message_subject,messages.message_text,messages.created_at , customers.customer_email FROM `messages` CROSS JOIN customers WHERE customers.customer_id = messages.customer_id;";
        $start = $this->db->query($sql);
        if ($start) {
            $row = $start->fetchAll(PDO::FETCH_ASSOC); 
            return $row;
        }
    }

    function totalMessages(){
        $sql =" SELECT COUNT(*) FROM `messages`;";
        $start = $this->db->query($sql);
        if ($start) {
            $row = $start->fetchAll(PDO::FETCH_ASSOC); 
            $total =$row[0]['COUNT(*)'];
            return $total;
        }
    }
}
