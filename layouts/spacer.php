<?php namespace monotone;

$id      = $args[ 'id' ] ?? '';
$classes = $args[ 'classes' ] ?? 'layout spacer';
$styles  = $args[ 'styles' ] ?? '';

$spacerHeight = get_sub_field('spacer_height');

if ( $spacerHeight ) {
    $classes .= ' ' . $spacerHeight;
}
?>

<!-- Spacer: This empty element is used for visual spacing purposes -->
<div id="<?php echo $id ?>"
     class="<?php echo $classes ?>"
     style="<?php echo $styles ?>"
     aria-hidden="true"
     role="presentation" ></div>
