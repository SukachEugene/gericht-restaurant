<footer>

    <div class="footer-container">

        <?php
        $background = get_field('footer_background', 'options');

        if ($background) : ?>

            <img class="footer-background" src="<?php echo $background['url']; ?>" alt="<?php echo $background['alt']; ?>" title="<?php echo $background['title']; ?>">

        <?php endif; ?>

        <div class="subscribe-container">

            <?php
            $header = get_field('subscribe_header', 'options');
            $spoon = get_field('spoon', 'options');
            $title = get_field('subscribe_title', 'options');
            $text = get_field('subscribe_text', 'options');
            $form = get_field('subscribe_form', 'options');
            ?>

            <div class="subscribe-text">

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

            </div>


            <div class="subscribe-form">
                <?php
                echo do_shortcode($form);
                ?>
            </div>

        </div>

        <div class="footer-button-container">
                <?php
                $scroll = get_field('scroll', 'options');

                if ($scroll) : ?>
                    <div class="scroll-button pointer" id="scroll-top">
                        <img src="<?php echo $scroll['url']; ?>" alt="<?php echo $scroll['alt']; ?>" title="<?php echo $scroll['title']; ?>">
                        <p>TOP</p>
                    </div>
                <?php endif ?>
            </div>

        <div class="bottom-container">

            <div class="bottom-container-element edge-element">

                <h5>Contact US</h5>

                <?php
                $address = get_field('contacts_address', 'options');
                if ($address) :
                ?>

                    <p class="footer-text-style separate-element"><?php echo $address ?></p>

                <?php endif ?>

                <?php
                $phones = get_field('contacts_phones', 'options');

                if ($phones) :

                    foreach ($phones as $number) :
                        $phone_number = $number['phone_number'];

                ?>

                        <p class="footer-text-style"><a href="tel:+<?php echo preg_replace('~\D~', '', $phone_number); ?>"><?php echo $phone_number ?></a></p>

                <?php endforeach;
                endif; ?>

            </div>

            <div class="bottom-container-element central-element">

                <?php
                $name = get_field('restaurants_name', 'options');
                $quote = get_field('footer_quote', 'options');
                $spoon = get_field('spoon', 'options');
                ?>

                <?php if ($name) : ?>
                    <h2><?php echo $name ?></h2>
                <?php endif ?>

                <?php if ($quote) : ?>
                    <p><?php echo $quote ?></p>
                <?php endif ?>

                <?php if ($spoon) : ?>
                    <div>
                        <img class="spoon" src="<?php echo $spoon['url']; ?>" alt="<?php echo $spoon['alt']; ?>" title="<?php echo $spoon['title']; ?>">
                    </div>
                <?php endif; ?>

                <div class="social-media-container">

                    <?php
                    $social_media = get_field('contacts_social_media', 'options');

                    if ($social_media) :

                        foreach ($social_media as $media) :
                            $name = $media['name'];
                            $url = $media['url'];
                    ?>

                            <a class="social-media icon" href="<?php echo $url ?>" target="<?php echo $url ?>"><i class="<?php echo $name ?>"></i></a>

                    <?php endforeach;
                    endif; ?>

                </div>

            </div>

            <div class="bottom-container-element edge-element">

                <h5>Working Hours</h5>

                <?php
                $array = get_field('footer_working_hours', 'options');

                if ($array) :

                    foreach ($array as $element) :
                        $days = $element['days'];
                        $hours = $element['hours'];
                ?>
                        <div class="footer-text-style separate-element">
                            <p class="footer-text-style"><?php echo $days ?></p>
                            <p class="footer-text-style"><?php echo $hours ?></p>
                        </div>

                <?php endforeach;
                endif; ?>

            </div>

        </div>

        <div class="footer-copyright-container">
            <?php
            $copyright = get_field('footer_copyright', 'options');

            if ($copyright) : ?>
                <p class="footer-text-style"><?php echo $copyright ?></p>
            <?php endif ?>
        </div>

    </div>

</footer>


<?php
wp_footer();
?>

</body>

</html>