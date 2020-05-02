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

// Display the post featured image.
the_post_thumbnail();

/** Post pages */

// Display the post author on post pages.
if ( is_single() && get_theme_mod( 'smntcs_retro_post_show_author', true ) ) {
	smntcs_retro_post_author();
}

// Display the post date on post pages.
if ( is_single() && get_theme_mod( 'smntcs_retro_post_show_date', true ) ) {
	smntcs_retro_post_date();
}

// Display the post tags on post pages.
if ( is_single() && get_theme_mod( 'smntcs_retro_post_show_tags', true ) ) {
	smntcs_retro_post_tags();
}

// Display the post categories on post pages.
if ( is_single() && get_theme_mod( 'smntcs_retro_post_show_categories', true ) ) {
	smntcs_retro_post_categories();
}

echo '<br>';

// Display the post content.
smntcs_retro_post_content();

// Display the post edit link.
smntcs_retro_post_edit_link();

// Display the post comments.
smntcs_retro_post_comments()

?>

</article><!-- .post -->
