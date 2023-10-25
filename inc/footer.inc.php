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
        $siteAbout = $row["site_about"];
    } else {
        // Handle no data found
        $siteTitle = "Site Title Not Found";
        $siteAbout = "Site About Not Found";
    }

    // SQL query to retrieve the contact details (Twitter, Facebook, Instagram)
    $contactDetailsSql = "SELECT tw, fb, insta FROM contact_details WHERE sr_no = 1"; // Assuming you want the data with id 1

    $contactDetailsResult = $conn->query($contactDetailsSql);

    if (!$contactDetailsResult) {
        die("SQL Error: " . $conn->error);
    }

    if ($contactDetailsResult->num_rows > 0) {
        // Fetch the contact details
        $contactDetailsRow = $contactDetailsResult->fetch_assoc();
        $twitterLink = $contactDetailsRow["tw"];
        $facebookLink = $contactDetailsRow["fb"];
        $instagramLink = $contactDetailsRow["insta"];
    } else {
        // Handle no contact details found
        $twitterLink = "#";
        $facebookLink = "#";
        $instagramLink = "#";
    }

    // Close the connection
    $conn->close();
?>

    <div class="container-fluid bg-white mt-5">
        <div class="row">
            <div class="col-lg-4 p-4">
                <h3 class="h-font fw-bold fs-3 mb-2"><?php echo $siteTitle; ?></h3>
                <p><?php echo $siteAbout; ?></p>
            </div>
            <div class="col-lg-4 p-4">
                <h5 class="mb-3">Links</h5>
                <a href="index.php" class="d-inline-block mb-2 text-dark text-decoration-none">Home</a><br>
                <a href="rooms.php" class="d-inline-block mb-2 text-dark text-decoration-none">Rooms</a><br>
                <a href="facilities.php" class="d-inline-block mb-2 text-dark text-decoration-none">Facilities</a><br>
                <a href="contact.php" class="d-inline-block mb-2 text-dark text-decoration-none">Contact Us</a><br>
                <a href="about.php" class="d-inline-block mb-2 text-dark text-decoration-none">About</a>
            </div>
            <div class="col-lg-4 p-4">
                <h5 class="mb-3">Our Socials</h5>
                <a href="<?php echo $twitterLink; ?>" class="d-inline-block mb-2 text-dark text-decoration-none mb-2"><i class="bi bi-twitter me-1"></i> Twitter</a><br>
                <a href="<?php echo $facebookLink; ?>" class="d-inline-block mb-2 text-dark text-decoration-none"><i class="bi bi-facebook me-1"></i> Facebook</a><br>
                <a href="<?php echo $instagramLink; ?>" class="d-inline-block mb-2 text-dark text-decoration-none"><i class="bi bi-instagram me-1"></i> Instagram</a>
            </div>
        </div>
    </div>

    <h6 class="text-center bg-white text-dark p-3 m-0">&copy; <?php echo date("Y");?> By Chris Earl Amar. All rights reserved.</h6>
    