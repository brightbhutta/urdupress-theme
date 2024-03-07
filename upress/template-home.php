<?php
/**
 * The template for displaying all pages.
 * Template Name: Homepage
 *
 * @package UrduPress
 */
global $xpanel;
$main_sidebar = rwmb_meta( 'upress_main_sidebar',  get_the_ID() );
$main_sidebar_position = rwmb_meta( 'upress_main_sidebar_postion',  get_the_ID() );
$mini_sidebar = rwmb_meta( 'upress_mini_sidebar',  get_the_ID() );
$mini_sidebar_position = rwmb_meta( 'upress_mini_sidebar_postion',  get_the_ID() );

if(isset($main_sidebar_position) && ($main_sidebar_position == 2) && isset($mini_sidebar_position) && ($mini_sidebar_position == 2)) {
    $padding_class = "pl-0";
}
elseif( isset($main_sidebar_position) && ($main_sidebar_position == 2) ) {
    $padding_class = "pr-0";
}
elseif( isset($mini_sidebar_position) && ($mini_sidebar_position == 2)) {
    $padding_class = "pl-0";
} elseif ( isset($main_sidebar_position) && ($main_sidebar_position == 1) && isset($mini_sidebar_position) && ($mini_sidebar_position == 1)) {
    $padding_class = "pr-0";
} else {
    $padding_class = "";
}
if(!($main_sidebar) && !($mini_sidebar)) {
	$padding_class = "pl-0 pr-0";
}
if(isset($main_sidebar) && ($main_sidebar == TRUE) && isset($mini_sidebar) && ($mini_sidebar == TRUE)) {
    $block_class = "col-lg-8 col-md-8 col-sm-10 col-xs-16";
}
elseif(isset($main_sidebar) && ($main_sidebar == TRUE) && isset($mini_sidebar) && ($mini_sidebar == FALSE)) {
    $block_class = "col-lg-11 col-md-11 col-sm-10 col-xs-16";
}
elseif(isset($main_sidebar) && ($main_sidebar == FALSE) && isset($mini_sidebar) && ($mini_sidebar == TRUE)) {
    $block_class = "col-lg-13 col-md-13 col-sm-16 col-xs-16";
}
elseif(isset($main_sidebar) && ($main_sidebar == FALSE) && isset($mini_sidebar) && ($mini_sidebar == FALSE)) {
    $block_class = "col-lg-16 col-md-16 col-sm-16 col-xs-16";
} 
if(isset($xpanel['main-sidebar-mobile']) && $xpanel['main-sidebar-mobile'] == TRUE) {
    $sidebarMobileClass = "col-xs-16";
}
else {
    $sidebarMobileClass = "hidden-xs";
}
if(isset($xpanel['mini-sidebar-mobile']) && $xpanel['mini-sidebar-mobile'] == TRUE) {
    $sidebarMiniMobileClass = "col-xs-16";
}
else {
    $sidebarMiniMobileClass = "hidden-xs";
}
get_header(); ?>

	<div id="primary" class="content-area">
	    <?php if(isset($main_sidebar) && ($main_sidebar == TRUE) && isset($main_sidebar_position) && ($main_sidebar_position == 1)) { ?>
		<div class="main-sidebar pl-0 col-lg-5 col-md-5 col-sm-6 hidden-xs">
			<?php dynamic_sidebar('home-sidebar'); ?>
		</div>
		<?php } ?>
		<?php if(isset($mini_sidebar) && ($mini_sidebar == TRUE) && isset($mini_sidebar_position) && ($mini_sidebar_position == 1)) { ?>
		<div class="mini-sidebar col-lg-3 col-md-3 hidden-sm hidden-xs">
			<?php dynamic_sidebar('sidebar-mini'); ?>
		</div>
		<?php } ?>
		<div id="main" class="home-blocks <?php echo $block_class." ".$padding_class ?> " role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'home' ); ?>

			<?php endwhile; // End of the loop. ?>

		</div><!-- #main -->
		<?php if(isset($mini_sidebar) && ($mini_sidebar == TRUE) && isset($mini_sidebar_position) && ($mini_sidebar_position == 2)) { ?>
		<div class="mini-sidebar col-lg-3 col-md-3 hidden-sm hidden-xs">
			<?php dynamic_sidebar('sidebar-mini'); ?>
		</div>
		<?php } ?>
		<?php if(isset($main_sidebar) && ($main_sidebar == TRUE) && isset($main_sidebar_position) && ($main_sidebar_position == 2)) { ?>
		<div class="main-sidebar pr-0 col-lg-5 col-md-5 col-sm-6 hidden-xs">
			<?php dynamic_sidebar('home-sidebar'); ?>
		</div>
		<?php } ?>
		<div class="main-sidebar pr-0 pl-0 hidden-lg hidden-md hidden-sm <?php echo $sidebarMiniMobileClass ?>">
			<?php dynamic_sidebar('home-sidebar'); ?>
		</div>
		<div class="main-sidebar pr-0 pl-0 hidden-lg hidden-md hidden-sm <?php echo $sidebarMobileClass ?>">
			<?php dynamic_sidebar('sidebar-mini'); ?>
		</div>
		
	</div><!-- #primary -->


<?php get_footer(); ?>
