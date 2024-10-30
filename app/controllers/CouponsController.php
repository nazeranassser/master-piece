<?php
namespace App\Controllers;
use App\Models\Product;
use App\Models\Coupons;
class CouponsController{
    private $adminModel;

    public function __construct() {
        $this->couponsModel = new Coupons();
        
    }
    public function get() {
        if(isset($_SESSION['admin_id'])){
            if ($coupons = $this->couponsModel->getAll()) {
                require 'views/admin/coupons/dash-coupons.php'; // Adjust path as needed
            } else {
                echo 'No admins found.';
            }
        }else{
            require 'views/pages/404.php';
        }
    }

    public function addPage(){
        if(isset($_SESSION['admin_id'])){
            require 'views/admin/coupons/dash-coupon-add.php';}
            else{
                require 'views/pages/404.php';
            }
    }

    function add($admin){

        $data = [
            'coupon_name' => $_POST['coupon_name'],
            'coupon_amount' => $_POST['coupon_amount_new'],
            'coupon_expire' => $_POST['coupon_expire_new'],
            'created_at' => date("Y/m/d h:m:s"),
        ];
        if ($this->couponsModel->create($data)) {
            // Redirect or show a success message
            header("location:/coupons");
        } else {
            echo "Failed to add admin.";
        }
      }

}