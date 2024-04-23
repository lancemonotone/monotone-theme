<div class="footer-top">
    <div class="inner">
        <div class="footer-cols">
            <div class="footer-col">
                <div class="site-name">
                    <img src="<?php echo esc_url( get_theme_mod('footer_logo') ); ?>" alt="<?php echo esc_attr( get_bloginfo('name') ); ?>" />
                </div>

                <?php
                $footer_desc  = get_field( 'corporate_footer_description', 'option' );
                $footer_extra  = get_field( 'corporate_footer_extra_content', 'option' );
                $footer_extra2 = get_field( 'corporate_footer_additional_links', 'option' );

                if ($footer_desc) {
                    echo '<div class="site-footer-description">';
                    echo $footer_desc;
                    echo '</div>';
                }

                if ($footer_extra) {
                    echo '<div class="site-footer-extra">';
                    echo $footer_extra;
                    echo '</div>';
                }

                if( $footer_extra2 ) {
                    echo '<div class="site-footer-extra extra2">';
                    foreach( $footer_extra2 as $row ) {
                        $link = $row['footer_link'];
                        $link_url = $link['url'];
                        $link_text = $link['title'];
                        $link_target = $link['target'];
                        echo '<p><a href="' . $link_url . '" target="' . $link_target . '">' . $link_text . '</a></p>';
                    }
                    echo '</div>';
                }
                ?>
            </div>

            <div class="footer-col">
                <nav aria-label="<?php esc_attr_e( 'Secondary menu', 'monotone' ); ?>" class="footer-navigation">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location'  => 'footer',
                            'menu_class'      => 'menu-wrapper menu-wrapper-footer',
                            'container_class' => 'footer-menu-container',
                            'items_wrap'      => '<ul id="footer-menu-list" class="%2$s">%3$s</ul>',
                            'fallback_cb'     => false,
                        )
                    );
                    ?>
                </nav>
            </div>

            <?php // get_template_part( 'parts/footer/footer-widgets' ); ?>
        </div>
    </div>
</div>

<div class="footer-bottom">
    <div class="inner">
        <div class="footer-bottom-cols">
            <div class="footer-bottom-col">
                <p class="body-sans">&copy; Copyright <?php echo date('Y', time()); ?>. All Rights Reserved.</p>
            </div>

            <div class="footer-bottom-col">
                <?php get_template_part( 'parts/social-media' ); ?>
            </div>
        </div>
    </div>
</div>
