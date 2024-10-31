
        <!--====== Main Header ======-->
        <?php include '../../views/partials/header.php'; ?>
        <!--====== End - Main Header ======-->

        <!--====== Cart Content ======-->
        <div class="app-content">
            <!--====== Section 1 ======-->
            <!--====== End - Section 1 ======-->

            <!--====== Section 2 ======-->
            <div class="u-s-p-b-60">
                <div class="section__intro u-s-m-b-60">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section__text-wrap">
                                    <h1 class="section__heading u-c-secondary">SHOPPING CART</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cart items dynamically displayed -->
                <div class="section__content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 u-s-m-b-30">
                                <div class="table-responsive">
                                    <table class="table-p">
                                        <tbody>
                                        <?php $cartItems = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
?>
                                                <!-- Loop through cart items -->
    <?php foreach ($cartItems as $productId => $item): ?>
        <tr>
            <td>
                <div class="table-p__box">
                    <div class="table-p__img-wrap">
                        <img class="u-img-fluid" src="<?php echo htmlspecialchars($item['image_url']); ?>" alt="uigsds">
                    </div>
                    <div class="table-p__info">
                        <span class="table-p__name">
                            <a href="product/<?php echo htmlspecialchars($item['product_id']); ?>"><?php echo htmlspecialchars($item['product_name']); ?></a>
                        </span>
                        
                    </div>
                </div>
            </td>
            <td>
                <span class="table-p__price">$<?php echo number_format($item['price'], 2); ?></span>
            </td>
            <td>
                <div class="table-p__input-counter-wrap">
                    <div class="input-counter">
                        <span class="input-counter__minus fas fa-minus"></span>
                        <input class="input-counter__text input-counter--text-primary-style" type="text" value="<?php echo htmlspecialchars($item['quantity']); ?>" min="1" max="$item['quantity']">
                        <span class="input-counter__plus fas fa-plus"></span>
                    </div>
                </div>
            </td>
            <td>
                <div class="table-p__del-wrap">
                    <a class="far fa-trash-alt table-p__delete-link" href="CartController.php?action=removeFromCart&product_id=<?php echo htmlspecialchars($item['product_id']); ?>"></a>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>


                                                
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="route-box">
                                    <div class="route-box__g1">
                                        <a class="route-box__link" href="/">
                                            <i class="fas fa-long-arrow-alt-left"></i><span>CONTINUE SHOPPING</span>
                                        </a>
                                    </div>
                                    <div class="route-box__g2">
                                        <a class="route-box__link" href="clearCart">
                                            <i class="fas fa-trash"></i><span>CLEAR CART</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- End Cart Section -->
        </div>
    </div>
    <footer>
    <?php include '../../views/partials/footer.php'; ?>
    </footer>

<!--====== Vendor Js ======-->
<script src="js/vendor.js"></script>

    
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

                        <span class="app-setting__text">Please enable JavaScript in your browser or upgrade to a JavaScript-capable browser.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</noscript>

</body>
</html>

        
        


  
