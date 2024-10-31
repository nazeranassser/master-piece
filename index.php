<?php
require  __DIR__ .'/app/controllers/AdminsControllers.php';
// require  __DIR__ .'/app/controllers/CartsControllers.php';
// require  __DIR__ .'/app/controllers/CustomersControllers.php';
// require  __DIR__ .'/app/controllers/ProductsControllers.php';
// require  __DIR__ .'/app/controllers/CouponsControllers.php';
// require  __DIR__ .'/app/controllers/OrdersControllers.php';

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
$router->add('cart', ['controller' => 'Carts', 'action' => 'index']);
$router->add('cart/{id:\d+}', ['controller' => 'Carts', 'action' => 'addToCart']);
$router->add('update_product', ['controller' => 'Products', 'action' => 'edit']);//admins-controllers->update_admin()
$router->add('products', ['controller' => 'Products', 'action' => 'index']);//admins-controllers->update_admin()
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
$router->add('admin-login', ['controller' => 'Admins', 'action' => 'index']);
$router->add('product/{id:\d+}', ['controller' => 'Products', 'action' => 'viewProduct']);
$router->add('allProducts', ['controller' => 'Products', 'action' => 'showProducts']);  
$router->add('products/{id:\d+}', ['controller' => 'Products', 'action' => 'filter']);
$router->add('admin-login', ['controller' => 'Admins', 'action' => 'loginPage']);
$router->add('login-admin', ['controller' => 'Admins', 'action' => 'login']);
// $router->add('edit-admin/{id:\d+}', ['controller' => 'Admins', 'action' => 'editPage']);
$router->add('clearCart', ['controller' => 'Carts', 'action' => 'clearCart']);
$router->add('profile-edit', ['controller' => 'Customers', 'action' => 'editPage']);
$router->add('profile-update', ['controller' => 'Customers', 'action' => 'update']);//admins-controllers->update_admin()
$router->add('edit-admin/{id:\d+}', ['controller' => 'Admins', 'action' => 'getById']);
$router->add('coupons', ['controller' => 'Coupons', 'action' => 'get']);
$router->add('coupons-add', ['controller' => 'Coupons', 'action' => 'addPage']);
$router->add('new_coupon', ['controller' => 'Coupons', 'action' => 'add']);
$router->add('coupon-delete', ['controller' => 'Coupons', 'action' => 'delete']);
$router->add('orders', ['controller' => 'Orders', 'action' => 'get']);
// Route to show wishlist items
$router->add('wishlist', ['controller' => 'Wishlist', 'action' => 'show']);

// Route to add item to wishlist
$router->add('wishlist/store', ['controller' => 'Wishlist', 'action' => 'store']);

// Route to remove item from wishlist
$router->add('wishlist/delete', ['controller' => 'Wishlist', 'action' => 'delete']);

// Route to check if product is in wishlist (optional, for AJAX checking)
$router->add('wishlist/check', ['controller' => 'Wishlist', 'action' => 'check']);
$router->add('orders-detal/{id:\d+}', ['controller' => 'customers', 'action' => 'viewOrderDetails']);

$router->add('reviews', ['controller' => 'Products', 'action' => 'viewProduct']);

$router->add('about-us', ['controller' => 'customers', 'action' => 'about']);



//  Router::get()

$url = trim($_SERVER['REQUEST_URI'], '/'); // Trim leading and trailing slashes

// Dispatch the request
$router->dispatch($url);
function getAssetPaths($rootDir) {
    $assetPaths = [];

    // Scan the directory for files and subdirectories
    $files = scandir($rootDir);

    foreach ($files as $file) {
        // Ignore current and parent directory links
        if ($file !== '.' && $file !== '..') {
            $fullPath = $rootDir . '/' . $file;

            if (is_file($fullPath)) {
                // Add relative path
                $assetPaths[] = $file;
            } elseif (is_dir($fullPath)) {
                // Recursively get paths from subdirectories
                $assetPaths = array_merge($assetPaths, getAssetPaths($fullPath));
            }
        }
    }

    return $assetPaths;
}
?>