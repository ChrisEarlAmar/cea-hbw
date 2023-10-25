<?php
    require('admin/inc/db_connection.php');

    // Fetch users from the database
    $query = "SELECT * FROM carousel ORDER BY sr_no ASC";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="swiper-slide" id="' . $row['image_name'] . '">
                    <img class="d-block w-100 object-fit-cover" id="' . $row['image_name'] . '" src="assets/images/carousel/' . $row['image_name'] . '" />
                </div>
                ';
        }
    } else {    
        echo '<div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop expandable">
                    <div class="d-flex align-items-center mb-2">
                        <img src="assets/images/features/stars.svg" width="40px">
                        <h5 class="m-0 ms-3">Facilities Not Available</h5>
                    </div>
                    <p>Facilities Not Available.</p>
                </div>
            </div>';
    }

    $conn->close();
?>
