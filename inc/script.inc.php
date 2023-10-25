<script>

// Initialize Carousel Swiper
var swiper = new Swiper(".carousel_swiper", {
    spaceBetween: 30,
    effect: "fade",
    loop: true,
    autoplay: {
        delay: 3500, 
        disableOnInteraction: false,
    }

});

// Initialize Testimonials Swiper
var swiper = new Swiper(".testimonial_swiper", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "3",
    loop: true,
    coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: false,
    },
    autoplay: {
        delay: 2000, 
        disableOnInteraction: false,
    }

    // Disable Autoplay Swiper Parameters when finally publishing the system. Autoplay is for showcasing only. Reenable Breakpoints for responsive swiper.
    // Removed Pagination Parameters as they do not work with autoplay and breakpoints params, to be fixed in future.

    // breakpoints: {
    //     320: {
    //     slidesPerView: 1,
    //     spaceBetween: 20,
    //     },
    //     640: {
    //     slidesPerView: 2,
    //     spaceBetween: 20,
    //     },
    //     768: {
    //     slidesPerView: 3,
    //     spaceBetween: 40,
    //     autoplay: {
    //         delay: 1000, 
    //     }
    //     },
    //     1024: {
    //     slidesPerView: 3,
    //     spaceBetween: 50,
    //     autoplay: {
    //         delay: 1000, 
    //     }
    //     },
    // },
});

// Initialize About Us Swiper
var swiper = new Swiper(".about_us_swipper", {
    slidesPerView: "3",
    spaceBetween: 40,
    loop: true,
    pagination: {
        el: ".swiper-pagination",
    },
    autoplay: {
        delay: 2000, 
        disableOnInteraction: false,
    },
    breakpoints: {
        320: {
        slidesPerView: 1,
        spaceBetween: 20,
        },
        640: {
        slidesPerView: 2,
        spaceBetween: 20,
        },
        768: {
        slidesPerView: 3,
        spaceBetween: 40,
        autoplay: {
            delay: 1000, 
        }
        },
        1024: {
        slidesPerView: 3,
        spaceBetween: 160,
        },
    },
});

// Apply Active Class to Nav Bar Links based on page name
// Get the current page URL
var currentPageUrl = window.location.href;

// Check if the URL contains specific pages and add "active" class
if (currentPageUrl.indexOf('index.php') !== -1) {
    setActiveClass('home-link');
} else if (currentPageUrl.indexOf('rooms.php') !== -1) {
    setActiveClass('rooms-link');
    removeActiveClass('home-link');
} else if (currentPageUrl.indexOf('facilities.php') !== -1) {
    setActiveClass('facilities-link');
    removeActiveClass('home-link');
} else if (currentPageUrl.indexOf('contact.php') !== -1) {
    setActiveClass('contact-link');
    removeActiveClass('home-link');
} else if (currentPageUrl.indexOf('about.php') !== -1) {
    setActiveClass('about-link');
    removeActiveClass('home-link');
}

// Function to add "active" class to a link
function setActiveClass(linkId) {
    var link = document.getElementById(linkId);
    if (link) {
        link.classList.add('active');
    }
}

// Function to remove "active" class from a link
function removeActiveClass(linkId) {
    var link = document.getElementById(linkId);
    if (link) {
        link.classList.remove('active');
    }
}

</script>