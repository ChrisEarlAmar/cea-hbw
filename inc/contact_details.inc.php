<?php 
    require('admin/inc/db_connection.php');

    // SQL query to retrieve the contact details (Twitter, Facebook, Instagram)
    $sql = "SELECT * FROM contact_details WHERE sr_no = 1"; // Assuming you want the data with id 1

    $result = $conn->query($sql);

    if (!$result) {
        die("SQL Error: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        // Fetch the contact details
        $row = $result->fetch_assoc();
        $address = $row["address"];
        $gmap = $row["gmap"];
        $email = $row["email"];
        $pn1 = $row["pn1"];
        $pn2 = $row["pn2"];
        $pn2 = $row["pn2"];
        $tw = $row["tw"];
        $fb = $row["fb"];
        $ig = $row["insta"];
        $iframe = $row["iframe"];
    } else {
        // Handle no contact details found
        $twitterLink = "#";
        $address = "#";
        $gmap = "#";
        $pn1 = "#";
        $pn2 = "#";
        $pn2 = "#";
        $tw = "#";
        $fb = "#";
        $ig = "#";
        $pn2 = "#";
    }

    // Close the connection
    $conn->close();
?>