<?php
require_once '../libraries/Database.php';

class Customer {

    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    // Find customer by email or username
    public function findCustomerByEmailOrUsername($email, $username){
        $this->db->query('SELECT * FROM customers WHERE customersUid = :username OR customersEmail = :email');
        $this->db->bind(':username', $username);
        $this->db->bind(':email', $email);

        $row = $this->db->fetchOne();

        // Check row
        if($this->db->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

    // Register Customer
    public function register($data) {
        $this->db->query('INSERT INTO customers (customersName, customersEmail, customersUid, customersPwd, customersFirstAddress, customersSecondAddress, customersPhoneNumber) 
        VALUES (:name, :email, :Uid, :password, :firstAddress, :secondAddress, :phoneNumber)');
        
        // Bind values
        $this->db->bind(':name', $data['customersName']);
        $this->db->bind(':email', $data['customersEmail']);
        $this->db->bind(':Uid', $data['customersUid']);
        $this->db->bind(':password', $data['customersPwd']);
        $this->db->bind(':firstAddress', $data['customersFirstAddress']);
        $this->db->bind(':secondAddress', $data['customersSecondAddress']);
        $this->db->bind(':phoneNumber', $data['customersPhoneNumber']);

        // Execute
        return $this->db->execute();
    }

    // Login customer
    public function login($nameOrEmail, $password){
        $row = $this->findCustomerByEmailOrUsername($nameOrEmail, $nameOrEmail);

        if($row == false) return false;

        $hashedPassword = $row->customersPwd;
        if(password_verify($password, $hashedPassword)){
            return $row;
        }else{
            return false;
        }
    }

    // Reset Password
    public function resetPassword($newPwdHash, $tokenEmail){
        $this->db->query('UPDATE customers SET customersPwd = :pwd WHERE customersEmail = :email');
        $this->db->bind(':pwd', $newPwdHash);
        $this->db->bind(':email', $tokenEmail);

        // Execute
        return $this->db->execute();
    }
}
