<?php
require '../config.php';

class User {

    private $db;

    public function __construct(){
        $this->db = Database::getInstance()->getConnection();
    }

    //Find user by email or username
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
        $stmt->bindParam(':name', $data['usersName']);
        $stmt->bindParam(':email', $data['usersEmail']);
        // $stmt->bindParam(':Uid', $data['usersUid']);
        $stmt->bindParam(':password', $data['usersPwd']);
        $stmt->bindParam(':firstAddress', $data['usersFirstAddress']);
        $stmt->bindParam(':secondAddress', $data['usersSecondAddress']);
        $stmt->bindParam(':phoneNumber', $data['usersPhoneNumber']);

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

    //Reset Password
    public function resetPassword($newPwdHash, $tokenEmail){
        $this->db->query('UPDATE users SET usersPwd=:pwd WHERE usersEmail=:email');
        $this->db->bind(':pwd', $newPwdHash);
        $this->db->bind(':email', $tokenEmail);

        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}