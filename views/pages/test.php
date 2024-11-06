<?php require 'views/partials/header2.php'; 
$customer_id = isset($_SESSION['usersId']) ? $_SESSION['usersId'] : null;
// var_dump($_SESSION);
?>
<style>
    .star-rating {
    display: flex;
    justify-content: center;
    direction: rtl; /* Reverse order for easier selection */
    gap: 15px;
    margin: auto;
}

.star-rating input[type="radio"] {
    display: none; /* Hide the radio buttons */
}

.star-rating .star {
    font-size: 24px; /* Star size */
    color: #ccc; /* Default star color */
    cursor: pointer;
    transition: color 0.3s;
}

.star-rating input[type="radio"]:checked ~ .star {
    color: #ffcc00; /* Color for selected stars */
}

.star-rating .star:hover,
.star-rating .star:hover ~ .star {
    color: #ffcc00; /* Highlight stars on hover */
}

    .review-form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.review-form label {
    font-weight: bold;
    color: #555;
}

.review-form textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    resize: vertical; /* Allow vertical resizing */
    min-height: 100px; /* Minimum height for textarea */
}

.review-form select,
.review-form input[type="file"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}
    /* Modal styles */
    .modal {
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .modal-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        width: 90%;
        max-width: 400px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        animation: fadeIn 0.3s ease;
    }
    .modal-body {
        text-align: center;
    }
    .close {
        position: absolute;
        top: 10px;
        right: 15px;
        font-size: 24px;
        cursor: pointer;
    }
    .review-image {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 50%;
    }
    /* Animation */
    @keyframes fadeIn {
        from { opacity: 0; transform: scale(0.9); }
        to { opacity: 1; transform: scale(1); }
    }

form{
    background-color: rgba(255, 0, 0, 0.0);
    max-width: 100%;
    width: 100%;
    box-shadow:0 0px 0px rgba(0, 0, 0, 0.1);
    padding: 10px;

}
.rev-f1__review{
    width: 100%;
    max-width: 100%;

}

.photo{
    background-color:#fff;
    
}

</style>
<div class="app-content" style="background-color: #FFFAF3;">

<!--====== Section 1 ======-->
<div class="u-s-p-t-90">
    <div class="container">
        <div class="row" style="display:flex;align-items:start;background-color:#fff;">
            <div class="col-lg-5">

                <!--====== Product Breadcrumb ======-->
               
                <!--====== End - Product Breadcrumb ======-->


                <!--====== Product Detail Zoom ======-->
                <div  class="pd u-s-m-b-30">
                    <div class="slider-fouc pd-wrap">
                        <div id="pd-o-initiate" >
                            <div style="box-shadow: 1px 2px 6px 0 rgba(36, 37, 38, 0.08);padding:10;background-color:#fff;margin:10px;border-radius: 20px;" class="pd-o-img-wrap" data-src="/public/images/products/<?php echo $product['product_image']; ?>">

                                <img style="width:96%;background-color:#fff;margin:8px;border-radius: 14px;" class="u-img-fluid" src="/public/images/products/<?php echo $product['product_image']; ?>" data-zoom-image="/public/images/products/<?php echo $product['product_image']; ?>" alt=""></div>
                        </div>

                        <span class="pd-text">Click for larger zoom</span>
                    </div>
                    <div class="u-s-m-t-15">
                        <div class="slider-">
                            <div id="pd-o-thumbnail">
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Product Detail Zoom ======-->
            </div>
            <div class="col-lg-7" >

                <!--====== Product Right Side Details ======-->
                <div class="pd-detail">
                    <div>
                    <div class="pd-detail__inline">
                            <!-- -->
                        <br>
                        <span class="pd-detail__name" style="font-size:30px"><?php echo $product['product_name']; ?></span></div>
                    <div>
                        <div class="pd-detail__inline">

                            <span class="pd-detail__price"><?php echo ($product['product_price']-($product['product_price']*$product['product_discount']))." JD"; ?></span>

                            <span class="pd-detail__discount"><?php if ($product['product_discount'] > 0){ echo '('.(($product['product_discount'])* 100).'% OFF)</span><del class="pd-detail__del">'.$product["product_price"].'</del>'; }else{echo '</span>';} ?></div>
                    </div>
                    <div class="u-s-m-b-15">
                        <div class="pd-detail__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>

                            <span class="pd-detail__review u-s-m-l-4">

                                <a data-click-scroll="#view-review">23 Reviews</a></span></div>
                    </div>
                    <!-- <div class="u-s-m-b-15">
                        <div class="pd-detail__inline">

                            <span class="pd-detail__stock">200 in stock</span>

                            <span class="pd-detail__left">Only 2 left</span></div>
                    </div> -->
                    <div class="u-s-m-b-40">

                        <span class="pd-detail__preview-desc" style="font-size:20px;"><?php echo $product['product_description']; ?></span></div>
                    <div class="u-s-m-b-15">
                        <div class="pd-detail__inline">

                        <span class="ms-2"
                            data-tooltip="tooltip" data-placement="top"
                            title="Add to Favorites" data-wishlist-button
                            data-product-id="<?php echo $product['product_id']; ?>">
                            <i class="fas fa-heart" style='font-size:24px;padding-right:10px'></i>Add to Wishlist
                        </span>
                        <!-- <a><span class="pd-detail__click-wrap btn-sm ms-2" data-tooltip="tooltip" data-placement="top"
                        title="Add to Favorites"><i class="far fa-heart u-s-m-r-6"></i>

                                Add to Wishlist</a> -->

                                <span class="pd-detail__click-count"></span></span></div>
                    </div>
                    <div class="u-s-m-b-15">
                    </div>
                   
                    <div class="u-s-m-b-15">
                    <form class="pd-detail-inline-2" method="POST" action="/cart/<?= $product['product_id'] ?>">
                            <!-- <div class="pd-detail-inline-2"> -->
                                <div class="u-s-m-b-15">
                               
                                    <!--====== Input Counter ======-->
                                    <div class="input-counter">

                                        <span class="input-counter__minus fas fa-minus"></span>

                                        <input name='quantity' class="input-counter__text input-counter--text-primary-style-2" type="text" value="1" data-min="1" data-max="1000">

                                        <span class="input-counter__plus fas fa-plus"></span>
                                    </div>
                                    <!--====== End - Input Counter ======-->
                                </div>
                                <div class="u-s-m-b-15">
                                    <button class="btn btn--e-brand-b-2" style="margin-top: 0px;" type="submit">Add to Cart</button>
                                </div>
                            <!-- </div> -->
                        </form>
                    </div>
                    <div class="u-s-m-b-15">

                    </div>
                </div>
                <!--====== End - Product Right Side Details ======-->
            </div>
        </div>
    </div>
</div>

<!--====== Product Detail Tab ======-->
<div class="u-s-p-y-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="pd-tab">
                    <div class="u-s-m-b-30">
                        <ul class="nav pd-tab__list">
                            <li class="nav-item">

                                <a class="nav-link" data-toggle="tab" href="#pd-desc">DESCRIPTION</a></li>

                            <li class="nav-item">

                                <a class="nav-link active" id="view-review" data-toggle="tab" href="#pd-rev">REVIEWS

                                    <span>(23)</span></a></li>
                        </ul>
                    </div>
                    <div class="tab-content">

                        <!--====== Tab 1 ======-->
                        <div class="tab-pane" id="pd-desc">
                            <div class="pd-tab__desc">
                                <div class="u-s-m-b-15">
                                    <p><?=$product['product_description']?></p>
                                </div>
                                <div class="u-s-m-b-30"><iframe src="https://www.youtube.com/embed/qKqSBm07KZk" allowfullscreen></iframe></div>
                                <!-- <div class="u-s-m-b-30">
                                    <ul>
                                        <li><i class="fas fa-check u-s-m-r-8"></i>

                                            <span>Buyer Protection.</span></li>
                                        <li><i class="fas fa-check u-s-m-r-8"></i>

                                            <span>Full Refund if you don't receive your order.</span></li>
                                        <li><i class="fas fa-check u-s-m-r-8"></i>

                                            <span>Returns accepted if product not as described.</span></li>
                                    </ul>
                                </div> -->
                                <!-- <div class="u-s-m-b-15">
                                    <h4>PRODUCT INFORMATION</h4>
                                </div>
                                <div class="u-s-m-b-15">
                                    <div class="pd-table gl-scroll">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>Main Material</td>
                                                    <td>Cotton</td>
                                                </tr>
                                                <tr>
                                                    <td>Color</td>
                                                    <td>Green, Blue, Red</td>
                                                </tr>
                                                <tr>
                                                    <td>Sleeves</td>
                                                    <td>Long Sleeve</td>
                                                </tr>
                                                <tr>
                                                    <td>Top Fit</td>
                                                    <td>Regular</td>
                                                </tr>
                                                <tr>
                                                    <td>Print</td>
                                                    <td>Not Printed</td>
                                                </tr>
                                                <tr>
                                                    <td>Neck</td>
                                                    <td>Round Neck</td>
                                                </tr>
                                                <tr>
                                                    <td>Pieces Count</td>
                                                    <td>1 Piece</td>
                                                </tr>
                                                <tr>
                                                    <td>Occasion</td>
                                                    <td>Casual</td>
                                                </tr>
                                                <tr>
                                                    <td>Shipping Weight (kg)</td>
                                                    <td>0.5</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <!--====== End - Tab 1 ======-->


                        <!--====== Tab 2 ======-->
                        <!--====== End - Tab 2 ======-->


                        <!--====== Tab 3 ======-->
                        <div class="tab-pane fade show active" id="pd-rev">
                            <div class="pd-tab__rev">
                                <div class="u-s-m-b-30">
                                    <div class="pd-tab__rev-score">
                                        <div class="u-s-m-b-8">
                                            <h2><?= count($reviews)?> Reviews - <?php echo $product['total_review'].'.0' ?> (Overall)</h2>
                                        </div>
                                        <div class="gl-rating-style-2 u-s-m-b-8"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i></div>
                                        <div class="u-s-m-b-8">
                                            <h4>We want to hear from you!</h4>
                                        </div>

                                        <span class="gl-text">Tell us what you think about this item</span>
                                        <br>
                                        <button id="theBtn" type="button" onclick="isLogin(<?php echo $customer_id; ?>)" class="btn btn--e-brand-b-2">Add Review</button>
                                    </div>
                                    <form class="review-form" id="reviewForm" action="" method="POST" enctype="multipart/form-data" style="display:none;padding:10px 120px">
                                        <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                                        <input type="hidden" id="check" name="check" value="<?php echo $check; ?>">
                                
                                        <div class="u-s-m-b-15">
                                            <label for="review-text">Your Review:</label>
                                            <textarea id="review-text" name="review_text" required></textarea>
                                        </div>
                                        
                                        <div class="u-s-m-b-15">
                                            <!-- <label for="review-rating">Rating:</label> -->
                                            <div class="star-rating" >
                                                <input type="radio" id="star5" name="rating" value="5" required />
                                                <label for="star5" class="star">&#9733;</label>
                                                <input type="radio" id="star4" name="rating" value="4" required />
                                                <label for="star4" class="star">&#9733;</label>
                                                <input type="radio" id="star3" name="rating" value="3" required />
                                                <label for="star3" class="star">&#9733;</label>
                                                <input type="radio" id="star2" name="rating" value="2" required />
                                                <label for="star2" class="star">&#9733;</label>
                                                <input type="radio" id="star1" name="rating" value="1" required />
                                                <label for="star1" class="star">&#9733;</label>
                                            </div>
                                        </div>
                                
                                        <div class="u-s-m-b-15">
                                        <div class="gl-inline">
                                                <div class="gl-inline" style='display: flex;justify-content:center; padding-left:10px;padding-bottom:10px ;'>
                                                     <div class="upload-container">
                                                         <div id="drop-area" class="drop-area">
                                                             <p>Drag & Drop your images here or <span id="browse">Browse</span></p>
                                                             <input type="file" id="fileElem" name="review_image" accept="image/*" style="display:none">
                                             
                                                         </div>
                                                 
                                                         <!-- Preview and confirmation buttons -->
                                                         <div id="preview-container" class="preview-container">
                                                             <img id="preview-image" alt="Image Preview">
                                                             <div>
                                                                 <a class="btn-cancel btn btn--e-brand-b-2" id="cancel-btn">Delete Image</a>
                                                             </div>
                                                         </div>
                                                     </div>
                                                     </div>
                                                </div>
                                            <!-- <label for="review-image">Upload Image:</label>
                                            <input type="file" id="review-image" name="review_image" accept="image/*"> -->
                                        </div>
                                
                                        <div class="u-s-m-b-15">
                                            
                                        </div>
                                        <button id="theBtn" type="button" onclick="confirmDelete(<?php echo $customer_id; ?>)" class="btn btn--e-brand-b-2">Submit Review</button>
                                    </form>
                                </div>
                                <div class="u-s-m-b-30" style="">
                                    <form>
                                        <div  class="rev-f1__group">
                                            <div class="u-s-m-b-15">
                                                <h2 style="padding-top:10px"><?= count($reviews)?> Review(s) for <b style="color:#D2691E"><?php echo $product['product_name']; ?></b></h2>
                                            </div>
                                            <div class="u-s-m-b-15">

                                                </div>
                                        </div>
                                        <div class="rev-f1__review" style="">
                                            <?php
                                                foreach ($reviews as $review) { 
                                                    echo '<div class="review-o u-s-m-b-15" style="display:flex;background-color:#fff;padding:10px">'.'
                                                    <img src="/public/images/reviews/' . htmlspecialchars($review['review_image']) . '" alt="Review Image" style="width:140px;margin-right:20px;border-radius:8px" class="review-image">'.'<div><div class="review-o__info u-s-m-b-8">';
                                                    if ($review['review_image']) {
                                                    }
                                                    echo '<span class="review-o__name">' . htmlspecialchars($review['customer_name']) . '</span>';
                                                    echo ' <span class="review-o__date">27 Feb 2018 10:57:43</span></div>';
                                                    echo '<div class="review-o__rating gl-rating-style u-s-m-b-8">';
                                                    for ($i = 0; $i < $review['review_rating']; $i++) {
                                                        echo '<i class="fas fa-star"></i>'; // Star symbol
                                                    }
                                                    for ($i = $review['review_rating']; $i < 5; $i++) {
                                                        echo '<i class="far fa-star"></i>'; // Empty star symbol
                                                    }
                                                    echo '<span>(4)</span></div>';
                                    
                                                    echo '<p class="review-o__text">'. htmlspecialchars($review['review_text']).'</p></div>';
                                                    echo '</div>';
                                                }
                                                ?>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--====== End - Tab 3 ======-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====== End - Product Detail Tab ======-->
<div id="buyModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <div class="modal-body text-center">
            <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
            <h5>You need to buy the product to review it.</h5>
            <form id="deleteForm" action="/cart/<?= $product['product_id'] ?>" method="POST">
                <!-- <a href="/cart/<?= $product['product_id'] ?>">
                    <button class="btn btn--e-brand-b-2" type="submit">Add to Cart</button>
                </a> -->
                <button type="button" class="btn btn-secondary mr-2" onclick="closeModal()">Cancel</button>
                <button type="submit" class="btn btn-danger">Add to Cart</button>
            </form>
        </div>
    </div>
    </div>
    <div id="loginModal" class="modal" style="display: none;">
    <div class="modal-content">
        <div class="modal-body text-center">
            <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
            <h5 id="the_Text">Are you sure you want to delete this product from your wishlist?</h5>
            <form id="deleteForm" action="/login" method="POST">
                <input type="hidden" name="id" id="deleteProductId">
                <button type="button" class="btn btn-secondary mr-2" onclick="closeModal()">Cancel</button>
                <button type="submit" class="btn btn-danger">Login</button>
            </form>
        </div>
    </div>
    </div>
    <div id="errorModal" class="modal" style="display: none;">
    <div class="modal-content">
        <div class="modal-body text-center">
            <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
            <h5 id="error_Text">Error</h5>
            <form id="deleteForm" action="/login" method="POST">
                <input type="hidden" name="id" id="deleteProductId">
                <button type="button" class="btn btn-secondary mr-2" onclick="closeModal()">Ok</button>
            </form>
        </div>
    </div>
    </div>
<!--====== End - Product Detail Tab ======-->
<div class="u-s-p-b-90">

    <!--====== Section Intro ======-->
    <!-- <div class="section__intro u-s-m-b-46">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section__text-wrap">
                        <h1 class="section__heading u-c-secondary u-s-m-b-12">CUSTOMER ALSO VIEWED</h1>

                        <span class="section__span u-c-grey">PRODUCTS THAT CUSTOMER VIEWED</span>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!--====== End - Section Intro ======-->


    <!--====== Section Content ======-->
    <!-- <div class="section__content">
        <div class="container">
            <div class="slider-fouc">
                <div class="owl-carousel product-slider" data-item="4">
                    <div class="u-s-m-b-30">
                        <div class="product-o product-o--hover-on">
                            <div class="product-o__wrap">

                                <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

                                    <img class="aspect__img" src="images/product/electronic/product1.jpg" alt=""></a>
                                <div class="product-o__action-wrap">
                                    <ul class="product-o__action-list">
                                        <li>

                                            <a data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick View"><i class="fas fa-search-plus"></i></a></li>
                                        <li>

                                            <a data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a></li>
                                        <li>

                                            <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a></li>
                                        <li>

                                            <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Email me When the price drops"><i class="fas fa-envelope"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                            <span class="product-o__category">

                                <a href="shop-side-version-2.html">Electronics</a></span>

                            <span class="product-o__name">

                                <a href="product-detail.html">Beats Bomb Wireless Headphone</a></span>
                            <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                <span class="product-o__review">(20)</span></div>

                            <span class="product-o__price">$125.00

                                <span class="product-o__discount">$160.00</span></span>
                        </div>
                    </div>
                    <div class="u-s-m-b-30">
                        <div class="product-o product-o--hover-on">
                            <div class="product-o__wrap">

                                <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

                                    <img class="aspect__img" src="images/product/electronic/product2.jpg" alt=""></a>
                                <div class="product-o__action-wrap">
                                    <ul class="product-o__action-list">
                                        <li>

                                            <a data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick View"><i class="fas fa-search-plus"></i></a></li>
                                        <li>

                                            <a data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a></li>
                                        <li>

                                            <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a></li>
                                        <li>

                                            <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Email me When the price drops"><i class="fas fa-envelope"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                            <span class="product-o__category">

                                <a href="shop-side-version-2.html">Electronics</a></span>

                            <span class="product-o__name">

                                <a href="product-detail.html">Red Wireless Headphone</a></span>
                            <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                <span class="product-o__review">(20)</span></div>

                            <span class="product-o__price">$125.00

                                <span class="product-o__discount">$160.00</span></span>
                        </div>
                    </div>
                    <div class="u-s-m-b-30">
                        <div class="product-o product-o--hover-on">
                            <div class="product-o__wrap">

                                <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

                                    <img class="aspect__img" src="images/product/electronic/product3.jpg" alt=""></a>
                                <div class="product-o__action-wrap">
                                    <ul class="product-o__action-list">
                                        <li>

                                            <a data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick View"><i class="fas fa-search-plus"></i></a></li>
                                        <li>

                                            <a data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a></li>
                                        <li>

                                            <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a></li>
                                        <li>

                                            <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Email me When the price drops"><i class="fas fa-envelope"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                            <span class="product-o__category">

                                <a href="shop-side-version-2.html">Electronics</a></span>

                            <span class="product-o__name">

                                <a href="product-detail.html">Yellow Wireless Headphone</a></span>
                            <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                <span class="product-o__review">(20)</span></div>

                            <span class="product-o__price">$125.00

                                <span class="product-o__discount">$160.00</span></span>
                        </div>
                    </div>
                    <div class="u-s-m-b-30">
                        <div class="product-o product-o--hover-on">
                            <div class="product-o__wrap">

                                <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

                                    <img class="aspect__img" src="images/product/electronic/product23.jpg" alt=""></a>
                                <div class="product-o__action-wrap">
                                    <ul class="product-o__action-list">
                                        <li>

                                            <a data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick View"><i class="fas fa-search-plus"></i></a></li>
                                        <li>

                                            <a data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a></li>
                                        <li>

                                            <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a></li>
                                        <li>

                                            <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Email me When the price drops"><i class="fas fa-envelope"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                            <span class="product-o__category">

                                <a href="shop-side-version-2.html">Electronics</a></span>

                            <span class="product-o__name">

                                <a href="product-detail.html">Razor Gear Ultra Slim 8GB Ram</a></span>
                            <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                <span class="product-o__review">(20)</span></div>

                            <span class="product-o__price">$125.00

                                <span class="product-o__discount">$160.00</span></span>
                        </div>
                    </div>
                    <div class="u-s-m-b-30">
                        <div class="product-o product-o--hover-on">
                            <div class="product-o__wrap">

                                <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

                                    <img class="aspect__img" src="images/product/electronic/product26.jpg" alt=""></a>
                                <div class="product-o__action-wrap">
                                    <ul class="product-o__action-list">
                                        <li>

                                            <a data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick View"><i class="fas fa-search-plus"></i></a></li>
                                        <li>

                                            <a data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a></li>
                                        <li>

                                            <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a></li>
                                        <li>

                                            <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Email me When the price drops"><i class="fas fa-envelope"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                            <span class="product-o__category">

                                <a href="shop-side-version-2.html">Electronics</a></span>

                            <span class="product-o__name">

                                <a href="product-detail.html">Razor Gear Ultra Slim 12GB Ram</a></span>
                            <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                <span class="product-o__review">(20)</span></div>

                            <span class="product-o__price">$125.00

                                <span class="product-o__discount">$160.00</span></span>
                        </div>
                    </div>
                    <div class="u-s-m-b-30">
                        <div class="product-o product-o--hover-on">
                            <div class="product-o__wrap">

                                <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

                                    <img class="aspect__img" src="images/product/electronic/product30.jpg" alt=""></a>
                                <div class="product-o__action-wrap">
                                    <ul class="product-o__action-list">
                                        <li>

                                            <a data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick View"><i class="fas fa-search-plus"></i></a></li>
                                        <li>

                                            <a data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a></li>
                                        <li>

                                            <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a></li>
                                        <li>

                                            <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Email me When the price drops"><i class="fas fa-envelope"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                            <span class="product-o__category">

                                <a href="shop-side-version-2.html">Electronics</a></span>

                            <span class="product-o__name">

                                <a href="product-detail.html">Razor Gear Ultra Slim 16GB Ram</a></span>
                            <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                <span class="product-o__review">(20)</span></div>

                            <span class="product-o__price">$125.00

                                <span class="product-o__discount">$160.00</span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!--====== End - Section Content ======-->
</div>
<!--====== End - Section 1 ======-->
</div>
<script>
    function isLogin(userId){
        if(userId != null){
            document.getElementById('reviewForm').style.display = 'block';
        }else{
            document.getElementById('loginModal').style.display = 'flex';
            document.getElementById('the_Text').innerText = 'You Must Login';
        }
    }
    // Open modal with product ID
    function confirmDelete(productId) {
        // alert("dgdfgsdgsdgsd");

        if(productId != null){
            
            var f = document.getElementById('check').value;
            if(f == false){
                document.getElementById('deleteProductId').value = productId;
                document.getElementById('buyModal').style.display = 'flex';
                // document.getElementById('the_Text').innerText = 'You need to buy the product to review it.';
            }else{
                // alert("2");
                if(document.getElementById("review-text").value){
                    if(document.getElementById("star1").checked || document.getElementById("star2").checked || document.getElementById("star3").checked|| document.getElementById("star4").checked||document.getElementById("star5").checked){
                        document.getElementById("reviewForm").action = "/submitReview";
                        document.getElementById("reviewForm").submit();
                    }else{
                        document.getElementById('deleteProductId').value = productId;
                        document.getElementById('errorModal').style.display = 'flex';
                        document.getElementById('error_Text').innerText = 'You need to rating.';
                    }
                }else{
                    document.getElementById('deleteProductId').value = productId;
                    document.getElementById('errorModal').style.display = 'flex';
                    document.getElementById('error_Text').innerText = 'You need to fill the review.';
                }
                
            }
        }else{
            document.getElementById('loginModal').style.display = 'flex';
            document.getElementById('the_Text').innerText = 'You Must Login';

        }
       
    }

    // Close modal
    function closeModal() {
        document.getElementById('loginModal').style.display = 'none';
        document.getElementById('buyModal').style.display = 'none';
        document.getElementById('errorModal').style.display = 'none';
    }

    // Close modal when clicking outside of modal-content
    window.onclick = function(event) {
        const modal = document.getElementById('deleteModal');
        if (event.target == modal) {
            closeModal();
        }
    };
</script>
<script src="/public/js/AddtoFavorites.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="/public/js/vendor.js"></script>
    <script src="/public/js/jquery.shopnav.js"></script>
    <script src="/public/js/app.js"></script>
<?php require 'views/partials/footer.php'; ?>