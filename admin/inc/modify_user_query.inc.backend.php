<?php
require_once('db_connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the current value of 'seen'
    $selectQuery = "SELECT seen FROM user_queries WHERE sr_no = ?";
    $selectStmt = $conn->prepare($selectQuery);
    $selectStmt->bind_param('i', $id);
    
    if ($selectStmt->execute()) {
        $selectResult = $selectStmt->get_result();
        if ($selectResult->num_rows === 1) {
            $row = $selectResult->fetch_assoc();
            $currentSeenValue = $row['seen'];
            
            // Toggle the value of 'seen'
            $newSeenValue = ($currentSeenValue == 0) ? 1 : 0;
            
            // Update the 'seen' value
            $updateQuery = "UPDATE user_queries SET seen = ? WHERE sr_no = ?";
            $updateStmt = $conn->prepare($updateQuery);
            $updateStmt->bind_param('ii', $newSeenValue, $id);
            
            if ($updateStmt->execute()) {
                echo 'Toggle successful';
                require_once('inc/user_queries.inc.php'); // Refresh the carousel image list
            } else {
                echo 'Error updating the "seen" value.';
                require_once('inc/user_queries.inc.php'); // Refresh the carousel image list
            }
        } else {
            require_once('inc/user_queries.inc.php'); // Refresh the carousel image list
            echo 'User query not found.';
        }
    } else {
        echo 'Error fetching the "seen" value.';
        require_once('inc/user_queries.inc.php'); // Refresh the carousel image list
    }
} else {
    echo 'Invalid request.';
}

// Close the database connection
$conn->close();
?>
