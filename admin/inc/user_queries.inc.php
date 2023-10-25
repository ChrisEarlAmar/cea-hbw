<?php
    // Include the database connection
    require('db_connection.php');

    // Fetch users from the database
    $query = "SELECT * FROM user_queries ORDER BY sr_no DESC";
    $result = $conn->query($query);

    // Check if there are any results
    if ($result->num_rows > 0) {
        // Iterate over each row
        while ($row = $result->fetch_assoc()) {
            echo '<tr>
                    <td>' . $row['name'] . '</td>
                    <td class="text-center">' . $row['email'] . '</td>
                    <td>' . $row['message'] . '</td>
                    <td class="text-center">' . $row['date'] . '</td>
                    <td>';

            // Check if 'seen' is 0
            if ($row['seen'] == 0) {
                echo '<div class="mb-2">
                        <button class="rounded-pill btn btn-primary shadow-none btn-sm" data-userid="' . $row['sr_no'] . '" onclick="modify_user_query(' . $row['sr_no'] . ')">
                            <i class="bi bi-envelope-open-fill me-1"></i> Mark As Read
                        </button>
                      </div>';
            } else {
                echo '<div class="mb-2">
                        <button class="rounded-pill btn btn-success shadow-none btn-sm" data-userid="' . $row['sr_no'] . '" onclick="modify_user_query(' . $row['sr_no'] . ')">
                            <i class="bi bi-envelope-fill me-1"></i> Unmark As Read
                        </button>
                      </div>';
            }

            echo '<div>
                    <button class="rounded-pill btn btn-danger shadow-none delete-team btn-sm" data-userid="' . $row['sr_no'] . '" onclick="delete_user_query(' . $row['sr_no'] . ')">
                        <i class="bi bi-trash-fill me-1"></i> Delete
                    </button>
                  </div>
                </td>
            </tr>';
        }
    } else {
        // No user queries found
        echo '<tr>
                <td>< blank ></th>
                <td>< blank ></td>
                <td>< blank ></td>
                <td>< blank ></td>
                <td>< blank ></td>
            </tr>';
    }

    // Close the database connection
    $conn->close();
?>
