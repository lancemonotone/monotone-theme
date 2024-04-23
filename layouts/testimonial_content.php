<?php namespace monotone;

$heading = get_sub_field( 'heading' );
$content = get_sub_field( 'content' );

$id      = $args[ 'id' ] ?? '';
$classes = $args[ 'classes' ] ?? '';
$styles  = $args[ 'styles' ] ?? '';

?>

<div id="<?= $id ?>"
     class="<?= $classes ?>"
     style="<?= $styles ?>">

    <div class="inner">
        <div class="card">
            <div class="card-link-icon"></div>

            <?php if ( $heading ) { ?>
                <h3 class="header-sm card-heading">
                    <?= $heading; ?>
                </h3>
            <?php } ?>

            <?php if ( $content ) { ?>
                <div class="card-content">
                    <div class="card-body"><?= $content; ?></div>
                </div>
            <?php } ?>
        </div>
    </div>

</div>
