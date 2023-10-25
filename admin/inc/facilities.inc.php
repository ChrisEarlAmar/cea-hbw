<?php
    // Include the database connection
    require('db_connection.php');

    // Fetch users from the database
    $query = "SELECT * FROM facilities ORDER BY sr_no ASC";
    $result = $conn->query($query);

    // Check if there are any results
    if ($result->num_rows > 0) {
        // Iterate over each row
        while ($row = $result->fetch_assoc()) {
            echo '<tr>
                    <td class="text-center">' . $row['sr_no'] . '</td>
                    <td><img src="../assets/images/facilities/' . $row['icon'] . '" width="60px"></td>
                    <td class="text-center">' . $row['name'] . '</td>
                    <td class="justify-text">' . $row['description'] . '</td>
                    <td class="text-center"><button class="btn btn-danger shadow-none delete-team btn-sm" data-userid="' . $row['sr_no'] . '" onclick="delete_facility(' . $row['sr_no'] . ')"><i class="bi bi-trash-fill me-1"></i> Delete</button></td>
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
