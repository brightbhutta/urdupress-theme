
<div class="block-body">
<?php
$args = array(
	'posts_per_page' => 8
);
$posts_query = new WP_Query( $args );

// The Loop
if ( $posts_query->have_posts() ) {
	while ( $posts_query->have_posts() ) {
		$posts_query->the_post(); ?>
		<div class="block-post-grid col-lg-4 col-md-4 col-sm-8 col-xs-16">
			<div class="post-thumbnail mb-10">
				<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('medium') ?></a>
			</div>
			<div class="post-title mt-5 mb-10">
				<h5><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
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