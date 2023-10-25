// Rooms 2 js is the file containing functions edit_room and submit_edit_room
// These funcs are currently in a separate file due to them not being "defined" when they were inside room.js.
// Move the functions back to room.js and delete rooms-2.js once issue is fixed.

// Function to fetch room data and populate the edit form
function edit_room(id) {
    // Retrieve form input elements
    let editRoomIDInput = document.getElementById("edit_room_id_modal_input");
    let editRoomNameInput = document.getElementById("edit_room_name_modal_input");
    let editRoomAreaInput = document.getElementById("edit_room_area_modal_input");
    let editRoomPriceInput = document.getElementById("edit_room_price_modal_input");
    let editRoomQuantityInput = document.getElementById("edit_room_quantity_modal_input");
    let editRoomAdultInput = document.getElementById("edit_room_adult_modal_input");
    let editRoomChildrenInput = document.getElementById("edit_room_children_modal_input");
    let editDescriptionTextarea = document.getElementById("edit_description");

    // Create a FormData object to send data to the server
    let formData = new FormData();

    // Append the 'get_room' parameter with its value (room ID)
    formData.append('get_room', id);

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajax/settings_crud.php', true);

    // Set up a callback function for when the request is complete
    xhr.onload = function () {
        // Parse the response from the server
        let data = JSON.parse(this.responseText);

        // Populate form fields with fetched room data
        document.getElementById("edit_room_span").innerHTML = data.room_data.sr_no;  
        editRoomIDInput.value = data.room_data.sr_no;
        editRoomNameInput.value = data.room_data.name;
        editRoomAreaInput.value = data.room_data.area;
        editRoomPriceInput.value = data.room_data.price;
        editRoomQuantityInput.value = data.room_data.quantity;
        editRoomAdultInput.value = data.room_data.adult;
        editRoomChildrenInput.value = data.room_data.children;
        editDescriptionTextarea.value = data.room_data.description;

        // Create arrays for features and facilities
        const featureValues = [];
        const facilityValues = [];

        // Push values from data.features and data.facilities to respective arrays
        featureValues.push(...data.features.map(value => parseInt(value, 10)));
        facilityValues.push(...data.facilities.map(value => parseInt(value, 10)));

        // Select the checkboxes for features and facilities
        const featureEditCheckboxes = document.querySelectorAll('[name="edit_features"]');
        const facilitiesEditCheckboxes = document.querySelectorAll('[name="edit_facilities"]');

        // Function to check/uncheck checkboxes based on values
        function setCheckboxes(checkboxes, values) {
            checkboxes.forEach(checkbox => {
                const checkboxValue = parseInt(checkbox.getAttribute('data-value'), 10);
                if (values.includes(checkboxValue)) {
                    checkbox.checked = true;
                } else {
                    checkbox.checked = false;
                }
            });
        }

        // Check feature checkboxes based on featureValues array
        setCheckboxes(featureEditCheckboxes, featureValues);

        // Check facilities checkboxes based on facilityValues array
        setCheckboxes(facilitiesEditCheckboxes, facilityValues);
    };

    // Show the edit room modal
    $('#edit_room').modal('show');

    // Send the FormData to the server
    xhr.send(formData);
}

// Function to submit edited room data
function submit_edit_room() {
    // Collect input values from the form
    let editRoomIDInput = document.getElementById("edit_room_id_modal_input").value;
    let editRoomNameInput = document.getElementById('edit_room_name_modal_input').value;
    let editRoomAreaInput = document.getElementById('edit_room_area_modal_input').value;
    let editRoomPriceInput = document.getElementById('edit_room_price_modal_input').value;
    let editRoomQuantityInput = document.getElementById('edit_room_quantity_modal_input').value;
    let editRoomAdultInput = document.getElementById('edit_room_adult_modal_input').value;
    let editRoomChildrenInput = document.getElementById('edit_room_children_modal_input').value;
    let editDescriptionTextarea = document.getElementById('edit_description').value;

    // Validate input values to ensure none are empty
    if (
        editRoomIDInput.trim() === '' ||
        editRoomNameInput.trim() === '' ||
        editRoomAreaInput.trim() === '' ||
        editRoomPriceInput.trim() === '' ||
        editRoomQuantityInput.trim() === '' ||
        editRoomAdultInput.trim() === '' ||
        editRoomChildrenInput.trim() === '' ||
        editDescriptionTextarea.trim() === ''
    ) {
        // Hide the edit room modal and show an alert
        $('#edit_room').modal('hide');
        alert('warning', 'Please fill in all required fields.');
        console.log('Validation failed - empty fields.');
        return;
    }

    // Create a FormData object to send data to the server
    let data = new FormData();

    // Append form data to the FormData object
    data.append('edit_room', true);
    data.append('room_id', editRoomIDInput);
    data.append('name', editRoomNameInput);
    data.append('area', editRoomAreaInput);
    data.append('price', editRoomPriceInput);
    data.append('quantity', editRoomQuantityInput);
    data.append('adult', editRoomAdultInput);
    data.append('children', editRoomChildrenInput);
    data.append('description', editDescriptionTextarea);

    // Collect checked feature values
    let features = [];
    const featuresElements = document.querySelectorAll('[name="edit_features"]');
    featuresElements.forEach((el) => {
        if (el.checked) {
            features.push(el.value);
        }
    });

    // Collect checked facilities values
    let facilities = [];
    const facilitiesElements = document.querySelectorAll('[name="edit_facilities"]');
    facilitiesElements.forEach((el) => {
        if (el.checked) {
            facilities.push(el.value);
        }
    });

    // Append feature and facility values to the FormData object as JSON strings
    data.append('features', JSON.stringify(features));
    data.append('facilities', JSON.stringify(facilities));

    // Create an XMLHttpRequest object
    let xhr = new XMLHttpRequest();

    xhr.open("POST", "ajax/settings_crud.php", true);

    // Set up a callback function for when the request is complete
    xhr.onload = function() {
        if (this.status === 200) {
            try {
                const response = JSON.parse(this.responseText);
                if (response.success) {
                    alert('success', 'Room Data Edited Successfully!');
                    $('#edit_room').modal('hide');
                    clear_form();
                    uncheck();
                    get_all_rooms();
                } else {
                    alert('error', response.message);
                }
            } catch (e) {
                console.error('Error parsing JSON:', e);
                alert('error', 'An error occurred while processing the response.');
            }
        } else {
            alert('error', 'An error occurred during the request.');
        }
    };

    // Set up error handling for the request
    xhr.onerror = function() {
        alert('error', 'An error occurred while making the request.');
    };

    // Send the FormData object to the server
    xhr.send(data);
}
