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
		case 'charlestone-light': // https://coolors.co/f8f9fa-e9ecef-dee2e6-ced4da-adb5bd-6c757d-495057-343a40-212529.
			$scheme = 'charlestone-light.css';
			break;
		default:
			$scheme = 'nordtheme-dark.css';
			break;
	}

	wp_enqueue_style( 'smntcs-retro-color-scheme', get_stylesheet_directory_uri() . '/color-schemes/' . $scheme, 'smntcs-retro-style', '1.0', 'screen' );
}
add_action( 'wp_enqueue_scripts', 'smntcs_color_schemes', 11 );
