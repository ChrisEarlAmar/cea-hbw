<?php
require_once('db_connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete Team Member from the database
    $query = "DELETE FROM features WHERE sr_no = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        // Team Member deleted successfully. Now, fetch and return the Team Member list HTML.
        require_once('inc/features.inc.php');
    } else {
        echo 'Error deleting user: ' . $stmt->error;
    }

        $stmt->close();
    } else {
        echo 'Invalid request.';
    }   

    $conn->close();
?>
