// Function to fetch and display the team data
function get_user_queries() {
    $.ajax({
        type: "GET",
        url: "inc/user_queries.inc.php",
        success: function (data) {
            $("#user_query_list").html(data); // Replace the content of an element with the fetched data
        },
        error: function () {
            alert("Error fetching user queries.");
        }
    });
}

// Function to open the confirmation modal for user query deletion
// user ID in this instance is query ID, unfortunately this code has been used multiple times that using correct naming conventions might break it.
function delete_user_query(userId) {
    // Set the query ID as a data attribute on the "Delete" button in the modal
    $('#confirmDelete').data('user-id', userId);

    // Show the confirmation modal
    $('#confirmDeleteModal').modal('show');
}

// Event listener for the "Delete" button in the confirmation modal
$('#confirmDelete').click(function () {
    var userId = $(this).data('user-id'); // Get the query ID from the data attribute

    // Send an AJAX request to delete the query with the specified ID
    $.ajax({
        type: "GET",
        url: "inc/delete_user_query.inc.backend.php?id=" + userId,
        success: function () {
            // After successfully deleting the query, fetch and display the updated query list
            alert('success', 'Query Deletion Successful!');
            get_user_queries(); // Reload the user query data
        },
        error: function () {
            alert("Error deleting Query.");
        }
    });

    // Close the modal
    $('#confirmDeleteModal').modal('hide');
});

function modify_user_query(userId) {
    $.ajax({
        type: "GET",
        url: "inc/modify_user_query.inc.backend.php?id=" + userId,
        success: function () {
            // After successfully modifying the query, fetch and display the updated query list
            // alert('success', 'Query Modification Successful!');
            get_user_queries(); // Reload the user query data
        },
        error: function () {
            alert("Error Modifying Query.");
        }
    });
}

function modify_all_queries() {
    $.ajax({
        type: "GET",
        url: "inc/modify_alluser_query.inc.backend.php", // Add a comma here
        success: function () {
            // After successfully modifying the query, fetch and display the updated query list
            // alert('success', 'Query Modification Successful!');
            get_user_queries(); // Reload the user query data
        },
        error: function () {
            alert("Error Modifying Queries.");
        }
    });
}

function delete_all_queries() {
    $.ajax({
        type: "GET",
        url: "inc/delete_alluser_query.inc.backend.php", // Add a comma here
        success: function () {
            // After successfully modifying the query, fetch and display the updated query list
            // alert('success', 'Query Modification Successful!');
            get_user_queries(); // Reload the user query data
        },
        error: function () {
            alert("Error Modifying Queries.");
        }
    });
}