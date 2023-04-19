<?php
if (have_comments()) :
    echo '<ol class="commentlist">';
    wp_list_comments(array(
        'style'      => 'ul',
        'short_ping' => true,
        'callback' => 'better_comments'
    ));
    echo '</ol>';
endif;


$defaults = array(
    'label_submit' => __('Submit'),
    'class_submit' => 'gold-button',
    'logged_in_as' => '',
    'title_reply' => '',
    'title_reply_to' => 'Reply to %s',
    'cancel_reply_link' => 'Cancel Reply'



);
?>
<div class="create-comment-block">
    <h4>Post a Comment</h4>

    <?php
    comment_form($defaults);
    ?>
</div>
