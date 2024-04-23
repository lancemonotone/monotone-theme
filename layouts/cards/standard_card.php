<?php namespace monotone;

$kicker        = $card[ 'kicker' ] ?? '';
$heading       = $card[ 'heading' ] ?? '';
$content       = $card[ 'content' ] ?? '';
$heading_size  = $card[ 'heading_size' ] ?? 'header-sm';
$heading_class = empty( $content ) ? 'only-heading' : '';

$card_classes = implode( ' ', (array)$card_classes );
?>

<div class="card <?= $card_classes ?>">

    <?php if ( $kicker ) { ?>
        <div class="small-all-caps card-kicker"><?= $kicker ?></div>
    <?php } ?>

    <?php if ( $heading ) { ?>
        <h3 class="card-heading <?= $heading_size ?> <?= $heading_class ?>"><?= $heading ?></h3>
    <?php } ?>

    <?php if ( $content ) { ?>
        <div class="card-content">

            <div class="card-body"><?= $content ?></div>

            <?php include( locate_template( 'layouts/buttons/button_group.php' ) ); ?>

        </div>
    <?php } ?>

</div>
