<?php
/**
 * The template file to display the footer of the Retro theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Retro
 * @since 1.0.0
 */

?>		

		<hr>

		<footer>

			<div id="footer-menu-wrapper">

				<nav id="footer-menu">

				<?php

				if ( has_nav_menu( 'footer' ) ) {
					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'container'      => '',
							'depth'          => 1,
						)
					);
				}

				?>

				</nav>

			</div><!-- #footer-menu-wrapper -->


			<div id="footer-credits-wrapper">

				#footer-credits

			</div><!-- #footer-credits-wrapper -->

		</footer>

		<?php wp_footer(); ?>

	</body>

</html>
