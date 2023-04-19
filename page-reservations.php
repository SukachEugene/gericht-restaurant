<?php
get_header()
?>

<section>

    <?php
    $title = get_the_title();
    $spoon = get_field('spoon', 'options');
    var_dump($title)
    ?>

    <h2><?php echo $title ?> </h2>

    <?php
    $form = '[ninja_form id="2"]';
    echo do_shortcode($form);
    ?>

</section>

<?php
get_footer();
?>