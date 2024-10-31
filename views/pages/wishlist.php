<?php require '../../views/partials/header.php'; ?>

<main class="container m-4">
    <h1>Wishlist</h1>

    <!-- Display wishlist products -->
    <div class="row">
        <?php if (!empty($wishlistItems)) : ?>
            <?php foreach ($wishlistItems as $item) : ?>
                <div class="col-4">
                    <div class="card mb-4">
                        <!-- Display product image if available -->
                        <?php if (!empty($item['product_image'])) : ?>
                            <img src="<?php echo htmlspecialchars($item['product_image']); ?>" class="card-img-top" alt="Product Image">
                        <?php endif; ?>
                        
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($item['title']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($item['description']); ?></p>
                            <p class="card-text">Price: $<?php echo htmlspecialchars($item['price']); ?></p>
                            <p class="card-text">Quantity Available: <?php echo htmlspecialchars($item['product_quantity']); ?></p>
                            <p class="card-text">Discount: <?php echo htmlspecialchars($item['product_discount']); ?>%</p>
                            <p class="card-text">Category ID: <?php echo htmlspecialchars($item['category_id']); ?></p>
                            <p class="card-text">Total Reviews: <?php echo htmlspecialchars($item['total_review']); ?></p>
                            <p class="card-text"><small class="text-muted">Added on: <?php echo htmlspecialchars($item['created_at']); ?></small></p>

                            <!-- Add a button to remove from wishlist -->
                            <form action="/wishlist/delete" method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>Your wishlist is empty.</p>
        <?php endif; ?>
    </div>
</main>

<?php require '../../views/partials/footer.php'; ?>
