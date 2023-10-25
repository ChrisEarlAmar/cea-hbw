<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ACES Hotel - HOME</title>
    <!-- Links for CSS and JS-->
    <?php require('inc/links.inc.php') ?>
</head>
<body class="bg-light">

    <!-- Navbar, Login and Registration Modal -->
    <?php require('inc/header.inc.php') ?>

    <!-- Carousel -->
    <div class="w-100">
        <!-- Swiper -->
        <div class="swiper carousel_swiper">
            <div class="swiper-wrapper">
                <?php require('inc/carousel.image.inc.php') ?></div>
        </div>
    </div>

    <!-- Check Availability -->
    <div class="container availability-form">
        <div class="row">
            <div class="col-lg 12 bg-white shadow-sm p-4 rounded">
            <h5 class="mb-4">Check Booking Availability</h5>
            <form action="">
                <div class="row align-items-end">
                    <div class="col-lg-3 mb-3">
                        <label class="form-label" style="font-weight: 500;">Check-in</label>
                        <input type="date" class="form-control shadow-none">
                    </div>
                    <div class="col-lg-3 mb-3">
                        <label class="form-label" style="font-weight: 500;">Check-out</label>
                        <input type="date" class="form-control shadow-none">
                    </div>
                    <div class="col-lg-3 mb-3">
                        <label class="form-label" style="font-weight: 500;">Adult</label>
                        <select class="form-control shadow-none">
                            <option style="display:none;" selected value="">Select an Option</option>
                            <option value="option1">One</option>
                            <option value="option2">Two</option>
                            <option value="option3">Three</option>
                        </select>
                    </div>
                    <div class="col-lg-2 mb-3">
                        <label class="form-label" style="font-weight: 500;">Children</label>
                        <select class="form-control shadow-none">
                            <option style="display:none;" selected value="">Select an Option</option>
                            <option value="option1">One</option>
                            <option value="option2">Two</option>
                            <option value="option3">Three</option>
                        </select>
                    </div>
                    <div class="col-lg-1 mt-sm-3 mb-3">
                        <button type="submit" class="btn text-white shadow-none btn-secondary custom-btn">Submit</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>

    <!-- Rooms -->
    <h2 class="mt-3 pt-5 mb-4 text-center fw-bold h-font">OUR ROOMS</h2>
    <div class="container">
        <div class="row justify-content-around">
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow-sm" style="max-width: 350px; margin: auto;">
                    <img src="assets/images/rooms/rm_img01.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Standard Room</h5>
                        <h6 class="text-muted mb-4">Price: ₱2,000 per night.</h6>
                        <p class="card-text">A comfortable and budget-friendly option for guests looking for a cozy stay with essential amenities.</p>
                        <div class="features mb-4">
                            <h6 class="mb-1">Features</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">1 Queen-size bed</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">25 square meters</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">Balcony</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">Private bathroom</span>
                        </div>
                        <div class="amenities mb-4">
                            <h6 class="mb-1">Amenities</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">TV</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">Mini Fridge</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">Work Desk</span>
                        </div>
                        <div class="rating mb-4">
                            <h6 class="mb-1">Rating</h6>
                            <span class="badge rounded-pill bg-light">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                            </span>
                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="#" class="btn btn-sm text-white custom-btn shadow-none">Book Now</a>
                            <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow-sm" style="max-width: 350px; margin: auto;">
                    <img src="assets/images/rooms/rm_img02.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Family Room</h5>
                        <h6 class="text-muted mb-4">Price: ₱4,800 per night.</h6>
                        <p class="card-text">Ideal for families, this room type offers interconnected rooms or extra beds to accommodate everyone comfortably.</p>
                        <div class="features mb-4">
                            <h6 class="mb-1">Features</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">1 King-size bed, 2 Twin Beds</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">35 square meters</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">Balcony</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">Connecting Rooms</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">Bathroom</span>
                        </div>
                        <div class="amenities mb-4">
                            <h6 class="mb-1">Amenities</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">TV</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">Mini Fridge</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">Game Consoles</span>
                        </div>
                        <div class="rating mb-4">
                            <h6 class="mb-1">Rating</h6>
                            <span class="badge rounded-pill bg-light">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                            </span>
                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="#" class="btn btn-sm text-white custom-btn shadow-none">Book Now</a>
                            <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow-sm" style="max-width: 350px; margin: auto;">
                    <img src="assets/images/rooms/rm_img03.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Suite</h5>
                        <h6 class="text-muted mb-4">Price: ₱7,500 per night.</h6>
                        <p class="card-text">A comfortable and budget-friendly option for guests looking for a cozy stay with essential amenities.</p>
                        <div class="features mb-4">
                            <h6 class="mb-1">Features</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">1 King-size bed, 2 Twin Beds</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">35 square meters</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">Balcony, Living & Dining Room</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">Bathroom</span>
                        </div>
                        <div class="amenities mb-4">
                            <h6 class="mb-1">Amenities</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">Minibar</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">Luxury Toiletries</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">Workstation</span>
                        </div>
                        <div class="rating mb-4">
                            <h6 class="mb-1">Rating</h6>
                            <span class="badge rounded-pill bg-light">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                            </span>
                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="#" class="btn btn-sm text-white custom-btn shadow-none">Book Now</a>
                            <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 text-center mt-5">
                <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Learn More >>></a>
            </div>
        </div>
    </div>

    <!-- Facilities -->
    <h2 class="mt-3 pt-5 mb-4 text-center fw-bold h-font">OUR FACILITIES</h2>
    <div class="container">
        <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
            <div class="pop border-top border-4 col-lg-2 col-md-2 text-center bg-white rounded shadow-sm py-4 my-3 expandable">
                <img src="assets/images/features/ftr_img01.svg" width="80px">
                <h5 class="mt-3">Wifi</h5>
            </div>
            <div class="pop border-top border-4 col-lg-2 col-md-2 text-center bg-white rounded shadow-sm py-4 my-3 expandable">
                <img src="assets/images/features/ftr_img02.svg" width="80px">
                <h5 class="mt-3">Safety and Security</h5>
            </div>
            <div class="pop border-top border-4 col-lg-2 col-md-2 text-center bg-white rounded shadow-sm py-4 my-3 expandable">
                <img src="assets/images/features/ftr_img03.svg" width="80px">
                <h5 class="mt-3">Gift Shop</h5>
            </div>
            <div class="pop border-top border-4 col-lg-2 col-md-2 text-center bg-white rounded shadow-sm py-4 my-3 expandable">
                <img src="assets/images/features/ftr_img04.svg" width="80px">
                <h5 class="mt-3">Valet Parking</h5>
            </div>
            <div class="pop border-top border-4 col-lg-2 col-md-2 text-center bg-white rounded shadow-sm py-4 my-3 expandable">
                <img src="assets/images/features/ftr_img05.svg" width="80px">
                <h5 class="mt-3">Swimming Pool</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 text-center mt-5">
                <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Learn More >>></a>
            </div>
        </div>
    </div>

    <!-- Testimonials -->
    <h2 class="mt-3 pt-5 mb-4 text-center fw-bold h-font">TESTIMONIALS</h2>
    <!-- Swiper -->
    <div class="container">
        <div class="swiper testimonial_swiper">
            <div class="swiper-wrapper mb-5">

                <div class="swiper-slide rounded shadow-sm bg-white p-4 mb-4">
                    <div class="profile d-flex align-items-center p-4">
                        <img src="assets/images/profile/prf_img01.png" width="60px">
                        <h6 class="m-0 ms-4">Alex Johnson</h6>
                    </div>
                    <p class="px-4">"My stay at ACES was fantastic - the staff was incredibly welcoming, the cozy room had a wonderful view, and the delicious breakfast made for a perfect start to each day."</p>
                    <div class="rating px-4">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-half text-warning"></i>
                    </div>
                </div>

                <div class="swiper-slide rounded shadow-sm bg-white p-4 mb-4">
                    <div class="profile d-flex align-items-center p-4">
                        <img src="assets/images/profile/prf_img02.png" width="60px">
                        <h6 class="m-0 ms-4">David Miller</h6>
                    </div>
                    <p class="px-4">"ACES Hotel exceeded my expectations - the spacious suite, friendly staff, and relaxing pool area made my vacation truly memorable."</p>
                    <div class="rating px-4">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-half text-warning"></i>
                    </div>
                </div>

                <div class="swiper-slide rounded shadow-sm bg-white p-4 mb-4">
                    <div class="profile d-flex align-items-center p-4">
                        <img src="assets/images/profile/prf_img03.png" width="60px">
                        <h6 class="m-0 ms-4">Jessica Martinez</h6>
                    </div>
                    <p class="px-4">"I had a wonderful experience at ACES Hotel - the vibes of the room was charming, the surrounding nature was breathtaking, and the warm hospitality made me feel right at home."</p>
                    <div class="rating px-4">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-half text-warning"></i>
                    </div>
                </div>

                <div class="swiper-slide rounded shadow-sm bg-white p-4 mb-4">
                    <div class="profile d-flex align-items-center p-4">
                        <img src="assets/images/profile/prf_img04.png" width="60px">
                        <h6 class="m-0 ms-4">Michelle Thompson</h6>
                    </div>
                    <p class="px-4">"At ACES Hotel, the peaceful atmosphere, comfortable bed, and homemade cookies in the lobby made my weekend getaway a delightful and cozy retreat."</p>
                    <div class="rating px-4">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-half text-warning"></i>
                    </div>
                </div>

                <div class="swiper-slide rounded shadow-sm bg-white p-4 mb-4">
                    <div class="profile d-flex align-items-center p-4">
                        <img src="assets/images/profile/prf_img05.png" width="60px">
                        <h6 class="m-0 ms-4">Josh Lee</h6>
                    </div>
                    <p class="px-4">"ACES Hotel was a hidden gem in the city - the modern room, convenient location, and rooftop bar made my stay exciting and comfortable."</p>
                    <div class="rating px-4">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-half text-warning"></i>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php require('inc/contact_details.inc.php') ?>

    <!-- Reach Us -->
    <h2 class="mt-3 pt-5 mb-4 text-center fw-bold h-font">Reach Us</h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
                <iframe src="<?php echo $iframe; ?>" class="w-100 rounded" height="450px"></iframe>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Call us</h5>
                    <a href="tel: <?php echo $pn1; ?>" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i> <?php echo $pn1; ?></a>
                    <br>
                    <a href="tel: <?php echo $pn2; ?>" class="d-inline-block text-decoration-none text-dark"><i class="bi bi-phone-fill"></i> <?php echo $pn2; ?></a>
                </div>
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Our Socials</h5>
                    <a href="<?php echo $tw; ?>" class="d-inline-block mb-3"><span class="badge bg-light text-dark fs-6 p-2"><i class="bi bi-twitter me-1"></i> Twitter</span></a>
                    <br>
                    <a href="<?php echo $fb; ?>" class="d-inline-block mb-3"><span class="badge bg-light text-dark fs-6 p-2"><i class="bi bi-facebook me-1"></i> Facebook</span></a>
                    <br>
                    <a href="<?php echo $ig; ?>" class="d-inline-block mb-3"><span class="badge bg-light text-dark fs-6 p-2"><i class="bi bi-instagram me-1"></i> Instagram</span></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php require('inc/footer.inc.php') ?>

</body>
    <!-- Script -->
    <?php require('inc/script.inc.php') ?>
</html>