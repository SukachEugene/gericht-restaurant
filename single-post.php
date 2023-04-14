<?php
get_header()
?>

<?php get_template_part('templates/block', 'head-banner'); ?>

<?php
$id = $post->ID;
$thumbnail = get_the_post_thumbnail($id);
$date = get_the_date('d M Y', $id);
$authorID = $post->post_author;
$author = get_the_author_meta('display_name', $authorID);
?>



<section class="section-single-blog-post">

    <div class="container2">

        <div class="single-blog-post-content">

            <div class="single-blog-post-content-head-part">

                <div class="section-single-blog-text-container-datatime-row">
                    <p><?php echo $date ?></p>
                    <p><?php echo " - " . $author ?></p>
                </div>

                <h2><?php the_title() ?></h2>

                <div class="section-single-blog-image-container">
                    <?php echo $thumbnail ?>
                </div>

            </div>

            <div class="single-blog-post-content-bottom-part">

                <div class="single-blog-post-content-body">

                    <?php
                    the_content();
                    ?>

                </div>

                <?php get_sidebar() ?>


            </div>

        </div>

    </div>

</section>



<?php
get_footer();
?>