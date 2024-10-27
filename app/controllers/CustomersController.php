<?php
namespace App\Controllers;
use App\Models\Customer;

class CustomersController {
    private $adminModel;

    public function __construct() {
        $this->adminModel = new Customer();
    }

    public function index() {
        $customers = $this->adminModel->showRow();
        require 'views/admin/customers/dash-customers.php';
    }

    public function get() {
        if ($customers = $this->adminModel->showRow()) {
            require 'views/admin/customers/dash-customers.php'; // Adjust path as needed
        } else {
            echo 'No admins found.';
        }
    }

    public function add() {
        require 'views/admin/admins/dash-admin-add.php'; // Adjust the path accordingly
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Get the posted data
            $data = [
                'admin_name' => $_POST['name'],
                'admin_email' => $_POST['email'],
                'admin_password' => password_hash($_POST['password'], PASSWORD_DEFAULT), // Hash the password
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
}

