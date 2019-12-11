<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Retro
 * @since 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>">

<?php

// Display the post title.
retro_post_title();

// Display the post featured image.
the_post_thumbnail();

// Display the post date.
retro_post_date();

// Display the post tags.
retro_post_tags();

// Display the post categories.
retro_post_catgories();

// Display the post content.
retro_post_content();

// Display the post edit link.
retro_post_edit_link();

// Display the post author.
retro_post_author();

// Display the post comments.
retro_post_comments()

?>

</article><!-- .post -->