<?php
/**
 *	Setup
 */
if( !function_exists( 'photoplast_lite_setup' ) ) {
	add_action( 'after_setup_theme', 'photoplast_lite_setup' );
	function photoplast_lite_setup() {
		// Customizer
		require_once( 'includes/customizer.php' );

		// Custom Header
		add_theme_support('custom-header', array(
			'default-image'	=> get_stylesheet_directory_uri() . '/assets/images/image3.jpg',
			'header-text'	=> false,
			'width'			=> 1903,
			'height'		=> 843
		));

		// Add Image Size
		add_image_size( 'photoplast-lite-content-post-image', 1056, 386, true );
	}
}

/**
 *	Enqueue Styles
 */
if( !function_exists( 'photoplast_lite_styles' ) ) {
	add_action( 'wp_enqueue_scripts', 'photoplast_lite_styles', 11 );
	function photoplast_lite_styles() {
		wp_enqueue_style( 'rokophoto-lite-style', get_template_directory_uri() . '/style.css', array(), '1.1.3', 'all' );
		wp_enqueue_style( 'photoplast-lite-style', get_stylesheet_directory_uri() . '/style.css', array( 'rokophoto-lite-style' ), '1.0.6', 'all' );
		wp_enqueue_style( 'photoplast-lite-main', get_stylesheet_directory_uri() . '/assets/css/main.css', array( 'rokophoto-lite-style' ), '1.0.6', 'all' );
	}
}

/**
 *	Enqueue Scripts
 */
if( !function_exists( 'photoplast_lite_scripts' ) ) {
	add_action( 'wp_enqueue_scripts', 'photoplast_lite_scripts', 11 );
	function photoplast_lite_scripts() {
		wp_enqueue_script( 'photoplast-lite-scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), '', true );
	}
}

/**
 *	Dequeue Styles
 */
if( !function_exists( 'photoplast_lite_dequeue_styles' ) ) {
	add_action( 'wp_print_styles', 'photoplast_lite_dequeue_styles', 11 );
	function photoplast_lite_dequeue_styles() {
		wp_dequeue_style( 'rokophotolite_style' );
		wp_dequeue_style( 'rokophoto_font' );
	}
}

/**
 *	Dequeue Scripts
 */
if( !function_exists( 'photoplast_lite_dequeue_scripts' ) ) {
	add_action( 'wp_print_scripts', 'photoplast_lite_dequeue_scripts', 11 );
	function photoplast_lite_dequeue_scripts() {
		wp_dequeue_script( 'rokophotolite_smooth_scroll' );
	}
}

/**
 *	Customize Controls Enqueue Scripts
 */
if( !function_exists( 'photoplast_lite_customize_controls_enqueue_scripts' ) ) {
	add_action( 'customize_controls_enqueue_scripts', 'photoplast_lite_customize_controls_enqueue_scripts' );
	function photoplast_lite_customize_controls_enqueue_scripts() {
		wp_enqueue_script( 'photoplast-lite-customizer', get_stylesheet_directory_uri() . '/assets/js/photoplast-lite-customizer.js', array( 'jquery' ), '20120206', true  );
	}
}