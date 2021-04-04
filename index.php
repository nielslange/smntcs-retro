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

		<?php

		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();

				if ( is_single() ) {
					get_template_part( 'template-parts/content-single', get_post_type() );
				} elseif ( is_page() ) {
					get_template_part( 'template-parts/content-page', get_post_type() );
				} else {
					get_template_part( 'template-parts/content', get_post_type() );
				}
			}
		} else {
			?>
		<header class="page-header">
			<h1 class="page-title"><?php esc_html_e( 'No search results found', 'smntcs-retro' ); ?></h1>
		</header>

		<p><?php esc_html_e( 'There are no results matching your search. Maybe try another search term?', 'smntcs-retro' ); ?></p>

			<?php get_search_form(); ?>
			<?php
		}

		?>

	</section><!-- #site-content-posts -->

	<?php if ( is_home() || is_archive() ) : ?>

		<div class="site-content-pagination">

			<?php the_posts_pagination(); ?>

		</div><!-- #site-content-pagination -->

	<?php endif; ?>

</main><!-- #site-content -->

<?php

get_footer();
