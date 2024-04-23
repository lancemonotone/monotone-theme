<?php

namespace monotone;

class Branding {
	public function __construct() {
		// Add a logo to the WordPress Customizer
		add_action( 'after_setup_theme', [ $this, 'themename_custom_logo_setup' ] );

		// Add a footer logo to the WordPress Customizer
		add_action( 'customize_register', [ $this, 'footer_logo_customizer' ] );

		// Add a second logo to the WordPress Customizer
		// add_action( 'customize_register', [ $this, 'second_custom_logo_customizer' ] );
	}

	function themename_custom_logo_setup() {
		$defaults = array(
			'height'               => 110,
			'width'                => 278,
			'flex-height'          => TRUE,
			'flex-width'           => TRUE,
			'header-text'          => array( 'site-title', 'site-description' ),
			'unlink-homepage-logo' => TRUE,
		);
		add_theme_support( 'custom-logo', $defaults );
	}

	function footer_logo_customizer( $wp_customize ) {
		$wp_customize->add_setting( 'footer_logo' ); // Add setting for footer logo uploader
		$wp_customize->add_control( new \WP_Customize_Image_Control( $wp_customize, 'footer_logo', array(
			'label'    => __( 'Footer Logo' ),
			'section'  => 'title_tagline', // Add in default WordPress customizer section
			'settings' => 'footer_logo',
			'priority' => 8, // Set the priority so it's higher than the custom-logo
		) ) );
	}

	/**
	 * Add a second logo to the WordPress Customizer
	 *
	 * @param $wp_customize
	 */
	function second_custom_logo_customizer( $wp_customize ) {
		$wp_customize->add_setting( 'second_logo' ); // Add setting for second logo uploader
		$wp_customize->add_control( new \WP_Customize_Image_Control( $wp_customize, 'second_logo', array(
			'label'    => __( 'Second Logo' ),
			'section'  => 'title_tagline', // Add in default WordPress customizer section
			'settings' => 'second_logo',
			'priority' => 8, // Set the priority so it's higher than the custom-logo
		) ) );
	}
}

new Branding();
