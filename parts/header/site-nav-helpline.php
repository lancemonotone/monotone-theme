<?php

namespace monotone;

/**
 * Displays the site navigation.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

if ( has_nav_menu( 'primary' ) ) :
?>
    <div class="masthead-control">
        <div class="inner">
            <div class="site-logo">
                <a href="/help-treatment/" aria-label="Click to navigate to the Helpline homepage.">
                    <?php
                    $helplinelogo = '';
                    if ( file_exists( THEME_ASSETS_PATH . '/build/images/800gamb-logo-header.svg' ) ) {
                        $helplinelogo = THEME_ASSETS_URI . '/build/images/800gamb-logo-header.svg';
                    }
                    ?>
                    <img src="<?php echo $helplinelogo; ?>" alt="1-800-GAMBLER : Help for Problem Gambling" />        
                </a>
            </div>

            <button id="primary-mobile-menu" class="large-button" aria-controls="primary-menu-list" aria-expanded="false">
                <span class="button-text">
                    <?php esc_html_e( 'Menu', 'monotone' ); ?>
                </span>
                <span class="dropdown-icon">
                    <span class="line line1"></span>
                    <span class="line line2"></span>
                    <span class="line line3"></span>
                </span>
            </button>

        </div>
    </div>

    <nav id="site-navigation" class="primary-navigation" aria-label="<?php esc_attr_e( 'Primary menu', 'monotone' ); ?>">
        <div class="outer">
            <div class="inner">
                <div class="search-part">
                    <?php get_template_part( 'parts/searchform' ); ?>
                </div>

                <div class="helpline-nav-inner-sub-wrap">
                    <?php get_template_part( 'parts/header/helpline-sub-nav' ); ?>
                </div>

                <?php
                wp_nav_menu(
                    array(
                        'theme_location'  => 'helplineprimary',
                        'menu_class'      => 'menu-wrapper helpline-menu-wrapper target-menu-wrapper',
                        'container_class' => 'primary-menu-container helpline-menu-container',
                        'items_wrap'      => '<ul id="helpline-menu-list" class="%2$s">%3$s</ul>',
                        'fallback_cb'     => false,
                    )
                );
                ?>
            </div>
        </div>
    </nav>

    <?php
endif;
?>
