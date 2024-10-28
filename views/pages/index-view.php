
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="images/favicon.png" rel="shortcut icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoJgGHa0roUOFzT1iNQ36PE8G5OeMySkAzYFCAFK5L9jAc" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet" />
    <title><?php echo $user ? 'Welcome, ' . htmlspecialchars($user['customer_name']) : 'Welcome to Our Website'; ?>
    </title>

    <title>Revoly Cake</title>

    <!--====== Google Font ======-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">

    <!--====== Vendor Css ======-->
    <link rel="stylesheet" href="public/css/vendor.css">

    <!--====== Utility-Spacing ======-->
    <link rel="stylesheet" href="public/css/utility.css">

    <!--====== App ======-->
    <link rel="stylesheet" href="public/css/app.css">

    <link rel="stylesheet" href="public/css/index.css">

    <link rel="stylesheet" href="public/css/style.css">

</head>

<body class="config">
    <div class="preloader is-active">
        <div class="preloader__wrap">

            <img class="preloader__img" src="../images/preloader.png" alt="">
        </div>
    </div>

    <!--====== Main App ======-->
    <div id="app">

        <!--====== Main Header ======-->
           <?php 
           include_once 'header.php';
           ?>
        <!--====== End - Main Header ======-->


        <!--====== App Content ======-->
        <div class="app-content">

            <!--====== start - hero section ======-->
            <div id="hero-section">
                <img id="hero-img" src="public/images/products/herooooo.jpg" alt="Test Image" style="width:100%">
                <div class="hero-content">
                    <h1 id="hero-text">Delicious Cakes Made<br><span id="hero-text2"> with Love! </span></h1>
                    <button class="cta-button">Order Now</button>
                </div>
            </div>

            <!--====== End - hero section ======-->






            <!--====== start - new arrivals ======-->
            <div class="u-s-p-b-60">
                <div class="section__intro u-s-m-b-46">
                    <div class="container d-flex flex-column align-items-center">
                        <h1 class="section__heading u-c-secondary u-s-m-b-12">NEW ARRIVALS</h1>
                        <span class="section__span u-c-silver text-center">DISCOVER OUR LATEST PRODUCTS</span>
                    </div>
                </div>

                <div class="section__content">
                    <div class="container">
                        <div class="product-grid">
                            <?php foreach ($products as $product): ?>
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
            <!--====== End - new arrivals ======-->


            <!--====== start - our products ======-->

            <div class="u-s-p-b-60">
                <!--====== Section Intro ======-->
                <div class="section__intro u-s-m-b-16">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section__text-wrap">
                                    <h1 class="section__heading u-c-secondary u-s-m-b-12">OUR PRODUCTS</h1>
                                    <span class="section__span u-c-silver">CHOOSE CATEGORY</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Section Intro ======-->

                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="filter-category-container">
                                    <div class="filter__category-wrapper">
                                        <button class="btn filter__btn filter__btn--style-1 js-checked" type="button"
                                            data-filter=".all">ALL</button>
                                    </div>
                                    <div class="filter__category-wrapper">
                                        <button class="btn filter__btn filter__btn--style-1" type="button"
                                            data-filter=".top-seller">TOP SELLERS</button>
                                    </div>
                                    <div class="filter__category-wrapper">
                                        <button class="btn filter__btn filter__btn--style-1" type="button"
                                            data-filter=".our-cake">OUR CAKE</button>
                                    </div>
                                    <div class="filter__category-wrapper">
                                        <button class="btn filter__btn filter__btn--style-1" type="button"
                                            data-filter=".sugar-free">SUGAR FREE</button>
                                    </div>
                                    <div class="filter__category-wrapper">
                                        <button class="btn filter__btn filter__btn--style-1" type="button"
                                            data-filter=".gluten-free">GLUTEN FREE</button>
                                    </div>
                                    <div class="filter__category-wrapper">
                                        <button class="btn filter__btn filter__btn--style-1" type="button"
                                            data-filter=".special-occasions">SPECIAL OCCASIONS</button>
                                    </div>
                                </div>

                                <div class="filter__grid-wrapper u-s-m-t-30">
                                    <div class="row">
                                        <!-- Display All Products -->
                                        <?php foreach ($allProducts as $product): ?>
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item all">
                                                <div class="product-o product-o--hover-on product-o--radius">
                                                    <div class="product-o__wrap">
                                                        <a class="aspect aspect--bg-grey aspect--square u-d-block"
                                                            href="product-detail.php?id=<?= $product['product_id'] ?>">
                                                            <img class="aspect__img"
                                                                src="public/images/products/<?= $product['product_image'] ?>"
                                                                alt="<?= htmlspecialchars($product['product_name']) ?>">
                                                        </a>
                                                    </div>

                                                    <!-- Category -->
                                                    <span class="product-o__category">
                                                        <?= htmlspecialchars($product['category_name']) ?>
                                                    </span>

                                                    <!-- Product Name -->
                                                    <span class="product-o__name">
                                                        <a
                                                            href="product-detail.php?id=<?= $product['product_id'] ?>"><?= htmlspecialchars($product['product_name']) ?></a>
                                                    </span>

                                                    <!-- Rating -->
                                                    <div class="product-o__rating">
                                                        <?php
                                                        $rating = $product['total_review'];
                                                        $fullStars = floor($rating);
                                                        $halfStar = ($rating - $fullStars) >= 0.5;
                                                        for ($i = 0; $i < 5; $i++) {
                                                            echo $i < $fullStars ? '<i class="fas fa-star"></i>' : ($halfStar && $i == $fullStars ? '<i class="fas fa-star-half-alt"></i>' : '<i class="far fa-star"></i>');
                                                        }
                                                        ?>
                                                        <span
                                                            class="product-review">(<?= number_format($rating, 1); ?>)</span>
                                                    </div>

                                                    <!-- Price and Action Buttons -->
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <span
                                                            class="product-o__price"><?= number_format($product['product_price'], 2); ?>
                                                            JD</span>

                                                        <!-- Cart and Favorite Icons -->
                                                        <div class="action-buttons d-flex">
                                                            <a href="cart.php?id=<?= $product['product_id'] ?>"
                                                                class="btn btn-outline-secondary btn-sm"
                                                                data-tooltip="tooltip" data-placement="top"
                                                                title="Add to Cart">
                                                                <i class="fas fa-shopping-cart"></i>
                                                            </a>
                                                            <button class="btn btn-outline-secondary btn-sm ms-2"
                                                                data-tooltip="tooltip" data-placement="top"
                                                                title="Add to Favorites">
                                                                <i class="fas fa-heart"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>

                                        <!-- Display Top Seller Products -->
                                        <?php foreach ($topSellers as $product): ?>
                                            <div
                                                class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item top-seller">
                                                <div class="product-o product-o--hover-on product-o--radius">
                                                    <div class="product-o__wrap">
                                                        <a class="aspect aspect--bg-grey aspect--square u-d-block"
                                                            href="product-detail.php?id=<?= $product['product_id'] ?>">
                                                            <img class="aspect__img"
                                                                src="public/images/products/<?= $product['product_image'] ?>"
                                                                alt="<?= htmlspecialchars($product['product_name']) ?>">
                                                        </a>
                                                    </div>

                                                    <!-- Category -->
                                                    <span class="product-o__category">
                                                        <?= htmlspecialchars($product['category_name']) ?>
                                                    </span>

                                                    <!-- Product Name -->
                                                    <span class="product-o__name">
                                                        <a
                                                            href="product-detail.php?id=<?= $product['product_id'] ?>"><?= htmlspecialchars($product['product_name']) ?></a>
                                                    </span>

                                                    <!-- Rating -->
                                                    <div class="product-o__rating">
                                                        <?php
                                                        $rating = $product['total_review'];
                                                        $fullStars = floor($rating);
                                                        $halfStar = ($rating - $fullStars) >= 0.5;
                                                        for ($i = 0; $i < 5; $i++) {
                                                            echo $i < $fullStars ? '<i class="fas fa-star"></i>' : ($halfStar && $i == $fullStars ? '<i class="fas fa-star-half-alt"></i>' : '<i class="far fa-star"></i>');
                                                        }
                                                        ?>
                                                        <span
                                                            class="product-review">(<?= number_format($rating, 1); ?>)</span>
                                                    </div>

                                                    <!-- Price and Action Buttons -->
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <span
                                                            class="product-o__price"><?= number_format($product['product_price'], 2); ?>
                                                            JD</span>

                                                        <!-- Cart and Favorite Icons -->
                                                        <div class="action-buttons d-flex">
                                                            <a href="cart.php?id=<?= $product['product_id'] ?>"
                                                                class="btn btn-outline-secondary btn-sm"
                                                                data-tooltip="tooltip" data-placement="top"
                                                                title="Add to Cart">
                                                                <i class="fas fa-shopping-cart"></i>
                                                            </a>
                                                            <button class="btn btn-outline-secondary btn-sm ms-2"
                                                                data-tooltip="tooltip" data-placement="top"
                                                                title="Add to Favorites">
                                                                <i class="fas fa-heart"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>

                                        <!-- Similarly, display other categories -->
                                        <!-- OUR CAKE -->
                                        <?php foreach ($ourCake as $product): ?>
                                            <div
                                                class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item our-cake">
                                                <div class="product-o product-o--hover-on product-o--radius">
                                                    <div class="product-o__wrap">
                                                        <a class="aspect aspect--bg-grey aspect--square u-d-block"
                                                            href="product-detail.php?id=<?= $product['product_id'] ?>">
                                                            <img class="aspect__img"
                                                                src="public/images/products/<?= $product['product_image'] ?>"
                                                                alt="<?= htmlspecialchars($product['product_name']) ?>">
                                                        </a>
                                                    </div>

                                                    <!-- Category -->
                                                    <span class="product-o__category">
                                                        <?= htmlspecialchars($product['category_name']) ?>
                                                    </span>

                                                    <!-- Product Name -->
                                                    <span class="product-o__name">
                                                        <a
                                                            href="product-detail.php?id=<?= $product['product_id'] ?>"><?= htmlspecialchars($product['product_name']) ?></a>
                                                    </span>

                                                    <!-- Rating -->
                                                    <div class="product-o__rating">
                                                        <?php
                                                        $rating = $product['total_review'];
                                                        $fullStars = floor($rating);
                                                        $halfStar = ($rating - $fullStars) >= 0.5;
                                                        for ($i = 0; $i < 5; $i++) {
                                                            echo $i < $fullStars ? '<i class="fas fa-star"></i>' : ($halfStar && $i == $fullStars ? '<i class="fas fa-star-half-alt"></i>' : '<i class="far fa-star"></i>');
                                                        }
                                                        ?>
                                                        <span
                                                            class="product-review">(<?= number_format($rating, 1); ?>)</span>
                                                    </div>

                                                    <!-- Price and Action Buttons -->
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <span
                                                            class="product-o__price"><?= number_format($product['product_price'], 2); ?>
                                                            JD</span>

                                                        <!-- Cart and Favorite Icons -->
                                                        <div class="action-buttons d-flex">
                                                            <a href="/cart/<?php echo $product['product_id']; ?>"
                                                                class="btn btn-outline-secondary btn-sm"
                                                                data-tooltip="tooltip" data-placement="top"
                                                                title="Add to Cart">
                                                                <i class="fas fa-shopping-cart"></i>
                                                            </a>
                                                            <button class="btn btn-outline-secondary btn-sm ms-2"
                                                                data-tooltip="tooltip" data-placement="top"
                                                                title="Add to Favorites">
                                                                <i class="fas fa-heart"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>

                                        <!-- SUGAR FREE -->
                                        <?php foreach ($sugarFree as $product): ?>
                                            <div
                                                class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item sugar-free">
                                                <div class="product-o product-o--hover-on product-o--radius">
                                                    <div class="product-o__wrap">
                                                        <a class="aspect aspect--bg-grey aspect--square u-d-block"
                                                            href="product-detail.php?id=<?= $product['product_id'] ?>">
                                                            <img class="aspect__img"
                                                                src="public/images/products/<?= $product['product_image'] ?>"
                                                                alt="<?= htmlspecialchars($product['product_name']) ?>">
                                                        </a>
                                                    </div>

                                                    <!-- Category -->
                                                    <span class="product-o__category">
                                                        <?= htmlspecialchars($product['category_name']) ?>
                                                    </span>

                                                    <!-- Product Name -->
                                                    <span class="product-o__name">
                                                        <a
                                                            href="product-detail.php?id=<?= $product['product_id'] ?>"><?= htmlspecialchars($product['product_name']) ?></a>
                                                    </span>

                                                    <!-- Rating -->
                                                    <div class="product-o__rating">
                                                        <?php
                                                        $rating = $product['total_review'];
                                                        $fullStars = floor($rating);
                                                        $halfStar = ($rating - $fullStars) >= 0.5;
                                                        for ($i = 0; $i < 5; $i++) {
                                                            echo $i < $fullStars ? '<i class="fas fa-star"></i>' : ($halfStar && $i == $fullStars ? '<i class="fas fa-star-half-alt"></i>' : '<i class="far fa-star"></i>');
                                                        }
                                                        ?>
                                                        <span
                                                            class="product-review">(<?= number_format($rating, 1); ?>)</span>
                                                    </div>

                                                    <!-- Price and Action Buttons -->
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <span
                                                            class="product-o__price"><?= number_format($product['product_price'], 2); ?>
                                                            JD</span>

                                                        <!-- Cart and Favorite Icons -->
                                                        <div class="action-buttons d-flex">
                                                            <a href="/cart/<?php echo $product['product_id']; ?>"
                                                                class="btn btn-outline-secondary btn-sm"
                                                                data-tooltip="tooltip" data-placement="top"
                                                                title="Add to Cart">
                                                                <i class="fas fa-shopping-cart"></i>
                                                            </a>
                                                            <button class="btn btn-outline-secondary btn-sm ms-2"
                                                                data-tooltip="tooltip" data-placement="top"
                                                                title="Add to Favorites">
                                                                <i class="fas fa-heart"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>

                                        <!-- GLUTEN FREE -->
                                        <?php foreach ($glutenFree as $product): ?>
                                            <div
                                                class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item gluten-free">
                                                <div class="product-o product-o--hover-on product-o--radius">
                                                    <div class="product-o__wrap">
                                                        <a class="aspect aspect--bg-grey aspect--square u-d-block"
                                                            href="product-detail.php?id=<?= $product['product_id'] ?>">
                                                            <img class="aspect__img"
                                                                src="public/images/products/<?= $product['product_image'] ?>"
                                                                alt="<?= htmlspecialchars($product['product_name']) ?>">
                                                        </a>
                                                    </div>

                                                    <!-- Category -->
                                                    <span class="product-o__category">
                                                        <?= htmlspecialchars($product['category_name']) ?>
                                                    </span>

                                                    <!-- Product Name -->
                                                    <span class="product-o__name">
                                                        <a
                                                            href="product-detail.php?id=<?= $product['product_id'] ?>"><?= htmlspecialchars($product['product_name']) ?></a>
                                                    </span>

                                                    <!-- Rating -->
                                                    <div class="product-o__rating">
                                                        <?php
                                                        $rating = $product['total_review'];
                                                        $fullStars = floor($rating);
                                                        $halfStar = ($rating - $fullStars) >= 0.5;
                                                        for ($i = 0; $i < 5; $i++) {
                                                            echo $i < $fullStars ? '<i class="fas fa-star"></i>' : ($halfStar && $i == $fullStars ? '<i class="fas fa-star-half-alt"></i>' : '<i class="far fa-star"></i>');
                                                        }
                                                        ?>
                                                        <span
                                                            class="product-review">(<?= number_format($rating, 1); ?>)</span>
                                                    </div>

                                                    <!-- Price and Action Buttons -->
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <span
                                                            class="product-o__price"><?= number_format($product['product_price'], 2); ?>
                                                            JD</span>

                                                        <!-- Cart and Favorite Icons -->
                                                        <div class="action-buttons d-flex">
                                                            <a href="/cart/<?php echo $product['product_id']; ?>"
                                                                class="btn btn-outline-secondary btn-sm"
                                                                data-tooltip="tooltip" data-placement="top"
                                                                title="Add to Cart">
                                                                <i class="fas fa-shopping-cart"></i>
                                                            </a>
                                                            <button class="btn btn-outline-secondary btn-sm ms-2"
                                                                data-tooltip="tooltip" data-placement="top"
                                                                title="Add to Favorites">
                                                                <i class="fas fa-heart"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>

                                        <!-- SPECIAL OCCASIONS -->
                                        <?php foreach ($specialOccasions as $product): ?>
                                            <div
                                                class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item special-occasions">
                                                <div class="product-o product-o--hover-on product-o--radius">
                                                    <div class="product-o__wrap">
                                                        <a class="aspect aspect--bg-grey aspect--square u-d-block"
                                                            href="product-detail.php?id=<?= $product['product_id'] ?>">
                                                            <img class="aspect__img"
                                                                src="public/images/products/<?= $product['product_image'] ?>"
                                                                alt="<?= htmlspecialchars($product['product_name']) ?>">
                                                        </a>
                                                    </div>

                                                    <!-- Category -->
                                                    <span class="product-o__category">
                                                        <?= htmlspecialchars($product['category_name']) ?>
                                                    </span>

                                                    <!-- Product Name -->
                                                    <span class="product-o__name">
                                                        <a
                                                            href="product-detail.php?id=<?= $product['product_id'] ?>"><?= htmlspecialchars($product['product_name']) ?></a>
                                                    </span>

                                                    <!-- Rating -->
                                                    <div class="product-o__rating">
                                                        <?php
                                                        $rating = $product['total_review'];
                                                        $fullStars = floor($rating);
                                                        $halfStar = ($rating - $fullStars) >= 0.5;
                                                        for ($i = 0; $i < 5; $i++) {
                                                            echo $i < $fullStars ? '<i class="fas fa-star"></i>' : ($halfStar && $i == $fullStars ? '<i class="fas fa-star-half-alt"></i>' : '<i class="far fa-star"></i>');
                                                        }
                                                        ?>
                                                        <span
                                                            class="product-review">(<?= number_format($rating, 1); ?>)</span>
                                                    </div>

                                                    <!-- Price and Action Buttons -->
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <span
                                                            class="product-o__price"><?= number_format($product['product_price'], 2); ?>
                                                            JD</span>

                                                        <!-- Cart and Favorite Icons -->
                                                        <div class="action-buttons d-flex">
                                                            <a href="/cart/<?php echo $product['product_id']; ?>"
                                                                class="btn btn-outline-secondary btn-sm"
                                                                data-tooltip="tooltip" data-placement="top"
                                                                title="Add to Cart">
                                                                <i class="fas fa-shopping-cart"></i>
                                                            </a>
                                                            <button class="btn btn-outline-secondary btn-sm ms-2"
                                                                data-tooltip="tooltip" data-placement="top"
                                                                title="Add to Favorites">
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
                </div>
            </div>

            <!-- ====== End - our products ====== -->

            <!--====== deal of the day section ======-->
            <div class="section__content">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="section__heading text-center u-c-secondary u-s-m-b-30">DEAL OF THE DAY</h1>
                            <!-- Section heading -->
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach ($dealOfTheDay as $product): ?>
                            <div class="col-lg-6 col-md-6 mb-4"> <!-- Added Bootstrap margin utility class -->
                                <div class="card border-light rounded shadow-lg h-100">
                                    <!-- Using Bootstrap card classes -->
                                    <a href="product-detail.php?id=<?= $product['product_id'] ?>"
                                        class="text-decoration-none">
                                        <img src="public/images/products/<?= $product['product_image'] ?>"
                                            alt="<?= htmlspecialchars($product['product_name']) ?>" class="card-img-top">
                                    </a>
                                    <div class="card-body text-center"> <!-- Centered text in the card body -->
                                        <div class="special-countdown mb-3">
                                            <div class="countdown countdown--style-special"
                                                data-end-time="<?= strtotime('+2 days') * 1000 ?>">
                                            </div>
                                        </div>
                                        <span
                                            class="badge bg-secondary mb-2"><?= htmlspecialchars($product['category_name']) ?></span>
                                        <h5 class="card-title"><?= htmlspecialchars($product['product_name']) ?></h5>
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
                                        <div class="product-o__price">
                                            <span
                                                class="text-danger fw-bold"><?= number_format($product['product_price'], 2) ?>
                                                JD</span>
                                            <span
                                                class="text-muted text-decoration-line-through"><?= number_format($product['discounted_price'], 2) ?>
                                                JD</span>
                                            <span class="action-buttons d-flex">
                                                <a href="cart.php?id=<?= $product['product_id'] ?>"
                                                    class="btn btn-outline-secondary btn-sm" data-tooltip="tooltip"
                                                    data-placement="top" title="Add to Cart">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>
                                                <button class="btn btn-outline-secondary btn-sm ms-2" data-tooltip="tooltip"
                                                    data-placement="top" title="Add to Favorites">
                                                    <i class="fas fa-heart"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>


            <!--====== End - deal of the day section ======-->



            <!--====== Section 11 ======-->
            <!-- views/testimonials.php -->
            <!--====== Section 11 ======-->
            <div class="u-s-p-b-90 u-s-m-b-30">

                <!--====== Section Intro ======-->
                <div class="section__intro u-s-m-b-46">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section__text-wrap">
                                    <h1 class="section__heading u-c-secondary u-s-m-b-12">CLIENTS FEEDBACK</h1>
                                    <span class="section__span u-c-silver">WHAT OUR CLIENTS SAY</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Section Intro ======-->

                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="container">

                        <!--====== Testimonial Slider ======-->
                        <div class="slider-fouc">
                            <div class="owl-carousel" id="testimonial-slider">
                                <!-- <?php foreach ($testimonials as $testimonial): ?>
                                    <div class="testimonial">
                                        <div class="testimonial__img-wrap">
                                            <img class="testimonial__img"
                                                src="images/about/test-<?= $testimonial['customer_id'] ?>.jpg" alt="">
                                        </div>
                                        <div class="testimonial__content-wrap">
                                            <span class="testimonial__double-quote"><i
                                                    class="fas fa-quote-right"></i></span>
                                            <blockquote class="testimonial__block-quote">
                                                <p><?= htmlspecialchars($testimonial['message_text']) ?></p>
                                            </blockquote>
                                            <span
                                                class="testimonial__author"><?= htmlspecialchars($testimonial['customer_name']) ?>
                                                / <?= htmlspecialchars($testimonial['message_subject']) ?></span>
                                        </div>
                                    </div>
                                <?php endforeach; ?> -->
                            </div>
                        </div>
                        <!--====== End - Testimonial Slider ======-->
                    </div>
                </div>
                <!--====== End - Section Content ======-->
            </div>

            <!--====== End - Section 11 ======-->

        </div>
        <!--====== End - App Content ======-->


        <!--====== Main Footer ======-->
        <?php 
            include_once 'footer.php';
        ?>
        <!--====== End - Main Footer ======-->
    </div>
    <!--====== End - Main App ======-->


    <!--====== Google Analytics: change UA-XXXXX-Y to be your site's ID ======-->
    <script>
        window.ga = function () {
            ga.q.push(arguments)
        };
        ga.q = [];
        ga.l = +new Date;
        ga('create', 'UA-XXXXX-Y', 'auto');
        ga('send', 'pageview')
    </script>

    <!--====== Vendor Js ======-->
    <script src="public/js/vendor.js"></script>

    <!-- ====== jQuery Shopnav plugin ====== -->
    <script src="public/js/jquery.shopnav.js"></script>

    <!--====== App ======-->
    <script src="public/js/app.js"></script>

    <!--====== Noscript ======-->
    <noscript>
        <div class="app-setting">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="app-setting__wrap">
                            <h1 class="app-setting__h1">JavaScript is disabled in your browser.</h1>

                            <span class="app-setting__text">Please enable JavaScript in your browser or upgrade to a
                                JavaScript-capable browser.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </noscript>
    <script>
        var myCarousel = document.querySelector('#heroCarousel');
        var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 3000, // Slide interval in milliseconds
            ride: 'carousel'
        });
    </script>
    <script>
        $(document).ready(function () {
            // Automatically click the "ALL" filter button on page load
            $('.filter__btn.js-checked').trigger('click');
        });
    </script>
    <script>
        // JavaScript Countdown Timer
        document.querySelectorAll('.countdown').forEach(function (countdown) {
            const endTime = parseInt(countdown.getAttribute('data-end-time'));
            function updateCountdown() {
                const now = new Date().getTime();
                const distance = endTime - now;
                if (distance < 0) {
                    countdown.innerHTML = "Expired";
                    return;
                }
                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);
                countdown.innerHTML = `${days}d ${hours}h ${minutes}m ${seconds}s`;
            }
            setInterval(updateCountdown, 1000);
        });
    </script>
</body>

</html>