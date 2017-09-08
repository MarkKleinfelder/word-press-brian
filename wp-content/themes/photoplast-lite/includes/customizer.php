<?php
/**
 *	Customizer
 */
if( !function_exists( 'photoplast_lite_customizer' ) ) {
	add_action( 'customize_register', 'photoplast_lite_customizer', 50 );
	function photoplast_lite_customizer( $wp_customize ) {
		// Remove Setting & Control
		$wp_customize->remove_setting( 'rokophotolite_footer_copyrights' );
		$wp_customize->remove_control( 'rokophotolite_footer_copyrights' );

		// Get Settings
		$wp_customize->get_setting( 'rokophotolite_logo_image' )->default = '';

		$wp_customize->add_setting( 'photoplast_lite_footer_copyrights', array(
			'default'			=> __( 'Copyright 2016. All rights reserved.', 'photoplast-lite' ),
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'sanitize_text_field'
		));

		$wp_customize->add_control('photoplast_lite_footer_copyrights', array(
			'label'		=> __( 'Footer Copyrights', 'photoplast-lite' ),
			'section'	=> 'rokophotolite_footer_section',
			'priority'	=> 50,
			'settings'	=> 'photoplast_lite_footer_copyrights'
		));
	}
}
?>