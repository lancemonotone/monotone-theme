<?php namespace monotone;

$section_header = get_sub_field( 'section_header' ) ?? '';
$heading_size   = get_sub_field( 'heading_size' ) ?? 'header-lg';
$kicker         = get_sub_field( 'kicker' ) ?? '';
$content        = get_sub_field( 'content' ) ?? '';

$id      = $args[ 'id' ] ?? '';
$classes = $args[ 'classes' ] ?? '';
$styles  = $args[ 'styles' ] ?? '';
$count   = 0;
?>

<div id="<?= $id ?>"
     class="<?= $classes ?>"
     style="<?= $styles ?>">

    <div class="inner">

        <?php if ( $kicker ) { ?>
            <div class="small-all-caps card-kicker"><?= $kicker ?></div>
        <?php } ?>

        <?php if ( $section_header ) { ?>
            <h3 class="section-heading <?= $heading_size ?>"><?= $section_header; ?></h3>
        <?php } ?>

        <?php if ( $content ) { ?>
            <div class="card-content">

                <div class="card-body body-serif-lg"><?= $content ?></div>

            </div>
        <?php } ?>

        <div class="card-container">

            <?php if ( $cards = get_sub_field( 'full_cards' ) ) {
                foreach ( $cards as $card ) {
                    $card_id = $id . '-' . ++$count;

                    $card_classes   = [];
                    $card_classes[] = $card[ 'background_color' ] ?? '';
                    $card_classes[] = str_replace( '_', '-', $card[ 'acf_fc_layout' ] ) ?? '';
                    $card_classes   = array_filter( $card_classes );

                    include( locate_template( 'layouts/cards/' . $card[ 'acf_fc_layout' ] . '.php' ) );
                }
            } ?>

        </div>

    </div>

</div>
