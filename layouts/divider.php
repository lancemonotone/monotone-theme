<?php namespace monotone;

$id      = $args[ 'id' ] ?? '';
$classes = $args[ 'classes' ] ?? 'layout divider';
$styles  = $args[ 'styles' ] ?? '';

if ( get_sub_field( 'divider_height' ) == 'tall' ) {
    $classes .= ' tall';
}

$dividerLabel = get_sub_field( 'divider_label' );
?>

<div id="<?= $id ?>"
     class="<?= $classes ?>"
     style="<?= $styles ?>">

    <div class="inner">

        <div class="divider-inner">
            <?php if ( $dividerLabel ) { ?>
                <span class="small-all-caps"><?= $dividerLabel ?></span>
            <?php } ?>
        </div>

    </div>

</div>
