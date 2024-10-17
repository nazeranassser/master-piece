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
</head>

<body>


    <!-- navbar section   -->
    <?php include 'navbar.php'; ?>
 

    <section class="contact-section" id="contact">
        <div class="container">

            <div class="row gy-4">

              
            </div>

        </div>
    </section>


    <!-- footer section  -->

    <?php include 'footer.php'; ?>


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