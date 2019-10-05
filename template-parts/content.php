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

<article id="post-<?php the_ID(); ?>" <?php post_class( 'margin-bottom-xl' ); ?>>

<?php

retro_post_title();

retro_post_date();

retro_post_tags();

retro_post_catgories();

the_excerpt( $post->ID );

retro_post_edit_link();

?>

</article><!-- .post -->