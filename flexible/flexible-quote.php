<?php
/*
Template Name: Quote Block Template
*/
?>

<?php
$quote_top = get_field('post_quote_top_image', 'options');
$quote_bottom = get_field('post_quote_bottom_image', 'options');
?>

<div class="quote-container">

    <?php if ($quote_top) : ?>
        <img class="quote-top" src="<?php echo $quote_top['url']; ?>" alt="<?php echo $quote_top['alt']; ?>" title="<?php echo $quote_top['title']; ?>">
    <?php endif ?>

    <?php
    if (get_row_layout() == 'quote') :

        $content = get_sub_field('text');
        if ($content) {
            echo '<div class="quote-text">'.$content.'</div>';
        }

    endif;
    ?>

    <?php if ($quote_bottom) : ?>
        <img class="quote-bottom" src="<?php echo $quote_bottom['url']; ?>" alt="<?php echo $quote_bottom['alt']; ?>" title="<?php echo $quote_bottom['title']; ?>">
    <?php endif ?>

</div>