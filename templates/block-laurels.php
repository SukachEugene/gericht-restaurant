



        <div class="section-laurels-container">
            <div class="section-laurels-content">

                <div class="section-laurels-content-left-part">

                    <?php
                    $header = get_field('our_laurels_header', 'options');
                    $spoon = get_field('spoon', 'options');
                    $title = get_field('our_laurels_title', 'options');
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

                    <div class="section-laurels-goals">
                        <?php
                        $goals = get_field('our_laurels_goals', 'options');

                        if ($goals) :
                            foreach ($goals as $goal) :

                                $number = $goal['number'];
                                $image = $goal['image'];
                                $title = $goal['title'];
                                $text = $goal['text'];
                        ?>

                                <div class="section-laurels-goals-element">
                                    <div class="section-laurels-goals-element-image-container">
                                        <p class="laurel-number"><?php echo $number ?></p>
                                        <img class="laurel-image" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>">
                                    </div>

                                    <div class="section-laurels-goals-element-text-container">
                                        <h4><?php echo $title ?></h4>
                                        <p><?php echo $text ?></p>
                                    </div>
                                </div>

                        <?php
                            endforeach;
                        endif;
                        ?>

                    </div>

                </div>

                <?php
                $image = get_field('image_element', 'options');
                $letter = get_field('letter_front', 'options');
                ?>

                <div class="section-laurels-content-right-part">
                    <img class="image" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>">
                    <img class="letter" src="<?php echo $letter['url']; ?>" alt="<?php echo $letter['alt']; ?>" title="<?php echo $letter['title']; ?>">
                </div>

            </div>
        </div>