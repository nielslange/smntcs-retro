<?php
/**
 * SMNTCS Retro functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage SMNTCS_Retro
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
function smntcs_retro_theme_support() {

	/**
	 * Add default posts and comments RSS feed links to head.
	 *
	 * @since 1.0.0
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Add responsive embeds support.
	 *
	 * @since 1.8.0
	 */
	add_theme_support( 'responsive-embeds' );

	/**
	 * Set content-width.
	 *
	 * @link https://codex.wordpress.org/Content_Width
	 */
	global $content_width;
	if ( ! isset( $content_width ) ) {
		// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
		$content_width = sprintf( '%dpx', get_theme_mod( 'smntcs_retro_site_width', '580' ) );
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
	set_post_thumbnail_size( get_theme_mod( 'smntcs_retro_site_width', '580' ), 9999 );

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
	load_theme_textdomain( 'smntcs-retro' );

}
add_action( 'after_setup_theme', 'smntcs_retro_theme_support' );

/**
 * Include required files.
 */
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/theme-colors.php';

/**
 * Register and enqueue styles.
 *
 * @since 1.0.0
 */
function smntcs_retro_register_styles() {

	$theme = wp_get_theme();
	wp_enqueue_style( 'smntcs-retro-style', get_stylesheet_uri(), $theme->version, time() );
	wp_style_add_data( 'smntcs-retro-style', 'rtl', 'replace' );

}
add_action( 'wp_enqueue_scripts', 'smntcs_retro_register_styles' );

/**
 * Register and enqueue scripts.
 *
 * @since 1.0.0
 */
function smntcs_retro_register_scripts() {

	if ( ( ! is_admin() ) && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'smntcs_retro_register_scripts' );

/**
 * Register navigation menu.
 *
 * @since 1.0.0
 */
function smntcs_retro_menus() {

	$locations = array(
		'primary' => __( 'Primary Menu', 'smntcs-retro' ),
		'footer'  => __( 'Footer Menu', 'smntcs-retro' ),
	);

	register_nav_menus( $locations );
}
add_action( 'init', 'smntcs_retro_menus' );

/**
 * Register footer widget section
 *
 * @since 1.0.0
 */
function smntcs_retro_sidebars() {

	register_sidebar(
		array(
			'id'            => 'footer-sidebar-left',
			'name'          => __( 'Footer Sidebar Left', 'smntcs-retro' ),
			'description'   => __( 'Add widgets to the footer sidebar left.', 'smntcs-retro' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'id'            => 'footer-sidebar-right',
			'name'          => __( 'Footer Sidebar Right', 'smntcs-retro' ),
			'description'   => __( 'Add widgets to the footer sidebar right.', 'smntcs-retro' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

}
add_action( 'widgets_init', 'smntcs_retro_sidebars' );


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
function smntcs_retro_skip_link() {
	echo '<a class="skip-link screen-reader-text" href="#site-content">' . __( 'Skip to the content', 'smntcs-retro' ) . '</a>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- core trusts translations
}
add_action( 'wp_body_open', 'smntcs_retro_skip_link', 5 );

/**
 * Add theme options to the WordPress customizer
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

	// ---------------------------------------------------------------------------

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
		'smntcs_retro_show_post_pagination',
		array(
			'default'           => false,
			'sanitize_callback' => 'smntcs_retro_sanitize_checkbox',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		'smntcs_retro_show_post_pagination',
		array(
			'label'   => __( 'Show pagination on post pages', 'smntcs-retro' ),
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

	// ---------------------------------------------------------------------------

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
			'default'           => true,
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

	// ---------------------------------------------------------------------------

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

	$wp_customize->add_section(
		'smntcs_retro_theme_post_section',
		array(
			'title' => __( 'Posts', 'smntcs-retro' ),
			'panel' => 'smntcs_retro_theme_options_section',
		)
	);

	$wp_customize->add_setting(
		'smntcs_retro_post_show_author',
		array(
			'default'           => true,
			'sanitize_callback' => 'smntcs_retro_sanitize_checkbox',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		'smntcs_retro_post_show_author',
		array(
			'label'   => __( 'Show author on posts', 'smntcs-retro' ),
			'section' => 'smntcs_retro_theme_post_section',
			'type'    => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'smntcs_retro_post_show_date',
		array(
			'default'           => true,
			'sanitize_callback' => 'smntcs_retro_sanitize_checkbox',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		'smntcs_retro_post_show_date',
		array(
			'label'   => __( 'Show date on posts', 'smntcs-retro' ),
			'section' => 'smntcs_retro_theme_post_section',
			'type'    => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'smntcs_retro_post_show_tags',
		array(
			'default'           => true,
			'sanitize_callback' => 'smntcs_retro_sanitize_checkbox',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		'smntcs_retro_post_show_tags',
		array(
			'label'   => __( 'Show tags on posts', 'smntcs-retro' ),
			'section' => 'smntcs_retro_theme_post_section',
			'type'    => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'smntcs_retro_post_show_categories',
		array(
			'default'           => true,
			'sanitize_callback' => 'smntcs_retro_sanitize_checkbox',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		'smntcs_retro_post_show_categories',
		array(
			'label'   => __( 'Show categories on posts', 'smntcs-retro' ),
			'section' => 'smntcs_retro_theme_post_section',
			'type'    => 'checkbox',
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

	$wp_customize->add_section(
		'smntcs_retro_theme_page_section',
		array(
			'title' => __( 'Pages', 'smntcs-retro' ),
			'panel' => 'smntcs_retro_theme_options_section',
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
add_action( 'customize_register', 'smntcs_retro_customize_register' );

/**
 * Sanitize checkbox field.
 *
 * @since 1.6.0
 * @param bool $checked Whether or not a box is checked.
 * @return bool True if checkbox is activated, othewise false
 */
function smntcs_retro_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && true === $checked ) ? true : false );
}

/**
 * Sanitize radio field.
 *
 * @param mixed $input The input to sanitize.
 * @param mixed $setting The settings object.
 * @return bool True if select field is valid, othewise false
 */
function smntcs_retro_sanitize_radio( $input, $setting ) {

	$input   = sanitize_key( $input );
	$choices = $setting->manager->get_control( $setting->id )->choices;

	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Sanitize radio field.
 *
 * @param mixed $input The input to sanitize.
 * @param mixed $setting The settings object.
 * @return bool True if select field is valid, othewise false
 */
function smntcs_retro_sanitize_select( $input, $setting ) {

	$input   = sanitize_key( $input );
	$choices = $setting->manager->get_control( $setting->id )->choices;

	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Add custom CSS to the site.
 *
 * @since 1.6.0
 * @return void
 */
function smntcs_retro_wp_head() {
	if ( get_theme_mod( 'smntcs_retro_centre_site' ) ) {
		print( '<style type="text/css">body { margin: auto; }</style>' );
	}

	if ( get_theme_mod( 'smntcs_retro_site_width' ) ) {
		printf( '<style type="text/css">body { max-width: %dpx; }</style>', (int) get_theme_mod( 'smntcs_retro_site_width' ) );
	}
}
add_action( 'wp_head', 'smntcs_retro_wp_head' );
