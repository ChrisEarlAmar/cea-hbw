<?php

    require('../inc/db_config.php');
    require('../inc/essentials.php');
    adminLogin();

    // Check if the POST parameter 'upd_general' is set
    if (isset($_POST['upd_general'])) {
        // This indicates a request to update general settings in the database

        // Sanitize input data
        $site_title = filteration($_POST['site_title']);
        $site_about = filteration($_POST['site_about']);

        // Prepare and execute the update query
        $q = "UPDATE `settings` SET `site_title` = ?, `site_about` = ? WHERE `sr_no` = ?";
        $values = [$site_title, $site_about, 1];
        $types = "ssi";
        $res = execute($q, $values, $types);

        // Respond with updated content or error
        if ($res) {
            $updated_content = array(
                'site_title' => $site_title,
                'site_about' => $site_about
            );
        
            header('Content-Type: application/json');
            echo json_encode($updated_content);
        } else {
            header('Content-Type: application/json');
            echo json_encode(array('error' => 'Database error'));
        }
    } 

    // Check if the POST parameter 'get_general' is set
    else if (isset($_POST['get_general'])) {
        // This indicates a request to fetch general settings data from the database

        // Prepare and execute the select query
        $q = "SELECT * FROM `settings` WHERE `sr_no` = ?";
        $values = [1];
        $types = "i";
        $res = select($q, $values, $types);

        // Respond with fetched data or error
        if ($res) {
            $data = mysqli_fetch_assoc($res);
            header('Content-Type: application/json');
            echo json_encode($data);
        } else {
            header('Content-Type: application/json');
            echo json_encode(array('error' => 'Database error'));
        }
    } 

    // Check if the POST parameter 'upd_shutdown' is set
    else if (isset($_POST['upd_shutdown'])) {
        // This indicates a request to update shutdown settings in the database

        $shutdown_value = $_POST['shutdown_value']; // Assuming the value is 0 or 1

        // Prepare and execute the update query
        $q = "UPDATE `settings` SET `shutdown` = ?";
        $values = [$shutdown_value];
        $types = "i";
        $res = execute($q, $values, $types);

        // Respond with success or error
        if ($res) {
            // Update successful, call get_general to reload the data
            get_general();
        } else {
            header('Content-Type: application/json');
            echo json_encode(array('error' => 'Database error'));
        }
    } 

    // Check if the POST parameter 'get_contacts' is set
    else if (isset($_POST['get_contacts'])) {
        // This indicates a request to fetch contact details data from the database

        // Prepare and execute the select query
        $q = "SELECT * FROM `contact_details` WHERE `sr_no` = ?";
        $values = [1];
        $types = "i";
        $res = select($q, $values, $types);

        // Respond with fetched data or error
        if ($res) {
            $data = mysqli_fetch_assoc($res);
            header('Content-Type: application/json');
            echo json_encode($data);
        } else {
            header('Content-Type: application/json');
            echo json_encode(array('error' => 'Database error'));
        }

    }   

    // Check if the POST parameter 'upd_contacts' is set
    else if (isset($_POST['upd_contacts'])) {
        // This indicates a request to update contact details in the database

        $address = filteration($_POST['address']);
        $gmap = filteration($_POST['gmap']);
        $pn1 = filteration($_POST['pn1']);
        $pn2 = filteration($_POST['pn2']);
        $email = filteration($_POST['email']);
        $fb = filteration($_POST['fb']);
        $insta = filteration($_POST['insta']);
        $tw = filteration($_POST['tw']);
        $iframe = filteration($_POST['iframe']);

        // Prepare and execute the update query
        $q = "UPDATE `contact_details` SET 
            `address` = ?, 
            `gmap` = ?, 
            `pn1` = ?, 
            `pn2` = ?, 
            `email` = ?, 
            `fb` = ?, 
            `insta` = ?, 
            `tw` = ?, 
            `iframe` = ? 
            WHERE `sr_no` = ?";
            
        $values = [$address, $gmap, $pn1, $pn2, $email, $fb, $insta, $tw, $iframe, 1];
        $types = "sssssssssi";
        $res = execute($q, $values, $types);

        // Respond with updated content or error
        if ($res) {
            $updated_content = array(
                'address' => $address,
                'gmap' => $gmap,
                'pn1' => $pn1,
                'pn2' => $pn2,
                'email' => $email,
                'fb' => $fb,
                'insta' => $insta,
                'tw' => $tw,
                'iframe' => $iframe
            );

            header('Content-Type: application/json');
            echo json_encode($updated_content);
        } else {
            header('Content-Type: application/json');
            echo json_encode(array('error' => 'Database error'));
        }
    }

    // Check if the POST parameter 'add_member' is set
    else if (isset($_POST['add_member'])) {
        // This indicates a request to add a team member to the database

        $frm_data = filteration($_POST);
    
        $img_r = uploadImage($_FILES['picture'], ABOUT_FOLDER);
    
        if ($img_r == 'inv_img') {
            echo $img_r; // Invalid image format
        } else if ($img_r == 'inv_size') {
            echo $img_r; // Invalid image size
        } else if ($img_r == 'upd_failed') {
            echo $img_r; // Image upload failed
        } else {
            $q = "INSERT INTO `team_details`(`name`, `picture`) VALUES (?, ?)";
            $values = [$frm_data['name'], $img_r];
            $res = insert($q, $values, 'ss');
            if ($res) {
                echo '1'; // Success
            } else {
                echo '0'; // Error
            }
        }
    }

    // Check if the POST parameter 'add_feature' is set
    else if (isset($_POST['add_feature'])) {
        // This indicates a request to add a feature to the database

        $frm_data = filteration($_POST);
    
        $q = "INSERT INTO `features`(`name`) VALUES (?)";
        $values = [$frm_data['name']];
        $res = insert($q, $values, 's');
        if ($res) {
            echo '1'; // Success
        } else {
            echo '0'; // Error
        }
    }

    // Check if the POST parameter 'add_facility' is set
    else if (isset($_POST['add_facility'])) {
        // This indicates a request to add a facility to the database

        $frm_data = filteration($_POST);
    
        $img_r = uploadImage($_FILES['icon'], FACILITY_FOLDER);
    
        if ($img_r == 'inv_img') {
            echo $img_r; // Invalid image format
        } else if ($img_r == 'inv_size') {
            echo $img_r; // Invalid image size
        } else if ($img_r == 'upd_failed') {
            echo $img_r; // Image upload failed
        } else {
            $q = "INSERT INTO `facilities`(`icon`, `name`, `description`) VALUES (?, ?, ?)";
            $values = [$img_r, $frm_data['name'], $frm_data['description']];
            $res = insert($q, $values, 'sss');
            if ($res) {
                echo '1'; // Success
            } else {
                echo '0'; // Error
            }
        }
    }
    
    // Check if the POST parameter 'get_team' is set
    else if (isset($_POST['get_team'])) {
        // This indicates a request to fetch team members data from the database

        // Prepare and execute the select query
        $q = "SELECT * FROM `team_details`";
        $res = query($q);

        // Respond with fetched data or error
        if ($res) {
            $data = mysqli_fetch_all($res, MYSQLI_ASSOC);
            header('Content-Type: application/json');
            echo json_encode($data);
        } else {
            header('Content-Type: application/json');
            echo json_encode(array('error' => 'Database error'));
        }
    } 
    
   // Check if the POST parameter 'get_room' is set
    else if (isset($_POST['get_room'])) {

        // Sanitize the POST data using the 'filteration' function
        $frm_data = filteration($_POST);

        // Select room information from the 'rooms' table based on 'sr_no'
        $res1 = select("SELECT * FROM rooms WHERE sr_no = ?", [$frm_data['get_room']], 'i');

        // Select room features from the 'room_features' table based on 'room_id'
        $res2 = select("SELECT * FROM room_features WHERE room_id = ?", [$frm_data['get_room']], 'i');

        // Select room facilities from the 'room_facilities' table based on 'room_id'
        $res3 = select("SELECT * FROM room_facilities WHERE room_id = ?", [$frm_data['get_room']], 'i');

        // Fetch the room data as an associative array
        $room_data = $res1->fetch_assoc();

        // Initialize arrays to store room features and facilities
        $features = [];
        $facilities = [];

        // Check if there are room features in the result
        if (mysqli_num_rows($res2) > 0) {
            // Loop through the result and extract 'features_id' into the $features array
            while ($row = mysqli_fetch_assoc($res2)) {
                array_push($features, $row['features_id']);
            }
        }

        // Check if there are room facilities in the result
        if (mysqli_num_rows($res3) > 0) {
            // Loop through the result and extract 'facilities_id' into the $facilities array
            while ($row = mysqli_fetch_assoc($res3)) {
                array_push($facilities, $row['facilities_id']);
            }
        }

        // Create a data array containing room data, features, and facilities
        $data = ["room_data" => $room_data, "features" => $features, "facilities" => $facilities];

        // Encode the data array as JSON and send it as the response
        echo json_encode($data);
    }

    // Check if the POST parameter 'delete_member' is set
    else if (isset($_POST['delete_member'])) {
        // This indicates a request to delete a team member from the database

        $member_id = $_POST['member_id'];

        // Prepare and execute the delete query
        $q = "DELETE FROM `team_details` WHERE `sr_no` = ?";
        $values = [$member_id];
        $types = "i";
        $res = execute($q, $values, $types);

        // Respond with success or error
        if ($res) {
            // Deletion successful, call get_team to reload the data
            get_team();
        } else {
            header('Content-Type: application/json');
            echo json_encode(array('error' => 'Database error'));
        }
    }

    // Check if the POST parameter 'add_room' is set
    else if (isset($_POST['add_room'])) {
        // Retrieve form data from $_POST
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $area = isset($_POST['area']) ? $_POST['area'] : '';
        $price = isset($_POST['price']) ? $_POST['price'] : '';
        $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : '';
        $adult = isset($_POST['adult']) ? $_POST['adult'] : '';
        $children = isset($_POST['children']) ? $_POST['children'] : '';
        $description = isset($_POST['description']) ? $_POST['description'] : '';
        
        // Check if JSON data is provided and decode it
        $features = isset($_POST['features']) ? json_decode($_POST['features']) : [];
        $facilities = isset($_POST['facilities']) ? json_decode($_POST['facilities']) : [];

        // Initialize flag
        $flag = 0;

        // Check if required data is empty
        if (empty($name) || empty($area) || empty($price) || empty($quantity) || empty($adult) || empty($children) || empty($description)) {
            die('One or more form fields are empty.');
        }

        $q1 = "INSERT INTO `rooms`(`name`, `area`, `price`, `quantity`, `adult`, `children`, `description`) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $values = [$name, $area, $price, $quantity, $adult, $children, $description];
        $res = insert($q1, $values, 'siiiiis');
        if ($res) {
            $room_id = mysqli_insert_id($con);
            $flag = 1;
        } else {
            $flag = 0;
            die('Error executing the query - insert');
        }
    
        // Insert room facilities into 'room_facilities' table
        $q2 = "INSERT INTO `room_facilities`(`room_id`, `facilities_id`) VALUES (?, ?)";
        if ($stmt = mysqli_prepare($con, $q2)) {
            foreach ($facilities as $f) {
                mysqli_stmt_bind_param($stmt, 'ii', $room_id, $f);
                if (!mysqli_stmt_execute($stmt)) {
                    $flag = 0;
                    die('Error executing the query - room_facilities');
                }
            }
            mysqli_stmt_close($stmt);
        } else {
            $flag = 0;
            die('Query preparation failed - room_facilities');
        }
    
        // Insert room features into 'room_features' table
        $q3 = "INSERT INTO `room_features`(`room_id`, `features_id`) VALUES (?, ?)";
        if ($stmt = mysqli_prepare($con, $q3)) {
            foreach ($features as $f) {
                mysqli_stmt_bind_param($stmt, 'ii', $room_id, $f);
                if (!mysqli_stmt_execute($stmt)) {
                    $flag = 0;
                    die('Error executing the query - room_features');
                }
            }
            mysqli_stmt_close($stmt);
        } else {
            $flag = 0;
            die('Query preparation failed - room_features');
        }
    
        if ($flag) {
            $response = array('success' => true, 'message' => 'Room added successfully.');
            echo json_encode($response);
        } else {
            $response = array('success' => false, 'message' => 'Room addition failed.');
            echo json_encode($response);
        }
    }

    // Check if the POST parameter 'edit_room' is set
    else if (isset($_POST['edit_room'])) {
        // Sanitize input data
        $frm_data = filteration($_POST);

        // Decode JSON arrays if they exist, otherwise, initialize as empty arrays
        $features = isset($_POST['features']) ? json_decode($_POST['features']) : [];
        $facilities = isset($_POST['facilities']) ? json_decode($_POST['facilities']) : [];

        $flag = true;

        // Prepare and execute room update query
        $q1 = "UPDATE `rooms` SET `name`=?, `area`=?, `price`=?, `quantity`=?, `adult`=?, `children`=?, `description`=? WHERE `sr_no`=?";
        $stmt1 = mysqli_prepare($con, $q1);
        mysqli_stmt_bind_param($stmt1, 'siiiiisi', $frm_data['name'], $frm_data['area'], $frm_data['price'], $frm_data['quantity'], $frm_data['adult'], $frm_data['children'], $frm_data['description'], $frm_data['room_id']);

        if (!mysqli_stmt_execute($stmt1)) {
            $flag = false;
            // Log the error
            error_log("Error updating room: " . mysqli_error($con));
            // Send an error response
            http_response_code(500); // Internal Server Error
            echo json_encode(array('success' => false, 'message' => 'An error occurred during the update.'));
        }

        mysqli_stmt_close($stmt1);

        // Delete existing room features
        $q_del_features = "DELETE FROM `room_features` WHERE `room_id`=?";
        $stmt_del_features = mysqli_prepare($con, $q_del_features);
        mysqli_stmt_bind_param($stmt_del_features, 'i', $frm_data['room_id']);

        if (!mysqli_stmt_execute($stmt_del_features)) {
            $flag = false;
            // Log the error
            error_log("Error deleting room features: " . mysqli_error($con));
            // Send an error response
            http_response_code(500); // Internal Server Error
            echo json_encode(array('success' => false, 'message' => 'An error occurred while deleting room features.'));
        }

        mysqli_stmt_close($stmt_del_features);

        // Delete existing room facilities
        $q_del_facilities = "DELETE FROM `room_facilities` WHERE `room_id`=?";
        $stmt_del_facilities = mysqli_prepare($con, $q_del_facilities);
        mysqli_stmt_bind_param($stmt_del_facilities, 'i', $frm_data['room_id']);

        if (!mysqli_stmt_execute($stmt_del_facilities)) {
            $flag = false;
            // Log the error
            error_log("Error deleting room facilities: " . mysqli_error($con));
            // Send an error response
            http_response_code(500); // Internal Server Error
            echo json_encode(array('success' => false, 'message' => 'An error occurred while deleting room facilities.'));
        }

        mysqli_stmt_close($stmt_del_facilities);

        // Insert new room facilities
        $q2 = "INSERT INTO `room_facilities`(`room_id`, `facilities_id`) VALUES (?, ?)";
        $stmt2 = mysqli_prepare($con, $q2);
        mysqli_stmt_bind_param($stmt2, 'ii', $frm_data['room_id'], $f);

        foreach ($facilities as $f) {
            if (!mysqli_stmt_execute($stmt2)) {
                $flag = false;
                // Log the error
                error_log("Error inserting facility: " . mysqli_error($con));
                // Send an error response
                http_response_code(500); // Internal Server Error
                echo json_encode(array('success' => false, 'message' => 'An error occurred while inserting facilities.'));
            }
        }

        mysqli_stmt_close($stmt2);

        // Insert new room features
        $q3 = "INSERT INTO `room_features`(`room_id`, `features_id`) VALUES (?, ?)";
        $stmt3 = mysqli_prepare($con, $q3);
        mysqli_stmt_bind_param($stmt3, 'ii', $frm_data['room_id'], $f);

        foreach ($features as $f) {
            if (!mysqli_stmt_execute($stmt3)) {
                $flag = false;
                // Log the error
                error_log("Error inserting feature: " . mysqli_error($con));
                // Send an error response
                http_response_code(500); // Internal Server Error
                echo json_encode(array('success' => false, 'message' => 'An error occurred while inserting features.'));
            }
        }

        mysqli_stmt_close($stmt3);

        // Handle the final response
        if ($flag) {
            $response = array('success' => true, 'message' => 'Room updated successfully.');
            echo json_encode($response);
        } else {
            $response = array('success' => false, 'message' => 'Room update failed.');
            echo json_encode($response);
        }
    }

    // Check if the POST parameter 'add_room_image' is set
    else if (isset($_POST['add_room_image'])) {
        // This indicates a request to add a team member to the database

        $frm_data = filteration($_POST);
    
        $img_r = uploadRoomImage($_FILES['picture'], ROOMS_FOLDER);
    
        if ($img_r == 'inv_img') {
            echo $img_r; // Invalid image format
        } else if ($img_r == 'inv_size') {
            echo $img_r; // Invalid image size
        } else if ($img_r == 'upd_failed') {
            echo $img_r; // Image upload failed
        } else {
            $q = "INSERT INTO `room_images`(`room_id`, `picture`) VALUES (?, ?)";
            $values = [$frm_data['room_id'], $img_r];
            $res = insert($q, $values, 'is');
            if ($res) {
                echo '1'; // Success
            } else {
                echo '0'; // Error
            }
        }
    }
    
    // Check if the POST parameter 'add_carousel_image' is set
    else if (isset($_POST['add_carousel_image'])) {
        // Check if the 'picture' file was uploaded
        if (isset($_FILES['picture'])) {
            $img_r = uploadCarouselImage($_FILES['picture'], CAROUSEL_FOLDER);
    
            if ($img_r == 'inv_img') {
                echo $img_r; // Invalid image format
            } else if ($img_r == 'inv_size') {
                echo $img_r; // Invalid image size
            } else if ($img_r == 'upd_failed') {
                echo $img_r; // Image upload failed
            } else {
                // Insert the image path into the carousel table (adjust the table and column names accordingly)
                $q = "INSERT INTO `carousel`(`image_name`) VALUES (?)";
                $values = [$img_r];
                $res = execute($q, $values, 's');
                if ($res) {
                    echo '1'; // Success
                } else {
                    echo '0'; // Error
                }
            }
        } else {
            echo 'no_image_uploaded'; // No image file uploaded
        }
    }

    // Check if the POST parameter 'upd_thumb' is set
    else if (isset($_POST['upd_thumb'])) {
        // This indicates a request to update the 'thumb' field in the 'room_images' table
    
        $sr_no = $_POST['sr_no'];
        $room_id = $_POST['room_id'];
    
        if ($con) {
            // Prepare and execute the update query for 'room_id'
            $q1 = "UPDATE `room_images` SET `thumb` = ? WHERE `room_id` = ?";
            $stmt1 = $con->prepare($q1);
    
            // Set 'thumb' to 0 in the query
            $values1 = [0, $room_id];
            $stmt1->bind_param("ii", $values1[0], $values1[1]);
    
            if ($stmt1->execute()) {
                echo "Success"; // You can send a response back to JavaScript if needed
            } else {
                echo "Error"; // You can send a response back to JavaScript if needed
            }
    
            $stmt1->close();
    
            // Prepare and execute the update query for 'sr_no'
            $q2 = "UPDATE `room_images` SET `thumb` = 1 WHERE `sr_no` = ?";
            $stmt2 = $con->prepare($q2);
            $stmt2->bind_param("i", $sr_no);
    
            if ($stmt2->execute()) {
                echo "Success"; // You can send a response back to JavaScript if needed
            } else {
                echo "Error"; // You can send a response back to JavaScript if needed
            }
    
            $stmt2->close();
        } else {
            echo "Database connection failed"; // Handle the case where the database connection is not available.
        }
    }

    // Check if the POST parameter 'delete_room' is set
    else if (isset($_POST['delete_room'])) {
        // This indicates a request to delete a room and its corresponding images.
        
        $sr_no = $_POST['sr_no'];
        
        // The upload path and rooms folder are defined in essentials.php file.
        // define('UPLOAD_IMAGE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/assets/images/');
        // define('ROOMS_FOLDER', 'rooms/');
        
        $basePath = UPLOAD_IMAGE_PATH . ROOMS_FOLDER;
        
        // Fetch the picture names for the room
        $q1 = "SELECT picture FROM room_images WHERE room_id = ?";
        $stmt1 = $con->prepare($q1);
        $stmt1->bind_param('i', $sr_no);
        $stmt1->execute();
        $stmt1->bind_result($picture);
        
        // Deletes the pictures from the root directory.
        while ($stmt1->fetch()) {
            $filePath = $basePath . $picture; // Construct the file path.
            if (file_exists($filePath)) {
                if (unlink($filePath)) {
                    echo "File $filePath has been deleted successfully.";
                } else {
                    echo "Unable to delete $filePath.";
                }
            } else {
                echo "File $filePath does not exist.";
            }
        }
        
        // Delete all records for the room from the room_images table.
        $q2 = "DELETE FROM room_images WHERE room_id = ?";
        $stmt2 = $con->prepare($q2);
        $stmt2->bind_param('i', $sr_no);
        
        if ($stmt2->execute()) {
            echo "Room and associated pictures have been deleted from the database.";
        } else {
            echo "Error deleting room and associated pictures from the database.";
        }
    
        // Delete room features from the database
        $q3 = "DELETE FROM room_features WHERE room_id = ?";
        $stmt3 = $con->prepare($q3);
        $stmt3->bind_param('i', $sr_no);
        
        if ($stmt3->execute()) {
            echo "Room features have been deleted from the database.";
        } else {
            echo "Error deleting room features from the database.";
        }
    
        // Delete room facilities from the database
        $q4 = "DELETE FROM room_facilities WHERE room_id = ?";
        $stmt4 = $con->prepare($q4);
        $stmt4->bind_param('i', $sr_no);
        
        if ($stmt4->execute()) {
            echo "Room facilities have been deleted from the database.";
        } else {
            echo "Error deleting room facilities from the database.";
        }
    
        // Delete the room from the rooms table.
        $q5 = "DELETE FROM rooms WHERE sr_no = ?";
        $stmt5 = $con->prepare($q5);
        $stmt5->bind_param('i', $sr_no);
        
        if ($stmt5->execute()) {
            echo "Room has been deleted from the database.";
        } else {
            echo "Error deleting room from the database.";
        }
    
        $stmt5->close(); // Close the statement.
        $stmt4->close(); // Close the statement.
        $stmt3->close(); // Close the statement.
        $stmt2->close(); // Close the statement.
        $stmt1->close(); // Close the statement.
    }
    
    
    // If none of the expected POST parameters are set, respond with an error
    else {
        header('Content-Type: application/json');
        echo json_encode(array('error' => 'Invalid request'));
    }

?>
