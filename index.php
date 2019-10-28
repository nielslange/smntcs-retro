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
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

get_header();

?>

<main id="corpus" role="main">

	<section id="corpus-posts">

		<?php

		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/content', get_post_type() );
			}
		}

		?>

	</section><!-- #corpus-posts -->

	<div class="corpus-pagination">

		<?php the_posts_pagination(); ?>

	</div><!-- #corpus-pagination -->

</main><!-- #corpus -->

<?php

get_footer();
