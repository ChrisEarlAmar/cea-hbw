// Function to fetch and display the room data
function get_all_rooms() {
    $('#loadingModal').modal('show');
    $('#loadingModal').modal('hide');
    $.ajax({
        type: "GET",
        url: "inc/rooms.inc.php",
        success: function (data) {
            $("#room_list").html(data); // Replace the content of an element with the fetched data
        },
        error: function () {
            alert("Error fetching user queries.");
        }
    });
}

function change_room_status(userId) {
    $.ajax({
        type: "GET",
        url: "inc/rooms.modify_status.inc.backend.php?id=" + userId,
        success: function () {
            // After successfully modifying the status, fetch and display the room list
            // alert('success', 'Room Status Modification Successful!');
            get_all_rooms(); // Reload the room data
        },
        error: function () {
            alert("Error Modifying Room Status.");
        }
    });
}

function get_room_images(userId) {
    $.ajax({
        type: "GET",
        url: "inc/rooms.modify_status.inc.backend.php?id=" + userId,
        success: function (data) {
            $("#room_list").html(data); // Replace the content of an element with the fetched data
        },
        error: function () {
            alert("Error fetching user queries.");
        }
    });
}

function uncheck() {
    const featureCheckboxes = document.querySelectorAll('.features');
    const facilityCheckboxes = document.querySelectorAll('.facilities');

    featureCheckboxes.forEach(checkbox => {
        if (checkbox.checked) {
            checkbox.checked = false;
        }
    });

    facilityCheckboxes.forEach(checkbox => {
        if (checkbox.checked) {
            checkbox.checked = false;
        }
    });
}

function clear_form() {
    document.getElementById('room_name_modal_input').value = '';
    document.getElementById('room_area_modal_input').value = '';
    document.getElementById('room_price_modal_input').value = '';
    document.getElementById('room_quantity_modal_input').value = '';
    document.getElementById('room_adult_modal_input').value = '';
    document.getElementById('room_children_modal_input').value = '';
    document.getElementById('description').value = '';
}

function add_rooms() {
    let room_name = document.getElementById('room_name_modal_input').value;
    let room_area = document.getElementById('room_area_modal_input').value;
    let room_price = document.getElementById('room_price_modal_input').value;
    let room_quantity = document.getElementById('room_quantity_modal_input').value;
    let room_adult = document.getElementById('room_adult_modal_input').value;
    let room_children = document.getElementById('room_children_modal_input').value;
    let description = document.getElementById('description').value;

    // Validation: Check if any of the required fields are empty
    if (
        room_name.trim() === '' ||
        room_area.trim() === '' ||
        room_price.trim() === '' ||
        room_quantity.trim() === '' ||
        room_adult.trim() === '' ||
        room_children.trim() === '' ||
        description.trim() === ''
    ) {
        $('#add_room').modal('hide');
        alert('warning', 'Please fill in all required fields.');
        return; // Don't proceed if any field is empty
    }

    let data = new FormData();
    data.append('name', room_name);
    data.append('area', room_area);
    data.append('price', room_price);
    data.append('quantity', room_quantity);
    data.append('adult', room_adult);
    data.append('children', room_children);
    data.append('description', description);

    // Collect checked feature values
    let features = [];
    const featuresElements = document.querySelectorAll('.features');
    featuresElements.forEach((el) => {
        if (el.checked) {
            features.push(el.value);
        }
    });

    // Collect checked facilities values
    let facilities = [];
    const facilitiesElements = document.querySelectorAll('.facilities');
    facilitiesElements.forEach((el) => {
        if (el.checked) {
            facilities.push(el.value);
        }
    });

    data.append('features', JSON.stringify(features));
    data.append('facilities', JSON.stringify(facilities));
    data.append('add_room', ''); // Indicate this is an add room request

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajax/settings_crud.php', true);

    // Set up a callback function for when the request is complete
    xhr.onload = function () {
        if (this.status === 200) {
            try {
                const response = JSON.parse(this.responseText);
                if (response.success) {
                    alert('success', response.message);
                    $('#add_room').modal('hide');
                    clear_form();
                    uncheck();
                    get_all_rooms();
                } else {
                    alert('error', response.message);
                }
            } catch (e) {
                alert('error', 'An error occurred while processing the response.');
            }
        } else {
            alert('error', 'An error occurred during the request.');
        }
    };

    // Set up error handling for the request
    xhr.onerror = function () {
        alert('error', 'An error occurred while making the request.');
    };

    // Send the FormData to the server
    xhr.send(data);
}

