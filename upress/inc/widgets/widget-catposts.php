<?php
/*
* Custom Widgets for UrduPress Theme
*/
add_action( 'widgets_init', 'category_posts_widget' );
 
function category_posts_widget() {
    register_widget( 'upress_posts_widget' );
}
 
class upress_posts_widget extends WP_Widget
{
 
    public function __construct()
    {
        $widget_details = array(
            'classname' => 'upress_posts_widget',
            'description' => 'Posts with Thumbnail from a specific category'
        );
 
        parent::__construct( 'upress_posts_widget', 'UPRESS - Category Posts', $widget_details );
 
    }
 
    public function form( $instance ) {
        $title = '';
	    if( !empty( $instance['title'] ) ) {
	        $title = $instance['title'];
	    }
	 
	    $category = '';
	    if( !empty( $instance['category'] ) ) {
	        $category = $instance['category'];
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
	        <label for="<?php echo $this->get_field_name( 'category' ); ?>"><?php _e( 'Select Category:' ); ?></label>
	        <br />

			<?php 
			$cat_args = array(
				'show_option_all'    => 'Select Category',
				'show_option_none'   => '',
				'option_none_value'  => '-1',
				'orderby'            => 'ID',
				'order'              => 'ASC',
				'show_count'         => 0,
				'hide_empty'         => 0,
				'child_of'           => 0,
				'selected'           => $category,
				'hierarchical'       => 0,
				'name'               => ''.$this->get_field_name( 'category' ).'',
				'depth'              => 0,
				'taxonomy'           => 'category',
				'hide_if_empty'      => false,
				'value_field'	     => 'term_id',
			); 
			wp_dropdown_categories( $cat_args); 
			
			?>
	    </p>
	    <p>
	        <label for="<?php echo $this->get_field_name( 'limit' ); ?>"><?php _e( 'Enter Limit:' ); ?></label>
	        <br />
	        <input name="<?php echo $this->get_field_name( 'limit' ); ?>" id="<?php echo $this->get_field_id( 'limit' ); ?>" type="number" value="<?php echo esc_attr( $limit ); ?>">
	    </p>
	    <p>
	    	<label for="<?php echo $this->get_field_name( 'thumbsize' ); ?>"><?php _e( 'Thumbnail Size:' ); ?></label>
	    	<br />
	        <select name="<?php echo $this->get_field_name( 'thumbsize' ); ?>" id="<?php echo $this->get_field_id( 'thumbsize' ); ?>">
	        	<?php 
	        	$thmbsize = $instance['thumbsize'];
	        	if($thmbsize == 1) { ?>
	        	<option value="1">Full Width</option>
	        	<?php } ?>
	        	<option value="0">Small</option>
	        	<option value="1">Full Width</option>
	        </select>
	    </p>
	 
	    <div class='mfc-text'>
	         
	    </div>
	 
	    <?php
	 
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
	    $thmbsize = '0';
	    if( !empty( $instance['thumbsize'] ) ) {
	        $thmbsize = $instance['thumbsize'];
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
					'cat' => $category,
					'posts_per_page' => $limit
				);
				$posts_query = new WP_Query( $args );

				// The Loop
				if ( $posts_query->have_posts() ) {
				while ( $posts_query->have_posts() ) {
				$posts_query->the_post(); ?>
					<?php 
					if($thmbsize == 0) {
					?>
					<div class="upress-widget-post-row">
						<div class="upress-post-title col-lg-12 col-md-12 col-sm-10 col-xs-10">
							<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
						</div>
						<div class="upress-post-thumb col-lg-4 col-md-4 col-sm-6 col-xs-6 pr-0 mb-10">
							<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
						</div>
					</div>
					<?php } else { ?>
					<div class="upress-post-thumb col-lg-16 col-md-16 col-sm-16 col-xs-16 mb-10">
						<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('thumbnail-widget'); ?></a>
					</div>
					<div class="upress-post-title col-lg-16 col-md-16 col-sm-16 col-xs-16 mt-5">
						<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
					</div>
					<?php } ?>
				<?php
				} } else {
					echo "no posts found";
				} ?>
	    	</div>
			
		</div>
<?php }
 
}