<?php
/*
 * Template Name: FAQ
 */
?>

<?php
get_header()
?>

<?php get_template_part('templates/block', 'head-banner'); ?>


<div class="global-lines faq-page">
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
    $image = get_field('image');
    $frame = get_field('frame', 'options');
    ?>

    <section class="section-faq">

        <div class="container2">

            <div class="section-faq-content">


                <?php if ($image) : ?>
                    <div class="section-faq-image-container">
                        <?php if ($frame) : ?>
                            <img class="section-faq left-frame" src="<?php echo $frame['url']; ?>" alt="<?php echo $frame['alt']; ?>" title="<?php echo $frame['title']; ?>">
                            <img class="section-faq right-frame" src="<?php echo $frame['url']; ?>" alt="<?php echo $frame['alt']; ?>" title="<?php echo $frame['title']; ?>">
                        <?php endif ?>
                        <img class="section-faq-image" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>">
                    </div>
                <?php endif ?>


                <div class="faq-elements-container">
                    <?php
                    $content = get_field('faq_content');
                    if ($content) :
                        foreach ($content as $element) : ?>

                            <div class="faq-element">
                                <h3><?php echo $element['title'] ?></h3>
                                <p><?php echo $element['text'] ?></p>
                            </div>

                    <?php endforeach;
                    endif ?>
                </div>

            </div>
        </div>

        <?php
        $logo = get_field('logo', 'options');
        if ($logo) : ?>
            <img class="logo bottom" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['title']; ?>">
        <?php endif ?>

    </section>


    <?php
    get_footer();
    ?>

</div>