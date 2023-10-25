function close_modal() {
    $('#confirmDeleteModal').modal('hide'); // Hide the modal
    $('#confirmDelete').data('user-id', ''); // Clear the user ID stored in data attribute
}

// Function to fetch and display the team data
function get_carousel_img() {
    $.ajax({
        type: "GET",
        url: "inc/carousel.image.inc.php",
        success: function (data) {
            $("#image_list").html(data); // Replace the content of an element with the fetched data
        },
        error: function () {
            alert("Error fetching users.");
        }
    });
}

function add_carousel_image() {
    // Get the input element for the image file
    let carousel_picture_modal_input = document.getElementById("carousel_picture_modal_input");

    // Check if a file has been selected
    if (carousel_picture_modal_input.files.length === 0) {
        console.log('No image selected.'); // Debugging log
        alert('warning', 'Please select an image to upload.');
        $('#carousel_s').modal('hide'); // Hide the modal
        return;
    }

    // Create a FormData object to send data to the server
    let data = new FormData();
    data.append('picture', carousel_picture_modal_input.files[0]); // Add the selected image
    data.append('add_carousel_image', ''); // Indicate this is an add carousel image request

    // Create an XMLHttpRequest object to send the data to the server
    let xhr = new XMLHttpRequest();

    xhr.open("POST", "ajax/settings_crud.php", true); // Open a POST request to the server

    // Define what to do when the request is complete
    xhr.onload = function() {
        console.log('XHR Status:', xhr.status); // Debugging log

        if (xhr.status === 200) {
            console.log('XHR Response:', xhr.responseText); // Debugging log

            // Check the response from the server
            if (xhr.responseText === '1') {
                alert('success', 'New image added successfully.');
                get_carousel_img();
                // You can add code here to refresh the carousel image list if needed
                $('#carousel_s').modal('hide'); // Hide the modal
                carousel_picture_modal_input.value = ""; // Clear the file input
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

// Function to open the confirmation modal for member deletion
function delete_team_modal(userId) {
    // Set the user ID as a data attribute on the "Delete" button in the modal
    $('#confirmDelete').data('user-id', userId);

    // Show the confirmation modal
    $('#confirmDeleteModal').modal('show');
}

// Event listener for the "Delete" button in the confirmation modal
$('#confirmDelete').click(function () {
    var userId = $(this).data('user-id'); // Get the user ID from the data attribute

    // Send an AJAX request to delete the user with the specified ID
    $.ajax({
        type: "GET",
        url: "inc/delete_carousel.inc.backend.php?id=" + userId,
        success: function () {
            // After successfully deleting the user, fetch and display the updated user list
            alert('succes', 'Image Deletion Successful!');
            get_carousel_img(); // Reload the team data
        },
        error: function () {
            alert("Error deleting Image.");
        }
    });

    // Close the modal
    $('#confirmDeleteModal').modal('hide');
});