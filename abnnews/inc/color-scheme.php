<?php 
/*
* Color Scheme Settinga
*/
global $xpanel;
?>
<style type="text/css">
<?php if(isset($xpanel['nav-bg-color']) && $xpanel['nav-bg-color'] != '') { ?>
	.main-menu {
		background: <?php echo $xpanel['nav-bg-color'] ?>;
	}
<?php } ?>
<?php if(isset($xpanel['nav-links-color']) && $xpanel['nav-links-color'] != '') { ?>
	.main-menu li a{
		color: <?php echo $xpanel['nav-links-color'] ?>;
	}
<?php } ?>
<?php if(isset($xpanel['nav-links-hover-color']) && $xpanel['nav-links-hover-color'] != '') { ?>
	.main-menu li a:hover{
		color: <?php echo $xpanel['nav-links-hover-color'] ?>;
	}
<?php } ?>
<?php if(isset($xpanel['subnav-links-color']) && $xpanel['subnav-links-color'] != '') { ?>
	.main-menu .sub-menu li a{
		color: <?php echo $xpanel['subnav-links-color'] ?>;
	}
<?php } ?>
<?php 
if(!isset($xpanel['nav-style']) || $xpanel['nav-style'] == "1") {
?>
@media screen and (min-width: 768px) {
	.main-menu li:nth-child(1) a {border-top: 5px solid #244F83; transition: all 0.5s; -webkit-transition: all 0.5s}
.main-menu li:nth-child(1) a:hover, .main-menu li:nth-child(1) .sub-menu, .main-menu li:nth-child(1).current-menu-item a {background: #3165a4;}
.main-menu li:nth-child(2) a {border-top: 5px solid #cc6500; transition: all 0.5s; -webkit-transition: all 0.5s}
.main-menu li:nth-child(2) a:hover, .main-menu li:nth-child(2) .sub-menu, .main-menu li:nth-child(2).current-menu-item a {background: #e37204;}
.main-menu li:nth-child(3) a {border-top: 5px solid #427a2e; transition: all 0.5s; -webkit-transition: all 0.5s}
.main-menu li:nth-child(3) a:hover, .main-menu li:nth-child(3) .sub-menu, .main-menu li:nth-child(3).current-menu-item a {background: #54993a;}
.main-menu li:nth-child(4) a {border-top: 5px solid #793a99; transition: all 0.5s; -webkit-transition: all 0.5s}
.main-menu li:nth-child(4) a:hover, .main-menu li:nth-child(4) .sub-menu, .main-menu li:nth-child(4).current-menu-item a {background: #9353b4;}
.main-menu li:nth-child(5) a {border-top: 5px solid #c01f1f; transition: all 0.5s; -webkit-transition: all 0.5s}
.main-menu li:nth-child(5) a:hover, .main-menu li:nth-child(5) .sub-menu, .main-menu li:nth-child(5).current-menu-item a {background: #d43131;}
.main-menu li:nth-child(6) a {border-top: 5px solid #2390b9; transition: all 0.5s; -webkit-transition: all 0.5s}
.main-menu li:nth-child(6) a:hover, .main-menu li:nth-child(6) .sub-menu, .main-menu li:nth-child(6).current-menu-item a {background: #3da9d1;}
.main-menu li:nth-child(7) a {border-top: 5px solid #dac303; transition: all 0.5s; -webkit-transition: all 0.5s}
.main-menu li:nth-child(7) a:hover, .main-menu li:nth-child(7) .sub-menu, .main-menu li:nth-child(7).current-menu-item a {background: #ead311;}
.main-menu li:nth-child(8) a {border-top: 5px solid #895f39; transition: all 0.5s; -webkit-transition: all 0.5s}
.main-menu li:nth-child(8) a:hover, .main-menu li:nth-child(8) .sub-menu, .main-menu li:nth-child(8).current-menu-item a {background: #a2764e;}
.main-menu li:nth-child(9) a {border-top: 5px solid #063F4F; transition: all 0.5s; -webkit-transition: all 0.5s}
.main-menu li:nth-child(9) a:hover, .main-menu li:nth-child(9) .sub-menu, .main-menu li:nth-child(9).current-menu-item a {background: #105669;}
.main-menu li:nth-child(10) a {border-top: 5px solid #57524E; transition: all 0.5s; -webkit-transition: all 0.5s}
.main-menu li:nth-child(10) a:hover, .main-menu li:nth-child(10) .sub-menu, .main-menu li:nth-child(10).current-menu-item a {background: #6d6864;}
.main-menu li:nth-child(11) a {border-top: 5px solid #6d6629; transition: all 0.5s; -webkit-transition: all 0.5s}
.main-menu li:nth-child(11) a:hover, .main-menu li:nth-child(11) .sub-menu, .main-menu li:nth-child(11).current-menu-item a {background: #7d7536;}
.main-menu li:nth-child(12) a {border-top: 5px solid #028e72; transition: all 0.5s; -webkit-transition: all 0.5s}
.main-menu li:nth-child(12) a:hover, .main-menu li:nth-child(12) .sub-menu, .main-menu li:nth-child(12).current-menu-item a {background: #06a081;}
.main-menu li:nth-child(13) a {border-top: 5px solid #a3669b; transition: all 0.5s; -webkit-transition: all 0.5s}
.main-menu li:nth-child(13) a:hover, .main-menu li:nth-child(13) .sub-menu, .main-menu li:nth-child(13).current-menu-item a {background: #b67daf;}
.main-menu li:nth-child(14) a {border-top: 5px solid #636363; transition: all 0.5s; -webkit-transition: all 0.5s}
.main-menu li:nth-child(14) a:hover, .main-menu li:nth-child(14) .sub-menu, .main-menu li:nth-child(14).current-menu-item a {background: #7f7f7f;}
}
<?php } elseif ($xpanel['nav-style'] == "2") { ?>
	.main-menu li a, .main-menu-v3 li a {
		border-top: 5px solid <?php echo $xpanel['nav-colors'] ?>; transition: all 0.5s; -webkit-transition: all 0.5s;
	}
	.main-menu li a:hover, .main-menu li .sub-menu, .main-menu li.current-menu-item a, .main-menu-v3 li a:hover, .main-menu-v3 li.current-menu-item a{
		background: <?php echo $xpanel['nav-colors'] ?>;
	}
<?php } ?>
.main-menu-v3 li a {
	transition: all 0.5s; -webkit-transition: all 0.5s;
}
.main-menu-v3 li a:hover, .main-menu-v3 li.current-menu-item a, .main-menu-v3 ul .sub-menu li a:hover{
	background: <?php echo $xpanel['nav-colors'] ?> !important;
	color: <?php echo $xpanel['nav-links-hover-color'] ?>;
}
<?php if(isset($xpanel['ticker-color']) && ($xpanel['ticker-color'] == 'dark') && ($xpanel['header-layout'] != 3)) { ?>
	.news-ticker {
		background: #333;
	}
	.news-ticker .searchBtn {
		background: #000;
	}
	.breaking_body a {
		color: #fff;
	}
<?php }  elseif(isset($xpanel['ticker-color']) && ($xpanel['ticker-color'] == 'light') && ($xpanel['header-layout'] != 3)) { ?>
	.news-ticker {
		background: #f0f0f0;
	}
	.news-ticker .searchBtn {
		background: #e94547;
	}
	.breaking_body a {
		color: #e94547;
	}
<?php } else { ?>
	.news-ticker {
		background: #ffffff;
	}
	.news-ticker .searchBtn {
		background: #e94547;
	}
	.breaking_body a {
		color: #e94547;
	}
<?php } ?>
#footer {
	background: <?php echo $xpanel['footer-widgets-bg'] ?>;
}
.footer-row {
	background: <?php echo $xpanel['footer-copyrights-bg'] ?>;
}
.footer-widget p, .footer-widget, #footer, .footer-copyrights  p  {
	color: <?php echo $xpanel['footer-text-color'] ?> !important;
}
.footer-widget p a, .footer-widget a, #footer a, .footer-copyrights p a  {
	color: <?php echo $xpanel['footer-links-color'] ?> !important;
}
</style>