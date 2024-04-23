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
                <a href="/" aria-label="Click to navigate to the homepage.">
                    <?php
                    $mainlogo = '';
                    if ( file_exists( THEME_ASSETS_PATH . '/build/images/logo-main.svg' ) ) {
                        $mainlogo = THEME_ASSETS_URI . '/build/images/logo-main.svg';
                    }
                    ?>
                    <img src="<?php echo $mainlogo; ?>" alt="Primary Logo" />
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

				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'menu_class'      => 'menu-wrapper primary-menu-wrapper target-menu-wrapper',
						'container_class' => 'primary-menu-container full-primary-menu-container',
						'items_wrap'      => '<ul id="primary-menu-list" class="%2$s">%3$s</ul>',
						'fallback_cb'     => false,
					)
				);
				?>
			</div>

			<?php
			$corp_help_title = get_field( 'corporate_helpline_popup_title', 'option' );
			$corp_help_content = get_field( 'corporate_helpline_popup_content', 'option' );
			$corp_help_button = get_field( 'corporate_helpline_popup_resources_button', 'option' );
			if ($corp_help_button) {
				$corp_help_button_url = $corp_help_button['url'];
				$corp_help_button_title = $corp_help_button['title'];
				$corp_help_button_target = $corp_help_button['target'];
			}
			?>

			<div class="helpline-corp-nav-wrapper">
				<div class="inner">
					<div class="part top-part">
						<div class="inside">
						    <span class="extra-nav-title header-sm"><?php echo $corp_help_title; ?></span>
						    <button class="icon-wrap" aria-label="Support for Gambling Problem">
						        <svg width="53" height="53" viewBox="0 0 53 53" fill="none" xmlns="http://www.w3.org/2000/svg">
						            <title>Support Button</title>
						            <desc>A button for accessing support for gambling problems</desc>
						            <path d="M1 26.5C1 40.5833 12.4167 52 26.5 52C40.5833 52 52 40.5833 52 26.5C52 12.4167 40.5833 1 26.5 1C12.4167 1 1 12.4167 1 26.5Z" fill="#131444" stroke="#F9F9F9" stroke-width="2"/>
						            <g clip-path="url(#clip0_4256_6448)">
						                <path d="M16 28.834L26 18.834L36 28.834L33.666 31.166L26 23.5L18.334 31.166L16 28.834Z" fill="#F9F9F9"/>
						            </g>
						            <defs>
						                <clipPath id="clip0_4256_6448">
						                    <path d="M16 25C16 30.5228 20.4772 35 26 35C31.5228 35 36 30.5228 36 25V15H16V25Z" fill="white"/>
						                </clipPath>
						            </defs>
						        </svg>
						        <span class="visually-hidden">Support for Gambling Problem</span>
						    </button>
						</div>
					</div>

					<div class="part bottom-part">
						<div class="inside">
							<div class="parts">
								<div class="inner-part">
									<?php
									if ($corp_help_content) {
										echo $corp_help_content;
									}
									if ($corp_help_button) {
										echo '<div class="btn-wrap">';
										echo '<a href="' . $corp_help_button_url . '" class="button white" aria-label="' . $corp_help_button_title . '" target="' . $corp_help_button_target . '">' . $corp_help_button_title . '</a>';
										echo '</div>';
									}
									?>
								</div>

								<div class="inner-part">
									<div class="site-name">
					                    <?php
					                    $footerlogo = '';
					                    if ( file_exists( THEME_ASSETS_PATH . '/build/images/800gamb-logo.svg' ) ) {
					                        $footerlogo = THEME_ASSETS_URI . '/build/images/800gamb-logo.svg';
					                    }
					                    ?>
					                    <img src="<?php echo $footerlogo; ?>" alt="<?php echo esc_attr( get_bloginfo('name') ); ?>" />
					                </div>

					                <?php get_template_part( 'parts/header/helpline-sub-nav' ); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</nav>

	<?php
endif;
?>
