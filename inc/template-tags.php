<?php
/**
 * Custom template tags for this theme.
 *
 * @package WordPress
 * @subpackage SMNTCS_Retro
 * @since 1.0.0
 */

/**
 * Check if WooCommerce is active and if user is on a WooCommerce page.
 *
 * @since 1.11.0
 */
function smntcs_retro_is_woocommerce_page() {

	if ( function_exists( 'is_shop' ) && is_shop() ||
		function_exists( 'is_cart' ) && is_cart() ||
		function_exists( 'is_checkout' ) && is_checkout() ||
		function_exists( 'is_account_page' ) && is_account_page()
	) {
		return true;
	} else {
		return false;
	}

}

/**
 * Display the post author
 *
 * @since 1.0.0
 */
function smntcs_retro_post_author() {

	$data = get_the_author();

	if ( empty( $data ) ) {
		return;
	}

	$label   = esc_html__( 'Author:', 'smntcs-retro' );
	$wrapper = '<div class="post-author">%s %s</div><!-- .post-author -->';
	$html    = sprintf( $wrapper, $label, $data );

	echo $html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

}

/**
 * Display the post thumbnail
 *
 * @since 2.0.0
 */
function smntcs_retro_post_thumbnail() {

	$data = get_the_post_thumbnail(null, 'thumbnail', array( 'class' => 'alignleft' ));

	if ( empty( $data ) ) {
		return;
	}

	echo $data; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

}

/**
 * Display the post categories
 *
 * @since 1.0.0
 */
function smntcs_retro_post_categories() {

	$data = get_the_category();

	if ( empty( $data ) ) {
		return;
	}

	foreach ( $data as $item ) {
		$items[] = sprintf( '<a href="%1$s" title="%2$s">%2$s</a>', get_term_link( $item->term_id ), $item->name );
	}

	$label   = __( 'Categories:', 'smntcs-retro' );
	$wrapper = '<div class="post-categories">%s %s</div><!-- .post-categories -->';
	$html    = sprintf( $wrapper, $label, implode( ', ', $items ) );
	$html    = apply_filters( 'smntcs_retro_post_categories', $html, $data, $wrapper );

	echo $html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

}

/**
 * Display the post pagination
 *
 * @since 1.9.0
 */
function smntcs_retro_post_pagination() {

	$previous_link    = get_previous_post_link();
	$previous_wrapper = sprintf( '<div class="post-pagination-previous">%s</div>', $previous_link );

	$next_link    = get_next_post_link();
	$next_wrapper = sprintf( '<div class="post-pagination-next">%s</div>', $next_link );

	$wrapper = '<div class="post-pagination">%s %s</div><!-- .post-date -->';
	$html    = sprintf( $wrapper, $previous_wrapper, $next_wrapper );

	echo $html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

}

/**
 * Display the post content
 *
 * @since 1.0.0
 */
function smntcs_retro_post_content() {

	the_content();

	wp_link_pages();

}

/**
 * Display the post comments
 *
 * @since 1.0.0
 */
function smntcs_retro_post_comments() {

	if ( smntcs_retro_is_woocommerce_page() ) {
		return;
	}

	comments_template();

}

/**
 * Display the post date
 *
 * @since 1.0.0
 */
function smntcs_retro_post_date() {

	$data    = get_the_date();
	$label   = __( 'Date:', 'smntcs-retro' );
	$wrapper = '<div class="post-date">%s %s</div><!-- .post-date -->';
	$html    = sprintf( $wrapper, $label, $data );
	$html    = apply_filters( 'smntcs_retro_post_date', $html, $data, $wrapper );

	echo $html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

}

/**
 * Display the post edit link
 *
 * @since 1.0.0
 */
function smntcs_retro_post_edit_link() {

	if ( smntcs_retro_is_woocommerce_page() ) {
		return;
	}

	edit_post_link( null, '<div class="edit-post">', '</div><!-- .edit-post -->' );

}

/**
 * Filter more excerpt.
 *
 * @param string $more The original string shown within the more link.
 *
 * @return string The updated string shown within the more link.
 */
function smntcs_retro_excerpt_more( string $more ): string {

	if ( ! is_single() && get_theme_mod( 'smntcs_retro_archive_show_more_link', true ) ) {
		$more = sprintf(
			' ... <a class="read-more" href="%1$s">%2$s</a>',
			get_permalink( get_the_ID() ),
			esc_html__( 'Read More', 'smntcs-retro' )
		);
	}

	return $more;

}
add_filter( 'excerpt_more', 'smntcs_retro_excerpt_more' );

/**
 * Display the post tags
 *
 * @since 1.0.0
 */
function smntcs_retro_post_tags() {

	$data = get_the_tags();

	if ( empty( $data ) ) {
		return;
	}

	foreach ( $data as $item ) {
		$items[] = sprintf( '<a href="%1$s" title="%2$s">%2$s</a>', get_term_link( $item->term_id ), $item->name );
	}

	$label   = __( 'Tags:', 'smntcs-retro' );
	$wrapper = '<div class="post-tags">%s %s</div><!-- .post-tags -->';
	$html    = sprintf( $wrapper, $label, implode( ', ', $items ) );
	$html    = apply_filters( 'smntcs_retro_post_tags', $html, $data, $wrapper );

	echo $html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

}

/**
 * Display the post date
 *
 * @since 1.0.0
 */
function smntcs_retro_post_title() {

	$data = get_the_title();

	if ( empty( $data ) ) {
		return;
	}

	if ( is_single() || is_page() ) {
		$wrapper = '<h1 class="post-title">%s</h1><!-- .site-title -->';
		$html    = sprintf( $wrapper, esc_html( $data ) );
	} else {
		$wrapper = '<h2 class="post-title"><a href="%1$s" title="%2$s">%2$s</a></h2><!-- .site-title -->';
		$html    = sprintf( $wrapper, get_permalink( get_the_ID() ), esc_html( $data ) );
	}

	$html = apply_filters( 'smntcs_retro_post_title', $html, $data, $wrapper );

	echo $html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

}

/**
 * Displays the site description.
 *
 * @since 1.0.0
 */
function smntcs_retro_site_description() {

	$data = get_bloginfo( 'description' );

	if ( empty( $data ) ) {
		return;
	}

	$wrapper = '<div id="site-description"><h2>%s</h2></div><!-- #site-description -->';
	$html    = sprintf( $wrapper, esc_html( $data ) );
	$html    = apply_filters( 'smntcs_retro_site_description', $html, $data, $wrapper );

	echo $html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

}

/**
 * Displays the site footer.
 *
 * @since 1.0.0
 */
function smntcs_retro_site_footer() {
	$data[] = gmdate( 'Y' );
	$data[] = get_bloginfo();
	$data[] = esc_html__( 'All rights reserved', 'smntcs-retro' );
	$data[] = sprintf(
		'<a href="%s">%s</a>',
		esc_url( __( 'https://wordpress.org/', 'smntcs-retro' ) ),
		esc_html__( 'Powered by WordPress', 'smntcs-retro' )
	);

	$wrapper = '<div id="site-footer">&copy; %s %s. %s. %s.</div><!-- #site-footer -->';
	$html    = sprintf( $wrapper, $data[0], $data[1], $data[2], $data[3] );
	$html    = apply_filters( 'smntcs_retro_site_footer', $html, $data, $wrapper );

	echo $html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

}

/**
 * Displays the site title.
 *
 * @since 1.0.0
 */
function smntcs_retro_site_title() {

	$data = get_bloginfo();

	if ( empty( $data ) ) {
		return;
	}

	if ( is_single() ) {
		$wrapper = '<div id="site-title"><h2><a href="/">%s</a></h2></div><!-- #site-title -->';
	} else {
		$wrapper = '<div id="site-title"><h1><a href="/">%s</a></h1></div><!-- #site-title -->';
	}

	$html = sprintf( $wrapper, esc_html( $data ) );
	$html = apply_filters( 'smntcs_retro_site_title', $html, $data, $wrapper );

	echo $html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

}

/**
 * Displays the search.
 *
 * @since 1.12.0
 */
function smntcs_retro_search() {

	if ( ! get_theme_mod( 'smntcs_retro_show_search', true ) ) {
		return;
	}

	$html  = '<button id="header-search-button"><span class="dashicons dashicons-search"></span></button>';
	$html .= sprintf( '<div id="header-search-form"><hr>%s</div>', get_search_form( false ) );

	$html = apply_filters( 'smntcs_retro_search', $html );

	echo $html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
