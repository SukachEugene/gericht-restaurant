<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Sukach Eugene">
    <meta name="description" content="Site of Gericht reastaurant">
    <meta name="keywords" content="restaurant, food, dishes, delicious, chiefs cook, Gericht">

    <?php do_action('wp_head') ?>
</head>

<body>

    <header>
        <div class="container">
            <div class="header-elements">

                <?php
                $name = get_field('restaurants_name', 'options');
                ?>

                <h4><?php echo $name ?></h4>

                <?php
                wp_nav_menu(array('theme_location' => 'header-menu'));
                ?>

            </div>
        </div>
    </header>