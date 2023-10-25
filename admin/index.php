<?php 
    require('inc/db_config.php');
    require('inc/essentials.php');

    session_start();
    session_regenerate_id(true);
    if ((isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true)) {
        header("location: dashboard.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
        <!-- Links for CSS and JS-->
        <?php require('inc/links.inc.php') ?>
</head>
<body class="bg-light">

    <div class="row w-100 justify-content-center ms-auto center-container">
        <div class="col-lg-4 col-md-8 col-sm-12 col-xs-auto">
            <div class="card shadow">
                <div class="card-header bg-dark text-white mb-2">
                    <h5 class="d-flex align-items-center my-3">
                        <i class="bi bi-person-fill-gear fs-3 m-2"></i>
                        Admin Login
                    </h5>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control shadow-none" id="admin_name" name="admin_name" placeholder="Admin Name" required>
                            <!-- <input type="email" class="form-control shadow-none" id="floatingInput" placeholder=""> -->
                            <label for="admin_name">Admin Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control shadow-none" id="admin_pass" name="admin_pass" placeholder="Password" required>
                            <!-- <input type="password" class="form-control shadow-none" id="floatingPassword" placeholder=""> -->
                            <label for="admin_pass">Password</label>
                            </div>
                        <div class="d-flex align-items-center justify-content-center mb-2">
                            <button name="login" type="submit" class="btn text-white btn-lg custom-btn shadow-none w-100">LOGIN</button>
                            <!-- <button type="submit" class="btn text-white custom-btn btn-lg shadow-none w-100">LOGIN</button> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php 
    
    if(isset($_POST['login'])) {
        $frm_data = filteration($_POST);
        $query = "SELECT * FROM `admin_cred` WHERE `admin_name` = ? AND `admin_pass` = ?";
        $values = [$frm_data['admin_name'], $frm_data['admin_pass']];
        $res = select($query, $values, "ss");

        if ($res->num_rows==1) {
            $row = mysqli_fetch_assoc($res);  
            // session_start();
            $_SESSION['adminLogin'] = true;
            $_SESSION['adminId'] = $row['sr_no'];
            redirect('dashboard.php');          
        }
        else {
            alert('error', 'Login failed - Invalid Credentials!');
        }

    }
    
    ?>


</body>
</html>