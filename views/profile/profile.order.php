<?php include('views/partials/header.php') ?> 

<link rel="stylesheet" href="public/css/app.css">

 
        <div class="app-content">

    <div id="app">
        <div class="app-content">
            <div class="u-s-p-y-60">
                <div class="section__content">
                    <div class="container">
                        <div class="breadcrumb">
                            <div class="breadcrumb__wrap">
                                <ul class="breadcrumb__list">
                                    <li class="has-separator">

                                        <a href="index.html">Home</a></li>
                                    <li class="is-marked">

                                        <a href="dash-my-order.html">My Account</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="u-s-p-b-60">
                <div class="section__content">
                    <div class="dash">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3 col-md-12">
                                    <div class="dash__box dash__box--bg-white dash__box--shadow u-s-m-b-30">
                                        <div class="dash__pad-1">

                                        <span><?php echo $_SESSION['usersName'];?></span>
                                        <ul class="dash__f-list">
                                                <li>

                                                    <a href="dashboard.">Manage My Account</a></li>
                                                <li>

                                                    <a href="profile-main">My Profile</a></li>
                                                
                                                
                                                <li>

                                                    <a class="dash-active" href="profile-order">My Orders</a></li>
                                        
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="dash__box dash__box--bg-white dash__box--shadow dash__box--w">
                                        <div class="dash__pad-1">
                                            <ul class="dash__w-list">
                                                <li>
                                                    <div class="dash__w-wrap">

                                                        <span class="dash__w-icon dash__w-icon-style-1"><i class="fas fa-cart-arrow-down"></i></span>

                                                        <span class="dash__w-text">4</span>

                                                        <span class="dash__w-name">Orders Placed</span></div>
                                                </li>
                                                <li>
                                                    <div class="dash__w-wrap">

                                                        <span class="dash__w-icon dash__w-icon-style-2"><i class="fas fa-times"></i></span>

                                                        <span class="dash__w-text">0</span>

                                                        <span class="dash__w-name">Cancel Orders</span></div>
                                                </li>
                                                <li>
                                                    <div class="dash__w-wrap">

                                                        <span class="dash__w-icon dash__w-icon-style-3"><i class="far fa-heart"></i></span>

                                                        <span class="dash__w-text">0</span>

                                                        <span class="dash__w-name">Wishlist</span></div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-12">
                                    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                        <div class="dash__pad-2">
                                            <h1 class="dash__h1 u-s-m-b-14">My Orders</h1>

                                            <span class="dash__text u-s-m-b-30">Here you can see all products that have been delivered.</span>
                                            <form class="m-order u-s-m-b-30">
                                                <div class="m-order__select-wrapper">

                                                    <label class="u-s-m-r-8" for="my-order-sort">Show:</label><select class="select-box select-box--primary-style" id="my-order-sort">
                                                        <option selected>Last 5 orders</option>
                                                        <option>Last 15 days</option>
                                                        <option>Last 30 days</option>
                                                        <option>Last 6 months</option>
                                                        <option>Orders placed in 2018</option>
                                                        <option>All Orders</option>
                                                    </select></div>
                                            </form>
                                            
                                            <div class="m-order__list">
                                                <?php if (empty($orders)): ?>
                                                    <p>   no order</p>
                                                <?php else: ?>
                                                    <?php foreach ($orders as $order): 
                                                        $product_names = explode('|', $order['product_names']);
                                                        $product_images = explode('|', $order['product_images']);
                                                        $quantities = explode('|', $order['quantities']);
                                                    ?>
                                                    <div class="m-order__get">
                                                        <div class="manage-o__header u-s-m-b-30">
                                                            <div class="dash-l-r">
                                                                <div>
                                                                    <div class="manage-o__text-2 u-c-secondary"> order <?php echo htmlspecialchars($order['order_ID']); ?></div>
                                                                    <div class="manage-o__text u-c-silver"><?php echo htmlspecialchars($order['created_at']); ?></div>
                                                                </div>
                                                                <div>
                                                                    <div class="dash__link dash__link--brand">
                                                                        <a href="order-details.php?id=<?php echo $order['order_ID']; ?>">detals</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="manage-o__description">
                                                            <div class="description__container">
                                                                <div class="description__img-wrap">
                                                                    <img class="u-img-fluid" src="<?php echo htmlspecialchars($product_images[0]); ?>" alt="<?php echo htmlspecialchars($product_names[0]); ?>">
                                                                </div>
                                                                <div class="description-title"><?php echo htmlspecialchars($product_names[0]); ?> <?php if (count($product_names) > 1) echo '+ ' . (count($product_names) - 1) . '  '; ?></div>
                                                            </div>
                                                            <div class="description__info-wrap">
                                                                <div>
                                                                    <span class="manage-o__badge badge--<?php echo strtolower(htmlspecialchars($order['order_status'])); ?>"><?php echo htmlspecialchars($order['order_status']); ?></span>
                                                                </div>
                                                                <div>
                                                                    <span class="manage-o__text-2 u-c-silver"> Number of products:
                                                                        <span class="manage-o__text-2 u-c-secondary"><?php echo array_sum($quantities); ?></span>
                                                                    </span>
                                                                </div>
                                                                <div>
                                                                    <span class="manage-o__text-2 u-c-silver">total:
                                                                        <span class="manage-o__text-2 u-c-secondary"><?php echo htmlspecialchars($order['order_total_amount_after']); ?></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </div>
                                                
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.ga = function() {
            ga.q.push(arguments)
        };
        ga.q = [];
        ga.l = +new Date;
        ga('create', 'UA-XXXXX-Y', 'auto');
        ga('send', 'pageview')
    </script>
    <script src="https://www.google-analytics.com/analytics.js" async defer></script>
    <script src="js/vendor.js"></script>
    <script src="js/jquery.shopnav.js"></script>
    <script src="js/app.js"></script>
    <noscript>
        <div class="app-setting">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="app-setting__wrap">
                            <h1 class="app-setting__h1">JavaScript is disabled in your browser.</h1>

                            <span class="app-setting__text">Please enable JavaScript in your browser or upgrade to a JavaScript-capable browser.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </noscript>
    <?php include('views/partials/footer.php') ?>  