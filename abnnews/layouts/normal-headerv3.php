<?php
global $xpanel;
$dt_col_class = "      col-sm-6 col-md-5 col-lg-4 pl-0 pr-0";
$live_class = "        col-sm-2 col-md-2 col-lg-2 pl-0 pr-0";
$ticker_col_class  = " col-sm-8 col-md-9 col-lg-10 pr-0 pl-0";
if($xpanel["header-clock-box"] == 0) {
    $dt_col_class = " col-sm-4 col-md-4 col-lg-3 pl-0 pr-0";
    $live_class = " col-sm-2 col-md-2 col-lg-2 pl-0 pr-0";
    $ticker_col_class  = " col-sm-10 col-md-10 col-lg-11 pr-0 pl-0";
}
if($xpanel["header-islamic-date"] == 0) {
    $dt_col_class = " col-sm-4 col-md-4 col-lg-3 pl-0 pr-0";
    $live_class = " col-sm-2 col-md-2 col-lg-2 pl-0 pr-0";
    $ticker_col_class  = " col-sm-10 col-md-10 col-lg-11 pr-0 pl-0";
}
if($xpanel["header-clock-box"] == 0 && $xpanel["header-islamic-date"] == 0) {
    $dt_col_class = " col-sm-2 col-md-2 col-lg-1 pl-0 pr-0";
    $live_class = " col-sm-2 col-md-2 col-lg-2 pl-0 pr-0";
    $ticker_col_class  = " col-sm-12 col-md-12 col-lg-13 pr-0 pl-0";
}
$adjust_date = $xpanel["header-islamic-date-adjust"];
if(is_numeric($adjust_date)) {
    $adjust_date = intval($adjust_date);
} else {
    $adjust_date = 0;
}
?>
<div class="search_form" id="headerSearchForm">
    <a href="javascript:" id="closeSearchBox"><i class="fa fa-times"></i></a>
    <div class="search-form-inner">
        <?php get_search_form(); ?> 
    </div>
</div> <!--//Header Search Form -->
<div class="header-top row ml-0 mr-0">
    <div class="container-fluid">
        <div class="date-time-col<?php echo $dt_col_class ?>">
            <div class="row date-time-row ml-0 mr-0">
                <div class="searchBtn">
                    <a href="javascript:" id="searchF"><i class="fa fa-search fa-flip-horizontal"></i></a>
                </div>
                <?php if(isset($xpanel["header-clock-box"]) && $xpanel["header-clock-box"] == 1){ ?>
                <div class="date-time">
                    <div class="clock" id="clock"></div>
                    <div class="english-date"><?php echo date("d F, Y");?></div>
                </div>
                <?php } ?>
                <?php if(isset($xpanel["header-islamic-date"]) && $xpanel["header-islamic-date"] == 1){ ?>
                <div class="hijri-date" style="font-size: 16px;">
                    <script type="text/javascript">
                        document.write(writeIslamicDate(<?php echo $adjust_date ?>));
                    </script>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="live <?php echo $live_class; ?>"><img src="https://abnnews.pk/wp-content/uploads/2022/11/news-live.png" alt="" /> </div>
        <div class="ticker-column<?php echo $ticker_col_class ?>">
            <div class="news-ticker row ml-0 mr-0">
                <?php get_template_part('template-parts/news', 'ticker') ?>
            </div><!--//Header News Ticker -->
        </div>
        
    </div>
</div>
<!-- Logo & Banner -->
<div class="header-content style-3">
    <div class="header-content-container container-fluid">
    <?php if(isset($xpanel['header-content-align']) && ($xpanel['header-content-align'] == 2)) { ?>
            <div class="logo-center row ml-0 mr-0 text-center">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <img src="<?php echo $xpanel['logo']['url'] ?>">
                </a>
            </div><!-- // Logo -->
            <div class="header-banner row ml-0 mr-0 text-center">
                <?php dynamic_sidebar('header-ad') ?>
            </div><!--// Header Banner -->
        <?php } elseif(isset($xpanel['header-content-align']) && ($xpanel['header-content-align'] == 3)){ ?>
            <div class="logo-center row ml-0 mr-0 text-center">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <img src="<?php echo $xpanel['logo']['url'] ?>">
                </a>
            </div><!-- // Logo -->
        <?php } elseif(isset($xpanel['header-content-align']) && ($xpanel['header-content-align'] == 4)){ ?>
            <div class="header-banner row ml-0 mr-0 text-center">
                <?php dynamic_sidebar('header-ad') ?>
            </div><!--// Header Banner -->
        <?php } else { ?>
            <div class="logo pl-0 col-lg-4 col-md-3 col-sm-16 col-xs-16">
                <div class="row ml-0 mr-0">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <img src="<?php echo $xpanel['logo']['url'] ?>">
                    </a>
                </div>
                
            </div><!-- // Logo -->
            <div class="header-banner col-lg-12 col-md-13 col-sm-16 col-xs-16 text-left">
                <?php dynamic_sidebar('header-ad') ?>
            </div><!--// Header Banner -->
        <?php } ?>
    </div>
</div><!-- // Logo & Banner -->
<div class="nav-wrap container-fluid">
    <nav class="main-menu-v3" id="main-nav">
        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'desktop-menu', 'container' => '', ) ); ?>
    </nav>
</div><!--#Nav Wrap -->

