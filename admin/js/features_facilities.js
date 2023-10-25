// Function to fetch and display the features data
function get_features() {
    $.ajax({
        type: "GET",
        url: "inc/features.inc.php",
        success: function (data) {
            $("#features_list").html(data); // Replace the content of an element with the fetched data
        },
        error: function () {
            alert("Error fetching features.");
        }
    });
}

// Function to fetch and display the features data
function get_facilities() {
    $.ajax({
        type: "GET",
        url: "inc/facilities.inc.php",
        success: function (data) {
            $("#facilities_list").html(data); // Replace the content of an element with the fetched data
        },
        error: function () {
            alert("Error fetching facilities.");
        }
    });
}

function add_feature() {
    // console.log('add_feature function called');
    // console.log('Name Value:', feature_name_modal_input.value);

    // Create a FormData object to send data to the server
    let data = new FormData();
    data.append('name', feature_name_modal_input.value); // Add feature's name
    data.append('add_feature', ''); // Indicate this is an add feature request

    // Create an XMLHttpRequest object to send the data to the server
    let xhr = new XMLHttpRequest();

    xhr.open("POST", "ajax/settings_crud.php", true); // Open a POST request to a specific URL

    // Define what to do when the request is complete
    xhr.onload = function() {
        // console.log('HTTP Status Code:', xhr.status); // Log the HTTP status code

        if (xhr.status === 200) {
            // console.log('Response Text:', this.responseText); // Log the response text

            // Check the responseText for success or error messages
            if (this.responseText === '1') {
                alert('success', 'New feature added successfully.');
                get_features(); // Reload the team data after adding a member
                $('#features_s').modal('hide'); // Hide the modal
                document.getElementById("feature_name_modal_input").value = ""; // Clear member name input
            } else {
                alert('danger', 'An error occurred while adding the feature.');
            }
        } else {
            // Handle non-200 status codes (e.g., server errors)
            alert('danger', 'Server error. Please try again later.');
        }
    };

    // Handle network errors
    xhr.onerror = function() {
        // console.log('Network Error:', xhr.statusText); // Log the network error message
        alert('danger', 'Network error. Please check your internet connection.');
    };

    // Send the FormData to the server
    xhr.send(data);
}

// Function to open the confirmation modal for feature deletion
// user ID in this instance is feature ID, unfortunately this code has been used multiple times that using correct naming conventions might break it.
function delete_feature(userId) {
    // Set the feature ID as a data attribute on the "Delete" button in the modal
    $('#confirmDeleteFeature').data('user-id', userId);

    // Show the confirmation modal
    $('#confirmDeleteFeatureModal').modal('show');
}

// Event listener for the "Delete" button in the confirmation modal
$('#confirmDeleteFeature').click(function () {
    var userId = $(this).data('user-id'); // Get the feature ID from the data attribute

    // Send an AJAX request to delete the feature with the specified ID
    $.ajax({
        type: "GET",
        url: "inc/delete_feature.inc.backend.php?id=" + userId,
        success: function () {
            // After successfully deleting the feature, fetch and display the updated feature list
            alert('success', 'Feature Removed!');
            get_features(); // Reload the feature data
        },
        error: function () {
            alert("Error deleting Feature.");
        }
    });

    // Close the modal
    $('#confirmDeleteFeatureModal').modal('hide');
});

function add_facility() {
    // console.log('add_facility function called');
    console.log('Name Value:', facility_name_modal_input.value);
    console.log('Picture Value:', facility_picture_modal_input.value);
    console.log('Description Value:', facility_description_modal_input.value);
    // facility

    // Create a FormData object to send data to the server
    let data = new FormData();
    data.append('name', facility_name_modal_input.value); // Add facility name
    data.append('icon', facility_picture_modal_input.files[0]); // Add facility picture
    data.append('description', facility_description_modal_input.value); // Add facility description
    data.append('add_facility', ''); // Indicate this is an add facility request

    // Log the FormData values for debugging
    // console.log('Name:', member_name_modal_input.value);
    // console.log('Picture:', member_picture_modal_input.files[0]);

    // Create an XMLHttpRequest object to send the data to the server
    let xhr = new XMLHttpRequest();

    xhr.open("POST", "ajax/settings_crud.php", true); // Open a POST request to a specific URL

    // Define what to do when the request is complete
    xhr.onload = function() {
        // console.log('Response:', this.responseText);

        // Handle different responses from the server
        if (this.responseText === '1') {
            alert('success', 'New facility added successfully.');
            get_facilities(); // Reload the team data after adding a facility
            $('#facilites_s').modal('hide'); // Hide the modal
            document.getElementById("facility_name_modal_input").value = ""; // Clear facility name input
            document.getElementById("facility_picture_modal_input").value = ""; // Clear facility pciture input
            document.getElementById("facility_description_modal_input").value = ""; // Clear facility description input
        } else if (this.responseText === 'inv_img') {
            alert('error', 'Invalid image format.');
        } else if (this.responseText === 'inv_size') {
            alert('error', 'Image size must be less than 2 MB.');
        } else if (this.responseText === 'upd_failed') {
            alert('error', 'Image upload failed.');
        } else {
            alert('error', 'An error occurred while adding the facility.');
        }
    };

    // Send the FormData to the server
    xhr.send(data);
}

// Function to open the confirmation modal for feature deletion
// user ID in this instance is facility ID, unfortunately this code has been used multiple times that using correct naming conventions might break it.
function delete_facility(userId) {
    // Set the facility ID as a data attribute on the "Delete" button in the modal
    $('#confirmDeleteFacility').data('user-id', userId);

    // Show the confirmation modal
    $('#confirmDeleteFacilityModal').modal('show');
}

// Event listener for the "Delete" button in the confirmation modal
$('#confirmDeleteFacility').click(function () {
    var userId = $(this).data('user-id'); // Get the facility ID from the data attribute

    // Send an AJAX request to delete the facility with the specified ID
    $.ajax({
        type: "GET",
        url: "inc/delete_facility.inc.backend.php?id=" + userId,
        success: function () {
            // After successfully deleting the facility, fetch and display the updated facility list
            alert('success', 'Facility Removed!');
            get_facilities(); // Reload the facility data
        },
        error: function () {
            alert("Error deleting Facility.");
        }
    });

    // Close the modal
    $('#confirmDeleteFacilityModal').modal('hide');
});