<?php
include('connection.php');
session_start();
?>
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

    <title>cakaty</title>

    <!--====== Google Font ======-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">

    <!--====== Vendor Css ======-->
    <link rel="stylesheet" href="css/vendor.css">

    <!--====== Utility-Spacing ======-->
    <link rel="stylesheet" href="css/utility.css">

    <!--====== App ======-->
    <link rel="stylesheet" href="css/app.css">

    <link rel="stylesheet" href="css/index.css">

</head>

<body class="config">
    <div class="preloader is-active">
        <div class="preloader__wrap">

            <img class="preloader__img" src="images/preloader.png" alt="">
        </div>
    </div>

    <!--====== Main App ======-->
    <div id="app">

        <!--====== Main Header ======-->
        <?php include 'navbar.php'; ?>
        <!--====== End - Main Header ======-->


        <!--====== App Content ======-->
        <div class="app-content">

            <!--====== Bootstrap Styled Hero Slider with Images ======-->
            <div id="hero-section">
                <img id="hero-img" src="./images/products/hero1.jpg" alt="Test Image" style="width:100%">
                <div class="hero-content">
                <h1 id="hero-text">Delicious Cakes Made with Love!</h1>
                    <button class="cta-button">Order Now</button>
                </div>
            </div>

        <!--====== End - Primary Slider ======-->


        <!--====== Cake Collection Section ======-->
<div class="u-s-p-y-60">



 <!--====== Section 4 ======-->
 <?php
// Database connection (PDO)
$dsn = 'mysql:host=localhost;dbname=cake_project';
$username = 'root'; // Update as needed
$password = ''; // Update as needed
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);

    // Fetch the last 4 products with category names (JOIN with categories)
    $stmt = $pdo->prepare("
        SELECT p.product_ID, p.product_name, p.product_price, p.product_image, p.total_review, c.category_name, c.category_ID 
        FROM products p
        INNER JOIN categories c ON p.category_ID = c.category_ID
        ORDER BY p.product_ID DESC
        LIMIT 4
    ");
    $stmt->execute();
    $products = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<div class="u-s-p-b-60">
    <!--====== Section Intro ======-->
    <div class="section__intro u-s-m-b-46">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section__text-wrap">
                        <h1 class="section__heading u-c-secondary u-s-m-b-12">NEW ARRIVALS</h1>
                        <span class="section__span u-c-silver">DISCOVER OUR LATEST PRODUCTS</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Intro ======-->

    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="container">
            <div class="slider-fouc">
                <div class="owl-carousel product-slider" data-item="4">
                    <?php foreach ($products as $product): ?>
                        <div class="u-s-m-b-30">
                            <div class="product-o product-o--hover-on">
                                <div class="product-o__wrap">
                                    <a class="aspect aspect--bg-grey aspect--square u-d-block"
                                       href="product-detail.php?id=<?= $product['product_ID']; ?>">
                                        <img class="aspect__img" src="images/product/<?= $product['product_image']; ?>"
                                             alt="<?= htmlspecialchars($product['product_name']); ?>">
                                    </a>
                                    <div class="product-o__action-wrap">
                                        <ul class="product-o__action-list">
                                            <li><a data-modal="modal" data-modal-id="#add-to-cart" title="Add to Cart"><i class="fas fa-plus-circle"></i></a></li>
                                            <li><a href="signin.php" title="Add to Wishlist"><i class="fas fa-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="product-o__category"><a href="category.php?id=<?= $product['category_ID']; ?>"><?= htmlspecialchars($product['category_name']); ?></a></span>
                                <span class="product-o__name"><a href="product-detail.php?id=<?= $product['product_ID']; ?>"><?= htmlspecialchars($product['product_name']); ?></a></span>
                                
                                <!-- Product Rating -->
                                <div class="product-o__rating gl-rating-style">
                                    <?php
                                    $rating = $product['total_review'];
                                    $fullStars = floor($rating);
                                    $halfStar = ($rating - $fullStars) >= 0.5 ? true : false;
                                    for ($i = 0; $i < 5; $i++) {
                                        if ($i < $fullStars) {
                                            echo '<i class="fas fa-star"></i>';
                                        } elseif ($halfStar && $i == $fullStars) {
                                            echo '<i class="fas fa-star-half-alt"></i>';
                                        } else {
                                            echo '<i class="far fa-star"></i>';
                                        }
                                    }
                                    ?>
                                    <span class="product-o__review">(<?= number_format($rating, 1); ?>)</span>
                                </div>

                                <span class="product-o__price">$<?= number_format($product['product_price'], 2); ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Content ======-->
</div>


<?php
// add-to-cart.php
include 'connection.php';

if (isset($_GET['id'])) {
    $productID = $_GET['id'];
    
    // Increment add to cart clicks
    $query = $conn->prepare("UPDATE products SET add_to_cart_clicks = add_to_cart_clicks + 1 WHERE product_ID = :productID");
    $query->bindParam(':productID', $productID);
    $query->execute();
    
    // Redirect to cart or show success message
    header("Location: cart.php");
    exit();
}
?>



<?php
include 'connection.php';

$allProductsQuery = $conn->prepare("
    SELECT p.*, c.category_name 
    FROM products p 
    JOIN categories c ON p.category_ID = c.category_ID
");
$allProductsQuery->execute();
$allProducts = $allProductsQuery->fetchAll(PDO::FETCH_ASSOC);
// var_dump($allProducts);


$topSellerQuery = $conn->prepare("
    SELECT p.*, c.category_name 
    FROM products p 
    JOIN categories c ON p.category_ID = c.category_ID 
    ORDER BY p.add_to_cart_clicks DESC 
    LIMIT 4
");
$topSellerQuery->execute();
$topSellers = $topSellerQuery->fetchAll(PDO::FETCH_ASSOC);


$ourCakeQuery = $conn->prepare("
    SELECT p.*, c.category_name 
    FROM products p 
    JOIN categories c ON p.category_ID = c.category_ID 
    WHERE c.category_name = 'Cakes'
");
$ourCakeQuery->execute();
$ourCake = $ourCakeQuery->fetchAll(PDO::FETCH_ASSOC);

$sugarFreeQuery = $conn->prepare("
    SELECT p.*, c.category_name 
    FROM products p 
    JOIN categories c ON p.category_ID = c.category_ID 
    WHERE c.category_name = 'sugar free'
");
$sugarFreeQuery->execute();
$sugarFree = $sugarFreeQuery->fetchAll(PDO::FETCH_ASSOC);

$glutenFreeQuery = $conn->prepare("
SELECT p.*, c.category_name 
FROM products p 
JOIN categories c ON p.category_ID = c.category_ID 
WHERE c.category_name = 'gluten free'
");
$glutenFreeQuery->execute();
$glutenFree = $glutenFreeQuery->fetchAll(PDO::FETCH_ASSOC);

// Query "Special Occasions" products
$specialOccasionsQuery = $conn->prepare("
    SELECT p.*, c.category_name 
    FROM products p 
    JOIN categories c ON p.category_ID = c.category_ID 
    WHERE c.category_name = 'special occasions'
");
$specialOccasionsQuery->execute();
$specialOccasions = $specialOccasionsQuery->fetchAll(PDO::FETCH_ASSOC);
?>

<!--====== Section 2 ======-->
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
                            <button class="btn filter__btn filter__btn--style-1 js-checked" type="button" data-filter=".all">ALL</button>
                        </div>
                        <div class="filter__category-wrapper">
                            <button class="btn filter__btn filter__btn--style-1" type="button" data-filter=".top-seller">TOP SELLERS</button>
                        </div>
                        <div class="filter__category-wrapper">
                            <button class="btn filter__btn filter__btn--style-1" type="button" data-filter=".our-cake">OUR CAKE</button>
                        </div>
                        <div class="filter__category-wrapper">
                            <button class="btn filter__btn filter__btn--style-1" type="button" data-filter=".sugar-free">SUGAR FREE</button>
                        </div>
                        <div class="filter__category-wrapper">
                            <button class="btn filter__btn filter__btn--style-1" type="button" data-filter=".gluten-free">GLUTEN FREE</button>
                        </div>
                        <div class="filter__category-wrapper">
                            <button class="btn filter__btn filter__btn--style-1" type="button" data-filter=".special-occasions">SPECIAL OCCASIONS</button>
                        </div>
                    </div>

                    <div class="filter__grid-wrapper u-s-m-t-30">
                        <div class="row">
                            <!-- Display All Products -->
                            <?php foreach ($allProducts as $product): ?>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item all">
                                <div class="product-o product-o--hover-on product-o--radius">
                                    <div class="product-o__wrap">
                                        <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.php?id=<?= $product['product_ID'] ?>">
                                            <img class="aspect__img" src="<?= $product['product_image'] ?>" alt="<?= $product['product_name'] ?>">
                                        </a>
                                        <div class="product-o__action-wrap">
                                            <ul class="product-o__action-list">
                                                <li><a href="add-to-cart.php?id=<?= $product['product_ID'] ?>" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <span class="product-o__category"><a href="shop-side-version-2.php?category=<?= $product['category_ID'] ?>"><?= $product['category_name'] ?></a></span>
                                    <span class="product-o__name"><a href="product-detail.php?id=<?= $product['product_ID'] ?>"><?= $product['product_name'] ?></a></span>
                                    <span class="product-o__price">$<?= $product['product_price'] ?></span>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <!-- Display Top Seller Products -->
                            <?php foreach ($topSellers as $product): ?>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item top-seller">
                                <div class="product-o product-o--hover-on product-o--radius">
                                    <div class="product-o__wrap">
                                        <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.php?id=<?= $product['product_ID'] ?>">
                                            <img class="aspect__img" src="<?= $product['product_image'] ?>" alt="<?= $product['product_name'] ?>">
                                        </a>
                                        <div class="product-o__action-wrap">
                                            <ul class="product-o__action-list">
                                                <li><a href="add-to-cart.php?id=<?= $product['product_ID'] ?>" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <span class="product-o__category"><a href="shop-side-version-2.php?category=<?= $product['category_ID'] ?>"><?= $product['category_name'] ?></a></span>
                                    <span class="product-o__name"><a href="product-detail.php?id=<?= $product['product_ID'] ?>"><?= $product['product_name'] ?></a></span>
                                    <span class="product-o__price">$<?= $product['product_price'] ?></span>
                                </div>
                            </div>
                            <?php endforeach; ?>

                            <!-- Similarly, display other categories -->
                            <!-- OUR CAKE -->
                            <?php foreach ($ourCake as $product): ?>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item our-cake">
                            <div class="product-o product-o--hover-on product-o--radius">
                                    <div class="product-o__wrap">
                                        <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.php?id=<?= $product['product_ID'] ?>">
                                            <img class="aspect__img" src="<?= $product['product_image'] ?>" alt="<?= $product['product_name'] ?>">
                                        </a>
                                        <div class="product-o__action-wrap">
                                            <ul class="product-o__action-list">
                                                <li><a href="add-to-cart.php?id=<?= $product['product_ID'] ?>" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <span class="product-o__category"><a href="shop-side-version-2.php?category=<?= $product['category_ID'] ?>"><?= $product['category_name'] ?></a></span>
                                    <span class="product-o__name"><a href="product-detail.php?id=<?= $product['product_ID'] ?>"><?= $product['product_name'] ?></a></span>
                                    <span class="product-o__price">$<?= $product['product_price'] ?></span>
                                </div>                            </div>
                            <?php endforeach; ?>

                            <!-- SUGAR FREE -->
                            <?php foreach ($sugarFree as $product): ?>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item sugar-free">
                            <div class="product-o product-o--hover-on product-o--radius">
                                    <div class="product-o__wrap">
                                        <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.php?id=<?= $product['product_ID'] ?>">
                                            <img class="aspect__img" src="<?= $product['product_image'] ?>" alt="<?= $product['product_name'] ?>">
                                        </a>
                                        <div class="product-o__action-wrap">
                                            <ul class="product-o__action-list">
                                                <li><a href="add-to-cart.php?id=<?= $product['product_ID'] ?>" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <span class="product-o__category"><a href="shop-side-version-2.php?category=<?= $product['category_ID'] ?>"><?= $product['category_name'] ?></a></span>
                                    <span class="product-o__name"><a href="product-detail.php?id=<?= $product['product_ID'] ?>"><?= $product['product_name'] ?></a></span>
                                    <span class="product-o__price">$<?= $product['product_price'] ?></span>
                                </div>                            </div>
                            <?php endforeach; ?>

                            <!-- GLUTEN FREE -->
                            <?php foreach ($glutenFree as $product): ?>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item gluten-free">
                            <div class="product-o product-o--hover-on product-o--radius">
                                    <div class="product-o__wrap">
                                        <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.php?id=<?= $product['product_ID'] ?>">
                                            <img class="aspect__img" src="<?= $product['product_image'] ?>" alt="<?= $product['product_name'] ?>">
                                        </a>
                                        <div class="product-o__action-wrap">
                                            <ul class="product-o__action-list">
                                                <li><a href="add-to-cart.php?id=<?= $product['product_ID'] ?>" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <span class="product-o__category"><a href="shop-side-version-2.php?category=<?= $product['category_ID'] ?>"><?= $product['category_name'] ?></a></span>
                                    <span class="product-o__name"><a href="product-detail.php?id=<?= $product['product_ID'] ?>"><?= $product['product_name'] ?></a></span>
                                    <span class="product-o__price">$<?= $product['product_price'] ?></span>
                                </div>                            </div>
                            <?php endforeach; ?>

                            <!-- SPECIAL OCCASIONS -->
                            <?php foreach ($specialOccasions as $product): ?>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item special-occasions">
                            <div class="product-o product-o--hover-on product-o--radius">
                                    <div class="product-o__wrap">
                                        <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.php?id=<?= $product['product_ID'] ?>">
                                            <img class="aspect__img" src="<?= $product['product_image'] ?>" alt="<?= $product['product_name'] ?>">
                                        </a>
                                        <div class="product-o__action-wrap">
                                            <ul class="product-o__action-list">
                                                <li><a href="add-to-cart.php?id=<?= $product['product_ID'] ?>" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <span class="product-o__category"><a href="shop-side-version-2.php?category=<?= $product['category_ID'] ?>"><?= $product['category_name'] ?></a></span>
                                    <span class="product-o__name"><a href="product-detail.php?id=<?= $product['product_ID'] ?>"><?= $product['product_name'] ?></a></span>
                                    <span class="product-o__price">$<?= $product['product_price'] ?></span>
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


        <!--====== Section 3 ======-->
        <div class="u-s-p-b-60">

            <!--====== Section Intro ======-->
            <div class="section__intro u-s-m-b-46">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section__text-wrap">
                                <h1 class="section__heading u-c-secondary u-s-m-b-12">DEAL OF THE DAY</h1>

                                <span class="section__span u-c-silver">BUY DEAL OF THE DAY, HURRY UP! THESE NEW PRODUCTS
                                    WILL EXPIRE SOON.</span>

                                <span class="section__span u-c-silver">ADD THESE ON YOUR CART.</span>
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
                        <div class="col-lg-6 col-md-6 u-s-m-b-30">
                            <div class="product-o product-o--radius product-o--hover-off u-h-100">
                                <div class="product-o__wrap">

                                    <a class="aspect aspect--bg-grey aspect--square u-d-block"
                                        href="product-detail.html">

                                        <img class="aspect__img" src="images/product/electronic/product11.jpg"
                                            alt=""></a>
                                    <div class="product-o__special-count-wrap">
                                        <div class="countdown countdown--style-special" data-countdown="2020/05/01">
                                        </div>
                                    </div>
                                    <div class="product-o__action-wrap">
                                        <ul class="product-o__action-list">
                                            <li>

                                                <a data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip"
                                                    data-placement="top" title="Quick View"><i
                                                        class="fas fa-search-plus"></i></a>
                                            </li>
                                            <li>

                                                <a data-modal="modal" data-modal-id="#add-to-cart"
                                                    data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i
                                                        class="fas fa-plus-circle"></i></a>
                                            </li>
                                            <li>

                                                <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                    title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                            </li>
                                            <li>

                                                <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                    title="Email me When the price drops"><i
                                                        class="fas fa-envelope"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <span class="product-o__category">

                                    <a href="shop-side-version-2.html">Electronics</a></span>

                                <span class="product-o__name">

                                    <a href="product-detail.html">DJI Phantom Drone 4k</a></span>
                                <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i
                                        class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                        class="fas fa-star"></i>

                                    <span class="product-o__review">(2)</span>
                                </div>

                                <span class="product-o__price">$125.00

                                    <span class="product-o__discount">$160.00</span></span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 u-s-m-b-30">
                            <div class="product-o product-o--radius product-o--hover-off u-h-100">
                                <div class="product-o__wrap">

                                    <a class="aspect aspect--bg-grey aspect--square u-d-block"
                                        href="product-detail.html">

                                        <img class="aspect__img" src="images/product/electronic/product12.jpg"
                                            alt=""></a>
                                    <div class="product-o__special-count-wrap">
                                        <div class="countdown countdown--style-special" data-countdown="2020/05/01">
                                        </div>
                                    </div>
                                    <div class="product-o__action-wrap">
                                        <ul class="product-o__action-list">
                                            <li>

                                                <a data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip"
                                                    data-placement="top" title="Quick View"><i
                                                        class="fas fa-search-plus"></i></a>
                                            </li>
                                            <li>

                                                <a data-modal="modal" data-modal-id="#add-to-cart"
                                                    data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i
                                                        class="fas fa-plus-circle"></i></a>
                                            </li>
                                            <li>

                                                <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                    title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                            </li>
                                            <li>

                                                <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                    title="Email me When the price drops"><i
                                                        class="fas fa-envelope"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <span class="product-o__category">

                                    <a href="shop-side-version-2.html">Electronics</a></span>

                                <span class="product-o__name">

                                    <a href="product-detail.html">DJI Phantom Drone 2k</a></span>
                                <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i
                                        class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                        class="fas fa-star"></i>

                                    <span class="product-o__review">(2)</span>
                                </div>

                                <span class="product-o__price">$125.00

                                    <span class="product-o__discount">$160.00</span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 3 ======-->


       
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
                            <div class="testimonial">
                                <div class="testimonial__img-wrap">

                                    <img class="testimonial__img" src="images/about/test-1.jpg" alt="">
                                </div>
                                <div class="testimonial__content-wrap">

                                    <span class="testimonial__double-quote"><i class="fas fa-quote-right"></i></span>
                                    <blockquote class="testimonial__block-quote">
                                        <p>"Far far away, behind the word mountains, far from the countries Vokalia and
                                            Consonantia, there live the blind texts. Separated they live in
                                            Bookmarksgrove right at the coast of the Semantics, a large language ocean."
                                        </p>
                                    </blockquote>

                                    <span class="testimonial__author">John D. / DVNTR Inc.</span>
                                </div>
                            </div>
                            <div class="testimonial">
                                <div class="testimonial__img-wrap">

                                    <img class="testimonial__img" src="images/about/test-2.jpg" alt="">
                                </div>
                                <div class="testimonial__content-wrap">

                                    <span class="testimonial__double-quote"><i class="fas fa-quote-right"></i></span>
                                    <blockquote class="testimonial__block-quote">
                                        <p>"Far far away, behind the word mountains, far from the countries Vokalia and
                                            Consonantia, there live the blind texts. Separated they live in
                                            Bookmarksgrove right at the coast of the Semantics, a large language ocean."
                                        </p>
                                    </blockquote>

                                    <span class="testimonial__author">John D. / DVNTR Inc.</span>
                                </div>
                            </div>
                            <div class="testimonial">
                                <div class="testimonial__img-wrap">

                                    <img class="testimonial__img" src="images/about/test-3.jpg" alt="">
                                </div>
                                <div class="testimonial__content-wrap">

                                    <span class="testimonial__double-quote"><i class="fas fa-quote-right"></i></span>
                                    <blockquote class="testimonial__block-quote">
                                        <p>"Far far away, behind the word mountains, far from the countries Vokalia and
                                            Consonantia, there live the blind texts. Separated they live in
                                            Bookmarksgrove right at the coast of the Semantics, a large language ocean."
                                        </p>
                                    </blockquote>

                                    <span class="testimonial__author">John D. / DVNTR Inc.</span>
                                </div>
                            </div>
                            <div class="testimonial">
                                <div class="testimonial__img-wrap">

                                    <img class="testimonial__img" src="images/about/test-4.jpg" alt="">
                                </div>
                                <div class="testimonial__content-wrap">

                                    <span class="testimonial__double-quote"><i class="fas fa-quote-right"></i></span>
                                    <blockquote class="testimonial__block-quote">
                                        <p>"Far far away, behind the word mountains, far from the countries Vokalia and
                                            Consonantia, there live the blind texts. Separated they live in
                                            Bookmarksgrove right at the coast of the Semantics, a large language ocean."
                                        </p>
                                    </blockquote>

                                    <span class="testimonial__author">John D. / DVNTR Inc.</span>
                                </div>
                            </div>
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
    <footer>
        <?php include 'footer.php' ?>
    </footer>

    <!--====== Modal Section ======-->


    <!--====== Quick Look Modal ======-->
    <div class="modal fade" id="quick-look">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal--shadow">

                <button class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-5">

                            <!--====== Product Breadcrumb ======-->
                            <div class="pd-breadcrumb u-s-m-b-30">
                                <ul class="pd-breadcrumb__list">
                                    <li class="has-separator">

                                        <a href="index.hml">Home</a>
                                    </li>
                                    <li class="has-separator">

                                        <a href="shop-side-version-2.html">Electronics</a>
                                    </li>
                                    <li class="has-separator">

                                        <a href="shop-side-version-2.html">DSLR Cameras</a>
                                    </li>
                                    <li class="is-marked">

                                        <a href="shop-side-version-2.html">Nikon Cameras</a>
                                    </li>
                                </ul>
                            </div>
                            <!--====== End - Product Breadcrumb ======-->


                            <!--====== Product Detail ======-->
                            <div class="pd u-s-m-b-30">
                                <div class="pd-wrap">
                                    <div id="js-product-detail-modal">
                                        <div>

                                            <img class="u-img-fluid" src="images/product/product-d-1.jpg" alt="">
                                        </div>
                                        <div>

                                            <img class="u-img-fluid" src="images/product/product-d-2.jpg" alt="">
                                        </div>
                                        <div>

                                            <img class="u-img-fluid" src="images/product/product-d-3.jpg" alt="">
                                        </div>
                                        <div>

                                            <img class="u-img-fluid" src="images/product/product-d-4.jpg" alt="">
                                        </div>
                                        <div>

                                            <img class="u-img-fluid" src="images/product/product-d-5.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="u-s-m-t-15">
                                    <div id="js-product-detail-modal-thumbnail">
                                        <div>

                                            <img class="u-img-fluid" src="images/product/product-d-1.jpg" alt="">
                                        </div>
                                        <div>

                                            <img class="u-img-fluid" src="images/product/product-d-2.jpg" alt="">
                                        </div>
                                        <div>

                                            <img class="u-img-fluid" src="images/product/product-d-3.jpg" alt="">
                                        </div>
                                        <div>

                                            <img class="u-img-fluid" src="images/product/product-d-4.jpg" alt="">
                                        </div>
                                        <div>

                                            <img class="u-img-fluid" src="images/product/product-d-5.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--====== End - Product Detail ======-->
                        </div>
                        <div class="col-lg-7">

                            <!--====== Product Right Side Details ======-->
                            <div class="pd-detail">
                                <div>

                                    <span class="pd-detail__name">Nikon Camera 4k Lens Zoom Pro</span>
                                </div>
                                <div>
                                    <div class="pd-detail__inline">

                                        <span class="pd-detail__price">$6.99</span>

                                        <span class="pd-detail__discount">(76% OFF)</span><del
                                            class="pd-detail__del">$28.97</del>
                                    </div>
                                </div>
                                <div class="u-s-m-b-15">
                                    <div class="pd-detail__rating gl-rating-style"><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>

                                        <span class="pd-detail__review u-s-m-l-4">

                                            <a href="product-detail.html">23 Reviews</a></span>
                                    </div>
                                </div>
                                <div class="u-s-m-b-15">
                                    <div class="pd-detail__inline">

                                        <span class="pd-detail__stock">200 in stock</span>

                                        <span class="pd-detail__left">Only 2 left</span>
                                    </div>
                                </div>
                                <div class="u-s-m-b-15">

                                    <span class="pd-detail__preview-desc">Lorem Ipsum is simply dummy text of the
                                        printing and typesetting industry. Lorem Ipsum has been the industry's standard
                                        dummy text ever since the 1500s, when an unknown printer took a galley of type
                                        and scrambled it to make a type specimen book.</span>
                                </div>
                                <div class="u-s-m-b-15">
                                    <div class="pd-detail__inline">

                                        <span class="pd-detail__click-wrap"><i class="far fa-heart u-s-m-r-6"></i>

                                            <a href="signin.html">Add to Wishlist</a>

                                            <span class="pd-detail__click-count">(222)</span></span>
                                    </div>
                                </div>
                                <div class="u-s-m-b-15">
                                    <div class="pd-detail__inline">

                                        <span class="pd-detail__click-wrap"><i class="far fa-envelope u-s-m-r-6"></i>

                                            <a href="signin.html">Email me When the price drops</a>

                                            <span class="pd-detail__click-count">(20)</span></span>
                                    </div>
                                </div>
                                <div class="u-s-m-b-15">
                                    <ul class="pd-social-list">
                                        <li>

                                            <a class="s-fb--color-hover" href="#"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>

                                            <a class="s-tw--color-hover" href="#"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li>

                                            <a class="s-insta--color-hover" href="#"><i
                                                    class="fab fa-instagram"></i></a>
                                        </li>
                                        <li>

                                            <a class="s-wa--color-hover" href="#"><i class="fab fa-whatsapp"></i></a>
                                        </li>
                                        <li>

                                            <a class="s-gplus--color-hover" href="#"><i
                                                    class="fab fa-google-plus-g"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="u-s-m-b-15">
                                    <form class="pd-detail__form">
                                        <div class="pd-detail-inline-2">
                                            <div class="u-s-m-b-15">

                                                <!--====== Input Counter ======-->
                                                <div class="input-counter">

                                                    <span class="input-counter__minus fas fa-minus"></span>

                                                    <input class="input-counter__text input-counter--text-primary-style"
                                                        type="text" value="1" data-min="1" data-max="1000">

                                                    <span class="input-counter__plus fas fa-plus"></span>
                                                </div>
                                                <!--====== End - Input Counter ======-->
                                            </div>
                                            <div class="u-s-m-b-15">

                                                <button class="btn btn--e-brand-b-2" type="submit">Add to Cart</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="u-s-m-b-15">

                                    <span class="pd-detail__label u-s-m-b-8">Product Policy:</span>
                                    <ul class="pd-detail__policy-list">
                                        <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                            <span>Buyer Protection.</span>
                                        </li>
                                        <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                            <span>Full Refund if you don't receive your order.</span>
                                        </li>
                                        <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                            <span>Returns accepted if product not as described.</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--====== End - Product Right Side Details ======-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Quick Look Modal ======-->


    <!--====== Add to Cart Modal ======-->
    <div class="modal fade" id="add-to-cart">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-radius modal-shadow">

                <button class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="success u-s-m-b-30">
                                <div class="success__text-wrap"><i class="fas fa-check"></i>

                                    <span>Item is added successfully!</span>
                                </div>
                                <div class="success__img-wrap">

                                    <img class="u-img-fluid" src="images/product/electronic/product1.jpg" alt="">
                                </div>
                                <div class="success__info-wrap">

                                    <span class="success__name">Beats Bomb Wireless Headphone</span>

                                    <span class="success__quantity">Quantity: 1</span>

                                    <span class="success__price">$170.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="s-option">

                                <span class="s-option__text">1 item (s) in your cart</span>
                                <div class="s-option__link-box">

                                    <a class="s-option__link btn--e-white-brand-shadow" data-dismiss="modal">CONTINUE
                                        SHOPPING</a>

                                    <a class="s-option__link btn--e-white-brand-shadow" href="cart.html">VIEW CART</a>

                                    <a class="s-option__link btn--e-brand-shadow" href="checkout.html">PROCEED TO
                                        CHECKOUT</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Add to Cart Modal ======-->



    <!--====== End - Newsletter Subscribe Modal ======-->
    <!--====== End - Modal Section ======-->
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
    <script src="https://www.google-analytics.com/analytics.js" async defer></script>

    <!--====== Vendor Js ======-->
    <script src="js/vendor.js"></script>

    <!--====== jQuery Shopnav plugin ======-->
    <script src="js/jquery.shopnav.js"></script>

    <!--====== App ======-->
    <script src="js/app.js"></script>

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
    $(document).ready(function() {
        // Automatically click the "ALL" filter button on page load
        $('.filter__btn.js-checked').trigger('click');
    });
</script>

</body>

</html>