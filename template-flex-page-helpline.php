<?php namespace monotone;
/* Template Name: Helpline Flex Page Template */

add_filter( 'body_class', function ( $classes ) {
    $classes[] = 'coloralt';
    return $classes;
} );
?>

<?php get_header(); ?>

<?php Layout::get_layout( 'template_flex_page', 'page-' . get_the_ID() ); ?>

<?php get_footer(); ?>
