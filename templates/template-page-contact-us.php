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



<section class="section-subscribe-form">

    <div class="container2">
        <div class="section-subscribe-form-content">
        </div>
    </div>

</section>

<?php
get_footer();
?>