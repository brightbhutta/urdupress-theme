<?php
/*
* In this file we will register all the stykes and scripts reuired in theme.
*/
function upress_register_scripts_styles() {
	global $xpanel;
	//jQuery
	wp_deregister_script( 'jquery');

	//jQuery
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.js');

	//Bootstrap CSS
	wp_enqueue_style( 'upress-bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.css' );

	wp_enqueue_style( 'upress-style', get_stylesheet_uri() );

	//Font Awesome CSS
	wp_enqueue_style( 'upress-font-awesome', get_template_directory_uri() . '/css/font-awesome/css/font-awesome.min.css' );

	//Urdu Fonts
	wp_enqueue_style( 'upress-urdu-fonts', get_template_directory_uri() . '/css/fonts.css' );

	//Animate.css
	wp_enqueue_style( 'upress-animate-css', get_template_directory_uri() . '/css/animate.css' );

	//Bootstrap JS
	wp_enqueue_script( 'upress-bootstrap-j', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js');

	wp_enqueue_script( 'upress-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	//Digital Clock
	wp_enqueue_script( 'upress-clock', get_template_directory_uri() . '/js/clock.js');

	//JS Browser Functions
	wp_enqueue_script( 'upress-js-browser', get_template_directory_uri() . '/js/jquery.browser.js', array(), '', false);

	//Urdu Writing Support
	wp_enqueue_script( 'upress-urdueditor', get_template_directory_uri() . '/js/urdueditor/jquery.UrduEditor.js');

	//Hijri Date Urdu
	wp_enqueue_script( 'upress-hijri-date', get_template_directory_uri() . '/js/hijricalendar.js');

	//News Ticker
	wp_enqueue_script( 'upress-news-ticker', get_template_directory_uri() . '/js/jquery.ticker.js');

	//Smooth Scroll
	wp_enqueue_script( 'upress-smooth-scroll', get_template_directory_uri() . '/js/smooth-scroll.js');

	//jQuery Mobile
	wp_enqueue_script( 'upress-jquery-mobile', get_template_directory_uri() . '/js/jquery.mobile.customized.min.js', array(), '', true);

	//jQuery Easing
	wp_enqueue_script( 'upress-jquery-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array(), '', true);

	//jQuery matchHeight
	wp_enqueue_script( 'upress-matchHeight', get_template_directory_uri() . '/js/jquery.matchHeight.js', array(), '', true);
	
	if(is_home() || is_front_page()){
		//Slider Core
		wp_enqueue_script( 'upress-home-slider', get_template_directory_uri() . '/js/camera.min.js', array(), '', true);
		//Slider.css
		wp_enqueue_style( 'upress-slider-css', get_template_directory_uri() . '/css/camera.css' );
	}

	//Custom jQuery Functions
	wp_enqueue_script( 'upress-misc-js', get_template_directory_uri() . '/js/misc.js', array(), '', true);
	if(function_exists('stylo_is_plugin_active')) {
        $license_key = get_option('stylo_license_key', '');
        if( stylothemes_is_valid_license($license_key) ) {
            wp_localize_script( 'upress-misc-js', 'stylo_license', array(
                'key_status'  => 'active',
            ));
        } else {
            wp_localize_script( 'upress-misc-js', 'stylo_license', array(
				'key_status'  => "inactive",
			));
        }
    }
	
    
}
add_action( 'wp_enqueue_scripts', 'upress_register_scripts_styles' );