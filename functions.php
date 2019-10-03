<?php
/**
 * Retro functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Retro
 * @since 1.0.0
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since 1.0.0
 */
function retro_theme_support() {

	/**
	 * Add default posts and comments RSS feed links to head.
	 *
	 * @since 1.0.0
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Set content-width.
	 *
	 * @link https://codex.wordpress.org/Content_Width
	 */
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 580;
	}

	/**
	 * Enable support for post thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * Set post thumbnail size.
	 *
	 * @link https://developer.wordpress.org/reference/functions/set_post_thumbnail_size/
	 */
	set_post_thumbnail_size( 580, 9999 );

	/**
	 * Enable title tag support.
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable HTML5 support.
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);

	/*
	 * Load theme text domain.
	 *
	 * @link https://developer.wordpress.org/reference/functions/load_theme_textdomain/
	 */
	load_theme_textdomain( 'retro' );

}

add_action( 'after_setup_theme', 'retro_theme_support' );

/**
 * Include required files.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Register and enqueue styles.
 *
 * @since 1.0.0
 */
function retro_register_styles() {

	wp_enqueue_style( 'retro-style', get_stylesheet_uri(), null, wp_get_theme()->get( 'Version' ) );
	wp_style_add_data( 'retro-style', 'rtl', 'replace' );

}

add_action( 'wp_enqueue_scripts', 'retro_register_styles' );

/**
 * Register and enqueue scripts.
 *
 * @since 1.0.0
 */
function retro_register_scripts() {

	if ( ( ! is_admin() ) && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}

add_action( 'wp_enqueue_scripts', 'retro_register_scripts' );

/**
 * Register navigation menu.
 *
 * @since 1.0.0
 */
function retro_menus() {

	$locations = array(
		'primary' => __( 'Primary Menu', 'retro' ),
		'footer'  => __( 'Footer Menu', 'retro' ),
	);

	register_nav_menus( $locations );
}

add_action( 'init', 'retro_menus' );

if ( ! function_exists( 'wp_body_open' ) ) {

	/**
	 * Shim for wp_body_open, ensuring backwards compatibility with versions of WordPress older than 5.2.
	 *
	 * @since 1.0.0
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

/**
 * Include a skip to content link at the top of the page so that users can bypass the menu.
 *
 * @since 1.0.0
 */
function retro_skip_link() {
	echo '<a class="skip-link screen-reader-text" href="#site-content">' . __( 'Skip to the content', 'retro' ) . '</a>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- core trusts translations
}

add_action( 'wp_body_open', 'retro_skip_link', 5 );
