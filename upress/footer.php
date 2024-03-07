<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Urdu News
 */
global $wp;
global $xpanel;

$totop = $xpanel['totop'];
$preloader = $xpanel['preloader'];
$widget_class = 'widget-col-3';
$widget_cols = 'col-lg-16 col-md-16 col-sm-16 co-xs-16';

if(isset($xpanel['footer-about-display']) && $xpanel['footer-about-display'] == TRUE) {
	$widget_cols = 'col-lg-10 col-md-10 col-sm-8 co-xs-16';
}
elseif(isset($xpanel['footer-about-display']) && $xpanel['footer-about-display'] == FALSE) {
	$widget_cols = 'col-lg-16 col-md-16 col-sm-16 co-xs-16';
}
if(isset($xpanel['footer-widget-count']) && $xpanel['footer-widget-count'] == 3) {
	$widget_class = 'widget-col-3';
}
elseif(isset($xpanel['footer-widget-count']) && $xpanel['footer-widget-count'] == 2) {
	$widget_class = 'widget-col-2';
}
elseif(isset($xpanel['footer-widget-count']) && $xpanel['footer-widget-count'] == 1) {
	$widget_class = 'widget-col-1';
}
?>

	</div><!-- #content -->
<footer id="footer" class="footer-main">
	<div class="container-fluid">
	<div class="footer-widgets row ml-0 mr-0" style="clear: both">
		<div class="widget-cols <?php echo $widget_cols ?>">
		<div class="<?php echo $widget_class ?>">
			<?php dynamic_sidebar('footer-3') ?>
		</div><!--#Footer Widget 1 -->
			<?php 
			if(isset($xpanel['footer-widget-count']) && $xpanel['footer-widget-count'] > 1) {
			?>
			<div class="<?php echo $widget_class ?>">
				<?php dynamic_sidebar('footer-2') ?>
			</div><!--#Footer Widget 2 -->
			<?php } ?>
			<?php 
			if(isset($xpanel['footer-widget-count']) && $xpanel['footer-widget-count'] > 2) {
			?>
			<div class="<?php echo $widget_class ?>">
				<?php dynamic_sidebar('footer-1') ?>
			</div><!--#Footer Widget 3 -->
			<?php } ?>
		</div>
		<?php 
		if(isset($xpanel['footer-about-display']) && $xpanel['footer-about-display'] == TRUE) {
		?>
		<div class="col-lg-6 col-md-6 col-sm-8 co-xs-16">
			<div id="widget-about" class="footer-widget">
			<p><img src="<?php echo $xpanel['footer-logo']['url'] ?>"></p>
			<p><?php echo $xpanel['footer-about-text'] ?></p>
			</div>
		</div><!--#Footer Widget 4 -->
		<?php } ?>
	</div><!--#Footer Widgets -->
	</div><!-- .Footer Container-->
	<?php 
	if(isset($xpanel['footer-copyright-display']) && $xpanel['footer-copyright-display'] == TRUE) {
	?>
	<div class="row footer-row pt-5 pb-5">
		<div class="container-fluid">
			<div class="col-lg-10 col-md-10 col-sm-11 col-xs-16">
				<div class="footer-copyrights">
					<p><?php echo $xpanel['footer-copyright'] ?></p>
				</div><!--#Footer Copyright Info -->
			</div>
			<div class="col-lg-6 col-md-6 col-sm-5 col-xs-16">
				<div class="footer-socil-icons">
					<ul>
						<?php if(isset($xpanel['fb-url']) && $xpanel['fb-url'] != "") { ?>
						<li><a href="<?php echo $xpanel['fb-url'] ?>" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
						<?php } ?>
						<?php if(isset($xpanel['twitter-url']) && $xpanel['twitter-url'] != "") { ?>
						<li><a href="<?php echo $xpanel['twitter-url'] ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
						<?php } ?>
						<?php if(isset($xpanel['instagram-url']) && $xpanel['instagram-url'] != "") { ?>
						<li><a href="<?php echo $xpanel['instagram-url'] ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
						<?php } ?>
						<?php if(isset($xpanel['youtube-url']) && $xpanel['youtube-url'] != "") { ?>
						<li><a href="<?php echo $xpanel['youtube-url'] ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
						<?php } ?>
						<?php if(isset($xpanel['pinterest-url']) && $xpanel['pinterest-url'] != "") { ?>
						<li><a href="<?php echo $xpanel['pinterest-url'] ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
						<?php } ?>
						<?php if(isset($xpanel['linkedin-url']) && $xpanel['linkedin-url'] != "") { ?>
						<li><a href="<?php echo $xpanel['linkedin-url'] ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
						<?php } ?>
						<?php if(isset($xpanel['reddit-url']) && $xpanel['reddit-url'] != "") { ?>
						<li><a href="<?php echo $xpanel['reddit-url'] ?>" target="_blank"><i class="fa fa-reddit"></i></a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
</footer><!-- #footer -->
	
</div><!-- #page -->
<script>
    smoothScroll.init({updateURL: false});
</script>
<?php get_template_part('inc/footer', 'scripts'); ?>

<?php wp_footer(); ?>
<?php 
	
	if(is_home() || is_front_page()) {
		get_template_part( 'inc/slider', 'settings' );
	}
?>
</body>
</html>
