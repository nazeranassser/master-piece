<?php

require_once '../models/Customer.php';
require_once '../helpers/session_helper.php';

class Customer {

    private $customerModel;

    public function __construct(){
        $this->customerModel = new Customer;
    }

    public function register(){
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data = [
            'customer_name' => trim($_POST['customer_name']),
            'customer_email' => trim($_POST['customer_email']),
            'customer_password' => trim($_POST['customer_password']),
            'pwdRepeat' => trim($_POST['pwdRepeat']),
            'customer_address1' => trim($_POST['customer_address1']),
            'customer_address2' => trim($_POST['customer_address2']),
            'customer_phone' => trim($_POST['customer_phone']),
            'customer_image' => $_FILES['customer_image'] ?? null // File upload for customer_image
        ];

        // Validate inputs
        if (empty($data['customer_name']) || empty($data['customer_email']) || empty($data['customer_password']) || empty($data['pwdRepeat'])) {
            flash("register", "Please fill out all inputs");
            redirect("../signup.php");
        }

        if (!filter_var($data['customer_email'], FILTER_VALIDATE_EMAIL)) {
            flash("register", "Invalid email");
            redirect("../signup.php");
        }

        // Validate password
        if (strlen($data['customer_password']) < 8 || 
            !preg_match("/[A-Z]/", $data['customer_password']) || 
            !preg_match("/[a-z]/", $data['customer_password']) || 
            !preg_match("/[0-9]/", $data['customer_password']) || 
            !preg_match("/[\W_]/", $data['customer_password'])) {
            flash("register", "Password must be at least 8 characters, include one uppercase letter, one lowercase letter, one number, and one special character");
            redirect("../signup.php");
        } else if ($data['customer_password'] !== $data['pwdRepeat']) {
            flash("register", "Passwords don't match");
            redirect("../signup.php");
        }

        // Validate phone number
        if (!preg_match("/^07\d{8}$/", $data['customer_phone'])) {
            flash("register", "Phone number must be exactly 10 digits and start with 07");
            redirect("../signup.php");
        }

        // Check for existing user by email
        if ($this->customerModel->findCustomerByEmailOrUsername($data['customer_email'], $data['customer_name'])) {
            flash("register", "Username or email already taken");
            redirect("../signup.php");
        }

        // Hash password
        $data['customer_password'] = password_hash($data['customer_password'], PASSWORD_DEFAULT);

        // Handle file upload for customer image
        if ($data['customer_image']) {
            $targetDir = "../uploads/";
            $targetFile = $targetDir . basename($data['customer_image']['name']);
            if (move_uploaded_file($data['customer_image']['tmp_name'], $targetFile)) {
                $data['customer_image'] = $targetFile;
            } else {
                flash("register", "Failed to upload image");
                redirect("../signup.php");
            }
        }

        // Register Customer
        if ($this->customerModel->register($data)) {
            redirect("../login.php");
        } else {
            die("Something went wrong");
        }
    }

    public function login(){
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data = [
            'name/email' => trim($_POST['name/email']),
            'customer_password' => trim($_POST['customer_password'])
        ];

        if (empty($data['name/email']) || empty($data['customer_password'])) {
            flash("login", "Please fill out all inputs");
            header("location: ../login.php");
            exit();
        }

        // Check for customer by email/username
        if ($this->customerModel->findCustomerByEmailOrUsername($data['name/email'], $data['name/email'])) {
            // Customer Found
            $loggedInCustomer = $this->customerModel->login($data['name/email'], $data['customer_password']);
            if ($loggedInCustomer) {
                // Create session
                $this->createCustomerSession($loggedInCustomer);
            } else {
                flash("login", "Password Incorrect");
                redirect("../login.php");
            }
        } else {
            flash("login", "No customer found");
            redirect("../login.php");
        }
    }

    public function createCustomerSession($customer){
        $_SESSION['customer_id'] = $customer->customer_id;
        $_SESSION['customer_name'] = $customer->customer_name;
        $_SESSION['customer_email'] = $customer->customer_email;
        redirect("../index-view.php");
    }

    public function logout(){
        unset($_SESSION['customer_id']);
        unset($_SESSION['customer_name']);
        unset($_SESSION['customer_email']);
        session_destroy();
        redirect("../index-view.php");
    }
}

$init = new Customers;

// Handle requests based on request type
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch ($_POST['type']) {
        case 'register':
            $init->register();
            break;
        case 'login':
            $init->login();
            break;
        default:
            redirect("../index-view.php");
    }
} else {
    switch ($_GET['q']) {
        case 'logout':
            $init->logout();
            break;
        default:
            redirect("../index-view.php");
    }
}
