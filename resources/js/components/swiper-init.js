// resources/js/components/swiper-init.js
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

document.addEventListener('DOMContentLoaded', () => {
    setTimeout(() => {
        new Swiper('.reviewSwiper', {
            loop: true,
            speed: 5000,
            autoplay: {
                delay: 0,
                disableOnInteraction: false,
            },
            grabCursor: true,
            allowTouchMove: true,
            slidesPerView: 1,
            spaceBetween: 16,
            breakpoints: {
                640: { slidesPerView: 2, spaceBetween: 20 },
                1024: { slidesPerView: 3, spaceBetween: 28 },
                1280: { slidesPerView: 4, spaceBetween: 32 },
            }
        });
    }, 100);
});
// This code initializes a Swiper instance for a review carousel with specific settings.
// It waits for the DOM to be fully loaded and then applies the Swiper configuration.