<?php
/**
 * The template for displaying search results pages.
 *
 * @package Urdu News
 */

get_header(); ?>

<section id="primary" class="content-area content-search container">
	<main id="main" class="search-main" role="main">

	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<h2 class="page-title"><?php printf( esc_html__( 'آپکے مطلوبہ نتائج برائے: %s', 'unews' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
		</header><!-- .page-header -->

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php
			/**
			 * Run the loop for the search to output the results.
			 * If you want to overload this in a child theme then include a file
			 * called content-search.php and that will be used instead.
			 */
			get_template_part( 'template-parts/content', 'search' );
			?>

		<?php endwhile; ?>

		<?php the_posts_navigation(); ?>

	<?php else : ?>

		<?php get_template_part( 'template-parts/content', 'none' ); ?>

	<?php endif; ?>

	</main><!-- #main -->
	
</section><!-- #primary -->


<?php get_footer(); ?>
