<div class="helpline-navigation-wrapper">
    <?php
    wp_nav_menu(
        array(
            'theme_location'  => 'helpline',
            'menu_class'      => 'menu-wrapper helpline-wrapper',
            'container_class' => 'helpline-menu-container',
            'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
            'fallback_cb'     => false,
        )
    );
    ?>
</div>