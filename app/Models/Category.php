<?php
namespace App\Models;
use App\Models\Model;

class Category extends Model{

    public $category_id;
    public $category_name;
    public $category_image;
    public $created_at;
    // Properties

    public function __construct() {
      parent::__construct('categories');
  }

  public function getAll(){
      return $this->get();
  }

  public function updateCategory($id,$data){
    return $this->update($id,$data);
}

public function createCategory($data){
    return $this->create($data);
}

public function deleteCategory($id){
    return $this->delete($id);
}
   
}
  