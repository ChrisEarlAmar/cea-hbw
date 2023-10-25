<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ACES Hotel - ROOMS</title>
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
        <h2 class="fw-bold h-font text-center">OUR ROOMS</h2>
        <div class="h-line bg-dark"></div>
    </div>

    <!-- Hotel Facilities -->
    <div class="container">
        <div class="row">
            
           <div class="col-lg-3 col-md-12 mb-4 mb-lg-0 px-lg-0">
                <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
                    <div class="container-fluid flex-lg-column align-items-stretch">
                        <h4 class="mt-2">FILTERS</h4>
                        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#filter_dropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="bi bi-caret-down-fill text-muted"></i>
                        </button>
                        <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filter_dropdown">
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">CHECK AVAILABILITY</h5>
                                <label class="form-label">Check-in</label>
                                <input type="date" class="form-control shadow-none mb-3">
                                <label class="form-label">Check-out</label>
                                <input type="date" class="form-control shadow-none">
                            </div>
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">FACILITIES</h5>
                                <div class="mb-2 custom-checkbox">
                                    <input type="checkbox" class="form-check-input shadow-none me-1 custom-control-input" id="f1">
                                    <label for="f1" class="form-check-label custom-control-label">Facility One</label>
                                </div>
                                <div class="mb-2 custom-checkbox">
                                    <input type="checkbox" class="form-check-input shadow-none me-1 custom-control-input" id="f2">
                                    <label for="f2" class="form-check-label custom-control-label">Facility Two</label>
                                </div>
                                <div class="mb-2 custom-checkbox">
                                    <input type="checkbox" class="form-check-input shadow-none me-1 custom-control-input" id="f3">
                                    <label for="f3" class="form-check-label custom-control-label">Facility Three</label>
                                </div>
                            </div>
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">GUESTS</h5>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <label class="form-label">Adults</label>
                                        <input type="number" class="form-control shadow-none mb-3">
                                    </div>
                                    <div class="ms-2">
                                        <label class="form-label">Children</label>
                                        <input type="number" class="form-control shadow-none mb-3">
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </nav>
           </div>

           <div class="col-lg-9 col-md-12 px-4">
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                        <img src="assets/images/rooms/rm_img01.jpg" class="img-fluid rounded">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-3">Simple Room Name</h5>
                            <div class="features mb-3">
                                <h6 class="mb-1">Features</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">2 Rooms</span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">1 Bathroom</span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">1 Balcony</span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">1 Sofa</span>
                            </div>
                            <div class="facilities mb-3">
                                <h6 class="mb-1">Facilities</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">Wifi</span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">Television</span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">AC</span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">Room Heater</span>
                            </div>
                            <div class="guests">
                                <h6 class="mb-1">Guests</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">5 Adults</span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">4 Children</span>
                            </div>
                        </div>
                        <div class="col-md-2 text-center mt-lg-0 mt-md-0 mt-4">
                            <div class="card-body">
                                <h6 class="text-muted mb-4">Price: ₱2,000 per night.</h6>
                                <a href="#" class="btn btn-sm w-100 text-white custom-btn shadow-none mb-2">Book Now</a>
                                <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">More Details</a>
                            </div>
                        </div>
                    </div>
                </div>                

                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                        <img src="assets/images/rooms/rm_img02.jpg" class="img-fluid rounded">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-3">Simple Room Name</h5>
                            <div class="features mb-3">
                                <h6 class="mb-1">Features</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">2 Rooms</span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">1 Bathroom</span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">1 Balcony</span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">1 Sofa</span>
                            </div>
                            <div class="facilities mb-3">
                                <h6 class="mb-1">Facilities</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">Wifi</span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">Television</span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">AC</span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">Room Heater</span>
                            </div>
                            <div class="guests">
                                <h6 class="mb-1">Guests</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">5 Adults</span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">4 Children</span>
                            </div>
                        </div>
                        <div class="col-md-2 text-center mt-lg-0 mt-md-0 mt-4">
                            <div class="card-body">
                                <h6 class="text-muted mb-4">Price: ₱2,000 per night.</h6>
                                <a href="#" class="btn btn-sm w-100 text-white custom-btn shadow-none mb-2">Book Now</a>
                                <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">More Details</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                        <img src="assets/images/rooms/rm_img03.jpg" class="img-fluid rounded">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-3">Simple Room Name</h5>
                            <div class="features mb-3">
                                <h6 class="mb-1">Features</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">2 Rooms</span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">1 Bathroom</span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">1 Balcony</span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">1 Sofa</span>
                            </div>
                            <div class="facilities mb-3">
                                <h6 class="mb-1">Facilities</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">Wifi</span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">Television</span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">AC</span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">Room Heater</span>
                            </div>
                            <div class="guests">
                                <h6 class="mb-1">Guests</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">5 Adults</span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">4 Children</span>
                            </div>
                        </div>
                        <div class="col-md-2 text-center mt-lg-0 mt-md-0 mt-4">
                            <div class="card-body">
                                <h6 class="text-muted mb-4">Price: ₱2,000 per night.</h6>
                                <a href="#" class="btn btn-sm w-100 text-white custom-btn shadow-none mb-2">Book Now</a>
                                <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">More Details</a>
                            </div>
                        </div>
                    </div>
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