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

                                                    <a href="/coupons">Coupons</a></li>
                                                <li>

                                                    <a href="dash-orders.php">Orders</a></li>
                                                <!-- <li>

                                                    <a href="dash-payment-option.html">My Payment Options</a></li>
                                                <li>

                                                    <a href="dash-cancellation.html">My Returns & Cancellations</a></li> -->
                                            </ul>
                                        </div>
                                    </div>
                                   