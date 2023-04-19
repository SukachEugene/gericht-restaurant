<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title('');?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Sukach Eugene">
    <meta name="description" content="Site of Gericht reastaurant">
    <meta name="keywords" content="restaurant, food, dishes, delicious, chiefs cook, Gericht">

    <?php do_action('wp_head') ?>
</head>

<body <?php body_class() ?>>

    <header id="header">
        <div class="container">
            <div class="header-elements">

                <?php
                $name = get_field('restaurants_name', 'options');
                $button_text = get_field('header_buttons_text', 'options');
                $link = get_field('header_link', 'options');
                ?>

                <h4 id="header-title"><?php echo $name ?></h4>

                <?php
                wp_nav_menu(array('theme_location' => 'header-menu'));
                ?>

                <div class="header-elements-right-part">
                    <button class="pointer" type="button"><?php echo $button_text ?></button>
                    <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>"> <?php echo  $link['title']; ?> </a>
                </div>

                <div class="burger-menu">
                    <button id="open-main-nav" class="show">
                        <i class="fa-sharp fa-solid fa-bars pointer"></i>
                    </button>
                    <button id="close-main-nav" class="hide">
                        <i class="fa-solid fa-xmark pointer"></i>
                    </button>
                </div>

            </div>
        </div>
    </header>