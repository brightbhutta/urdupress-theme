<?php
/**
 * Urdu News Theme Header File.
 * Template Name: Theme Header
 * @package UrduPress
 */
global $xpanel;
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
if(is_single()) {
?>
<meta property="og:title" content="<?php the_title() ?>"/>
<meta property="og:url" content="<?php the_permalink() ?>"/>
<meta property="og:site_name" content="<?php bloginfo('name') ?>"/>
<?php 
if( has_post_thumbnail() ) {
$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); 
?>
<meta property="og:image" content="<?php echo $image[0] ?>"/>
<?php } }?>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

<?php get_template_part( 'inc/color', 'scheme' ); ?>

<script type="text/javascript">
$(document).ready(function(){
  $('#breakingNews').ticker();
});
</script>
<?php 
	if(isset($xpanel['preloader']) && $xpanel['preloader'] == 1) {
?>
<!-- Preloader -->
<script type="text/javascript">
	//<![CDATA[
		jQuery(window).load(function() { // makes sure the whole site is loaded
			jQuery('#loader').fadeOut(); // will first fade out the loading animation
			jQuery('#loader-wrapper').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
			jQuery('body').delay(350).css({'overflow':'visible'});
		})
	//]]>
function close_preloader () {
	jQuery('#loader-wrapper').delay(350).fadeOut('slow');
	jQuery('body').delay(350).css({'overflow':'visible'});
}
</script>
<?php } else { ?>
<style type="text/css" media="screen">
body{
	overflow: visible;
}	
</style>
<?php } ?>
</head>

<body <?php body_class(); ?>>
<?php 
	if(isset($xpanel['preloader']) && $xpanel['preloader'] == 1) {
?>
<div id="loader-wrapper">
    <div id="loader">
	</div>
	<div id="loader-message">
	<h2 class="text-center"><?php echo $xpanel['preloader-msg'] ?></h2> 
	</div>
	<a href="javascript:" onclick="close_preloader();" id="close-loader"><i class="fa fa-times-circle fa-3x"></i></a>
</div>
<?php } ?>
<div id="page" class="site<?php echo ($xpanel['website-container'] == "boxed" ? " boxed container": " full-width") ?>">
	<header id="masthead" class="header row ml-0 mr-0" role="banner">
		<div class="header-normal">
			<?php
			if(isset($xpanel['header-layout']) && ($xpanel['header-layout'] == 2)) {
				get_template_part( 'layouts/normal', 'headerv2' );
			} elseif(isset($xpanel['header-layout']) && ($xpanel['header-layout'] == 3)) {
				get_template_part( 'layouts/normal', 'headerv3' );
			} elseif(isset($xpanel['header-layout']) && ($xpanel['header-layout'] == 4)) {
				get_template_part( 'layouts/normal', 'headerv4' );
			} else {
				get_template_part( 'layouts/normal', 'header' );
			}
			?>
		</div>
		<div class="header-mobile">
		    <?php get_template_part( 'layouts/mobile', 'header' ); ?>
		</div>
		
	</header><!-- #masthead -->
	<?php stylo_activation_notice() ?>
	<div id="content" class="container-fluid">
