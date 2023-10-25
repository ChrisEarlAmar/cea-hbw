<?php
    require('db_connection.php');

    // Fetch users from the database
    $query = "SELECT * FROM carousel";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

            echo '<div class="col-md-4 mb-3">
                    <div class="card bg-dark text-white shadow-sm">
                        <img src="../assets/images/carousel/' . $row['image_name'] . '" class="card-img" alt="">
                        <div class="card-img-overlay text-end">
                        <button class="btn btn-danger shadow-none delete-team btn-sm" data-userid="' . $row['sr_no'] . '" onclick="delete_team_modal(' . $row['sr_no'] . ')"><i class="bi bi-trash-fill me-1"></i> Delete</button>
                        </div>
                        <p class="card-text text-center px-3 py-2">' . $row['image_name'] . '</p>
                    </div>
                </div>';
        }

    } else {    
        echo '<div class="col-12 mt-2"><div class="alert alert-danger alert-dismissible fade show mx-3 me-3" role="alert">
            <strong>No Team Members Found!</strong>
            <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
        </div></div>';
    }

    $conn->close();
?>