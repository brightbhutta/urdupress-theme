<?php
    global $xpanel;
	if(isset($xpanel['stickynav']) && $xpanel['stickynav'] == 1) {
?>
<script>
(function($) {
        
	$(window).scroll(function(){
        if ($(this).scrollTop() > 400) {
            $('#main-nav').addClass("sticknav animated fadeIn");
        } else {
            $('#main-nav').removeClass("sticknav animated fadeIn");
        }
    });
       
})(jQuery);
</script>
<?php } ?>
<?php 
	if(isset($xpanel['totop']) && $xpanel['totop'] == 1) {
?>
<script>
(function($) {
        
	$(window).scroll(function(){
        if ($(this).scrollTop() > 200) {
            $('#scrollup').fadeIn(300);
        } else {
            $('#scrollup').fadeOut(300);
        }
    });
       
})(jQuery);
</script>
<?php } ?>

<?php if($xpanel['totop'] == 1) {?>
<a data-scroll href="#masthead" id="scrollup"><i class="fa fa-chevron-up"></i></a>
<?php } ?>
<script type="text/javascript">
	var ww = document.body.clientWidth;

	$(document).ready(function() {
	    $(".menu li a").each(function() {
	        if ($(this).next().length > 0) {
	            $(this).addClass("parent");
	        };
	    })
	    adjustMenu();
	})

	$(window).bind('resize orientationchange', function() {
	    ww = document.body.clientWidth;
	    adjustMenu();
	});

	var adjustMenu = function() {
	    if (ww < 768) {
	        $(".menu li").unbind('mouseenter mouseleave');
	        $(".menu li a.parent").unbind('click').bind('click', function(e) {
	            // must be attached to anchor element to prevent bubbling
	            e.preventDefault();
	            $(this).parent("li").toggleClass("hover");
	        });
	    } else if (ww >= 768) {
	        $(".menu").show();
	        $(".menu li").removeClass("hover");
	        $(".menu li a").unbind('click');
	        $(".menu li").unbind('mouseenter mouseleave').bind('mouseenter mouseleave', function() {
	            // must be attached to li so that mouseleave is not triggered when hover over submenu
	            $(this).toggleClass('hover');
	        });
	    }
	}
</script>