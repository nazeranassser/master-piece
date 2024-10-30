    <?php require 'views/partials/header.php'; ?>

    <div class="container"> 
        <!-- Search Filters -->
        <div class="filters">
            <form method="GET" action="index.php?action=showProducts">
                <input type="text" name="search" 
                       placeholder="Search for a product..." 
                       value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>">
                
                <select name="category">
                    <option value="">All Categories</option>
                    <?php while($category = $categories->fetch(PDO::FETCH_ASSOC)): ?>
                        <option value="<?php echo htmlspecialchars($category['category_name']); ?>"
                                <?php echo (isset($_GET['category']) && $_GET['category'] == $category['category_name']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($category['category_name']); ?>
                            (<?php echo $category['product_count']; ?>)
                        </option>
                    <?php endwhile; ?>
                </select>

                <select name="sort">
                    <option value="">Sort By</option>
                    <option value="price_asc" <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'price_asc') ? 'selected' : ''; ?>>
                        Price: Low to High
                    </option>
                    <option value="price_desc" <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'price_desc') ? 'selected' : ''; ?>>
                        Price: High to Low
                    </option>
                    <option value="rating" <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'rating') ? 'selected' : ''; ?>>
                        Rating
                    </option>
                </select>

                <button type="submit" class="btn">Apply Filters</button>
            </form>
        </div>
    
    <!-- Loop through all products -->
    <div class="u-s-p-b-60">

    <div class="section__content">
                    <div class="container">
                        <div class="product-grid">
                            <?php foreach ($allProducts as $product): ?>
                                <div class="product-card">
                                    <div class="product-image-wrap">
                                        <a href="product-detail.php?id=<?= $product['product_id']; ?>">
                                            <img src="public/images/categories/<?= $product['product_image']; ?>"
                                                alt="<?= htmlspecialchars($product['product_name']); ?>">
                                        </a>
                                    </div>
                                    <div class="product-details">
                                        <span class="product-category">
                                            <?= htmlspecialchars($product['category_name']); ?>
                                        </span>
                                        <h3 class="product-name">
                                            <a
                                                href="product-detail.php?id=<?= $product['product_id']; ?>"><?= htmlspecialchars($product['product_name']); ?></a>
                                        </h3>
                                        <div class="product-rating">
                                            <?php
                                            $rating = $product['total_review'];
                                            $fullStars = floor($rating);
                                            $halfStar = ($rating - $fullStars) >= 0.5;
                                            for ($i = 0; $i < 5; $i++) {
                                                echo $i < $fullStars ? '<i class="fas fa-star"></i>' : ($halfStar && $i == $fullStars ? '<i class="fas fa-star-half-alt"></i>' : '<i class="far fa-star"></i>');
                                            }
                                            ?>
                                            <span class="product-review">(<?= number_format($rating, 1); ?>)</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="product-price"><?= number_format($product['product_price'], 2); ?>JD
                                            </div>
                                            <div class="action-buttons d-flex">
                                                <a href="cart.php?id=<?= $product['product_id'] ?>"
                                                    class="btn btn-outline-secondary btn-sm" data-tooltip="tooltip"
                                                    data-placement="top" title="Add to Cart">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>
                                                <button class="btn btn-outline-secondary btn-sm ms-2" data-tooltip="tooltip"
                                                    data-placement="top" title="Add to Favorites">
                                                    <i class="fas fa-heart"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                </div>


    </div>

    <?php require 'views/partials/footer.php'; ?>
</body>
</html>
