<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <link rel="stylesheet" href="public/css/products.css">
</head>
<body>
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

        <!-- Product Display -->
        <div class="products-grid">
            <?php if($result && $result->rowCount() > 0): ?>
                <?php while($product = $result->fetch(PDO::FETCH_ASSOC)): ?>
                    <div class="product-card">
                        <img src="<?php echo htmlspecialchars($product['product_image']); ?>" 
                             alt="<?php echo htmlspecialchars($product['product_name']); ?>">
                        <h2><?php echo htmlspecialchars($product['product_name']); ?></h2>
                        <p class="price"><?php echo number_format($product['product_price'], 2); ?> JD</p>
                        <p class="stock">Available: <?php echo $product['product_quantity']; ?> pieces</p>
                        <?php if(isset($product['avg_rating'])): ?>
                            <p class="rating">
                                Rating: <?php echo number_format($product['avg_rating'], 1); ?>/5
                                (<?php echo $product['review_count']; ?> reviews)
                            </p>
                        <?php endif; ?>
                        <a href="index.php?action=viewProduct&id=<?php echo $product['product_id']; ?>" class="btn">View
                                Details</a>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="no-results">No products available</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
