<?php
/**
 * The template file to display the header of the SMNTCS Retro theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage SMNTCS_Retro
 * @since 1.0.0
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

		<?php wp_body_open(); ?>

		<header>

			<div id="header-title">

				<?php smntcs_retro_site_title(); ?>
				<?php smntcs_retro_site_description(); ?>

			</div><!-- #header-title -->

			<div id="header-menu-wrapper">

				<nav id="header-menu">

					<?php

					if ( has_nav_menu( 'primary' ) ) {
						wp_nav_menu(
							array(
								'theme_location' => 'primary',
								'container'      => '',
								'depth'          => 1,
							)
						);
					}

					?>

				</nav>

				<?php smntcs_retro_search(); ?>

				<hr>

			</div><!-- #header-menu -->

		</header>
