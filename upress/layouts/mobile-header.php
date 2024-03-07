<?php
global $xpanel;
?>
<!-- Header Small Bar -->
<div class="mobile-bar row ml-0 mr-0">
        <div class="nav-btn col-xs-3 pl-0">
            <a href="javascript:" id="navBtn"><i class="fa fa-bars"></i></a>
        </div><!-- // Menu Button -->
        
        <div class="mobile-logo col-xs-10 pl-0 pr-0">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <img src="<?php echo $xpanel['logo']['url'] ?>">
            </a>
        </div><!-- // Logo -->
        
        <div class="mobile-search-button col-xs-3 pl-0 pr-0">
            <a href="javascript:" id="mobileSearchBtn"><i class="fa fa-search fa-flip-horizontal"></i></a>
        </div><!-- // Search Button -->
        
</div><!--//Header Small Bar -->

<div class="mobile-search-bar row ml-0 mr-0">
    <div class="search_form_mobile" id="searchForm"><?php get_search_form(); ?></div>
</div><!--//Header Search Bar -->
    

<!-- Header Banner -->
<div class="row ml-0 mr-0">
    
    <div class="header-banner col-lg-12 col-md-13 col-sm-16 col-xs-16 text-left">
        <?php dynamic_sidebar('header-ad') ?>
    </div>
</div>

<div class="mobile-menu">
    <nav class="main-menu" id="main-nav">
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'container' => '', ) ); ?> 
    </nav><!--#Nav Wrap -->
</div>