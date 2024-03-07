<div class="block-body">
<?php
global $xpanel;
$args = array(
	'cat' => $block_cat,
	'posts_per_page' => $xpanel['related-posts-limit']
);
$posts_query = new WP_Query( $args );

// The Loop
if ( $posts_query->have_posts() ) {
	while ( $posts_query->have_posts() ) {
		$posts_query->the_post(); ?>
		<div class="related-block-post-grid">
			<div class="post-thumbnail mb-10">
				<a href="<?php the_permalink() ?>">
				
					<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail('postblock-grid');
						}
						else {
							echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/nothumb-360.jpg" />';
						}
					?>

				</a>
			</div>
			<div class="post-title mt-5 mb-10">
				<h5>
					<a href="<?php the_permalink() ?>">
						<?php 
							$trimtitle = get_the_title(); 
							$shorttitle = wp_trim_words( $trimtitle, $num_words = 14, $more = '… ' ); 
							echo $shorttitle; 
						?>
					</a>
				</h5>
			</div>
		</div>
	<?php }
} else {
	// no posts found
}
/* Restore original Post Data */
wp_reset_postdata();

?>
</div>