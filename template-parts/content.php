<?php
/**
 * The default template for displaying content
 *
 * Used for archive pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage SMNTCS_Retro
 * @since 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php

// Display the post title.
smntcs_retro_post_title();

/** Archive and home page */

// Display the post author on archive and home page.
if ( ( is_archive() || is_home() ) && get_theme_mod( 'smntcs_retro_archive_show_author', true ) ) {
	smntcs_retro_post_author();
}

// Display the post date on archive and home page.
if ( ( is_archive() || is_home() ) && get_theme_mod( 'smntcs_retro_archive_show_date', true ) ) {
	smntcs_retro_post_date();
}

// Display the post tags on archive and home page.
if ( ( is_archive() || is_home() ) && get_theme_mod( 'smntcs_retro_archive_show_tags', true ) ) {
	smntcs_retro_post_tags();
}

// Display the post categories on archive and home page.
if ( ( is_archive() || is_home() ) && get_theme_mod( 'smntcs_retro_archive_show_categories', true ) ) {
	smntcs_retro_post_categories();
}

// Display the post thumbnail on archive and home page.
if ( ( is_archive() || is_home() ) && get_theme_mod( 'smntcs_retro_archive_show_thumbnail', true ) ) {
	smntcs_retro_post_thumbnail();
}

/** Regular pages */

// Display the post author on regular pages.
if ( is_page() && get_theme_mod( 'smntcs_retro_archive_show_author', true ) ) {
	smntcs_retro_post_author();
}

// Display the post date on regular pages.
if ( is_page() && get_theme_mod( 'smntcs_retro_archive_show_date', true ) ) {
	smntcs_retro_post_date();
}

// Display the post tags on regular pages.
if ( is_page() && get_theme_mod( 'smntcs_retro_archive_show_tags', true ) ) {
	smntcs_retro_post_tags();
}

// Display the post categories regular pages.
if ( is_page() && get_theme_mod( 'smntcs_retro_archive_show_categories', true ) ) {
	smntcs_retro_post_categories();
}

// Display the post excerpt or the full post.
if ( 'full' === get_theme_mod( 'smntcs_retro_archive_show_posts_as' ) ) {
	the_content( $post->ID );
} else {
	the_excerpt( $post->ID );
}

// Display the post edit link.
smntcs_retro_post_edit_link();

?>

</article><!-- .post -->
