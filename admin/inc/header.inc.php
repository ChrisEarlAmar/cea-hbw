    <?php require('inc/header-title.inc.php');?>
 
    <div class="container-fluid bg-dark text-light p-3 d-flex align-items-center justify-content-between sticky-top">
        <h3 class="mb-0 h-font" id="header_site_title"><?php echo $siteTitle; ?></h3>
        <a href="logout.php" class="btn custom-btn text-white btn-sm" href="">LOGOUT</a>
    </div>

    <div class="col-lg-2 bg-dark border-top border-3 border-secondary position-fixed" style="height: 100%; position: fixed; z-index: 2;" id="sidebar_menu">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid flex-lg-column align-items-stretch">
                <h4 class="mt-2 text-light">ADMIN PANEL</h4>
                <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="collapse" data-bs-target="#admin_dropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-caret-down-fill text-white"></i>
                </button>
                <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="admin_dropdown">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a class="nav-link text-white" id="dashboard_link_id" href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" id="rooms_link_id" href="rooms.php">Rooms</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" id="f_f_link_id" href="features_facilities.php">Features & Facilities</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" id="carousel_link_id" href="carousel.php">Carousel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" id="users_link_id" href="user_queries.php">User Queries</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" id="settings_link_id" href="settings.php">Settings</a>
                        </li>   
                    </ul>

                </div>
            </div>
        </nav>
    </div>

    <script src="js/admin-header.js"></script>
