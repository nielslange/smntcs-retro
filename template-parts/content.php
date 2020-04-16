<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
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

/** Archive and home page *****************************************************/

// Display the post author on archive and home page.
if ( ( is_archive() || is_home() ) && get_theme_mod( 'smntcs_retro_archive_show_author' ) ) {
	smntcs_retro_post_author();
}

// Display the post date on archive and home page.
if ( ( is_archive() || is_home() ) && get_theme_mod( 'smntcs_retro_archive_show_date' ) ) {
	smntcs_retro_post_date();
}

// Display the post tags on archive and home page.
if ( ( is_archive() || is_home() ) && get_theme_mod( 'smntcs_retro_archive_show_tags' ) ) {
	smntcs_retro_post_tags();
}

// Display the post categories on archive and home page.
if ( ( is_archive() || is_home() ) && get_theme_mod( 'smntcs_retro_archive_show_categories' ) ) {
	smntcs_retro_post_catgories();
}

/** Post pages ****************************************************************/

// Display the post author on post pages.
if ( is_single() && get_theme_mod( 'smntcs_retro_post_show_author' ) ) {
	smntcs_retro_post_author();
}

// Display the post date on post pages.
if ( is_single() && get_theme_mod( 'smntcs_retro_post_show_author' ) ) {
	smntcs_retro_post_date();
}

// Display the post tags on post pages.
if ( is_single() && get_theme_mod( 'smntcs_retro_post_show_author' ) ) {
	smntcs_retro_post_tags();
}

// Display the post categories on post pages.
if ( is_single() && get_theme_mod( 'smntcs_retro_post_show_categories' ) ) {
	smntcs_retro_post_catgories();
}

/** Regular pages *************************************************************/

// Display the post author on regular pages.
if ( is_page() && get_theme_mod( 'smntcs_retro_archive_show_author' ) ) {
	smntcs_retro_post_author();
}

// Display the post date on regular pages.
if ( is_page() && get_theme_mod( 'smntcs_retro_archive_show_date' ) ) {
	smntcs_retro_post_date();
}

// Display the post tags on regular pages.
if ( is_page() && get_theme_mod( 'smntcs_retro_archive_show_tags' ) ) {
	smntcs_retro_post_tags();
}

// Display the post categories regular pages.
if ( is_page() && get_theme_mod( 'smntcs_retro_archive_show_categories' ) ) {
	smntcs_retro_post_catgories();
}

echo '<br>';

// Display the post excerpt.
the_excerpt( $post->ID );

// Display the post edit link.
smntcs_retro_post_edit_link();

?>

</article><!-- .post -->
