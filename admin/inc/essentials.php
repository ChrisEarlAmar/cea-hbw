<?php

    define('UPLOAD_IMAGE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/assets/images/');
    define('ABOUT_FOLDER', 'about/');
    define('FACILITY_FOLDER', 'facilities/');
    define('CAROUSEL_FOLDER', 'carousel/');
    define('ROOMS_FOLDER', 'rooms/');


    function adminLogin() {
        session_start();
        if (!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true)) {
            // Redirect to login or handle unauthorized access here
        }
        session_regenerate_id(true);
    }

    function redirect() {
        header("Location: index.php");
        exit;
    }

    function alert($type, $msg) {
        $bs_class = ($type == 'success') ? "alert-success" : "alert-danger";

        echo <<<alert
        <div class="d-lg-flex flex-row justify-content-end position-sticky mt-5">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="alert $bs_class alert-dismissible fade show me-lg-5 ms-md-5 mx-5" role="alert">
                    <strong>$msg</strong>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
        alert;
    }

    function alert_top($type, $msg) {
        $bs_class = ($type == 'success') ? "alert-success" : "alert-danger";

        echo <<<alert
        <div class="d-lg-flex flex-row justify-content-end fixed-top mt-5" id="alertMessage">
            <div class="col-lg-3 col-md-6 col-sm-12 mt-5">
                <div class="alert $bs_class alert-dismissible fade show me-lg-5 ms-md-5 mx-5" role="alert">
                    <strong>$msg</strong>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
        alert;
    }

    function uploadImage($image, $folder) {
        $valid_mime = ['image/jpeg', 'image/png', 'image/webp', 'image/svg'];
        $img_mime = $image['type'];
    
        // Generate a unique file name
        $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
        $rname = 'IMG_' . random_int(11111, 99999) . ".$ext";
    
        // Create the directory if it doesn't exist
        $directory = UPLOAD_IMAGE_PATH . $folder;
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }
    
        $destination = $directory . $rname;
    
        if (move_uploaded_file($image['tmp_name'], $destination)) {
            // File was successfully moved
            // Handle success logic here if needed
            return $destination; // Return the full path to the uploaded image
        } else {
            // File move failed
            // Handle failure logic here if needed
            return 'upd_failed';
        }
    
        if (!in_array($img_mime, $valid_mime)) {
            return 'inv_img'; // Invalid image mime or format
        } elseif ($image['size'] / (1024 * 1024) > 2) {
            return 'inv_size'; // Invalid image size, must be less than 2 MB
        }
    } 

    function uploadCarouselImage($image, $folder) {
        $valid_mime = ['image/jpeg', 'image/png', 'image/webp'];
        $img_mime = $image['type'];
    
        // Check image MIME type
        if (!in_array($img_mime, $valid_mime)) {
            return 'inv_img'; // Invalid image mime or format
        }
    
        // Check image size
        if ($image['size'] / (1024 * 1024) > 2) {
            return 'inv_size'; // Invalid image size, must be less than 2 MB
        }
    
        // Generate a unique file name
        $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
        $rname = 'CRSL_IMG_' . random_int(11111, 99999) . ".$ext";
    
        // Define the folder for carousel images
        $folder = 'carousel/';
    
        // Create the directory if it doesn't exist
        $directory = UPLOAD_IMAGE_PATH . $folder;
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }
    
        $destination = $directory . $rname;
    
        // Move the file
        if (move_uploaded_file($image['tmp_name'], $destination)) {
            // File was successfully moved
            // Handle success logic here if needed
            return $destination; // Return the full path to the uploaded carousel image
        } else {
            // File move failed
            // Handle failure logic here if needed
            return 'upd_failed';
        }
    }    

    function uploadRoomImage($image, $folder) {
        $valid_mime = ['image/jpeg', 'image/png', 'image/webp'];
        $img_mime = $image['type'];
    
        // Check image MIME type
        if (!in_array($img_mime, $valid_mime)) {
            return 'inv_img'; // Invalid image mime or format
        }
    
        // Check image size
        if ($image['size'] / (1024 * 1024) > 2) {
            return 'inv_size'; // Invalid image size, must be less than 2 MB
        }
    
        // Generate a unique file name
        $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
        $rname = 'ROOM_IMG_' . random_int(11111, 99999) . ".$ext";
    
        // Define the folder for carousel images
        // $folder = 'rooms/';
    
        // Create the directory if it doesn't exist
        $directory = UPLOAD_IMAGE_PATH . $folder;
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }
    
        $destination = $directory . $rname;
    
        // Move the file
        if (move_uploaded_file($image['tmp_name'], $destination)) {
            // File was successfully moved
            // Handle success logic here if needed
            return $destination; // Return the full path to the uploaded carousel image
        } else {
            // File move failed
            // Handle failure logic here if needed
            return 'upd_failed';
        }
    }   
    
    function getTeamData() {
        global $con;
        $query = "SELECT * FROM team_details";
        $result = mysqli_query($con, $query);
    
        $teamData = array();
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $teamData[] = $row;
            }
        }
        return $teamData;
    }
    
    function deleteTeamMember($sr_no) {
        global $con;
        $query = "DELETE FROM team_details WHERE sr_no = ?";
        $types = 'i';
        $values = [$sr_no];
    
        if (execute($query, $values, $types)) {
            return true;
        } else {
            return false;
        }
    }
    

    // Delete if not used.
    function alert_v2($type, $msg) {
        $bs_class = ($type == 'success') ? "alert-success" : "alert-danger";

        echo <<<alert_v2
        <div class="alert $bs_class alert-dismissible fade show custom-alert" role="alert">
            <strong class="me-3">$msg</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        alert_v2;
    }

?>
