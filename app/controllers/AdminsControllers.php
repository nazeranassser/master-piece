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

class AdminsController {
    private $adminModel;

    public function __construct() {
        $this->adminModel = new Admin();
    }

    public function index() {
        $admins = $this->adminModel->showRow();
        require 'views/pages/index-view.php';
    }

    public function get() {
        if ($admins = $this->adminModel->showRow()) {
            require 'views/admin/admins/dash-admins.php'; // Adjust path as needed
        } else {
            echo 'No admins found.';
        }
    }

    public function add() {
        require 'views/admin/admins/dash-admin-add.php'; // Adjust the path accordingly
    }
    public function edit() {
        require 'views/admin/admins/dash-admin-edit.php'; // Adjust the path accordingly
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Get the posted data
            $data = [
                'admin_name' => $_POST['name'],
                'admin_email' => $_POST['email'],
                'admin_password' => password_hash($_POST['password'], PASSWORD_DEFAULT), // Hash the password
                'date' => date("Y/m/d h:m:s")
            ];

            // Call the model to add the admin
            if ($this->adminModel->addNew($data)) {
                // Redirect or show a success message
                $this->get();
            } else {
                echo "Failed to add admin.";
            }
        } else {
            // If it's not a POST request, redirect or show an error
            echo "Invalid request.";
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
}

