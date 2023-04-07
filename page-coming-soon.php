<?php
get_header()
?>

<?php
$background = get_field('background', 'options');
?>

<div class="global-lines page-coming-soon" style="background-image: url('<?php echo $background['url']; ?>')">

    <?php
    $left_line = get_field('through_line_left', 'options');
    $right_line = get_field('through_line_right', 'options');
    ?>

    <?php if ($left_line) : ?>
        <img class="through-line left" src="<?php echo $left_line['url']; ?>" alt="<?php echo $left_line['alt']; ?>" title="<?php echo $left_line['title']; ?>">
    <?php endif ?>

    <?php if ($right_line) : ?>
        <img class="through-line right" src="<?php echo $right_line['url']; ?>" alt="<?php echo $right_line['alt']; ?>" title="<?php echo $right_line['title']; ?>">
    <?php endif ?>

    <div class="page-coming-soon-container">

        <?php
        $logo = get_field('logo', 'options');
        if ($logo) : ?>
            <img class="logo top" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['title']; ?>">
        <?php endif ?>

        <div class="page-coming-soon-content">

            <?php
            $header = get_field('header');
            $spoon = get_field('spoon', 'options');
            $text = get_the_content();


            // $point = get_field('time_point');
            // $date = DateTime::createFromFormat('d/m/Y h:i a', $point);

            // $point_timestamp = $date->getTimestamp();
            // $remaining_time = $point_timestamp - time();

            // $days = floor($remaining_time / (60 * 60 * 24));
            // $months = floor($days / 30);
            // $hours = floor(($remaining_time / (60 * 60)) % 24);
            // $minutes = floor(($remaining_time / 60) % 60);
            // $seconds = $remaining_time % 60;



            $start_date = new DateTime();
            $point = get_field('time_point');
            $end_date = DateTime::createFromFormat('d/m/Y h:i a', $point);
            $interval = $start_date->diff($end_date);

            $months = $interval->y * 12 + $interval->m;
            $days = $interval->d;
            $hours = $interval->h;
            $minutes = $interval->i;
            $seconds = $interval->s;

            $current_year = date('Y');
            $current_month = date('n');



            ?>

            <?php
            if ($header) : ?>
                <h1><?php echo $header ?></h1>
            <?php endif ?>

            <?php if ($spoon) : ?>
                <img class="spoon" src="<?php echo $spoon['url']; ?>" alt="<?php echo $spoon['alt']; ?>" title="<?php echo $spoon['title']; ?>">
            <?php endif; ?>

            <?php if ($text) : ?>
                <p class="coming-soon-text"><?php echo $text ?></p>
            <?php endif ?>

            <div class="coming-soon-time-container">

                <div class="coming-soon-time-element">
                    <p class="number" id="months"><?php echo $months ?></p>
                    <p class="description">Months</p>
                </div>

                <div class="coming-soon-time-element">
                    <p class="number" id="days" data-month="<?php echo $current_month ?>" data-year="<?php echo $current_year ?>"><?php echo $days ?></p>
                    <p class="description">Days</p>
                </div>

                <div class="coming-soon-time-element">
                    <p class="number" id="hours"><?php echo $hours ?></p>
                    <p class="description">Hours</p>
                </div>

                <div class="coming-soon-time-element">
                    <p class="number" id="minutes"><?php echo $minutes ?></p>
                    <p class="description">Minutes</p>
                </div>

                <div class="coming-soon-time-element">
                    <p class="number" id="seconds"><?php echo $seconds ?></p>
                    <p class="description">Seconds</p>
                </div>

            </div>

            <a class="gold-button" href="<?php echo site_url(); ?>">Back To Home</a>

            <?php
            $logo = get_field('logo', 'options');
            if ($logo) : ?>
                <img class="logo bottom" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['title']; ?>">
            <?php endif ?>

        </div>

    </div>

    <div class="coming-soon-copyright-container">
        <?php
        $copyright = get_field('footer_copyright', 'options');
        if ($copyright) : ?>
            <p class="footer-text-style"><?php echo $copyright ?></p>
        <?php endif ?>
    </div>

    <?php
    get_footer();
    ?>


</div>