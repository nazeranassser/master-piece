<?php

require_once '../models/User.php';
require_once '../helpers/session_helper.php';

class Users {

    private $userModel;
    
    public function __construct(){
        $this->userModel = new User;
    }

    public function register(){
        // Process form
        
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data = [
            'usersName' => trim($_POST['usersName']),
            'usersEmail' => trim($_POST['usersEmail']),
            'usersUid' => trim($_POST['usersUid']),
            'usersPwd' => trim($_POST['usersPwd']),
            'pwdRepeat' => trim($_POST['pwdRepeat']),
            'usersFirstAddress' => trim($_POST['usersFirstAddress']),
            'usersSecondAddress' => trim($_POST['usersSecondAddress']),
            'usersPhoneNumber' => trim($_POST['usersPhoneNumber'])
        ];

        // Validate inputs
        if(empty($data['usersName']) || empty($data['usersEmail']) || empty($data['usersUid']) || 
        empty($data['usersPwd']) || empty($data['pwdRepeat'])){
            flash("register", "Please fill out all inputs");
            redirect("../signup.php");
        }

        if(!preg_match("/^[a-zA-Z0-9]*$/", $data['usersUid'])){
            flash("register", "Invalid username");
            redirect("../signup.php");
        }

        if(!filter_var($data['usersEmail'], FILTER_VALIDATE_EMAIL)){
            flash("register", "Invalid email");
            redirect("../signup.php");
        }

        // Validate password
          if(strlen($data['usersPwd']) < 8 || 
          !preg_match("/[A-Z]/", $data['usersPwd']) || 
          !preg_match("/[a-z]/", $data['usersPwd']) || 
          !preg_match("/[0-9]/", $data['usersPwd']) || 
          !preg_match("/[\W_]/", $data['usersPwd'])) {
          flash("register", "Password must be at least 8 characters long, include at least one uppercase letter, one lowercase letter, one number, and one special character");
          redirect("../signup.php");
           } else if($data['usersPwd'] !== $data['pwdRepeat']){
          flash("register", "Passwords don't match");
           redirect("../signup.php");
           }


          // Validate phone number
        if (!preg_match("/^07\d{8}$/", $data['usersPhoneNumber']) || !ctype_digit($data['usersPhoneNumber'])) {
           flash("register", "Phone number must be exactly 10 digits and start with 07");
           redirect("../signup.php");
        }


        // User with the same email or username already exists
        if($this->userModel->findUserByEmailOrUsername($data['usersEmail'])){
            flash("register", "Username or email already taken");
            redirect("../signup.php");
        }

        // Passed all validation checks.
        // Now going to hash password
        $data['usersPwd'] = password_hash($data['usersPwd'], PASSWORD_DEFAULT);

        // Register User
        if($this->userModel->register($data)){
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
            'usersPwd' => trim($_POST['usersPwd'])
        ];

        if(empty($data['name/email']) || empty($data['usersPwd'])){
            flash("login", "Please fill out all inputs");
            header("location: ../login.php");
            exit();
        }

        // Check for user/email
        if($this->userModel->findUserByEmailOrUsername($data['name/email'])){
            // User Found
            $loggedInUser = $this->userModel->login($data['name/email'], $data['usersPwd']);
            if($loggedInUser){
                // Create session
                $this->createUserSession($loggedInUser);
            } else {
                flash("login", "Password Incorrect");
                redirect("../login.php");
            }
        } else {
            flash("login", "No user found");
            redirect("../login.php");
        }
    }

    public function createUserSession($user){
        $_SESSION['usersId'] = $user['customer_ID'];
        $_SESSION['usersName'] = $user['customer_name'];
        $_SESSION['usersEmail'] = $user['customer_email'];
        redirect("/");
    }

    public function logout(){
        unset($_SESSION['usersId']);
        unset($_SESSION['usersName']);
        unset($_SESSION['usersEmail']);
        session_destroy();
        redirect("/");
    }
}

$init = new Users;

// Ensure that user is sending a post request
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    switch($_POST['type']){
        case 'register':
            $init->register();
            break;
        case 'login':
            $init->login();
            break;
        default:
            redirect("/");
    }
} else {
    switch($_GET['q']){
        case 'logout':
            $init->logout();
            break;
        default:
            redirect("/");
    }
}
