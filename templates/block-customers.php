<section class="section-customers">
    <div class="container">
        <div class="section-customers-content-header">
            <?php
            $header = get_field('customers_header', 'options');
            $spoon = get_field('spoon', 'options');
            $title = get_field('customers_title', 'options');
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

        <div class="section-customers-content">
            <?php
            $customers = get_posts(array(
                'post_type' => 'customers',
                'posts_per_page' => -1,
                'order' => 'ASC',
            ));

            if ($customers) :
                foreach ($customers as $customer) :

                    $id = $customer->ID;
                    $name = $customer->post_title;
                    $content = $customer->post_content;
                    $image_url = get_the_post_thumbnail_url($id);
                    $position = get_field('position', $id);
                    $quotes = get_field('quotes', 'options');

            ?>

                    <div class="section-customers-element">

                        <div class="section-customers-element-image-container">

                            <?php if ($image_url) : ?>
                                <img class="customer-image" src="<?php echo $image_url ?>" alt="" title="">
                            <?php endif; ?>

                            <?php if ($quotes) : ?>
                                <img class="quotes" src="<?php echo $quotes['url']; ?>" alt="<?php echo $quotes['alt']; ?>" title="<?php echo $quotes['title']; ?>">
                            <?php endif; ?>

                        </div>

                        <div class="section-customers-element-text-container">

                            <?php if ($content) : ?>
                                <p><?php echo $content ?></p>
                            <?php endif ?>

                            <?php if ($name) : ?>
                                <h4><?php echo $name ?></h4>
                            <?php endif ?>

                            <?php if ($position) : ?>
                                <h5><?php echo $position ?></h5>
                            <?php endif ?>

                        </div>





                    </div>

            <?php
                endforeach;
            endif;
            ?>



        </div>

    </div>
</section>