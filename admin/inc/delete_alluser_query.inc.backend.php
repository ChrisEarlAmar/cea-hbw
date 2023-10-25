<?php
require_once('db_connection.php');

// Delete all user queries
$deleteQuery = "DELETE FROM user_queries";
$deleteStmt = $conn->prepare($deleteQuery);

if ($deleteStmt->execute()) {
    // Successful deletion
    echo 'All user queries have been deleted.';
} else {
    // Error deleting user queries
    echo 'Error deleting user queries.';
}

// Close the database connection
$conn->close();
?>
