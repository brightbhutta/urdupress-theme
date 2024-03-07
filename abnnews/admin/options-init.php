<?php

    /**
     * For full documentation, please visit: http://docs.reduxframework.com/
     * For a more extensive sample-config file, you may look at:
     * https://github.com/reduxframework/redux-framework/blob/master/sample/sample-config.php
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "xpanel";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        'opt_name' => 'xpanel',
        'use_cdn' => TRUE,
        'display_name' => 'xPanel - UrduPress',
        'display_version' => FALSE,
        'page_slug' => 'xpanel',
        'page_title' => 'xPanel Theme Settings',
        'update_notice' => FALSE,
        'intro_text' => '<p>You can customize your theme with different options with this panel</p>',
        'footer_text' => '<p>Powered by <a href="http://www.stylothemes.com">StyloThemes</a></p>',
        'admin_bar' => TRUE,
        'menu_type' => 'submenu',
        'menu_title' => 'Theme Settings',
        'allow_sub_menu' => TRUE,
        'page_parent' => 'themes.php',
        'page_parent_post_type' => 'your_post_type',
        'customizer' => TRUE,
        'default_show' => TRUE,
        'default_mark' => '*',
        'dev_mode' => false,
        'google_api_key' => 'AIzaSyAZncm6O4E0LFyFh3Fv0MUDkJMSbJJkLIk',
        'class' => 'xpanel',
        'hints' => array(
            'icon' => 'el el-comment',
            'icon_position' => 'right',
            'icon_size' => 'normal',
            'tip_style' => array(
                'color' => 'light',
            ),
            'tip_position' => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect' => array(
                'show' => array(
                    'duration' => '500',
                    'event' => 'mouseover',
                ),
                'hide' => array(
                    'duration' => '500',
                    'event' => 'mouseleave unfocus',
                ),
            ),
        ),
        'output' => TRUE,
        'output_tag' => TRUE,
        'settings_api' => TRUE,
        'cdn_check_time' => '1440',
        'compiler' => TRUE,
        'page_permissions' => 'manage_options',
        'save_defaults' => TRUE,
        'show_import_export' => TRUE,
        'database' => 'options',
        'transient_time' => '3600',
        'network_sites' => TRUE,
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/stylotheme',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/StyloThemes',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.linkedin.com/company/stylothemes',
        'title' => 'Find us on LinkedIn',
        'icon'  => 'el el-linkedin'
    );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Need Support ?', 'admin_folder' ),
            'content' => __( '<h3>Having trouble setting up the theme ? Go ahead and submit a support ticket via <a href="http://stylothemes.com/shop/support" target="_blank">http://stylothemes.com/shop/support</a></h3>', 'admin_folder' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'More Themes', 'admin_folder' ),
            'content' => __( '<p>Browse collection of our more themes <a href="http://stylothemes.com/shop/support" target="_blank">http://stylothemes.com/shop</a></p>', 'admin_folder' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p><a href="http://stylothemes.com/shop" target="_blank"><img src="http://stylothemes.com/shop/wp-content/themes/styloshop/images/logo-footer.png" width="150" height="80"></a></p>', 'admin_folder' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    Redux::setSection( $opt_name, array(
        'title' => __( 'General Settings', 'xpanel-framework' ),
        'id'    => 'general',
        'desc'  => __( 'General Theme Settings.', 'xpanel-framework' ),
        'icon'  => 'el el-home'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Logo Settings', 'xpanel-framework' ),
        'desc'       => __( 'Upload Your Website Logo & Favicon', 'xpanel-framework' ),
        'id'         => 'logo-favicon',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'logo',
                'type'     => 'media', 
                'url'      => true,
                'title'    => __('Logo URL', 'xpanel-framework'),
                'desc'     => __('Upload Your Website Logo.', 'xpanel-framework'),
                'subtitle' => __('Select Valid Image File ie: .png, .jpg, .gif', 'xpanel-framework'),
                'default'  => array(
                    'url'=>''.get_template_directory_uri().'/images/logo.png'
                ),
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Layout Settings', 'xpanel-framework' ),
        'desc'       => __( 'Manage your website Layout', 'xpanel-framework' ),
        'id'         => 'layout-settings',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'website-container',
                'type'     => 'select',
                'title'    => __('Website Container', 'xpanel-framework'), 
                'subtitle' => __('', 'xpanel-framework'),
                'desc'     => __('Selet Layout Container For Website', 'xpanel-framework'),
                'default'  => 'full-width',
                'options'  => array(
                        'boxed' =>  'Boxed',
                        'full-width' =>  'Full Width'
                ),
            ),
            array(
                'id'       => 'preloader',
                'type'     => 'checkbox',
                'title'    => __('Enable Preloader?', 'xpanel-framework'), 
                'subtitle' => __('Enable or Disable Preloader animation while your website is being loaded', 'xpanel-framework'),
                'desc'     => __('', 'xpanel-framework'),
                'default'  => '1'// 1 = on | 0 = off
            ),
            array(
                'id'       => 'preloader-msg',
                'type'     => 'text',
                'title'    => __('Preloader Message', 'xpanel-framework'), 
                'subtitle' => __('Customize Your Preloader Message', 'xpanel-framework'),
                'desc'     => __('', 'xpanel-framework'),
                'default'  => 'انتظار کیجئے! ویب سائٹ تیار کی جا رہی ہے'
            ),
            array(
                'id'       => 'totop',
                'type'     => 'checkbox',
                'title'    => __('Enable Back To Top?', 'xpanel-framework'), 
                'subtitle' => __('Enable or Disable Back To Top Button at bottom of your website', 'xpanel-framework'),
                'desc'     => __('', 'xpanel-framework'),
                'default'  => '1'// 1 = on | 0 = off
            ),
            
        )
    ) );
    //End of Layout Settings 
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Body Backgrounds', 'xpanel-framework' ),
        'desc'       => __( 'Manage Background colors and images for main website body', 'xpanel-framework' ),
        'id'         => 'background-settings',
        'subsection' => true,
        'output'     => array('body'),
        'fields'     => array(
            
            array(
                'id'       => 'body-background',
                'type'     => 'background',
                'title'    => __('Body Background', 'xpanel-framework'),
                'subtitle' => __('', 'xpanel-framework'),
                'desc'     => __('Body background with image, color, etc.', 'xpanel-framework'),
                'default'  => array(
                    'background-color' => '#f0f0f0',
                    'background-image' => ''.get_template_directory_uri('/').'/images/bg.png'
                ),
                'output'   => 'body'
            )
        )
    ) );
    //End of Body Backgrounds Settings

    
    Redux::setSection( $opt_name, array(
        'title' => __( 'Header', 'xpanel-framework' ),
        'id'    => 'header-settings',
        'desc'  => __( 'Customize your webite header.', 'xpanel-framework' ),
        'icon'  => 'el el-cog'
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Header Layout', 'xpanel-framework' ),
        'desc'       => __( 'Manage Header Style & Layout', 'xpanel-framework' ),
        'id'         => 'header-layout-settings',
        'subsection' => true,
        'fields'     => array(
            
            array(
                'id'       => 'header-layout',
                'type'     => 'select',
                'title'    => __('Header Style', 'xpanel-framework'), 
                'subtitle' => __('', 'xpanel-framework'),
                'desc'     => __('Choose Style for your Header.', 'xpanel-framework'),
                'options'  => array(
                        '1' =>  'Default',
                        '2' =>  'Style 2',
                        '3' =>  'Style 3',
                        '4' =>  'Style 4',
                    ),
                'default'  => '3',
            ),
            array(
                'id'       => 'header-content-align',
                'type'     => 'select',
                'title'    => __('Header Content Alignment', 'xpanel-framework'), 
                'subtitle' => __('', 'xpanel-framework'),
                'desc'     => __('Select Alignment of Header Logo & Banner.', 'xpanel-framework'),
                'options'  => array(
                        '1' =>  'Default',
                        '2' =>  'Center Logo & Banner',
                        '3' =>  'Center Logo Only',
                        '4' =>  'Center Banner Only',
                    ),
                'default'  => '1',
            ),
        )
    ) );
    //End of Header Layout Settings
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Date & Clock', 'xpanel-framework' ),
        'desc'       => __( 'Manage Header Islamic Date and english clock', 'xpanel-framework' ),
        'id'         => 'header-date-time-settings',
        'subsection' => true,
        'fields'     => array(
            
            array(
                'id'       => 'header-clock-box',
                'type'     => 'checkbox',
                'title'    => __('Enable Digital Clock?', 'xpanel-framework'), 
                'subtitle' => __('Enable or Disable Digital Clock with English Date in Header', 'xpanel-framework'),
                'desc'     => __('', 'xpanel-framework'),
                'default'  => '1'// 1 = on | 0 = off
            ),
            array(
                'id'       => 'header-islamic-date',
                'type'     => 'checkbox',
                'title'    => __('Enable Islamic Date?', 'xpanel-framework'), 
                'subtitle' => __('Enable or Disable Islamic Hijri Date in Header', 'xpanel-framework'),
                'desc'     => __('', 'xpanel-framework'),
                'default'  => '1'// 1 = on | 0 = off
            ),
            array(
                'id'       => 'header-islamic-date-adjust',
                'type'     => 'text',
                'title'    => __('Fix Islamic Date', 'xpanel-framework'), 
                'subtitle' => __('Add or Remove Days into actual date (-1, -2... OR +1, +2...)', 'xpanel-framework'),
                'desc'     => __('', 'xpanel-framework'),
                'default'  => '0'// 1 = on | 0 = off
            ),
        )
    ) );
    //End of header date and time settings
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Navigation', 'xpanel-framework' ),
        'desc'       => __( 'Main Navigation Settinga', 'xpanel-framework' ),
        'id'         => 'nav-settings',
        'subsection' => true,
        'output'     => "",
        'fields'     => array(
            array(
                'id'       => 'stickynav',
                'type'     => 'checkbox',
                'title'    => __('Enable Sticky Nav', 'xpanel-framework'), 
                'subtitle' => __('Make ypur top navigation bar stick to top while scroll down', 'xpanel-framework'),
                'desc'     => __('', 'xpanel-framework'),
                'default'  => '0'// 1 = on | 0 = off
            ),
            array(
                'id'       => 'nav-bg-color',
                'type'     => 'color',
                'title'    => __('Background Color', 'xpanel-framework'), 
                'subtitle' => __('', 'xpanel-framework'),
                'desc'     => __('Selet Background Color For Navigation', 'xpanel-framework'),
                'default'  => '#333333',
                'validate' => 'color',
            ),
            array(
                'id'       => 'nav-links-color',
                'type'     => 'color',
                'title'    => __('Menu Links Color', 'xpanel-framework'), 
                'subtitle' => __('', 'xpanel-framework'),
                'desc'     => __('Selet Text Color Color For Navigation Menu Items', 'xpanel-framework'),
                'default'  => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id'       => 'subnav-links-color',
                'type'     => 'color',
                'title'    => __('Sub-Menu Menu Links Color', 'xpanel-framework'), 
                'subtitle' => __('', 'xpanel-framework'),
                'desc'     => __('Selet Text Color Color For Sub-Menu Items', 'xpanel-framework'),
                'default'  => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id'       => 'nav-links-hover-color',
                'type'     => 'color',
                'title'    => __('Menu Links Hover Color', 'xpanel-framework'), 
                'subtitle' => __('', 'xpanel-framework'),
                'desc'     => __('Selet Text Color Color For Navigation Menu Items on Mouseover', 'xpanel-framework'),
                'default'  => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id'       => 'nav-colors',
                'type'     => 'color',
                'title'    => __('Menu Item Hover Background', 'xpanel-framework'), 
                'subtitle' => __('Slecet Color Sceheme for Main Menu, Only works when "Simple tabs" option selected.', 'xpanel-framework'),
                'desc'     => __('', 'xpanel-framework'),
                'default'  => '#e94547',
                'validate' => 'color',
            ),
            array(
                'id'       => 'nav-style',
                'type'     => 'select',
                'title'    => __('Navigation Style', 'xpanel-framework'), 
                'subtitle' => __('', 'xpanel-framework'),
                'desc'     => __('Choose Style for your Header Navigation.', 'xpanel-framework'),
                'options'  => array(
                        '1' =>  'Colorful Tabs',
                        '2' =>  'Simple Tabs',
                    ),
                'default'  => '1',
            ),
            
        )
    ) );
    //End of Navigation Settings

    Redux::setSection( $opt_name, array(
        'title'      => __( 'News Ticker', 'xpanel-framework' ),
        'desc'       => __( 'Manage Top Scrollig News Bar', 'xpanel-framework' ),
        'id'         => 'news-ticker-settings',
        'subsection' => true,
        'output'     => "",
        'fields'     => array(
            
            array(
                'id'       => 'ticker-color',
                'type'     => 'select',
                'title'    => __('Color Scheme', 'xpanel-framework'), 
                'subtitle' => __('', 'xpanel-framework'),
                'desc'     => __('Selet Color Scheme For News Ticker', 'xpanel-framework'),
                'options'  => array(
                        'dark' =>  'Dark',
                        'light' =>  'Light'
                    ),
            ),
            array(
                'id'       => 'news-ticker-cat',
                'type'     => 'select',
                'title'    => __('Select Category', 'xpanel-framework'), 
                'subtitle' => __('', 'xpanel-framework'),
                'desc'     => __('Choose which category posts will be shown in News ticker. Leave empty fo all categories', 'xpanel-framework'),
                'data'     => 'categories',
                'default'  => '0',
            ),
            array(
                'id'       => 'news-ticker-limit',
                'type'     => 'select',
                'title'    => __('Limit Posts', 'xpanel-framework'), 
                'subtitle' => __('', 'xpanel-framework'),
                'desc'     => __('Select how many posts you want to show in News Ticker', 'xpanel-framework'),
                'options'  => array(
                        '5' =>  '5',
                        '6' =>  '5',
                        '7' =>  '7',
                        '8' =>  '8',
                        '9' =>  '9',
                        '10' =>  '10'
                    ),
                'default'  => '5',
            ),
            array(
                'id'       => 'ticker-label',
                'type'     => 'text',
                'title'    => __('Ticker Label', 'redux-framework-demo'),
                'subtitle' => __(''),
                'desc'     => __('You can change your ticker label here.', 'redux-framework-demo'),
                'default'  => ' اہم خبریں'
            )
            
        )
    ) );
    //End of News Ticker Settings
    //End of Header Settings

    Redux::setSection( $opt_name, array(
        'title' => __( 'Footer', 'xpanel-framework' ),
        'id'    => 'footer-settings',
        'desc'  => __( 'Customize your webite footer.', 'xpanel-framework' ),
        'icon'  => 'el el-cog'
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Footer Layout', 'xpanel-framework' ),
        'desc'       => __( 'Manage Footer Layout', 'xpanel-framework' ),
        'id'         => 'footer-layout-settings',
        'subsection' => true,
        'output'     => '',
        'fields'     => array(
            
            array(
                'id'       => 'footer-copyright-display',
                'type'     => 'switch',
                'title'    => __('Copyright Section', 'xpanel-framework'), 
                'subtitle' => __('', 'xpanel-framework'),
                'desc'     => __('Show/Hide Footer Copyright Row.', 'xpanel-framework'),
                'default'  => true,
            ),
            array(
                'id'       => 'footer-about-display',
                'type'     => 'switch',
                'title'    => __('About Section', 'xpanel-framework'), 
                'subtitle' => __('', 'xpanel-framework'),
                'desc'     => __('Show/Hide Footer About Section with Logo.', 'xpanel-framework'),
                'default'  => true,
            ),
            array(
                'id'       => 'footer-widget-count',
                'type'     => 'select',
                'title'    => __('Footer Widgets', 'xpanel-framework'), 
                'subtitle' => __('', 'xpanel-framework'),
                'desc'     => __('Select how many widget areas you want to display in footer.', 'xpanel-framework'),
                'options'  => array(
                           '1' => '1',
                           '2' => '2',
                           '3' => '3'
                ),
                'default'  => '3',
            )
        )
    ) ); // End of Footer Layout

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Footer Colors', 'xpanel-framework' ),
        'desc'       => __( 'Manage Footer Color Scheme', 'xpanel-framework' ),
        'id'         => 'footer-color-settings',
        'subsection' => true,
        'output'     => '',
        'fields'     => array(
            
            array(
                'id'       => 'footer-widgets-bg',
                'type'     => 'color',
                'title'    => __('Widgets Background', 'xpanel-framework'), 
                'subtitle' => __('Footer Widgets Background Color.', 'xpanel-framework'),
                'desc'     => __('', 'xpanel-framework'),
                'default'  => '#333333',
                'validate' => 'color',
            ),
            array(
                'id'       => 'footer-copyrights-bg',
                'type'     => 'color',
                'title'    => __('Copyrights Background', 'xpanel-framework'), 
                'subtitle' => __('Footer Copyrights Background Color.', 'xpanel-framework'),
                'desc'     => __('', 'xpanel-framework'),
                'default'  => '#222222',
                'validate' => 'color',
            ),
            array(
                'id'       => 'footer-text-color',
                'type'     => 'color',
                'title'    => __('Text Color', 'xpanel-framework'), 
                'subtitle' => __('Footer Text Color.', 'xpanel-framework'),
                'desc'     => __('', 'xpanel-framework'),
                'default'  => '#dddddd',
                'validate' => 'color',
            ),
            array(
                'id'       => 'footer-links-color',
                'type'     => 'color',
                'title'    => __('Links Color', 'xpanel-framework'), 
                'subtitle' => __('Footer Hyperlinks Color.', 'xpanel-framework'),
                'desc'     => __('', 'xpanel-framework'),
                'default'  => '#ffffff',
                'validate' => 'color',
            ),
        )
    ) ); // End of Footer Layout

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Footer Settings', 'xpanel-framework' ),
        'desc'       => __( 'Manage Footer copyright text', 'xpanel-framework' ),
        'id'         => 'footer-text-settings',
        'subsection' => true,
        'output'     => '',
        'fields'     => array(
            
            array(
                'id'=>'footer-copyright',
                'type' => 'textarea',
                'title' => __('Footer Copyright', 'xpanel-framework'), 
                'subtitle' => __('', 'xpanel-framework'),
                'desc' => __('Enter your website copyright text for footer. some HTML is allowed such as, <p>, <a>, <br>, <em>, <strong>', 'xpanel-framework'),
                'validate' => 'html_custom',
                'default' => 'Copyright © 2015-2020, UrduPress all rights reserved. Theme Designed by <a href="http://www.stylothemes.com">StyloThemes</a>',
                'allowed_html' => array(
                    'a' => array(
                        'href' => array(),
                        'title' => array()
                    ),
                    'p' => array(
                        'class' => array(),
                        'id'    => array(),
                        'style' => array(),
                    ),
                    'br' => array(),
                    'em' => array(),
                    'strong' => array()
                )
            ),
            array(
                'id'       => 'footer-logo',
                'type'     => 'media', 
                'url'      => true,
                'title'    => __('Footer Logo', 'xpanel-framework'),
                'desc'     => __('Upload Your Website Logo For Footer.', 'xpanel-framework'),
                'subtitle' => __('Select Valid Image File ie: .png, .jpg, .gif', 'xpanel-framework'),
                'default'  => array(
                    'url'=>''.get_template_directory_uri().'/images/logo-footer.png'
                ),
            ),
            array(
                'id'=>'footer-about-text',
                'type' => 'textarea',
                'title' => __('Footer About', 'xpanel-framework'), 
                'subtitle' => __('', 'xpanel-framework'),
                'desc' => __('Enter your short about us text for footer. some HTML is allowed such as, <p>, <a>, <br>, <em>, <strong>', 'xpanel-framework'),
                'validate' => 'html_custom',
                'default' => 'اردو پریس ورڈپریس تھیمز کی دنیا میں پہلا مکمل اردو تھیم ہے، جس میں ایک اردو ویب سائٹ بنانے کے لیے درکار تمام سہولتیں موجود ہیں.',
                'allowed_html' => array(
                    'a' => array(
                        'href' => array(),
                        'title' => array()
                    ),
                    'p' => array(
                        'class' => array(),
                        'id'    => array(),
                        'style' => array(),
                    ),
                    'br' => array(),
                    'em' => array(),
                    'strong' => array()
                )
            ),//Footer copyright area
        )
    ) ); // End of Footer Settings

    //End of Footer

    Redux::setSection( $opt_name, array(
        'title' => __( 'Homepage', 'xpanel-framework' ),
        'id'    => 'homepage',
        'desc'  => __( 'Manage Homepage blocks and content areas.', 'xpanel-framework' ),
        'icon'  => 'el el-cogs'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Slider Settings', 'xpanel-framework' ),
        'desc'       => __( 'Manage your homepage slider settings', 'xpanel-framework' ),
        'id'         => 'homepage-slider',
        'subsection' => true,
        'fields'     => array(

            array(
                'id'       => 'slider-animation',
                'type'     => 'select',
                'title'    => __('Slider Animation', 'xpanel-framework'), 
                'subtitle' => __('', 'xpanel-framework'),
                'desc'     => __('Select animation style for Homepage Slider.', 'xpanel-framework'),
                'options'  => array(
                           'random' => 'Random (All)',
                           'simpleFade' => 'Simple Fade',
                           'curtainTopLeft' => 'Curtain Top Left',
                           'curtainTopRight' => 'Curtain Top Right',
                           'curtainBottomLeft' => 'Curtain Bottom Left',
                           'curtainBottomRight' => 'Curtain Bottom Right',
                           'curtainSliceLeft' => 'Curtain Slice Left',
                           'curtainSliceRight' => 'Curtain Slice Right',
                           'blindCurtainTopLeft' => 'Blind Curtain Top Left',
                           'blindCurtainTopRight' => 'Blind Curtain Top Right',
                           'blindCurtainBottomLeft' => 'Blind Curtain Bottom Left',
                           'blindCurtainBottomRight' => 'Blind Curtain Bottom Right',
                           'stampede' => 'Stampede',
                           'mosaic' => 'Mosaic',
                           'mosaicReverse' => 'Mosaic Reverse',
                           'mosaicRandom' => 'Mosaic Random',
                           'mosaicSpiral' => 'Mosaic Spiral',
                           'mosaicSpiralReverse' => 'Mosaic Spiral Reverse',
                           'topLeftBottomRight' => 'Top Left Bottom Right',
                           'bottomRightTopLeft' => 'Bottom Right Top Left',
                           'bottomLeftTopRight' => 'Bottom Left Top Right',
                           'bottomLeftTopRight' => 'Bottom Left Top Right',
                           'scrollLeft' => 'Scroll Left',
                           'scrollRight' => 'Scroll Right'
                ),
                'default'  => 'random',
            ),
            array(
                'id'       => 'slider-hover',
                'type'     => 'switch',
                'title'    => __('Pause on Hover', 'xpanel-framework'), 
                'subtitle' => __('', 'xpanel-framework'),
                'desc'     => __('When user mouserver the slide it will pause the animation.', 'xpanel-framework'),
                'default'  => true,
            ),
            array(
                'id'       => 'slider-speed',
                'type'     => 'text',
                'title'    => __('Speed (Milliseconds)', 'xpanel-framework'), 
                'subtitle' => __('', 'xpanel-framework'),
                'desc'     => __('Milliseconds between the end of the sliding effect and the start of the nex one', 'xpanel-framework'),
                'default'  => '5000',
                'validate' => 'numeric'
            ),
        )
    ) ); // Slider Settings

    //End of Homepage Setings

    Redux::setSection( $opt_name, array(
        'title' => __( 'Post Settings', 'xpanel-framework' ),
        'id'    => 'post-settings',
        'desc'  => __( 'Manage your posts layout and settings.', 'xpanel-framework' ),
        'icon'  => 'el el-tasks'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Post Meta', 'xpanel-framework' ),
        'desc'       => __( 'Post Meta Information Settings', 'xpanel-framework' ),
        'id'         => 'post-meta-settings',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'show-author',
                'type'     => 'switch', 
                'title'    => __('Post Author', 'xpanel-framework'),
                'desc'     => __('Show Post Author Under Post Title?', 'xpanel-framework'),
                'default'  => true,
            ),
            array(
                'id'       => 'show-views',
                'type'     => 'switch', 
                'title'    => __('Post Views', 'xpanel-framework'),
                'desc'     => __('Show or Hide Post Views', 'xpanel-framework'),
                'default'  => true,
            ),
            array(
                'id'       => 'show-comment-count',
                'type'     => 'switch', 
                'title'    => __('Post Comments', 'xpanel-framework'),
                'desc'     => __('Show Post Comments Count Under Post Title?', 'xpanel-framework'),
                'default'  => true,
            ),
            array(
                'id'       => 'show-posted-date',
                'type'     => 'switch', 
                'title'    => __('Posted Date', 'xpanel-framework'),
                'desc'     => __('Show Post Publish Date in Single Post View?', 'xpanel-framework'),
                'default'  => true,
            ),

        )
    ) );//Post Meta

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Post Layout', 'xpanel-framework' ),
        'desc'       => __( 'Customize your single post view layout', 'xpanel-framework' ),
        'id'         => 'post-layout-settings',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'show-post-featured',
                'type'     => 'switch', 
                'title'    => __('Featured Image', 'xpanel-framework'),
                'desc'     => __('Show/Hide Featured Image in Single Post Header', 'xpanel-framework'),
                'default'  => true,
            ),
            array(
                'id'       => 'show-post-sidebar',
                'type'     => 'switch', 
                'title'    => __('Mini Sidebar', 'xpanel-framework'),
                'desc'     => __('Show/Hide Mini Sidebar in Single Post View', 'xpanel-framework'),
                'default'  => true,
            ),
            array(
                'id'       => 'show-zoom',
                'type'     => 'switch', 
                'title'    => __('ZoomIn/ZoomOut', 'xpanel-framework'),
                'desc'     => __('Enable or Disable Font Size Increase/Decrease Option.', 'xpanel-framework'),
                'default'  => true,
            ),
            array(
                'id'       => 'show-related-posts',
                'type'     => 'switch', 
                'title'    => __('Show Related Posts', 'xpanel-framework'),
                'desc'     => __('Show/Hide Related Posts Block after post content.', 'xpanel-framework'),
                'default'  => true,
            ),
            array(
                'id'       => 'related-posts-limit',
                'type'     => 'select',
                'title'    => __('Related Posts Limit', 'xpanel-framework'), 
                'subtitle' => __('', 'xpanel-framework'),
                'desc'     => __('Select how many posts you want to display in related posts block.', 'xpanel-framework'),
                'options'  => array(
                           '3' => '3',
                           '6' => '6',
                           '9' => '9'
                ),
                'default'  => '6',
            )

        )
    ) );//Post Layout

    //End of Post Settings
    Redux::setSection( $opt_name, array(
        'title' => __( 'Typography', 'xpanel-framework' ),
        'id'    => 'typography',
        'desc'  => __( 'Manage Font Family, Style, Size & Color.', 'xpanel-framework' ),
        'icon'  => 'el el-font'
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Headings', 'xpanel-framework' ),
        'desc'       => __( 'Select Font Styling for Headings', 'xpanel-framework' ),
        'id'         => 'font-headings',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'          => 'font-h1',
                'type'        => 'typography', 
                'title'       => __('H1', 'xpanel-framework'),
                'google'      => false, 
                'fonts'       => array(
                    'El Messiri' => 'El Messiri',
                    'Reem Kufi' => 'Reem Kufi',
                    'Harmattan' => 'Harmattan',
                    'Lateef' => 'Lateef',
                    'Sameer Regular' => 'Sameer Regular',
                    'AhmadLT Regular' => 'AhmadLT Regular',
                    'AkramUnicode Regular' => 'Akram Unicode',
                    'Alkatib Regular' => 'Alkatib Regular',
                    'AlQalam Regular' => 'AlQalam Regular',
                    'AlQalam Telenor' => 'AlQalam Telenor',
                    'Batool Unicode Regular' => 'Batool Unicode',
                    'Fajar Nastaleeq' => 'Fajar Nastaleeq',
                    'Nastaleeq Like' => 'Nastaleeq Like',
                    'Pak Lotus' => 'Pak Lotus',
                    'Sameer Zikran' => 'Sameer Zikran',
                    'Microsoft Uighur' => 'Microsoft Uighur',
                    'nafeesnastaleeq' => 'Nafees Nastaleeq',
                ),
                'font-backup' => true,
                'output'      => array('h1'),
                'units'       =>'px',
                'subtitle'    => __('Heading 1 (H1 tag)', 'xpanel-framework'),
                'default'     => array(
                    'color'       => '#222', 
                    'font-style'  => '400', 
                    'font-family' => 'nafeesnastaleeq', 
                    'google'      => false,
                    'font-size'   => '38px',
                    'line-height'   => '70px'
                ),
            ),
            array(
                'id'          => 'font-h2',
                'type'        => 'typography', 
                'title'       => __('H2', 'xpanel-framework'),
                'google'      => false, 
                'fonts'       => array(
                              'El Messiri' => 'El Messiri',
                              'Reem Kufi' => 'Reem Kufi',
                              'Harmattan' => 'Harmattan',
                              'Lateef' => 'Lateef',
                              'Sameer Regular' => 'Sameer Regular',
                              'AhmadLT Regular' => 'AhmadLT Regular',
                              'AkramUnicode Regular' => 'Akram Unicode',
                              'Alkatib Regular' => 'Alkatib Regular',
                              'AlQalam Regular' => 'AlQalam Regular',
                              'AlQalam Telenor' => 'AlQalam Telenor',
                              'Batool Unicode Regular' => 'Batool Unicode',
                              'Fajar Nastaleeq' => 'Fajar Nastaleeq',
                              'Nastaleeq Like' => 'Nastaleeq Like',
                              'Pak Lotus' => 'Pak Lotus',
                              'Sameer Zikran' => 'Sameer Zikran',
                              'Microsoft Uighur' => 'Microsoft Uighur',
                              'nafeesnastaleeq' => 'Nafees Nastaleeq',
                ),
                'font-backup' => true,
                'output'      => array('h2'),
                'units'       =>'px',
                'subtitle'    => __('Heading 2 (H2 tag)', 'xpanel-framework'),
                'default'     => array(
                    'color'       => '#222', 
                    'font-style'  => '400', 
                    'font-family' => 'nafeesnastaleeq', 
                    'google'      => false,
                    'font-size' => '34px',
                    'line-height' => '68px'
                ),
            ),
            array(
                'id'          => 'font-h3',
                'type'        => 'typography', 
                'title'       => __('H3', 'xpanel-framework'),
                'google'      => false, 
                'fonts'       => array(
                              'El Messiri' => 'El Messiri',
                              'Reem Kufi' => 'Reem Kufi',
                              'Harmattan' => 'Harmattan',
                              'Lateef' => 'Lateef',
                              'Sameer Regular' => 'Sameer Regular',
                              'AhmadLT Regular' => 'AhmadLT Regular',
                              'AkramUnicode Regular' => 'Akram Unicode',
                              'Alkatib Regular' => 'Alkatib Regular',
                              'AlQalam Regular' => 'AlQalam Regular',
                              'AlQalam Telenor' => 'AlQalam Telenor',
                              'Batool Unicode Regular' => 'Batool Unicode',
                              'Fajar Nastaleeq' => 'Fajar Nastaleeq',
                              'Nastaleeq Like' => 'Nastaleeq Like',
                              'Pak Lotus' => 'Pak Lotus',
                              'Sameer Zikran' => 'Sameer Zikran',
                              'Microsoft Uighur' => 'Microsoft Uighur',
                              'nafeesnastaleeq' => 'Nafees Nastaleeq',
                ),
                'font-backup' => true,
                'output'      => array('h3'),
                'units'       =>'px',
                'subtitle'    => __('Heading 3 (H3 tag)', 'xpanel-framework'),
                'default'     => array(
                    'color'       => '#222', 
                    'font-style'  => '400', 
                    'font-family' => 'nafeesnastaleeq', 
                    'google'      => false,
                    'font-size'   => '30px',
                    'line-height' => '60px'
                ),
            ),
            array(
                'id'          => 'font-h4',
                'type'        => 'typography', 
                'title'       => __('H4', 'xpanel-framework'),
                'google'      => false, 
                'fonts'       => array(
                      'El Messiri' => 'El Messiri',
                      'Reem Kufi' => 'Reem Kufi',
                      'Harmattan' => 'Harmattan',
                      'Lateef' => 'Lateef',
                      'Sameer Regular' => 'Sameer Regular',
                      'AhmadLT Regular' => 'AhmadLT Regular',
                      'AkramUnicode Regular' => 'Akram Unicode',
                      'Alkatib Regular' => 'Alkatib Regular',
                      'AlQalam Regular' => 'AlQalam Regular',
                      'AlQalam Telenor' => 'AlQalam Telenor',
                      'Batool Unicode Regular' => 'Batool Unicode',
                      'Fajar Nastaleeq' => 'Fajar Nastaleeq',
                      'Nastaleeq Like' => 'Nastaleeq Like',
                      'Pak Lotus' => 'Pak Lotus',
                      'Sameer Zikran' => 'Sameer Zikran',
                      'Microsoft Uighur' => 'Microsoft Uighur',
                      'nafeesnastaleeq' => 'Nafees Nastaleeq',
                ),
                'font-backup' => true,
                'output'      => array('h4'),
                'units'       =>'px',
                'subtitle'    => __('Heading 4 (H4 tag)', 'xpanel-framework'),
                'default'     => array(
                    'color'       => '#222', 
                    'font-style'  => '400', 
                    'font-family' => 'nafeesnastaleeq', 
                    'google'      => false,
                    'font-size'   => '26px',
                    'line-height' => '48px'
                ),
            ),
            array(
                'id'          => 'font-h5',
                'type'        => 'typography', 
                'title'       => __('H5', 'xpanel-framework'),
                'google'      => false, 
                'fonts'       => array(
                      'El Messiri' => 'El Messiri',
                      'Reem Kufi' => 'Reem Kufi',
                      'Harmattan' => 'Harmattan',
                      'Lateef' => 'Lateef',
                      'Sameer Regular' => 'Sameer Regular',
                      'AhmadLT Regular' => 'AhmadLT Regular',
                      'AkramUnicode Regular' => 'Akram Unicode',
                      'Alkatib Regular' => 'Alkatib Regular',
                      'AlQalam Regular' => 'AlQalam Regular',
                      'AlQalam Telenor' => 'AlQalam Telenor',
                      'Batool Unicode Regular' => 'Batool Unicode',
                      'Fajar Nastaleeq' => 'Fajar Nastaleeq',
                      'Nastaleeq Like' => 'Nastaleeq Like',
                      'Pak Lotus' => 'Pak Lotus',
                      'Sameer Zikran' => 'Sameer Zikran',
                      'Microsoft Uighur' => 'Microsoft Uighur',
                      'nafeesnastaleeq' => 'Nafees Nastaleeq',
                ),
                'font-backup' => true,
                'output'      => array('h5'),
                'units'       =>'px',
                'subtitle'    => __('Heading 5 (H5 tag)', 'xpanel-framework'),
                'default'     => array(
                    'color'       => '#222', 
                    'font-style'  => '400', 
                    'font-family' => 'nafeesnastaleeq', 
                    'google'      => false,
                    'font-size'   => '18px',
                    'line-height' => '36px'
                ),
            ),
            array(
                'id'          => 'font-h6',
                'type'        => 'typography', 
                'title'       => __('H6', 'xpanel-framework'),
                'google'      => false, 
                'fonts'       => array(
                      'El Messiri' => 'El Messiri',
                      'Reem Kufi' => 'Reem Kufi',
                      'Harmattan' => 'Harmattan',
                      'Lateef' => 'Lateef',
                      'Sameer Regular' => 'Sameer Regular',
                      'AhmadLT Regular' => 'AhmadLT Regular',
                      'AkramUnicode Regular' => 'Akram Unicode',
                      'Alkatib Regular' => 'Alkatib Regular',
                      'AlQalam Regular' => 'AlQalam Regular',
                      'AlQalam Telenor' => 'AlQalam Telenor',
                      'Batool Unicode Regular' => 'Batool Unicode',
                      'Fajar Nastaleeq' => 'Fajar Nastaleeq',
                      'Nastaleeq Like' => 'Nastaleeq Like',
                      'Pak Lotus' => 'Pak Lotus',
                      'Sameer Zikran' => 'Sameer Zikran',
                      'Microsoft Uighur' => 'Microsoft Uighur',
                      'nafeesnastaleeq' => 'Nafees Nastaleeq',
                ), 
                'font-backup' => true,
                'output'      => array('h6'),
                'units'       => 'px',
                'subtitle'    => __('Heading 6 (H6 tag)', 'xpanel-framework'),
                'default'     => array(
                    'color'       => '#222', 
                    'font-style'  => '400', 
                    'font-family' => 'nafeesnastaleeq', 
                    'google'      => false,
                    'font-size'   => '18px',
                    'line-height' => '36px'
                ),
            ),
            
        )
    ) );
    //End of Headings
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Sidebar Widgets', 'xpanel-framework' ),
        'desc'       => __( 'Select Font Styling for Sidebar Widgets', 'xpanel-framework' ),
        'id'         => 'font-sidebar-widget',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'          => 'font-sidebar-widgets-head',
                'type'        => 'typography', 
                'title'       => __('Widget Headings', 'xpanel-framework'),
                'google'      => false, 
                'fonts'       => array(
                      'El Messiri' => 'El Messiri',
                      'Reem Kufi' => 'Reem Kufi',
                      'Harmattan' => 'Harmattan',
                      'Lateef' => 'Lateef',
                      'Sameer Regular' => 'Sameer Regular',
                      'AhmadLT Regular' => 'AhmadLT Regular',
                      'AkramUnicode Regular' => 'Akram Unicode',
                      'Alkatib Regular' => 'Alkatib Regular',
                      'AlQalam Regular' => 'AlQalam Regular',
                      'AlQalam Telenor' => 'AlQalam Telenor',
                      'Batool Unicode Regular' => 'Batool Unicode',
                      'Fajar Nastaleeq' => 'Fajar Nastaleeq',
                      'Nastaleeq Like' => 'Nastaleeq Like',
                      'Pak Lotus' => 'Pak Lotus',
                      'Sameer Zikran' => 'Sameer Zikran',
                      'Microsoft Uighur' => 'Microsoft Uighur',
                      'nafeesnastaleeq' => 'Nafees Nastaleeq',
                ), 
                'font-backup' => true,
                'output'      => array('.widget .widget-title'),
                'units'       =>'px',
                'subtitle'    => __('Sidebar Widget Headings Font Settings', 'xpanel-framework'),
                'default'     => array(
                    'color'       => '#333333', 
                    'font-style'  => '400', 
                    'font-family' => 'nafeesnastaleeq', 
                    'google'      => false,
                    'font-size'   => '24px',
                    'line-height' => '50px'
                ),
            ),
            array(
                'id'          => 'font-sidebar-widgets',
                'type'        => 'typography', 
                'title'       => __('Widget Content', 'xpanel-framework'),
                'google'      => false, 
                'fonts'       => array(
                      'El Messiri' => 'El Messiri',
                      'Reem Kufi' => 'Reem Kufi',
                      'Harmattan' => 'Harmattan',
                      'Lateef' => 'Lateef',
                      'Sameer Regular' => 'Sameer Regular',
                      'AhmadLT Regular' => 'AhmadLT Regular',
                      'AkramUnicode Regular' => 'Akram Unicode',
                      'Alkatib Regular' => 'Alkatib Regular',
                      'AlQalam Regular' => 'AlQalam Regular',
                      'AlQalam Telenor' => 'AlQalam Telenor',
                      'Batool Unicode Regular' => 'Batool Unicode',
                      'Fajar Nastaleeq' => 'Fajar Nastaleeq',
                      'Nastaleeq Like' => 'Nastaleeq Like',
                      'Pak Lotus' => 'Pak Lotus',
                      'Sameer Zikran' => 'Sameer Zikran',
                      'Microsoft Uighur' => 'Microsoft Uighur',
                      'nafeesnastaleeq' => 'Nafees Nastaleeq',
                ), 
                'font-backup' => true,
                'output'      => array('.widget-content'),
                'units'       =>'px',
                'subtitle'    => __('Sidebar Widget Font Settings', 'xpanel-framework'),
                'default'     => array(
                    'color'       => '#333333', 
                    'font-style'  => '400', 
                    'font-family' => 'nafeesnastaleeq', 
                    'google'      => false,
                    'font-size'   => '16px',
                    'line-height' => '32px'
                ),
            ),
            
        )
    ) );
    //End of Sidebar Widget Font Settings
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Footer Widgets', 'xpanel-framework' ),
        'desc'       => __( 'Select Font Styling for Footer Widgets', 'xpanel-framework' ),
        'id'         => 'font-footer',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'          => 'font-footer-widgets',
                'type'        => 'typography', 
                'title'       => __('Footer Widget', 'xpanel-framework'),
                'google'      => false, 
                'fonts'       => array(
                      'El Messiri' => 'El Messiri',
                      'Reem Kufi' => 'Reem Kufi',
                      'Harmattan' => 'Harmattan',
                      'Lateef' => 'Lateef',
                      'Sameer Regular' => 'Sameer Regular',
                      'AhmadLT Regular' => 'AhmadLT Regular',
                      'AkramUnicode Regular' => 'Akram Unicode',
                      'Alkatib Regular' => 'Alkatib Regular',
                      'AlQalam Regular' => 'AlQalam Regular',
                      'AlQalam Telenor' => 'AlQalam Telenor',
                      'Batool Unicode Regular' => 'Batool Unicode',
                      'Fajar Nastaleeq' => 'Fajar Nastaleeq',
                      'Nastaleeq Like' => 'Nastaleeq Like',
                      'Pak Lotus' => 'Pak Lotus',
                      'Sameer Zikran' => 'Sameer Zikran',
                      'Microsoft Uighur' => 'Microsoft Uighur',
                      'nafeesnastaleeq' => 'Nafees Nastaleeq',
                ), 
                'font-backup' => true,
                'output'      => array('.footer-widget'),
                'units'       =>'px',
                'subtitle'    => __('Main Navigation Font Settings', 'xpanel-framework'),
                'default'     => array(
                    'color'       => '#f0f0f0', 
                    'font-style'  => '400', 
                    'font-family' => 'nafeesnastaleeq', 
                    'google'      => false,
                    'font-size'   => '16px',
                    'line-height' => '32px'
                ),
            ),
            
        )
    ) );
    //End of Footer Widget Font Settings
    
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Paragraphs', 'xpanel-framework' ),
        'desc'       => __( 'Select Font Styling for Paragraphs', 'xpanel-framework' ),
        'id'         => 'font-paragraphs',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'          => 'font-p',
                'type'        => 'typography', 
                'title'       => __('<p>', 'xpanel-framework'),
                'google'      => false, 
                'fonts'       => array(
                      'El Messiri' => 'El Messiri',
                      'Reem Kufi' => 'Reem Kufi',
                      'Harmattan' => 'Harmattan',
                      'Lateef' => 'Lateef',
                      'Sameer Regular' => 'Sameer Regular',
                      'AhmadLT Regular' => 'AhmadLT Regular',
                      'AkramUnicode Regular' => 'Akram Unicode',
                      'Alkatib Regular' => 'Alkatib Regular',
                      'AlQalam Regular' => 'AlQalam Regular',
                      'AlQalam Telenor' => 'AlQalam Telenor',
                      'Batool Unicode Regular' => 'Batool Unicode',
                      'Fajar Nastaleeq' => 'Fajar Nastaleeq',
                      'Nastaleeq Like' => 'Nastaleeq Like',
                      'Pak Lotus' => 'Pak Lotus',
                      'Sameer Zikran' => 'Sameer Zikran',
                      'Microsoft Uighur' => 'Microsoft Uighur',
                      'nafeesnastaleeq' => 'Nafees Nastaleeq',
                ), 
                'font-backup' => true,
                'output'      => array('.entry-content p, .block-post-row p, .archive .entry-content p'),
                'units'       =>'px',
                'subtitle'    => __('Paragraph Font Settings', 'xpanel-framework'),
                'default'     => array(
                    'color'       => '#555', 
                    'font-style'  => '400', 
                    'font-family' => 'nafeesnastaleeq', 
                    'google'      => false,
                    'font-size'   => '22px',
                    'line-height' => '44px'
                ),
            ),
            
        )
    ) );
    //End of Paragraphs
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Menu', 'xpanel-framework' ),
        'desc'       => __( 'Select Font Styling for Top Menu', 'xpanel-framework' ),
        'id'         => 'font-navigation',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'          => 'font-nav',
                'type'        => 'typography', 
                'title'       => __('<p>', 'xpanel-framework'),
                'google'      => false, 
                'fonts'       => array(
                      'El Messiri' => 'El Messiri',
                      'Reem Kufi' => 'Reem Kufi',
                      'Harmattan' => 'Harmattan',
                      'Lateef' => 'Lateef',
                      'Sameer Regular' => 'Sameer Regular',
                      'AhmadLT Regular' => 'AhmadLT Regular',
                      'AkramUnicode Regular' => 'Akram Unicode',
                      'Alkatib Regular' => 'Alkatib Regular',
                      'AlQalam Regular' => 'AlQalam Regular',
                      'AlQalam Telenor' => 'AlQalam Telenor',
                      'Batool Unicode Regular' => 'Batool Unicode',
                      'Fajar Nastaleeq' => 'Fajar Nastaleeq',
                      'Nastaleeq Like' => 'Nastaleeq Like',
                      'Pak Lotus' => 'Pak Lotus',
                      'Sameer Zikran' => 'Sameer Zikran',
                      'Microsoft Uighur' => 'Microsoft Uighur',
                      'nafeesnastaleeq' => 'Nafees Nastaleeq',
                ), 
                'font-backup' => true,
                'output'      => array('.main-menu', '.main-menu-v3 li a'),
                'units'       =>'px',
                'subtitle'    => __('Main Navigation Font Settings', 'xpanel-framework'),
                'default'     => array(
                    'color'       => '#f0f0f0', 
                    'font-style'  => '400', 
                    'font-family' => 'Alkatib Regular', 
                    'google'      => false,
                    'font-size'   => '20px',
                    'line-height' => '30px'
                ),
            ),
            
        )
    ) );
    //End of Navigation
    Redux::setSection( $opt_name, array(
        'title'      => __( 'News Ticker', 'xpanel-framework' ),
        'desc'       => __( 'Select Font Styling for News Ticker', 'xpanel-framework' ),
        'id'         => 'font-ticker',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'          => 'font-ticker-label',
                'type'        => 'typography', 
                'title'       => __('News Ticker Label', 'xpanel-framework'),
                'google'      => false, 
                'fonts'       => array(
                      'El Messiri' => 'El Messiri',
                      'Reem Kufi' => 'Reem Kufi',
                      'Harmattan' => 'Harmattan',
                      'Lateef' => 'Lateef',
                      'Sameer Regular' => 'Sameer Regular',
                      'AhmadLT Regular' => 'AhmadLT Regular',
                      'AkramUnicode Regular' => 'Akram Unicode',
                      'Alkatib Regular' => 'Alkatib Regular',
                      'AlQalam Regular' => 'AlQalam Regular',
                      'AlQalam Telenor' => 'AlQalam Telenor',
                      'Batool Unicode Regular' => 'Batool Unicode',
                      'Fajar Nastaleeq' => 'Fajar Nastaleeq',
                      'Nastaleeq Like' => 'Nastaleeq Like',
                      'Pak Lotus' => 'Pak Lotus',
                      'Sameer Zikran' => 'Sameer Zikran',
                      'Microsoft Uighur' => 'Microsoft Uighur',
                      'nafeesnastaleeq' => 'Nafees Nastaleeq',
                ), 
                'font-backup' => true,
                'output'      => array('.breaking_head'),
                'units'       =>'px',
                'subtitle'    => __('News Ticker Label Font Settings', 'xpanel-framework'),
                'default'     => array(
                    'color'       => '#FFF', 
                    'font-style'  => '400', 
                    'font-family' => 'AlQalam Telenor', 
                    'google'      => false,
                    'font-size'   => '22px',
                    'line-height' => '24px'
                ),
            ),
            array(
                'id'          => 'font-ticker-body',
                'type'        => 'typography', 
                'title'       => __('News Ticker Body', 'xpanel-framework'),
                'google'      => false, 
                'fonts'       => array(
                      'El Messiri' => 'El Messiri',
                      'Reem Kufi' => 'Reem Kufi',
                      'Harmattan' => 'Harmattan',
                      'Lateef' => 'Lateef',
                      'Sameer Regular' => 'Sameer Regular',
                      'AhmadLT Regular' => 'AhmadLT Regular',
                      'AkramUnicode Regular' => 'Akram Unicode',
                      'Alkatib Regular' => 'Alkatib Regular',
                      'AlQalam Regular' => 'AlQalam Regular',
                      'AlQalam Telenor' => 'AlQalam Telenor',
                      'Batool Unicode Regular' => 'Batool Unicode',
                      'Fajar Nastaleeq' => 'Fajar Nastaleeq',
                      'Nastaleeq Like' => 'Nastaleeq Like',
                      'Pak Lotus' => 'Pak Lotus',
                      'Sameer Zikran' => 'Sameer Zikran',
                      'Microsoft Uighur' => 'Microsoft Uighur',
                      'nafeesnastaleeq' => 'Nafees Nastaleeq',
                ), 
                'font-backup' => true,
                'output'      => array('.breaking_body a'),   
                'units'       =>'px',
                'subtitle'    => __('News Ticker Body Font Settings', 'xpanel-framework'),
                'default'     => array(
                    'color'       => '#FFF', 
                    'font-style'  => '400', 
                    'font-family' => 'nafeesnastaleeq', 
                    'google'      => false,
                    'font-size'   => '18px',
                    'line-height' => '36px'
                ),
            ),
            
        )
    ) );
    //End of News Ticker Font Settings
    Redux::setSection( $opt_name, array(
        'title' => __( 'Social Media', 'xpanel-framework' ),
        'id'    => 'social',
        'desc'  => __( 'Social Media Icons & Sharing Settings.', 'xpanel-framework' ),
        'icon'  => 'el el-share'
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => __( 'URL Settings', 'xpanel-framework' ),
        'desc'       => __( 'Enter Your Social Media Profile Links. These linked icons will be displayed in footer.', 'xpanel-framework' ),
        'id'         => 'social-urls',
        'subsection' => true,

        'fields'     => array(
            array(
                'id'       => 'fb-url',
                'type'     => 'text',
                'title'    => __('Facebook URL', 'xpanel-framework'),
                'subtitle' => __('Enter your facebook page or profile URL here.', 'xpanel-framework'),
                'desc'     => __('', 'xpanel-framework'),
                'validate' => 'url',
                'msg'      => 'Please enter a valid URL',
                'default'  => 'http://www.facebook.com'
            ),
            array(
                'id'       => 'twitter-url',
                'type'     => 'text',
                'title'    => __('Twitter URL', 'xpanel-framework'),
                'subtitle' => __('Enter your twitter profile URL here.', 'xpanel-framework'),
                'desc'     => __('', 'xpanel-framework'),
                'validate' => 'url',
                'msg'      => 'Please enter a valid URL',
                'default'  => 'http://www.twitter.com'
            ),
            array(
                'id'       => 'pinterest-url',
                'type'     => 'text',
                'title'    => __('Pinterest URL', 'xpanel-framework'),
                'subtitle' => __('Enter your Pinterest profile URL here.', 'xpanel-framework'),
                'desc'     => __('', 'xpanel-framework'),
                'validate' => 'url',
                'msg'      => 'Please enter a valid URL',
                'default'  => 'http://www.pinterest.com'
            ),
            array(
                'id'       => 'linkedin-url',
                'type'     => 'text',
                'title'    => __('LinkedIn URL', 'xpanel-framework'),
                'subtitle' => __('Enter your LinkedIn profile or Company URL here.', 'xpanel-framework'),
                'desc'     => __('', 'xpanel-framework'),
                'validate' => 'url',
                'msg'      => 'Please enter a valid URL',
                'default'  => 'http://www.linkedin.com'
            ),
            array(
                'id'       => 'reddit-url',
                'type'     => 'text',
                'title'    => __('Reddit URL', 'xpanel-framework'),
                'subtitle' => __('Enter your Reddit profile or sub-reddit URL here.', 'xpanel-framework'),
                'desc'     => __('', 'xpanel-framework'),
                'validate' => 'url',
                'msg'      => 'Please enter a valid URL',
                'default'  => 'http://www.reddit.com'
            ),
            array(
                'id'       => 'instagram-url',
                'type'     => 'text',
                'title'    => __('Instagram URL', 'xpanel-framework'),
                'subtitle' => __('Enter your Instagram profile URL here.', 'xpanel-framework'),
                'desc'     => __('', 'xpanel-framework'),
                'validate' => 'url',
                'msg'      => 'Please enter a valid URL',
                'default'  => 'http://www.instagram.com'
            ),
            array(
                'id'       => 'youtube-url',
                'type'     => 'text',
                'title'    => __('YouTube URL', 'xpanel-framework'),
                'subtitle' => __('Enter your YouTube Channel or profile URL here.', 'xpanel-framework'),
                'desc'     => __('', 'xpanel-framework'),
                'validate' => 'url',
                'msg'      => 'Please enter a valid URL',
                'default'  => 'http://www.youtube.com'
            ),
        )
    ) );
    //End of Social Media URL Settings
    
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Sharing Settings', 'xpanel-framework' ),
        'desc'       => __( 'Manage Sharing & Social Media Button Settings', 'xpanel-framework' ),
        'id'         => 'social-settings',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'social-sidebar',
                'type'     => 'checkbox',
                'title'    => __('Enable Sharing', 'xpanel-framework'), 
                'subtitle' => __('Enable or Disable Social Media Sharing Buttons', 'xpanel-framework'),
                'desc'     => __('', 'xpanel-framework'),
                'default'  => '1'// 1 = on | 0 = off
            ),
            array(
                'id'       => 'social-postion',
                'type'     => 'select',
                'title'    => __('Select Position', 'xpanel-framework'), 
                'subtitle' => __('Slect where you want to display sidebar, Left or Right', 'xpanel-framework'),
                'desc'     => __('', 'xpanel-framework'),
                'options'  => array(
                    '1' => 'Above Post',
                    '2' => 'Below Featured Image',
                    '3' => 'Below Post'
                ),
                'default'  => '2',
            ),
            array(
                'id'       => 'social-rounded',
                'type'     => 'checkbox',
                'title'    => __('Enable Rounded Icons?', 'xpanel-framework'), 
                'subtitle' => __('If Enabled, Icons will be in round shape. Default are Square', 'xpanel-framework'),
                'desc'     => __('', 'xpanel-framework'),
                'default'  => '0'// 1 = on | 0 = off
            ),
            array(
                'id'       => 'social-fixed-mobile',
                'type'     => 'checkbox',
                'title'    => __('Stick Bottom on Mobile?', 'xpanel-framework'), 
                'subtitle' => __('If Enabled, Icons will be sticked to bottom on mobile screens', 'xpanel-framework'),
                'desc'     => __('', 'xpanel-framework'),
                'default'  => '1'// 1 = on | 0 = off
            ),
            array(
                'id'       => 'social-hover',
                'type'     => 'checkbox',
                'title'    => __('Hover Effects?', 'xpanel-framework'), 
                'subtitle' => __('Enable or Disable Beautiful Hover effect on social media icons', 'xpanel-framework'),
                'desc'     => __('', 'xpanel-framework'),
                'default'  => '1'// 1 = on | 0 = off
            ),
        )
    ) );
    /* End of Social Media Icons Settings */

    /*
     * <--- END SECTIONS
     */
