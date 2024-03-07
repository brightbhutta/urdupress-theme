<?php
/*
* Homepage Slider Settings
*/
global $xpanel;
if(isset($xpanel['slider-hover']) && $xpanel['slider-hover'] == TRUE) {
	$pause_on_hover = 'true';
}
else {
	$pause_on_hover = 'false';
}
?>
<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery('.home-slider .main-slider').camera({ 
        height: '50%',
        pagination: false,
        thumbnails: true,
        overlayer: true,
        fx: '<?php echo $xpanel['slider-animation'] ?>',
        hover: <?php echo $pause_on_hover ?>,
        time: <?php echo $xpanel['slider-speed'] ?>
    });
});
</script>