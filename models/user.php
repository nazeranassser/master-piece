<?php
session_start();
include('config.php');

class User {
    private $conn;
    private $error = '';
    private $success = '';

    // User properties
    private $username;
    private $email;
    private $password;
    private $confirm_password;
    private $address1;
    private $address2;
    private $phone;
    private $customer_image = 'default-avatar.png';

    public function __construct() {
        include('connection.php');
        $this->conn = $conn;
    }

    public function signup($data) {
        $this->username = $data['signup-username'];
        $this->email = $data['signup-email'];
        $this->password = $data['signup-password'];
        $this->confirm_password = $data['signup-confirm-password'];
        $this->address1 = $data['signup-address1'];
        $this->address2 = $data['signup-address2'];
        $this->phone = $data['signup-phone'];

        if ($this->validateSignup()) {
            $this->createUser();
        }

        return ['error' => $this->error, 'success' => $this->success];
    }

    private function validateSignup() {
        if (empty($this->username) || empty($this->email) || empty($this->password) || 
            empty($this->confirm_password) || empty($this->phone)) {
            $this->error = 'All fields are required for signup.';
            return false;
        }
        if ($this->password !== $this->confirm_password) {
            $this->error = 'Passwords do not match.';
            return false;
        }
        if (!$this->isPasswordValid($this->password)) {
            $this->error = 'Password does not meet requirements.';
            return false;
        }
        if ($this->emailExists($this->email)) {
            $this->error = 'Email already exists. Please choose another one.';
            return false;
        }
        return true;
    }

    private function isPasswordValid($password) {
        return strlen($password) >= 8 && 
               preg_match("/[A-Z]/", $password) && 
               preg_match("/[a-z]/", $password) && 
               preg_match("/[0-9]/", $password) && 
               preg_match("/[^A-Za-z0-9]/", $password);
    }

    private function emailExists($email) {
        $sql = "SELECT * FROM customers WHERE customer_email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
    }

    private function createUser() {
        $hashed_password = password_hash($this->password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO customers (customer_name, customer_email, customer_password, customer_image, customer_address1, customer_address2, customer_phone) 
                VALUES (:username, :email, :password, :image, :address1, :address2, :phone)";
        $stmt = $this->conn->prepare($sql);

        try {
            $stmt->execute([
                'username' => $this->username,
                'email' => $this->email,
                'password' => $hashed_password,
                'image' => $this->customer_image,
                'address1' => $this->address1,
                'address2' => $this->address2,
                'phone' => $this->phone
            ]);
            $this->success = 'Account created successfully! You can now log in.';
        } catch(PDOException $e) {
            $this->error = 'An error occurred. Please try again.';
        }
    }

    public function signin($data) {
        $this->email = $data['signin-username'];
        $this->password = $data['signin-password'];

        if (empty($this->email) || empty($this->password)) {
            $this->error = 'Email and password are required for login.';
        } else {
            $this->authenticateUser();
        }

        return ['error' => $this->error];
    }

    private function authenticateUser() {
        $sql = "SELECT * FROM customers WHERE customer_email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $this->email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($this->password, $user['customer_password'])) {
            $_SESSION['customer_ID'] = $user['customer_ID'];
            $_SESSION['customer_name'] = $user['customer_name'];
            $_SESSION['customer_image'] = $user['customer_image'] ?: 'default-avatar.png';
            header("Location: index.php");
            exit;
        } else {
            $this->error = 'Invalid email or password.';
        }
    }

    public function getError() {
        return $this->error;
    }

    public function getSuccess() {
        return $this->success;
    }
}

// Instantiate User class
// $user = new User($conn);
// $active_form = isset($_POST['signup']) ? 'signup' : 'signin';

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     if (isset($_POST['signup'])) {
//         $result = $user->signup($_POST);
//         $error = $result['error'];
//         $success = $result['success'];
//         if (empty($error)) {
//             $active_form = 'signin'; // Switch to signin on success
//         }
//     }

//     if (isset($_POST['signin'])) {
//         $result = $user->signin($_POST);
//         $error = $result['error'];
//     }
// }
?>
