<?php
// include 'controllers/users/add-admins.php';

// require_once 'app/Router.php';
// require_once 'controllers/admins-controllers.php';

// $router = new Router();

// // Add routes
// $router->add('', ['controller' => 'admins', 'action' => 'index']);
// $router->add('admins', ['controller' => 'admins', 'action' => 'index']);
// $router->add('post/{id:\d+}', ['controller' => 'Admin', 'action' => 'show']);

// // var_dump($_SERVER);

// // Dispatch the request
// // $url = $_SERVER['QUERY_STRING'];  // Assuming you're using the query string for routing
// $url = $_SERVER['REQUEST_URI'];
// $router->dispatch($url);


// // foreach ($routes as $rou => $index){
// //     if($_SERVER['REQUEST_URI'] == $rou){
// //         require $routs[$_SERVER['REQUEST_URI']];
// //     }
// // }

// // $controller = new AdminController();
// // var_dump($_SERVER['REQUEST_URI']);
// // if(array_key_exists($_SERVER['REQUEST_URI'],$routes)){
// //        require $routes[$_SERVER['REQUEST_URI']];
// // }else 
// // if($_SERVER['REQUEST_URI'] == '/register' && ){
// //     // $controller->register();
// //     require 'dash-admin-add.php';
// // }
// //     else{
// //         require 'login.php';
// //     }
// require 'app/Router.php';
require  __DIR__ .'/app/controllers/AdminsControllers.php';

require 'vendor/autoload.php';
// require_once __DIR__ . '/../';

use App\Router;

$router = new Router();

// Add routes
$router->add('', ['controller' => 'Admins', 'action' => 'index']);// dashboard-admin.php "/"
$router->add('admins', ['controller' => 'Admins', 'action' => 'get']);// dash-admins.php
$router->add('add-admin', ['controller' => 'Admins', 'action' => 'add']);// dash-admin-add.php
$router->add('edit-admin', ['controller' => 'Admins', 'action' => 'edit']);// dash-admin-edit.php
$router->add('register', ['controller' => 'Admins', 'action' => 'register']);//admins-controllers->register()
$router->add('update_admin', ['controller' => 'Admins', 'action' => 'update']);//admins-controllers->update_admin()
$router->add('customer/get', ['controller' => 'customer', 'action' => 'get']);
$router->add('cart', ['controller' => 'Carts', 'action' => 'getCartItems']);//cart-controllers->getCartItems()

//  Router::get()

$url = trim($_SERVER['REQUEST_URI'], '/'); // Trim leading and trailing slashes

// Dispatch the request
$router->dispatch($url);

?>