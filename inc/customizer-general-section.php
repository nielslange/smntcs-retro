<?php
/**
 * Initialize WordPress customizer.
 *
 * @package WordPress
 * @subpackage SMNTCS_Retro
 */

/**
 * Add theme options to the WordPress customizer
 *
 * @since 1.6.0
 * @param WP_Customize_Manager $wp_customize The customizer object.
 * @return void
 */
function smntcs_retro_theme_general_section( $wp_customize ) {

	$wp_customize->add_section(
		'smntcs_retro_theme_general_section',
		array(
			'title' => __( 'General', 'smntcs-retro' ),
			'panel' => 'smntcs_retro_theme_options_section',
		)
	);

	$wp_customize->add_setting(
		'smntcs_retro_centre_site',
		array(
			'default'           => false,
			'sanitize_callback' => 'smntcs_retro_sanitize_checkbox',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		'smntcs_retro_centre_site',
		array(
			'label'   => __( 'Centre site', 'smntcs-retro' ),
			'section' => 'smntcs_retro_theme_general_section',
			'type'    => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'smntcs_retro_show_search',
		array(
			'default'           => false,
			'sanitize_callback' => 'smntcs_retro_sanitize_checkbox',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		'smntcs_retro_show_search',
		array(
			'label'   => __( 'Show search', 'smntcs-retro' ),
			'section' => 'smntcs_retro_theme_general_section',
			'type'    => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'smntcs_retro_color_scheme',
		array(
			'sanitize_callback' => 'smntcs_retro_sanitize_select',
			'type'              => 'theme_mod',
			'default'           => 'nordtheme-dark',
		)
	);

	$wp_customize->add_control(
		'smntcs_retro_color_scheme',
		array(
			'label'   => __( 'Color scheme', 'smntcs-retro' ),
			'section' => 'smntcs_retro_theme_general_section',
			'type'    => 'select',
			'choices' => array(
				'nordtheme-dark'    => __( 'Nord (dark)', 'smntcs-retro' ),
				'nordtheme-light'   => __( 'Nord (light)', 'smntcs-retro' ),
				'charlestone-dark'  => __( 'Charlestone (dark)', 'smntcs-retro' ),
				'charlestone-light' => __( 'Charlestone (light)', 'smntcs-retro' ),
			),
		)
	);

	$wp_customize->add_setting(
		'smntcs_retro_site_width',
		array(
			'default'           => 580,
			'sanitize_callback' => 'smntcs_retro_sanitize_radio',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		'smntcs_retro_site_width',
		array(
			'label'   => __( 'Site width', 'smntcs-retro' ),
			'section' => 'smntcs_retro_theme_general_section',
			'type'    => 'radio',
			'choices' => array(
				'580'  => __( '580px', 'smntcs-retro' ),
				'768'  => __( '768px', 'smntcs-retro' ),
				'960'  => __( '960px', 'smntcs-retro' ),
				'1024' => __( '1024px', 'smntcs-retro' ),
			),
		)
	);

}
add_action( 'customize_register', 'smntcs_retro_theme_general_section' );
