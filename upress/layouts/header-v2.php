<?php
global $xpanel;
?>

<div class="nav-wrap">
    <div class="container-fluid">
        <nav class="main-menu navbar navbar-default" id="main-nav">
            <div class="container pl-0 pr-0">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div>
              <div id="navbar" class="navbar-collapse collapse">
                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'container' => '', ) ); ?> 
                <div class="searchBtn pull-left">
                    <a href="javascript:" id="searchF"><i class="fa fa-search fa-flip-horizontal"></i></a>
                </div>
              </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
        </nav>
    </div>
</div><!--#Nav Wrap -->
<div class="search_form" id="headerSearchForm">
    <?php get_search_form(); ?> 
</div> <!--//Header Search Form -->
<!-- Logo & Banner -->
<div class="header-content">
<div class="container-fluid">
    <div class="logo col-lg-4 col-md-3 col-sm-16 col-xs-16">
        <div class="row ml-0 mr-0">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <img src="<?php echo $xpanel['logo']['url'] ?>">
            </a>
        </div>
        <div class="row ml-0 mr-0">
            <div class="date-time pull-left pl-10">
                <div class="clock" id="clock"></div>
            </div>
            <div class="rpull-right pr-10" style="font-size: 20px;">
                <script type="text/javascript">
                    document.write(writeIslamicDate());
                </script>
            </div>
        </div>
    </div><!-- // Logo -->
    <div class="header-banner mt-10 col-lg-12 col-md-13 col-sm-16 col-xs-16 text-left">
        <?php dynamic_sidebar('header-ad') ?>
    </div><!--// Header Banner -->
</div>
</div><!-- // Logo & Banner -->