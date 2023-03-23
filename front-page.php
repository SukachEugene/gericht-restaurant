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
                            <a class="gold-button" href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>"> <?php echo  $link['title']; ?> </a>
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

    <div class="slider-one-nav">
        <?php
        if ($head_posts) :


            foreach ($head_posts as $element) :

                $index = $element->menu_order;

        ?>
                <p class="slider-one-slide-index test"><?php echo $index ?></p>

        <?php

            endforeach;
        endif;
        ?>

    </div>

    <!-- <a class="scroll-link down" href="#about-us">
        <img src="<?php echo $scroll['url']; ?>" alt="<?php echo $scroll['alt']; ?>" title="<?php echo $scroll['title']; ?>">
        <p>SCROLL</p>
    </a> -->

</section>

<?php
$background = get_field('about_company_background');
$letter = get_field('letter', 'options');
$logo = get_field('logo', 'options');
?>

<section class="section-knife" style="background-image: url('<?php echo $background['url']; ?>">

    <img class="background-letter" src="<?php echo $letter['url']; ?>" alt="<?php echo $letter['alt']; ?>" title="<?php echo $letter['title']; ?>">

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
                <h2><?php echo $title_left ?></h2>
                <img class="spoon upset" src="<?php echo $spoon['url']; ?>" alt="<?php echo $spoon['alt']; ?>" title="<?php echo $spoon['title']; ?>">
                <p><?php echo $text_left ?></p>
                <a class="gold-button" href="<?php echo esc_url($link_left['url']); ?>" target="<?php echo esc_attr($link_left['target']); ?>"> <?php echo  $link_left['title']; ?> </a>
            </div>

            <img class="section-knife-content-image" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>">

            <div class="section-knife-content-text-container right">
                <h2><?php echo $title_right ?></h2>
                <img class="spoon" src="<?php echo $spoon['url']; ?>" alt="<?php echo $spoon['alt']; ?>" title="<?php echo $spoon['title']; ?>">
                <p><?php echo $text_right ?></p>
                <a class="gold-button" href="<?php echo esc_url($link_right['url']); ?>" target="<?php echo esc_attr($link_right['target']); ?>"> <?php echo  $link_right['title']; ?> </a>
            </div>

        </div>

    </div>

    <img class="logo" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['title']; ?>">

</section>

<section class="section-reservations">
    <div class="container">

    </div>
</section>


<?php
get_footer();
?>