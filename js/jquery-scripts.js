
jQuery(document).ready(function ($) {

    $('.slider-one').slick({
        slide: '.section-head-posts-content',
        slidesToShow: 1,
        arrows: false,
        dots: false,
        useTransform: false,
      });

    //   $('.slider-one').on('click', '.slick-dots li', function(){
    //     let slideIndex = $(this).index();
    //     $('.slider').slick('slickGoTo', slideIndex);
    //   });
})


jQuery('.slider-one-nav').on('click', 'a', function(e) {
    e.preventDefault(); // запобігаємо стандартному дії по кліку на посилання

    let slideIndex = jQuery(this).data('slider-one-slide-index'); // отримуємо номер слайду з атрибуту даних
    console.log(slideIndex)
    jQuery('.slider-one').slick('slickGoTo', slideIndex); // перемикаємося на потрібний слайд
});