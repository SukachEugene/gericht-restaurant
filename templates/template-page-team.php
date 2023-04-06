<?php
/*
 * Template Name: Team
 */
?>

<?php
get_header()
?>

<?php get_template_part('templates/block', 'head-banner'); ?>

<div class="global-lines team-page">
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


    <section class="section-team">

        <?php
        $logo = get_field('logo', 'options');
        if ($logo) : ?>
            <img class="logo top" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['title']; ?>">
        <?php endif ?>

        <div class="container2">
            <div class="section-team-content">
                <?php
                $team = get_posts(array(
                    'post_type' => 'our-team',
                    'posts_per_page' => -1,
                    'order' => 'ASC',
                ));

                if ($team) :
                    foreach ($team as $teammate) :

                        $id = $teammate->ID;
                        $name = $teammate->post_title;
                        $position = get_field('team_position', $id);
                        $photo = get_field('team_photo', $id);
                        $link = get_the_permalink($id);
                        $social_media = get_field('team_social_medias', $id);
                ?>

                        <div class="section-team-content-element">

                            <div class="section-team-content-image-container">

                                <?php if ($photo) : ?>
                                    <img class="s" src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt']; ?>" title="<?php echo $photo['title']; ?>">
                                <?php endif ?>

                                <div class="section-team-content-image-container-links">

                                    <div class="section-team-icons-container">
                                        <?php
                                        if ($social_media) :

                                            foreach ($social_media as $media) :
                                                $site = $media['name'];
                                                $url = $media['url'];
                                        ?>
                                                <a class="section-team-icon" href="<?php echo $url ?>" target="<?php echo $url ?>"><i class="<?php echo $site ?>"></i></a>

                                        <?php endforeach;
                                        endif; ?>
                                    </div>

                                    <a class="section-team-read-more" href="<?php echo $link ?>">— Read more</a>
                                </div>
                            </div>


                            <div class="section-team-content-text-container">

                                <?php if ($name) : ?>
                                    <a class="section-team-chef-name" href="<?php echo $link ?>">
                                        <h4><?php echo $name ?></h4>
                                    </a>
                                <?php endif ?>

                                <?php if ($position) : ?>
                                    <h5><?php echo $position ?></h5>
                                <?php endif ?>

                            </div>
                        </div>

                <?php
                    endforeach;
                endif;
                ?>



            </div>

            <?php
            $logo = get_field('logo', 'options');
            if ($logo) : ?>
                <img class="logo bottom" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['title']; ?>">
            <?php endif ?>

    </section>

    <div class="hide-logo">
        <?php get_template_part('templates/block', 'video-banner'); ?>
    </div>

    <div class="team-page-laurels-container">


        <section class="section-laurels">

            <?php get_template_part('templates/block', 'laurels'); ?>

        </section>

        <?php
        $logo = get_field('logo', 'options');
        if ($logo) : ?>
            <img class="logo" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['title']; ?>">
        <?php endif ?>
    </div>

    <?php
    get_footer();
    ?>

</div>