<?php
namespace App\Controllers;
use App\Models\Message;

class MessagesController {
    private $MessagesModel;

    public function __construct() {
        $this->MessagesModel = new Message();
    }

    public function get(){
        $messages =$this->MessagesModel->showMessage();
        require 'views/admin/customers/messages.php';
    }

    

    
}