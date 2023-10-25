<?php
    // Include the database connection
    require('db_connection.php');

    // Fetch users from the database
    $room_id = $_GET['room_id']; // Make sure to properly validate and sanitize user input
    $query = "SELECT * FROM room_images WHERE room_id = ?";
    
    // Use a prepared statement to prevent SQL injection
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $room_id); // Assuming room_id is an integer, adjust the type accordingly

    $stmt->execute();

    // Get the results
    $result = $stmt->get_result();

    // Check if there are any results
    if ($result->num_rows > 0) {
        // Iterate over each row
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td class="text-center"><img class="d-block w-100 object-fit-cover" id="' . $row['picture'] . '" src="../assets/images/rooms/' . $row['picture'] . '" /></td>';
            echo '<td class="text-center">';
            
            if ($row['thumb'] == 1) {
                echo '<button class="btn btn-success shadow-none btn-sm"><i class="bi bi-check-lg fw-bolder me-1"></i>Thumb</button>';
            } else {
                echo '<button class="btn btn-danger shadow-none btn-sm" onclick="set_as_thumb(' . $row['sr_no'] . ',  ' . $row['room_id'] . ')"><i class="bi bi-x-lg fw-bolder me-1"></i>Thumb</button>';
            }
            
            echo '</td>';
            // echo '<td class="text-center">' . $row['sr_no'] . ' And ' . $row['room_id'] . '</td>';
            echo '<td class="text-center"><button class="btn btn-danger shadow-none btn-sm" data-userid="' . $row['sr_no'] . '" onclick="delete_room_image(' . $row['sr_no'] . ')"><i class="bi bi-trash-fill me-1"></i> Delete</button></td>';
            echo '</tr>';
        }
    } else {
        // No room images found
        echo '<tr>
                <td class="text-center" colspan="3">Blank</td>
              </tr>';
    }

    // Close the prepared statement and the database connection
    $stmt->close();
    $conn->close();
?>
