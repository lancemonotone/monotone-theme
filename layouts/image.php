<?php namespace monotone;

$id         = $args[ 'id' ] ?? '';
$classes    = $args[ 'classes' ] ?? '';
$styles     = $args[ 'styles' ] ?? '';
$card_image = get_sub_field( 'card_image_part' ) ?? false;
$justify = get_sub_field( 'image_justify' ) ?? 'center';
$max_width = get_sub_field( 'image_max_width' ) ?? '100%';

?>

<?php if ( ! $card_image ) {
    return;
} ?>

<div id="<?= $id; ?>"
     class="<?= $classes ?>"
     style="<?= $styles ?>">

    <div class="inner">

        <?= Images::get_image( [
            'id'    => $card_image,
            'width' => 920,
            'style' => "max-width: {$max_width}; justify-self: {$justify};"
        ] ) ?>

    </div>

</div>
