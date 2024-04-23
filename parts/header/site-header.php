<?php namespace monotone;

/**
 * Displays the site header.
 */

$wrapper_classes = 'site-header';
$wrapper_classes .= has_custom_logo() ? ' has-logo' : '';
$wrapper_classes .= ( true === get_theme_mod( 'display_title_and_tagline', true ) ) ? ' has-title-and-tagline' : '';
$wrapper_classes .= has_nav_menu( 'primary' ) ? ' has-menu' : '';
?>

<header id="masthead" class="<?php echo esc_attr( $wrapper_classes ); ?>">
    <?php
    get_template_part( 'parts/header/utility-bar' );

    if ( is_page_template( 'template-flex-page-helpline.php' ) ) {
        get_template_part( 'parts/header/site-nav-helpline' );
    } else {
        get_template_part( 'parts/header/site-nav' );
    }
    ?>
</header>
