<?php namespace monotone;

$content              = get_sub_field( 'content' );
$heading_class        = $content ? '' : ' only-heading';
$kicker               = get_sub_field( 'kicker' );
$heading              = get_sub_field( 'heading' );
$heading_size         = get_sub_field( 'heading_size' );
$card_image           = get_sub_field( 'card_image_part' );
$buttons              = get_sub_field( 'buttons' );
$button_layout        = get_sub_field( 'button_layout' );
$image_sizing         = get_sub_field( 'image_sizing' );
$show_image_on_mobile = get_sub_field( 'show_image_on_mobile' );
$image_alignment      = get_sub_field( 'image_alignment' ) ?? 'align-center';
$image_left           = get_sub_field( 'image_left' );
$smaller_text         = get_sub_field( 'use_smaller_paragraph_font_size' );

$id      = $args[ 'id' ] ?? '';
$classes = $args[ 'classes' ] ?? '';
$styles  = $args[ 'styles' ] ?? '';

// Hack because this card content overlaps the image.
// Remove the 'split-full-card' class from the card so
// we can use it as a wrapper for the image and content
// while keeping the background color for the content.

$classes = str_replace( 'split-full-card', '', $classes );
$classes .= $show_image_on_mobile ? ' show-image-on-mobile' : '';
$classes .= $card_image ? '' : ' no-image';
$classes .= $image_sizing ? ' ' . $image_sizing : '';
$classes .= $image_left ? ' image-left' : '';
$classes .= $image_alignment ? ' ' . $image_alignment : '';
$classes .= $smaller_text ? ' small-text' : '';
?>

<div id="<?= $id ?>"
     class=""
     style="<?= $styles ?>">

    <div class="inner">

        <div class="split-full-card <?= $classes ?>">

            <div class="content-part <?= $classes ?>">

                <?php if ( $kicker ) { ?>
                    <div class="small-all-caps card-kicker"><?= $kicker ?></div>
                <?php } ?>

                <?php if ( $heading ) { ?>
                    <h3 class="card-heading <?= $heading_class ?> <?= $heading_size ?>"><?= $heading ?></h3>
                <?php } ?>

                <?php if ( $content ) { ?>
                    <div class="card-content">

                        <div class="card-body"><?= $content ?></div>

                        <?php include( locate_template( 'layouts/buttons/button_group.php' ) ); ?>

                    </div>
                <?php } ?>
            </div>

            <?php if ( $card_image ) { ?>
                <div class="image-part">
                    <?= Images::get_background_image( $card_image, 500 ) ?>
                </div>
            <?php } ?>

        </div>

    </div>
</div>
