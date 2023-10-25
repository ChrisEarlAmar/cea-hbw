<?php
    require('admin/inc/db_connection.php');

    // Fetch users from the database
    $query = "SELECT * FROM facilities ORDER BY sr_no ASC";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '  <div class="col-lg-4 col-md-6 mb-5 px-4">
                    <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop expandable">
                        <div class="d-flex align-items-center mb-2">
                            <img src="assets/images/facilities/' . $row['icon'] . '" width="40px">
                            <h5 class="m-0 ms-3">' . $row['name'] . '</h5>
                        </div>
                        <p>' . $row['description'] . '</p>
                    </div>
                </div>
                
                ';
        }
    } else {    
        echo '<div class="swiper-slide">
                <p>Image For Carousel Does Not Exist.</p>
            </div>';
    }

    $conn->close();
?>
