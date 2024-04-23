<?php namespace monotone;

$kicker  = $card[ 'kicker' ] ?? '';
$heading = $card[ 'heading' ] ?? '';
$content = $card[ 'content' ] ?? '';

$buttons       = get_sub_field( 'buttons' ) ?? '';
$button_layout = get_sub_field( 'button_layout' );

$heading_class = $content ? '' : 'only-heading';
$heading_size  = $card[ 'heading_size' ] ?? 'header-md';
$card_classes  = implode( ' ', (array)$card_classes );
?>

<div class="card large-text-card <?= $card_classes ?>">

    <?php if ( $kicker ) { ?>
        <div class="small-all-caps card-kicker"><?= $kicker ?></div>
    <?php } ?>

    <?php if ( $heading ) { ?>
        <h3 class="card-heading <?= $heading_class ?> <?= $heading_size ?>"><?= $heading ?></h3>
    <?php } ?>

    <?php if ( $content ) { ?>
        <div class="card-content">

            <div class="card-body"><?= $content ?></div>

            <?php include( locate_template( 'layouts/buttons/button_group.php' ) ) ?>

        </div>
    <?php } ?>

</div>
