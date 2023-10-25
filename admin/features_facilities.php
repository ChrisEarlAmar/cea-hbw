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
    <title>Admin Panel - Features & Facilities</title>
    <!-- Links for CSS and JS-->
    <?php require('inc/links.inc.php') ?>
</head>
<style>
    @media screen and (max-width: 991px) {

    #sidebar_menu {
        height: auto !important;
        width: 100%;
    }   

    }

    .z-index-1 {
        z-index: 1;
    }
</style>
<body clss="bg-light">

    <!-- Header -->
    <?php require('inc/header.inc.php');?>

    <div class="container-fluid" id="main_content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">

               <h3 class="mb-4">FEATURES & FACILITIES</h3>

                <!-- Features -->
                <div class="border-0 mb-4 rounded bg-white shadow-sm p-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Features</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#features_s">
                                <i class="bi bi-plus-square text-white me-1"></i> Add
                            </button>
                        </div>
                        <div class="table-responsive-md" style="height: 410px; overflow-y: scroll;">
                            <table class="table table-hover">
                                <thead class="sticky-top z-index-1">
                                    <tr class="table-dark text-light text-center">
                                    <th width="10%">#</th>
                                    <th width="80%">Name</th>
                                    <th width="10%" >Action</th> 
                                    </tr>
                                </thead>
                                <tbody id="features_list">
                                    <!-- User Queries Will Appear Here. -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Facilities -->
                <div class="border-0 mb-4 rounded bg-white shadow-sm p-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Facilities</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#facilites_s">
                                <i class="bi bi-plus-square text-white me-1"></i> Add
                            </button>
                        </div>
                        <div class="table-responsive-md" style="height: 410px; overflow-y: scroll;">
                            <table class="table table-hover">
                                <thead class="sticky-top z-index-1">
                                    <tr class="table-dark text-light text-center">
                                    <th width="">#</th>
                                    <th>Icon</th>
                                    <th width="20%">Name</th>
                                    <th>Description</th>
                                    <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="facilities_list">
                                    <!-- Facilities Will Appear Here. -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Add Feature Modal -->
                <div class="modal fade" id="features_s" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="features_s" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="team_s_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Feature</h5>
                                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="feature_name_modal_input" class="form-label fw-bold">Name</label>
                                        <input type="text" class="form-control shadow-none" name="feature_name_modal_input" id="feature_name_modal_input" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                                    <button type="button" onclick="add_feature()" class="btn custom-bg text-white shadow-none">SAVE</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Add Facility Modal -->
                <div class="modal fade" id="facilites_s" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="facilites_s" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="team_s_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Facility</h5>
                                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="facility_name_modal_input" class="form-label fw-bold">Name</label>
                                        <input type="text" class="form-control shadow-none" name="facility_name_modal_input" id="facility_name_modal_input" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="facility_picture_modal_input" class="form-label fw-bold">Icon</label>
                                        <input type="file" accept=".jpg, .png, .webp, .jpeg, .svg" class="form-control shadow-none" name="facility_picture_modal_input" id="facility_picture_modal_input" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="facility_description_modal_input" class="form-label fw-bold">Description</label>
                                        <textarea class="form-control shadow-none" name="site_about" id="facility_description_modal_input" rows="6" required></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                                    <button type="button" onclick="add_facility()" class="btn custom-bg text-white shadow-none">SAVE</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Feature Delete Modal -->
                <div class="modal fade" id="confirmDeleteFeatureModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>

                            </div>  
                            <div class="modal-body">
                                Are you sure you want to delete this feature?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                                <button type="button" class="btn btn-danger" id="confirmDeleteFeature">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Facility Delete Modal -->
                <div class="modal fade" id="confirmDeleteFacilityModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>

                            </div>  
                            <div class="modal-body">
                                Are you sure you want to delete this facility?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                                <button type="button" class="btn btn-danger" id="confirmDeleteFacility">Delete</button>
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
    <script>
        window.onload = function() {
            get_features();
            get_facilities();
        };
    </script>
    <script src="js/features_facilities.js"></script>
</html>