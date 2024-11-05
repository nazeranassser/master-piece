<?php
namespace App\Controllers;
use App\Models\Order;
use App\Models\CancelReason;

class OrdersController
{
    private $ordersModel;
    private $cancelReasonModel;

    public function __construct()
    {
        $this->ordersModel = new Order();
        $this->cancelReasonModel = new CancelReason();
    }

    // public function index() {
    //     $customers = $this->ordersModel->showRow();
    //     require 'views/admin/customers/dash-customers.php';
    // }

    public function get()
    {
        if ($orders = $this->ordersModel->showOrders()) {
            require 'views/admin/orders/dash-orders.php'; // Adjust path as needed
        } else {
            echo 'No admins found.';
        }
    }

    public function add()
    {
        require 'views/admin/admins/dash-admin-add.php'; // Adjust the path accordingly
    }

    public function orderDetails()
    {
        $orderFilter = $_GET['id'] ?? null;
        // echo "Product ID: " . $orderFilter;
        // die();
        if ($orderFilter != 'all') {
            // var_dump($id);
            // die();
            if ($orders = $this->ordersModel->showOrderItems($orderFilter)) {
                require 'views/admin/orders/dash-manage-order.php';
            }
        } else {
            header("location:/404");
        } // Adjust the path accordingly
    }

    function orderStatus()
    {
        $order_id = $_GET['id'];
        $status = $_GET['status'];
        $orderStatus = [
            'order_status' => $status
        ];
        if ($orderStatus['order_status'] == 'cancelled') {
            $adminId = $_SESSION['admin_id'];
            var_dump($adminId);
            // Validate POST data
            var_dump($order_id);
            $cancelReason = $_GET['cancel_reason'];
            var_dump($cancelReason);
            

            if (!empty($adminId) && !empty($order_id) && !empty($cancelReason)) {
                // Load the model and call the method to insert the cancellation reason
                 $this->cancelReasonModel->addCancelReason($adminId, $order_id, $cancelReason);   
                 $this->ordersModel->updateStatus($order_id, $orderStatus);             // Redirect or return success response
                header('Location: /orderDetails?id=' . $order_id);
                }
        }
            
        else {
            $this->ordersModel->updateStatus($order_id, $orderStatus);

            header('location:/orderDetails?id=' . $order_id);
        }
    }

}

