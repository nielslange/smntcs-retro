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

// Display the post author.
smntcs_retro_post_author();

// Display the post date.
smntcs_retro_post_date();

// Display the post tags.
smntcs_retro_post_tags();

// Display the post categories.
smntcs_retro_post_catgories();

echo '<br>';

// Display the post content.
smntcs_retro_post_content();

// Display the post edit link.
smntcs_retro_post_edit_link();

// Display the post comments.
smntcs_retro_post_comments()

?>

</article><!-- .post -->
