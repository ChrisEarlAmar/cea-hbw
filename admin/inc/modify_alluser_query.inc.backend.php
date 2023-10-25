<?php
require_once('db_connection.php');

// Fetch all user queries
$selectQuery = "SELECT sr_no, seen FROM user_queries";
$selectStmt = $conn->prepare($selectQuery);

if ($selectStmt->execute()) {
    $selectResult = $selectStmt->get_result();
    while ($row = $selectResult->fetch_assoc()) {
        $id = $row['sr_no'];
        $currentSeenValue = $row['seen'];

        // Check if the 'seen' value is 0
        if ($currentSeenValue == 0) {
            // Toggle the value of 'seen' to 1
            $newSeenValue = 1;

            // Update the 'seen' value
            $updateQuery = "UPDATE user_queries SET seen = ? WHERE sr_no = ?";
            $updateStmt = $conn->prepare($updateQuery);
            $updateStmt->bind_param('ii', $newSeenValue, $id);

            if ($updateStmt->execute()) {
                // Successful update
                echo 'Updated ' . $id . ' to 1<br>';
            } else {
                // Error updating the 'seen' value
                echo 'Error updating ' . $id . '<br>';
            }
        } else {
            // 'seen' value is already 1, no update needed
            echo 'Skipped ' . $id . ' (already seen)<br>';
        }
    }
} else {
    // Error fetching user queries
    echo 'Error fetching user queries.';
}

// Close the database connection
$conn->close();
?>
