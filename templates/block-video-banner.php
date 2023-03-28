<section class="section-video-banner">

    <video loop id="video-banner">
        <source src="<?php echo get_theme_file_uri('/videos/video2.mp4'); ?>" type="video/mp4">
    </video>

    <?php
    $play = get_field('video_play_button', 'options');
    if ($play) : ?>

        <img id="play-video-banner-button" src="<?php echo $play['url']; ?>" alt="<?php echo $play['alt']; ?>" title="<?php echo $play['title']; ?>">

    <?php endif ?>

</section>