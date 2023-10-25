<?php 

    require('inc/essentials.php');
    adminLogin();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Carousel</title>
    <!-- Links for CSS and JS-->
    <?php require('inc/links.inc.php') ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<style>
    @media screen and (max-width: 991px) {

    #sidebar_menu {
        height: auto !important;
        width: 100%;
    }   

    }
</style>
<body class="bg-light">

    <!-- Header -->
    <?php require('inc/header.inc.php');?>

    <div class="container-fluid" id="main_content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">

                <h3 class="mb-4">CAROUSEL</h3>

                <!-- Management Team -->
                <div class="border-0 mb-4 rounded bg-white shadow-sm p-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Image</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#carousel_s">
                                <i class="bi bi-plus-square text-white me-1"></i> Add
                            </button>
                        </div>
                        <div class="row" id="image_list">
                            <!-- Images Show Here -->
                        </div>
                    </div>
                </div>

                <!-- Add Image Modal -->
                <div class="modal fade" id="carousel_s" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="carousel_s" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="team_s_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Carousel Image</h5>
                                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="member_picture_modal_input" class="form-label fw-bold">Picture</label>
                                        <input type="file" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none" name="carousel_picture_modal_input" id="carousel_picture_modal_input" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                                    <button type="button" onclick="add_carousel_image()" class="btn custom-bg text-white shadow-none">SAVE</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Image Deletion Confirmation Modal -->
                <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close" onclick="close_modal()"></button>

                            </div>  
                            <div class="modal-body">
                                Are you sure you want to delete this image?
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
    <script>
        window.onload = function() {
            get_carousel_img();
        };
    </script>
    <script src="js/carousel.js"></script>
</html>