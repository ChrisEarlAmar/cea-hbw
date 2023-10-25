<?php
    require('inc/essentials.php');
    require('inc/db_config.php');
    adminLogin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Settings</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Links for CSS and JS -->
    <?php require('inc/links.inc.php') ?>
    <link rel="stylesheet" type="text/css" href="css/settings.css">
</head>
<body class="bg-light">

    <!-- Header -->
    <?php require('inc/header.inc.php');?>
    
    <div class="container-fluid" id="main_content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">

                <h3 class="mb-4">SETTINGS</h3>

                <!-- General Settings -->
                <div class="border-0 mb-4 rounded bg-white shadow-sm p-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">General Settings</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#general_s">
                                <i class="bi bi-pencil-square text-white me-1"></i> Edit
                            </button>
                        </div>
                        <h6 class="card-subtitle mb-1 fw-bold">Site Title</h6>
                        <p class="card-text" id="site_title">Loading...</p>
                        <h6 class="card-subtitle mb-1 fw-bold">About us</h6>
                        <p class="card-text" id="site_about">Loading...</p>
                        <p class="card-text d-none" id="">Loading...</p>
                    </div>
                </div>

                <!-- General Settings Modal -->
                <div class="modal fade" id="general_s" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="general_s" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">General Settings</h5>
                                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="site_title_modal_input" class="form-label fw-bold">Site Title</label>
                                    <input type="text" class="form-control shadow-none" name="site_title" id="site_title_modal_input" required>
                                </div>
                                <div class="mb-3">
                                    <label for="site_about_modal_input" class="form-label fw-bold">About us</label>
                                    <textarea class="form-control shadow-none" name="site_about" id="site_about_modal_input" rows="6" required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" onclick="resetFormValues()" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                                <button type="button" onclick="upd_general()" class="btn custom-bg text-white shadow-none">SAVE</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Shutdown Website Section -->
                <div class="border-0 mb-4 rounded bg-white shadow-sm p-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Shutdown Website</h5>
                            <div class="negative-m flex-row d-flex">
                                <input type="checkbox" class="toggle_custom" onchange="upd_shutdown(this.checked ? 1 : 0)" id="shutdown_toggle"/>
                                <label class="toggle_custom_label" for="shutdown_toggle">Toggle</label>
                            </div>
                        </div> 
                        <p class="card-text">Shutting down website will disbable users to use several website features.</p>
                        <p class="card-text d-none" id="shutdownp">Loading...</p>
                    </div>
                </div>

                <!-- Contact Details -->
                <div class="border-0 mb-4 rounded bg-white shadow-sm p-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Contact Settings</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#contacts-s">
                                <i class="bi bi-pencil-square text-white me-1"></i> Edit
                            </button>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Address</h6>
                                    <p class="card-text"><i class="bi bi-geo-alt-fill me-1"></i><span id="address"> Loading...</span></p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Google Map</h6>
                                    <p class="card-text"><i class="bi bi-geo-alt-fill me-1"></i><span id="gmap"> Loading...</span></p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Phone Number</h6>
                                    <p class="card-text mb-1" id="gmap">
                                        <i class="bi bi-telephone-fill"></i>
                                        <span id="pn1"> Loading...</span>
                                    </p>
                                    <p class="card-text" id="gmap">
                                        <i class="bi bi-phone-fill"></i>
                                        <span id="pn2"> Loading...</span>
                                    </p>
                                </div>
                                <div class="mb-2">
                                    <h6 class="card-subtitle mb-1 fw-bold">E-mail</h6>
                                    <p class="card-text"><i class="bi bi-envelope-fill me-1"></i><span id="email"> Loading...</span></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Social Media Links</h6>
                                    <p class="card-text mb-1" id="gmap">
                                        <i class="bi bi-twitter me-1"></i>
                                        <span id="tw">Loading...</span>
                                    </p>
                                    <p class="card-text mb-1" id="gmap">
                                        <i class="bi bi-facebook me-1"></i>
                                        <span id="fb">Loading...</span>
                                    </p>
                                    <p class="card-text" id="gmap">
                                        <i class="bi bi-instagram me-1"></i>
                                        <span id="insta">Loading...</span>
                                    </p>
                                </div>
                                <div class="mb-2">
                                    <h6 class="card-subtitle mb-1 fw-bold">iFrame</h6>
                                    <iframe id="iframe" class="border rounded p-2 w-100" loading="lazy" frameborder="0"></iframe>
                                </div>
                            </div>
                        </div>                    
                    </div>
                </div>

                <!-- Contact Settings Modal --> 
                <div class="modal fade" id="contacts-s" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Contact Settings</h5>
                                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid p-0">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="address_modal_input" class="form-label fw-bold">Address</label>
                                                <input type="text" class="form-control shadow-none" id="address_modal_input">
                                            </div>
                                            <div class="mb-3">
                                                <label for="gmap_modal_input" class="form-label fw-bold">Google Map Link</label>
                                                <input type="text" class="form-control shadow-none" id="gmap_modal_input">
                                            </div>
                                            <div class="mb-3">
                                                <label for="phone_number" class="form-label fw-bold">Phone Numbers</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                                                    <input type="text" class="form-control shadow-none" name="phone_number" id="pn1_modal_input" maxlength="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="bi bi-phone-fill"></i></span>
                                                    <input type="text" class="form-control shadow-none" name="phone_number" id="pn2_modal_input" maxlength="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="phoneNumber" class="form-label fw-bold">Email</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                                                    <input type="email" class="form-control shadow-none" id="email_modal_input" placeholder="name@example.com">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="phoneNumber" class="form-label fw-bold">Social Media Links</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="bi bi-twitter"></i></span>
                                                    <input type="text" class="form-control shadow-none" id="tw_modal_input">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="bi bi-facebook"></i></span>
                                                    <input type="text" class="form-control shadow-none" id="fb_modal_input">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="bi bi-instagram"></i></span>
                                                    <input type="text" class="form-control shadow-none" id="insta_modal_input">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="iframe_modal_input" class="form-label fw-bold">Iframe</label>
                                                <input type="text" class="form-control shadow-none" id="iframe_modal_input">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="resetFormValues()" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                                    <button type="button" onclick="upd_contacts()" class="btn custom-bg text-white shadow-none">SAVE</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Management Team -->
                <div class="border-0 mb-4 rounded bg-white shadow-sm p-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Management Team</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#team_s">
                                <i class="bi bi-plus-square text-white me-1"></i> Add
                            </button>
                        </div>
                        <div class="row" id="member_list">
                            <!-- Team Members Table Shows Here -->
                        </div>
                    </div>
                </div>

                <!-- Management Team Modal -->
                <div class="modal fade" id="team_s" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="team_s" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="team_s_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Team Member</h5>
                                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="member_name_modal_input" class="form-label fw-bold">Name</label>
                                        <input type="text" class="form-control shadow-none" name="member_name_modal_input" id="member_name_modal_input" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="member_picture_modal_input" class="form-label fw-bold">Picture</label>
                                        <input type="file" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none" name="member_picture_modal_input" id="member_picture_modal_input" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                                    <button type="button" onclick="add_member()" class="btn custom-bg text-white shadow-none">SAVE</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Management Team Deletion Confirmation Modal -->
                <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close" onclick="close_modal()"></button>

                            </div>  
                            <div class="modal-body">
                                Are you sure you want to delete this team member?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn text-secondary shadow-none" data-dismiss="modal" onclick="close_modal()">Cancel</button>
                                <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

</body>
    <!-- Script -->
    <script src="js/script.js"></script>
    <script src="js/settings.js"></script>

</html>
