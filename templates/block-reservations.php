<section class="section-reservations">
    <div class="container">

        <div class="template-reservation-container">

            <div class="template-reservation-content">

                <?php
                $spoon = get_field('spoon', 'options');
                $header = get_field('reservation_form_header', 'options');
                $title = get_field('reservation_form_title', 'options');
                ?>

                <h6><?php echo $header ?></h6>

                <?php if ($spoon) : ?>
                    <img class="spoon" src="<?php echo $spoon['url']; ?>" alt="<?php echo $spoon['alt']; ?>" title="<?php echo $spoon['title']; ?>">
                <?php
                endif;
                ?>

                <h2><?php echo $title ?></h2>


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

</div>