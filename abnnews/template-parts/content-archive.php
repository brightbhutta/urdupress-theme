<?php
/**
 * Template part for displaying posts.
 *
 * @package UrduPress
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="archive-post-thumb row ml-0 mr-0 mb-10">
		<?php 
			if(has_post_thumbnail()) {

                the_post_thumbnail('post-head');

            } else {

                echo '<img src="' . get_template_directory_uri( '/' ) . '/images/nothumb-360.jpg" />';
            }
		?>
		</div>
		<div class="row ml-0 mr-0 archive-post-title-row">
			<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
		</div>
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php unews_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_excerpt();
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'صفحے:', 'unews' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php //unews_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
