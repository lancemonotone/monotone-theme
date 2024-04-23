<?php namespace monotone;

$events_dates  = get_sub_field( 'event_dates' );
$description   = get_sub_field( 'event_description' );
$title         = get_sub_field( 'event_title' );
$link          = get_sub_field( 'event_link' );
$buttons       = get_sub_field( 'buttons' ) ?? '';
$button_layout = get_sub_field( 'button_layout' );

if ( $link ) {
    $title = '<a href="' . $link[ 'url' ] . '" target="' . $link[ 'target' ] . '">' . $title . '</a>';
}

$id      = $args[ 'id' ] ?? '';
$classes = $args[ 'classes' ] ?? '';
$styles  = $args[ 'styles' ] ?? '';

?>

<div id="<?= $id ?>"
     class="layout event-card"
     style="<?= $styles ?>">

    <div class="inner">

        <div class="card split-full-card image-left">

            <div class="content-part layout has-background has-white-background-color">

                <?php if ( $title ) { ?>
                    <h3 class="header-sm card-heading">
                        <?= $title ?>
                    </h3>
                <?php } ?>

                <?php if ( $description ) { ?>
                    <div class="card-content">

                        <div class="card-body"><?= $description ?></div>

                        <?php include( locate_template( 'layouts/buttons/button_group.php' ) ); ?>

                    </div>
                <?php } ?>

            </div>

            <div class="image-part <?= $classes ?>">

                <div class="small-all-caps card-kicker"><?= __( 'When' ) ?></div>

                <?php foreach ( $events_dates as $event_date ) {
                    $date     = str_replace( '*', '<br>', $event_date[ 'event_date' ] );
                    $start    = $event_date[ 'event_start_time' ];
                    $end      = $event_date[ 'event_end_time' ];
                    $timezone = $event_date[ 'event_timezone' ]; ?>

                    <div class="event-date">
                        <p class="large-line font-sans header-md">
                            <?php if ( $start ) { ?>
                                <?= $start ?>
                                <span class="header-sm uppercase"><?= $timezone ?></span>
                            <?php } ?>

                            <?php if ( $end ) { ?>
                                <br>
                                <?= __( 'to' ) ?> <?= $end ?>
                            <?php } ?>
                        </p>
                        <p class="font-sans header-sm">
                            <?= $date ?>
                        </p>

                    </div>

                <?php } ?>

            </div>

        </div>

    </div>

</div>

