<div id="book-table"></div>

<section class="section-reservations">

    <div class="container">

        <div class="template-reservation-container">

            <div class="template-reservation-content">

                <?php
                $spoon = get_field('spoon', 'options');
                $header = get_field('reservation_form_header', 'options');
                $title = get_field('reservation_form_title', 'options');
                ?>

                <?php if ($header) : ?>
                    <h6><?php echo $header ?></h6>
                <?php endif ?>

                <?php if ($spoon) : ?>
                    <img class="spoon" src="<?php echo $spoon['url']; ?>" alt="<?php echo $spoon['alt']; ?>" title="<?php echo $spoon['title']; ?>">
                <?php
                endif;
                ?>

                <?php if ($title) : ?>
                    <h2><?php echo $title ?></h2>
                <?php endif ?>

                <div class="template-reservation-content-form">
                    <?php
                    $form = '[ninja_form id="2"]';
                    echo do_shortcode($form);
                    ?>
                </div>

            </div>
        </div>
    </div>

</section>