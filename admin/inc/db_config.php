<?php 

    $con = mysqli_connect('localhost', 'root', '', 'hbwebsite');

    if(!$con) {
        die("Could not connect to " . $hname . " database" . mysqli_connect_error()); 
    }

    function filteration($data) {
        foreach($data as $key => $value) {
            $data[$key] = trim($value);             // Remove leading/trailing whitespace
            $data[$key] = stripslashes($value);     // Remove backslashes (useful for escaping)
            $data[$key] = htmlspecialchars($value); // Convert special characters to HTML entities
            $data[$key] = strip_tags($value);       // Remove HTML and PHP tags
        }
        return $data; // Return the sanitized data
    }

    function select($query, $values, $types) {
        global $con;
    
        $stmt = mysqli_prepare($con, $query);
    
        if (!$stmt) {
            die("Statement preparation error: " . mysqli_error($con));
        }
    
        mysqli_stmt_bind_param($stmt, $types, ...$values);
    
        if (!mysqli_stmt_execute($stmt)) {
            die("Execution error: " . mysqli_stmt_error($stmt));
        }
    
        $result = mysqli_stmt_get_result($stmt);
    
        mysqli_stmt_close($stmt);
    
        return $result;
    }
    
    function execute($query, $values, $types) {
        global $con;
    
        $stmt = mysqli_prepare($con, $query);
    
        if (!$stmt) {
            die("Statement preparation error: " . mysqli_error($con));
        }
    
        mysqli_stmt_bind_param($stmt, $types, ...$values);
    
        if (!mysqli_stmt_execute($stmt)) {
            die("Execution error: " . mysqli_stmt_error($stmt));
        }
    
        mysqli_stmt_close($stmt);
    
        return true;
    }
    
    function insert($query, $values, $types) {
        global $con;
    
        $stmt = mysqli_prepare($con, $query);
    
        if (!$stmt) {
            die("Statement preparation error: " . mysqli_error($con));
        }
    
        mysqli_stmt_bind_param($stmt, $types, ...$values);
    
        if (!mysqli_stmt_execute($stmt)) {
            die("Execution error: " . mysqli_stmt_error($stmt));
        }
    
        mysqli_stmt_close($stmt);
    
        return true;

    }

    function selectAll($tableName) {
        global $con;
        $sql = "SELECT * FROM $tableName";
        $result = $con->query($sql);
    
        if (!$result) {
            die("Error in SQL query: " . $con->error);
        }
    
        return $result;
    }

?>
