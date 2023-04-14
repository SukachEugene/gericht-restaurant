<?php
$icon = get_field('search', 'options');
?>


<form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">

        <input required type="text" value="" name="s" id="s" placeholder="Search Words">

        <?php
        if ($icon) :
        ?>

            <input type="submit" id="searchsubmit" value=" " <?php bg($icon) ?>>

        <?php endif ?>
        

</form>