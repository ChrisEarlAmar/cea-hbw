<?php 

    require('admin/inc/db_config.php');
    require('admin/inc/essentials.php');

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ACES Hotel - CONTACT</title>
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
        <h2 class="fw-bold h-font text-center">CONTACT US</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            Atque nostrum eius voluptatibus!<br> Maxime minima aliquid 
            debitis molestias repellendus adipisci sit!
        </p>
    </div>

    <?php require('inc/contact_details.inc.php') ?>

    <!-- Hotel Facilities -->
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow-sm p-4">
                    <iframe class="w-100 rounded mb-4" src="<?php echo $iframe; ?>" height="250px"></iframe>
                    <h5>Address</h5>
                    <a class="d-inline-block text-decoration-none text-dark mb-2" href="<?php echo $gmap; ?>" target="_blank"><i class="bi bi-geo-alt-fill me-"></i> <?php echo $address; ?></a>
                    
                    <h5 class="mt-4">Call us</h5>
                    <a href="tel: <?php echo $pn1; ?>" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i> <?php echo $pn1; ?></a>
                    <br>
                    <a href="tel: <?php echo $pn2; ?>" class="d-inline-block text-decoration-none text-dark"><i class="bi bi-phone-fill"></i> <?php echo $pn2; ?></a>

                    <h5 class="mt-4">Email</h5>
                    <a class="d-inline-block text-decoration-none text-dark" href="mailto: <?php echo $email; ?>"><i class="bi bi-envelope-fill"></i> <?php echo $email; ?></a>

                    <h5 class="mt-4">Our Socials</h5>
                    <a href="<?php echo $tw; ?>" class="d-inline-block text-dark fs-5 me-2"><i class="bi bi-twitter me-1"></i></a>
                    <a href="<?php echo $fb; ?>" class="d-inline-block text-dark fs-5 me-2"><i class="bi bi-facebook me-1"></i></a>
                    <a href="<?php echo $ig; ?>" class="d-inline-block text-dark fs-5"><i class="bi bi-instagram me-1"></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow-sm p-4">
                    <form method="POST">
                        <h5>Send a Message</h5> 
                        <div class="mb-3">
                            <label for="name" class="form-label" style="font-weight: 500;">Name</label>
                            <input type="text" name="name" class="form-control shadow-none" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label" style="font-weight: 500;">Email</label>
                            <input type="email" name="email" class="form-control shadow-none" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label" style="font-weight: 500;">Subject</label>
                            <input type="text" name="subject" class="form-control shadow-none" id="subject" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label" style="font-weight: 500;">Message</label>
                            <textarea class="form-control shadow-none" name="message" id="message" rows="4" style="resize: none;" required></textarea>
                        </div>
                        <button type="submit" name="send" class="btn text-white custom-btn mt-3 shadow-none"><i class="bi bi-send-fill me-1"></i> SEND</button>
                    </form>
                </div>
            </div>            
        </div> 
    </div>

    <?php 

        if (isset($_POST['send'])) {
            $frm_data = filteration($_POST);

            $q = "INSERT INTO `user_queries`(`name`, `email`, `subject`, `message`) VALUES (?, ?, ?, ?)";

            $values = [$frm_data['name'], $frm_data['email'], $frm_data['subject'], $frm_data['message']];

            $res = insert($q, $values, 'ssss');

            if ($res == 1) {
                alert_top('success', 'Mail sent!');
            } else {
                alert_top('error', 'Server Down! Try again later.');

            }
        }
    
    ?>

    <!-- Footer -->
    <?php require('inc/footer.inc.php') ?>

</body>
    <!-- Script -->
    <?php require('inc/script.inc.php') ?>
</html>