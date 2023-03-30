// console.log(PHPVARS);


// jQuery(function($) {

//     let currentPage = 1;

//     $('body').on('click', '#load-more-posts', function() {

//         currentPage++;

//         let data = {
//             action: 'load_more_posts',
//             page: currentPage,
//         };
//         $.post(PHPVARS.ajaxurl, data, function(response) {
//             $('#posts-container').append(response);    
//         });
//     });
// });


jQuery(function ($) {

    let currentPage = 1;

    $('body').on('click', '#load-more-posts', function () {

        currentPage++;

        $.ajax({
            type: 'POST',
            url: PHPVARS.ajaxurl,
            dataType: 'json',
            data: {
                action: 'load_more_posts',
                page: currentPage,
            },
            success: function (response) {

                if (response) {
                $('#posts-container').append(response.html);
                
                if (response.finish) {
                    $('#load-more-posts').css('display', 'none');
                    $('#posts-container').css('margin-bottom', '152px')
                }
            }
            }
        });




    });
});
