<?php

// require 'models/user.php';

// $active_form = isset($_POST['signup']) ? 'signup' : 'signin';

// $userController = new UserController;

//     if (isset($_POST['signup'])) {
//         $userController->signup_user($_POST);
//         if (empty($error)) {
//             $active_form = 'signin'; // Switch to signin on success
//         }
//     }
//     if (isset($_POST['signin'])) {
//         $userController->signin_user($_POST);
//     }



// class UserController {
//     private $user;

//     public function __construct() {
//         $this->user = new User; // Initialize User with database connection
//     }



//         function signup_user($data){
//                     $result = $this->user->signup($data); // Call signup method
//                 $error = $result['error'] ?? ''; // Capture error if exists
//                 $success = $result['success'] ?? ''; // Capture success message if exists
//                 if (empty($error)) {
//                     $active_form = 'signin'; // Switch to signin form if signup succeeds
//                 }
//         }
                
//         function signin_user($data){
//             $result = $this->user->signin($data); // Call signin method
//             $error = $result['error'] ?? ''; // Capture error if exists
        
//         }

//         // Return necessary variables to render the appropriate form and error/success messages

//     }

// 
?>
