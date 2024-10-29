<?php
require  __DIR__ .'/app/controllers/AdminsControllers.php';

require 'vendor/autoload.php';
// require_once __DIR__ . '/../';

use App\Router;

$router = new Router();

// Add routes
$router->add('', ['controller' => 'Products', 'action' => 'showHomePage']);
$router->add('dash', ['controller' => 'Admins', 'action' => 'index']);// dashboard-admin.php "/"
$router->add('admins', ['controller' => 'Admins', 'action' => 'get']);// dash-admins.php
$router->add('add-admin', ['controller' => 'Admins', 'action' => 'add']);// dash-admin-add.php
$router->add('edit-admin', ['controller' => 'Admins', 'action' => 'edit']);// dash-admin-edit.php
$router->add('register', ['controller' => 'Admins', 'action' => 'register']);//admins-controllers->register()
$router->add('update_admin', ['controller' => 'Admins', 'action' => 'update']);//admins-controllers->update_admin()
$router->add('customer/get', ['controller' => 'customer', 'action' => 'get']);
$router->add('cart/{id:\d+}', ['controller' => 'Carts', 'action' => 'addToCart']);
$router->add('update_product', ['controller' => 'Products', 'action' => 'edit']);//admins-controllers->update_admin()
$router->add('products', ['controller' => 'Products', 'action' => 'filter']);//admins-controllers->update_admin()
$router->add('product/update', ['controller' => 'Products', 'action' => 'update']);//ProductsControllers->update()
$router->add('product/add', ['controller' => 'Products', 'action' => 'add']);//admins-controllers->update_admin()
$router->add('login-add', ['controller' => 'Customers', 'action' => 'login']);
$router->add('login', ['controller' => 'Customers', 'action' => 'loginPage']);
$router->add('signup', ['controller' => 'Customers', 'action' => 'signupPage']);
$router->add('sign-out', ['controller' => 'Customers', 'action' => 'logout']);
$router->add('profile-main', ['controller' => 'Customers', 'action' => 'getById']);
$router->add('profile-order', ['controller' => 'Customers', 'action' => 'getById1']);
$router->add('signup-action', ['controller' => 'Customers', 'action' => 'register']);
$router->add('create-product', ['controller' => 'Products', 'action' => 'addProduct']);//admins-controllers->update_admin()
$router->add('product-category-filter', ['controller' => 'Products', 'action' => 'index']);
$router->add('admin-login', ['controller' => 'Admins', 'action' => 'loginPage']);
$router->add('login-admin', ['controller' => 'Admins', 'action' => 'login']);





//  Router::get()

$url = trim($_SERVER['REQUEST_URI'], '/'); // Trim leading and trailing slashes

// Dispatch the request
$router->dispatch($url);

?>