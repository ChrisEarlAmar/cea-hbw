let general_data;
let default_input_title;
let default_input_about;
let site_title_modal_input = document.getElementById('site_title_modal_input');
let site_about_modal_input = document.getElementById('site_about_modal_input');
let site_title = document.getElementById('site_title');
let site_about = document.getElementById('site_about');
let header_site_title = document.getElementById('header_site_title');
let shutdown_toggle = document.getElementById('shutdown_toggle');

let addressElement = document.getElementById('address');
let gmapElement = document.getElementById('gmap');
let pn1Element = document.getElementById('pn1');
let pn2Element = document.getElementById('pn2');
let emailElement = document.getElementById('email');
let fbElement = document.getElementById('fb');
let instaElement = document.getElementById('insta');
let twElement = document.getElementById('tw');
let iframeElement = document.getElementById('iframe');

let default_address;
let default_gmap;
let default_pn1;
let default_pn2;
let default_email;
let default_fb;
let default_insta;
let default_tw;
let default_iframe;

let address_modal_input = document.getElementById("address_modal_input");
let gmap_modal_input = document.getElementById("gmap_modal_input");
let pn1_modal_input = document.getElementById("pn1_modal_input");
let pn2_modal_input = document.getElementById("pn2_modal_input");
let email_modal_input = document.getElementById("email_modal_input");
let fb_modal_input = document.getElementById("fb_modal_input");
let insta_modal_input = document.getElementById("insta_modal_input");
let tw_modal_input = document.getElementById("tw_modal_input");
let iframe_modal_input = document.getElementById("iframe_modal_input");

let team_s_form = document.getElementById("team_s_form");
let member_name_modal_input = document.getElementById("member_name_modal_input");
let member_picture_modal_input = document.getElementById("member_picture_modal_input");

window.onload = function() {
    get_general();
    get_contacts();
    get_team();
};

// This function is responsible for fetching general settings data from the server and updating the corresponding elements on the webpage.
function get_general() {
    // Create an XMLHttpRequest to fetch data
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/settings_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        if (xhr.status === 200) {
            // console.log(xhr.responseText);
            try {
                let response = JSON.parse(xhr.responseText);

                if (response.hasOwnProperty('error')) {
                    console.error("Server returned an error:", response.error);
                } else {
                    // Update the displayed data if the required DOM elements exist
                    if (site_title && site_about) {
                        // Update displayed data
                        site_title.innerText = response.site_title;
                        site_about.innerText = response.site_about;
                        shutdownp.innerText = response.shutdown;

                        // Update modal input values
                        site_title_modal_input.value = response.site_title;
                        site_about_modal_input.value = response.site_about;

                        // Store default values for comparison
                        default_input_title = response.site_title;
                        default_input_about = response.site_about;

                        // Update shutdown toggle state
                        if (response.shutdown == 0) {
                            shutdown_toggle.checked = false;
                            shutdown_toggle.value = 0;
                        } else {
                            shutdown_toggle.checked = true;
                            shutdown_toggle.value = 1;
                        }
                        // console.log('get_general() Success!');
                    } else {
                        console.error("DOM elements not found.");
                    }
                }
            } catch (error) {
                console.error("Error parsing JSON:", error);
            }
        } else {
            console.error("Request failed with status:", xhr.status);
        }
    };

    // Send the request with the parameter 'get_general=true'
    xhr.send('get_general=true');
}

// Reset the values of the site title and site about inputs in the modal form to their original initial values.
function resetFormValues() {
    // General Settings
    site_title_modal_input.value = default_input_title;
    site_about_modal_input.value = default_input_about;

    // Contact Settings
    address_modal_input.value = default_address;
    gmap_modal_input.value = default_gmap;
    pn1_modal_input.value = default_pn1;
    pn2_modal_input.value = default_pn2;
    email_modal_input.value = default_email;
    fb_modal_input.value = default_fb;
    insta_modal_input.value = default_insta;
    tw_modal_input.value = default_tw;
    iframe_modal_input.value = default_iframe;
}

// This function updates the general settings based on the values entered in a modal form.
function upd_general() {
    // Get trimmed values from modal inputs
    let siteTitleValue = site_title_modal_input.value.trim();
    let siteAboutValue = site_about_modal_input.value.trim();

    // Check if modal inputs are empty
    if (siteTitleValue === "" || siteAboutValue === "") {
        // Hide the modal, reset form values, and show a warning alert
        $('#general_s').modal('hide');
        // resetFormValues();
        alert('warning', 'Please fill in both fields.');
        return; // Do not proceed with the update
    }

    // Check if modal input values are unchanged
    if (siteTitleValue === default_input_title && siteAboutValue === default_input_about) {
        // Hide the modal and show a warning alert for no changes
        $('#general_s').modal('hide');
        alert('warning', 'No changes were made.');
        return; // No changes, do not proceed with the update
    }

    // Create an XMLHttpRequest to handle the update
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/settings_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        if (xhr.status === 200) {
            // Hide the modal, reload data, and show a success alert
            $('#general_s').modal('hide');
            get_general();
            alert('success', 'Changes saved!');
            // console.log('upd_general() Success!');
        } else {
            console.error("Request failed with status:", xhr.status);
            alert('error', 'No changes made!');
        }
    };

    // Construct the form data as a URL-encoded string
    let formData = new URLSearchParams();
    formData.append('upd_general', 'true'); // Indicate an update request
    formData.append('site_title', siteTitleValue);
    formData.append('site_about', siteAboutValue);

    // Send the URL-encoded form data as a string
    xhr.send(formData.toString());
}

// This function is responsible for updating the shutdown status of the website.
function upd_shutdown(shutdown_value) {
    // Create an XMLHttpRequest to handle the update
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/settings_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        if (xhr.status === 200) {
            get_general(); // Reload data after successful update
            if (shutdown_toggle.checked) {
                alert('success', 'Shutdown Enabled');
            } else {
                alert('danger', 'Shutdown Disabled');
            }
        } else {
            console.error("Request failed with status:", xhr.status);
        }
    };

    // Construct the form data as a URL-encoded string
    let formData = new URLSearchParams();
    formData.append('upd_shutdown', 'true'); // Indicate a shutdown update request
    formData.append('shutdown_value', shutdown_value);

    // Send the URL-encoded form data as a string
    xhr.send(formData.toString());
}

// This function retrieves contact details from the server.
function get_contacts() {
    // Create an XMLHttpRequest to fetch data
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/settings_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        if (xhr.status === 200) {
            // console.log(xhr.responseText);
            try {
                let response = JSON.parse(xhr.responseText);

                if (response.hasOwnProperty('error')) {
                    console.error("Server returned an error:", response.error);
                } else {
                    // Update the displayed contact details data if the required DOM elements exist

                    if (addressElement && gmapElement) {
                        // Update displayed data
                        addressElement.innerText = response.address;
                        gmapElement.innerHTML = `<a href="${response.gmap}" class="text-muted text-decoration-none" target="_blank">${response.gmap}</a>`;
                        pn1Element.innerText = response.pn1;
                        pn2Element.innerText = response.pn2;
                        emailElement.innerText = response.email;
                        fbElement.innerHTML = `<a href="${response.fb}" class="text-muted text-decoration-none" target="_blank">${response.fb}</a>`;
                        instaElement.innerHTML = `<a href="${response.insta}" class="text-muted text-decoration-none" target="_blank">${response.insta}</a>`;
                        twElement.innerHTML = `<a href="${response.tw}" class="text-muted text-decoration-none" target="_blank">${response.tw}</a>`;
                        iframeElement.src = response.iframe;
                        // ... continue for other elements

                        address_modal_input.value = response.address;
                        gmap_modal_input.value = response.gmap;
                        pn1_modal_input.value = response.pn1;
                        pn2_modal_input.value = response.pn2;
                        email_modal_input.value = response.email;
                        fb_modal_input.value = response.fb;
                        insta_modal_input.value = response.insta;
                        tw_modal_input.value = response.tw;
                        iframe_modal_input.value = response.iframe;

                        default_address = response.address;
                        default_gmap = response.gmap;
                        default_pn1 = response.pn1;
                        default_pn2 = response.pn2;
                        default_email = response.email;
                        default_fb = response.fb;
                        default_insta = response.insta;
                        default_tw = response.tw;
                        default_iframe = response.iframe;
                    } else {
                        console.error("DOM elements not found.");
                    }
                }
            } catch (error) {
                console.error("Error parsing JSON:", error);
            }
        } else {
            console.error("Request failed with status:", xhr.status);
        }
    };

    // Send the request with the parameter 'get_contacts=true'
    xhr.send('get_contacts=true');
}

// This function updates the contact settings based on the values entered in the modal form.
function upd_contacts() {
    // Get trimmed values from modal inputs
    let addressValue = address_modal_input.value.trim();
    let gmapValue = gmap_modal_input.value.trim();
    let pn1Value = pn1_modal_input.value.trim();
    let pn2Value = pn2_modal_input.value.trim();
    let emailValue = email_modal_input.value.trim();
    let fbValue = fb_modal_input.value.trim();
    let instaValue = insta_modal_input.value.trim();
    let twValue = tw_modal_input.value.trim();
    let iframeValue = iframe_modal_input.value.trim();

    // Check if modal inputs are empty
    if (
        addressValue === "" ||  // Check if the address field is empty
        gmapValue === "" ||     // Check if the Google Maps field is empty
        pn1Value === "" ||      // Check if the phone number 1 field is empty
        pn2Value === "" ||      // Check if the phone number 2 field is empty
        emailValue === "" ||    // Check if the email field is empty
        fbValue === "" ||       // Check if the Facebook field is empty
        instaValue === "" ||    // Check if the Instagram field is empty
        twValue === "" ||       // Check if the Twitter field is empty
        iframeValue === ""      // Check if the iframe field is empty
    ) {
        // Hide the modal, reset form values, and show a warning alert
        $('#contacts-s').modal('hide');
        // resetFormValues();
        alert('warning', 'Please fill in all contact fields.');
        return; // Do not proceed with the update
    }

    // Check if modal input values are unchanged
    if (
        addressValue === default_address &&  // Check if the address value is the same as the default
        gmapValue === default_gmap &&        // Check if the Google Maps value is the same as the default
        pn1Value === default_pn1 &&          // Check if the phone number 1 value is the same as the default
        pn2Value === default_pn2 &&          // Check if the phone number 2 value is the same as the default
        emailValue === default_email &&      // Check if the email value is the same as the default
        fbValue === default_fb &&            // Check if the Facebook value is the same as the default
        instaValue === default_insta &&      // Check if the Instagram value is the same as the default
        twValue === default_tw &&            // Check if the Twitter value is the same as the default
        iframeValue === default_iframe       // Check if the iframe value is the same as the default
    ) {
        // Hide the modal and show a warning alert for no changes
        $('#contacts-s').modal('hide');
        alert('warning', 'No changes were made.');
        return; // No changes, do not proceed with the update
    }

    // Create an XMLHttpRequest to handle the update
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/settings_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        if (xhr.status === 200) {
            // Hide the modal, reload data, and show a success alert
            $('#contacts-s').modal('hide');
            get_contacts();
            alert('success', 'Changes saved!');
            // console.log('upd_contacts() Success!');
        } else {
            console.error("Request failed with status:", xhr.status);
            alert('error', 'No changes made!');
        }
    };

    // Construct the form data as a URL-encoded string
    let formData = new URLSearchParams();
    formData.append('upd_contacts', 'true'); // Indicate an update request
    formData.append('address', addressValue);
    formData.append('gmap', gmapValue);
    formData.append('pn1', pn1Value);
    formData.append('pn2', pn2Value);
    formData.append('email', emailValue);
    formData.append('fb', fbValue);
    formData.append('insta', instaValue);
    formData.append('tw', twValue);
    formData.append('iframe', iframeValue);

    // Send the URL-encoded form data as a string
    xhr.send(formData.toString());
}

// Function to add a new member to the team
function add_member() {
    // console.log('add_member function called');

    // Create a FormData object to send data to the server
    let data = new FormData();
    data.append('name', member_name_modal_input.value); // Add member's name
    data.append('picture', member_picture_modal_input.files[0]); // Add member's picture
    data.append('add_member', ''); // Indicate this is an add member request

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
            alert('success', 'New member added successfully.');
            get_team(); // Reload the team data after adding a member
            $('#team_s').modal('hide'); // Hide the modal
            document.getElementById("member_name_modal_input").value = ""; // Clear member name input
            document.getElementById("member_picture_modal_input").value = ""; // Clear member picture input
        } else if (this.responseText === 'inv_img') {
            alert('error', 'Invalid image format.');
        } else if (this.responseText === 'inv_size') {
            alert('error', 'Image size must be less than 2 MB.');
        } else if (this.responseText === 'upd_failed') {
            alert('error', 'Image upload failed.');
        } else {
            alert('error', 'An error occurred while adding the member.');
        }
    };

    // Send the FormData to the server
    xhr.send(data);
}

// Function to fetch and display the team data
function get_team() {
    $.ajax({
        type: "GET",
        url: "inc/settings.member.inc.php",
        success: function (data) {
            $("#member_list").html(data); // Replace the content of an element with the fetched data
        },
        error: function () {
            alert("Error fetching users.");
        }
    });
}

// Function to close the confirmation modal for member deletion
// Note: This function is only a fix to a bug that causes the modal to not close on default configuration. Remove when bug is fixed.
function close_modal() {
    $('#confirmDeleteModal').modal('hide'); // Hide the modal
    $('#confirmDelete').data('user-id', ''); // Clear the user ID stored in data attribute
}

// Function to open the confirmation modal for member deletion
function delete_team_modal(userId) {
    // Set the user ID as a data attribute on the "Delete" button in the modal
    $('#confirmDelete').data('user-id', userId);

    // Show the confirmation modal
    $('#confirmDeleteModal').modal('show');

    // Event listener for the "Delete" button in the confirmation modal
    $('#confirmDelete').click(function () {
        var userId = $(this).data('user-id'); // Get the user ID from the data attribute

        // Send an AJAX request to delete the user with the specified ID
        $.ajax({
            type: "GET",
            url: "inc/delete_user.inc.backend.php?id=" + userId,
            success: function () {
                // After successfully deleting the user, fetch and display the updated user list
                alert('succes', 'Member Deletion Successful!');
                get_team(); // Reload the team data
            },
            error: function () {
                alert("Error deleting user.");
            }
        });

        // Close the modal
        $('#confirmDeleteModal').modal('hide');
    });
}
