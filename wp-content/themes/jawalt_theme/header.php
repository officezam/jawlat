<?php/** * The template for displaying the header * * Displays all of the head element and everything up until the "site-content" div. * * @package WordPress * @subpackage Twenty_Sixteen * @since Twenty Sixteen 1.0 */?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js" >
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <!--*****************-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,700,600italic,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,300italic,100italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href="<?php bloginfo('stylesheet_directory'); ?>/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/css/typo.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="<?php bloginfo('stylesheet_directory'); ?>/css/animate.min.css" rel="stylesheet">

    <style>


        .menu-custom{
            opacity: 0.9;
            -webkit-box-shadow: 0 8px 6px -6px black;
            -moz-box-shadow: 0 8px 6px -6px black;
            box-shadow: 0 8px 6px -6px black;
        }
        .prisna-gwt-flags-container.prisna-gwt-align-left.notranslate {
            display: block;
        }
        .prisna-gwt-align-left {
            display: none;
        }
        .dropdown-flag li.prisna-gwt-flag-container {
            display: inline-block;
            list-style: outside none none !important;
            margin: 6px 7px 0 0 !important;
            overflow: hidden !important;
            padding: 0 !important;
        }
        .dropdown-flag {
            background: rgba(0, 0, 0, 0) url("images/flag.jpg") no-repeat scroll left center !important;

        }
        .dropdown-flag .prisna-gwt-language-ar a {
            background-position: -44px -145px !important;
        }

        @media (max-width:720px)  {
            #back {
                background-image:none
            }
        }

        }


    </style>


    <style type="text/css">
        .prisna-gwt-align-left {
            text-align: left !important;
        }
        .prisna-gwt-align-right {
            text-align: right !important;
        }
        .prisna-gwt-flags-container {
            list-style: none !important;
            margin: 0 !important;
            padding: 0 !important;
            border: none !important;
            clear: both !important;
        }
        .prisna-gwt-flag-container {
            list-style: none !important;
            display: inline-block;
            margin: 0 2px 0 0 !important;
            padding: 0 !important;
            border: none !important;
        }
        .prisna-gwt-flag-container a {
            display: inline-block;
            margin: 0 !important;
            padding: 0 !important;
            border: none !important;
            background-repeat: no-repeat !important;
            background-image: url(<?php  echo get_site_url();?>/wp-content/themes/jawalt_theme/images/all.png) !important;
            width: 22px !important;
            height: 16px !important;
        }
        .prisna-gwt-language-en a { background-position: 0px 0px !important; }
        .prisna-gwt-language-ar a { background-position: -44px -32px !important; }
        body {
            top: 0 !important;
        }
        .goog-te-banner-frame {
            display: none !important;
            visibility: hidden !important;
        }
        .goog-tooltip,
        .goog-tooltip:hover {
            display: none !important;
        }
        .goog-text-highlight {
            background-color: transparent !important;
            border: none !important;
            box-shadow: none !important;
        }
        @media (max-width: 484px) {
            .search_outer {margin-top: 23px; margin-right:-76px;}
            .btn-danger{padding: 2px 2px;}
            #s{ width: 40%;}
            .dropdown-flag{margin-top: 0px;}
        }
    </style>

    <style>
        @media (max-width: 800px)
        {
            body {
                margin: 0;
                /*padding: 45px 0 0 0 !important;*/
            }
            .menu-bar{ display: none !important;}
        }
    </style>


    <style>
        @media (max-width: 484px) {				.logo {width:78px;}			}
    </style>

    <!-- *****************-->
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>
    <?php wp_head(); ?>
</head>
<?php //$slug = basename(get_permalink());
//if($slug == 'www.jawlat.com.sa' OR $slug == 'tour-packages' ){ $background = '1';  }else{ $background = 'http://www.jawlat.com.sa/wp-content/uploads/2016/11/1.png';} ?>
<body <?php body_class(); ?>  style='background-size: 100% 100%' id="back" >
<header>

    <?php	if( Language == 'Arabic')	{		?>
        <style>
            .logo {float: right;
                /*margin-right: -56px;*/
            }
            .language {
                margin-top: -50px;
                z-index: 9999;
                float: left;
                /*position: absolute;*/
                /*left: 97px;*/
            }
            .search_outer{
                float: left;
                margin-top: -80px;
                margin-right: 15px;
            }
            .menu .navbar-nav li {
                float: right;
                margin-left: 10px;
                list-style-type: none;
            }
            .menu .navbar-nav li ul.sub-menu {
                background-color: #ffffff;
                border: 1px solid #cccccc;
                border-radius: 5px;
                padding: 5px 18px;
                position: absolute;
                width: 258px;
            }
            .collapse.navbar-collapse{
                float: right;
            }
            .menu ul li {
                display: inline-block;
                margin-right: 25px;
                float: right;
            }
            .m-b-25 { float: right;}
            .travel-image{float: right;}
            .m-t-0 a{float: right;}
            @media (min-width: 800px) {
                .col-md-9{float: right;}
            }
            .post_detail_page h2{text-align: right;}
            .col-sm-4 h3{text-align: right;}
            .entry p{ text-align: right;}
            .travel{text-align: right;}
            .tour-widget{text-align: right;}
            .col-sm-12 h2{text-align: center; float: right;
            }
            .latest h4{ text-align: center;}
            .arabic_right{ float: right;}
            .col-sm-4 h2{text-align: right;}
            .post_detail_page{ text-align: right;}
            .container-fluid{direction: rtl;}
            .tabs-flat ul.tabs-nav { text-align: right; direction: rtl;  }
            .text-left { text-align: right; direction: rtl;  }
            th {text-align: right; }

            .arrow{
                float: right;
                padding: 20px;
            }
        </style>
    <?php }else{ ?>
        <style>
            .language {
                float: right;
                margin-top: -50px;
                /*position: absolute;*/
                /*right: 129px;*/
                z-index: 9999;
            }
            .search_outer{
                float: right;
                margin-top: -80px;
                /*margin-right: 15px;	*/
            }
            .arrow{
                float: left;
                padding: 40px 10px 0px 6px;
            }
        </style>
    <?php } ?>


    <div class="container container2">

        <div class="row-inner">
            <div class="logo">
                <a href="<?php echo get_home_url(); ?>">
                    <img src="<?php bloginfo('template_directory'); ?>/images/logo.png" class="logo">
                </a>
            </div>
            <div class="menu-bar">
                <div class="container">

                    <div class="menu">
                        <nav class="navbar navbar-default main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'twentysixteen' ); ?>">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                            </div>
                            <style>
                                .collapse.navbar-collapse {
                                    margin-top: 30px !important;
                                }
                            </style>

                            <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
                                <?php
                                if( Language == 'Arabic')
                                {
                                    wp_nav_menu( array(
                                        'theme_location' => 'my-custom-menu',
                                        'menu_class'     => 'nav navbar-nav'
                                    ) );
                                }else{
                                    wp_nav_menu( array(
                                        'theme_location' => 'primary',
                                        'menu_class'     => 'nav navbar-nav',
                                    ) );
                                }
                                ?>
                                <!-- /.navbar-collapse -->
                        </nav>
                    </div>
                </div>
            </div>
            <div class="language">
                <div class="dropdown-flag">
                    <ul class="prisna-gwt-flags-container prisna-gwt-align-left notranslate">
                        <li class="prisna-gwt-flag-container prisna-gwt-language-en"> <a href="<?php  echo get_permalink(); ?>?lang=English"  title="English"></a> </li>
                        <li class="prisna-gwt-flag-container prisna-gwt-language-ar"> <a href="<?php  echo get_permalink(); ?>?lang=Arabic"   title="Arabic"></a> </li>
                    </ul>
                </div>
            </div>
            <style>
                #s{
                    border: 1px solid white !important;
                    border-radius: 5px !important;
                    background: transparent;
                }
            </style>
            <div class="search_outer">
                <form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
                    <div>
                        <input <?php if( Language == 'Arabic'){ ?>dir="rtl" <?php } ?> type="text"  value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" />
                        <input type="submit" id="searchsubmit" value="<?php if( Language == 'Arabic'){ echo 'بحث';}else{ echo 'Search';} ?>" class="btn btn-danger"  style="padding: 2px 12px; margin-top: -4px;"/>
                    </div>
                </form>
            </div>
        </div>

    </div>

</header>
