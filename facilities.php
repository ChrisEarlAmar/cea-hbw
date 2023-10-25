<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ACES Hotel - FACILITIES</title>
    <!-- Links for CSS and JS-->
    <?php require('inc/links.inc.php') ?>
    <style>
        .pop:hover {
            border-top-color: var(--teal) !important;
        }
    </style>
</head>
<body class="bg-light">

    <!-- Navbar, Login and Registration Modal -->
    <?php require('inc/header.inc.php') ?>

    <!-- Page Intro -->
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">OUR FACILITIES</h2>
        <div class="h-line bg-dark"></div>  
        <p class="text-center mt-3">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            Atque nostrum eius voluptatibus!<br> Maxime minima aliquid 
            debitis molestias repellendus adipisci sit!
        </p>
    </div>

    <!-- Hotel Facilities -->
    <div class="container">
        <div class="row">
            <?php require('inc/facilities.inc.php') ?>            
        </div>
    </div>

    <!-- Footer -->
    <?php require('inc/footer.inc.php') ?>

</body>
    <!-- Script -->
    <?php require('inc/script.inc.php') ?>
    
</html>