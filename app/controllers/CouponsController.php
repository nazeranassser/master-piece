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

}