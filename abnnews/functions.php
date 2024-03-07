<?php
/**
 * Urdu News functions and definitions
 *
 * @package Urdu News
 */

if ( ! function_exists( 'upress_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function upress_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Urdu News, use a find and replace
	 * to change 'unews' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'unews', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'thumbnail-widget', 340, 220, array( 'center', 'center' ) );

	add_image_size( 'postblock-large', 360, 210, array( 'center', 'center' ) );

	add_image_size( 'postblock-small', 120, 120, array( 'center', 'center' ) );

	add_image_size( 'postblock-grid', 360, 280, array( 'center', 'center' ) );

	add_image_size( 'post-head', 1200, 630);
    
    add_image_size( 'post-head-large', 1200, 630);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'unews' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'upress_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	//HTML5 Search Form
	add_theme_support( 'html5', array( 'search-form' ) );

	
}
endif; // upress_setup
add_action( 'after_setup_theme', 'upress_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function upress_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'upress_content_width', 640 );
}
add_action( 'after_setup_theme', 'upress_content_width', 0 );

function register_product(){
	//Register Product
	$site_url = site_url();
	$admin_email = get_bloginfo('admin_email');
	$theme = "UrduPress";
	$url = 'https://www.stylothemes.xyz/add_activation.php?&website='.$site_url.'&theme='.$theme.'&email='.$admin_email;
	//echo $url;
	$client = curl_init($url);
	curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
	curl_exec($client);
}
add_action( 'after_switch_theme', 'register_product' );
/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function upress_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Default Sidebar', 'unews' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
    register_sidebar( array(
		'name'          => esc_html__( 'Homepage Sidebar', 'unews' ),
		'id'            => 'home-sidebar',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Homepage Mini Sidebar', 'unews' ),
		'id'            => 'sidebar-mini',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Mini Sidebar (Single Post)', 'unews' ),
		'id'            => 'sidebar-mini-single',
		'description'   => 'Small right side sidebar for single post view',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 1', 'unews' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 2', 'unews' ),
		'id'            => 'footer-2',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 3', 'unews' ),
		'id'            => 'footer-3',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'AD - Header', 'unews' ),
		'id'            => 'header-ad',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="advert-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'AD - Above Post Content', 'unews' ),
		'id'            => 'above-post-ad',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="advert-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'AD - Below Post Content', 'unews' ),
		'id'            => 'below-post-ad',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="advert-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
}
add_action( 'widgets_init', 'upress_widgets_init' );

//Page Builder Widgets Group
function urdupress_add_widget_tabs($tabs) {
    $tabs[] = array(
        'title' => __('UrduPress Widgets', 'urdupress'),
        'filter' => array(
            'groups' => array('urdupress')
        )
    );

    return $tabs;
}
add_filter('siteorigin_panels_widget_dialog_tabs', 'urdupress_add_widget_tabs', 20);


function wpdocs_custom_excerpt_length( $length ) {
    return 40;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
	return ' <a class="read-more" href="' . get_permalink( get_the_ID() ) . '">' . __( 'مزید پڑھیں', 'unews' ) . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

/************************************************************************
* Search Results Modification
*************************************************************************/
function custom_search_filter($query) {
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }

    return $query;
}

add_filter('pre_get_posts','custom_search_filter');

/************************************************************************
* Import Demo Data
*************************************************************************/
if(function_exists('stylo_is_plugin_active')) {
	$license_key = get_option('stylo_license_key', '');
    if( stylothemes_is_valid_license($license_key) ) {
		function ocdi_import_files() {
			return array(
				array(
					'import_file_name'             => 'Demo Import 1',
					'local_import_file'            => trailingslashit( get_template_directory() ) . 'layouts/demo/content.xml',
					'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'layouts/demo/widgets.json',
					'import_preview_image_url'     => trailingslashit( get_template_directory() ) . 'layouts/demo/screen-image.jpg',
					'local_import_redux'           => array(
						array(
							'file_path'   => trailingslashit( get_template_directory() ) . 'layouts/redux.json',
							'option_name' => 'xpanel',
						),
					),
					'import_notice'                => __( 'After you import this demo, you will have to setup the Homepage separately via <strong>Appearance>Theme Settings</strong> OR <strong>Appearance>Customize</strong>.', 'upaper' ),
				)
			);
		}
		add_filter( 'pt-ocdi/import_files', 'ocdi_import_files' );
	}
}

/************************************************************************
* Extended Example:
* Way to set menu and set home page.
*************************************************************************/
function ocdi_after_import_setup() {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Top Nav', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
            'primary' => $main_menu->term_id,
        )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home - v1' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'ocdi_after_import_setup' );

/**
 * Hides the custom post template for pages on WordPress 4.6 and older
 *
 * @param array $post_templates Array of page templates. Keys are filenames, values are translated names.
 * @return array Filtered array of page templates.
 */
function makewp_exclude_page_templates( $post_templates ) {
    if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
        unset( $post_templates['template-post_ufull.php'] );
    }
 
    return $post_templates;
}
 
add_filter( 'theme_page_templates', 'makewp_exclude_page_templates' );
/**
 * Remove empty paragraphs created by wpautop()
 * @author Ryan Hamilton
 * @link https://gist.github.com/Fantikerz/5557617
 */
function remove_empty_p( $content ) {
    $content = force_balance_tags( $content );
    $content = preg_replace( '#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content );
    $content = preg_replace( '~\s?<p>(\s|&nbsp;)+</p>\s?~', '', $content );
    return $content;
}
add_filter('the_content', 'remove_empty_p', 20, 1);

/**
 * Remove Redux Ads
 */
function removeDemoMod() { // Be sure to rename this function to something more unique
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
    }
}
add_action('init', 'removeDemoMod');

add_action( 'admin_menu', 'remove_redux_menu',12 );
function remove_redux_menu() {
    remove_submenu_page('tools.php','redux-about');
}

if ( ! function_exists( 'redux_disable_dev_mode_plugin' ) ) {
    function redux_disable_dev_mode_plugin( $redux ) {
        if ( $redux->args['opt_name'] != 'redux_demo' ) {
            $redux->args['dev_mode'] = false;
            $redux->args['forced_dev_mode_off'] = false;
        }
    }
    add_action( 'redux/construct', 'redux_disable_dev_mode_plugin' );
}

/**
 * Register Scripts & Styles.
 */
require get_template_directory() . '/inc/register-scripts.php';
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/urdu-date.php';

/** Include the TGM_Plugin_Activation class. */
require_once dirname( __FILE__ ) . '/inc/class-tgm-plugin-activation.php';

/* Install Required Plugins*/
include_once('inc/install-plugins.php');

/* Include MetaBox */
require get_template_directory() . '/inc/plugins/meta-box/meta-box.php';
require get_template_directory() . '/inc/metabox.php';

/**
 * Load Custom Widgets.
 */
require get_template_directory() . '/inc/widgets.php';
/**
 * Load Theme Admin Panel.
 */
if(function_exists('stylo_is_plugin_active')) {
	$license_key = get_option('stylo_license_key', '');
    if( stylothemes_is_valid_license($license_key) ) {
		require get_template_directory() . '/admin/options-init.php';
	} else {
		function stylo_admin_notice__error() {
			?>
			<div class="notice notice-warning">
				<p><?php _e( 'Your License Key is not Active! Some Theme Features May not Work <a href="admin.php?page=stylo-settings">Actiavte License Now</a>', 'upaper' ); ?></p>
			</div>
			<?php
		}
		add_action( 'admin_notices', 'stylo_admin_notice__error' );
	}
}