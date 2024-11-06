<?php require('views/partials/header_admin.php');?>
<style>

..reviews-list table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.reviews-list th, .reviews-list td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: center;
}

.reviews-list th {
    background-color: #f4f4f4;
    font-weight: bold;
    color: #333;
}

.review-image {
    width: 60px;
    height: auto;
    border-radius: 5px;
}

.reviews-list tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

.reviews-list tbody tr:hover {
    background-color: #e9e9e9;
    
}
.show-button, .delete-button {
    padding: 8px 12px;
    border: none;
    border-radius: 5px;
    font-size: 0.9em;
    cursor: pointer;
}

.show-button {
    background-color: #4CAF50;
    color: white;
}

.delete-button {
    background-color: #f44336;
    color: white;
}

.show-button:hover, .delete-button:hover {
    opacity: 0.9;
}
/* التصميم الأساسي للأزرار */
.action-button {
    display: inline-block;
    padding: 10px 20px;
    border-radius: 25px;
    font-size: 0.9em;
    font-weight: bold;
    text-transform: uppercase;
    text-align: center;
    text-decoration: none;
    color: white;
    margin: 0 5px;
    transition: all 0.3s ease;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    width: 100px;
}

/* زر التفعيل */
.active-button {
    background: linear-gradient(45deg, #28a745, #218838); /* تدرج أخضر */
}

.active-button:hover {
    background: linear-gradient(45deg, #34d058, #28a745);
    box-shadow: 0px 6px 12px rgba(0, 128, 0, 0.3);
}

/* زر التعطيل */
.disactive-button {
    background: linear-gradient(45deg, #dc3545, #c82333); /* تدرج أحمر */
}

.disactive-button:hover {
    background: linear-gradient(45deg, #e55353, #dc3545);
    box-shadow: 0px 6px 12px rgba(255, 0, 0, 0.3);
}


</style>
  
<!--====== Main Header ======-->
<?php include('views/partials/header_admin.php');?>

        <!--====== End - Main Header ======-->


        <!--====== App Content ======-->
        <div class="app-content">

            <!--====== Section 1 ======-->
            <div class="u-s-p-y-20">

                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="container">
                        <div class="breadcrumb">
                            <div class="breadcrumb__wrap">
                                <ul class="breadcrumb__list">
                                    <li class="has-separator">

                                        <a href="dash">Home</a></li>
                                    <li class="is-marked">

                                        <a>Products</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                    <div>

                                        <a class="dash__custom-link btn--e-brand-b-2" href="product-add"><i class="fas fa-plus u-s-m-r-8"></i>

                                            <span>Add New Product</span></a></div>
                                </div>
                                <div class="col-lg-9 col-md-12">
                                    <div class="dash__box dash__box--shadow dash__box--bg-white dash__box--radius u-s-m-b-30">
                                        <div class="dash__pad-2" style="display:flex;justify-content: space-between;">
                                            <div class="dash__address-header">
                                                <h1 class="dash__h1">Products</h1>
                                            </div>
                                            <div class="dash__filter">
                                                <form method="GET" action="/show/" id="categoryForm">
                                                    <select class="select-box select-box--primary-style" style="border-radius:6px" name="cha" id="categoryFilter" onchange="this.form.submit()">
                                                        <option value="">All reviews</option>                                                            
                                                            <option value="1" 
                                                                <?= isset($_GET['cha']) && $_GET['cha'] == 1 ? 'selected' : '' ?>>
                                                                Active reviews
                                                            </option>
                                                            <option value="false" 
                                                                <?= isset($_GET['cha']) && $_GET['cha'] == 'false' ? 'selected' : '' ?>>
                                                                Deactivate reviews
                                                            </option>
                                                    </select>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="dash__table">
                                            <table class="dash__table">
                                            <div class="reviews-list">
                                            <div class="reviews-list">
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th>Image</th>
                                                            <th>Customer Name</th>
                                                            <th>Review Text</th>
                                                            <th>Rating</th>
                                                            
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                            
                                              
                                            foreach($reviews as $review) {
                                              if($review['active']==1){
                                                  $active = 'Active';
                                                  $value = 0;
                                                  $style = "style='background-color:green; border:0;width:100px'";
                                              }else{
                                                  $active = 'Deactivate';
                                                  $value = 1;
                                                  $style = '';
                                              }
                                              
                                              echo " <tr><th>" ;
                                              
                                                            if ($review['review_image']) {
                                                                echo '<img src="/public/images/reviews/' . htmlspecialchars($review['review_image']) . '" alt="Review Image" class="review-image">';
                                                            } else {
                                                                echo 'No Image';
                                                            }
                                                            echo '</th>';
                                            echo"  <form method='POST' action='/active/".$review['review_id']."' >
                                                      <th>". htmlspecialchars($review['customer_name']) ."</th>
                                                      <th>". htmlspecialchars($review['review_text']) ."</th>";
                                                      echo '<th>';
                                                      for ($i = 0; $i < $review['review_rating']; $i++) {
                                                          echo '&#9733;'; // رمز النجمة
                                                      }
                                                      for ($i = $review['review_rating']; $i < 5; $i++) {
                                                          echo '&#9734;'; // رمز النجمة الفارغة
                                                      }
                                                      echo '</th>';
                                                     
                                                     
                                                     echo" </form></th>
                                                      <th style='display: flex; justify-content:center'>
                                                      <form method='GET' action='/disactive/".$review['review_id']."' >
                                                      <input type='text' value='".$value."' name='change' style='visibility: hidden;display: none;'>
                                                      <button class='address-book-edit btn btn--e-brand-b-2'". $style." >".$active."</button>
                                                      </form></th>
                                                  </tr>";
                                          }
                                          ?>

                                                    </tbody>
                                                </table>
                                            </div>

                                                </div>
                                            </table>
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
    // function redirectToCategory() {
    //     const selectElement = document.getElementById("categoryFilter");
    //     const selectedCategoryId = selectElement.value;
    //     if (selectedCategoryId) {
    //         // Redirect to the dynamic category route
    //         window.location.href = `products/${selectedCategoryId}`;
    //         <?php
    //         // header("location:`products/${selectedCategoryId}`");
    //         ?>
    //     } else {
    //         // Redirect to show all categories if no specific category is selected
    //         window.location.href = "products";
    //     }
    // }
</script>
        <!--====== Main Footer ======-->
        <?php include('views/partials/footer_admin.php');?>

