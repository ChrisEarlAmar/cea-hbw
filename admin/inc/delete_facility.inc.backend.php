<?php
require_once('db_connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete Picture from Root Directory
    $fetchQuery = "SELECT icon FROM facilities WHERE sr_no = ?";
    $fetchStmt = $conn->prepare($fetchQuery);
    $fetchStmt->bind_param('i', $id);
    $fetchStmt->execute();
    $fetchStmt->bind_result($picture);

    if ($fetchStmt->fetch()) {
        // Picture retrieved successfully.
        header('Content-Type: image/jpeg'); // Change the content type as needed.
        echo $picture;
    } else {
        echo 'Error fetching picture: No data found.';
    }

    $basePath = "C:/wamp64/www/cea-hbw/assets/images/facilities/";
    $filePath = $basePath . $picture;

    if (file_exists($filePath)) {
        if (unlink($filePath)) {
            echo "File $filePath has been deleted successfully.";
        } else {
            echo "Unable to delete $filePath.";
        }
    } else {
        echo "File $filePath does not exist.";
    }

    $fetchStmt->close();

    // Delete Team Member from the database
    $query = "DELETE FROM facilities WHERE sr_no = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        // Team Member deleted successfully. Now, fetch and return the Team Member list HTML.
        require_once('inc/facilities.inc.php');
    } else {
        echo 'Error deleting user: ' . $stmt->error;
    }

        $stmt->close();
    } else {
        echo 'Invalid request.';
    }   

    $conn->close();
?>
