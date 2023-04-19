<?php
get_header()
?>

<?php get_template_part('templates/block', 'head-banner'); ?>

<div class="global-lines single-shef-page">
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

    <?php
    $position = get_field('team_position');
    $photo = get_field('team_photo');
    $spoon = get_field('spoon', 'options');
    $stages = get_field('team_stages');
    $caption =  get_field('team_caption');
    ?>

    <section class="section-single-chef-top-part">

        <div class="container2">

            <div class="section-single-chef-top-part-content">

                <div class="section-single-chef-top-part-image-container">
                    <?php if ($photo) : ?>
                        <img src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt']; ?>" title="<?php echo $photo['title']; ?>">
                    <?php endif ?>
                </div>

                <div class="section-single-chef-top-part-text-container">
                    <?php if ($position) : ?>
                        <h6><?php echo $position ?></h6>
                    <?php endif ?>

                    <?php if ($spoon) : ?>
                        <img class="spoon" src="<?php echo $spoon['url']; ?>" alt="<?php echo $spoon['alt']; ?>" title="<?php echo $spoon['title']; ?>">
                    <?php endif; ?>

                    <h2><?php the_title() ?></h2>
                    <div class="section-single-chef-top-part-text-content">
                        <?php the_content() ?>
                    </div>

                    <div class="section-single-chef-stages">
                        <?php
                        if ($stages) :
                            foreach ($stages as $stage) : ?>
                                <div class="section-single-chef-one-stage">
                                    <span class="section-single-chef-stages-divider">—</span>
                                    <p><?php echo $stage['team_stage'] ?></p>
                                </div>
                        <?php
                            endforeach;
                        endif
                        ?>
                    </div>

                    <?php if ($caption) : ?>
                        <img class="section-csingle-chef-caption" src="<?php echo $caption['url']; ?>" alt="<?php echo $caption['alt']; ?>" title="<?php echo $qcaption['title']; ?>">
                    <?php endif; ?>

                </div>

            </div>
        </div>

        <?php
        $logo = get_field('logo', 'options');
        if ($logo) : ?>
            <img class="logo" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['title']; ?>">
        <?php endif ?>

    </section>


    <?php
    $background = get_field('personal_achievements_background_image', 'options');
    ?>

    <section class="section-single-chef-achievements-part" <?php echo bg($background) ?>>

        <div class="container2">

            <div class="section-single-chef-achievements-part-content">

                <div class="section-single-chef-achievements-part-text-container">

                    <?php if ($position) : ?>
                        <h6><?php echo $position ?></h6>
                    <?php endif ?>

                    <?php if ($spoon) : ?>
                        <img class="spoon" src="<?php echo $spoon['url']; ?>" alt="<?php echo $spoon['alt']; ?>" title="<?php echo $spoon['title']; ?>">
                    <?php endif; ?>

                    <h2>Personal Achievements</h2>

                    <div class="personal-achievements">

                        <?php
                        $achievements = get_field('achievements');
                        $picture = get_field('achievements_image');

                        if ($achievements) :
                            foreach ($achievements as $achievement) :

                                $number = $achievement['number'];
                                $image = $achievement['laurel_image'];
                                $title = $achievement['achievement'];
                                $text = $achievement['text'];
                        ?>

                                <div class="section-laurels-goals-element">
                                    <div class="section-laurels-goals-element-image-container">
                                        <p class="laurel-number"><?php echo $number ?></p>
                                        <img class="laurel-image" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>">
                                    </div>

                                    <div class="section-laurels-goals-element-text-container">
                                        <h4><?php echo $title ?></h4>
                                        <p><?php echo $text ?></p>
                                    </div>
                                </div>

                        <?php
                            endforeach;
                        endif;
                        ?>

                    </div>

                </div>

                <?php if ($picture) : ?>
                    <div class="section-single-chef-achievements-part-image-container">
                        <img src="<?php echo $picture['url']; ?>" alt="<?php echo $picture['alt']; ?>" title="<?php echo $picture['title']; ?>">
                    </div>
                <?php endif; ?>

            </div>

        </div>

        <?php if ($logo) : ?>
            <img class="logo" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['title']; ?>">
        <?php endif ?>
    </section>


    <?php
    get_footer();
    ?>

</div>