<?php
get_header()
?>

<section class="seach-results-page">

    <div class="container2">

        <h1>search results:</h1>

        <div class="seach-results-page-content">

            <ol>

                <?php
                $s = get_search_query();

                $s_words = explode(" ", $s);

                $args = array(
                    's' => $s,
                    'post_type' => 'post',
                    'posts_per_page' => -1,
                );

                $posts = get_posts($args);

                if ($posts) :

                    foreach ($posts as $post) :
                        $id = $post->ID;
                        $title = $post->post_title;
                        $excerpt = $post->post_excerpt;
                        $excerpt = wp_trim_words($excerpt, 40, '...');
                        $link = get_the_permalink($id);
                ?>
                        <li>
                            <a href="<?php echo $link ?>">
                                <h4><?php echo $title ?></h4>
                            </a>
                            <p><?php echo $excerpt ?></p>
                        </li>

                    <?php
                    endforeach;

                else :
                    ?>

                    <h4 style="text-align: center;">Found nothing</h4>

                <?php
                endif;
                ?>
            </ol>

        </div>

    </div>
</section>

<?php
get_footer();
?>