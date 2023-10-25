<?php
    require('admin/inc/db_connection.php');

    // SQL query to retrieve the data
    $sql = "SELECT site_title, site_about FROM settings WHERE sr_no = 1"; // Assuming you want the data with id 1

    $result = $conn->query($sql);

    if (!$result) {
        die("SQL Error: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        // Fetch the data
        $row = $result->fetch_assoc();
        $siteTitle = $row["site_title"];
    } else {
        // Handle no data found
        $siteTitle = "Site Title Not Found";
    }

    // Close the connection
    $conn->close();
?>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand me-5 me-sm-1 fw-bold fs-3 h-font" href="index.php">
                <?php echo $siteTitle; ?>
            </a>
            <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-underline me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link ms-lg-4 me-2 active" id="home-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link me-2" id="rooms-link" href="rooms.php">Rooms</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link me-2" id="facilities-link" href="facilities.php">Facilities</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link me-2" id="contact-link" href="contact.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" id="about-link" href="about.php">About</a>
                    </li>
                </ul>
            <div class="d-flex">
                <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal" data-bs-target="#registerModal">Register</button>
            </div>
        </div>
    </nav>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center">
                            <i class="bi bi-person-circle fs-3 m-2"></i>
                            User Login
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control shadow-none" placeholder="name@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control shadow-none">
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <button type="submit" class="btn btn-dark shadow-none">Login</button>
                            <a href="javascript: void(0)" class="text-secondary text-decoration-none">Forgot Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Register Modal --> 
    <div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center">
                            <i class="bi bi-person-lines-fill fs-3 m-2"></i>
                            User Registration
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-warning" role="alert">
                            Note: Your details must match with your ID. 
                        </div>

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 ps-0 mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 p-0 mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control shadow-none" placeholder="name@example.com">
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label for="phoneNumber" class="form-label">Phone Number</label>
                                    <input type="text" class="form-control shadow-none" id="phoneNumber" maxlength="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                </div>
                                <div class="col-md-6 p-0 mb-3">
                                    <label for="picture" class="form-label">Picture</label>
                                    <input type="file" class="form-control shadow-none" id="picture">
                                </div>
                                <div class="col-md-12 mb-3 p-0">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea class="form-control shadow-none" id="address" rows="1"></textarea>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label for="pincode" class="form-label">Pincode</label>
                                    <input type="number" class="form-control shadow-none" id="pincode">
                                </div>
                                <div class="col-md-6 p-0 mb-3">
                                    <label for="name" class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 p-0 mb-3">
                                    <label for="password" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control shadow-none">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-center my-2">
                            <button type="submit" class="btn btn-dark shadow-none">Register</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
