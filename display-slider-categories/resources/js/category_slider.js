document.addEventListener('DOMContentLoaded', function () {
    const swiper  = new Swiper(".category-slider", {
        allowTouchMove: true,
        loop: true,
        disableOnInteraction: true,
        spaceBetween: 0,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
            dynamicBullets: true,
        },
    });

    document.querySelectorAll('.swiper-wrapper').forEach(function(slide, index) {
        slide.addEventListener('mouseenter', function() {
            swiper[index].slideNext();
        });
        slide.addEventListener('mouseleave', function() {
            swiper[index].slidePrev();
        });
    });
});