<?php
    require('db_connection.php');

    // Fetch facilities from the database
    $query = "SELECT * FROM facilities";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

            echo '
                                                <div class="col-md-3">
                                                    <label>
                                                        <input type="checkbox" name="facilities" value="' . $row['sr_no'] . '" class="form-checkbox-input facilities shadow-none"/>
                                                        ' . $row['name'] . '
                                                    </label>
                                                </div>
                                            ';
        }

    } else {    
        echo '
                                                <div class="col-md-3">
                                                    <label>
                                                        <input type="checkbox" name="facilities" value="" class="form-checkbox-input shadow-none"/>
                                                        No Facilities Available.
                                                    </label>
                                                </div>
                                                
                                            ';
    }

    $conn->close();
?>