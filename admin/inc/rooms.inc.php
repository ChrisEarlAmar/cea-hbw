<?php
    // Include the database connection
    require('db_connection.php');

    // Fetch rooms from the database
    $query = "SELECT * FROM rooms ORDER BY sr_no ASC";
    $result = $conn->query($query);

    // Check if there are any results
    if ($result->num_rows > 0) {
        // Iterate over each room
        while ($row = $result->fetch_assoc()) {
            echo '<tr>
                    <td class="text-center">' . $row['sr_no'] . '</td>
                    <td class="text-center">' . $row['name'] . '</td>
                    <td class="text-center">' . $row['area'] . ' sq. ft.</td>
                    <td class="text-center"><span class="badge rounded-pill text-bg-light"><strong>Adults</strong>: ' . $row['adult'] . '</span><br><span class="badge rounded-pill text-bg-light"><strong>Children</strong>: ' . $row['children'] . '</span></td>
                    <td class="text-center">₱ ' . $row['price'] . '.00</td>
                    <td class="text-center">' . $row['quantity'] . '</td>';

            // Check if 'status' is 0
            if ($row['status'] == 0) {
                echo '<td class="text-center">
                        <button class="btn btn-secondary shadow-none delete-team btn-sm" data-userid="' . $row['sr_no'] . '" onclick="change_room_status(' . $row['sr_no'] . ')" title="Activate ' . $row['name'] . '">
                            <i class="bi bi-toggle-off me-1"></i> Inactive
                        </button>
                    </td>';
            } else {
                echo '<td class="text-center">
                        <button class="btn custom-btn shadow-none delete-team btn-sm" data-userid="' . $row['sr_no'] . '" onclick="change_room_status(' . $row['sr_no'] . ')" title="Inactivate ' . $row['name'] . '">
                            <i class="bi bi-toggle-on me-1"></i> Active
                        </button>
                    </td>';
            }

            echo '<td class="text-center">
                    <button class="btn btn-primary shadow-none delete-team btn-sm mb-2" data-userid="' . $row['sr_no'] . '" onclick="edit_room(' . $row['sr_no'] . ')" title="Edit ' . $row['name'] . '">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                    <button class="btn btn-info shadow-none delete-team btn-sm mb-2" data-userid="' . $row['sr_no'] . '" onclick="view_room_images(' . $row['sr_no'] . ')" title="Images for ' . $row['name'] . '">
                        <i class="bi bi-image"></i>
                    </button>
                    <button class="btn btn-danger shadow-none delete-team btn-sm mb-2" data-userid="' . $row['sr_no'] . '" onclick="delete_room(' . $row['sr_no'] . ')" title="Delete ' . $row['name'] . '">
                        <i class="bi bi-trash-fill"></i>
                    </button>
                </td>
            </tr>';
        }
    } else {
        // No rooms found
        echo '<tr>
                <td colspan="8" class="text-center"><em>No rooms available</em></td>
            </tr>';
    }

    // Close the database connection
    $conn->close();
?>
