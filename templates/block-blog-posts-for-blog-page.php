

<?php

if (isset($_POST['page'])) { 
    $paged = $_POST['page'];
} else {
    $paged = 1;
}

$posts = get_posts(array(
    'post_type' => 'post',
    'order' => 'ASC',
    'posts_per_page' => 4,
    'paged' => $paged,
));

if ($posts) :

    foreach ($posts as $post) :
        $id = $post->ID;
        $thumbnail = get_the_post_thumbnail($id);
        $date = get_the_date('d M Y', $id);
        $authorID = $post->post_author;
        $author = get_the_author_meta('display_name', $authorID);
        $title = $post->post_title;
        $excerpt = $post->post_excerpt;
        $excerpt = wp_trim_words( $excerpt, 20, '...' );
        $link = get_the_permalink($id);
?>
        <?php if ($thumbnail) : ?>

            <div class="section-blogs-content-post">

                <div class="section-blogs-image-container">
                    <?php echo $thumbnail ?>
                </div>
                <div class="section-blogs-text-container">
                    <div class="section-blogs-text-container-datatime-row">
                        <p><?php echo $date ?></p>
                        <p><?php echo " - " . $author ?></p>
                    </div>
                    <a class="blog-title-link" href="<?php echo $link ?>"><h4><?php echo $title ?></h4></a>
                    <p class="content-text"><?php echo $excerpt ?></p>
                    <a href="<?php echo $link ?>">Read more</a>
                </div>

            </div>

        <?php endif; ?>

<?php
    endforeach;
endif;
?>