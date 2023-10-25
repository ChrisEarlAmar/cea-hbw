<?php
    require('db_connection.php');

    // Fetch features from the database
    $query = "SELECT * FROM features";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

            echo '
                                                <div class="col-md-3">
                                                    <label>
                                                        <input type="checkbox" name="features" value="' . $row['sr_no'] . '" class="form-checkbox-input features shadow-none"/>
                                                        ' . $row['name'] . '
                                                    </label>
                                                </div>
                                            ';
        }

    } else {    
        echo '
                                                <div class="col-md-3">
                                                    <label>
                                                        <input type="checkbox" name="features" value="" class="form-checkbox-input shadow-none"/>
                                                        No Features Available.
                                                    </label>
                                                </div>
                                                
                                            ';
    }

    $conn->close();
?>