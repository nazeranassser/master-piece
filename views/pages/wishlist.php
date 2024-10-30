<?php
require '../../config.php';
require '../../app/controllers/WishlistController.php';

$customerId = 1; // Replace this with actual customer ID from session data
$db = new Database();
$conn = $db->getConnection();
$wishlistController = new WishlistController($conn);

$wishlistItems = $wishlistController->getWishlistItems($customerId);
?>

<!DOCTYPE html>
<html>
<head>
   <title>My Wishlist</title>
   <style>
       .wishlist-item { border: 1px solid #ddd; padding: 20px; margin: 10px; }
       .wishlist-image { width: 150px; }
   </style>
</head>
<body>
   <h1>My Wishlist</h1>
   <?php if (!empty($wishlistItems)): ?>
       <?php foreach ($wishlistItems as $item): ?>
           <div class="wishlist-item">
               <img src="<?php echo htmlspecialchars($item['product_image']); ?>" alt="<?php echo htmlspecialchars($item['product_name']); ?>" class="wishlist-image">
               <h2><?php echo htmlspecialchars($item['product_name']); ?></h2>
               <p><?php echo htmlspecialchars($item['product_description']); ?></p>
               <p>Price: $<?php echo htmlspecialchars($item['product_price']); ?></p>
           </div>
       <?php endforeach; ?>
   <?php else: ?>
       <p>Your wishlist is empty.</p>
   <?php endif; ?>
</body>
</html>
