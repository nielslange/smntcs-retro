<?php
/**
 * Custom template tags for this theme.
 *
 * @package WordPress
 * @subpackage Retro
 * @since 1.0.0
 */

/**
 * Displays the site title.
 *
 * @since 1.0.0
 */
function retro_site_title() {

	$title = get_bloginfo();

	if ( ! $title ) {
		return;
	}

	$wrapper = '<div id="site-title" class="no-margin-bottom">%s</div><!-- #site-description -->';
	$html    = sprintf( $wrapper, esc_html( $title ) );
	$html    = apply_filters( 'retro_site_title', $html, $title, $wrapper );

	echo $html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

}

/**
 * Displays the site description.
 *
 * @since 1.0.0
 */
function retro_site_description() {

	$description = get_bloginfo( 'description' );

	if ( ! $description ) {
		return;
	}

	$wrapper = '<div id="site-description" class="no-margin-top">%s</div><!-- .site-description -->';
	$html    = sprintf( $wrapper, esc_html( $description ) );
	$html    = apply_filters( 'twentytwenty_site_description', $html, $description, $wrapper );

	echo $html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

}
