<?php
/**
 * Initialize WordPress customizer.
 *
 * @package WordPress
 * @subpackage SMNTCS_Retro
 */

/**
 * Add theme options to the WordPress customizer.
 *
 * @since 1.6.0
 * @param WP_Customize_Manager $wp_customize The customizer object.
 * @return void
 */
function smntcs_retro_customize_register( $wp_customize ) {
	$wp_customize->add_panel(
		'smntcs_retro_theme_options_section',
		array(
			'priority' => 50,
			'title'    => __( 'Theme Options', 'smntcs-retro' ),
		)
	);
}
add_action( 'customize_register', 'smntcs_retro_customize_register' );
