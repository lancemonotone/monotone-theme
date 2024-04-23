<?php namespace monotone;

$left_heading       = get_sub_field( 'left_heading' ) ?? '';
$kicker             = get_sub_field( 'kicker' ) ?? '';
$right_content      = get_sub_field( 'right_content' ) ?? '';
$buttons            = get_sub_field( 'buttons' ) ?? [];
$button_layout      = get_sub_field( 'button_layout' ) ?? '';
$external_link_card = get_sub_field( 'external_link_card' ) ?? false;

$id      = $args[ 'id' ] ?? '';
$classes = $args[ 'classes' ] ?? '';
$styles  = $args[ 'styles' ] ?? '';
?>

<div id="<?= $id ?>"
     class="<?= $classes ?>"
     style="<?= $styles ?>">

    <div class="inner">

        <div class="row">
            <div class="col">

                <?php if ( $kicker ) { ?>
                    <div class="small-all-caps card-kicker"><?= $kicker ?></div>
                <?php } ?>

                <?php if ( $left_heading ) { ?>
                    <h3 class="header-sm card-heading"><?= $left_heading ?></h3>
                <?php } ?>

                <?php if ( $external_link_card[ 'content' ] || $external_link_card[ 'heading' ] ) {
                    $card         = $external_link_card;
                    $card_classes = [ 'external-link-card' ];
                    if ( ! empty( $card[ 'background_color' ] ) ) {
                        $card_classes[] = $card[ 'background_color' ];
                    }
                    include( locate_template( 'layouts/cards/external_link_card.php' ) );
                } ?>

            </div>

            <div class="col">

                <?php if ( $right_content ) { ?>
                    <div class="card-content">

                        <div class="card-body"><?= $right_content ?></div>

                        <?php include( locate_template( 'layouts/buttons/button_group.php' ) ); ?>

                    </div>
                <?php } ?>

            </div>
        </div>

    </div>
</div>
