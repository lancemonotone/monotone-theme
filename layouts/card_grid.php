<?php namespace monotone;

if ( ! $cards = get_sub_field( 'cards' ) ) {
    return;
}

$section_header = get_sub_field( 'section_header' );
$heading_size   = get_sub_field( 'heading_size' ) ?? 'header-lg';

$id      = $args[ 'id' ] ?? '';
$classes = $args[ 'classes' ] ?? '';
$styles  = $args[ 'styles' ] ?? '';
$count   = 0;
?>

<div id="<?= $id ?>"
     class="<?= $classes ?>"
     style="<?= $styles ?>">

    <div class="inner">

        <?php if ( $section_header ) { ?>
            <h2 class="section-heading <?= $heading_size ?>"><?= $section_header; ?></h2>
        <?php } ?>

        <div class="card-container">
            <?php foreach ( $cards as $card ) {
                $card_id = $id . '-' . ++$count;

                $card_classes   = [];
                $card_classes[] = $card[ 'background_color' ] ?? '';
                $card_classes[] = str_replace( '_', '-', $card[ 'acf_fc_layout' ] ) ?? '';
                $card_classes   = array_filter( $card_classes );

                include( locate_template( 'layouts/cards/' . $card[ 'acf_fc_layout' ] . '.php' ) );
            } ?>

        </div>

    </div>

</div>
