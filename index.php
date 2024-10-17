<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800"
      rel="stylesheet"
    />

    <!--====== Vendor Css ======-->
    <link rel="stylesheet" href="css/vendor.css" />

    <!--====== Utility-Spacing ======-->
    <link rel="stylesheet" href="css/utility.css" />

    <!--====== App ======-->
    <link rel="stylesheet" href="css/app.css" />
</head>

<body>


<div id="app">
      <!--====== Main Header ======-->
      <header>
        <?php include 'navbar.php' ;?> 
    </header>
      <!--====== End - Main Header ======-->

      <!--====== App Content ======-->
      <div class="app-content">
        <!--====== Primary Slider ======-->
        <div class="s-skeleton s-skeleton--h-600 s-skeleton--bg-grey">
          <div class="owl-carousel primary-style-1" id="hero-slider">
            <div class="hero-slide hero-slide--1">
              <div class="container">
                <div class="row">
                  <div class="col-12">
                    <div class="slider-content slider-content--animation">
                      <span class="content-span-1 u-c-secondary"
                        >Latest Update Stock</span
                      >

                      <span class="content-span-2 u-c-secondary"
                        >30% Off On Electronics</span
                      >

                      <span class="content-span-3 u-c-secondary"
                        >Find electronics on best prices, Also Discover most
                        selling products of electronics</span
                      >

                      <span class="content-span-4 u-c-secondary"
                        >Starting At

                        <span class="u-c-brand">$1050.00</span></span
                      >

                      <a
                        class="shop-now-link btn--e-brand"
                        href="shop-side-version-2.html"
                        >SHOP NOW</a
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="hero-slide hero-slide--2">
              <div class="container">
                <div class="row">
                  <div class="col-12">
                    <div class="slider-content slider-content--animation">
                      <span class="content-span-1 u-c-white"
                        >Find Top Brands</span
                      >

                      <span class="content-span-2 u-c-white"
                        >10% Off On Electronics</span
                      >

                      <span class="content-span-3 u-c-white"
                        >Find electronics on best prices, Also Discover most
                        selling products of electronics</span
                      >

                      <span class="content-span-4 u-c-white"
                        >Starting At

                        <span class="u-c-brand">$380.00</span></span
                      >

                      <a
                        class="shop-now-link btn--e-brand"
                        href="shop-side-version-2.html"
                        >SHOP NOW</a
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="hero-slide hero-slide--3">
              <div class="container">
                <div class="row">
                  <div class="col-12">
                    <div class="slider-content slider-content--animation">
                      <span class="content-span-1 u-c-secondary"
                        >Find Top Brands</span
                      >

                      <span class="content-span-2 u-c-secondary"
                        >10% Off On Electronics</span
                      >

                      <span class="content-span-3 u-c-secondary"
                        >Find electronics on best prices, Also Discover most
                        selling products of electronics</span
                      >

                      <span class="content-span-4 u-c-secondary"
                        >Starting At

                        <span class="u-c-brand">$550.00</span></span
                      >

                      <a
                        class="shop-now-link btn--e-brand"
                        href="shop-side-version-2.html"
                        >SHOP NOW</a
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--====== End - Primary Slider ======-->

        <!--====== Section 1 ======-->
        <div class="u-s-p-y-60">
          <!--====== Section Intro ======-->
          <div class="section__intro u-s-m-b-46">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="section__text-wrap">
                    <h1 class="section__heading u-c-secondary u-s-m-b-12">
                      SHOP BY DEALS
                    </h1>

                    <span class="section__span u-c-silver"
                      >BROWSE FAVOURITE DEALS</span
                    >
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
                <div class="col-lg-5 col-md-5 u-s-m-b-30">
                  <a class="collection" href="shop-side-version-2.html">
                    <div class="aspect aspect--bg-grey aspect--square">
                      <img
                        class="aspect__img collection__img"
                        src="images/collection/coll-1.jpg"
                        alt=""
                      />
                    </div>
                  </a>
                </div>
                <div class="col-lg-7 col-md-7 u-s-m-b-30">
                  <a class="collection" href="shop-side-version-2.html">
                    <div class="aspect aspect--bg-grey aspect--1286-890">
                      <img
                        class="aspect__img collection__img"
                        src="images/collection/coll-2.jpg"
                        alt=""
                      />
                    </div>
                  </a>
                </div>
                <div class="col-lg-7 col-md-7 u-s-m-b-30">
                  <a class="collection" href="shop-side-version-2.html">
                    <div class="aspect aspect--bg-grey aspect--1286-890">
                      <img
                        class="aspect__img collection__img"
                        src="images/collection/coll-3.jpg"
                        alt=""
                      />
                    </div>
                  </a>
                </div>
                <div class="col-lg-5 col-md-5 u-s-m-b-30">
                  <a class="collection" href="shop-side-version-2.html">
                    <div class="aspect aspect--bg-grey aspect--square">
                      <img
                        class="aspect__img collection__img"
                        src="images/collection/coll-4.jpg"
                        alt=""
                      />
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <!--====== Section Content ======-->
        </div>
        <!--====== End - Section 1 ======-->

        <!--====== Section 2 ======-->
        <div class="u-s-p-b-60">
          <!--====== Section Intro ======-->
          <div class="section__intro u-s-m-b-16">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="section__text-wrap">
                    <h1 class="section__heading u-c-secondary u-s-m-b-12">
                      TOP TRENDING
                    </h1>

                    <span class="section__span u-c-silver"
                      >CHOOSE CATEGORY</span
                    >
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
                      <button
                        class="btn filter__btn filter__btn--style-1 js-checked"
                        type="button"
                        data-filter="*"
                      >
                        ALL
                      </button>
                    </div>
                    <div class="filter__category-wrapper">
                      <button
                        class="btn filter__btn filter__btn--style-1"
                        type="button"
                        data-filter=".headphone"
                      >
                        HEADPHONES
                      </button>
                    </div>
                    <div class="filter__category-wrapper">
                      <button
                        class="btn filter__btn filter__btn--style-1"
                        type="button"
                        data-filter=".smartphone"
                      >
                        SMARTPHONES
                      </button>
                    </div>
                    <div class="filter__category-wrapper">
                      <button
                        class="btn filter__btn filter__btn--style-1"
                        type="button"
                        data-filter=".sportgadget"
                      >
                        SPORT GADGETS
                      </button>
                    </div>
                    <div class="filter__category-wrapper">
                      <button
                        class="btn filter__btn filter__btn--style-1"
                        type="button"
                        data-filter=".dslr"
                      >
                        DSLR
                      </button>
                    </div>
                  </div>
                  <div class="filter__grid-wrapper u-s-m-t-30">
                    <div class="row">
                      <div
                        class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item headphone"
                      >
                        <div
                          class="product-o product-o--hover-on product-o--radius"
                        >
                          <div class="product-o__wrap">
                            <a
                              class="aspect aspect--bg-grey aspect--square u-d-block"
                              href="product-detail.html"
                            >
                              <img
                                class="aspect__img"
                                src="images/product/electronic/product2.jpg"
                                alt=""
                            /></a>
                            <div class="product-o__action-wrap">
                              <ul class="product-o__action-list">
                                <li>
                                  <a
                                    data-modal="modal"
                                    data-modal-id="#quick-look"
                                    data-tooltip="tooltip"
                                    data-placement="top"
                                    title="Quick View"
                                    ><i class="fas fa-search-plus"></i
                                  ></a>
                                </li>
                                <li>
                                  <a
                                    data-modal="modal"
                                    data-modal-id="#add-to-cart"
                                    data-tooltip="tooltip"
                                    data-placement="top"
                                    title="Add to Cart"
                                    ><i class="fas fa-plus-circle"></i
                                  ></a>
                                </li>
                                <li>
                                  <a
                                    href="signin.html"
                                    data-tooltip="tooltip"
                                    data-placement="top"
                                    title="Add to Wishlist"
                                    ><i class="fas fa-heart"></i
                                  ></a>
                                </li>
                                <li>
                                  <a
                                    href="signin.html"
                                    data-tooltip="tooltip"
                                    data-placement="top"
                                    title="Email me When the price drops"
                                    ><i class="fas fa-envelope"></i
                                  ></a>
                                </li>
                              </ul>
                            </div>
                          </div>

                          <span class="product-o__category">
                            <a href="shop-side-version-2.html"
                              >Electronics</a
                            ></span
                          >

                          <span class="product-o__name">
                            <a href="product-detail.html"
                              >Red Wireless Headphone</a
                            ></span
                          >
                          <div class="product-o__rating gl-rating-style">
                            <i class="fas fa-star"></i
                            ><i class="fas fa-star"></i
                            ><i class="fas fa-star"></i
                            ><i class="fas fa-star"></i
                            ><i class="fas fa-star-half-alt"></i>

                            <span class="product-o__review">(23)</span>
                          </div>

                          <span class="product-o__price"
                            >$125.00

                            <span class="product-o__discount"
                              >$160.00</span
                            ></span
                          >
                        </div>
                      </div>
                      <div
                        class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item headphone"
                      >
                        <div
                          class="product-o product-o--hover-on product-o--radius"
                        >
                          <div class="product-o__wrap">
                            <a
                              class="aspect aspect--bg-grey aspect--square u-d-block"
                              href="product-detail.html"
                            >
                              <img
                                class="aspect__img"
                                src="images/product/electronic/product3.jpg"
                                alt=""
                            /></a>
                            <div class="product-o__action-wrap">
                              <ul class="product-o__action-list">
                                <li>
                                  <a
                                    data-modal="modal"
                                    data-modal-id="#quick-look"
                                    data-tooltip="tooltip"
                                    data-placement="top"
                                    title="Quick View"
                                    ><i class="fas fa-search-plus"></i
                                  ></a>
                                </li>
                                <li>
                                  <a
                                    data-modal="modal"
                                    data-modal-id="#add-to-cart"
                                    data-tooltip="tooltip"
                                    data-placement="top"
                                    title="Add to Cart"
                                    ><i class="fas fa-plus-circle"></i
                                  ></a>
                                </li>
                                <li>
                                  <a
                                    href="signin.html"
                                    data-tooltip="tooltip"
                                    data-placement="top"
                                    title="Add to Wishlist"
                                    ><i class="fas fa-heart"></i
                                  ></a>
                                </li>
                                <li>
                                  <a
                                    href="signin.html"
                                    data-tooltip="tooltip"
                                    data-placement="top"
                                    title="Email me When the price drops"
                                    ><i class="fas fa-envelope"></i
                                  ></a>
                                </li>
                              </ul>
                            </div>
                          </div>

                          <span class="product-o__category">
                            <a href="shop-side-version-2.html"
                              >Electronics</a
                            ></span
                          >

                          <span class="product-o__name">
                            <a href="product-detail.html"
                              >Yellow Wireless Headphone</a
                            ></span
                          >
                          <div class="product-o__rating gl-rating-style">
                            <i class="fas fa-star"></i
                            ><i class="fas fa-star"></i
                            ><i class="fas fa-star-half-alt"></i
                            ><i class="far fa-star"></i
                            ><i class="far fa-star"></i>

                            <span class="product-o__review">(23)</span>
                          </div>

                          <span class="product-o__price"
                            >$125.00

                            <span class="product-o__discount"
                              >$160.00</span
                            ></span
                          >
                        </div>
                      </div>
                      <div
                        class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item sportgadget"
                      >
                        <div
                          class="product-o product-o--hover-on product-o--radius"
                        >
                          <div class="product-o__wrap">
                            <a
                              class="aspect aspect--bg-grey aspect--square u-d-block"
                              href="product-detail.html"
                            >
                              <img
                                class="aspect__img"
                                src="images/product/electronic/product4.jpg"
                                alt=""
                            /></a>
                            <div class="product-o__action-wrap">
                              <ul class="product-o__action-list">
                                <li>
                                  <a
                                    data-modal="modal"
                                    data-modal-id="#quick-look"
                                    data-tooltip="tooltip"
                                    data-placement="top"
                                    title="Quick View"
                                    ><i class="fas fa-search-plus"></i
                                  ></a>
                                </li>
                                <li>
                                  <a
                                    data-modal="modal"
                                    data-modal-id="#add-to-cart"
                                    data-tooltip="tooltip"
                                    data-placement="top"
                                    title="Add to Cart"
                                    ><i class="fas fa-plus-circle"></i
                                  ></a>
                                </li>
                                <li>
                                  <a
                                    href="signin.html"
                                    data-tooltip="tooltip"
                                    data-placement="top"
                                    title="Add to Wishlist"
                                    ><i class="fas fa-heart"></i
                                  ></a>
                                </li>
                                <li>
                                  <a
                                    href="signin.html"
                                    data-tooltip="tooltip"
                                    data-placement="top"
                                    title="Email me When the price drops"
                                    ><i class="fas fa-envelope"></i
                                  ></a>
                                </li>
                              </ul>
                            </div>
                          </div>

                          <span class="product-o__category">
                            <a href="shop-side-version-2.html"
                              >Electronics</a
                            ></span
                          >

                          <span class="product-o__name">
                            <a href="product-detail.html"
                              >Hover Skateboard Scooter</a
                            ></span
                          >
                          <div class="product-o__rating gl-rating-style">
                            <i class="fas fa-star"></i
                            ><i class="fas fa-star"></i
                            ><i class="fas fa-star"></i
                            ><i class="fas fa-star"></i
                            ><i class="fas fa-star-half-alt"></i>

                            <span class="product-o__review">(23)</span>
                          </div>

                          <span class="product-o__price"
                            >$125.00

                            <span class="product-o__discount"
                              >$160.00</span
                            ></span
                          >
                        </div>
                      </div>
                      <div
                        class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item sportgadget"
                      >
                        <div
                          class="product-o product-o--hover-on product-o--radius"
                        >
                          <div class="product-o__wrap">
                            <a
                              class="aspect aspect--bg-grey aspect--square u-d-block"
                              href="product-detail.html"
                            >
                              <img
                                class="aspect__img"
                                src="images/product/electronic/product5.jpg"
                                alt=""
                            /></a>
                            <div class="product-o__action-wrap">
                              <ul class="product-o__action-list">
                                <li>
                                  <a
                                    data-modal="modal"
                                    data-modal-id="#quick-look"
                                    data-tooltip="tooltip"
                                    data-placement="top"
                                    title="Quick View"
                                    ><i class="fas fa-search-plus"></i
                                  ></a>
                                </li>
                                <li>
                                  <a
                                    data-modal="modal"
                                    data-modal-id="#add-to-cart"
                                    data-tooltip="tooltip"
                                    data-placement="top"
                                    title="Add to Cart"
                                    ><i class="fas fa-plus-circle"></i
                                  ></a>
                                </li>
                                <li>
                                  <a
                                    href="signin.html"
                                    data-tooltip="tooltip"
                                    data-placement="top"
                                    title="Add to Wishlist"
                                    ><i class="fas fa-heart"></i
                                  ></a>
                                </li>
                                <li>
                                  <a
                                    href="signin.html"
                                    data-tooltip="tooltip"
                                    data-placement="top"
                                    title="Email me When the price drops"
                                    ><i class="fas fa-envelope"></i
                                  ></a>
                                </li>
                              </ul>
                            </div>
                          </div>

                          <span class="product-o__category">
                            <a href="shop-side-version-2.html"
                              >Electronics</a
                            ></span
                          >

                          <span class="product-o__name">
                            <a href="product-detail.html"
                              >Hover Red Skateboard Scooter</a
                            ></span
                          >
                          <div class="product-o__rating gl-rating-style">
                            <i class="fas fa-star"></i
                            ><i class="fas fa-star"></i
                            ><i class="fas fa-star"></i
                            ><i class="fas fa-star"></i
                            ><i class="fas fa-star-half-alt"></i>

                            <span class="product-o__review">(23)</span>
                          </div>

                          <span class="product-o__price"
                            >$125.00

                            <span class="product-o__discount"
                              >$160.00</span
                            ></span
                          >
                        </div>
                      </div>
                      <div
                        class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item dslr"
                      >
                        <div
                          class="product-o product-o--hover-on product-o--radius"
                        >
                          <div class="product-o__wrap">
                            <a
                              class="aspect aspect--bg-grey aspect--square u-d-block"
                              href="product-detail.html"
                            >
                              <img
                                class="aspect__img"
                                src="images/product/electronic/product6.jpg"
                                alt=""
                            /></a>
                            <div class="product-o__action-wrap">
                              <ul class="product-o__action-list">
                                <li>
                                  <a
                                    data-modal="modal"
                                    data-modal-id="#quick-look"
                                    data-tooltip="tooltip"
                                    data-placement="top"
                                    title="Quick View"
                                    ><i class="fas fa-search-plus"></i
                                  ></a>
                                </li>
                                <li>
                                  <a
                                    data-modal="modal"
                                    data-modal-id="#add-to-cart"
                                    data-tooltip="tooltip"
                                    data-placement="top"
                                    title="Add to Cart"
                                    ><i class="fas fa-plus-circle"></i
                                  ></a>
                                </li>
                                <li>
                                  <a
                                    href="signin.html"
                                    data-tooltip="tooltip"
                                    data-placement="top"
                                    title="Add to Wishlist"
                                    ><i class="fas fa-heart"></i
                                  ></a>
                                </li>
                                <li>
                                  <a
                                    href="signin.html"
                                    data-tooltip="tooltip"
                                    data-placement="top"
                                    title="Email me When the price drops"
                                    ><i class="fas fa-envelope"></i
                                  ></a>
                                </li>
                              </ul>
                            </div>
                          </div>

                          <span class="product-o__category">
                            <a href="shop-side-version-2.html"
                              >Electronics</a
                            ></span
                          >

                          <span class="product-o__name">
                            <a href="product-detail.html"
                              >Canon DSLR Camera 4k</a
                            ></span
                          >
                          <div class="product-o__rating gl-rating-style">
                            <i class="fas fa-star"></i
                            ><i class="fas fa-star"></i
                            ><i class="fas fa-star"></i
                            ><i class="fas fa-star"></i
                            ><i class="fas fa-star-half-alt"></i>

                            <span class="product-o__review">(23)</span>
                          </div>

                          <span class="product-o__price"
                            >$125.00

                            <span class="product-o__discount"
                              >$160.00</span
                            ></span
                          >
                        </div>
                      </div>
                      <div
                        class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item dslr"
                      >
                        <div
                          class="product-o product-o--hover-on product-o--radius"
                        >
                          <div class="product-o__wrap">
                            <a
                              class="aspect aspect--bg-grey aspect--square u-d-block"
                              href="product-detail.html"
                            >
                              <img
                                class="aspect__img"
                                src="images/product/electronic/product7.jpg"
                                alt=""
                            /></a>
                            <div class="product-o__action-wrap">
                              <ul class="product-o__action-list">
                                <li>
                                  <a
                                    data-modal="modal"
                                    data-modal-id="#quick-look"
                                    data-tooltip="tooltip"
                                    data-placement="top"
                                    title="Quick View"
                                    ><i class="fas fa-search-plus"></i
                                  ></a>
                                </li>
                                <li>
                                  <a
                                    data-modal="modal"
                                    data-modal-id="#add-to-cart"
                                    data-tooltip="tooltip"
                                    data-placement="top"
                                    title="Add to Cart"
                                    ><i class="fas fa-plus-circle"></i
                                  ></a>
                                </li>
                                <li>
                                  <a
                                    href="signin.html"
                                    data-tooltip="tooltip"
                                    data-placement="top"
                                    title="Add to Wishlist"
                                    ><i class="fas fa-heart"></i
                                  ></a>
                                </li>
                                <li>
                                  <a
                                    href="signin.html"
                                    data-tooltip="tooltip"
                                    data-placement="top"
                                    title="Email me When the price drops"
                                    ><i class="fas fa-envelope"></i
                                  ></a>
                                </li>
                              </ul>
                            </div>
                          </div>

                          <span class="product-o__category">
                            <a href="shop-side-version-2.html"
                              >Electronics</a
                            ></span
                          >

                          <span class="product-o__name">
                            <a href="product-detail.html"
                              >Nikon DSLR Camera 4k</a
                            ></span
                          >
                          <div class="product-o__rating gl-rating-style">
                            <i class="fas fa-star"></i
                            ><i class="fas fa-star"></i
                            ><i class="fas fa-star"></i
                            ><i class="fas fa-star"></i
                            ><i class="fas fa-star-half-alt"></i>

                            <span class="product-o__review">(23)</span>
                          </div>

                          <span class="product-o__price"
                            >$125.00

                            <span class="product-o__discount"
                              >$160.00</span
                            ></span
                          >
                        </div>
                      </div>
                      <div
                        class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item smartphone"
                      >
                        <div
                          class="product-o product-o--hover-on product-o--radius"
                        >
                          <div class="product-o__wrap">
                            <a
                              class="aspect aspect--bg-grey aspect--square u-d-block"
                              href="product-detail.html"
                            >
                              <img
                                class="aspect__img"
                                src="images/product/electronic/product8.jpg"
                                alt=""
                            /></a>
                            <div class="product-o__action-wrap">
                              <ul class="product-o__action-list">
                                <li>
                                  <a
                                    data-modal="modal"
                                    data-modal-id="#quick-look"
                                    data-tooltip="tooltip"
                                    data-placement="top"
                                    title="Quick View"
                                    ><i class="fas fa-search-plus"></i
                                  ></a>
                                </li>
                                <li>
                                  <a
                                    data-modal="modal"
                                    data-modal-id="#add-to-cart"
                                    data-tooltip="tooltip"
                                    data-placement="top"
                                    title="Add to Cart"
                                    ><i class="fas fa-plus-circle"></i
                                  ></a>
                                </li>
                                <li>
                                  <a
                                    href="signin.html"
                                    data-tooltip="tooltip"
                                    data-placement="top"
                                    title="Add to Wishlist"
                                    ><i class="fas fa-heart"></i
                                  ></a>
                                </li>
                                <li>
                                  <a
                                    href="signin.html"
                                    data-tooltip="tooltip"
                                    data-placement="top"
                                    title="Email me When the price drops"
                                    ><i class="fas fa-envelope"></i
                                  ></a>
                                </li>
                              </ul>
                            </div>
                          </div>

                          <span class="product-o__category">
                            <a href="shop-side-version-2.html"
                              >Electronics</a
                            ></span
                          >

                          <span class="product-o__name">
                            <a href="product-detail.html"
                              >Smartphone RAM 4GB New</a
                            ></span
                          >
                          <div class="product-o__rating gl-rating-style">
                            <i class="fas fa-star"></i
                            ><i class="fas fa-star"></i
                            ><i class="fas fa-star"></i
                            ><i class="fas fa-star"></i
                            ><i class="fas fa-star-half-alt"></i>

                            <span class="product-o__review">(23)</span>
                          </div>

                          <span class="product-o__price"
                            >$125.00

                            <span class="product-o__discount"
                              >$160.00</span
                            ></span
                          >
                        </div>
                      </div>
                      <div
                        class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item smartphone"
                      >
                        <div
                          class="product-o product-o--hover-on product-o--radius"
                        >
                          <div class="product-o__wrap">
                            <a
                              class="aspect aspect--bg-grey aspect--square u-d-block"
                              href="product-detail.html"
                            >
                              <img
                                class="aspect__img"
                                src="images/product/electronic/product9.jpg"
                                alt=""
                            /></a>
                            <div class="product-o__action-wrap">
                              <ul class="product-o__action-list">
                                <li>
                                  <a
                                    data-modal="modal"
                                    data-modal-id="#quick-look"
                                    data-tooltip="tooltip"
                                    data-placement="top"
                                    title="Quick View"
                                    ><i class="fas fa-search-plus"></i
                                  ></a>
                                </li>
                                <li>
                                  <a
                                    data-modal="modal"
                                    data-modal-id="#add-to-cart"
                                    data-tooltip="tooltip"
                                    data-placement="top"
                                    title="Add to Cart"
                                    ><i class="fas fa-plus-circle"></i
                                  ></a>
                                </li>
                                <li>
                                  <a
                                    href="signin.html"
                                    data-tooltip="tooltip"
                                    data-placement="top"
                                    title="Add to Wishlist"
                                    ><i class="fas fa-heart"></i
                                  ></a>
                                </li>
                                <li>
                                  <a
                                    href="signin.html"
                                    data-tooltip="tooltip"
                                    data-placement="top"
                                    title="Email me When the price drops"
                                    ><i class="fas fa-envelope"></i
                                  ></a>
                                </li>
                              </ul>
                            </div>
                          </div>

                          <span class="product-o__category">
                            <a href="shop-side-version-2.html"
                              >Electronics</a
                            ></span
                          >

                          <span class="product-o__name">
                            <a href="product-detail.html"
                              >Smartphone RAM 8GB New</a
                            ></span
                          >
                          <div class="product-o__rating gl-rating-style">
                            <i class="fas fa-star"></i
                            ><i class="fas fa-star"></i
                            ><i class="fas fa-star"></i
                            ><i class="fas fa-star"></i
                            ><i class="fas fa-star-half-alt"></i>

                            <span class="product-o__review">(23)</span>
                          </div>

                          <span class="product-o__price"
                            >$125.00

                            <span class="product-o__discount"
                              >$160.00</span
                            ></span
                          >
                        </div>
                      </div>
                      <div
                        class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item smartphone"
                      >
                        <div
                          class="product-o product-o--hover-on product-o--radius"
                        >
                          <div class="product-o__wrap">
                            <a
                              class="aspect aspect--bg-grey aspect--square u-d-block"
                              href="product-detail.html"
                            >
                              <img
                                class="aspect__img"
                                src="images/product/electronic/product10.jpg"
                                alt=""
                            /></a>
                            <div class="product-o__action-wrap">
                              <ul class="product-o__action-list">
                                <li>
                                  <a
                                    data-modal="modal"
                                    data-modal-id="#quick-look"
                                    data-tooltip="tooltip"
                                    data-placement="top"
                                    title="Quick View"
                                    ><i class="fas fa-search-plus"></i
                                  ></a>
                                </li>
                                <li>
                                  <a
                                    data-modal="modal"
                                    data-modal-id="#add-to-cart"
                                    data-tooltip="tooltip"
                                    data-placement="top"
                                    title="Add to Cart"
                                    ><i class="fas fa-plus-circle"></i
                                  ></a>
                                </li>
                                <li>
                                  <a
                                    href="signin.html"
                                    data-tooltip="tooltip"
                                    data-placement="top"
                                    title="Add to Wishlist"
                                    ><i class="fas fa-heart"></i
                                  ></a>
                                </li>
                                <li>
                                  <a
                                    href="signin.html"
                                    data-tooltip="tooltip"
                                    data-placement="top"
                                    title="Email me When the price drops"
                                    ><i class="fas fa-envelope"></i
                                  ></a>
                                </li>
                              </ul>
                            </div>
                          </div>

                          <span class="product-o__category">
                            <a href="shop-side-version-2.html"
                              >Electronics</a
                            ></span
                          >

                          <span class="product-o__name">
                            <a href="product-detail.html"
                              >Smartphone RAM 16GB New</a
                            ></span
                          >
                          <div class="product-o__rating gl-rating-style">
                            <i class="fas fa-star"></i
                            ><i class="fas fa-star"></i
                            ><i class="fas fa-star"></i
                            ><i class="fas fa-star"></i
                            ><i class="fas fa-star-half-alt"></i>

                            <span class="product-o__review">(23)</span>
                          </div>

                          <span class="product-o__price"
                            >$125.00

                            <span class="product-o__discount"
                              >$160.00</span
                            ></span
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="load-more">
                    <button class="btn btn--e-brand" type="button">
                      Load More
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 2 ======-->

        <!--====== Section 3 ======-->
        <div class="u-s-p-b-60">
          <!--====== Section Intro ======-->
          <div class="section__intro u-s-m-b-46">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="section__text-wrap">
                    <h1 class="section__heading u-c-secondary u-s-m-b-12">
                      DEAL OF THE DAY
                    </h1>

                    <span class="section__span u-c-silver"
                      >BUY DEAL OF THE DAY, HURRY UP! THESE NEW PRODUCTS WILL
                      EXPIRE SOON.</span
                    >

                    <span class="section__span u-c-silver"
                      >ADD THESE ON YOUR CART.</span
                    >
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
                  <div
                    class="product-o product-o--radius product-o--hover-off u-h-100"
                  >
                    <div class="product-o__wrap">
                      <a
                        class="aspect aspect--bg-grey aspect--square u-d-block"
                        href="product-detail.html"
                      >
                        <img
                          class="aspect__img"
                          src="images/product/electronic/product11.jpg"
                          alt=""
                      /></a>
                      <div class="product-o__special-count-wrap">
                        <div
                          class="countdown countdown--style-special"
                          data-countdown="2020/05/01"
                        ></div>
                      </div>
                      <div class="product-o__action-wrap">
                        <ul class="product-o__action-list">
                          <li>
                            <a
                              data-modal="modal"
                              data-modal-id="#quick-look"
                              data-tooltip="tooltip"
                              data-placement="top"
                              title="Quick View"
                              ><i class="fas fa-search-plus"></i
                            ></a>
                          </li>
                          <li>
                            <a
                              data-modal="modal"
                              data-modal-id="#add-to-cart"
                              data-tooltip="tooltip"
                              data-placement="top"
                              title="Add to Cart"
                              ><i class="fas fa-plus-circle"></i
                            ></a>
                          </li>
                          <li>
                            <a
                              href="signin.html"
                              data-tooltip="tooltip"
                              data-placement="top"
                              title="Add to Wishlist"
                              ><i class="fas fa-heart"></i
                            ></a>
                          </li>
                          <li>
                            <a
                              href="signin.html"
                              data-tooltip="tooltip"
                              data-placement="top"
                              title="Email me When the price drops"
                              ><i class="fas fa-envelope"></i
                            ></a>
                          </li>
                        </ul>
                      </div>
                    </div>

                    <span class="product-o__category">
                      <a href="shop-side-version-2.html">Electronics</a></span
                    >

                    <span class="product-o__name">
                      <a href="product-detail.html"
                        >DJI Phantom Drone 4k</a
                      ></span
                    >
                    <div class="product-o__rating gl-rating-style">
                      <i class="fas fa-star"></i><i class="fas fa-star"></i
                      ><i class="fas fa-star"></i><i class="fas fa-star"></i
                      ><i class="fas fa-star"></i>

                      <span class="product-o__review">(2)</span>
                    </div>

                    <span class="product-o__price"
                      >$125.00

                      <span class="product-o__discount">$160.00</span></span
                    >
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 u-s-m-b-30">
                  <div
                    class="product-o product-o--radius product-o--hover-off u-h-100"
                  >
                    <div class="product-o__wrap">
                      <a
                        class="aspect aspect--bg-grey aspect--square u-d-block"
                        href="product-detail.html"
                      >
                        <img
                          class="aspect__img"
                          src="images/product/electronic/product12.jpg"
                          alt=""
                      /></a>
                      <div class="product-o__special-count-wrap">
                        <div
                          class="countdown countdown--style-special"
                          data-countdown="2020/05/01"
                        ></div>
                      </div>
                      <div class="product-o__action-wrap">
                        <ul class="product-o__action-list">
                          <li>
                            <a
                              data-modal="modal"
                              data-modal-id="#quick-look"
                              data-tooltip="tooltip"
                              data-placement="top"
                              title="Quick View"
                              ><i class="fas fa-search-plus"></i
                            ></a>
                          </li>
                          <li>
                            <a
                              data-modal="modal"
                              data-modal-id="#add-to-cart"
                              data-tooltip="tooltip"
                              data-placement="top"
                              title="Add to Cart"
                              ><i class="fas fa-plus-circle"></i
                            ></a>
                          </li>
                          <li>
                            <a
                              href="signin.html"
                              data-tooltip="tooltip"
                              data-placement="top"
                              title="Add to Wishlist"
                              ><i class="fas fa-heart"></i
                            ></a>
                          </li>
                          <li>
                            <a
                              href="signin.html"
                              data-tooltip="tooltip"
                              data-placement="top"
                              title="Email me When the price drops"
                              ><i class="fas fa-envelope"></i
                            ></a>
                          </li>
                        </ul>
                      </div>
                    </div>

                    <span class="product-o__category">
                      <a href="shop-side-version-2.html">Electronics</a></span
                    >

                    <span class="product-o__name">
                      <a href="product-detail.html"
                        >DJI Phantom Drone 2k</a
                      ></span
                    >
                    <div class="product-o__rating gl-rating-style">
                      <i class="fas fa-star"></i><i class="fas fa-star"></i
                      ><i class="fas fa-star"></i><i class="fas fa-star"></i
                      ><i class="fas fa-star"></i>

                      <span class="product-o__review">(2)</span>
                    </div>

                    <span class="product-o__price"
                      >$125.00

                      <span class="product-o__discount">$160.00</span></span
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 3 ======-->

        <!--====== Section 4 ======-->
        <div class="u-s-p-b-60">
          <!--====== Section Intro ======-->
          <div class="section__intro u-s-m-b-46">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="section__text-wrap">
                    <h1 class="section__heading u-c-secondary u-s-m-b-12">
                      NEW ARRIVALS
                    </h1>

                    <span class="section__span u-c-silver"
                      >GET UP FOR NEW ARRIVALS</span
                    >
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
                        <a
                          class="aspect aspect--bg-grey aspect--square u-d-block"
                          href="product-detail.html"
                        >
                          <img
                            class="aspect__img"
                            src="images/product/electronic/product13.jpg"
                            alt=""
                        /></a>
                        <div class="product-o__action-wrap">
                          <ul class="product-o__action-list">
                            <li>
                              <a
                                data-modal="modal"
                                data-modal-id="#quick-look"
                                data-tooltip="tooltip"
                                data-placement="top"
                                title="Quick View"
                                ><i class="fas fa-search-plus"></i
                              ></a>
                            </li>
                            <li>
                              <a
                                data-modal="modal"
                                data-modal-id="#add-to-cart"
                                data-tooltip="tooltip"
                                data-placement="top"
                                title="Add to Cart"
                                ><i class="fas fa-plus-circle"></i
                              ></a>
                            </li>
                            <li>
                              <a
                                href="signin.html"
                                data-tooltip="tooltip"
                                data-placement="top"
                                title="Add to Wishlist"
                                ><i class="fas fa-heart"></i
                              ></a>
                            </li>
                            <li>
                              <a
                                href="signin.html"
                                data-tooltip="tooltip"
                                data-placement="top"
                                title="Email me When the price drops"
                                ><i class="fas fa-envelope"></i
                              ></a>
                            </li>
                          </ul>
                        </div>
                      </div>

                      <span class="product-o__category">
                        <a href="shop-side-version-2.html">Electronics</a></span
                      >

                      <span class="product-o__name">
                        <a href="product-detail.html"
                          >Nikon DSLR 4K Camera</a
                        ></span
                      >
                      <div class="product-o__rating gl-rating-style">
                        <i class="far fa-star"></i><i class="far fa-star"></i
                        ><i class="far fa-star"></i><i class="far fa-star"></i
                        ><i class="far fa-star"></i>

                        <span class="product-o__review">(0)</span>
                      </div>

                      <span class="product-o__price"
                        >$125.00

                        <span class="product-o__discount">$160.00</span></span
                      >
                    </div>
                  </div>
                  <div class="u-s-m-b-30">
                    <div class="product-o product-o--hover-on">
                      <div class="product-o__wrap">
                        <a
                          class="aspect aspect--bg-grey aspect--square u-d-block"
                          href="product-detail.html"
                        >
                          <img
                            class="aspect__img"
                            src="images/product/electronic/product14.jpg"
                            alt=""
                        /></a>
                        <div class="product-o__action-wrap">
                          <ul class="product-o__action-list">
                            <li>
                              <a
                                data-modal="modal"
                                data-modal-id="#quick-look"
                                data-tooltip="tooltip"
                                data-placement="top"
                                title="Quick View"
                                ><i class="fas fa-search-plus"></i
                              ></a>
                            </li>
                            <li>
                              <a
                                data-modal="modal"
                                data-modal-id="#add-to-cart"
                                data-tooltip="tooltip"
                                data-placement="top"
                                title="Add to Cart"
                                ><i class="fas fa-plus-circle"></i
                              ></a>
                            </li>
                            <li>
                              <a
                                href="signin.html"
                                data-tooltip="tooltip"
                                data-placement="top"
                                title="Add to Wishlist"
                                ><i class="fas fa-heart"></i
                              ></a>
                            </li>
                            <li>
                              <a
                                href="signin.html"
                                data-tooltip="tooltip"
                                data-placement="top"
                                title="Email me When the price drops"
                                ><i class="fas fa-envelope"></i
                              ></a>
                            </li>
                          </ul>
                        </div>
                      </div>

                      <span class="product-o__category">
                        <a href="shop-side-version-2.html">Electronics</a></span
                      >

                      <span class="product-o__name">
                        <a href="product-detail.html"
                          >Nikon DSLR 2K Camera</a
                        ></span
                      >
                      <div class="product-o__rating gl-rating-style">
                        <i class="far fa-star"></i><i class="far fa-star"></i
                        ><i class="far fa-star"></i><i class="far fa-star"></i
                        ><i class="far fa-star"></i>

                        <span class="product-o__review">(0)</span>
                      </div>

                      <span class="product-o__price"
                        >$125.00

                        <span class="product-o__discount">$160.00</span></span
                      >
                    </div>
                  </div>
                  <div class="u-s-m-b-30">
                    <div class="product-o product-o--hover-on">
                      <div class="product-o__wrap">
                        <a
                          class="aspect aspect--bg-grey aspect--square u-d-block"
                          href="product-detail.html"
                        >
                          <img
                            class="aspect__img"
                            src="images/product/electronic/product15.jpg"
                            alt=""
                        /></a>
                        <div class="product-o__action-wrap">
                          <ul class="product-o__action-list">
                            <li>
                              <a
                                data-modal="modal"
                                data-modal-id="#quick-look"
                                data-tooltip="tooltip"
                                data-placement="top"
                                title="Quick View"
                                ><i class="fas fa-search-plus"></i
                              ></a>
                            </li>
                            <li>
                              <a
                                data-modal="modal"
                                data-modal-id="#add-to-cart"
                                data-tooltip="tooltip"
                                data-placement="top"
                                title="Add to Cart"
                                ><i class="fas fa-plus-circle"></i
                              ></a>
                            </li>
                            <li>
                              <a
                                href="signin.html"
                                data-tooltip="tooltip"
                                data-placement="top"
                                title="Add to Wishlist"
                                ><i class="fas fa-heart"></i
                              ></a>
                            </li>
                            <li>
                              <a
                                href="signin.html"
                                data-tooltip="tooltip"
                                data-placement="top"
                                title="Email me When the price drops"
                                ><i class="fas fa-envelope"></i
                              ></a>
                            </li>
                          </ul>
                        </div>
                      </div>

                      <span class="product-o__category">
                        <a href="shop-side-version-2.html">Electronics</a></span
                      >

                      <span class="product-o__name">
                        <a href="product-detail.html"
                          >Sony DSLR 4K Camera</a
                        ></span
                      >
                      <div class="product-o__rating gl-rating-style">
                        <i class="far fa-star"></i><i class="far fa-star"></i
                        ><i class="far fa-star"></i><i class="far fa-star"></i
                        ><i class="far fa-star"></i>

                        <span class="product-o__review">(0)</span>
                      </div>

                      <span class="product-o__price"
                        >$125.00

                        <span class="product-o__discount">$160.00</span></span
                      >
                    </div>
                  </div>
                  <div class="u-s-m-b-30">
                    <div class="product-o product-o--hover-on">
                      <div class="product-o__wrap">
                        <a
                          class="aspect aspect--bg-grey aspect--square u-d-block"
                          href="product-detail.html"
                        >
                          <img
                            class="aspect__img"
                            src="images/product/electronic/product16.jpg"
                            alt=""
                        /></a>
                        <div class="product-o__action-wrap">
                          <ul class="product-o__action-list">
                            <li>
                              <a
                                data-modal="modal"
                                data-modal-id="#quick-look"
                                data-tooltip="tooltip"
                                data-placement="top"
                                title="Quick View"
                                ><i class="fas fa-search-plus"></i
                              ></a>
                            </li>
                            <li>
                              <a
                                data-modal="modal"
                                data-modal-id="#add-to-cart"
                                data-tooltip="tooltip"
                                data-placement="top"
                                title="Add to Cart"
                                ><i class="fas fa-plus-circle"></i
                              ></a>
                            </li>
                            <li>
                              <a
                                href="signin.html"
                                data-tooltip="tooltip"
                                data-placement="top"
                                title="Add to Wishlist"
                                ><i class="fas fa-heart"></i
                              ></a>
                            </li>
                            <li>
                              <a
                                href="signin.html"
                                data-tooltip="tooltip"
                                data-placement="top"
                                title="Email me When the price drops"
                                ><i class="fas fa-envelope"></i
                              ></a>
                            </li>
                          </ul>
                        </div>
                      </div>

                      <span class="product-o__category">
                        <a href="shop-side-version-2.html">Electronics</a></span
                      >

                      <span class="product-o__name">
                        <a href="product-detail.html"
                          >Sony DSLR 2K Camera</a
                        ></span
                      >
                      <div class="product-o__rating gl-rating-style">
                        <i class="far fa-star"></i><i class="far fa-star"></i
                        ><i class="far fa-star"></i><i class="far fa-star"></i
                        ><i class="far fa-star"></i>

                        <span class="product-o__review">(0)</span>
                      </div>

                      <span class="product-o__price"
                        >$125.00

                        <span class="product-o__discount">$160.00</span></span
                      >
                    </div>
                  </div>
                  <div class="u-s-m-b-30">
                    <div class="product-o product-o--hover-on">
                      <div class="product-o__wrap">
                        <a
                          class="aspect aspect--bg-grey aspect--square u-d-block"
                          href="product-detail.html"
                        >
                          <img
                            class="aspect__img"
                            src="images/product/electronic/product17.jpg"
                            alt=""
                        /></a>
                        <div class="product-o__action-wrap">
                          <ul class="product-o__action-list">
                            <li>
                              <a
                                data-modal="modal"
                                data-modal-id="#quick-look"
                                data-tooltip="tooltip"
                                data-placement="top"
                                title="Quick View"
                                ><i class="fas fa-search-plus"></i
                              ></a>
                            </li>
                            <li>
                              <a
                                data-modal="modal"
                                data-modal-id="#add-to-cart"
                                data-tooltip="tooltip"
                                data-placement="top"
                                title="Add to Cart"
                                ><i class="fas fa-plus-circle"></i
                              ></a>
                            </li>
                            <li>
                              <a
                                href="signin.html"
                                data-tooltip="tooltip"
                                data-placement="top"
                                title="Add to Wishlist"
                                ><i class="fas fa-heart"></i
                              ></a>
                            </li>
                            <li>
                              <a
                                href="signin.html"
                                data-tooltip="tooltip"
                                data-placement="top"
                                title="Email me When the price drops"
                                ><i class="fas fa-envelope"></i
                              ></a>
                            </li>
                          </ul>
                        </div>
                      </div>

                      <span class="product-o__category">
                        <a href="shop-side-version-2.html">Electronics</a></span
                      >

                      <span class="product-o__name">
                        <a href="product-detail.html"
                          >Canon DSLR 4K Camera</a
                        ></span
                      >
                      <div class="product-o__rating gl-rating-style">
                        <i class="far fa-star"></i><i class="far fa-star"></i
                        ><i class="far fa-star"></i><i class="far fa-star"></i
                        ><i class="far fa-star"></i>

                        <span class="product-o__review">(0)</span>
                      </div>

                      <span class="product-o__price"
                        >$125.00

                        <span class="product-o__discount">$160.00</span></span
                      >
                    </div>
                  </div>
                  <div class="u-s-m-b-30">
                    <div class="product-o product-o--hover-on">
                      <div class="product-o__wrap">
                        <a
                          class="aspect aspect--bg-grey aspect--square u-d-block"
                          href="product-detail.html"
                        >
                          <img
                            class="aspect__img"
                            src="images/product/electronic/product18.jpg"
                            alt=""
                        /></a>
                        <div class="product-o__action-wrap">
                          <ul class="product-o__action-list">
                            <li>
                              <a
                                data-modal="modal"
                                data-modal-id="#quick-look"
                                data-tooltip="tooltip"
                                data-placement="top"
                                title="Quick View"
                                ><i class="fas fa-search-plus"></i
                              ></a>
                            </li>
                            <li>
                              <a
                                data-modal="modal"
                                data-modal-id="#add-to-cart"
                                data-tooltip="tooltip"
                                data-placement="top"
                                title="Add to Cart"
                                ><i class="fas fa-plus-circle"></i
                              ></a>
                            </li>
                            <li>
                              <a
                                href="signin.html"
                                data-tooltip="tooltip"
                                data-placement="top"
                                title="Add to Wishlist"
                                ><i class="fas fa-heart"></i
                              ></a>
                            </li>
                            <li>
                              <a
                                href="signin.html"
                                data-tooltip="tooltip"
                                data-placement="top"
                                title="Email me When the price drops"
                                ><i class="fas fa-envelope"></i
                              ></a>
                            </li>
                          </ul>
                        </div>
                      </div>

                      <span class="product-o__category">
                        <a href="shop-side-version-2.html">Electronics</a></span
                      >

                      <span class="product-o__name">
                        <a href="product-detail.html"
                          >Canon DSLR 2K Camera</a
                        ></span
                      >
                      <div class="product-o__rating gl-rating-style">
                        <i class="far fa-star"></i><i class="far fa-star"></i
                        ><i class="far fa-star"></i><i class="far fa-star"></i
                        ><i class="far fa-star"></i>

                        <span class="product-o__review">(0)</span>
                      </div>

                      <span class="product-o__price"
                        >$125.00

                        <span class="product-o__discount">$160.00</span></span
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 4 ======-->

        <!--====== Section 11 ======-->
        <div class="u-s-p-b-90 u-s-m-b-30">
          <!--====== Section Intro ======-->
          <div class="section__intro u-s-m-b-46">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="section__text-wrap">
                    <h1 class="section__heading u-c-secondary u-s-m-b-12">
                      CLIENTS FEEDBACK
                    </h1>

                    <span class="section__span u-c-silver"
                      >WHAT OUR CLIENTS SAY</span
                    >
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
                      <img
                        class="testimonial__img"
                        src="images/about/test-1.jpg"
                        alt=""
                      />
                    </div>
                    <div class="testimonial__content-wrap">
                      <span class="testimonial__double-quote"
                        ><i class="fas fa-quote-right"></i
                      ></span>
                      <blockquote class="testimonial__block-quote">
                        <p>
                          "Far far away, behind the word mountains, far from the
                          countries Vokalia and Consonantia, there live the
                          blind texts. Separated they live in Bookmarksgrove
                          right at the coast of the Semantics, a large language
                          ocean."
                        </p>
                      </blockquote>

                      <span class="testimonial__author"
                        >John D. / DVNTR Inc.</span
                      >
                    </div>
                  </div>
                  <div class="testimonial">
                    <div class="testimonial__img-wrap">
                      <img
                        class="testimonial__img"
                        src="images/about/test-2.jpg"
                        alt=""
                      />
                    </div>
                    <div class="testimonial__content-wrap">
                      <span class="testimonial__double-quote"
                        ><i class="fas fa-quote-right"></i
                      ></span>
                      <blockquote class="testimonial__block-quote">
                        <p>
                          "Far far away, behind the word mountains, far from the
                          countries Vokalia and Consonantia, there live the
                          blind texts. Separated they live in Bookmarksgrove
                          right at the coast of the Semantics, a large language
                          ocean."
                        </p>
                      </blockquote>

                      <span class="testimonial__author"
                        >John D. / DVNTR Inc.</span
                      >
                    </div>
                  </div>
                  <div class="testimonial">
                    <div class="testimonial__img-wrap">
                      <img
                        class="testimonial__img"
                        src="images/about/test-3.jpg"
                        alt=""
                      />
                    </div>
                    <div class="testimonial__content-wrap">
                      <span class="testimonial__double-quote"
                        ><i class="fas fa-quote-right"></i
                      ></span>
                      <blockquote class="testimonial__block-quote">
                        <p>
                          "Far far away, behind the word mountains, far from the
                          countries Vokalia and Consonantia, there live the
                          blind texts. Separated they live in Bookmarksgrove
                          right at the coast of the Semantics, a large language
                          ocean."
                        </p>
                      </blockquote>

                      <span class="testimonial__author"
                        >John D. / DVNTR Inc.</span
                      >
                    </div>
                  </div>
                  <div class="testimonial">
                    <div class="testimonial__img-wrap">
                      <img
                        class="testimonial__img"
                        src="images/about/test-4.jpg"
                        alt=""
                      />
                    </div>
                    <div class="testimonial__content-wrap">
                      <span class="testimonial__double-quote"
                        ><i class="fas fa-quote-right"></i
                      ></span>
                      <blockquote class="testimonial__block-quote">
                        <p>
                          "Far far away, behind the word mountains, far from the
                          countries Vokalia and Consonantia, there live the
                          blind texts. Separated they live in Bookmarksgrove
                          right at the coast of the Semantics, a large language
                          ocean."
                        </p>
                      </blockquote>

                      <span class="testimonial__author"
                        >John D. / DVNTR Inc.</span
                      >
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
      <footer><?php include 'footer.php' ;?></footer>
     

                
    <!--====== End - Main App ======-->

    <!--====== Google Analytics: change UA-XXXXX-Y to be your site's ID ======-->

    <!--====== Vendor Js ======-->
    <script src="js/vendor.js"></script>

    <!--====== jQuery Shopnav plugin ======-->
    <script src="js/jquery.shopnav.js"></script>

    <!--====== App ======-->
    <script src="js/app.js"></script>

    <!-- footer section end  -->
    <a href="#" class="back-to-top" id="backToTop" onclick="topFunction()">
    <img src="back-to-top.png" alt="Back to Top" class="icon-image">
</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous">

// Get the button
const mybutton = document.getElementById("backToTop");

function scrollFunction() {
    
    if (document.documentElement.scrollHeight > window.innerHeight) {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    } else {
        mybutton.style.display = "none";
    }
}

function topFunction() {
    document.body.scrollTop = 0; 
    document.documentElement.scrollTop = 0; 
}


window.onscroll = function() {scrollFunction()};
    
    </script>
        
</body>

</html>