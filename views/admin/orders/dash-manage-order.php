<?php

include('views/partials/header_admin.php');

?>

<!--====== App Content ======-->

<!--====== End - Section 1 ======-->


<!--====== Section 2 ======-->
<div class="u-s-p-b-60">

    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="dash">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-12">

                        <!--====== Dashboard Features ======-->
                        <?php
                        include('views/admin/dashboard_features.php');
                        ?>
                        <!--====== End - Dashboard Features ======-->
                    </div>
                    <div class="col-lg-9 col-md-12">
                        <h1 class="dash__h1 u-s-m-b-30">Order Details</h1>
                        <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                            <div class="dash__pad-2">
                                <div class="dash-l-r">
                                    <div>
                                        <div class="manage-o__text-2 u-c-secondary">Order
                                            #<?php echo $orders[0]['order_id'] ?></div>
                                        <div class="manage-o__text u-c-silver">Placed on
                                            <?php echo $orders[0]['created_at'] ?>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="manage-o__text-2 u-c-silver">Total:

                                            <span
                                                class="manage-o__text-2 u-c-secondary">$<?php echo $orders[0]['order_total_amount_after'] ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                            <div class="dash__pad-2">
                                <div class="manage-o">
                                    <div class="manage-o__header u-s-m-b-30">

                                    </div>
                                    <div class="dash-l-r">
                                        <div class="manage-o__text u-c-secondary">Delivered on 26 Oct 2016</div>
                                        <div class="manage-o__icon" style="display:flex;align-items:center;"><i
                                                class="fas fa-truck u-s-m-r-5" style="padding:10px"></i>

                                            <form method="GET" action="/order-status" id="categoryForm">
                                                <input type='text' value='<?= $orders[0]['order_id'] ?>' name='id'
                                                    style='visibility: hidden; display: none;'>
                                                <select class="select-box select-box--primary-style"
                                                    style="border-radius:6px; <?= 'cancelled' == $orders[0]['order_status'] ? 'background-color:red;' : '' ?>"
                                                    name="status" id="categoryFilter"
                                                    onchange="handleStatusChange(this)">
                                                    <option value="cancelled" <?= 'cancelled' == $orders[0]['order_status'] ? 'selected' : '' ?>>Cancelled</option>
                                                    <option value="processing"
                                                        <?= 'processing' == $orders[0]['order_status'] ? 'selected' : '' ?>>Processing</option>
                                                    <option value="shipped" <?= 'shipped' == $orders[0]['order_status'] ? 'selected' : '' ?>>Shipped</option>
                                                    <option value="delivered" <?= 'delivered' == $orders[0]['order_status'] ? 'selected' : '' ?>>Delivered</option>
                                                </select>
                                            </form>
                                            <?php
                                            // var_dump($_SESSION);
                                            ?>
                                            <!-- Modal for Cancellation Reason -->
                                            <div id="cancelReasonModal" style="display: none; 
                                    position: fixed; 
                                    top: 50%; 
                                    left: 50%; 
                                    transform: translate(-50%, -50%); 
                                    background-color: #ffffff; 
                                    padding: 30px; 
                                    border-radius: 12px; 
                                    width: 400px; 
                                    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2); 
                                    z-index: 1000; 
                                    font-family: Arial, sans-serif;">

                                                <h3 style="margin-bottom: 20px; font-size: 20px; color: #333;">Why do
                                                    you want to cancel?</h3>
                                                <form id="cancelReasonForm" action="/cancel" method="GET">
                                                    <label style="display: block; margin-bottom: 10px;">
                                                        <input type="radio" name="reason" value="Changed my mind"
                                                            style="margin-right: 8px;">
                                                        Changed my mind
                                                    </label>
                                                    <label style="display: block; margin-bottom: 10px;">
                                                        <input type="radio" name="reason" value="Found a better price"
                                                            style="margin-right: 8px;">
                                                        Found a better price
                                                    </label>
                                                    <label style="display: block; margin-bottom: 10px;">
                                                        <input type="radio" name="reason" value="Delivery time too long"
                                                            style="margin-right: 8px;">
                                                        Delivery time too long
                                                    </label>
                                                    <label style="display: block; margin-bottom: 10px;">
                                                        <input type="radio" name="reason" value="Other"
                                                            onclick="showOtherReasonInput()" style="margin-right: 8px;">
                                                        Other
                                                    </label>
                                                    <input type="text" id="otherReasonInput" name="other_reason"
                                                        placeholder="Please specify..." style="display: none; 
               margin-top: 10px; 
               width: 100%; 
               padding: 8px; 
               border: 1px solid #ccc; 
               border-radius: 4px; 
               font-size: 14px;">
                                                    <div style="margin-top: 20px; text-align: right;">
                                                        <button type="button" onclick="submitCancellation()" style="background-color: #007BFF; 
                           color: white; 
                           padding: 8px 16px; 
                           border: none; 
                           border-radius: 4px; 
                           cursor: pointer; 
                           margin-right: 10px;">
                                                            Submit
                                                        </button>
                                                        <button type="button" onclick="closeModal()" style="background-color: #6c757d; 
                           color: white; 
                           padding: 8px 16px; 
                           border: none; 
                           border-radius: 4px; 
                           cursor: pointer;">
                                                            Close
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="manage-o__timeline">
                                        <?php
                                        $finish1 = '';
                                        $finish2 = '';
                                        $finish3 = '';
                                        if ($orders[0]['order_status'] == 'processing') {
                                            $finish1 = 'timeline-l-i--finish';
                                        } else if ($orders[0]['order_status'] == 'shipped') {
                                            $finish1 = 'timeline-l-i--finish';
                                            $finish2 = 'timeline-l-i--finish';
                                        } else if ($orders[0]['order_status'] == 'delivered') {
                                            $finish1 = 'timeline-l-i--finish';
                                            $finish2 = 'timeline-l-i--finish';
                                            $finish3 = 'timeline-l-i--finish';
                                        }
                                        ;
                                        ?>
                                        <div class="timeline-row">
                                            <div class="col-lg-4 u-s-m-b-30">
                                                <div class="timeline-step">
                                                    <?php
                                                    echo "<div class='timeline-l-i " . $finish1 . "'>"
                                                        ?>
                                                    <span class="timeline-circle"></span>
                                                </div>

                                                <span class="timeline-text">Processing</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 u-s-m-b-30">
                                            <div class="timeline-step">
                                                <?php
                                                echo "<div class='timeline-l-i " . $finish2 . "'>"
                                                    ?>

                                                <span class="timeline-circle"></span>
                                            </div>

                                            <span class="timeline-text">Shipped</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 u-s-m-b-30">
                                        <div class="timeline-step">
                                            <?php
                                            echo "<div class='timeline-l-i " . $finish3 . "'>"
                                                ?>

                                            <span class="timeline-circle"></span>
                                        </div>

                                        <span class="timeline-text">Delivered</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        foreach ($orders as $items) {
                            // var_dump($items);
                            //     die();
                            echo "  <div class='manage-o__description' style='padding-top:20px'>
                                    <div class='description__container'>

                                    <div class='description-title'>" . $items['product_name'] . "</div>
                                    </div>
                                    <div class='description__info-wrap'>
                                    <div>

                                    <span class='manage-o__text-2 u-c-silver'>Quantity:

                                    <span class='manage-o__text-2 u-c-secondary'>" . $items['quantity'] . "</span></span></div>
                                    <div>

                                    <span class='manage-o__text-2 u-c-silver'>Total:

                                    <span class='manage-o__text-2 u-c-secondary'>$" . $items['quantity'] * $items['product_price'] . "</span></span></div>
                                    </div>
                                    </div>";
                        }
                        ?>
                        <!--  -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="dash__box dash__box--bg-white dash__box--shadow u-s-m-b-30">
                        <div class="dash__pad-3">
                            <h2 class="dash__h2 u-s-m-b-8">Shipping Address</h2>
                            <h2 class="dash__h2 u-s-m-b-8"><?php echo $orders[0]['customer_name'] ?></h2>

                            <span class="dash__text-2"><?php echo $orders[0]['customer_phone'] ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="dash__box dash__box--bg-white dash__box--shadow u-h-100">
                        <div class="dash__pad-3">
                            <h2 class="dash__h2 u-s-m-b-8">Total Summary</h2>
                            <div class="dash-l-r u-s-m-b-8">
                                <div class="manage-o__text-2 u-c-secondary">Subtotal</div>
                                <div class="manage-o__text-2 u-c-secondary">
                                    $<?php echo $orders[0]['order_total_amount'] ?>.0</div>
                            </div>
                            
                            <div class="dash-l-r u-s-m-b-8">
                                <div class="manage-o__text-2 u-c-secondary"><span class="dash__text-2">Paid by Cash on
                                        Delivery</span></div>
                                <div class="manage-o__text-2 u-c-secondary">
                                    <!-- <form class="dash-address" action="" method="">
                                                                <button class="btn " type="submit">Cancel</button>
                                                            </form> -->
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
<!--====== End - Section Content ======-->
</div>
<!--====== End - Section 2 ======-->
</div>
<!--====== End - App Content ======-->

<script>
function handleStatusChange() {
    const selectElement = document.getElementById('categoryFilter');
    const selectedValue = selectElement.value;
    const options = selectElement.options;

    // Reset the disabled property for all options
    for (let i = 0; i < options.length; i++) {
        options[i].disabled = false;
    }

    // Apply the specific disabling logic based on the selected value
    if (selectedValue === 'cancelled') {
        for (let i = 0; i < options.length; i++) {
            if (options[i].value !== 'cancelled') {
                options[i].disabled = true; // Disable other options
            }
        }
    } else if (selectedValue === 'shipped') {
        for (let i = 0; i < options.length; i++) {
            if (options[i].value === 'cancelled' || options[i].value === 'processing') {
                options[i].disabled = true; // Disable 'cancelled' and 'processing'
            }
        }
    } else if (selectedValue === 'delivered') {
        for (let i = 0; i < options.length; i++) {
            if (options[i].value !== 'delivered') {
                options[i].disabled = true; // Disable all except 'delivered'
            }
        }
    }
}
</script>
<script>
    function handleStatusChange(selectElement) {
        if (selectElement.value === 'cancelled') {
            document.getElementById('cancelReasonModal').style.display = 'block';
        } else {
            selectElement.form.submit();
        }
    }

    function showOtherReasonInput() {
        document.getElementById('otherReasonInput').style.display = 'block';
    }

    function submitCancellation() {
        const reasonForm = document.getElementById('cancelReasonForm');
        const selectedReason = reasonForm.querySelector('input[name="reason"]:checked');
        const otherReasonInput = document.getElementById('otherReasonInput');

        if (selectedReason) {
            if (selectedReason.value === 'Other' && otherReasonInput.value.trim() === '') {
                alert('Please specify your reason for cancellation.');
                return;
            }

            // Add the reason or custom input to the form as a hidden input
            const reasonInput = document.createElement('input');
            reasonInput.type = 'hidden';
            reasonInput.name = 'cancel_reason';
            reasonInput.value = selectedReason.value === 'Other' ? otherReasonInput.value : selectedReason.value;
            document.getElementById('categoryForm').appendChild(reasonInput);

            // Hide the modal and submit the form
            document.getElementById('cancelReasonModal').style.display = 'none';
            document.getElementById('categoryForm').submit();
        } else {
            alert('Please select a reason for cancellation.');
        }
    }

    function closeModal() {
        document.getElementById('cancelReasonModal').style.display = 'none';
        document.getElementById('otherReasonInput').style.display = 'none'; // Reset other input display
    }
</script>
<!--====== Main Footer ======-->
<?php
include('views/partials/footer_admin.php');
?>