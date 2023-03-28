<section class="section-menu">

    <div class="container">

        <article class="menu-banner-container">

            <?php
            $parent_categories = get_category_by_slug('menu-categories');

            $child_categories = get_categories(array(
                'parent' => $parent_categories->term_id,
                'orderby' => 'description'
            ));

            if ($child_categories) :

                for ($i = 0; $i < count($child_categories); $i++) {
                    $name = $child_categories[$i]->name;
                    $slug = $child_categories[$i]->slug;
                    $term_id = $child_categories[$i]->term_id;

                    if ($term_id) :
                        $term_banner_url = get_term_meta($term_id, 'term_banner', true);
                    endif;

                    if ($i == 0) {
            ?>
                        <h3 class="menu-filter active"><?php echo $name ?></h3>
                        <img class="menu-banner active" src="<?php echo $term_banner_url ?>" alt="" title="">

                    <?php
                    } else {
                    ?>
                        <h3 class="menu-filter"><?php echo $name ?></h3>
                        <img class="menu-banner" src="<?php echo $term_banner_url ?>" alt="" title="">

                <?php
                    }
                }
                ?>

        </article>

        <article class="menu-details-container">

            <div class="menu-details-content">

                <?php
                $header = get_field('menu_header', 'options');
                $spoon = get_field('spoon', 'options');
                $title = get_field('menu_title', 'options');
                $divider = get_field('menu_divider', 'options');
                ?>

                <div class="menu-details-container-head">

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

                <?php
                for ($i = 0; $i < count($child_categories); $i++) {
                    $name = $child_categories[$i]->name;
                    $term_id = $child_categories[$i]->term_id;
                    $term_image_url = get_term_meta($term_id, 'term_image', true);

                    $menu_positions = get_posts(array(
                        'post_type' => 'menu_positions',
                        'category_name' => $name,
                        'posts_per_page' => 2,
                        'order' => 'ASC',
                        'meta_key' => 'show_on_page',
                        'meta_query' => array(
                            array(
                                'key' => 'show_on_page',
                                'value' => true
                            )
                        )
                    ));


                    if ($menu_positions && $i == 0) {
                ?>
                        <div class="menu-details-container-positions active">

                        <?php
                    } else {
                        ?>
                            <div class="menu-details-container-positions">

                            <?php
                        }

                        foreach ($menu_positions as $element) :
                            $id = $element->ID;
                            $title = $element->post_title;
                            $positions =  get_field('menu_position', $id);
                            ?>
                                <div class="menu-details-container-positions-element text">
                                    <h4><?php echo $title ?> </h4>

                                    <?php
                                    if ($positions) :
                                        foreach ($positions as $element) :
                                            $name = $element['name'];
                                            $description = $element['description'];
                                            $price = $element['price'];
                                    ?>

                                            <div class="menu-details-container-positions-element-content">

                                                <div class="menu-details-container-positions-element-content-first-row">
                                                    <h5><?php echo $name ?></h5>

                                                    <?php if ($divider) : ?>

                                                        <div class="divider-container">
                                                            <img class="divider" src="<?php echo $divider['url']; ?>" alt="<?php echo $dvider['alt']; ?>" title="<?php echo $divider['title']; ?>">
                                                        </div>

                                                    <?php endif; ?>

                                                    <p class="menu-details price"><?php echo $price ?></p>
                                                </div>

                                                <p class="menu-details description"><?php echo $description ?></p>

                                            </div>

                                    <?php
                                        endforeach;
                                    endif;
                                    ?>

                                </div>

                            <?php
                        endforeach;
                            ?>

                            <div class="menu-details-container-positions-element image">
                                <img class="menu-image" src="<?php echo $term_image_url ?>" alt="" title="">
                            </div>

                            </div>
                    <?php
                }
            endif;
                    ?>

                        </div>

                        <?php
                        $link = get_field('menu_link', 'options');

                        if ($link) : ?>

                            <a class="gold-button" href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>"> <?php echo  $link['title']; ?> </a>

                        <?php endif ?>
        </article>
    </div>

</section>