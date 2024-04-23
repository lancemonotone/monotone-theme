<?php namespace monotone;

$heading = get_sub_field( 'heading' ) ?? '';
$content = get_sub_field( 'content' ) ?? '';
$heading_size = get_sub_field( 'heading_size' ) ?? '';
$alignment = get_sub_field( 'align_content' ) ?? 'left';
$override_max_width = get_sub_field( 'override_max_width' ) ? 'override-max-width' : '';

$id      = $args[ 'id' ] ?? '';
$classes = $args[ 'classes' ] ?? '';
$styles  = $args[ 'styles' ] ?? '';
?>

<div id="<?= $id ?>"
     class="<?= $classes ?> align-<?= $alignment ?> <?= $override_max_width ?>"
     style="<?= $styles ?>">

    <div class="inner">

        <?php if ( $heading ) { ?>
            <h3 class="<?=$heading_size?>"><?= $heading ?></h3>
        <?php } ?>

        <?php if ( $content ) { ?>
            <div class="card-content">

                <div class="card-body body-serif-lg"><?= $content ?></div>

            </div>
        <?php } ?>

    </div>

</div>

