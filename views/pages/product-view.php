<?php require 'views/partials/header.php'; ?>
    <div class="container">
        <?php if ($product): ?>
            <div class="product-detail">
                <img src="<?php echo htmlspecialchars($product['product_image']); ?>" 
                     alt="<?php echo htmlspecialchars($product['product_name']); ?>">
                <h2><?php echo htmlspecialchars($product['product_name']); ?></h2>
                <p class="price"><?php echo number_format($product['product_price'], 2); ?> JD</p>
                <p><?php echo htmlspecialchars($product['product_description']); ?></p>
                <p class="stock">Available: <?php echo $product['product_quantity']; ?> pieces</p>
                <?php if(isset($product['avg_rating'])): ?>
                    <p class="rating">
                        Rating: <?php echo number_format($product['avg_rating'], 1); ?>/5
                        (<?php echo $product['review_count']; ?> reviews)
                    </p>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <p>Product not found.</p>
        <?php endif; ?>
    </div>

    <?php require 'views/partials/footer.php'; ?>
</body>
</html>
