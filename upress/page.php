<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Urdu News
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div class="main-sidebar col-lg-5 col-md-5 col-sm-6 hiden-xs">
			<?php get_sidebar(); ?>
		</div>
		<div id="main" class="site-main page-view col-lg-11 col-md-11 col-sm-10 col-xs-16" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>

		</div><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
