<?php
get_header()
?>

<?php get_template_part('templates/block', 'head-banner'); ?>

<div class="global-lines services-page">

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


    <section class="section-serving-quality">

        <?php
        $header = get_field('serving_quality_header');
        $spoon = get_field('spoon', 'options');
        $title = get_field('serving_quality_title');
        $text = get_field('serving_quality_text');
        $link1 = get_field('serving_quality_link1');
        $link2 = get_field('serving_quality_link2');
        ?>

        <div class="wide-container">

            <div class="section-serving-quality-content">

                <?php if ($header) : ?>
                    <h6><?php echo $header ?></h6>
                <?php endif ?>
                <?php if ($spoon) : ?>
                    <img class="spoon" src="<?php echo $spoon['url']; ?>" alt="<?php echo $spoon['alt']; ?>" title="<?php echo $spoon['title']; ?>">
                <?php endif ?>
                <?php if ($title) : ?>
                    <h2><?php echo $title ?></h2>
                <?php endif ?>
                <?php if ($text) : ?>
                    <p><?php echo $text ?></p>
                <?php endif ?>
                <?php if ($link1) : ?>
                    <a class="gold-button" href="<?php echo esc_url($link1['url']); ?>" target="<?php echo esc_attr($link1['target']); ?>"> <?php echo  $link1['title']; ?> </a>
                <?php endif ?>
                <?php if ($link2) : ?>
                    <a class="gold-button transparent" href="<?php echo esc_url($link2['url']); ?>" target="<?php echo esc_attr($link2['target']); ?>"> <?php echo  $link2['title']; ?> </a>
                <?php endif ?>

            </div>
        </div>

        <?php
        $logo = get_field('logo', 'options');
        if ($logo) : ?>
            <img class="logo" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['title']; ?>">
        <?php endif ?>

    </section>


    <div class="services-page">
        <?php get_template_part('templates/block', 'menu'); ?>
    </div>

    <?php get_template_part('templates/block', 'reservations'); ?>


    <?php
    $background = get_field('harry_hours_background');
    $title = get_field('harry_hours_title');
    $days = get_field('harry_hours_days');
    $hours = get_field('harry_hours_hours');
    ?>
    <section class="section-happy-hours" <?php echo bg($background) ?>>

        <?php
        $logo = get_field('logo', 'options');
        if ($logo) : ?>
            <img class="logo top" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['title']; ?>">
        <?php endif ?>

        <div>

            <?php if ($title) : ?>
                <h2><?php echo $title ?></h2>
            <?php endif ?>

            <div class="section-happy-hours-text">
                <?php if ($days) : ?>
                    <p><?php echo $days ?></p>
                <?php endif ?>
                <?php if ($hours) : ?>
                    <p>&nbsp;<?php echo $hours ?></p>
                <?php endif ?>
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