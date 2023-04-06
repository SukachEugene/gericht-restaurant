<?php
/*
 * Template Name: Contact Us
 * 
 */
?>

<?php
get_header()
?>

<?php get_template_part('templates/block', 'head-banner'); ?>


<div class="global-lines about-us-page">

    <?php
    $left_line = get_field('through_line_left', 'options');
    $right_line = get_field('through_line_right', 'options');
    ?>

    <?php if ($left_line) : ?>
        <img class="through-line left" src="<?php echo $left_line['url']; ?>" alt="<?php echo $left_line['alt']; ?>" title="<?php echo $left_line['title']; ?>">
    <?php endif ?>

    <?php if ($right_line) : ?>
        <img class="through-line right" src="<?php echo $right_line['url']; ?>" alt="<?php echo $right_line['alt']; ?>" title="<?php echo $right_line['title']; ?>">
    <?php endif ?>

    <section class="section-map">

        <div class="container2">
            <div class="map-container">

                <?php
                $map = get_field('map_shortcode');
                $marker = get_field('map_marker_shortcode');
                echo do_shortcode($map);
                echo do_shortcode($marker);
                ?>

            </div>
        </div>

        <?php
        $logo = get_field('logo', 'options');
        if ($logo) : ?>
            <img class="logo bottom" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['title']; ?>">
        <?php endif ?>

    </section>


    <?php
    $background = get_field('contact_form_background');
    ?>

    <section class="section-contact-form" <?php echo bg($background) ?>>

        <div class="container2">
            <div class="section-contact-form-content">

                <div class="contact-form">

                    <?php
                    $form = '[contact-form-7 id="430" title="Contact Form"]';
                    echo do_shortcode($form);
                    ?>

                </div>

                <div class="section-contact-form-content-image-container">

                    <?php
                    $image = get_field('image_element', 'options');
                    $letter = get_field('letter_front', 'options');
                    ?>

                    <img class="image" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>">
                    <img class="letter" src="<?php echo $letter['url']; ?>" alt="<?php echo $letter['alt']; ?>" title="<?php echo $letter['title']; ?>">



                </div>

            </div>
        </div>

        <?php
        $logo = get_field('logo', 'options');
        if ($logo) : ?>
            <img class="logo bottom" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['title']; ?>">
        <?php endif ?>

    </section>

    <?php
    get_footer();
    ?>

</div>