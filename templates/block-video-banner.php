<section class="section-video-banner">

    <?php
    $logo = get_field('logo', 'options');
    ?>

    <?php if ($logo) : ?>
        <img class="logo" id="section-video-logo" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['title']; ?>">
    <?php endif ?>

    <video loop id="video-banner">
        <source src="<?php echo get_theme_file_uri('/videos/video2.mp4'); ?>" type="video/mp4">
    </video>

    <?php
    $play = get_field('video_play_button', 'options');
    if ($play) : ?>

        <img id="play-video-banner-button" src="<?php echo $play['url']; ?>" alt="<?php echo $play['alt']; ?>" title="<?php echo $play['title']; ?>">

    <?php endif ?>

</section>