<?php
/*
Template Name: Text Block Template
*/


if (get_row_layout() == 'text') :

    $content = get_sub_field('content');
    if ($content) {
?>
        <div class="text-content-element-in-post">
            <?php
            echo $content;
            ?>
        </div>
<?php
    }

endif;

?>