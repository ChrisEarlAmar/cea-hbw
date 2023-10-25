<?php
require_once('db_connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the image filename from the database
    $fetchQuery = "SELECT image_name FROM carousel WHERE sr_no = ?";
    $fetchStmt = $conn->prepare($fetchQuery);
    $fetchStmt->bind_param('i', $id);

    if ($fetchStmt->execute()) {
        $fetchStmt->bind_result($picture);
        if ($fetchStmt->fetch()) {
            $basePath = "C:/wamp64/www/cea-hbw/assets/images/carousel/";
            $filePath = $basePath . $picture;

            // Check if the file exists and delete it
            if (file_exists($filePath) && unlink($filePath)) {
                // Successfully deleted the file

                // Close the prepared statement
                $fetchStmt->close();

                // Delete the record from the database
                $deleteQuery = "DELETE FROM carousel WHERE sr_no = ?";
                $deleteStmt = $conn->prepare($deleteQuery);
                $deleteStmt->bind_param('i', $id);

                if ($deleteStmt->execute()) {
                    // Successfully deleted the record
                    require_once('inc/carousel.image.inc.php'); // Refresh the carousel image list
                } else {
                    echo 'Error deleting record: ' . $deleteStmt->error;
                }

                $deleteStmt->close();
            } else {
                echo "Error deleting the file or file does not exist: $filePath";
            }
        } else {
            echo 'Error fetching picture: No data found.';
        }
    } else {
        echo 'Error executing fetch query: ' . $fetchStmt->error;
    }
} else {
    echo 'Invalid request.';
}

// Close the database connection
$conn->close();
?>
