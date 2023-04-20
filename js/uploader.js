

jQuery(function ($) {

    $('body').on('click', '#custom-button-upload-banner', function (e) {
        e.preventDefault();
        obj_uploader = wp.media({
            title: 'Custom banner',
            button: {
                text: 'Use this banner'
            },
            multiple: false
        }).on('select', function () {
            let banner = obj_uploader.state().get('selection').first().toJSON();
            $('#category_custom_banner').html('');
            $('#category_custom_banner').html(
                "<img src=" + banner.url + " style='width: 150px'>"
            );
            $('#category_custom_banner_url').val(banner.url);
            $("#custom-button-upload-banner").hide();
            $("#custom-button-remove-banner").show();
        })
            .open();
    });

    $(".custom-button-remove-banner").click(function () {
        $('#category_custom_banner').html('');
        $('#category_custom_banner_url').val('');
        $(this).hide();
        $("#custom-button-upload-banner").show();
    });


    $('body').on('click', '#custom-button-upload', function (e) {
        e.preventDefault();
        obj_uploader = wp.media({
            title: 'Custom image',
            button: {
                text: 'Use this image'
            },
            multiple: false
        }).on('select', function () {
            let image = obj_uploader.state().get('selection').first().toJSON();
            $('#category_custom_image').html('');
            $('#category_custom_image').html(
                "<img src=" + image.url + " style='width: 150px'>"
            );
            $('#category_custom_image_url').val(image.url);
            $("#custom-button-upload").hide();
            $("#custom-button-remove").show();
        })
            .open();
    });

    $(".custom-button-remove").click(function () {
        $('#category_custom_image').html('');
        $('#category_custom_image_url').val('');
        $(this).hide();
        $("#custom-button-upload").show();
    });

})