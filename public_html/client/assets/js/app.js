// When the document is ready

$(function () {
    // Enable Bootstrap tooltips for elements with 'data-bs-toggle="tooltip"'
    jQuery('[data-bs-toggle="tooltip"]').tooltip();

    // Enable tooltips for modal-triggering elements that have a 'title' attribute
    jQuery('[data-bs-toggle="modal"][title]').tooltip();
});

// Scroll to the top of the page when the function is called
function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE, and Opera
}

/**
 * Copy the current page URL to the clipboard
 */
const btnCopy = document.querySelector(".btnCopy");
if (btnCopy) {
    btnCopy.addEventListener("click", () => {
        navigator.clipboard.writeText(window.location.href); // Copy URL to clipboard
        alert("لینک کپی شد"); // Show alert that the link has been copied
    });
}

/**
 * Handle story video playback in a modal
 */
function stories() {
    const showStoryBtn = document.querySelectorAll('.showStoryBtn'); // Select all story buttons
    const videoStory = document.getElementById('videoStory'); // Select the story video element
    const storyModal = document.getElementById('storyModal'); // Select the story modal

    // Add event listeners to all story buttons
    showStoryBtn.forEach(showStoryBtnItem => showStoryBtnItem.addEventListener('click', function () {
        try {
            videoStory.src = showStoryBtnItem.getAttribute('data-story'); // Set video source
            videoStory.play(); // Play the video
        } catch (e) {
            console.log(e); // Log any errors
        }
    }));

    // Clear video source when the modal is closed
    storyModal.addEventListener('hidden.bs.modal', () => {
        videoStory.src = "";
    });
}

// Video play button functionality
document.addEventListener("DOMContentLoaded", () => {
    const video = document.getElementById("aboutVideo"); // Select the video element
    const playButton = document.querySelector(".play-btn"); // Select the play button
    const playIcon = document.getElementById("play-icon"); // Select the play icon inside the button

    // Ensure all required elements exist before proceeding
    if (!video || !playButton || !playIcon) {
        return;
    }

    // Toggle play/pause when the play button is clicked
    playButton.addEventListener("click", () => {
        if (video.paused) {
            video.play(); // Play the video
            playButton.style.display = "none"; // Hide play button when playing
        } else {
            video.pause(); // Pause the video
        }
    });

    // Show play button and update icon when the video is paused
    video.addEventListener("pause", () => {
        playButton.style.display = "flex"; // Show play button again
        playIcon.className = "bi bi-play-fill"; // Switch to play icon
    });

    // Update icon when the video starts playing
    video.addEventListener("play", () => {
        playIcon.className = "bi bi-pause-fill"; // Switch to pause icon
    });
});



/**
 * Function to select a color by adding a 'selected' class to the clicked element
 */
function selectColor(element) {
    // Remove 'selected' class from all color boxes
    document.querySelectorAll('.color-box').forEach(box => {
        box.classList.remove('selected');
    });

    // Add 'selected' class to the clicked element
    element.classList.add('selected');
}

function snapKill() {
    document.querySelectorAll('div').forEach(function (element) {
        for (let i in attrs) {
            if (element.getAttribute(`wire:${attrs[i]}`) !== null) {
                element.removeAttribute(`wire:${attrs[i]}`);
            }
        }
    });
}

/**
 * Function to select a color by adding a 'selected' class to the clicked element
 */

window.initializeSwipers = function () {
    if(window.swiperProSlider){
        window.swiperProSlider.destroy(true,true);
    }
    window.swiperProSlider = new Swiper(".pro-slider", {
        slidesPerView: 5,
        spaceBetween: 10,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            100: { slidesPerView: 1 },
            576: { slidesPerView: 2 },
            768: { slidesPerView: 3 },
            1024: { slidesPerView: 4 },
            1400: { slidesPerView: 5 }
        },
    });
};

window.initializeSwipers = function () {
    // اگر نمونه قبلی وجود دارد، نابودش کن تا دوباره مقداردهی شود
    if (window.categorySwiper) {
        window.categorySwiper.destroy(true, true);
    }

    // مقداردهی جدید به Swiper
    window.categorySwiper = new Swiper(".pro-slider", {
        slidesPerView: 5,
        spaceBetween: 10,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            100:  { slidesPerView: 1 },
            576:  { slidesPerView: 2 },
            768:  { slidesPerView: 3 },
            1024: { slidesPerView: 4 },
            1400: { slidesPerView: 5 },
        },
    });
};

window.initializeProSliderWithCover = function () {
    // اگر اسلایدر از قبل ساخته شده، آن را نابود کن
    if (window.swiperProSliderWithCover) {
        window.swiperProSliderWithCover.destroy(true, true);
    }

    // اسلایدر با تنظیمات مخصوص pro-slider-with-cover
    window.swiperProSliderWithCover = new Swiper(".pro-slider-with-cover", {
        slidesPerView: 3,
        spaceBetween: 10,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            100:  { slidesPerView: 1 },
            576:  { slidesPerView: 1 },
            768:  { slidesPerView: 2 },
            1024: { slidesPerView: 3 },
            1400: { slidesPerView: 3 },
        },
    });
};

window.initializeBlogSlider = function () {
    // اگر قبلا مقداردهی شده بود، نابودش کن
    if (window.blogSwiper) {
        window.blogSwiper.destroy(true, true);
    }
    // تعریف مجدد اسلایدر با تنظیمات دلخواه
    window.blogSwiper = new Swiper(".blog-slider-sw", {
        slidesPerView: 3,
        spaceBetween: 10,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            100:  { slidesPerView: 1 },
            768:  { slidesPerView: 2 },
            1024: { slidesPerView: 3 },
        },
    });
};

window.initializeSpecialOffersSlider = function () {
    // اگر نمونه قبلی ساخته شده، آن را نابود کن
    if (window.specialOffersSwiper) {
        window.specialOffersSwiper.destroy(true, true);
    }

    // ساخت نمونه جدید اسلایدر با کلاس pro-slider
    window.specialOffersSwiper = new Swiper(".pro-slider", {
        slidesPerView: 5,
        spaceBetween: 10,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            100:  { slidesPerView: 1 },
            576:  { slidesPerView: 2 },
            768:  { slidesPerView: 3 },
            1024: { slidesPerView: 4 },
            1400: { slidesPerView: 5 },
        },
    });
};

window.initializeStorySwiper = function () {
    // اگر نمونه قبلی وجود دارد، ابتدا آن را نابود کن
    if (window.storySwiper) {
        window.storySwiper.destroy(true, true);
    }

    // نمونه جدید Swiper مخصوص استوری با کلاس my-unique-free-mode
    window.storySwiper = new Swiper(".my-unique-free-mode", {
        slidesPerView: 'auto',
        spaceBetween: 15,
        freeMode: true,
        mousewheel: true,
        grabCursor: true,
        scrollbar: {
            el: '.swiper-scrollbar',
            draggable: true,
        },
        breakpoints: {
            320: { spaceBetween: 10 },
            768: { spaceBetween: 15 },
            1024: { spaceBetween: 20 },
        }
    });



    // رویداد کلیک روی استوری‌ها برای بارگذاری ویدیو در مودال
    document.querySelectorAll('.storiesList-slide').forEach(slide => {
        slide.addEventListener('click', function () {
            const videoSource = this.getAttribute('data-story');
            const videoElement = document.getElementById('videoStory');
            if (videoElement) {
                videoElement.src = videoSource;
                videoElement.load();
                videoElement.play();
            }
        });
    });

    // حذف src و توقف ویدیو هنگام بستن مودال (با Bootstrap modal events)
    const storyModal = document.getElementById('storyModal');
    if(storyModal) {
        storyModal.addEventListener('hidden.bs.modal', () => {
            const videoElement = document.getElementById('videoStory');
            if(videoElement) {
                videoElement.pause();
                videoElement.removeAttribute('src');
                videoElement.load();
            }
        });
    }
};

window.initializeHomeSlider = function () {
    // اگر نمونه قبلی ساخته شده، نابودش کن
    if (window.homeSwiper) {
        window.homeSwiper.destroy(true, true);
    }

    // ایجاد نمونه جدید Swiper برای اسلایدر صفحه اصلی
    window.homeSwiper = new Swiper('#homeSlider', {
        spaceBetween: 30,
        centeredSlides: true,
        loop: true,
        autoplay: {
            delay: 5500,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
};

window.initializeSwipersShop = function () {
    // اگر نمونه قبلی وجود دارد، نابودش کن تا دوباره مقداردهی شود
    if (window.categorySwiper) {
        window.categorySwiper.destroy(true, true);
    }

    // مقداردهی جدید به Swiper با تنظیمات مشابه
    window.categorySwiper = new Swiper(".pro-slider", {
        slidesPerView: 5,
        spaceBetween: 10,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            100:  { slidesPerView: 1 },
            576:  { slidesPerView: 2 },
            768:  { slidesPerView: 3 },
            1024: { slidesPerView: 4 },
            1400: { slidesPerView: 5 },
        },
        // نکته: اگر لازم دارید اسکرول یا loop اضافه کنید می‌توانید اینجا بگذارید
        // loop: true,
    });
};





window.history.scrollRestoration = "manual";

window.addEventListener('load', () => {
    window.scrollTo(0, 0);
});



