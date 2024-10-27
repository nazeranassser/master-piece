<?php
namespace App\Models;
use App\Models\Model;

class Admin extends Model{
    // Properties
    private $conn;
    private $id;
    private $name;
    private $email;
    private $password;
    private $date;

    public function __construct() {
        parent::__construct('admins');
    }

    public function findById($id) {
        return $this->get($id);
    }

    public function getAll(){
        return $this->get();
    }

    public function updateAdmin($id,$data){
        return $this->update($id,$data);
    }

    public function deleteAdmin($id){
        return $this->delete($id);
    }

    public function createAdmin($data){
        return $this->create($data);
    }
}

