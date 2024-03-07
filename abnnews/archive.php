<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Urdu News
 */

get_header(); ?>

	<div id="primary" class="content-area">
	
		<div class="main-sidebar col-lg-5 col-md-5 col-sm-6 hidden-xs" id="sidebar">
			<?php get_sidebar() ?>
		</div>

		<div class="mini-sidebar col-lg-3 col-md-3 hidden-sm hidden-xs">
			<?php dynamic_sidebar('sidebar-mini') ?>
		</div>
		

		<div id="main" class="archive-main col-lg-8 col-md-8 col-sm-10 col-xs-16" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					get_template_part( 'template-parts/content', 'archive' );
				?>

			<?php endwhile; ?>

			<?php if ( function_exists( 'upress_page_navi' ) ) { ?>
				<?php upress_page_navi(); ?>
			<?php } else { ?>
				<?php the_posts_navigation(); ?>
			<?php } ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</div><!-- #main -->

	</div><!-- #primary -->

<?php get_footer(); ?>
