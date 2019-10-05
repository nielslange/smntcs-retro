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

	$data = get_bloginfo();

	if ( ! $data ) {
		return;
	}

	$wrapper = '<div id="site-title">%s</div><!-- #site-description -->';
	$html    = sprintf( $wrapper, esc_html( $data ) );
	$html    = apply_filters( 'retro_site_title', $html, $data, $wrapper );

	echo $html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

}

/**
 * Displays the site description.
 *
 * @since 1.0.0
 */
function retro_site_description() {

	$data = get_bloginfo( 'description' );

	if ( ! $data ) {
		return;
	}

	$wrapper = '<div id="site-description">%s</div><!-- .site-description -->';
	$html    = sprintf( $wrapper, esc_html( $data ) );
	$html    = apply_filters( 'retro_site_description', $html, $data, $wrapper );

	echo $html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

}

/**
 * Display the post date
 *
 * @since 1.0.0
 */
function retro_post_title(){

	$data = get_the_title();

	if ( ! $data ) {
		return;
	}

	if ( is_single() ) {
		$wrapper = '<h1 id="site-title">%s</h1><!-- .site-title -->';	
		$html    = sprintf( $wrapper, esc_html( $data ) );
	} else {
		$wrapper = '<h2 id="site-title"><a href="%1$s" title="%2$s">%2$s</a></h2><!-- .site-title -->';
		$html    = sprintf( $wrapper, get_permalink( get_the_ID() ), esc_html( $data ) );
	}

	$html    = apply_filters( 'retro_post_title', $html, $data, $wrapper );

	echo $html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

}

/**
 * Display the post date
 *
 * @since 1.0.0
 */
function retro_post_date() {

	$data    = get_the_date();
	$label   = __( 'Date:' , 'retro' );
	$wrapper = '<div id="post-date" class="margin-bottom-xs margin-top-xs">%s %s</div><!-- .post-date -->';
	$html    = sprintf( $wrapper, $label, $data );
	$html    = apply_filters( 'retro_post_date', $html, $data, $wrapper );

	echo $html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

}

/**
 * Display the post tags
 *
 * @since 1.0.0
 */
function retro_post_tags() {

	$data = get_the_tags();

	if ( ! $data ) {
		return;
	}

	foreach ( $data as $item ) {
		$items[] = sprintf( '<a href="%1$s" title="%2$s">%2$s</a>', get_term_link( $item->term_id ), $item->name );
	}

	$label   = __( 'Tags:' , 'retro' );
	$wrapper = '<div id="post-tags" class="margin-bottom-xs margin-top-xs">%s %s</div><!-- .post-tags -->';
	$html    = sprintf( $wrapper, $label, implode( ', ', $items ) );
	$html    = apply_filters( 'retro_post_tags', $html, $data, $wrapper );

	echo $html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

}

/**
 * Display the post catgories
 *
 * @since 1.0.0
 */
function retro_post_catgories() {

	$data = get_the_category();

	foreach ( $data as $item ) {
		$items[] = sprintf( '<a href="%1$s" title="%2$s">%2$s</a>', get_term_link( $item->term_id ), $item->name );
	}

	$label   = __( 'Categories:' , 'retro' );
	$wrapper = '<div id="post-cateories" class="margin-bottom-xs margin-top-xs">%s %s</div><!-- .post-cateories -->';
	$html    = sprintf( $wrapper, $label, implode( ', ', $items ) );
	$html    = apply_filters( 'retro_post_catgories', $html, $data, $wrapper );

	echo $html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

}

/**
 * Display the post edit link
 *
 * @since 1.0.0
 */
function retro_post_edit_link() {

	edit_post_link();

}
