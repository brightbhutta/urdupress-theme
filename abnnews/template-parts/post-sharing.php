<?php 
global $xpanel;
$sharing_bar = $xpanel['social-sidebar'];
$sharing_bar_rounded = $xpanel['social-rounded'];
$sharing_bar_hover = $xpanel['social-hover'];
if($sharing_bar_rounded == 1) {
	$icon_styles = ' style="border-radius:10px; -moz-border-radius:10px; -webkit-border-radius:10px"';
}
else {
	$icon_styles = "";
}
?>
<div class="social-bar<?php echo ($xpanel['social-fixed-mobile'] == 1 ? " fixed" : "") ?>" id="social-bar">
	<ul>
		<li>
			<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink() ?>" target="_blank"<?php echo $icon_styles ?> id="fb">
				<i class="fa fa-facebook"></i> <span>فیس بک</span>
			</a>
		</li>
		<li>
			<a href="https://twitter.com/share?url=<?php echo the_permalink() ?>" target="_blank"<?php echo $icon_styles ?> id="tw">
				<i class="fa fa-twitter"></i> <span>ٹویٹر</span>
			</a>
		</li>
		<li>
			<a href="https://wa.me/?text=<?php echo the_permalink() ?>" target="_blank"<?php echo $icon_styles ?> id="wa">
				<i class="fa fa-whatsapp"></i> <span>واٹس ایپ</span>
			</a>
		</li>
	</ul>
	
</div>