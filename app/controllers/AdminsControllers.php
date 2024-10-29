<?php

// require 'Models/Admin.php';
// // include '../Model/Admins.php';

//     // $controller = new AdminController();
//     // if ($_POST['add_admin_name']) {
//     //    $controller->register($_POST);
//     // }
//     // namespace App\Controllers;
//     // use Model\Admin;

//     class AdminController {
//     private $adminModel;
 
//     public function __construct() {
//        $this->adminModel = new Admin;
//     }


//     public function index(){
//         $this->get();
//     }

//     public function register($admin) {
//        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//         $data = [
//             'admin_name' => $_POST['add_admin_name'],
//             'admin_email' => $_POST['admin_email'],
//             'admin_password' => password_hash($_POST['admin_password'], PASSWORD_DEFAULT),
//             'date' => date("Y/m/d h:m:s"),
//          ];
//           if ($this->adminModel->addNew($data)) {
//                 if($this->adminModel->showRow()){
//                     $admins = $this->adminModel->showRow();
//                     // var_dump($admins);
//                     require '../../dash-admins.php';
//                      // Redirect to success page
//                 }
//           }
//        } else {
//         //   include '../dash-admin-add.php';  // Load view if no POST request
//        }
//     }

//     function get(){
//         if($this->adminModel->showRow()){
//             $admins = $this->adminModel->showRow();
//             // var_dump($admins);
//             require '../../dash-admins.php';
//              // Redirect to success page
//         }
//     }
//  }

// namespace Controller;
namespace App\Controllers;
use App\Models\Admin;
use App\Models\Order;
require 'app/helpers/session_helper.php';

class AdminsController {
    private $adminModel;

    public function __construct() {
        $this->adminModel = new Admin();
        $this->orderModel = new Order();
        $this->orderModel->showOrdersProcessing();
        $this->orderModel->showOrdersDelivered();
        $this->orderModel->showOrdersCancelled();
    }

    public function index() {
        $admins = $this->adminModel->getAll();
        $orders = $this->orderModel->showOrders();
        $total = $this->orderModel->totalSales();
        require 'views/admin/dashboard_admin.php';
    }

    public function get() {
        if($_SESSION['is_super']==1){
            if ($admins = $this->adminModel->getAll()) {
                require 'views/admin/admins/dash-admins.php'; // Adjust path as needed
            } else {
                echo 'No admins found.';
            }
        }else{
            require 'views/pages/404.php';
        }
    }

    public function add() {
        if($_SESSION['is_super']==1){
        require 'views/admin/admins/dash-admin-add.php';}
        else{
            require 'views/pages/404.php';
        } // Adjust the path accordingly
    }
    public function edit() {
        if($_SESSION['is_super']==1){
            require 'views/admin/admins/dash-admin-edit.php';}
            else{
                require 'views/pages/404.php';
            }
         // Adjust the path accordingly
    }
    public function loginPage() {
        require 'views/admin/login.php'; // Adjust the path accordingly
    }

    public function register() {
        if($_SESSION['is_super']){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Get the posted data
                $data = [
                    'admin_name' => $_POST['name'],
                    'admin_email' => $_POST['email'],
                    'admin_password' => password_hash($_POST['password'], PASSWORD_DEFAULT), // Hash the password
                    'created_at' => date("Y/m/d h:m:s")
                ];
    
                // Call the model to add the admin
                if ($this->adminModel->createAdmin($data)) {
                    // Redirect or show a success message
                    $this->get();
                } else {
                    echo "Failed to add admin.";
                }
            } else {
                // If it's not a POST request, redirect or show an error
                echo "Invalid request.";
            }
        }else{
            redirect("dash");
        }
        
    }

    function update() {
        $data = [
            'admin_id' => $_POST['edit'],
            'admin_name' => $_POST['admin_name'],
            'admin_email' => $_POST['email'],
            'admin_password' => password_hash($_POST['password'], PASSWORD_DEFAULT), // Hash the password
        ];
        if ($this->adminModel->update($data)) {
            // Redirect or show a success message
            $this->get();
        } else {
            echo "Failed to add admin.";
        }
    }

    public function login(){
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data = [
            'admin_email' => trim($_POST['adminNameOrEmail']),
            'admin_password' => trim($_POST['adminPassword'])
        ];

        if(empty($data['admin_email']) || empty($data['admin_password'])){
            flash("login", "Please fill out all inputs");
            redirect("admin-login");
            exit();
        }

        // Check for user/email
        $admin_data = $this->adminModel->findByEmail($data['admin_email']);
        if($admin_data['is_active']){
            // User Found
            if(password_verify($data['admin_password'],$admin_data['admin_password'])){
                $this->createAdminSession($admin_data);
            }else{
                flash("login", "Password Incorrect");
                redirect("admin-login");
            }
        } else {
            flash("login", "No admin found");
            redirect("admin-login");
        }
    }


    public function createAdminSession($user){
        $_SESSION['admin_id'] = $user['admin_id'];
        $_SESSION['admin_name'] = $user['admin_name'];
        $_SESSION['admin_Email'] = $user['admin_email'];
        $_SESSION['is_super'] = $user['is_super'];
        header("Location: /dash ");
    }

}

