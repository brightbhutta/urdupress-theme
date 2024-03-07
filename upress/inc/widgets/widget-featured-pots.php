<?php
/*
* Custom Widget for UrduPress Theme
*/
add_action( 'widgets_init', 'featured_posts_widget' );
 
function featured_posts_widget() {
    register_widget( 'upress_featured_posts_widget' );
}
 
class upress_featured_posts_widget extends WP_Widget
{
 
    public function __construct()
    {
        $widget_details = array(
            'classname' => 'upress_featured_posts_widget',
            'description' => 'Posts with Thumbnail That Have Higher Views Count'
        );
 
        parent::__construct( 'upress_featured_posts_widget', 'UPRESS - Popular Posts', $widget_details );
 
    }
 
    public function form( $instance ) {
        $title = '';
	    if( !empty( $instance['title'] ) ) {
	        $title = $instance['title'];
	    }
	    $limit = '';
	    if( !empty( $instance['limit'] ) ) {
	        $limit = $instance['limit'];
	    }
	 
	    ?>
	 
	    <p>
	        <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
	        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	    </p>
	    <p>
	        <label for="<?php echo $this->get_field_name( 'limit' ); ?>"><?php _e( 'Enter Limit:' ); ?></label>
	        <br />
	        <input name="<?php echo $this->get_field_name( 'limit' ); ?>" id="<?php echo $this->get_field_id( 'limit' ); ?>" type="number" value="<?php echo esc_attr( $limit ); ?>">
	    </p>
	 
	    <div class='mfc-text'>
	         
	    </div>
	 
	    <?php
	 
	    //echo $args['after_widget'];
        // Backend Form
    }
 
    public function update( $new_instance, $old_instance ) {  
        return $new_instance;
    }
 
    public function widget( $args, $instance ) { 
    	$title = '';
	    if( !empty( $instance['title'] ) ) {
	        $title = $instance['title'];
	    }
	 
	    $category = '0';
	    if( !empty( $instance['category'] ) ) {
	        $category = $instance['category'];
	    }
	    $limit = 5;
	    if( !empty( $instance['limit'] ) ) {
	        
	        if (is_numeric($instance['limit']) && $instance['limit'] <=15) {

		        $limit = $instance['limit'];

			} else {
			    $limit = 5;
			}
	        
	    }
    ?>
    	<div id="upress-<?php echo $this->id ?>" class="widget upress-cat-posts">
	    	<h3 class="widget-title"><?php echo esc_attr( $title ); ?></h3>
	    	<div class="widget-content">
	    		<?php
				// The Query
				$args = array(
					'post_type'	=> array('post'),
					'orderby' => 'meta_value_num',
    				'meta_key' => 'post_views_count',
					'posts_per_page' => $limit
				);
				$posts_query = new WP_Query( $args );

				// The Loop
				if ( $posts_query->have_posts() ) {
				while ( $posts_query->have_posts() ) {
				$posts_query->the_post(); ?>
					
					<div class="upress-post-thumb">
						<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('thumbnail-widget'); ?></a>
					</div>
					<div class="upress-post-title">
						<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
					</div>
			
				<?php
				} } else {
					echo "no posts found";
				} ?>
	    	</div>
			
		</div>
<?php }
 
}