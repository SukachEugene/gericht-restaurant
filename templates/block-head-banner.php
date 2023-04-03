<?php
$background = get_field('page_head_image', 'options');
$title = get_field('head_title');
?>

<section class="section-head-banner" <?php echo bg($background) ?>>

    <div class="section-head-banner-content">
        <h1><?php echo $title ?></h1>
        <?php echo get_hansel_and_gretel_breadcrumbs(); ?>
    </div>

</section>