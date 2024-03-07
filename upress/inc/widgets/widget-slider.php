<?php
/*
* Custom Widgets for UrduPress Theme
*/
add_action( 'widgets_init', 'slider_posts_widget' );
 
function slider_posts_widget() {
    register_widget( 'upress_slider_widget' );
}
 
class upress_slider_widget extends WP_Widget
{
 
    public function __construct()
    {
        $widget_details = array(
            'classname' => 'upress_slider_widget',
            'description' => 'Posts with Thumbnail from a specific category',
            'panels_groups' => array('urdupress')
        );
 
        parent::__construct( 'upress_slider_widget', 'UPRESS - Slider', $widget_details );
 
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
	        <label for="<?php echo $this->get_field_name( 'category' ); ?>"><?php _e( 'Slider Category:' ); ?></label>
	        <br />
	        <select name="<?php echo $this->get_field_name( 'category' ); ?>" id="<?php echo $this->get_field_id( 'category' ); ?>">
	        <?php 
	        	$def_category = $instance['category'];
	        	if(isset($def_category) && $def_category != "") { ?>
	        	<option value="<?php echo $def_category ?>"><?php echo $def_category ?></option>
	        	<?php } ?>
		    <?php
		    $categories = get_categories( array( 'child_of' => 0 )); 
		    foreach ( $categories as $category ) { 
		        printf( '<option value="'.$category->category_nicename.'">'.$category->cat_name.'</option>');
		    }
	        ?>
			</select>
	    </p>
	    <p>
	        <label for="<?php echo $this->get_field_name( 'limit' ); ?>"><?php _e( 'Number of Slides:' ); ?></label>
	        <br />
	        <input name="<?php echo $this->get_field_name( 'limit' ); ?>" id="<?php echo $this->get_field_id( 'limit' ); ?>" type="number" value="<?php echo esc_attr( $limit ); ?>">
	    </p>
	 
	    <div class='mfc-text'>
	         
	    </div>
	 
	    <?php
    }
 
    public function update( $new_instance, $old_instance ) {  
        return $new_instance;
    }
 
    public function widget( $args, $instance ) { 
        
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
    <div class="home-slider mb-20">
        <div id="mainSlider" class="main-slider">
            <?php
                $idObj = get_category_by_slug(''.$category.''); 
                $catid = $idObj->term_id;
                // WP_Query arguments
                $qargs = array (
                    'cat' => $catid,
                    'posts_per_page' => $limit,
                );

                // The Query
                $query = new WP_Query( $qargs );

                // The Loop
                if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) { 
                        $query->the_post(); 
                        $thumb_id = get_post_thumbnail_id();
                        $full_thumb_url_array = wp_get_attachment_image_src($thumb_id, 'post-head', true);
                        $full_thumb_url = $full_thumb_url_array[0];
                        $small_thumb_url_array = wp_get_attachment_image_src($thumb_id, 'postblock-small', true);
                        $small_thumb_url = $small_thumb_url_array[0];
                        ?>

                        <div data-src="<?php echo $full_thumb_url ?>" data-thumb="<?php echo $small_thumb_url ?>" data-link="<?php echo get_the_permalink(); ?>">
                            <div class="camera_caption moveFromLeft"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></div>
                        </div>

                    <?php }
                } else {
                    // no posts found
                }

                // Restore original Post Data
                wp_reset_postdata();
                ?>
        </div>
    </div>
<?php }
 
}