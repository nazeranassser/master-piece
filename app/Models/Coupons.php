<?php 
namespace App\Models;
use App\Models\Model;


class Coupons extends Model{
  // Properties
    public function __construct() {
     parent::__construct('coupons');
     
    }
    
    public function findById($id) {
        return $this->get($id);
    }

    public function getAll(){
        return $this->get();
    }

    public function updateCoupons($id,$data){
        return $this->update($id,$data);
    }
}

