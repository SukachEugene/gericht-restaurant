<?php
$background = get_field('chefs_word_background', 'options');
?>

<section class="section-chefs-word" style="background-image: url('<?php echo $background['url']; ?>')">
    <div class="container">

        <?php
        $chef = get_posts(array(
            'post_type' => 'our-team',
            'posts_per_page' => 1,
            'order' => 'DSC',
            'meta_key' => 'team_view_on_page',
            'meta_query' => array(
                array(
                    'key' => 'team_view_on_page',
                    'value' => true
                )
            )
        ));

        $id = $chef[0]->ID;
        $name = $chef[0]->post_title;
        $position =  get_field('team_position', $id);
        $photo =  get_field('team_photo', $id);
        $title =  get_field('team_header', $id);
        $text =  get_field('team_text', $id);
        $caption =  get_field('team_caption', $id);

        $frame = get_field('frame', 'options');
        $header = get_field('chefs_word_header', 'options');
        $spoon = get_field('spoon', 'options');
        $quotes = get_field('quotes', 'options');

        ?>

        <div class="section-chefs-word-content">

            <?php if ($photo) : ?>
                <div class="section-chefs-word-content-image-container">
                    <?php if ($frame) : ?>
                        <img class="section-chefs-word-content-frame left-frame" src="<?php echo $frame['url']; ?>" alt="<?php echo $frame['alt']; ?>" title="<?php echo $frame['title']; ?>">
                        <img class="section-chefs-word-content-frame right-frame" src="<?php echo $frame['url']; ?>" alt="<?php echo $frame['alt']; ?>" title="<?php echo $frame['title']; ?>">
                    <?php endif ?>
                    <img class="section-chefs-word-content-image" src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt']; ?>" title="<?php echo $photo['title']; ?>">
                </div>
            <?php endif ?>

            <div class="section-chefs-word-content-text-container">

                <?php if ($header) : ?>
                    <h6><?php echo $header ?></h6>
                <?php endif ?>

                <?php if ($spoon) : ?>
                    <img class="spoon" src="<?php echo $spoon['url']; ?>" alt="<?php echo $spoon['alt']; ?>" title="<?php echo $spoon['title']; ?>">
                <?php endif; ?>

                <?php if ($title) : ?>
                    <h2><?php echo $title ?></h2>
                <?php endif ?>

                <div class="section-chefs-word-content-text-container-quote">

                    <?php if ($quotes) : ?>
                        <img class="quotes" src="<?php echo $quotes['url']; ?>" alt="<?php echo $quotes['alt']; ?>" title="<?php echo $quotes['title']; ?>">
                    <?php endif; ?>

                    <?php if ($text) : ?>
                        <p><?php echo $text ?></p>
                    <?php endif ?>
                </div>

                <?php if ($name) : ?>
                    <h4><?php echo $name ?></h4>
                <?php endif ?>

                <?php if ($position) : ?>
                    <h5><?php echo $position ?></h5>
                <?php endif ?>

                <?php if ($caption) : ?>
                    <img class="section-chefs-word-caption" src="<?php echo $caption['url']; ?>" alt="<?php echo $caption['alt']; ?>" title="<?php echo $qcaption['title']; ?>">
                <?php endif; ?>

            </div>

        </div>

    </div>

    <?php
    $logo = get_field('logo', 'options');
    if ($logo) :
    ?>
        <img class="logo" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['title']; ?>">
    <?php endif ?>

</section>