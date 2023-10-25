<?php
    require('admin/inc/db_connection.php');

    // Fetch team details from the database
    $query = "SELECT * FROM team_details";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '
                <div class="swiper-slide bg-white text-center overflow-hidden rounded mb-5 shadow-sm" id="team-' . $row['sr_no'] . '">
                    <img src="assets/images/about/' . $row['picture'] . '" class="w-100">
                    <h5 class="mt-2">' . $row['name'] . '</h5>
                </div>'
                ;
        }
    } else {    
        echo '<div class="swiper-slide bg-white text-center overflow-hidden rounded mb-5">
                <p>No team details found.</p>
            </div>';
    }

    $conn->close();
?>
