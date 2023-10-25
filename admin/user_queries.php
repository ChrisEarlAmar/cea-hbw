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
    <title>Admin Panel - User Queries</title>
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
<body class="bg-light">

    <!-- Header -->
    <?php require('inc/header.inc.php');?>

    <div class="container-fluid" id="main_content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">

               <h3 class="mb-4">USER QUERIES</h3>

                <!-- User Queries -->
                <div class="border-0 mb-4 rounded bg-white shadow-sm p-3">
                    <div class="card-body">
                        <div class="row justify-content-end">
                            <div class="col-lg-2 mb-2">
                                <button class="rounded-pill btn btn-warning shadow-none btn-sm w-100" data-bs-toggle="modal" data-bs-target="#mark_all_queries_read_modal">
                                    <i class="bi bi-envelope-open-fill me-1"></i> Mark All As Read
                                </button>
                            </div>
                            <div class="col-lg-2 mb-2">
                                <button class="rounded-pill btn btn-danger shadow-none btn-sm w-100" data-bs-toggle="modal" data-bs-target="#delete_all_queries_modal">
                                    <i class="bi bi-trash-fill me-1"></i> Delete All
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive-sm" style="height: 410px; overflow-y: scroll;">
                            <table class="table table-hover">
                                <thead class="sticky-top z-index-1">
                                    <tr class="table-dark text-light text-center">
                                    <!-- <th scope="col">#</th> -->
                                    <th width="20%">Name</th>
                                    <th width="10%">Email</th>
                                    <th width="33%">Message</th>
                                    <th width="15%">Date</th>
                                    <th width="17%">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="user_query_list">
                                    <!-- User Queries Will Appear Here. -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- User Query Confirmation Modal -->
                <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close" onclick="close_modal()"></button>

                            </div>  
                            <div class="modal-body">
                                Are you sure you want to delete this user query?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal" aria-label="Close" onclick="close_modal()">Cancel</button>
                                <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- All User Query Delete Modal -->
                <div class="modal fade" id="delete_all_queries_modal" tabindex="-1" aria-labelledby="delete_all_queries_modal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>

                            </div>  
                            <div class="modal-body">
                                Are you sure you want to delete all user queries?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                <button type="button" class="btn btn-danger" onclick="delete_all_queries()" data-bs-dismiss="modal" aria-label="Close">Delete All</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- All User Query Mark As Read Modal -->
                <div class="modal fade" id="mark_all_queries_read_modal" tabindex="-1" aria-labelledby="mark_all_queries_read_modal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>

                            </div>  
                            <div class="modal-body">
                                Are you sure you want to change all user queries to be marked as read?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                <button type="button" class="btn btn-warning" onclick="modify_all_queries()" data-bs-dismiss="modal" aria-label="Close">Change</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
    <script src="js/script.js"></script>
    <script>
        window.onload = function() {
            get_user_queries();
        };
    </script>
    <script src="js/user_queries.js"></script>
</html>