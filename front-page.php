<?php
get_header()
?>



<section class="section-head-posts">

    <div class="slider-one">

        <?php

        $title_words_count = get_field('header_slides_title_words_count');
        $content_words_count = get_field('header_slides_content_words_count');

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
                                        $words = explode(' ', $title);

                                        if ($title_words_count && count($words) > $title_words_count) {
                                            $title = implode(' ', array_slice($words, 0, $title_words_count));
                                        }

                                    ?>
                                        <h1><?php echo $title; ?> </h1>
                                    <?php endif ?>
                                    <?php if ($content) :
                                        $words = explode(' ', $content);

                                        if ($content_words_count && count($words) > $content_words_count) {
                                            $content = implode(' ', array_slice($words, 0, $content_words_count)) . '...';
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
                <button class="scroll-button pointer" id="scroll-down" type="button">
                    <img src="<?php echo $scroll['url']; ?>" alt="<?php echo $scroll['alt']; ?>" title="<?php echo $scroll['title']; ?>">
                    <p>SCROLL</p>
            </button>
            <?php endif ?>

        </div>
    </div>

</section>

<?php
$background = get_field('about_company_background');
$letter = get_field('letter', 'options');
$logo = get_field('logo', 'options');
?>


<section class="section-knife" style="background-image: url('<?php echo $background['url']; ?>">

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

<section class="section-reservations">
    <div class="container">

    </div>
</section>


<?php
get_footer();
?>