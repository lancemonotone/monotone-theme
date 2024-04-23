<?php namespace monotone;

global $wpdb;

$max_events      = get_sub_field( 'max_events' ) ?: 3;
$all_events_link = get_sub_field( 'all_events_link' ) ?: false;
$event_category  = get_sub_field( 'event_category' ) ?: false;
$max_words       = get_sub_field( 'max_words' ) ?: -1;

$current_time = time(); // get the current Unix timestamp

$query = /** @lang sql */
    "
    SELECT e.post_id, p.post_title, p.post_status, e.start, e.end, e.timezone_name, e.allday, e.ticket_url, p.post_content
    FROM {$wpdb->prefix}ai1ec_events AS e
    INNER JOIN {$wpdb->prefix}posts AS p ON e.post_id = p.ID
    INNER JOIN {$wpdb->prefix}term_relationships AS tr ON p.ID = tr.object_id
    INNER JOIN {$wpdb->prefix}term_taxonomy AS tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
    WHERE e.start > %d
    AND p.post_status = 'publish'
    AND tt.taxonomy = 'events_categories'
    AND tt.term_id IN (" . implode( ',', array_map( 'intval', $event_category ) ) . ")
    ORDER BY e.start ASC
";

$results = $wpdb->get_results( $wpdb->prepare( $query, $current_time ) );

$id     = $args[ 'id' ] ?? '';
$styles = $args[ 'styles' ] ?? '';

function wp_trim_words_preserve_html( $text, $max_words ) {
    $text = strip_shortcodes( $text );
    $text = str_replace( ']]>', ']]&gt;', $text );
    $text = strip_tags( $text, '<p><a>' ); // Preserve paragraphs and links

    if ( $max_words > 0 ) {
        $words_array = preg_split( "/[\n\r\t ]+/", $text, $max_words + 1, PREG_SPLIT_NO_EMPTY );
        $sep         = '';
        $text        = '';

        foreach ( $words_array as $word ) {
            if ( --$max_words < 0 ) {
                break;
            }
            $text .= $sep . $word;
            $sep  = ' ';
        }
    }

    return apply_filters( 'wp_trim_words', $text, $max_words );
}

?>

<div id="<?= $id ?>"
     class="layout events-group"
     style="<?= $styles ?>">

    <div class="inner">

        <?php
        $i = 0;
        foreach ( $results as $event ) {
            // Check if the number of events retrieved is equal to the number of events we want to display
            if ( $i >= $max_events ) {
                break;
            }

            //Get the value of the ACF 'hide_event' field for this event, if so, skip it
            if ( get_field( 'hide_event', $event->post_id ) ) {
                continue;
            }

            // Increment the counter
            $i++;

            // Apply the_content filter to the post_content property of the event object
            // and limit the number of words using wp_trim_words()
            $the_content = wp_trim_words_preserve_html( apply_filters( 'the_content', $event->post_content ), $max_words );

            // If the background color is white or empty, set it to the default color ('has-background has-primary-light-background-color')
            $classes = get_field( 'background_color', $event->post_id ) ?: 'has-background has-primary-light-background-color';
            if ( stristr( $classes, 'has-white-background-color' ) ) {
                $classes = 'has-background has-primary-light-background-color';
            }

            // Get event date and time
            try {
                // Check if the timezone_name property of the event object is not empty and is a valid timezone identifier
                $timezone = new \DateTimeZone( 'UTC' );
                if ( ! empty( $event->timezone_name ) && in_array( $event->timezone_name, timezone_identifiers_list() ) ) {
                    // If it is, create a new DateTimeZone object with the timezone_name property of the event object
                    $timezone = new \DateTimeZone( $event->timezone_name );
                }

                // Create a new DateTime object with the start property of the event object
                $start_date_time = new \DateTime( '@' . $event->start );
                // Set the timezone of the DateTime object to the previously created DateTimeZone object
                $start_date_time->setTimezone( $timezone );
                // Format the DateTime object to a string and replace newline characters with HTML line breaks
                $start_date = nl2br( $start_date_time->format( 'l' . PHP_EOL . 'F j, Y' ) );

                // Set start_time and end_time to empty strings
                $start_time = '';
                $end_time   = '';

                // Check if the allday property of the event object is true
                if ( ! $event->allday ) {
                    // If it's not, format the DateTime object to a string representing the time
                    $start_time = $start_date_time->format( 'g:i A' ); // convert to time format
                    // Create a new DateTime object with the end property of the event object
                    $end_date_time = new \DateTime( '@' . $event->end );
                    // Set the timezone of the DateTime object to the previously created DateTimeZone object
                    $end_date_time->setTimezone( $timezone );
                    // Format the DateTime object to a string representing the time
                    $end_time = $end_date_time->format( 'g:i A' ); // convert to time format
                }

                // Format the DateTime object to a string representing the timezone abbreviation
                $tz = $start_date_time->format( 'T' );
            } catch ( \Exception $e ) {
                // Catch any exceptions that might occur during the execution of the try block
                error_log( __FILE__ . ': ' . __LINE__ . ' - ' . $e->getMessage() );
            }
            ?>

            <div class="card split-full-card image-left">

                <?php // Add post edit link for admins
                if ( current_user_can( 'edit_posts' ) ) {
                    edit_post_link( 'Edit', '', '', $event->post_id, 'post-edit-link button' );
                } ?>

                <div class="content-part layout has-background has-white-background-color">

                    <h3 class="header-sm card-heading">
                        <a href="<?= get_permalink( $event->post_id ) ?>">
                            <?= $event->post_title ?>
                        </a>
                    </h3>

                    <?php if ( $the_content ) { ?>
                        <div class="card-content">

                            <div class="card-body">
                                <?= $the_content ?>
                            </div>

                            <?php
                            if ( $event->ticket_url ) {
                                $buttons = [
                                    [
                                        'button_layout' => 'stacked',
                                        'button_link'   => [
                                            'url'    => $event->ticket_url,
                                            'target' => '_blank',
                                        ],
                                        'button_text'   => __( 'Register' ),
                                    ]
                                ];
                                include( locate_template( 'layouts/buttons/button_group.php' ) );
                            } ?>

                        </div>
                    <?php } ?>

                </div>

                <div class="image-part <?= $classes ?>">

                    <div class="small-all-caps card-kicker"><?= __( 'When' ) ?></div>

                    <div class="event-date">
                        <p class="large-line font-sans header-md">
                            <?php if ( $start_time ) { ?>
                                <?= $start_time ?>
                                <span class="header-sm uppercase"><?= $tz ?></span>
                            <?php } ?>

                            <?php if ( $end_time ) { ?>
                                <br>
                                <?= __( 'to' ) ?> <?= $end_time ?>
                            <?php } ?>
                        </p>
                        <p class="font-sans header-sm">
                            <?= $start_date ?>
                        </p>

                    </div>

                </div>

            </div>

        <?php } ?>

        <?php if ( $all_events_link ) { ?>
            <p class="all-events-link">
                <?= do_shortcode( '[button url="' . $all_events_link . '" class="transparent" target=""]View All Events[/button]' ) ?>
            </p>
        <?php } ?>

    </div>

</div>

