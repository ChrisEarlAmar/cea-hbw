<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ACES Hotel - ABOUT</title>
    <!-- Links for CSS and JS-->
    <?php require('inc/links.inc.php') ?>
</head>
<style>
    .pop:hover {
        border-top-color: var(--teal) !important;
    }
</style>
<body class="bg-light">

    <!-- Navbar, Login and Registration Modal -->
    <?php require('inc/header.inc.php') ?>

    <!-- Page Intro -->
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">ABOUT US</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            Atque nostrum eius voluptatibus!<br> Maxime minima aliquid 
            debitis molestias repellendus adipisci sit!
        </p>
    </div>

    <!-- Key Person -->
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
                <h3 class="mb-3">Lorem ipsum dolor sit.</h3>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                    Atque harum dolore id sint earum impedit laboriosam?
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                    Atque harum dolore id sint earum impedit laboriosam?
                </p>
            </div>
            <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
                <img src="assets/images/about/about.jpg" class="w-100">
            </div>
        </div>
    </div>

    <!-- Hotel Specifications -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center border-dark pop expandable">
                    <img src="assets/images/about/hotel.svg" width="70px">
                    <h4 class="mt-3">100+ ROOMS</h4>
                </div>  
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center border-dark pop expandable">
                    <img src="assets/images/about/customers.svg" width="70px">
                    <h4 class="mt-3">200+ CUSTOMERS</h4>
                </div>  
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center border-dark pop expandable">
                    <img src="assets/images/about/rating.svg" width="70px">
                    <h4 class="mt-3">150+ REVIEWS</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center border-dark pop expandable">
                    <img src="assets/images/about/staff.svg" width="70px">
                    <h4 class="mt-3">200+ STAFF</h4>
                </div>     
            </div>
        </div>
    </div>

    <!-- Management Team Swiper -->
    <h3 class="my-5 text-center fw-bold h-font">MANAGEMENT TEAM</h3>
    <div class="container px-4">
        <div class="swiper about_us_swipper">
            <div class="swiper-wrapper"><?php require('inc/about_team.image.inc.php') ?>
            
            </div>
        </div>
        
    </div>
    
    <!-- Footer -->
    <?php require('inc/footer.inc.php') ?>

</body>
    <!-- Script -->
    <?php require('inc/script.inc.php') ?>
</html>