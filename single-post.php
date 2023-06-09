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


    <?php
    $id = $post->ID;
    $thumbnail = get_the_post_thumbnail($id);
    $date = get_the_date('d M Y', $id);
    $authorID = $post->post_author;
    $author = get_the_author_meta('display_name', $authorID);
    $tags = get_the_tags();

    $logo = get_field('logo', 'options');
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

                    <?php if ($logo) : ?>
                        <img class="logo" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['title']; ?>">
                    <?php endif ?>

                    <div class="single-blog-post-content-body">

                        <?php
                        the_content();
                        ?>

                        <?php
                        if (have_rows('flexible_content_blocks')) :

                            while (have_rows('flexible_content_blocks')) : the_row();

                                get_template_part('flexible/flexible', get_row_layout());

                            endwhile;

                        endif;
                        ?>

                        <div class="single-blog-post-content-bottom-line">
                            <div class="single-blog-post-content-bottom-line-tags-container">

                                <?php
                                foreach ($tags as $tag) :
                                    $tag_name = $tag->name;
                                    $tag_link = get_tag_link($tag->term_id);
                                ?>
                                    <a href="<?php echo esc_url($tag_link) ?>"><?php echo '#' . $tag_name ?></a>

                                <?php
                                endforeach;
                                ?>

                            </div>

                            <?php
                            $comment = get_field('comment', 'options');
                            $like = get_field('like', 'options');
                            ?>

                            <div class="single-blog-post-content-bottom-line-buttons-container">

                                <div class="one-interactive-element">
                                    <?php if ($comment) : ?>
                                        <img class="" src="<?php echo $comment['url']; ?>" alt="<?php echo $comment['alt']; ?>" title="<?php echo $comment['title']; ?>">
                                    <?php endif ?>
                                    <div>Comment</div>
                                </div>

                                <div class="one-interactive-element" id="likes-container">
                                    <!-- empty by default, element will be here by js script -->
                                </div>

                            </div>
                        </div>

                    </div>

                    <?php get_sidebar() ?>

                </div>

                <div class="comments-section">

                    <?php
                    $comments_count = get_comments_number();
                    ?>

                    <h4>Comment(<?php echo $comments_count; ?>)</h4>

                    <div class="comments-container">

                        <?php comments_template(); ?>

                    </div>

                    <?php if ($logo) : ?>
                        <img class="logo" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['title']; ?>">
                    <?php endif ?>

                </div>

            </div>

        </div>

    </section>


    <?php
    get_footer();
    ?>

</div>