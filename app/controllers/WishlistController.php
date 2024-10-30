<?php
require_once '../../app/models/Wishlist.php';

class WishlistController {
   private $wishlist;

   public function __construct($db) {
       $this->wishlist = new Wishlist($db);
   }

   public function addToWishlist($customerId, $productId) {
       return $this->wishlist->addToWishlist($customerId, $productId);
   }

   public function getWishlistItems($customerId) {
       return $this->wishlist->getUserWishlist($customerId);
   }
}
?>
