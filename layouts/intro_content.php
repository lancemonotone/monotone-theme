<?php namespace monotone;

$id      = $args[ 'id' ] ?? '';
$classes = $args[ 'classes' ] ?? 'layout intro-text';
$styles  = $args[ 'styles' ] ?? '';

$kicker        = get_sub_field( 'kicker' );
$heading       = get_sub_field( 'heading' );
$content       = get_sub_field( 'content' );
$buttons       = get_sub_field( 'buttons' ) ?? '';
$button_layout = get_sub_field( 'button_layout' );
?>

<div id="<?= $id ?>"
     class="<?= $classes ?>"
     style="<?= $styles ?>">

    <div class="inner">
        <?php if ( $kicker ) { ?>
            <div class="card-kicker body-sans-lg"><?= $kicker ?></div>
        <?php } ?>

        <?php if ( $heading ) { ?>
            <h1 class="header-xl card-heading"><?= $heading ?></h1>
        <?php } ?>

        <?php if ( $content ) { ?>
            <div class="card-content">
                <div class="card-body"><?= $content ?></div>

                <?php include( locate_template( 'layouts/buttons/button_group.php' ) ) ?>
            </div>
        <?php } ?>
    </div>
</div>
