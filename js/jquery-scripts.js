
jQuery(document).ready(function ($) {

    $('.slider-one').slick({
        slide: '.section-head-posts-content',
        slidesToShow: 1,
        arrows: false,
        dots: true,
        useTransform: false,
      });

    //   $('.slider-one').on('click', '.slick-dots li', function(){
    //     let slideIndex = $(this).index();
    //     $('.slider').slick('slickGoTo', slideIndex);
    //   });
})