<?php
get_header()
?>

<?php
$background = get_field('404_background', 'options');
?>

<div class="global-lines page-404" style="background-image: url('<?php echo $background['url']; ?>')">

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

    <div class="page-404-container">

        <?php
        $logo = get_field('logo', 'options');
        if ($logo) : ?>
            <img class="logo top" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['title']; ?>">
        <?php endif ?>

        <div class="page-404-content">

            <?php
            $image = get_field('404_image', 'options');
            if ($image) : ?>
                <img class="page-404-image" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>">
            <?php endif; ?>

            <?php
            $spoon = get_field('404_divider', 'options');
            if ($spoon) : ?>
                </br><img class="divider" src="<?php echo $spoon['url']; ?>" alt="<?php echo $spoon['alt']; ?>" title="<?php echo $spoon['title']; ?>">
            <?php endif; ?>

            <p class="page-404-text">Oops! The page you are looking for does not exist. It might have been moved or deleted.</p>
            <a class="gold-button" href="<?php echo site_url(); ?>">Back To Home</a>

            <?php
            $logo = get_field('logo', 'options');
            if ($logo) : ?>
                <img class="logo bottom" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['title']; ?>">
            <?php endif ?>

        </div>
    </div>

    <div class="page-404-copyright-container">
        <?php
        $copyright = get_field('footer_copyright', 'options');
        if ($copyright) : ?>
            <p class="footer-text-style"><?php echo $copyright ?></p>
        <?php endif ?>
    </div>


    <?php
    get_footer();
    ?>


</div>