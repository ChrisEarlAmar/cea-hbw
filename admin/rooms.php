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
    <title>Admin Panel - Rooms</title>
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

               <h3 class="mb-4">ROOMS</h3>

                <!-- Rooms -->
                <div class="border-0 mb-4 rounded bg-white shadow-sm p-3">
                    <div class="card-body">
                        <div class="text-end mb-4">
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#add_room">
                                <i class="bi bi-plus-square text-white me-1"></i> Add
                            </button>
                        </div>
                        <div class="table-responsive-lg" style="height: 450px; overflow-y: scroll;">
                            <table class="table table-hover">
                                <thead class="sticky-top z-index-1">
                                    <tr class="table-dark text-light text-center">
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Area</th>
                                        <th scope="col">Guests</th> 
                                        <th scope="col">Price</th> 
                                        <th scope="col">Quantity</th> 
                                        <th scope="col">Status</th> 
                                        <th scope="col">Action</th> 
                                    </tr>
                                </thead>
                                <tbody id="room_list">
                                    <!-- Rooms Will Appear Here. -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Add Room Modal -->
                <div class="modal fade" id="add_room" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="add_room" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Room</h5>
                                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="room_name_modal_input" class="form-label fw-bold">Name</label>
                                        <input type="text" class="form-control shadow-none" name="room_name_modal_input" id="room_name_modal_input" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="room_area_modal_input" class="form-label fw-bold">Area</label>
                                        <input type="number" class="form-control shadow-none" name="room_area_modal_input" id="room_area_modal_input" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="room_price_modal_input" class="form-label fw-bold">Price</label>
                                        <input type="number" min="1" class="form-control shadow-none" name="room_price_modal_input" id="room_price_modal_input" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="room_quantity_modal_input" class="form-label fw-bold">Quantity</label>
                                        <input type="number" min="1" class="form-control shadow-none" name="room_quantity_modal_input" id="room_quantity_modal_input" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="room_adult_modal_input" class="form-label fw-bold">Adult (Max.)</label>
                                        <input type="number" min="1" class="form-control shadow-none" name="room_adult_modal_input" id="room_adult_modal_input" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="room_children_modal_input" class="form-label fw-bold">Children (Max.)</label>
                                        <input type="number" min="1" class="form-control shadow-none" name="room_children_modal_input" id="room_children_modal_input" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="features" class="form-label fw-bold">Features</label>
                                        <div class="row"><?php require('inc/rooms.features.inc.php') ?></div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="facilities" class="form-label fw-bold">Facilities</label>
                                        <div class="row"><?php require('inc/rooms.facilities.inc.php') ?></div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="description" class="form-label fw-bold">Description</label>
                                        <textarea name="description" id="description" rows="4" class="form-control shadow-none" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                                <button type="submit" class="btn custom-bg text-white shadow-none" onclick="add_rooms()">ADD</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Room Modal -->
                <div class="modal fade" id="edit_room" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="edit_room" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Room <span id="edit_room_span"></span></h5>
                                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <!-- Hidden Room ID -->
                                    <div class="col-12 mb-3 d-none">
                                        <label for="edit_room_name_modal_input" class="form-label fw-bold">Room ID</label>
                                        <input type="hidden" class="form-control shadow-none" name="edit_room_id_modal_input" id="edit_room_id_modal_input" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="edit_room_name_modal_input" class="form-label fw-bold">Name</label>
                                        <input type="text" class="form-control shadow-none" name="edit_room_name_modal_input" id="edit_room_name_modal_input" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="edit_room_area_modal_input" class="form-label fw-bold">Area</label>
                                        <input type="number" class="form-control shadow-none" name="edit_room_area_modal_input" id="edit_room_area_modal_input" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="edit_room_price_modal_input" class="form-label fw-bold">Price</label>
                                        <input type="number" min="1" class="form-control shadow-none" name="edit_room_price_modal_input" id="edit_room_price_modal_input" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="edit_room_quantity_modal_input" class="form-label fw-bold">Quantity</label>
                                        <input type="number" min="1" class="form-control shadow-none" name="edit_room_quantity_modal_input" id="edit_room_quantity_modal_input" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="edit_room_adult_modal_input" class="form-label fw-bold">Adult (Max.)</label>
                                        <input type="number" min="1" class="form-control shadow-none" name="edit_room_adult_modal_input" id="edit_room_adult_modal_input" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="edit_room_children_modal_input" class="form-label fw-bold">Children (Max.)</label>
                                        <input type="number" min="1" class="form-control shadow-none" name="edit_room_children_modal_input" id="edit_room_children_modal_input" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="features" class="form-label fw-bold">Features</label>
                                        <div class="row">
                                            <?php 
                                                $res = selectAll('features');
                                                while ($opt = $res->fetch_assoc()) {
                                                    echo "
                                                        <div class='col-md-3'>
                                                            <label>
                                                                <input type='checkbox' name='edit_features' data-value='{$opt['sr_no']}' value='{$opt['sr_no']}' class='form-checkbox-input edit_features_check shadow-none' title='{$opt['name']}'/>
                                                                {$opt['name']}
                                                            </label>
                                                        </div>
                                                    ";
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="facilities" class="form-label fw-bold">Facilities</label>
                                        <div class="row">
                                            <?php 
                                                $res = selectAll('facilities');
                                                while ($opt = $res->fetch_assoc()) {
                                                    echo "
                                                        <div class='col-md-3'>
                                                            <label>
                                                                <input type='checkbox' name='edit_facilities' data-value='{$opt['sr_no']}' value='{$opt['sr_no']}' class='form-checkbox-input edit_facilities_check shadow-none' title='{$opt['name']}'/>
                                                                {$opt['name']}
                                                            </label>
                                                        </div>
                                                    ";
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="edit_description" class="form-label fw-bold">Description</label>
                                        <textarea name="description" id="edit_description" rows="4" class="form-control shadow-none" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                                <button type="submit" class="btn custom-bg text-white shadow-none" onclick="submit_edit_room()">SAVE</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Manage Room Images Modal -->
                <div class="modal fade" id="room-images" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="edit_room" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Manage Images For Room <span id="room_images_span"></span></h5>
                                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div id="alert_div">
                                </div>
                                <div class="border-bottom border-3 pb-3 mb-3">
                                    <label for="room_image_modal_input" class="form-label fw-bold">Add Image</label>
                                    <input type="file" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none mb-3" name="room_image_modal_input" id="room_image_modal_input" required>
                                    <!-- Text Input for the Room ID. Must not be displayed -->
                                    <input type="text" class="form-control shadow-none mb-3 d-none" name="add_room_image_id_modal_input" id="add_room_image_id_modal_input" required disabled>
                                    <button type="submit" class="btn custom-bg text-white shadow-none" onclick="add_room_image()">ADD</button>
                                </div>
                                <div class="table-responsive-lg" style="height: 350px; overflow-y: scroll;">
                                    <table class="table table-hover">
                                        <thead class="sticky-top z-index-1">
                                            <tr class="table-dark text-light text-center">
                                                <th scope="col" width="50%">Image</th>
                                                <th scope="col">Thumb</th>
                                                <th scope="col">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody id="room_image_list">
                                            <!-- Room Images Will Appear Here. -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Room Deletion Confirmation Modal -->
                <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>

                            </div>  
                            <div class="modal-body">
                                Are you sure you want to delete this room and its images?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Loading Modal -->
                <div class="modal fade border-0" id="loadingModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered border-0">
                        <div class="modal-content border-0">
                            <div class="modal-body">
                                <div class="d-flex align-items-center">
                                    <strong role="status">Loading...</strong>
                                    <div class="spinner-border ms-auto" aria-hidden="true"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delete Confirmation Button For Room Image -->
                <!-- This Element is hidden. Do not change display attribute to visible. -->
                <button type="button" class="btn btn-danger d-none" id="confirmDeleteRoomImage">Delete</button>

            </div>
        </div>
    </div>

</body>
    <!-- Script -->
    <script src="js/script.js"></script>
    <script src="js/rooms.js"></script>
    <script src="js/rooms-2.js">
        // Rooms 2 js is the file containing functions edit_room and submit_edit_room
        // These funcs are currently in a separate file due to it not being defined when they were inside room.js.
        // Move the functions back to room.js and delete rooms-2.js once fixed.
    </script>
    <script>
    window.onload = function() {
        get_all_rooms();
        //$('#loadingModal').modal('show');
    };

    function view_room_images(user_id) {
        document.getElementById("add_room_image_id_modal_input").value = user_id;
        document.getElementById("room_images_span").innerHTML = user_id;  
        $('#room-images').modal('show');
        get_room_images(user_id);
    }

    function add_room_image() {

        // Get the input element for the image file
        let room_image_modal_input = document.getElementById("room_image_modal_input");
        let add_room_image_id_modal_input = document.getElementById("add_room_image_id_modal_input");

        // Check if a file has been selected
        if (room_image_modal_input.files.length === 0) {
            // console.log('No image selected.'); // Debugging log
            alert_modal('warning', 'Please select an image to upload.');
            // $('#carousel_s').modal('hide'); // Hide the modal
            return;
        }

        // Create a FormData object to send data to the server
        let data = new FormData();
        data.append('picture', room_image_modal_input.files[0]); // Add the selected image
        data.append('room_id', add_room_image_id_modal_input.value); // Add room id
        data.append('add_room_image', ''); // Indicate this is an add carousel image request

        // Create an XMLHttpRequest object to send the data to the server
        let xhr = new XMLHttpRequest();

        xhr.open("POST", "ajax/settings_crud.php", true); // Open a POST request to the server

        // Define what to do when the request is complete
        xhr.onload = function() {
            // console.log('XHR Status:', xhr.status); // Debugging log

            if (xhr.status === 200) {
                // console.log('XHR Response:', xhr.responseText); // Debugging log

                // Check the response from the server
                if (xhr.responseText === '1') {
                    alert_modal('success', 'New image added successfully.');
                    get_room_images(add_room_image_id_modal_input.value);
                    // get_carousel_img();
                    // You can add code here to refresh the carousel image list if needed
                    // $('#carousel_s').modal('hide'); // Hide the modal
                    room_image_modal_input.value = ""; // Clear the file input
                } else if (xhr.responseText === 'inv_img') {
                    alert('error', 'Invalid image format.');
                } else if (xhr.responseText === 'inv_size') {
                    alert('error', 'Invalid image size. It must be less than 2 MB.');
                } else if (xhr.responseText === 'upd_failed') {
                    alert('error', 'Image upload failed.');
                } else {
                    alert('error', 'An error occurred while adding the image.');
                }
            } else {
                console.log('XHR Error:', xhr.statusText); // Debugging log
                alert('error', 'An error occurred while processing your request.');
            }
        };

        // Handle errors during the AJAX request
        xhr.onerror = function() {
            console.log('XHR Error:', xhr.statusText); // Debugging log
            alert('error', 'An error occurred during the request.');
        };

        // Send the FormData to the server
        xhr.send(data);
    }

    function get_room_images(roomId) {
        $.ajax({
            type: "GET",
            url: "inc/rooms.images.inc.php",
            data: { room_id: roomId }, // Send roomId as a parameter
            success: function (data) {
                $("#room_image_list").html(data); // Replace the content of an element with the fetched data
            },
            error: function () {
                alert("Error fetching room details.");
            }
        });
    }

    function delete_room_image(userId) {
        // Set the query ID as a data attribute on the "Delete" button in the modal
        $('#confirmDeleteRoomImage').data('user-id', userId);

        // Clicks button to delete the image
        click_Button_By_Id("confirmDeleteRoomImage");

        function click_Button_By_Id(buttonId) {
            var button = document.getElementById(buttonId);

            if (button) {
                button.click();
            } else {
                console.log("Button not found with ID: " + buttonId);
            }
        }

        // Event listener delete room image button (element is hidden by default)
        $('#confirmDeleteRoomImage').click(function () {
            var imageID = $(this).data('user-id'); // Get the query ID from the data attribute

            let add_room_image_id_modal_input = document.getElementById("add_room_image_id_modal_input");

            // Send an AJAX request to delete the query with the specified ID
            $.ajax({
                type: "GET",
                url: "inc/delete_room_image.inc.backend.php?id=" + imageID,
                success: function () {
                    // After successfully deleting the image, fetch and display the updated image list
                    alert_modal('success', 'Image Deletion Successful!');
                    get_room_images(add_room_image_id_modal_input.value); // Reload the image data
                },
                error: function () {
                    alert_modal("Error deleting Image.");
                }
            });

        });

    }

    // Alert that shows in the modal
    function alert_modal(type, msg) {
        let bs_class = '';

        if (type === 'success') {
            bs_class = 'alert-success';
        } else if (type === 'warning') {
            bs_class = 'alert-warning';
        } else {
            bs_class = 'alert-danger';
        }

        let element = document.createElement('div');
        element.innerHTML = `
            <div class="alert ${bs_class} alert-dismissible fade show mb-2" role="alert">
                <strong>${msg}</strong>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `;

        let alertElement = document.getElementById('alert_div');
        if (alertElement) {
            alertElement.innerHTML = ''; // Clear the existing content of the "demo" div
            alertElement.appendChild(element); // Append the new element inside the "demo" div
        } else {
            console.error('Element with ID "alert_div" not found');
        }

        // Simulate closing after 5 seconds
        setTimeout(() => {
            let closeButton = element.querySelector('.btn-close');
            if (closeButton) {
                closeButton.click(); // Simulate clicking the close button
                setTimeout(() => {
                element.remove(); // Remove the entire element after a brief delay
                }, 200); // Delay in milliseconds (adjust as needed)
            }
        }, 4000); // 4000 milliseconds = 4 seconds
    }

    function set_as_thumb(imageID, roomID) {

        let room_image = roomID;

        // Construct the form data as a URL-encoded string
        let formData = new URLSearchParams();
        formData.append('upd_thumb', 'true'); // Indicate an update request
        formData.append('sr_no', imageID);
        formData.append('room_id', roomID);

        // Create an XMLHttpRequest to handle the update
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/settings_crud.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            if (xhr.status === 200) {
                alert_modal('success', 'Thumbnail is updated successfully!');
                get_room_images(room_image); // Reload the image data
            } else {
                console.error("Request failed with status:", xhr.status);
                alert('error', 'No changes made!');
            }
        };

        // Send the URL-encoded form data as a string
        xhr.send(formData.toString());
    }

    function delete_room(roomID) {
        //console.log("Delete Room: " + roomID);

        $('#confirmDeleteModal').modal('show');

        $('#confirmDelete').on('click', function() {

            // Construct the form data as a URL-encoded string
            let formData = new URLSearchParams();
            formData.append('delete_room', 'true'); // Indicate a delete request
            formData.append('sr_no', roomID);

            // Create an XMLHttpRequest to handle the delete
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/settings_crud.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                if (xhr.status === 200) {
                    alert('success', 'Room Deleted Successfully.'); // Corrected the alert message
                    get_all_rooms();
                    $('#confirmDeleteModal').modal('hide');

                } else {
                    console.error("Request failed with status:", xhr.status);
                    alert('No changes made!'); // Corrected the alert message
                }
            };

            // Send the URL-encoded form data as a string
            xhr.send(formData.toString());
        });
    }



    </script>

</html>