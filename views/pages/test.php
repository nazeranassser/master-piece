<?php require 'views/partials/header2.php'; ?>

<style>

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

                        <a href="signin.html"><span class="pd-detail__click-wrap"><i class="far fa-heart u-s-m-r-6"></i>

                                Add to Wishlist</a>

                                <span class="pd-detail__click-count">(222)</span></span></div>
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

                        <!-- <span class="pd-detail__label u-s-m-b-8">Product Policy:</span>
                        <ul class="pd-detail__policy-list">
                            <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                <span>Buyer Protection.</span></li>
                            <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                <span>Full Refund if you don't receive your order.</span></li>
                            <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                <span>Returns accepted if product not as described.</span></li>
                        </ul> -->
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
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                </div>
                                <div class="u-s-m-b-30"><iframe src="https://www.youtube.com/embed/qKqSBm07KZk" allowfullscreen></iframe></div>
                                <div class="u-s-m-b-30">
                                    <ul>
                                        <li><i class="fas fa-check u-s-m-r-8"></i>

                                            <span>Buyer Protection.</span></li>
                                        <li><i class="fas fa-check u-s-m-r-8"></i>

                                            <span>Full Refund if you don't receive your order.</span></li>
                                        <li><i class="fas fa-check u-s-m-r-8"></i>

                                            <span>Returns accepted if product not as described.</span></li>
                                    </ul>
                                </div>
                                <div class="u-s-m-b-15">
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
                                </div>
                            </div>
                        </div>
                        <!--====== End - Tab 1 ======-->


                        <!--====== Tab 2 ======-->
                        <!-- <div class="tab-pane" id="pd-tag">
                            <div class="pd-tab__tag">
                                <h2 class="u-s-m-b-15">ADD YOUR TAGS</h2>
                                <div class="u-s-m-b-15">
                                    <form>

                                        <input class="input-text input-text--primary-style" type="text">

                                        <button class="btn btn--e-brand-b-2" type="submit">ADD TAGS</button></form>
                                </div>

                                <span class="gl-text">Use spaces to separate tags. Use single quotes (') for phrases.</span>
                            </div>
                        </div> -->
                        <!--====== End - Tab 2 ======-->


                        <!--====== Tab 3 ======-->
                        <div class="tab-pane fade show active" id="pd-rev">
                            <div class="pd-tab__rev">
                                <div class="u-s-m-b-30">
                                    <div class="pd-tab__rev-score">
                                        <div class="u-s-m-b-8">
                                            <h2>23 Reviews - 4.6 (Overall)</h2>
                                        </div>
                                        <div class="gl-rating-style-2 u-s-m-b-8"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i></div>
                                        <div class="u-s-m-b-8">
                                            <h4>We want to hear from you!</h4>
                                        </div>

                                        <span class="gl-text">Tell us what you think about this item</span>
                                    </div>
                                </div>
                                <div class="u-s-m-b-30" style="background-color:#fff;">
                                    <form>
                                        <div class="rev-f1__group">
                                            <div class="u-s-m-b-15">
                                                <h2>23 Review(s) for Man Ruched Floral Applique Tee</h2>
                                            </div>
                                            <div class="u-s-m-b-15">

                                                <label for="sort-review"></label><select class="select-box select-box--primary-style" id="sort-review">
                                                    <option selected>Sort by: Best Rating</option>
                                                    <option>Sort by: Worst Rating</option>
                                                </select></div>
                                        </div>
                                        <div class="rev-f1__review">
                                            <?php
                                                foreach ($reviews as $review) { 
                                                    echo '<div class="review-o u-s-m-b-15" style="display:flex">'.'
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
                                                    echo '</div></div>';
                                                }
                                                ?>
                                            <!-- <div class="review-o u-s-m-b-15">
                                                <div class="review-o__info u-s-m-b-8">

                                                    <span class="review-o__name">John Doe</span>

                                                    <span class="review-o__date">27 Feb 2018 10:57:43</span></div>
                                                <div class="review-o__rating gl-rating-style u-s-m-b-8"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>

                                                    <span>(4)</span></div>
                                                <p class="review-o__text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                            </div>
                                            <div class="review-o u-s-m-b-15">
                                                <div class="review-o__info u-s-m-b-8">

                                                    <span class="review-o__name">John Doe</span>

                                                    <span class="review-o__date">27 Feb 2018 10:57:43</span></div>
                                                <div class="review-o__rating gl-rating-style u-s-m-b-8"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>

                                                    <span>(4)</span></div>
                                                <p class="review-o__text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                            </div>
                                            <div class="review-o u-s-m-b-15">
                                                <div class="review-o__info u-s-m-b-8">

                                                    <span class="review-o__name">John Doe</span>

                                                    <span class="review-o__date">27 Feb 2018 10:57:43</span></div>
                                                <div class="review-o__rating gl-rating-style u-s-m-b-8"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>

                                                    <span>(4)</span></div>
                                                <p class="review-o__text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                            </div> -->
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
<div class="u-s-p-b-90">

    <!--====== Section Intro ======-->
    <div class="section__intro u-s-m-b-46">
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
    </div>
    <!--====== End - Section Intro ======-->


    <!--====== Section Content ======-->
    <div class="section__content">
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
    </div>
    <!--====== End - Section Content ======-->
</div>
<!--====== End - Section 1 ======-->
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="/public/js/vendor.js"></script>
    <script src="/public/js/jquery.shopnav.js"></script>
    <script src="/public/js/app.js"></script>
<?php require 'views/partials/footer.php'; ?>
