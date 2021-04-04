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
function smntcs_retro_theme_page_section( $wp_customize ) {

	$wp_customize->add_section(
		'smntcs_retro_theme_page_section',
		array(
			'title' => __( 'Pages', 'smntcs-retro' ),
			'panel' => 'smntcs_retro_theme_options_section',
		)
	);

	$wp_customize->add_setting(
		'smntcs_retro_page_show_author',
		array(
			'default'           => true,
			'sanitize_callback' => 'smntcs_retro_sanitize_checkbox',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		'smntcs_retro_page_show_author',
		array(
			'label'   => __( 'Show author on pages', 'smntcs-retro' ),
			'section' => 'smntcs_retro_theme_page_section',
			'type'    => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'smntcs_retro_page_show_date',
		array(
			'default'           => true,
			'sanitize_callback' => 'smntcs_retro_sanitize_checkbox',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		'smntcs_retro_page_show_date',
		array(
			'label'   => __( 'Show date on pages', 'smntcs-retro' ),
			'section' => 'smntcs_retro_theme_page_section',
			'type'    => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'smntcs_retro_page_show_tags',
		array(
			'default'           => true,
			'sanitize_callback' => 'smntcs_retro_sanitize_checkbox',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		'smntcs_retro_page_show_tags',
		array(
			'label'   => __( 'Show tags on pages', 'smntcs-retro' ),
			'section' => 'smntcs_retro_theme_page_section',
			'type'    => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'smntcs_retro_page_show_categories',
		array(
			'default'           => true,
			'sanitize_callback' => 'smntcs_retro_sanitize_checkbox',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		'smntcs_retro_page_show_categories',
		array(
			'label'   => __( 'Show categories on pages', 'smntcs-retro' ),
			'section' => 'smntcs_retro_theme_page_section',
			'type'    => 'checkbox',
		)
	);

}
add_action( 'customize_register', 'smntcs_retro_theme_page_section' );
