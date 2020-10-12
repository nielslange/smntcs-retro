<?php
/**
 * Custom color schemes for this theme.
 *
 * @package WordPress
 * @subpackage SMNTCS_Retro
 * @since 1.11.0
 */

/**
 * Define custom color schemes
 *
 * @since 1.11.0
 * @return void
 */
function smntcs_color_schemes() {

	switch ( get_theme_mod( 'smntcs_retro_color_scheme' ) ) {
		case 'nordtheme-light':
			$scheme = 'nordtheme-light.css';
			break;
		case 'charlestone-dark':
			$scheme = 'charlestone-dark.css';
			break;
		case 'charlestone-light':
			$scheme = 'charlestone-light.css';
			break;
		default:
			$scheme = 'nordtheme-dark.css';
			break;
	}

	$theme = wp_get_theme();
	wp_enqueue_style( 'smntcs-retro-color-scheme', get_stylesheet_directory_uri() . '/color-schemes/' . $scheme, 'smntcs-retro-style', $theme->version, 'screen' );
}
add_action( 'wp_enqueue_scripts', 'smntcs_color_schemes', 11 );
