<?php
/**
 * Template part for displaying single posts.
 *
 * @package Urdu News
 */
global $xpanel;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php 
			if (isset( $xpanel['show-post-featured'] ) && $xpanel['show-post-featured'] == TRUE) {
                if(has_post_thumbnail()) {
                    the_post_thumbnail('post-head');
                }
                else {
                    echo '<img src="' . get_template_directory_uri( '/' ) . '/images/nothumb-360.jpg" />';
                }
            } 
		?>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	<div class="entry-meta">
		<div class="post-info pt-5 pb-5">
			<?php 
				if ( isset( $xpanel['show-zoom'] ) && $xpanel['show-zoom'] == TRUE ) {
			?>
			<span class="pull-right">
                <a href="javascript:" id="dcrSize" title="Increase Font Size"><i class="fa fa-search-minus"></i></a>
				<a href="javascript:" id="incSize" title="Increase Font Size" class="mr-10"><i class="fa fa-search-plus"></i></a>
			</span>
			<?php } ?>
			<?php 
				if ( isset( $xpanel['show-comment-count'] ) && $xpanel['show-comment-count'] == TRUE ) {
			?>
			<small><?php $comments_count = wp_count_comments(get_the_ID()); ?></small>
			<?php } ?>
			<?php 
				if ( isset( $xpanel['show-author'] ) && $xpanel['show-author'] == TRUE ) {
			?>
			<span class="post-author mr-10">
				<i class="fa fa-user pr-5"></i>
				<?php printf( '<a href="%1$s">%2$s</a>',
					esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
					esc_html( get_the_author() )
				); ?>
               
			</span>
			<?php } ?>
			<?php 
				if ( isset( $xpanel['show-comment-count'] ) && $xpanel['show-comment-count'] == TRUE ) {
			?>
			<span class="post-comments ml-10">
				 <i class="fa fa-comment-o pl-5"></i> <?php echo $comments_count->approved ?> <?php _e("comments") ?>
			</span>
			<?php } ?>
			<?php 
				if ( isset( $xpanel['show-views'] ) && $xpanel['show-views'] == TRUE ) {
			?>
			<span class="post-views ml-10"><i class="fa fa-eye pl-5"></i> <small><?php echo getViews(get_the_ID()) ?></small> <?php _e("views") ?></span>
			<?php } ?>
		</div>
	</div><!-- .entry-meta -->

	<div class="above-post-ad"><?php dynamic_sidebar('above-post-ad') ?></div>

	<div class="entry-content" id="post-conten-single">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'unews' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<div class="below-post-ad"><?php dynamic_sidebar('below-post-ad') ?></div>

	<footer class="entry-footer">
		<?php unews_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

