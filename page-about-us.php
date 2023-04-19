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


    <section class="section-our-history">
        <?php
        $header = get_field('our_history_header');
        $spoon = get_field('spoon', 'options');
        $title = get_field('our_history_title');
        $text = get_field('our_history_text');
        $left_picture = get_field('our_history_left_picture');
        $right_picture = get_field('our_history_right_picture');
        $goals_title = get_field('our_history_goals_title');
        $divider = get_field('our_history_goals_divider');
        $goals = get_field('our_history_goals');
        ?>

        <div class="container2">

            <div class="section-our-history-content">

                <?php if ($header) : ?>
                    <h6><?php echo $header ?></h6>
                <?php endif ?>
                <?php if ($spoon) : ?>
                    <img class="spoon" src="<?php echo $spoon['url']; ?>" alt="<?php echo $spoon['alt']; ?>" title="<?php echo $spoon['title']; ?>">
                <?php endif ?>
                <?php if ($title) : ?>
                    <h2><?php echo $title ?></h2>
                <?php endif ?>

                <div class="section-our-history-content-columns">

                    <div class="left-part">
                        <?php if ($text) : ?>
                            <p><?php echo $text ?></p>
                        <?php endif ?>

                        <?php if ($left_picture) : ?>
                            <img class="about-us-picture" src="<?php echo $left_picture['url']; ?>" alt="<?php echo $left_picture['alt']; ?>" title="<?php echo $left_picture['title']; ?>">
                        <?php endif ?>
                    </div>

                    <div class="right-part">
                        <?php if ($right_picture) : ?>
                            <img class="about-us-picture" src="<?php echo $right_picture['url']; ?>" alt="<?php echo $right_picture['alt']; ?>" title="<?php echo $right_picture['title']; ?>">
                        <?php endif ?>

                        <?php if ($goals_title) : ?>
                            <h4><?php echo $goals_title ?></h4>
                        <?php endif ?>

                        <div class="goals-container">

                            <?php
                            if ($goals) :
                                foreach ($goals as $goal) :

                                    $number = $goal['number'];
                                    $text = $goal['text'];

                                    if ($goal != end($goals)) {

                            ?>

                                        <div class="one-goal-container">
                                            <?php if ($number) : ?>
                                                <p class="goal-number"><?php echo $number ?></p>
                                            <?php endif ?>

                                            <?php if ($spoon) : ?>
                                                <img class="spoon" src="<?php echo $spoon['url']; ?>" alt="<?php echo $spoon['alt']; ?>" title="<?php echo $spoon['title']; ?>">
                                            <?php endif ?>

                                            <?php if ($text) : ?>
                                                <p class="goal-text"><?php echo $text ?></p>
                                            <?php endif ?>

                                        </div>

                                        <div class="goal-divider-container">
                                            <?php if ($divider) : ?>
                                                <img class="goal-divider" src="<?php echo $divider['url']; ?>" alt="<?php echo $divider['alt']; ?>" title="<?php echo $divider['title']; ?>">
                                            <?php endif ?>
                                        </div>

                                    <?php } else { ?>

                                        <div class="one-goal-container">
                                            <?php if ($number) : ?>
                                                <p class="goal-number"><?php echo $number ?></p>
                                            <?php endif ?>

                                            <?php if ($spoon) : ?>
                                                <img class="spoon" src="<?php echo $spoon['url']; ?>" alt="<?php echo $spoon['alt']; ?>" title="<?php echo $spoon['title']; ?>">
                                            <?php endif ?>

                                            <?php if ($text) : ?>
                                                <p class="goal-text"><?php echo $text ?></p>
                                            <?php endif ?>
                                        </div>

                            <?php  }
                                endforeach;
                            endif;
                            ?>

                        </div>

                    </div>

                </div>

            </div>
        </div>

    </section>

    <section class="section-about-us">
        <?php
        $header = get_field('about_us_header');
        $spoon = get_field('spoon', 'options');
        $title = get_field('about_us_title');
        $text = get_field('about_us_text');
        $video = get_field('about_us_video_name');
        ?>

        <?php
        $logo = get_field('logo', 'options');
        if ($logo) : ?>
            <img class="logo top" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['title']; ?>">
        <?php endif ?>

        <div class="container2">

            <div class="section-about-us-content">

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

                <div class="video-container">

                    <video loop id="video">
                        <source src="<?php echo get_theme_file_uri('/videos/' . $video); ?>" type="video/mp4">
                    </video>

                    <?php
                    $play = get_field('video_play_button', 'options');
                    if ($play) : ?>

                        <img id="play-video-button" src="<?php echo $play['url']; ?>" alt="<?php echo $play['alt']; ?>" title="<?php echo $play['title']; ?>">

                    <?php endif ?>
                </div>

            </div>
        </div>

        <?php
        $logo = get_field('logo', 'options');
        if ($logo) : ?>
            <img class="logo bottom" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['title']; ?>">
        <?php endif ?>

    </section>


    <?php get_template_part('templates/block', 'chefs-word'); ?>

    <?php get_template_part('templates/block', 'customers'); ?>

    <div class="front-page">
        <?php get_template_part('templates/block', 'gallery'); ?>
    </div>


    <?php
    get_footer();
    ?>

</div>