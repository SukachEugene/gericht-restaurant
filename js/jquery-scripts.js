
jQuery(document).ready(function ($) {

    //Initialization
    $('.slider-one').slick({
        slide: '.slider-one-slide',
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: false,
        useTransform: false,
    });

    //Create style of text in nav elements after initialization
    elements = document.querySelectorAll('.slider-one-slide-index');
    
    for (i=0; i<elements.length; i++) {

        elements[0].classList.add('active-first');
        
        if (i < 10) {
            let index = elements[i].dataset.index
            index = '0'+index
            elements[i].innerHTML = index;
        }
    }


    // Create nav mechanic
    $('.slider-one-nav').click(function (e) {

        let slide = e.target
        let slide_index = slide.dataset.index;
        let next_slide_index = slide_index - 1;
        jQuery('.slider-one').slick('slickGoTo', next_slide_index);

        elements = document.querySelectorAll('.slider-one-slide-index');

        elements.forEach((element) => {
            element.classList.remove('active-first');
            element.classList.remove('active-last');
            element.classList.remove('active');
          });

        if (next_slide_index == 0) {
            slide.classList.add('active-first'); 
        } else if (slide_index == elements.length) {
            slide.classList.add('active-last'); 
        } else {
            slide.classList.add('active'); 
        }

    });


    // Create change of corrent slide in nav after swipe
    $('.slider-one').on('afterChange', function (event, slick, currentSlide) {

        var current_slide_index = $('.slider-one').slick('slickCurrentSlide');

        elements = document.querySelectorAll('.slider-one-slide-index');

        elements.forEach((element) => {
            element.classList.remove('active-first');
            element.classList.remove('active-last');
            element.classList.remove('active');
          });

        if (current_slide_index == 0) {
            elements[0].classList.add('active-first'); 
        } else if (current_slide_index == elements.length -1) {
            elements[current_slide_index].classList.add('active-last'); 
        } else {
            elements[current_slide_index].classList.add('active'); 
        }
    })

})

