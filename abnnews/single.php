<?php
/**
 * The template for displaying all single posts.
 * Template Name: Urdu Default
 * Template Post Type: post
 * @package Urdu News
 */

get_header(); 
global $xpanel;
$ip_address = get_client_ip_server();
if ( isset( $xpanel['show-post-sidebar'] ) && $xpanel['show-post-sidebar'] == TRUE ) {
	$sidebar_class = "col-lg-4";
	$content_class = "col-lg-12";
}
else {
	$sidebar_class = "hidden-lg";
	$content_class = "col-lg-16";
}
?>
<script>
$(document).ready(function(){
    $(this).scrollTop(0);
});
</script>
<div id="primary" class="content-area pt-10 mt-10">
	
	<div id="main" class="col-lg-11 col-md-10 col-sm-10 col-xs-16 pull-right post-view" role="main">
		<div class="container-fluid">
			
			<div class="mini-sidebar-single <?php echo $sidebar_class ?> hidden-md hidden-sm hidden-xs pl-0">
				<?php dynamic_sidebar('sidebar-mini-single') ?>
			</div>

			<div class="<?php echo $content_class ?> col-md-16 col-sm-16 col-xs-16 post-view-content pr-0">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php setViews(''.$ip_address.'',''.get_the_ID().''); ?>
					<?php get_template_part( 'template-parts/content', 'single' ); ?>

				<?php endwhile; // End of the loop. ?>
			</div>
		</div>
		<div class="below-post row">
			<?php 
				if ( isset( $xpanel['show-related-posts'] ) && $xpanel['show-related-posts'] == TRUE ) {
			?>
			<div class="related-posts mb-10">
				<div class="related-posts-header">
					<h2><?php echo _e("مزید پڑھیں") ?></h2>
				</div>
				<div class="related-posts-container pt-10">
					<?php 
						$categories = get_the_category();
						$category_id = $categories[0]->cat_ID;
						$block_cat = $category_id;
						set_query_var( 'block_cat', $block_cat );
						get_template_part( 'template-parts/posts', 'related' );
					?>
				</div>
			</div>
			<?php } ?>
			<div class="comments-row">
				<div class="comment-control"><a href="javascript:" id="comment-toggle">Load/Hide Comments</a></div>
				<div id="comment-box">
				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>
				</div>
			</div>
		</div>
	</div><!-- #main -->
	<div class="main-sidebar col-lg-5 col-md-6 col-sm-6 col-xs-16">
		<?php get_sidebar(); ?>
	</div>
		
</div><!-- #primary -->

<?php get_footer(); ?>
