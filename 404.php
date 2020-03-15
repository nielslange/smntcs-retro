<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage SMNTCS_Retro
 * @since 1.0.0
 */

get_header();

?>

<main id="site-content" role="main">

	<section id="site-content-posts">

		<header class="page-header">
			<h1 class="page-title"><?php _e( 'Page or post not found', 'smntcs-retro' ); ?></h1>
		</header>

		<p><?php _e( 'This is somewhat embarrassing, isn’t it? It looks like nothing was found at this location. Maybe try a search?', 'smntcs-retro' ); ?></p>

		<?php get_search_form(); ?>

	</section><!-- #site-content-posts -->

</main><!-- #site-content -->

<?php

get_footer();
