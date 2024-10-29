<?php
    include('conn.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en-US" data-menu="leftalign">

<head>


    <link rel="shortcut icon" href="upload/TG-Thumb.png" />

    <title>Ride for your dream</title>


    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="format-detection" content="telephone=no">

    <link rel='stylesheet' href='js/plugins/grandcarrental-custom-post/css/fontawesome-stars-o.css' type='text/css'
        media='all' />
    <link rel='stylesheet' href='js/plugins/post-views-counter/css/frontend.css' type='text/css' media='all' />
    <link rel='stylesheet' href='js/plugins/revslider/public/assets/css/settings.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/reset.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/wordpress.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/animation.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/ilightbox/ilightbox.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/jqueryui/custom.css' type='text/css' media='all' />
    <link rel='stylesheet' href='js/plugins/mediaelement/mediaelementplayer-legacy.min.css' type='text/css'
        media='all' />
    <link rel='stylesheet' href='js/plugins/flexslider/flexslider.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/tooltipster.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/odometer-theme-minimal.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/menus/leftalignmenu.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/font-awesome.min.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/themify-icons.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/kirki.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/grid.css' type='text/css' media='all' />


    <link rel='stylesheet'
        href='https://fonts.googleapis.com/css?family=Work+Sans%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900%7CPoppins%3A300%2Cregular%2C500%2C600%2C700%2C900&#038;subset'
        type='text/css' media='all' />

    <style>
        .d-none {
            display: none;
        }
    </style>
</head>

<body class="home page-template-default page page-id-3075 woocommerce-no-js ppb_enable">

    <input type="hidden" id="pp_menu_layout" name="pp_menu_layout" value="leftalign" />
    <input type="hidden" id="pp_enable_right_click" name="pp_enable_right_click" value="0" />
    <input type="hidden" id="pp_enable_dragging" name="pp_enable_dragging" value="0" />
    <input type="hidden" id="pp_image_path" name="pp_image_path"
        value="http://themes.themegoods.com/grandcarrental/demo/wp-content/themes/grandcarrental/images/" />
    <input type="hidden" id="pp_homepage_url" name="pp_homepage_url" value="index.html" />
    <input type="hidden" id="pp_fixed_menu" name="pp_fixed_menu" value="1" />
    <input type="hidden" id="tg_smart_fixed_menu" name="tg_smart_fixed_menu" value="0" />
    <input type="hidden" id="tg_sidebar_sticky" name="tg_sidebar_sticky" value="1" />
    <input type="hidden" id="pp_topbar" name="pp_topbar" value="1" />
    <input type="hidden" id="post_client_column" name="post_client_column" value="4" />
    <input type="hidden" id="pp_back" name="pp_back" value="Back" />
    <input type="hidden" id="pp_page_title_img_blur" name="pp_page_title_img_blur" value="" />
    <input type="hidden" id="tg_portfolio_filterable_link" name="tg_portfolio_filterable_link" value="" />
    <input type="hidden" id="tg_flow_enable_reflection" name="tg_flow_enable_reflection" value="" />
    <input type="hidden" id="tg_lightbox_skin" name="tg_lightbox_skin" value="metro-black" />
    <input type="hidden" id="tg_lightbox_thumbnails" name="tg_lightbox_thumbnails" value="horizontal" />
    <input type="hidden" id="tg_lightbox_thumbnails_display" name="tg_lightbox_thumbnails_display" value="1" />
    <input type="hidden" id="tg_lightbox_opacity" name="tg_lightbox_opacity" value="0.8" />
    <input type="hidden" id="tg_cart_url" name="tg_cart_url"
        value="http://themes.themegoods.com/grandcarrental/demo/cart/" />
    <input type="hidden" id="tg_live_builder" name="tg_live_builder" value="0" />
    <input type="hidden" id="pp_footer_style" name="pp_footer_style" value="3" />

    <!-- Begin mobile menu -->
    <a id="close_mobile_menu" href="javascript:;"></a>

    <div class="mobile_menu_wrapper">
        <a id="mobile_menu_close" href="javascript:;" class="button"><span class="ti-close"></span></a>

        <div class="mobile_menu_content">

            <div class="menu-main-menu-container">
                <ul id="mobile_main_menu" class="mobile_main_nav">
                    <li class="menu-item menu-item-has-children">
                        <a href="index.php">Home</a>
                    </li>
                    <li class="menu-item menu-item-has-children">
                        <a href="booking">Booking</a>
                    </li>
                    <li class="menu-item menu-item-has-children">
                        <a href="services.php">Services</a>
                    </li>
                    <li class="menu-item menu-item-has-children">
                        <a href="gallary.php">Gallary</a>
                    </li>
                    <li class="menu-item menu-item-has-children">
                        <a href="contact-us.php">Contact Us</a>
                    </li>
                    
                    
                    <?php 
                        if(isset($_SESSION['USER_LOGIN'])){
                        ?>
                            <li class="menu-item menu-item-has-children"><a href="#"><?php $_SESSION['USER_NAME']; ?></a>
                                <ul class="sub-menu">
                                    <li class="menu-item"><a href="audi-a4.html">Car Rental</a></li>
                                    <li class="menu-item"><a href="porsche-boxster.html">Car Rental Compact Form</a></li>
                                    <li class="menu-item"><a href="mercedes-benz-gle.html">Limousine One Way Transfer</a></li>
                                    <li class="menu-item"><a href="porsche-cayenne.html">Limousine Hourly Service</a></li>
                                    <li class="menu-item"><a href="lexus-rx-350.html">Request for Booking Only</a></li>
                                    <li class="menu-item"><a href="bmw-3-series.html">Standard Background Header</a></li>
                                    <li class="menu-item"><a href="mercedes-benz-cls-class.html">Video Background Header</a>
                                    </li>
                                </ul>
                            </li>
                    <?php
                        }
                    ?>
                    <li class="menu-item menu-item-has-children">
                        <a href="login.php">login</a>
                    </li>
                    <li class="">
                        <a href="booking.php">Booking</a>
                    </li>
                </ul>
            </div>
            <!-- Begin side menu sidebar -->
            <div class="page_content_wrapper">
                <div class="sidebar_wrapper">
                    <div class="sidebar">
                        <div class="content">
                            <ul class="sidebar_widget">
                                <li id="text-8" class="widget widget_text">
                                    <h2 class="widgettitle">For More Informations</h2>
                                    <div class="textwidget"><span class="ti-mobile"
                                            style="margin-right:10px;"></span>+91 6366337382
                                        <br />
                                        <span class="ti-alarm-clock" style="margin-right:10px;"></span>Mon - Sat 8.00 -
                                        18.00</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End side menu sidebar -->

            <div class="social_wrapper">
                <ul>
                    <li class="facebook"><a target="_blank" href="#"><i class="fa fa-facebook-official"></i></a></li>
                    <li class="twitter"><a target="_blank" href="http://twitter.com/#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li class="youtube"><a target="_blank" title="Youtube" href="#"><i class="fa fa-youtube"></i></a>
                    </li>
                    <li class="pinterest"><a target="_blank" title="Pinterest" href="http://pinterest.com/#"><i
                                class="fa fa-pinterest"></i></a></li>
                    <li class="instagram"><a target="_blank" title="Instagram" href="http://instagram.com/theplanetd"><i
                                class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End mobile menu -->
    <!-- Begin template wrapper -->
    <div id="wrapper" class="hasbg transparent">

        <div class="header_style_wrapper">

            <!-- Begin top bar -->
            <div class="above_top_bar">
                <div class="page_content_wrapper">

                    <div class="social_wrapper">
                        <ul>
                            <li class="facebook"><a target="_blank" href="#"><i class="fa fa-facebook-official"></i></a>
                            </li>
                            <li class="twitter"><a target="_blank" href="http://twitter.com/#"><i
                                        class="fa fa-twitter"></i></a></li>
                            <li class="youtube"><a target="_blank" title="Youtube" href="#"><i
                                        class="fa fa-youtube"></i></a></li>
                            <li class="pinterest"><a target="_blank" title="Pinterest" href="http://pinterest.com/#"><i
                                        class="fa fa-pinterest"></i></a></li>
                            <li class="instagram"><a target="_blank" title="Instagram"
                                    href="http://instagram.com/theplanetd"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                    <div class="top_contact_info">
                        <div class="company_address">
                            <div id="top_contact_address"><span class="ti-location-pin"></span>184 building-1,divine shopping,pune
                            </div>
                        </div>
                        <div>
                            <div id="top_contact_number"><a href="tel:1.800.456.6743"><span
                                        class="ti-mobile"></span>+91 6366337382</a></div>
                        </div>
                        <div>
                            <div id="top_contact_hours"><span class="ti-alarm-clock"></span>Mon-Fri 09.00 - 17.00</div>
                        </div>
                    </div>
                    <br class="clear" />
                </div>
            </div>
            <!-- End top bar -->
            <div class="top_bar hasbg">
                <div class="standard_wrapper">
                    <!-- Begin logo -->
                    <div id="logo_wrapper">

                        <div id="logo_normal" class="logo_container">
                            <div class="logo_align">
                                <a id="custom_logo" class="logo_wrapper hidden" href="index.html">
                                    <img src="images/logo@2x_white.png" alt="" width="275" height="55" style="margin-bottom: 15px;" />
                                </a>
                            </div>
                        </div>

                        <div id="logo_transparent" class="logo_container">
                            <div class="logo_align">
                                <a id="custom_logo_transparent" class="logo_wrapper default" href="index.html">
                                    <img src="images/logo@2x_white.png" alt="" width="275" height="55" style="margin-bottom: 15px;" />
                                </a>
                            </div>
                        </div>
                        <!-- End logo -->

                        <div id="menu_wrapper">
                            <div id="nav_wrapper">
                                <div class="nav_wrapper_inner">
                                    <div id="menu_border_wrapper">
                                        <div class="menu-main-menu-container">
                                            <ul id="main_menu" class="nav">
                                                <li class="menu-item menu-item-has-children">
                                                    <a href="index.php">Home</a>
                                                </li>
                                                <li class="menu-item menu-item-has-children">
                                                    <a href="booking.php">Booking</a>
                                                </li>
                                                <li class="menu-item menu-item-has-children">
                                                    <a href="service.php">Services</a>
                                                </li>
                                                <li class="menu-item menu-item-has-children">
                                                    <a href="gallary.php">Gallary</a>
                                                </li>
                                                <li class="menu-item menu-item-has-children">
                                                    <a href="contact-us.php">Contact Us</a>
                                                </li>
                                                
                                                <?php 
                                                        if(isset($_SESSION['USER_ID'])){
                                                        ?>
                                                            <li class="menu-item menu-item-has-children"><a href="#"><?=$_SESSION['USER_NAME']; ?></a>
                                                                <ul class="sub-menu">
                                                                    <li class="menu-item"><a href="profile.php">View Profile</a></li>
                                                                    <li class="menu-item"><a href="history.php">History</a></li>
                                                                    <li class="menu-item"><a href="logout.php">Logout</a></li>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                    <?php
                                                        }else{
                                                    ?>
                                                        <li class="menu-item menu-item-has-children">
                                                            <a href="login.php">login</a>
                                                        </li>
                                                    <?php
                                                        }
                                                    ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Begin right corner buttons -->
                                <div id="logo_right_button">

                                    <!-- Begin side menu -->
                                    <a href="javascript:;" id="mobile_nav_icon"><span class="ti-menu"></span></a>
                                    <!-- End side menu -->

                                </div>
                                <!-- End right corner buttons -->
                            </div>
                            <!-- End main nav -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>