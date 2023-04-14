<?php




function show_last_post_widget()
{

    class wpb_widget extends WP_Widget
    {
        function __construct()
        {
            parent::__construct(

                'wpb_widget',
                __('Show Latest Post Widget', 'wpb_widget_domain'),
                array('description' => __('Simple widget for show latest post of our blog', 'wpb_widget_domain'),)
            );
        }

        public function widget($args, $instance)
        {


            $post = get_posts(array(
                'post_type' => 'post',
                'order' => 'ASC',
                'posts_per_page' => 1,
            ));

            if ($post) :

                $id = $post[0]->ID;
                $thumbnail = get_the_post_thumbnail($id);
                $date = get_the_date('d M Y', $id);
                $authorID = $post[0]->post_author;
                $author = get_the_author_meta('display_name', $authorID);
                $title = $post[0]->post_title;
                $excerpt = $post[0]->post_excerpt;
                $excerpt = wp_trim_words($excerpt, 20, '...');
                $link = get_the_permalink($id);

?>

                <div class="sidebar-widget-container">

                    <h4>Our Latest Posts</h4>

                    <div class="sidebar-widget-container-image-container">

                        <?php
                        if ($thumbnail) {
                            echo $thumbnail;
                        } ?>

                    </div>

                    <div>
                        <div class="sidebar-widget-container-row-text">
                            <p><?php echo $date ?></p>
                            <p><?php echo " - " . $author ?></p>
                        </div>
                        <a class="sidebar-widget-container-post-title" href="<?php echo $link ?>">
                            <h4><?php echo $title ?></h4>
                        </a>
                        <p class="sidebar-widget-container-post-text"><?php echo $excerpt ?></p>
                        <a class="sidebar-widget-container-post-link" href="<?php echo $link ?>">Read more</a>
                    </div>

                </div>

            <?php
            endif;
        }
    }

    register_widget('wpb_widget');
}
add_action('widgets_init', 'show_last_post_widget');












function show_all_posts_categories_widget()
{

    class wpb_widget1 extends WP_Widget
    {
        function __construct()
        {
            parent::__construct(

                'wpb_widget1',
                __('Show All Posts Categories Widget', 'wpb_widget_domain'),
                array('description' => __('Simple widget for show all post`s categories', 'wpb_widget_domain'),)
            );
        }

        public function widget($args, $instance)
        {

            $parent_categories = get_category_by_slug('blog-posts-categories');

            $child_categories = get_categories(array(
                'parent' => $parent_categories->term_id,
                'orderby' => 'description',
                'hide_empty' => false
            ));

            ?>
            <div class="sidebar-widget-container">
                <h4>All Categories</h4>
                <div class="sidebar-widget-categories-container">
                    <?php
                    $divider = get_field('menu_divider', 'options');

                    foreach ($child_categories as $child_category) :
                        $name = $child_category->name;
                        $count = $child_category->count;
                        $category_link = get_category_link($child_category->cat_ID)
                    ?>
                        <div class="sidebar-widget-one-category-container">
                            <a href="<?php echo esc_url($category_link) ?>" class="sidebar-widget-one-category-name"><?php echo $name ?></a>

                            <?php if ($divider) : ?>

                                <div class="sidebar-widget-one-category-divider">
                                    <img class="" src="<?php echo $divider['url']; ?>" alt="<?php echo $divider['alt']; ?>" title="<?php echo $divider['title']; ?>">
                                </div>

                            <?php endif; ?>

                            <p class="sidebar-widget-one-category-number"><?php echo '(' . $count . ')' ?></p>
                        </div>

                    <?php
                    endforeach;
                    ?>
                </div>
            </div>
        <?php

        }
    }

    register_widget('wpb_widget1');
}
add_action('widgets_init', 'show_all_posts_categories_widget');









function show_all_posts_tags_widget()
{


    class wpb_widget2 extends WP_Widget
    {
        function __construct()
        {
            parent::__construct(

                'wpb_widget2',
                __('Show All Posts Tags Widget', 'wpb_widget_domain'),
                array('description' => __('Simple widget for show all post`s tags', 'wpb_widget_domain'),)
            );
        }


        public function widget($args, $instance)
        {

            $tags = get_tags();

        ?>
            <div class="sidebar-widget-container">
                <h4>Related Tags</h4>
                <div class="sidebar-widget-tags-container">

                    <?php

                    $counter = 1;  // number of first row first element
                    $check = 4;    // number of second row first element
                    $first_block = true;  // bool for second+ rows check

                    foreach ($tags as $tag) :
                        $name = $tag->name;
                        $tag_link = get_tag_link($tag->term_id);

                        if ($counter == 1 || $counter % $check == 0) :
                    ?>
                            <div class="sidebar-widget-tags-row-container">

                            <?php endif ?>

                            <div class="sidebar-widget-one-tag-container">
                                <a href="<?php echo esc_url($tag_link) ?>" class="sidebar-widget-one-tag-name"><?php echo $name ?></a>

                                <?php
                                if ($tag === end($tags) || $counter % 3 == 0) {
                                    if ($first_block) {
                                        $first_block = false;
                                    } else {
                                        $check = $check + 3;
                                    }

                                ?>
                            </div>
                        <?php
                                } else {
                        ?>
                            <span>—</span>
                        <?php
                                }
                        ?>
                            </div>


                        <?php
                        $counter++;
                    endforeach;
                        ?>
                </div>
            </div>
        <?php

        }
    }


    register_widget('wpb_widget2');
}
add_action('widgets_init', 'show_all_posts_tags_widget');







function search_posts_widget()
{


    class wpb_widget3 extends WP_Widget
    {
        function __construct()
        {
            parent::__construct(

                'wpb_widget3',
                __('Search Posts Widget', 'wpb_widget_domain'),
                array('description' => __('Simple widget for search posts by keywords and with redirect to results page', 'wpb_widget_domain'),)
            );
        }


        public function widget($args, $instance)
        {

        ?>

            <div class="sidebar-widget-container">
                <h4>Search Page</h4>

                <?php

                get_search_form();

                ?>
            </div>

            <?php
        }
    }


    register_widget('wpb_widget3');
}
add_action('widgets_init', 'search_posts_widget');








function sm_share_widget()
{


    class wpb_widget4 extends WP_Widget
    {
        function __construct()
        {
            parent::__construct(

                'wpb_widget4',
                __('Social Media Share Post Widget', 'wpb_widget_domain'),
                array('description' => __('Simple widget for share single blog post on social medias', 'wpb_widget_domain'),)
            );
        }


        public function widget($args, $instance)
        {

            if (is_singular('post')) {

                $medias = get_field('social_medias', 'option');

                $post_url = urlencode(get_permalink());
                $post_title = str_replace(' ', '%20', get_the_title());
                $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
                $og_image = esc_url($thumbnail[0]);

            ?>

                <div class="sidebar-widget-container">
                    <h4>Share</h4>

                    <div class="share-icons-container">

                        <?php
                        if ($medias) {
                            foreach ($medias as $media) {
                                $site = $media['site'];

                                if ($site == 'Facebook') {
                                    $facebook = 'https://www.facebook.com/sharer.php?u=' . $post_url;
                                    $button =  '<a class="share-ico ico-facebook" href="' . $facebook . '" title="Share on Facebook" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>';
                                    echo $button;
                                } else if ($site == 'Twitter') {
                                    $twitter = 'https://twitter.com/intent/tweet?text=' . $post_title . '&amp;url=' . $post_url . '&amp;';
                                    $button = '<a class="share-ico ico-twitter" href="' . $twitter . '" title="Tweet on Twitter" target="_blank"><i class="fa-brands fa-twitter"></i></a>';
                                    echo '<meta property="twitter:card" content="summary_large_image" />';
                                    echo '<meta property="twitter:image" content="' . $og_image . '" />';
                                    echo $button;
                                } else if ($site == 'LinkedIn') {
                                    $linkedIn = 'https://www.linkedin.com/shareArticle?mini=true&url=' . $post_url . '&amp;title=' . $post_title;
                                    $button = '<a class="share-ico ico-linkedin" href="' . $linkedIn . '" title="Share on LinkedIn" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>';
                                    echo $button;
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
<?php
            }
        }
    }


    register_widget('wpb_widget4');
}
add_action('widgets_init', 'sm_share_widget');
