<?php
/*
* Custom Widgets for UrduPress Theme
*/
add_action( 'widgets_init', 'column_block_posts_widget' );
 
function column_block_posts_widget() {
    register_widget( 'upress_column_block_widget' );
}
 
class upress_column_block_widget extends WP_Widget
{
 
    public function __construct()
    {
        $widget_details = array(
            'classname' => 'upress_column_block_widget',
            'description' => 'Modern Block For Displaying Posts from a Specific Category',
            'panels_groups' => array('urdupress')
        );
 
        parent::__construct( 'upress_column_block_widget', 'UPRESS - Column Block', $widget_details );
        
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_footer-widgets.php', array( $this, 'print_scripts' ), 9999 );
 
    }
    /**
	 * Enqueue scripts.
	 *
	 * @since 1.0
	 *
	 * @param string $hook_suffix
	 */
	public function enqueue_scripts( $hook_suffix ) {
		if ( 'widgets.php' !== $hook_suffix ) {
			return;
		}

		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script( 'underscore' );
	}

	/**
	 * Print scripts.
	 *
	 * @since 1.0
	 */
	public function print_scripts() {
		?>
		<script>
			( function( $ ){
				function initColorPicker( widget ) {
					widget.find( '.stylo-color-picker' ).wpColorPicker( {
						change: _.throttle( function() { // For Customizer
							$(this).trigger( 'change' );
						}, 3000 )
					});
				}

				function onFormUpdate( event, widget ) {
					initColorPicker( widget );
				}

				$( document ).on( 'widget-added widget-updated', onFormUpdate );

				$( document ).ready( function() {
					$( '#widgets-right .widget:has(.stylo-color-picker)' ).each( function () {
						initColorPicker( $( this ) );
					} );
				} );
			}( jQuery ) );
		</script>
		<?php
	}
    public function form( $instance ) {
        $title = '';
	    if( !empty( $instance['title'] ) ) {
	        $title = $instance['title'];
	    }
	    $bgcolor = '';
	    if( !empty( $instance['bgcolor'] ) ) {
	        $bgcolor = $instance['bgcolor'];
	    }
        $fncolor = '';
	    if( !empty( $instance['fncolor'] ) ) {
	        $fncolor = $instance['fncolor'];
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
	        <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Section Title:' ); ?></label>
	        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	    </p>
	    <p>
            <label for="<?php echo $this->get_field_id( 'bgcolor' ); ?>"><?php _e( 'Block Head Background Color:' ); ?></label><br>
            <input type="text" name="<?php echo $this->get_field_name( 'bgcolor' ); ?>" class="stylo-color-picker" id="<?php echo $this->get_field_id( 'bgcolor' ); ?>" value="<?php echo $bgcolor; ?>" data-default-color="#333" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'fncolor' ); ?>"><?php _e( 'Block Head Font Color:' ); ?></label><br>
            <input type="text" name="<?php echo $this->get_field_name( 'fncolor' ); ?>" class="stylo-color-picker" id="<?php echo $this->get_field_id( 'fncolor' ); ?>" value="<?php echo $fncolor; ?>" data-default-color="#FFF" />
        </p>
	    <p>
	        <label for="<?php echo $this->get_field_name( 'category' ); ?>"><?php _e( 'Posts Category:' ); ?></label>
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
	        <label for="<?php echo $this->get_field_name( 'limit' ); ?>"><?php _e( 'Number of Posts:' ); ?></label>
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
	    $title = '';
	    if( !empty( $instance['title'] ) ) {
	        $title = $instance['title'];
	    }
        $bgcolor = '';
	    if( !empty( $instance['bgcolor'] ) ) {
	        $bgcolor = $instance['bgcolor'];
	    }
        $fncolor = '';
	    if( !empty( $instance['fncolor'] ) ) {
	        $fncolor = $instance['fncolor'];
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
<div class="posts-blocks">
    <?php 
        $idObj = get_category_by_slug(''.$category.''); 
        $catid = $idObj->term_id;
        if( empty( $bgcolor ) ) {
            $bgcolor = '#333';
        }
        if( empty( $fncolor ) ) {
            $fncolor = '#FFF';
        } 
    ?>
    <div class="block-head row ml-0 mr-0" style="background:<?php echo $bgcolor; ?>">
        <h2 style="color:<?php echo $fncolor; ?>"><?php echo $title ?></h2>
        <span class="section-more-btn">
            <a href="<?php echo esc_url( get_category_link( $catid ) ); ?>">
                <span class="more-link">
                        <?php _e(" مزید پڑھیں ") ?>
                </span>
                <span class="more-icon">
                    <i class="fa fa-chevron-left"></i>
                </span>
            </a>
        </span>
    </div>
    <div class="block-body column-block">
    <?php
    // The Query
    $i = 1;
    $args = array(
        'cat' => $catid,
        'posts_per_page' => $limit,
    );
    $posts_query = new WP_Query( $args );

    // The Loop
    if ( $posts_query->have_posts() ) {
        while ( $posts_query->have_posts() ) {
            $posts_query->the_post(); ?>
            <?php if($i < 2) { ?>
            <div class="mb-10 col-lg-16 col-md-16 col-sm-16 col-xs-16 pr-0 pl-5">
                <div class="post-content">
                    <div class="block-post-row block-post-thumbnail">
                        <a href="<?php the_permalink() ?>">
                        <?php
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail('postblock-large');
                            }
                            else {
                                echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/nothumb.png" />';
                            }
                        ?>
                        </a>
                    </div>
                    <div class="block-post-row block-post-heading-row">
                        <h3>
                            <a href="<?php the_permalink() ?>">
                                <?php
                                    $trimtitle = get_the_title(); 
                                    $shorttitle = wp_trim_words( $trimtitle, $num_words = 12, $more = '… ' ); 
                                    echo $shorttitle;
                                ?>
                            </a>
                        </h3>
                    </div>

                </div>
            </div>
            <?php } else { ?>

            <div class="pb-5 mb-10 block-post-smallrow noborder pull-right col-lg-8 col-md-8 col-sm-16 col-xs-16 pl-0 pr-0">
                <div class="post-content">
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 pull-right pr-0">
                        <a href="<?php the_permalink() ?>">

                        <?php
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail('postblock-small');
                            }
                            else {
                                echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/nothumb.png" />';
                            }
                        ?>

                        </a>
                    </div>
                    <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pr-0">
                        <h5>
                            <a href="<?php the_permalink() ?>">
                                <?php
                                    $trimtitle = get_the_title(); 
                                    $shorttitle = wp_trim_words( $trimtitle, $num_words = 12, $more = '… ' ); 
                                    echo $shorttitle;
                                ?>
                            </a>
                        </h5>

                    </div>
                </div>
            </div>
            <?php } ?>
        <?php
        $i++; }
    } else {
        // no posts found
    }
    /* Restore original Post Data */
    wp_reset_postdata();

    ?>
    </div>
</div>
<?php }
 
}