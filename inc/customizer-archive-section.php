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
function smntcs_retro_theme_archive_section( $wp_customize ) {

	$wp_customize->add_section(
		'smntcs_retro_theme_archive_section',
		array(
			'title' => __( 'Archives', 'smntcs-retro' ),
			'panel' => 'smntcs_retro_theme_options_section',
		)
	);

	$wp_customize->add_setting(
		'smntcs_retro_archive_show_posts_as',
		array(
			'sanitize_callback' => 'smntcs_retro_sanitize_select',
			'type'              => 'theme_mod',
			'default'           => 'excerpt',
		)
	);

	$wp_customize->add_control(
		'smntcs_retro_archive_show_posts_as',
		array(
			'label'   => __( 'Show post as', 'smntcs-retro' ),
			'section' => 'smntcs_retro_theme_archive_section',
			'type'    => 'select',
			'choices' => array(
				'excerpt' => __( 'Excerpt', 'smntcs-retro' ),
				'full'    => __( 'Full post', 'smntcs-retro' ),
			),
		)
	);

	$wp_customize->add_setting(
		'smntcs_retro_archive_show_thumbnail',
		array(
			'default'           => true,
			'sanitize_callback' => 'smntcs_retro_sanitize_checkbox',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		'smntcs_retro_archive_show_thumbnail',
		array(
			'label'   => __( 'Show thumbnail on archive page', 'smntcs-retro' ),
			'section' => 'smntcs_retro_theme_archive_section',
			'type'    => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'smntcs_retro_archive_show_author',
		array(
			'default'           => true,
			'sanitize_callback' => 'smntcs_retro_sanitize_checkbox',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		'smntcs_retro_archive_show_author',
		array(
			'label'   => __( 'Show author on archive page', 'smntcs-retro' ),
			'section' => 'smntcs_retro_theme_archive_section',
			'type'    => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'smntcs_retro_archive_show_date',
		array(
			'default'           => true,
			'sanitize_callback' => 'smntcs_retro_sanitize_checkbox',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		'smntcs_retro_archive_show_date',
		array(
			'label'   => __( 'Show date on archive page', 'smntcs-retro' ),
			'section' => 'smntcs_retro_theme_archive_section',
			'type'    => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'smntcs_retro_archive_show_tags',
		array(
			'default'           => true,
			'sanitize_callback' => 'smntcs_retro_sanitize_checkbox',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		'smntcs_retro_archive_show_tags',
		array(
			'label'   => __( 'Show tags on archive page', 'smntcs-retro' ),
			'section' => 'smntcs_retro_theme_archive_section',
			'type'    => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'smntcs_retro_archive_show_categories',
		array(
			'default'           => true,
			'sanitize_callback' => 'smntcs_retro_sanitize_checkbox',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		'smntcs_retro_archive_show_categories',
		array(
			'label'   => __( 'Show categories on archive page', 'smntcs-retro' ),
			'section' => 'smntcs_retro_theme_archive_section',
			'type'    => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'smntcs_retro_archive_show_more_link',
		array(
			'default'           => true,
			'sanitize_callback' => 'smntcs_retro_sanitize_checkbox',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		'smntcs_retro_archive_show_more_link',
		array(
			'label'   => __( 'Show more link on archive page', 'smntcs-retro' ),
			'section' => 'smntcs_retro_theme_archive_section',
			'type'    => 'checkbox',
		)
	);
}
add_action( 'customize_register', 'smntcs_retro_theme_archive_section' );
