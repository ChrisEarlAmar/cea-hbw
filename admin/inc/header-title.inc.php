<?php
    require('inc/db_connection.php');

    // SQL query to retrieve the data
    $sql = "SELECT site_title FROM settings WHERE sr_no = 1"; // Assuming you want the data with id 1

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
