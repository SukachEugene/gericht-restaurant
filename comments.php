
<?php
if(have_comments()) :
    echo '<ol class="commentlist">';
    wp_list_comments();
    echo '</ol>';
endif;
comment_form();
?>