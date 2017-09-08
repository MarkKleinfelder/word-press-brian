<?php
/**
 * Fotografie Theme Customizer
 *
 * @package Fotografie
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function fotografie_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->add_section( 'fotografie_theme_options', array(
		'title'    => esc_html__( 'Theme Options', 'fotografie' ),
		'priority' => 130,
	) );

	/* Layout Type */
	$wp_customize->add_setting( 'fotografie_latest_posts_title', array(
		'default'           => esc_html__( 'News', 'fotografie' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'fotografie_latest_posts_title', array(
		'label'   => esc_html__( 'Latest Posts Title', 'fotografie' ),
		'section' => 'fotografie_theme_options',
	) );

	/* Hero Content Selector */
	$wp_customize->add_setting( 'fotografie_single_image_position', array(
		'sanitize_callback' => 'fotografie_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'fotografie_single_image_position', array(
		'label'           => esc_html__( 'Check to move Single Page/Post Featured Image to header', 'fotografie' ),
		'section'         => 'fotografie_theme_options',
		'type'            => 'checkbox',
	) );
}
add_action( 'customize_register', 'fotografie_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function fotografie_customize_preview_js() {
	wp_enqueue_script( 'fotografie_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20170616', true );
}
add_action( 'customize_preview_init', 'fotografie_customize_preview_js' );

/**
 * Select sanitization callback example.
 *
 * - Sanitization: select
 * - Control: select, radio
 *
 * Sanitization callback for 'select' and 'radio' type controls. This callback sanitizes `$input`
 * as a slug, and then validates `$input` against the choices defined for the control.
 *
 * @see sanitize_key()               https://developer.wordpress.org/reference/functions/sanitize_key/
 * @see $wp_customize->get_control() https://developer.wordpress.org/reference/classes/wp_customize_manager/get_control/
 *
 * @param string               $input   Slug to sanitize.
 * @param WP_Customize_Setting $setting Setting instance.
 * @return string Sanitized slug if it is a valid choice; otherwise, the setting default.
 */
function fotografie_sanitize_select( $input, $setting ) {
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Checkbox sanitization callback example.
 *
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
function fotografie_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true === $checked ) ? true : false );
}
