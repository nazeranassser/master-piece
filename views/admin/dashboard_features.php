<div class="dash__box dash__box--bg-white dash__box--shadow u-s-m-b-30">
                                        <div class="dash__pad-1">

                                            <span class="dash__text u-s-m-b-16">Hello, John Doe</span>
                                            <ul class="dash__f-list">
                                                <li>

                                                    <a href="dash">Dashboard</a></li>
                                                <li>

                                                    <a href="products">Products</a></li>
                                                    <?php 
                                                    if($_SESSION['is_super']==1){ echo'
                                                <li>

                                                    <a class="dash-active" href="admins">Admins</a></li>';}?>
                                                <li>

                                                    <a href="dash-coupons.php">Coupons</a></li>
                                                <li>

                                                    <a href="dash-orders.php">Orders</a></li>
                                                <!-- <li>

                                                    <a href="dash-payment-option.html">My Payment Options</a></li>
                                                <li>

                                                    <a href="dash-cancellation.html">My Returns & Cancellations</a></li> -->
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="dash__box dash__box--bg-white dash__box--shadow dash__box--w">
                                        <div class="dash__pad-1">
                                            <ul class="dash__w-list">
                                                <li>
                                                    <div class="dash__w-wrap">

                                                        <span class="dash__w-icon dash__w-icon-style-2"><i class="fas fa-cart-arrow-down"></i></span>

                                                        <span class="dash__w-text"><?= $_SESSION['processing']?></span>

                                                        <span class="dash__w-name">Orders Placed</span></div>
                                                </li>
                                                <li>
                                                    <div class="dash__w-wrap">

                                                        <span class="dash__w-icon dash__w-icon-style-1"><i class="fas fa-times"></i></span>

                                                        <span class="dash__w-text"><?= $_SESSION['cancelled']?></span>

                                                        <span class="dash__w-name">Cancel Orders</span></div>
                                                </li>
                                                <li>
                                                    <div class="dash__w-wrap">

                                                        <span class="dash__w-icon dash__w-icon-style-3"><i class="far fa-heart"></i></span>

                                                        <span class="dash__w-text"><?= $_SESSION['delivered']?></span>

                                                        <span class="dash__w-name">Delivered Orders</span></div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>