<?php
get_header()
?>


<?php



$current_term = get_queried_object();
$current_slug = $current_term->slug;
$current_name = $current_term->name;


?>

<h1 class="category-page-title"><?php echo "Posts By Category:</br>".$current_name ?></h1>

<div class="category-page-container">

    <?php

    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'taxonomy' => 'category',
        'category_name' => $current_slug,
        'order' => 'ASC',

    );


    $posts = get_posts($args);


    $posts_per_page = 3;
    $total_posts = count($posts);
    $total_pages = ceil($total_posts / $posts_per_page);

    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
        $current_page = $_GET['page'];
    } else {
        $current_page = 1;
    }

    $posts_chunked = array_chunk($posts, $posts_per_page);
    $posts_on_current_page = $posts_chunked[$current_page - 1];



    if ($posts_chunked) :

        foreach ($posts_on_current_page as $post) :
            $id = $post->ID;
            $thumbnail = get_the_post_thumbnail($id);
            $date = get_the_date('d M Y', $id);
            $authorID = $post->post_author;
            $author = get_the_author_meta('display_name', $authorID);
            $title = $post->post_title;
            $excerpt = $post->post_excerpt;
            $excerpt = wp_trim_words($excerpt, 20, '...');
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
                        <a class="blog-title-link" href="<?php echo $link ?>">
                            <h4><?php echo $title ?></h4>
                        </a>
                        <p class="content-text"><?php echo $excerpt ?></p>
                        <a href="<?php echo $link ?>">Read more</a>
                    </div>

                </div>

            <?php endif; ?>

    <?php
        endforeach;
    endif;
    ?>

</div>

<div class="category-pagination">
    <?php
    for ($i = 1; $i <= $total_pages; $i++) {
        ?>
        <a href="?page=<?php echo $i ?>"><?php echo $i ?></a>
    <?php
    }
    ?>

</div>



<?php
get_footer();
?>