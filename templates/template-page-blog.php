<?php
/*
 * Template Name: Blog
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


    <section class="section-blogs-page">

        <?php
        $logo = get_field('logo', 'options');
        if ($logo) : ?>
            <img class="logo top" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['title']; ?>">
        <?php endif ?>


        <div class="container2">

            <div class="blogs-page-content">

                <div class="section-blogs-page-content-posts-container">

                    <div class="section-blogs-page-content-posts-container2" id="posts-container">

                        <?php get_template_part('templates/block', 'blog-posts-for-blog-page'); ?>

                    </div>

                    <div class="section-blogs-button-container">
                        <button class="gold-button" id="load-more-posts" data-number="4">View More</button>
                    </div>

                </div>


                <?php get_sidebar() ?>

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