<?php require 'views/partials/header.php';

$customer_id = isset($_SESSION['usersId']) ? $_SESSION['usersId'] : null;

?>
<div class="u-s-p-t-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="pd u-s-m-b-30">
                    <div class="slider-fouc pd-wrap">
                        <div id="pd-o-initiate">
                            <div class="pd-o-img-wrap" data-src="<?php echo $product['product_image']; ?>">
                                <img class="u-img-fluid"
                                    src="/public/images/products/<?php echo $product['product_image']; ?>"
                                    alt="Product Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="pd-detail">
                    <div class="pd-detail__inline">
                        <span class="cd-detail__name"><?php echo htmlspecialchars($product['category_name']); ?></span>
                        <div>
                            <span
                                class="pd-detail__name"><?php echo htmlspecialchars($product['product_name']); ?></span>
                        </div>
                        <div>
                            <div class="pd-detail__inline">
                                <span
                                    class="pd-detail__price">$<?php echo number_format($product['product_price'], 2); ?></span>
                            </div>
                        </div>
                        <div class="u-s-m-b-15">
                            <span
                                class="pd-detail__preview-desc"><?php echo htmlspecialchars($product['product_description']); ?></span>
                        </div>

                            <div class="u-s-m-b-15">
                                <a href="/cart/<?= $product['product_id'] ?>">
                                    <button class="btn btn--e-brand-b-2" type="submit">Add to Cart</button>
                                </a>
                                <a href="/favorite/<?= $product['product_id'] ?>">
                                    <button class="btn btn--e-brand-b-2" type="submit">Add to Favorite</button>
                                </a>
                            </div>

                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="u-s-m-t-30">
        <h3>Customer Reviews</h3>

        <!-- Form for submitting a review -->
        <form class="review-form" id="reviewForm" action="/submitReview" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">

            <div class="u-s-m-b-15">
                <label for="review-text">Your Review:</label>
                <textarea id="review-text" name="review_text" required></textarea>
            </div>

            <div class="u-s-m-b-15">
                <label for="review-rating">Rating:</label>
                <div class="star-rating">
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
                <label for="review-image">Upload Image:</label>
                <input type="file" id="review-image" name="review_image" accept="image/*">
            </div>

            <div class="u-s-m-b-15">
                <button type="submit" class="btn btn--e-brand-b-2">Submit Review</button>
            </div>
        </form>


        <h4>Past Reviews</h4>
        <div class="reviews-list">
            <?php
            foreach ($reviews as $review) {
                echo '<div class="review-item">';
                if ($review['review_image']) {
                    echo '<img src="/public/images/reviews/' . htmlspecialchars($review['review_image']) . '" alt="Review Image" class="review-image">';
                }
                echo '<div class="customer-name">' . htmlspecialchars($review['customer_name']) . '</div>';
                echo '<div class="review-text">' . htmlspecialchars($review['review_text']) . '</div>';
                echo '<div class="review-rating">Rating: ';
                for ($i = 0; $i < $review['review_rating']; $i++) {
                    echo '&#9733;'; // Star symbol
                }
                for ($i = $review['review_rating']; $i < 5; $i++) {
                    echo '&#9734;'; // Empty star symbol
                }
                echo '</div>';

                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>




    <?php require 'views/partials/footer.php'; ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const inputCounter = document.querySelector('.input-counter');
            const inputField = inputCounter.querySelector('.input-counter__text');
            const minusButton = inputCounter.querySelector('.input-counter__minus');
            const plusButton = inputCounter.querySelector('.input-counter__plus');

            const min = parseInt(inputField.getAttribute('data-min'));
            const max = parseInt(inputField.getAttribute('data-max'));

            minusButton.addEventListener('click', function () {
                let currentValue = parseInt(inputField.value);
                if (currentValue > min) {
                    inputField.value = currentValue - 1;
                }
            });

            plusButton.addEventListener('click', function () {
                let currentValue = parseInt(inputField.value);
                if (currentValue < max) {
                    inputField.value = currentValue + 1;
                }
            });
        });
    </script>
    <!-- JavaScript to handle login check on form submission -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  document.getElementById('reviewForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const formData = new FormData(this);

    fetch('/submitReview', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            Swal.fire({
                icon: 'success',
                title: 'Review Submitted!',
                text: data.message,
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.reload(); // Reload the page or redirect as needed
            });
        } else if (data.status === 'not_logged_in') {
            Swal.fire({
                icon: 'warning',
                title: 'Not Logged In',
                text: data.message,
                confirmButtonText: 'Log In'
            }).then(() => {
                window.location.href = '/login'; // Redirect to the login page
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: data.message,
                confirmButtonText: 'OK'
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'An unexpected error occurred. Please try again later.',
            confirmButtonText: 'OK'
        });
    });
});


</script>



    </body>

    </html>