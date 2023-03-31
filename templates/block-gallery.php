<section class="section-gallery">

    <div class="gallery-container">

        <div class="section-gallery-text">

            <?php
            $header = get_field('gallery_header', 'options');
            $spoon = get_field('spoon', 'options');
            $title = get_field('gallery_title', 'options');
            $text = get_field('gallery_text', 'options');
            $link = get_field('gallery_link', 'options');
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

            <?php if ($text) : ?>
                <p><?php echo $text ?></p>
            <?php endif ?>

            <?php if ($link) : ?>
                <a class="gold-button" href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>"> <?php echo  $link['title']; ?> </a>
            <?php endif ?>

        </div>

        <div class="section-gallery-slider">
            <?php
            $code = get_field('gallery_code', 'options');
            echo do_shortcode($code);
            ?>

        </div>
    </div>

</section>

<?php
// $link = '[insta-gallery id="2"]';
// echo do_shortcode($link);
?>