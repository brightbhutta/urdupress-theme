<?php
/**
 * The template for displaying all single posts.
 * Template Name: English Full-Width
 * Template Post Type: post
 * @package Urdu News
 */

get_header(); 
global $xpanel;
$ip_address = get_client_ip_server();
?>
<script>
$(document).ready(function(){
    $(this).scrollTop(0);
});
</script>
<div id="primary" class="content-area pt-10 mt-10">
	
	<div id="main" class="col-lg-16 english-post-view post-view" role="main">
		<div class="container-fluid">
			<div class="pot-view-content pr-0 pl-0">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php setViews(''.$ip_address.'',''.get_the_ID().''); ?>
					<?php get_template_part( 'template-parts/content', 'singleEnglishFull' ); ?>

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
		
</div><!-- #primary -->

<?php get_footer(); ?>
