<?php namespace monotone;

//$num_words = !$count && $first_post_full_width ? 100 : 15;
$num_words = 20;

$kicker      = Blog::get_term_links( $post_id );
$heading     = Blog::get_linked_title( $post_id );
$content     = Blog::get_excerpt( $post_id, $num_words );
$post_date   = Blog::get_post_date( $post_id );
$post_author = Blog::get_post_author( $post_id );

// Prepare the 'Read More' button data
$buttons = [
    [
        'button_link' => [ 'url' => get_permalink( $post_id ), 'target' => '' ],
        'button_text' => 'Read More'
    ]
];

$heading_class = empty( $content ) ? 'only-heading' : '';

$card_classes = implode( ' ', (array)$card_classes );
?>

<div class="card <?= $card_classes ?>">
    <?php // Add post edit link for admins
    if ( current_user_can( 'edit_posts' ) ) {
        edit_post_link( 'Edit', '', '', $post_id, 'post-edit-link button' );
    } ?>

    <?php if ( $kicker ) { ?>
        <div class="small-all-caps card-kicker"><?= $kicker ?></div>
    <?php } ?>

    <?php if ( $heading ) { ?>
        <h3 class="card-heading header-sm <?= $heading_class ?>"><?= $heading ?></h3>
    <?php } ?>

    <?php if ( $post_date || $post_author ) { ?>
        <div class="small-all-caps card-kicker"><?= $post_date ?><?= $post_author ?></div>
    <?php } ?>

    <?php if ( $content ) { ?>
        <div class="card-content">

            <div class="card-body"><?= $content ?></div>

            <?php
            // Reset the button group heading so it doesn't show up in the button label.
            $heading = '';
            include( locate_template( 'layouts/buttons/button_group.php' ) ); ?>

        </div>
    <?php } ?>

</div>
