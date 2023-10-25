var currentPageUrl = window.location.href;

// Check if the URL contains specific pages and add "active" class
if (currentPageUrl.indexOf('dashboard.php') !== -1) {
    setActiveClass('dashboard_link_id');
} else if (currentPageUrl.indexOf('rooms.php') !== -1) {
    setActiveClass('rooms_link_id');
} else if (currentPageUrl.indexOf('features_facilities.php') !== -1) {
    setActiveClass('f_f_link_id');
} else if (currentPageUrl.indexOf('carousel.php') !== -1) {
    setActiveClass('carousel_link_id');
} else if (currentPageUrl.indexOf('user_queries.php') !== -1) {
    setActiveClass('users_link_id');
} else if (currentPageUrl.indexOf('settings.php') !== -1) {
    setActiveClass('settings_link_id');
}

// Function to add "active" class to a link
function setActiveClass(linkId) {
    var link = document.getElementById(linkId);
    if (link) {
        link.classList.add('custom-bg');
        link.classList.add('rounded');
    }
}

