<?php
get_header()
?>



<section class="section-head-posts">

    <div class="slider-one">

        <?php
        $head_posts = get_posts(array(
            'post_type' => 'front-page-head-post',
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'posts_per_page' => -1,
        ));

        if ($head_posts) :

            foreach ($head_posts as $element) :

                $id = $element->ID;
                $title = $element->post_title;
                $content = $element->post_content;
                $categories = get_the_category($element);
                $header = get_field('header', $id);
                $image = get_field('image', $id);
                $link = get_field('link', $id);
                $spoon = get_field('spoon', 'options');
                $frame = get_field('frame', 'options');
                $scroll = get_field('scroll', 'options');
        ?>
                <div class="section-head-posts-content container">

                    <div class="section-head-posts-categories">
                        <?php
                        foreach ($categories as $category) :
                            $name = $category->name;
                        ?>
                            <p>#<?php echo $name ?></p>

                        <?php
                        endforeach;
                        ?>
                    </div>

                    <div class="section-head-posts-content-text-container">
                        <div class="section-head-posts-content-text-container2">
                            <p class="section-head-posts-content-header"><?php echo $header ?></p>
                            <img class="spoon" src="<?php echo $spoon['url']; ?>" alt="<?php echo $spoon['alt']; ?>" title="<?php echo $spoon['title']; ?>">
                            <h1><?php echo $title; ?> </h1>
                            <p class="section-head-posts-content-text sans"><?php echo $content ?></p>
                            <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>"> <?php echo  $link['title']; ?> </a>
                        </div>
                    </div>

                    <div class="section-head-posts-content-image-container">
                        <img class="section-head-posts-content-frame left-frame" src="<?php echo $frame['url']; ?>" alt="<?php echo $frame['alt']; ?>" title="<?php echo $frame['title']; ?>">
                        <img class="section-head-posts-content-frame right-frame" src="<?php echo $frame['url']; ?>" alt="<?php echo $frame['alt']; ?>" title="<?php echo $frame['title']; ?>">
                        <img class="section-head-posts-content-image" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>">
                    </div>
                </div>
        <?php
            endforeach;
        endif
        ?>

    </div>

    <!-- <a class="scroll-link down" href="#about-us">
        <img src="<?php echo $scroll['url']; ?>" alt="<?php echo $scroll['alt']; ?>" title="<?php echo $scroll['title']; ?>">
        <p>SCROLL</p>
    </a> -->

</section>


<?php
get_footer();
?>