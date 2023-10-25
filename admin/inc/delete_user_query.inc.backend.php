<?php
require_once('db_connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the DELETE statement
    $Query = "DELETE FROM user_queries WHERE sr_no = ?";
    $Stmt = $conn->prepare($Query);

    if ($Stmt === false) {
        // Handle the error (e.g., log it or show an error message)
        echo 'Error: Unable to prepare the statement.';
    } else {
        // Bind the parameter
        $Stmt->bind_param('i', $id);

        // Execute the statement
        if ($Stmt->execute()) {
            // Query executed successfully
            echo 'User query deleted successfully.';
            require_once('inc/user_queries.inc.php'); // Refresh the carousel image list
        } else {
            // Handle the error (e.g., log it or show an error message)
            echo 'Error: Unable to delete the user query.';
        }

        // Close the statement
        $Stmt->close();
    }
} else {
    echo 'Invalid request.';
}

// Close the database connection
$conn->close();
?>
