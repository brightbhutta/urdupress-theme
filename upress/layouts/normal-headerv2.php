<?php
global $xpanel;
?>
<div class="nav-wrap">
    <nav class="main-menu" id="main-nav">
        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'desktop-menu', 'container' => '', ) ); ?>
    </nav>
</div><!--#Nav Wrap -->
<div class="search_form" id="headerSearchForm">
    <a href="javascript:" id="closeSearchBox"><i class="fa fa-times"></i></a>
    <div class="search-form-inner">
        <?php get_search_form(); ?> 
    </div>
</div> <!--//Header Search Form -->

<!-- Logo & Banner -->
<div class="header-content">
    <div class="header-content-container container-fluid">
        <div class="logo pl-0 col-lg-4 col-md-3 col-sm-16 col-xs-16">
            <div class="row ml-0 mr-0">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <img src="<?php echo $xpanel['logo']['url'] ?>">
                </a>
            </div>
            <div class="row date-time-row ml-0 mr-0">
                <?php if(isset($xpanel["header-clock-box"]) && $xpanel["header-clock-box"] == 1){ ?>
                <div class="date-time">
                    <div class="clock" id="clock"></div>
                </div>
                <?php } ?>
                <?php if(isset($xpanel["header-islamic-date"]) && $xpanel["header-islamic-date"] == 1){ ?>
                <div class="hijri-date" style="font-size: 16px;">
                    <script type="text/javascript">
                        document.write(writeIslamicDate());
                    </script>
                </div>
                <?php } ?>
            </div>
        </div><!-- // Logo -->
        <div class="header-banner col-lg-12 col-md-13 col-sm-16 col-xs-16 text-left">
            <?php dynamic_sidebar('header-ad') ?>
        </div><!--// Header Banner -->
    </div>
</div><!-- // Logo & Banner -->
<div class="news-ticker row ml-0 mr-0">
    <?php get_template_part('template-parts/news', 'ticker') ?>
</div><!--//Header News Ticker -->