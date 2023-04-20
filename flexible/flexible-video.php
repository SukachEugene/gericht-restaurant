<?php
/*
Template Name: Video Block Template
*/
?>

<?php
if (get_row_layout() == 'video') :

    $flag = get_sub_field('resource');

    if ($flag == 'local') :
        $video = get_sub_field('video_name');
?>
        <div class="video-container single-post">

            <video loop id="video">
                <source src="<?php echo get_theme_file_uri('/videos/' . $video); ?>" type="video/mp4">
            </video>

            <?php
            $play = get_field('video_play_button', 'options');
            if ($play) : ?>

                <img id="play-video-button" src="<?php echo $play['url']; ?>" alt="<?php echo $play['alt']; ?>" title="<?php echo $play['title']; ?>">

            <?php endif ?>
        </div>

<?php
    endif;

    if ($flag == 'external') {
        $video = get_sub_field('link_to_video');
        echo $video;
    }

endif;

?>