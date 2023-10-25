<?php
require_once('db_connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the current value of 'status'
    $selectQuery = "SELECT status FROM rooms WHERE sr_no = ?";
    $selectStmt = $conn->prepare($selectQuery);
    $selectStmt->bind_param('i', $id);
    
    if ($selectStmt->execute()) {
        $selectResult = $selectStmt->get_result();
        if ($selectResult->num_rows === 1) {
            $row = $selectResult->fetch_assoc();
            $currentStatusValue = $row['status'];
            
            // Toggle the value of 'status'
            $newStatusValue = ($currentStatusValue == 0) ? 1 : 0;
            
            // Update the 'status' value
            $updateQuery = "UPDATE rooms SET status = ? WHERE sr_no = ?";
            $updateStmt = $conn->prepare($updateQuery);
            $updateStmt->bind_param('ii', $newStatusValue, $id);
            
            if ($updateStmt->execute()) {
                echo 'Toggle successful';
                require_once('inc/rooms.inc.php'); // Refresh the carousel image list
            } else {
                echo 'Error updating the "status" value.';
                require_once('inc/rooms.inc.php'); // Refresh the carousel image list
            }
        } else {
            require_once('inc/rooms.inc.php'); // Refresh the carousel image list
            echo 'Room not found.';
        }
    } else {
        echo 'Error fetching the "status" value.';
        require_once('inc/rooms.inc.php'); // Refresh the carousel image list
    }
} else {
    echo 'Invalid request.';
}

// Close the database connection
$conn->close();
?>
