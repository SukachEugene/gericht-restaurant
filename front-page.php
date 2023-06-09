<?php
get_header()
?>

<section class="section-head-posts">

    <div class="slider-one">

        <?php
        $title_characters_count = get_field('header_slides_title_characters_count');
        $content_characters_count = get_field('header_slides_content_characters_count');

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
                <div class="slider-one-slide">

                    <div class="container">

                        <div class="section-head-posts-content">

                            <div class="section-head-posts-categories">
                                <?php

                                if ($categories) :
                                    foreach ($categories as $category) :
                                        $name = $category->name;
                                ?>
                                        <p>#<?php echo $name ?></p>

                                <?php
                                    endforeach;
                                endif;
                                ?>
                            </div>

                            <div class="section-head-posts-content-text-container">
                                <div class="section-head-posts-content-text-container2">
                                    <?php if ($header) : ?>
                                        <p class="section-head-posts-content-header"><?php echo $header ?></p>
                                        <?php if ($spoon) : ?>
                                            <img class="spoon" src="<?php echo $spoon['url']; ?>" alt="<?php echo $spoon['alt']; ?>" title="<?php echo $spoon['title']; ?>">
                                    <?php
                                        endif;
                                    endif;
                                    ?>
                                    <?php if ($title) :

                                        if ($title_characters_count && mb_strlen($title) > $title_characters_count) {
                                            $title = mb_substr($title, 0, $title_characters_count) . '...';
                                        }

                                    ?>
                                        <h1><?php echo $title; ?> </h1>
                                    <?php endif ?>
                                    <?php if ($content) :
                                        if ($content_characters_count && mb_strlen($content) > $content_characters_count) {
                                            $content = mb_substr($content, 0, $content_characters_count) . '...';
                                        }
                                    ?>
                                        <p class="section-head-posts-content-text sans"><?php echo $content ?></p>
                                    <?php endif; ?>
                                    <?php if ($link) : ?>
                                        <a class="gold-button" href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>"> <?php echo  $link['title']; ?> </a>
                                    <?php endif ?>
                                </div>
                            </div>

                            <?php if ($image) : ?>
                                <div class="section-head-posts-content-image-container">
                                    <?php if ($frame) : ?>
                                        <img class="section-head-posts-content-frame left-frame" src="<?php echo $frame['url']; ?>" alt="<?php echo $frame['alt']; ?>" title="<?php echo $frame['title']; ?>">
                                        <img class="section-head-posts-content-frame right-frame" src="<?php echo $frame['url']; ?>" alt="<?php echo $frame['alt']; ?>" title="<?php echo $frame['title']; ?>">
                                    <?php endif ?>
                                    <img class="section-head-posts-content-image" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>">
                                </div>
                            <?php endif ?>
                        </div>
                    </div>

                </div>
        <?php
            endforeach;
        endif
        ?>

    </div>


    <div class="section-head-posts-buttons-container container">
        <div class="section-head-posts-buttons">

            <div class="slider-one-nav">
                <?php
                if ($head_posts) :
                    foreach ($head_posts as $key => $element) :
                ?>
                        <p class="slider-one-slide-index pointer" data-index="<?php echo $key + 1 ?>"><?php echo $key + 1 ?></p>

                <?php

                    endforeach;
                endif;
                ?>

            </div>

            <?php if ($scroll) : ?>
                <div class="scroll-button pointer" id="scroll-down">
                    <img src="<?php echo $scroll['url']; ?>" alt="<?php echo $scroll['alt']; ?>" title="<?php echo $scroll['title']; ?>">
                    <p>SCROLL</p>
                </div>
            <?php endif ?>

        </div>
    </div>

</section>


<div class="global-lines">
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
    $background = get_field('about_company_background');
    $letter = get_field('letter_back', 'options');
    $logo = get_field('logo', 'options');
    ?>

    <section class="section-knife" style="background-image: url('<?php echo $background['url']; ?>')">

        <?php if ($letter) : ?>
            <img class="background-letter" src="<?php echo $letter['url']; ?>" alt="<?php echo $letter['alt']; ?>" title="<?php echo $letter['title']; ?>">
        <?php endif ?>

        <div class="container">
            <div class="section-knife-content">
                <?php
                $spoon = get_field('spoon', 'options');
                $title_left = get_field('about_company_left_title');
                $title_right = get_field('about_company_right_title');
                $text_left = get_field('about_company_left_text');
                $text_right = get_field('about_company_right_text');
                $link_left = get_field('about_company_left_link');
                $link_right = get_field('about_company_right_link');
                $image = get_field('about_company_image');

                ?>

                <div class="section-knife-content-text-container left">
                    <?php if ($title_left) : ?>
                        <h2><?php echo $title_left ?></h2>
                    <?php endif ?>
                    <?php if ($spoon) : ?>
                        <img class="spoon upset" src="<?php echo $spoon['url']; ?>" alt="<?php echo $spoon['alt']; ?>" title="<?php echo $spoon['title']; ?>">
                    <?php endif ?>
                    <?php if ($text_left) : ?>
                        <p><?php echo $text_left ?></p>
                    <?php endif ?>
                    <?php if ($link_left) : ?>
                        <a class="gold-button" href="<?php echo esc_url($link_left['url']); ?>" target="<?php echo esc_attr($link_left['target']); ?>"> <?php echo  $link_left['title']; ?> </a>
                    <?php endif ?>
                </div>

                <?php if ($image) : ?>
                    <img class="section-knife-content-image" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>">
                <?php endif ?>

                <div class="section-knife-content-text-container right">
                    <?php if ($title_right) : ?>
                        <h2><?php echo $title_right ?></h2>
                    <?php endif ?>
                    <?php if ($spoon) : ?>
                        <img class="spoon" src="<?php echo $spoon['url']; ?>" alt="<?php echo $spoon['alt']; ?>" title="<?php echo $spoon['title']; ?>">
                    <?php endif ?>
                    <?php if ($text_right) : ?>
                        <p><?php echo $text_right ?></p>
                    <?php endif ?>
                    <?php if ($link_right) : ?>
                        <a class="gold-button" href="<?php echo esc_url($link_right['url']); ?>" target="<?php echo esc_attr($link_right['target']); ?>"> <?php echo  $link_right['title']; ?> </a>
                    <?php endif ?>
                </div>

            </div>

        </div>

        <?php if ($logo) : ?>
            <img class="logo" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['title']; ?>">
        <?php endif ?>

    </section>


    <?php get_template_part('templates/block', 'reservations'); ?>

    <?php get_template_part('templates/block', 'menu'); ?>

    <?php get_template_part('templates/block', 'chefs-word'); ?>

    <?php get_template_part('templates/block', 'customers'); ?>

    <?php get_template_part('templates/block', 'video-banner'); ?>


    <?php
    $background = get_field('our_laurels_background_image', 'options');
    ?>

    <section class="section-laurels" style="background-image: url('<?php echo $background['url']; ?>')">

        <?php get_template_part('templates/block', 'laurels'); ?>

    </section>


    <section class="section-blogs">

        <div class="container">

            <div class="section-blogs-content">

                <div class="section-blogs-content-head">

                    <?php
                    $header = get_field('blogs_header');
                    $spoon = get_field('spoon', 'options');
                    $title = get_field('blogs_title');
                    ?>

                    <?php if ($header) : ?>
                        <h6><?php echo $header ?></h6>
                    <?php endif ?>

                    <?php if ($spoon) : ?>
                        <img class="spoon" src="<?php echo $spoon['url']; ?>" alt="<?php echo $spoon['alt']; ?>" title="<?php echo $spoon['title']; ?>">
                    <?php endif; ?>

                    <?php if ($title) : ?>
                        <h2><?php echo $title ?></h2>
                    <?php endif ?>
                </div>

                <div class="section-blogs-content-posts-container" id="posts-container">

                    <?php get_template_part('templates/block', 'blog-posts'); ?>

                </div>

                <div class="section-blogs-button-container">
                    <button class="gold-button" id="load-more-posts" data-number="3">View More</button>
                </div>

            </div>

            <?php
            $logo = get_field('logo', 'options');
            if ($logo) : ?>
                <img class="logo" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['title']; ?>">
            <?php endif ?>

        </div>

    </section>

    <div class="front-page">
        <?php get_template_part('templates/block', 'gallery'); ?>
    </div>

    <?php
    get_footer();
    ?>

</div>