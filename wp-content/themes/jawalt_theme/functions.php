<?php
/**
 * Twenty Sixteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

/**
 * Twenty Sixteen only works in WordPress 4.4 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twentysixteen_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * Create your own twentysixteen_setup() function to override in a child theme.
	 *
	 * @since Twenty Sixteen 1.0
	 */
	function twentysixteen_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Twenty Sixteen, use a find and replace
		 * to change 'twentysixteen' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'twentysixteen', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for custom logo.
		 *
		 *  @since Twenty Sixteen 1.2
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 240,
			'width'       => 240,
			'flex-height' => true,
		) );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1200, 9999 );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'twentysixteen' ),
			'social'  => __( 'Social Links Menu', 'twentysixteen' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'status',
			'audio',
			'chat',
		) );

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, icons, and column width.
		 */
		add_editor_style( array( 'css/editor-style.css', twentysixteen_fonts_url() ) );

		// Indicate widget sidebars can use selective refresh in the Customizer.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif; // twentysixteen_setup
add_action( 'after_setup_theme', 'twentysixteen_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'twentysixteen_content_width', 840 );
}
add_action( 'after_setup_theme', 'twentysixteen_content_width', 0 );

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'twentysixteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 1', 'twentysixteen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 2', 'twentysixteen' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

    register_sidebar(
        array(
            'name' => 'Footer Social Icon',
            'description' => 'My new widget area to appear Footer Social Icon',
            'before_widget' => '<div class="bottom_post">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        )
    );
}
add_action( 'widgets_init', 'twentysixteen_widgets_init' );

if ( ! function_exists( 'twentysixteen_fonts_url' ) ) :
	/**
	 * Register Google fonts for Twenty Sixteen.
	 *
	 * Create your own twentysixteen_fonts_url() function to override in a child theme.
	 *
	 * @since Twenty Sixteen 1.0
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function twentysixteen_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'twentysixteen' ) ) {
			$fonts[] = 'Merriweather:400,700,900,400italic,700italic,900italic';
		}

		/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'twentysixteen' ) ) {
			$fonts[] = 'Montserrat:400,700';
		}

		/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'twentysixteen' ) ) {
			$fonts[] = 'Inconsolata:400';
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), 'https://fonts.googleapis.com/css' );
		}

		return $fonts_url;
	}
endif;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentysixteen_javascript_detection', 0 );

/**
 * Enqueues scripts and styles.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'twentysixteen-fonts', twentysixteen_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );

	// Theme stylesheet.
	wp_enqueue_style( 'twentysixteen-style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentysixteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentysixteen-style' ), '20160412' );
	wp_style_add_data( 'twentysixteen-ie', 'conditional', 'lt IE 10' );

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'twentysixteen-ie8', get_template_directory_uri() . '/css/ie8.css', array( 'twentysixteen-style' ), '20160412' );
	wp_style_add_data( 'twentysixteen-ie8', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'twentysixteen-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'twentysixteen-style' ), '20160412' );
	wp_style_add_data( 'twentysixteen-ie7', 'conditional', 'lt IE 8' );

	// Load the html5 shiv.
	wp_enqueue_script( 'twentysixteen-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'twentysixteen-html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'twentysixteen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20160412', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'twentysixteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20160412' );
	}

	wp_enqueue_script( 'twentysixteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20160412', true );

	wp_localize_script( 'twentysixteen-script', 'screenReaderText', array(
		'expand'   => __( 'expand child menu', 'twentysixteen' ),
		'collapse' => __( 'collapse child menu', 'twentysixteen' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'twentysixteen_scripts' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function twentysixteen_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'twentysixteen_body_classes' );

/**
 * Converts a HEX value to RGB.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function twentysixteen_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) === 3 ) {
		$r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
	} else if ( strlen( $color ) === 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function twentysixteen_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	840 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';

	if ( 'page' === get_post_type() ) {
		840 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	} else {
		840 > $width && 600 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
		600 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'twentysixteen_content_image_sizes_attr', 10 , 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function twentysixteen_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		! is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
	}
	return $attr;
}

add_filter( 'wp_get_attachment_image_attributes', 'twentysixteen_post_thumbnail_sizes_attr', 10 , 3 );

/**
 * Modifies tag cloud widget arguments to have all tags in the widget same font size.
 *
 * @since Twenty Sixteen 1.1
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array A new modified arguments.
 */
function twentysixteen_widget_tag_cloud_args( $args ) {
	$args['largest'] = 1;
	$args['smallest'] = 1;
	$args['unit'] = 'em';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'twentysixteen_widget_tag_cloud_args' );



/*
  * Function For Dashboard menu
  * Make Custom Search option on front site
  *
  * */
function my_dashboard_menu(){

	$page_title  = 'My Deashboard Page';
	$menu_title  = 'Custom Search';
	$capability  = 'read';
	$menu_slug   = 'my-dashboard-option';
	$function    = 'search_option_cutom';

	add_dashboard_page( $page_title, $menu_title, $capability, $menu_slug , $function);
}


function Tabs_Post_ID_All()
{
    $language = Language;
    global $wpdb;
    $Tabs_posts_id = $wpdb->get_results("SELECT post_id FROM wp_posts as p INNER JOIN wp_postmeta as m ON p.ID = m.post_id AND m.meta_value = '$language' AND p.post_type = 'tabs' ");
    return $Tabs_posts_id;

}

function Get_Tabs_Url($postID)
{
    global $wpdb;
    $page_url = $wpdb->get_results("select `meta_value` from wp_postmeta WHERE post_id = '$postID' AND `meta_key` = 'page_url' ");
    $page_url = $page_url[0]->meta_value;
    return $page_url;
}

function Get_Tabs_Descripttion($postID , $TabsID)
{
    $Tabs_Desc = get_post_meta( $postID , 'tabs_search_heading', true );
    return  $Tabs_Desc[$TabsID];
}




function get_english_tabs_package_detail($package){

    $args = array( 'post_type' => 'tabs' ,'meta_key' => 'tab_language',  'meta_value' => 'english' );
    $loop = new WP_Query($args);
    $cityPosts = $loop->posts;

    //print_r($cityPosts);
    $SelectItems = ['destination'=>[],'duration'=>[],'package_type'=>[]];
    foreach ($cityPosts as $city)
    {

        global $wpdb;
        $allMetas = $wpdb->get_results( "SELECT * FROM $wpdb->postmeta WHERE `post_id` = $city->ID AND `meta_key` in ( 'destination', 'package_type', 'people', 'duration', 'from_date', 'to_date' , 'from_price' , 'to_price' , 'tab_language') " );
//        echo '<pre>';
//       print_r($allMetas);
//        echo '</pre>';
        foreach ($allMetas as $meta)
            //print_r($meta);
            if (isset($SelectItems[$meta->meta_key]))
                $SelectItems[$meta->meta_key][] = $meta->meta_value.'_'.$city->ID;
    }

    return  $SelectItems[$package];

}


function get_destination_arabic(){

    global $wpdb;
    //echo "select GROUP_CONCAT(meta_value SEPARATOR '_') AS destination FROM `wp_postmeta` as m INNER JOIN `wp_posts` as p ON p.ID = m.post_id where m.post_id IN(SELECT m.post_id FROM `wp_postmeta` as m INNER JOIN `wp_posts` as p ON p.ID = m.post_id WHERE `meta_value`= 'arabic' group by meta_value) AND m.meta_value is NOT NULL AND p.`post_type`= 'tabs' AND (m.meta_key = 'page_url' || meta_key = 'destination') group by post_id" ;

    $query_promotion = $wpdb->get_results( "SELECT GROUP_CONCAT(meta_value SEPARATOR '_') AS destination FROM `wp_postmeta` AS m INNER JOIN `wp_posts` AS p ON p.ID = m.post_id WHERE
	m.post_id IN ( SELECT m.post_id FROM `wp_postmeta` AS m INNER JOIN `wp_posts` AS p ON p.ID = m.post_id WHERE `meta_value` = 'arabic'  ) AND m.meta_value IS NOT NULL
    AND p.`post_type` = 'tabs' AND ( m.meta_key = 'page_url' || meta_key = 'destination')GROUP BY post_id" );

//    echo '<pre>';
//    print_r($query_promotion);
//    echo '</pre>';
    return  $query_promotion;

}





function get_post_package_data_sort($postID , $package , $package_type)
{
//    echo '<br>';
//    echo $postID.' '.$package.' '.$package_type;
//    echo '<br>';
    $Package_posts  = get_post_meta( $postID , $package_type, true );
    $search_heading = get_post_meta( $postID , 'tabs_search_heading', true );
//    echo '<pre>';
//    print_r($Package_posts);
//    echo '</pre>';
//    echo '<pre>';
//    print_r($search_heading);
//    echo '</pre>';
    global $wpdb;
    $TabsArray = [];
    if (is_array($Package_posts)) {

        foreach ($Package_posts as $key => $value) {

            if($value == $package)
            {

                $page_url = $wpdb->get_results("select `meta_value` from wp_postmeta WHERE post_id = '$postID' AND `meta_key` = 'page_url' ");
                $TabsArray [$page_url[0]->meta_value.'?#tab-'.$postID.'-'.$key] = $search_heading[$key];
            }
        }
    }

//    echo '<pre>';
//    print_r($TabsArray);
//    echo '</pre>';
   return $TabsArray;
}




function get_selected_post_value($package)
{
    global $wpdb;
    $Package_posts = $wpdb->get_results("select * from wp_posts WHERE `post_type` = 'tabs' ");
    $PostsIDArray = [];
    $language = Language;
    foreach ($Package_posts as $value)
    {
        $Package_posts = $wpdb->get_results("select `post_id` from wp_postmeta WHERE post_id = '$value->ID' AND `meta_value` = '$language' ");
        if (!empty($Package_posts)) {
            if(!empty(get_post_package_data_sort($value->ID, $package , 'package')))
            {
                $PostsIDArray[$value->ID] = get_post_package_data_sort($value->ID, $package , 'package');
            }
        }
    }

    return $PostsIDArray;
}



function get_package_id($destination){

	$post_id = [];

	global $wpdb;
	$allMetas = $wpdb->get_results( "SELECT post_id FROM $wpdb->postmeta WHERE  `meta_value` = '$destination' " );

	foreach ($allMetas as $meta)
	{
		if ( isset( $meta->post_id ) )
		{
			$post_id[] = $meta->post_id;
		}
	}


	return $post_id;

}



function homepage_content_title($package , $postdata)
{
    $args = array( 'post_type' =>  $package);
    $loop = new WP_Query($args);
    $posts_data = $loop->posts;

    return $posts_data[0]->$postdata;

}


//Search Form Function on Step 4
//step 4 When user Search his required duration packages
//All fields empty except duration
function get_duration_package_id($duration){

    $PostsIDArray = [];
    foreach (Tabs_Post_ID_All() as $value)
    {
        if (!empty($value->post_id))
        {
            if(!empty(Get_Duration_Tabs($value->post_id , $duration)))
            {
                $PostsIDArray[$value->post_id] = Get_Duration_Tabs($value->post_id , $duration);
           }
       }
    }

    return $PostsIDArray;
}
function Get_Duration_Tabs($TabsID , $duration)
{
    $Tabs_duration  = get_post_meta( $TabsID , 'duration', true );
    $TabsArray = [];
    if (is_array($Tabs_duration)) {
        foreach($Tabs_duration as $key => $value){
            if($duration == $value )
            {
                $Page_Url =  Get_Tabs_Url($TabsID).'?#tab-'.$TabsID.'-'.$key;
                $Tabs_Desc  = Get_Tabs_Descripttion($TabsID , $key);
                $TabsArray[$Page_Url] = $Tabs_Desc;
            }
        }
    }
    return $TabsArray;
}


//Search Form Function on Step 5
//step 5 When user Search his required Date from packages
//All fields empty except Date from
function get_date_from_package_id($from_date){

    $PostsIDArray = [];
    foreach (Tabs_Post_ID_All() as $value)
    {
        if (!empty($value->post_id))
        {
            if(!empty(Get_Tabs_fromdate($value->post_id , $from_date , 'from_date')))
            {
                $PostsIDArray[$value->post_id] = Get_Tabs_fromdate($value->post_id , $from_date , 'from_date');
            }
        }
    }
    return $PostsIDArray;
}
function Get_Tabs_fromdate($TabsID , $formData , $search)
{
    $Tabs_duration  = get_post_meta( $TabsID , $search, true );

    $TabsArray = [];
    if (is_array($Tabs_duration))
    {
        foreach($Tabs_duration as $key => $value)
        {
            if($formData <= $value )
            {
                $Page_Url =  Get_Tabs_Url($TabsID).'?#tab-'.$TabsID.'-'.$key;
                $Tabs_Desc  = Get_Tabs_Descripttion($TabsID , $key);
                $TabsArray[$Page_Url] = $Tabs_Desc;
            }
        }
    }
    return $TabsArray;
}


//Search Form Function on Step 6
//step 6 When user Search his required Date to packages
//All fields empty except Date to
function get_date_to_package_id($to_date){

    $PostsIDArray = [];
    foreach (Tabs_Post_ID_All() as $value)
    {
        if (!empty($value->post_id))
        {
            if(!empty(Get_Tabs_todate($value->post_id , $to_date , 'to_date')))
            {
                $PostsIDArray[$value->post_id] = Get_Tabs_todate($value->post_id , $to_date , 'to_date');
            }
        }
    }
    return $PostsIDArray;
}
function Get_Tabs_todate($TabsID , $to_date , $search)
{
    $Tabs_duration  = get_post_meta( $TabsID , $search, true );
    $TabsArray = [];
    if (is_array($Tabs_duration))
    {
        foreach($Tabs_duration as $key => $value)
        {
            if($to_date >= $value )
            {
                $Page_Url =  Get_Tabs_Url($TabsID).'?#tab-'.$TabsID.'-'.$key;
                $Tabs_Desc  = Get_Tabs_Descripttion($TabsID , $key);
                $TabsArray[$Page_Url] = $Tabs_Desc;
            }
        }
    }
    return $TabsArray;
}


//Search Form Function on Step 7
//step 7 When user Search his required Price From packages
//All fields empty except Price From

function get_price_from_package_id($from_price)
{
    $PostsIDArray = [];

    foreach (Tabs_Post_ID_All() as $value)
    {
        if (!empty($value->post_id))
        {

//            echo '<pre>';
//            print_r(Get_Tabs_pricefrom($value->post_id , $from_price , 'from_price'));
//            echo '</pre>';
            if(!empty(Get_Tabs_pricefrom($value->post_id , $from_price , 'from_price')))
            {
                $PostsIDArray[$value->post_id] = Get_Tabs_pricefrom($value->post_id , $from_price , 'from_price');
            }
        }
    }


    return $PostsIDArray;
}
function Get_Tabs_pricefrom($TabsID , $from_price , $search)
{
    $Tabs_duration  = get_post_meta( $TabsID , $search, true );
    $TabsArray = [];
//    echo '<pre>';
//    print_r($Tabs_duration);
//    echo '</pre>';
    if (is_array($Tabs_duration))
    {
        foreach($Tabs_duration as $key => $value)
        {


            if(($from_price - 250) >= $value &&  $value <= ($from_price + 250))
            {
                //echo $key.' => ' .$value.'<br>';
                //echo 'From Price'. $from_price .' >= '.$value.'-'.'250 </br>'.$TabsID.'</br>';

                $Page_Url =  Get_Tabs_Url($TabsID).'?#tab-'.$TabsID.'-'.$key;
                $Tabs_Desc  = Get_Tabs_Descripttion($TabsID , $key);
                $TabsArray[$Page_Url] = $Tabs_Desc;
            }
        }
    }


    return $TabsArray;
}

//Search Form Function on Step 8+
//step 8+ When user Search his required price_to packages
//All fields empty except Price From
function get_price_to_package_id($to_price){

    $PostsIDArray = [];
    foreach (Tabs_Post_ID_All() as $value)
    {
        if (!empty($value->post_id))
        {
            if(!empty(Get_Tabs_Toprice($value->post_id , $to_price , 'to_price')))
            {
                $PostsIDArray[$value->post_id] = Get_Tabs_Toprice($value->post_id , $to_price , 'to_price');
            }
        }
    }
    return $PostsIDArray;
}
function Get_Tabs_Toprice($TabsID , $to_price , $search)
{
    $Tabs_ToPrice  = get_post_meta( $TabsID , $search, true );
    $Tabs_FromPrice  = get_post_meta( $TabsID , $search= 'from_price', true );


//    echo '<pre>';
//    print_r($Tabs_FromPrice);
//    echo '</pre>';
//    echo '<pre>';
//    print_r($Tabs_ToPrice);
//    echo '</pre>';

    $TabsArray = [];
    if (is_array($Tabs_ToPrice))
    {
        foreach($Tabs_ToPrice as $key => $value)
        {
//            echo 'Key = '.$key.'<br>';
//            echo 'From Price = '.$Tabs_FromPrice[$key].'<br>';
//            echo 'To Price = '.$value.'<br>';


            //if($Tabs_FromPrice[$key] <= $value && ($to_price + 250 ) <= $value)
            if(($to_price + 250 ) >= $Tabs_FromPrice[$key] ||  $value <= ($to_price + 250 ))
            {
               // echo $to_price.' >= '.$Tabs_FromPrice[$key] .' && '.$value.' >= '.($to_price + 250 ).'</br>';
                $Page_Url =  Get_Tabs_Url($TabsID).'?#tab-'.$TabsID.'-'.$key;
                $Tabs_Desc  = Get_Tabs_Descripttion($TabsID , $key);
                $TabsArray[$Page_Url] = $Tabs_Desc;
            }
        }
    }
//    echo '<pre>';
//    print_r($TabsArray);
//    echo '</pre>';
    return $TabsArray;
}







//Search Form Function on Step 8
//step 8 When user Search his required price_to packages
//All fields empty except Price From
//function get_price_to_package_id($to_price){
//
//    $PostsIDArray = [];
//    foreach (Tabs_Post_ID_All() as $value)
//    {
//        if (!empty($value->post_id))
//        {
//            if(!empty(Get_Tabs_Toprice($value->post_id , $to_price , 'to_price')))
//            {
//                $PostsIDArray[$value->post_id] = Get_Tabs_Toprice($value->post_id , $to_price , 'to_price');
//            }
//        }
//    }
//    return $PostsIDArray;
//}
//function Get_Tabs_Toprice($TabsID , $to_price , $search)
//{
//    $Tabs_duration  = get_post_meta( $TabsID , $search, true );
//
////    echo '<pre>';
////    print_r($Tabs_duration);
////    echo '</pre>';
//    $TabsArray = [];
//    if (is_array($Tabs_duration))
//    {
//        foreach($Tabs_duration as $key => $value)
//        {
//            //echo $key.' >= ' .$value.'<br>';
//            if(($to_price + 250 ) <= $value)
//            {
//               // echo 'To Price'.$to_price . ' <= '.$value.'-'.'250 </br>'.$TabsID.'</br>';
//                $Page_Url =  Get_Tabs_Url($TabsID).'?#tab-'.$TabsID.'-'.$key;
//                $Tabs_Desc  = Get_Tabs_Descripttion($TabsID , $key);
//                $TabsArray[$Page_Url] = $Tabs_Desc;
//            }
//        }
//    }
////    echo '<pre>';
////    print_r($TabsArray);
////    echo '</pre>';
//    return $TabsArray;
//}

//Search Form Function on Step 9
//step 9 When user Search his required date from to date to packages
//All fields empty except date from & to date

function get_between_date_package_id($from_date , $to_date)
{
    $from_date = get_date_from_package_id($from_date);
    $to_date   = get_date_to_package_id($to_date);
    $PostsIDArray = [];
    foreach ($from_date as $FromdatetabsID => $value)
     {
         if(is_array($value) AND is_array($to_date[$FromdatetabsID]))
         {
             $arrayIntersect = array_intersect($value, $to_date[$FromdatetabsID]);
             if (!empty($arrayIntersect)) {
                 $PostsIDArray[$FromdatetabsID] = $arrayIntersect;
             }
         }
     }
    return $PostsIDArray;
}


//Search Form Function on Step 10
//step 10 When user Search his required price from to price to packages
//All fields empty except price from & to price
function get_between_price_package_id($price_from , $price_to)
{

	$from_price = get_price_from_package_id($price_from);
	$to_price   = get_price_to_package_id($price_to);
    $PostsIDArray = [];
    foreach ($from_price as $from_pricetabsID => $value)
    {
        $arrayIntersect                = array_merge($value, $to_price[$from_pricetabsID]);
        if(!empty($arrayIntersect)) {
            $PostsIDArray[$from_pricetabsID] = $arrayIntersect;
        }
    }
    return $PostsIDArray;

}


//Search Form Function on Step 11
//step 11 When user Search his required City and  packages
//All fields empty except City and  package
function City_plus_Package($All_Destination , $All_package)
{
    $post_id = Get_post_id($All_Destination);
    //echo $post_id.'</br>';
    $Package = get_post_package_data_sort($post_id , $All_package , 'package');
    $PostsIDArray = [];
    if(!empty($Package)) {
        $PostsIDArray[$post_id] = $Package;
    }
  return $PostsIDArray;

}
//Search Form Function on Step 12
//step 12 When user Search his required City and  duration
//All fields empty except City and  duration
function City_plus_duration($All_Destination , $All_duration)
{
    $post_id = Get_post_id($All_Destination);

//echo $post_id.'<br>';

    $Package = get_post_package_data_sort($post_id , $All_duration , 'duration');

//    echo  '<pre>';
//    print_r($Package);
//    echo '</pre>';
    $PostsIDArray = [];
    if (is_array($Package) && !empty($Package)) {
        $PostsIDArray[$post_id] = $Package;
    }
//    echo  '<pre>';
//    print_r($PostsIDArray);
//    echo '</pre>';
    return $PostsIDArray;

}
//Search Form Function on Step 13
//step 13 When user Search his required City and  from_date
//All fields empty except City and  from_date
function City_plus_FromDate($All_Destination , $from_date)
{
    $post_id = Get_post_id($All_Destination);
    $PostsIDArray = [];
    $post_ids_Array = get_date_from_package_id($from_date);

    foreach ($post_ids_Array as $key => $value)
    {
        if($key == $post_id)
        {
            $PostsIDArray[$post_id] =  $value;
        }
    }
    return $PostsIDArray;
}
//Search Form Function on Step 14
//step 14 When user Search his required City and  to_date
//All fields empty except City and  to_date
function City_plus_ToDate($All_Destination , $to_date)
{
    $post_id = Get_post_id($All_Destination);
    $PostsIDArray = [];
    $post_ids_Array = get_date_to_package_id($to_date);

    foreach ($post_ids_Array as $key => $value)
    {
        if($key == $post_id)
        {
            $PostsIDArray[$post_id] =  $value;
        }
    }
    return $PostsIDArray;
}

//Search Form Function on Step 15
//step 15 When user Search his required City and From &  to_date
//All fields empty except City and  From &  to_date
function City_plus_FromToDate($All_Destination , $from_date , $to_date)
{
    $post_id = Get_post_id($All_Destination);
    $PostsIDArray = [];
    $post_ids_Array = get_between_date_package_id($from_date , $to_date);

    foreach ($post_ids_Array as $key => $value)
    {
        if($key == $post_id)
        {
            $PostsIDArray[$post_id] =  $value;
        }
    }
    return $PostsIDArray;
}
//Search Form Function on Step 16
//step 16 When user Search his required City and Price From
//All fields empty except City and  Price From
function  City_plus_PriceFrom($All_Destination , $price_from)
{
    $post_id = Get_post_id($All_Destination);
    $PostsIDArray = [];
    $post_ids_Array = get_price_from_package_id($price_from);

    foreach ($post_ids_Array as $key => $value)
    {
        if($key == $post_id)
        {
            $PostsIDArray[$post_id] =  $value;
        }
    }
    return $PostsIDArray;
}

//Search Form Function on Step 17
//step 16 When user Search his required City and Price To
//All fields empty except City and  Price To
function  City_plus_PriceTo($All_Destination , $price_to)
{
    $post_id = Get_post_id($All_Destination);
    $PostsIDArray = [];
    $post_ids_Array = get_price_to_package_id($price_to);

    foreach ($post_ids_Array as $key => $value)
    {
        if($key == $post_id)
        {
            $PostsIDArray[$post_id] =  $value;
        }
    }
    return $PostsIDArray;
}
//Search Form Function on Step 18
//step 18 When user Search his required City and Price To Price From
//All fields empty except City and  Price To Price From
function  City_plus_PriceFromTo($All_Destination ,$price_from, $price_to)
{
    $post_id = Get_post_id($All_Destination);
    $PostsIDArray = [];
    $post_ids_Array = get_between_price_package_id($price_from , $price_to);

    foreach ($post_ids_Array as $key => $value)
    {
        if($key == $post_id)
        {
            $PostsIDArray[$post_id] =  $value;
        }
    }
    return $PostsIDArray;
}

//Search Form Function on Step 19
//step 19 When user Search his required City and Packag and Duration
//All fields empty except City and Packag and Duration
function  City_plus_Package_Duration($All_Destination ,$All_package, $All_duration)
{
    $City_plus_Package  = City_plus_Package($All_Destination , $All_package);
    $City_plus_duration = City_plus_duration($All_Destination , $All_duration);

    $PostsIDArray = [];
    foreach ($City_plus_Package as $FromdatetabsID => $value)
    {
        if(is_array($value) AND is_array($City_plus_duration[$FromdatetabsID]))
        {
            $arrayIntersect = array_intersect($value, $City_plus_duration[$FromdatetabsID]);
            if (!empty($arrayIntersect)) {
                $PostsIDArray[$FromdatetabsID] = $arrayIntersect;
            }
        }
    }
    return $PostsIDArray;
}
//Search Form Function on Step 20
//step 20 When user Search his required City and Packag and From Date
//All fields empty except City and Packag and From Date
function  City_plus_Package_DateFrom($All_Destination ,$All_package, $from_date)
{
    $City_plus_Package  = City_plus_Package($All_Destination , $All_package);
    $City_plus_from_date = City_plus_FromDate($All_Destination , $from_date);

    $PostsIDArray = [];
    foreach ($City_plus_Package as $FromdatetabsID => $value)
    {
        if(is_array($value) AND is_array($City_plus_from_date[$FromdatetabsID]))
        {
            $arrayIntersect = array_intersect($value, $City_plus_from_date[$FromdatetabsID]);
            if (!empty($arrayIntersect)) {
                $PostsIDArray[$FromdatetabsID] = $arrayIntersect;
            }
        }
    }
    return $PostsIDArray;
}
//Search Form Function on Step 21
//step 21 When user Search his required City and Packag and To Date
//All fields empty except City and Packag and To Date
function  City_plus_Package_DateTo($All_Destination ,$All_package, $to_date)
{
    $City_plus_Package   = City_plus_Package($All_Destination , $All_package);
    $City_plus_from_date = City_plus_ToDate($All_Destination , $to_date);

    $PostsIDArray = [];
    foreach ($City_plus_Package as $FromdatetabsID => $value)
    {
        if(is_array($value) AND is_array($City_plus_from_date[$FromdatetabsID])) {
            $arrayIntersect = array_intersect($value, $City_plus_from_date[$FromdatetabsID]);
            if (!empty($arrayIntersect)) {
                $PostsIDArray[$FromdatetabsID] = $arrayIntersect;
            }
        }
    }
    return $PostsIDArray;
}
//Search Form Function on Step 22
//step 22 When user Search his required City and Packag and To Date and From Date
//All fields empty except City and Packag and To Date and From Date
function  City_plus_Package_DateTo_From($All_Destination ,$All_package,$from_date, $to_date)
{
    $City_plus_Package   = City_plus_Package($All_Destination , $All_package);
    $City_plus_from_date = City_plus_FromToDate($All_Destination , $from_date , $to_date);

    $PostsIDArray = [];
    foreach ($City_plus_Package as $FromdatetabsID => $value)
    {
        if(is_array($value) AND is_array($City_plus_from_date[$FromdatetabsID])) {
            $arrayIntersect = array_intersect($value, $City_plus_from_date[$FromdatetabsID]);
            if (!empty($arrayIntersect)) {
                $PostsIDArray[$FromdatetabsID] = $arrayIntersect;
            }
        }
    }
    return $PostsIDArray;
}

//Search Form Function on Step 23
//step 22 When user Search his required City and Package and Price From
//All fields empty except City and Package and Price From
function  City_plus_Package_price_From($All_Destination ,$All_package,$price_from)
{
    $City_plus_Package   = City_plus_Package($All_Destination , $All_package);
    $City_plus_from_date = City_plus_PriceFrom($All_Destination , $price_from);

    $PostsIDArray = [];
    foreach ($City_plus_Package as $FromdatetabsID => $value)
    {
        if(is_array($value) AND is_array($City_plus_from_date[$FromdatetabsID])) {
            $arrayIntersect = array_intersect($value, $City_plus_from_date[$FromdatetabsID]);
            if (!empty($arrayIntersect)) {
                $PostsIDArray[$FromdatetabsID] = $arrayIntersect;
            }
        }
    }
    return $PostsIDArray;
}

//Search Form Function on Step 24
//step 24 When user Search his required City and Package and Price To
//All fields empty except City and Package and Price To
function  City_plus_Package_price_To($All_Destination ,$All_package,$price_to)
{
    $City_plus_Package   = City_plus_Package($All_Destination , $All_package);
    $City_plus_from_date = City_plus_PriceTo($All_Destination , $price_to);

    $PostsIDArray = [];
    foreach ($City_plus_Package as $FromdatetabsID => $value)
    {
        if(is_array($value) AND is_array($City_plus_from_date[$FromdatetabsID])) {
            $arrayIntersect = array_intersect($value, $City_plus_from_date[$FromdatetabsID]);
            if (!empty($arrayIntersect)) {
                $PostsIDArray[$FromdatetabsID] = $arrayIntersect;
            }
        }
    }
    return $PostsIDArray;
}
//Search Form Function on Step 25
//step 25 When user Search his required City and Package and Price To and Price From
//All fields empty except City and Package and Price To and Price From
function  City_plus_Package_price_From_To($All_Destination ,$All_package,$price_from,$price_to)
{
    $City_plus_Package = City_plus_Package_price_From($All_Destination ,$All_package,$price_from);
    $City_plus         = City_plus_Package_price_To($All_Destination ,$All_package,$price_to);

    $PostsIDArray = [];
    foreach ($City_plus_Package as $FromdatetabsID => $value)
    {
        $arrayIntersect  = array_merge($value, $City_plus[$FromdatetabsID]);
        if(!empty($arrayIntersect))
        {
            $PostsIDArray[$FromdatetabsID] = $arrayIntersect;
        }
    }
    return $PostsIDArray;
}
//Search Form Function on Step 26
//step 19 When user Search his required Package and Duration
//All fields empty except Package and Duration
function  Package_plus_Duration($All_package ,$duration)
{
    $Duration  = get_duration_package_id($duration);
    $package = get_selected_post_value($All_package);

    $PostsIDArray = [];
    foreach ($Duration as $FromdatetabsID => $value)
    {
        if(is_array($value) AND is_array($package[$FromdatetabsID])) {
            $arrayIntersect = array_intersect($value, $package[$FromdatetabsID]);
            if (!empty($arrayIntersect)) {
                $PostsIDArray[$FromdatetabsID] = $arrayIntersect;
            }
        }
    }
    return $PostsIDArray;
}
//Search Form Function on Step 27
//step 19 When user Search his required Package and DateFrom
//All fields empty except Package and DateFrom
function  Package_plus_Datefrom($All_package,$from_date)
{
    $DateFrom  = get_date_from_package_id($from_date);
    $package = get_selected_post_value($All_package);

    $PostsIDArray = [];
    foreach ($DateFrom as $FromdatetabsID => $value)
    {
        if(is_array($value) AND is_array($package[$FromdatetabsID]))
        {
            if(is_array($value) AND is_array($package[$FromdatetabsID]))
            {
                $arrayIntersect                = array_intersect($value, $package[$FromdatetabsID]);
                if(!empty($arrayIntersect))
                {
                    $PostsIDArray[$FromdatetabsID] = $arrayIntersect;
                }
        }
        }
    }
    return $PostsIDArray;
}
//Search Form Function on Step 28
//step 19 When user Search his required Package and DateTo
//All fields empty except Package and DateTo
function  Package_plus_Dateto($All_package,$to_date)
{
    $DateFrom  = get_date_to_package_id($to_date);
    $package   = get_selected_post_value($All_package);

    $PostsIDArray = [];
    foreach ($DateFrom as $FromdatetabsID => $value)
    {
        if(is_array($value) AND is_array($package[$FromdatetabsID]))
        {
            $arrayIntersect                = array_intersect($value, $package[$FromdatetabsID]);
            if(!empty($arrayIntersect))
            {
                $PostsIDArray[$FromdatetabsID] = $arrayIntersect;
            }
        }
    }
    return $PostsIDArray;
}
//Search Form Function on Step 29
//step 19 When user Search his required Package and Date From and Date To
//All fields empty except Package and Date From and Date To
function  Package_plus_DateFrom_To($All_package,$from_date,$to_date)
{
    $DateFrom  = Package_plus_Datefrom($All_package,$from_date);
    $package   = Package_plus_Dateto($All_package,$to_date);

    $PostsIDArray = [];
    foreach ($DateFrom as $FromdatetabsID => $value)
    {
        if(is_array($value) AND is_array($package[$FromdatetabsID]))
        {
            $arrayIntersect                = array_intersect($value, $package[$FromdatetabsID]);
            if(!empty($arrayIntersect))
            {
                $PostsIDArray[$FromdatetabsID] = $arrayIntersect;
            }
        }
    }
    return $PostsIDArray;
}

//Search Form Function on Step 30
//step 19 When user Search his required Package and Price From
//All fields empty except Package and Price From
function  Package_plus_PriceFrom($All_package,$price_from)
{
    $PriceFrom  = get_price_from_package_id($price_from);
    $package   = get_selected_post_value($All_package);

    $PostsIDArray = [];
    foreach ($PriceFrom as $FromdatetabsID => $value)
    {
        if(is_array($value) AND is_array($package[$FromdatetabsID]))
        {
            $arrayIntersect                = array_intersect($value, $package[$FromdatetabsID]);
            if(!empty($arrayIntersect))
            {
                $PostsIDArray[$FromdatetabsID] = $arrayIntersect;
            }
        }
    }
    return $PostsIDArray;
}

//Search Form Function on Step 31
//step 31 When user Search his required Package and Price To
//All fields empty except Package and Price To
function  Package_plus_PriceTo($All_package,$price_to)
{
    $PriceFrom  = get_price_to_package_id($price_to);
    $package    = get_selected_post_value($All_package);

    $PostsIDArray = [];
    foreach ($PriceFrom as $FromdatetabsID => $value)
    {
        if(is_array($value) AND is_array($package[$FromdatetabsID]))
        {
            $arrayIntersect                = array_intersect($value, $package[$FromdatetabsID]);
            if(!empty($arrayIntersect))
            {
                $PostsIDArray[$FromdatetabsID] = $arrayIntersect;
            }
        }
    }
    return $PostsIDArray;
}
//Search Form Function on Step 32
//step 31 When user Search his required Package and Price From and Price To
//All fields empty except Package and Price From and Price To
function  Package_plus_PriceFrom_To($All_package,$price_from ,$price_to)
{
    $PriceFrom  = Package_plus_PriceFrom($All_package,$price_from);
    $package    = Package_plus_PriceTo($All_package,$price_to);

    $PostsIDArray = [];
    foreach ($PriceFrom as $FromdatetabsID => $value)
    {
        if(is_array($value) AND is_array($package[$FromdatetabsID]))
        {
            $arrayIntersect                = array_intersect($value, $package[$FromdatetabsID]);
            if(!empty($arrayIntersect))
            {
                $PostsIDArray[$FromdatetabsID] = $arrayIntersect;
            }
        }
    }
    return $PostsIDArray;
}
//Search Form Function on Step 33
//step 33 When user Search his required Duration and DateFrom
//All fields empty except Duration and DateFrom
function  Duration_plus_DateFrom($All_duration,$from_date)
{
    $PriceFrom  = get_duration_package_id($All_duration);
    $package    = get_date_from_package_id($from_date);

    $PostsIDArray = [];
    foreach ($PriceFrom as $FromdatetabsID => $value)
    {
        if(is_array($value) AND is_array($package[$FromdatetabsID]))
        {
            $arrayIntersect                = array_intersect($value, $package[$FromdatetabsID]);
            if(!empty($arrayIntersect))
            {
                $PostsIDArray[$FromdatetabsID] = $arrayIntersect;
            }
        }
    }
    return $PostsIDArray;
}
//Search Form Function on Step 34
//step 34 When user Search his required Duration and DateTo
//All fields empty except Duration and DateTo
function  Duration_plus_DateTo($All_duration,$to_date)
{
    $PriceFrom  = get_duration_package_id($All_duration);
    $package    = get_date_to_package_id($to_date);

    $PostsIDArray = [];
    foreach ($PriceFrom as $FromdatetabsID => $value)
    {
        if(is_array($value) AND is_array($package[$FromdatetabsID]))
        {
            $arrayIntersect                = array_intersect($value, $package[$FromdatetabsID]);
            if(!empty($arrayIntersect))
            {
                $PostsIDArray[$FromdatetabsID] = $arrayIntersect;
            }
        }
    }
    return $PostsIDArray;
}
//Search Form Function on Step 35
//step 35 When user Search his required Duration and DateFrom And DateTo
//All fields empty except Duration and DateFrom And DateTo
function Duration_plus_DateFrom_To($All_duration,$from_date,$to_date)
{
    $PriceFrom  = Duration_plus_DateFrom($All_duration,$from_date);
    $package    = Duration_plus_DateTo($All_duration,$to_date);

    $PostsIDArray = [];
    foreach ($PriceFrom as $FromdatetabsID => $value)
    {
        if(is_array($value) AND is_array($package[$FromdatetabsID]))
        {
            $arrayIntersect                = array_intersect($value, $package[$FromdatetabsID]);
            if(!empty($arrayIntersect))
            {
                $PostsIDArray[$FromdatetabsID] = $arrayIntersect;
            }
        }
    }
    return $PostsIDArray;
}
//Search Form Function on Step 36
//step 35 When user Search his required Duration and PriceFrom
//All fields empty except Duration and PriceFrom
function Duration_plus_Price_From($All_duration,$price_from)
{
    $PriceFrom  = get_duration_package_id($All_duration);
    $package    = get_price_from_package_id($price_from);

    $PostsIDArray = [];
    foreach ($PriceFrom as $FromdatetabsID => $value)
    {
        if(is_array($value) AND is_array($package[$FromdatetabsID]))
        {
            $arrayIntersect                = array_intersect($value, $package[$FromdatetabsID]);
            if(!empty($arrayIntersect))
            {
                $PostsIDArray[$FromdatetabsID] = $arrayIntersect;
            }
        }
    }
    return $PostsIDArray;
}
//Search Form Function on Step 37
//step 37 When user Search his required Duration and PriceTo
//All fields empty except Duration and PriceTo
function Duration_plus_Price_To($All_duration,$price_to)
{
    $PriceFrom  = get_duration_package_id($All_duration);
    $package    = get_price_to_package_id($price_to);

    $PostsIDArray = [];
    foreach ($PriceFrom as $FromdatetabsID => $value)
    {
        if(is_array($value) AND is_array($package[$FromdatetabsID]))
        {
            $arrayIntersect                = array_intersect($value, $package[$FromdatetabsID]);
            if(!empty($arrayIntersect))
            {
                $PostsIDArray[$FromdatetabsID] = $arrayIntersect;
            }
        }
    }
    return $PostsIDArray;
}
//Search Form Function on Step 38
//step 38 When user Search his required Duration and Price From and Price To
//All fields empty except Duration and Prcie From and PriceTo
function Duration_plus_Price_From_To($All_duration,$price_from ,$price_to)
{
    $PriceFrom  = Duration_plus_Price_From($All_duration,$price_from);
    $package    = Duration_plus_Price_To($All_duration,$price_to);

    $PostsIDArray = [];
    foreach ($PriceFrom as $FromdatetabsID => $value)
    {
        if(is_array($value) AND is_array($package[$FromdatetabsID]))
        {
            $arrayIntersect                = array_intersect($value, $package[$FromdatetabsID]);
            if(!empty($arrayIntersect))
            {
                $PostsIDArray[$FromdatetabsID] = $arrayIntersect;
            }
        }
    }
    return $PostsIDArray;
}
//Search Form Function on Step 39
//step 39 When user Search his required Destination + package + Duration + Date From
//All fields empty except Destination + package + Duration + Date From
function Dest_Dur_Pack_dateFrom($All_Destination,$All_package ,$All_duration , $from_date)
{


    $PriceFrom  = City_plus_Package_DateFrom($All_Destination ,$All_package, $from_date);
    $package    = City_plus_Package_Duration($All_Destination ,$All_package, $All_duration);

    $PostsIDArray = [];
    foreach ($PriceFrom as $FromdatetabsID => $value)
    {
        if(is_array($value) AND is_array($package[$FromdatetabsID]))
        {
            $arrayIntersect                = array_intersect($value, $package[$FromdatetabsID]);
            if(!empty($arrayIntersect))
            {
                $PostsIDArray[$FromdatetabsID] = $arrayIntersect;
            }
        }
    }
    return $PostsIDArray;
}
//Search Form Function on Step 40
//step 40 When user Search his required Destination + package + Duration + Date To
//All fields empty except Destination + package + Duration + Date To
function Dest_Dur_Pack_dateTo($All_Destination,$All_package ,$All_duration , $to_date)
{
    $PriceFrom  = City_plus_Package_DateTo($All_Destination ,$All_package, $to_date);
    $package    = City_plus_Package_Duration($All_Destination ,$All_package, $All_duration);

    $PostsIDArray = [];
    foreach ($PriceFrom as $FromdatetabsID => $value)
    {
        if(is_array($value) AND is_array($package[$FromdatetabsID]))
        {
            $arrayIntersect                = array_intersect($value, $package[$FromdatetabsID]);
            if(!empty($arrayIntersect))
            {
                $PostsIDArray[$FromdatetabsID] = $arrayIntersect;
            }
        }
    }
    return $PostsIDArray;
}
//Search Form Function on Step 41
//step 41 When user Search his required Destination + package + Duration + Date To + Date From
//All fields empty except Destination + package + Duration + Date To + Date From
function Dest_Dur_Pack_dateFrom_To($All_Destination,$All_package ,$All_duration ,$from_date, $to_date)
{
    $PriceFrom  = Dest_Dur_Pack_dateFrom($All_Destination,$All_package ,$All_duration , $from_date);
    $package    = Dest_Dur_Pack_dateTo($All_Destination,$All_package ,$All_duration , $to_date);

    $PostsIDArray = [];
    foreach ($PriceFrom as $FromdatetabsID => $value)
    {
        if(is_array($value) AND is_array($package[$FromdatetabsID]))
        {
            $arrayIntersect                = array_intersect($value, $package[$FromdatetabsID]);
            if(!empty($arrayIntersect))
            {
                $PostsIDArray[$FromdatetabsID] = $arrayIntersect;
            }
        }
    }
    return $PostsIDArray;
}
//Search Form Function on Step 42
//step 42 When user Search his required Destination + package + Duration + Price From
//All fields empty except Destination + package + Duration + Price From
function Dest_Dur_Pack_PriceFrom($All_Destination,$All_package ,$All_duration ,$price_from)
{
    $PriceFrom  = City_plus_Package_Duration($All_Destination ,$All_package, $All_duration);
    $package    = City_plus_Package_price_From($All_Destination ,$All_package,$price_from);

    $PostsIDArray = [];
    foreach ($PriceFrom as $FromdatetabsID => $value)
    {
        if(is_array($value) AND is_array($package[$FromdatetabsID]))
        {
            $arrayIntersect                = array_intersect($value, $package[$FromdatetabsID]);
            if(!empty($arrayIntersect))
            {
                $PostsIDArray[$FromdatetabsID] = $arrayIntersect;
            }
        }
    }
    return $PostsIDArray;
}
//Search Form Function on Step 43
//step 43 When user Search his required Destination + package + Duration + Price To
//All fields empty except Destination + package + Duration + Price To
function Dest_Dur_Pack_PriceTo($All_Destination,$All_package ,$All_duration ,$price_to)
{
    $PriceFrom  = City_plus_Package_Duration($All_Destination ,$All_package, $All_duration);
    $package    = City_plus_Package_price_To($All_Destination ,$All_package,$price_to);

    $PostsIDArray = [];
    foreach ($PriceFrom as $FromdatetabsID => $value)
    {
        if(is_array($value) AND is_array($package[$FromdatetabsID]))
        {
            $arrayIntersect                = array_intersect($value, $package[$FromdatetabsID]);
            if(!empty($arrayIntersect))
            {
                $PostsIDArray[$FromdatetabsID] = $arrayIntersect;
            }
        }
    }
    return $PostsIDArray;
}
//Search Form Function on Step 44
//step 44 When user Search his required Destination + package + Duration + Price From + Price To
//All fields empty except Destination + package + Duration + Price From + Price To
function Dest_Dur_Pack_PriceFromTo($All_Destination,$All_package ,$All_duration , $price_from ,$price_to)
{
    $PriceFrom  = Dest_Dur_Pack_PriceFrom($All_Destination,$All_package ,$All_duration ,$price_from);
    $package    = Dest_Dur_Pack_PriceTo($All_Destination,$All_package ,$All_duration ,$price_to);

    $PostsIDArray = [];
    foreach ($PriceFrom as $FromdatetabsID => $value)
    {
        if(is_array($value) AND is_array($package[$FromdatetabsID]))
        {
            $arrayIntersect                = array_intersect($value, $package[$FromdatetabsID]);
            if(!empty($arrayIntersect))
            {
                $PostsIDArray[$FromdatetabsID] = $arrayIntersect;
            }
        }
    }
    return $PostsIDArray;
}
//Search Form Function on Step 45
//step 45 When user Search his required Destination + package + Duration + Date From + Price From
//All fields empty except Destination + package + Duration + Date From + Price FRom
function Dest_Dur_Pack_DateFromPriceFrom($All_Destination,$All_package ,$All_duration , $from_date ,$price_from)
{
    $PriceFrom  = Dest_Dur_Pack_PriceFrom($All_Destination,$All_package ,$All_duration ,$price_from);
    $package    = Dest_Dur_Pack_dateFrom($All_Destination,$All_package ,$All_duration , $from_date);

    $PostsIDArray = [];
    foreach ($PriceFrom as $FromdatetabsID => $value)
    {
        if(is_array($value) AND is_array($package[$FromdatetabsID]))
        {
            $arrayIntersect                = array_intersect($value, $package[$FromdatetabsID]);
            if(!empty($arrayIntersect))
            {
                $PostsIDArray[$FromdatetabsID] = $arrayIntersect;
            }
        }
    }
    return $PostsIDArray;
}
//Search Form Function on Step 46
//step 45 When user Search his required Destination + package + Duration + Date From + Price To
//All fields empty except Destination + package + Duration + Date From + Price To
function Dest_Dur_Pack_DateFromPriceTo($All_Destination,$All_package ,$All_duration , $from_date ,$price_to)
{
    $PriceFrom  = Dest_Dur_Pack_PriceTo($All_Destination,$All_package ,$All_duration ,$price_to);
    $package    = Dest_Dur_Pack_dateFrom($All_Destination,$All_package ,$All_duration , $from_date);

    $PostsIDArray = [];
    foreach ($PriceFrom as $FromdatetabsID => $value)
    {
        if(is_array($value) AND is_array($package[$FromdatetabsID]))
        {
            $arrayIntersect                = array_intersect($value, $package[$FromdatetabsID]);
            if(!empty($arrayIntersect))
            {
                $PostsIDArray[$FromdatetabsID] = $arrayIntersect;
            }
        }
    }
    return $PostsIDArray;
}
//Search Form Function on Step 47
//step 47 When user Search his required Destination + package + Duration + Date From + Price From + Price To
//All fields empty except Destination + package + Duration + Date From + Price From + Price To
function Dest_Dur_Pack_DateFromPriceFromTo($All_Destination,$All_package ,$All_duration , $from_date ,$price_from , $price_to)
{
    $PriceFrom  = Dest_Dur_Pack_DateFromPriceFrom($All_Destination,$All_package ,$All_duration , $from_date ,$price_from);
    $package    = Dest_Dur_Pack_DateFromPriceTo($All_Destination,$All_package ,$All_duration , $from_date ,$price_to);

    $PostsIDArray = [];
    foreach ($PriceFrom as $FromdatetabsID => $value)
    {
        if(is_array($value) AND is_array($package[$FromdatetabsID]))
        {
            $arrayIntersect                = array_intersect($value, $package[$FromdatetabsID]);
            if(!empty($arrayIntersect))
            {
                $PostsIDArray[$FromdatetabsID] = $arrayIntersect;
            }
        }
    }
    return $PostsIDArray;
}
//Search Form Function on Step 48
//step 48 When user Search his required Destination + package + Duration + Date To + Price From
//All fields empty except Destination + package + Duration + Date To + Price FRom
function Dest_Dur_Pack_DateToPriceFrom($All_Destination,$All_package ,$All_duration , $to_date ,$price_from )
{
$PriceFrom  = Dest_Dur_Pack_PriceFrom($All_Destination,$All_package ,$All_duration ,$price_from);
$package    = Dest_Dur_Pack_dateTo($All_Destination,$All_package ,$All_duration , $to_date);

$PostsIDArray = [];
foreach ($PriceFrom as $FromdatetabsID => $value)
{
    if(is_array($value) AND is_array($package[$FromdatetabsID]))
    {
        $arrayIntersect                = array_intersect($value, $package[$FromdatetabsID]);
        if(!empty($arrayIntersect))
        {
            $PostsIDArray[$FromdatetabsID] = $arrayIntersect;
        }
    }
}
return $PostsIDArray;
}
//Search Form Function on Step 49
//step 49 When user Search his required Destination + package + Duration + Date To + Price To
//All fields empty except Destination + package + Duration + Date To + Price To
function Dest_Dur_Pack_DateToPriceTo($All_Destination,$All_package ,$All_duration , $to_date ,$price_to )
{
    $PriceFrom  = Dest_Dur_Pack_PriceTo($All_Destination,$All_package ,$All_duration ,$price_to);
    $package    = Dest_Dur_Pack_dateTo($All_Destination,$All_package ,$All_duration , $to_date);

    $PostsIDArray = [];
    foreach ($PriceFrom as $FromdatetabsID => $value)
    {
        if(is_array($value) AND is_array($package[$FromdatetabsID]))
        {
            $arrayIntersect                = array_intersect($value, $package[$FromdatetabsID]);
            if(!empty($arrayIntersect))
            {
                $PostsIDArray[$FromdatetabsID] = $arrayIntersect;
            }
        }
    }
    return $PostsIDArray;
}
//Search Form Function on Step 50
//step 50 When user Search his required Destination + package + Duration + Date To + Price From + Price To
//All fields empty except Destination + package + Duration + Date To + Price From + Price To
function Dest_Dur_Pack_DateToPriceFromTo($All_Destination,$All_package ,$All_duration , $to_date ,$price_from , $price_to )
{
    $PriceFrom  = Dest_Dur_Pack_DateToPriceTo($All_Destination,$All_package ,$All_duration , $to_date ,$price_to );
    $package    = Dest_Dur_Pack_DateToPriceFrom($All_Destination,$All_package ,$All_duration , $to_date ,$price_from );

    $PostsIDArray = [];
    foreach ($PriceFrom as $FromdatetabsID => $value)
    {
        if(is_array($value) AND is_array($package[$FromdatetabsID]))
        {
            $arrayIntersect                = array_intersect($value, $package[$FromdatetabsID]);
            if(!empty($arrayIntersect))
            {
                $PostsIDArray[$FromdatetabsID] = $arrayIntersect;
            }
        }
    }
    return $PostsIDArray;
}
//Search Form Function on Step 51
//step 51 When user Search his required Destination + package + Duration + Date To + Date From + Price From
//All fields empty except Destination + package + Duration + Date To + Date From + Price From
function Dest_Dur_Pack_DateFromToPriceFrom($All_Destination,$All_package ,$All_duration ,$from_date , $to_date ,$price_from )
{
    $PriceFrom  = Dest_Dur_Pack_dateFrom_To($All_Destination,$All_package ,$All_duration ,$from_date, $to_date);
    $package    = Dest_Dur_Pack_DateToPriceFrom($All_Destination,$All_package ,$All_duration , $to_date ,$price_from );

    $PostsIDArray = [];
    foreach ($PriceFrom as $FromdatetabsID => $value)
    {
        if(is_array($value) AND is_array($package[$FromdatetabsID]))
        {
            $arrayIntersect                = array_intersect($value, $package[$FromdatetabsID]);
            if(!empty($arrayIntersect))
            {
                $PostsIDArray[$FromdatetabsID] = $arrayIntersect;
            }
        }
    }
    return $PostsIDArray;
}
//Search Form Function on Step 52
//step 52 When user Search his required Destination + package + Duration + Date To + Date From + Price To
//All fields empty except Destination + package + Duration + Date To + Date From + Price To
function Dest_Dur_Pack_DateFromToPriceTo($All_Destination,$All_package ,$All_duration ,$from_date , $to_date ,$price_to )
{
    $PriceFrom  = Dest_Dur_Pack_dateFrom_To($All_Destination,$All_package ,$All_duration ,$from_date, $to_date);
    $package    = Dest_Dur_Pack_DateToPriceTo($All_Destination,$All_package ,$All_duration , $to_date ,$price_to );

    $PostsIDArray = [];
    foreach ($PriceFrom as $FromdatetabsID => $value)
    {
        if(is_array($value) AND is_array($package[$FromdatetabsID]))
        {
            $arrayIntersect                = array_intersect($value, $package[$FromdatetabsID]);
            if(!empty($arrayIntersect))
            {
                $PostsIDArray[$FromdatetabsID] = $arrayIntersect;
            }
        }
    }
    return $PostsIDArray;
}

//Search Form Function on Step 53
//step 52 When user Search his required Destination + package + Duration + Date To + Date From + Price To + Price From
//All fields empty except Destination + package + Duration + Date To + Date From + Price To + Price From
function Dest_Dur_Pack_DateFromToPriceFromTo($All_Destination,$All_package ,$All_duration ,$from_date , $to_date ,$price_from,$price_to )
{
    $PriceFrom  = Dest_Dur_Pack_DateFromToPriceTo($All_Destination,$All_package ,$All_duration ,$from_date , $to_date ,$price_to );
    $package    = Dest_Dur_Pack_DateFromToPriceFrom($All_Destination,$All_package ,$All_duration ,$from_date , $to_date ,$price_from );

    $PostsIDArray = [];
    foreach ($PriceFrom as $FromdatetabsID => $value)
    {
        if(is_array($value) AND is_array($package[$FromdatetabsID]))
        {
            $arrayIntersect                = array_intersect($value, $package[$FromdatetabsID]);
            if(!empty($arrayIntersect))
            {
                $PostsIDArray[$FromdatetabsID] = $arrayIntersect;
            }
        }
    }
    return $PostsIDArray;
}

function Get_post_id($All_Destination)
{
    $language = Language;
    global $wpdb;
    $post_id = $wpdb->get_results("select `post_id` from wp_postmeta WHERE `post_id` IN(SELECT post_id FROM `wp_postmeta` WHERE `meta_value`= '$language' ) AND `meta_value` = '$All_Destination'");
    $post_id = $post_id[0]->post_id;
    return $post_id;
}





//currently not use this function
//i work when multiple feature of search apply on search form
//
function get_array_tabs_ids($destinatrion  ,$All_package ,$All_duration ,$date_from , $date_to , $price_from , $price_to)
{
	$post_id        = [];
	$destinatrion   = [];
	$All_package    = [];
	$All_duration   = [];
	$date_from      = [];
	$date_to        = [];
	$price_from     = [];
	$price_to       = [];

	global $wpdb;

	if($destinatrion != '')
	{
		$allMetas = $wpdb->get_results( "SELECT post_id FROM $wpdb->postmeta WHERE  `meta_value` = '$destinatrion' " );
		foreach ($allMetas as $meta)
		{
			if ( isset( $meta->post_id ) )
			{
				$destinatrion[] = $meta->post_id;
			}
		}
	}
	if($All_package != '' && $All_package != 'all')
	{
		$allMetas = $wpdb->get_results( "SELECT post_id FROM $wpdb->postmeta WHERE  `meta_value` = '$destinatrion' " );
		foreach ($allMetas as $meta)
		{
			if ( isset( $meta->post_id ) )
			{
				$destinatrion[] = $meta->post_id;
			}
		}
	}


	return $destinatrion;

}







//Latest Promotion Posts Function
//give data of 4 special posts ID

function latest_promotion_post(){

    global $wpdb;
    $query_promotion = $wpdb->get_results( "SELECT post_id FROM $wpdb->postmeta WHERE  `meta_key`= 'latest_promotion' AND `meta_value` = 'yes'  ORDER BY rand() LIMIT 4 " );
    $post_in = [];
    foreach ($query_promotion as $key => $value)
    {
        $post_in[] = $query_promotion[$key]->post_id;
    }

    $args = array(
        'post_type' => 'post', // must
        'post__in' => $post_in
    );
    $my_query = new WP_Query($args);
    return $my_query;
}



add_action('wp_ajax_my_action' , 'data_fetch');
add_action('wp_ajax_nopriv_my_action' , 'data_fetch');

// Function Name data_fetch
//onclick custom package Form destination Select then hotel data fetch
//hotel detail selet option pass to the ajax response
function data_fetch (){

	if(isset($_REQUEST['newVal'])){ $newVal  = 'source'.$_REQUEST['newVal']; }
	$args = array( 'post_type' => 'countries' , `post_status` => 'publish');

	$loop = new WP_Query($args);
	$countries = $loop->posts;

	$HtmlData  = '';
	$HtmlData .= '<div class="row m-r-0 " >';
	$HtmlData .= '<span class="wpcf7-form-control-wrap menu-392">';
	$HtmlData .= '<select name="'.$newVal.'" class="wpcf7-form-control wpcf7-select user-success" id="country">';
	//$HtmlData .= '<option value="1" > Please Select Source </option>';
	foreach ($countries as $country) {
		$HtmlData .= '<option value="'.$country->post_title.'" >'.ucwords($country->post_title).'</option>';
	}
	$HtmlData .= '</select>';
	$HtmlData .= '</span>';
	$HtmlData .= '</div>';
	echo $HtmlData;
	exit;
}






add_action('wp_ajax_destination_action' , 'data_destination');
add_action('wp_ajax_nopriv_destination_action' , 'data_destination');

// Function Name data_destination
//Destination get by ajax on loading or click on + button on Custom package page
function data_destination (){

	if(isset($_REQUEST['newVal'])){ $newVal  = 'destination'.$_REQUEST['newVal']; $value = $_REQUEST['newVal']; }
	$args = array( 'post_type' => 'countries' , `post_status` => 'publish');

	$loop = new WP_Query($args);
	$countries = $loop->posts;

	$HtmlData  = '';
	$HtmlData .= '<div class="row m-l-0" >';
	$HtmlData .= '<span class="wpcf7-form-control-wrap menu-392">';
	$HtmlData .= '<select name="'.$newVal.'" class="wpcf7-form-control wpcf7-select user-success" onChange="fetch_hotels(this.value , '.$value.');" >';
	//$HtmlData .= '<option value="1" > Please Select Destination </option>';
	foreach ($countries as $country) {
		$HtmlData .= '<option value='.$country->ID.' >'.ucwords($country->post_title).'</option>';
	}
	$HtmlData .= '</select>';
	$HtmlData .= '</span>';
	$HtmlData .= '</div>';
	echo $HtmlData;
	exit;
}


add_action('wp_ajax_get_hotels' , 'hotels_fetch');
add_action('wp_ajax_nopriv_get_hotels' , 'hotels_fetch');

// Function Name hotels_fetch
//hotlel with individual div select by this function
//Get 2 value from ajax request
//hotel detail selet option pass to the ajax response
function hotels_fetch() {

	$post_id = $_REQUEST['post_id'];
	$htmlvalue = $_REQUEST['htmlvalue'];
	global $wpdb;
	$Sourcename = $wpdb->get_results( "SELECT post_title FROM $wpdb->posts WHERE `post_type` = 'countries' AND `ID` = '$post_id' AND post_status = 'publish' " );

	foreach ( $Sourcename as $post_title ) {
		$country = $post_title->post_title;
	}
	$allpost_id = $wpdb->get_results( "SELECT `post_id` FROM $wpdb->postmeta WHERE `meta_value` = '$post_id' AND `meta_key` = 'city_meta_box_country'" );

	$HtmlData = '';
	$HtmlData .= '<div class="row m-r-0" id="replace_able'.$htmlvalue.'">';
	$HtmlData .= '<span class="wpcf7-form-control-wrap hotel'.$htmlvalue.'">';

	$HtmlData .= '<select name="hotel'.$htmlvalue.'" class="wpcf7-form-control wpcf7-select user-success" >';

	foreach ( $allpost_id as $post_id ) {
		$hotlesName = $wpdb->get_results( "SELECT `post_title` FROM $wpdb->posts WHERE `ID` = '$post_id->post_id' AND `post_status` = 'publish' " );
		foreach ( $hotlesName as $hotel ) {
			$HtmlData .= '<option value="'.$hotel->post_title.'" >' . ucwords( $hotel->post_title ) . '</option>';
		}
	}

	$HtmlData .= '</select>';
	$HtmlData .= '</span>';
	$HtmlData .= '</div>';


	$data[0] = $HtmlData;
	$data[1] = $country;

	header( "Content-Type: application/json" );
	echo json_encode($data);
	exit;

}



add_action( 'edit_form_after_editor', 'no_metabox_wspe_114084' );
add_action( 'save_post', 'save_wpse_114084', 10, 2 );

function no_metabox_wspe_114084()
{
	global $post;
	if( 'page' != $post->post_type )
		return;

	$editor1 = get_post_meta( $post->ID, 'arabic_page_content', true);
	$editor2 = get_post_meta( $post->ID, 'arabic_title', true);
    $Arabic_background = get_post_meta( $post->ID, 'Arabic_background', true);
    $English_background = get_post_meta( $post->ID, 'English_background', true);
	wp_nonce_field( plugin_basename( __FILE__ ), 'wspe_114084' );



    echo '<h2>BackGround Image for English Page</h2>';
    echo '<input type="text" style="padding: 3px 8px;
    font-size: 1.7em;
    line-height: 100%;
    height: 1.7em;
    width: 100%;
    outline: 0;
    margin: 0 0 3px;
    background-color: #fff;" name="English_background" value="'.$English_background.'" spellcheck="true" autocomplete="off" aria-invalid="false" class="form-control" placeholder="Enter Image URL">';

    echo '<h2>BackGround Image for Arabic Page</h2>';
    echo '<input type="text" style="padding: 3px 8px;
    font-size: 1.7em;
    line-height: 100%;
    height: 1.7em;
    width: 100%;
    outline: 0;
    margin: 0 0 3px;
    background-color: #fff;" name="Arabic_background" value="'.$Arabic_background.'" spellcheck="true" autocomplete="off" aria-invalid="false" class="form-control" placeholder="Enter Image URL">';


    echo '<h2>Arabic Title</h2>';
	echo '<input style="padding: 3px 8px;
    font-size: 1.7em;
    line-height: 100%;
    height: 1.7em;
    width: 100%;
    outline: 0;
    margin: 0 0 3px;
    background-color: #fff;" type="text" name="arabic_title" value="'.$editor2.'" spellcheck="true" autocomplete="off" aria-invalid="false" class="form-control" >';
    
	echo '<h2>Add Arabic Text</h2>';
	echo wp_editor( $editor1, 'arabic_page_content', array( 'textarea_name' => 'arabic_page_content' ) );

}

function save_wpse_114084( $post_id, $post_object )
{
	if( !isset( $post_object->post_type ) || 'page' != $post_object->post_type )
		return;

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return;

	if ( !isset( $_POST['wspe_114084'] ) || !wp_verify_nonce( $_POST['wspe_114084'], plugin_basename( __FILE__ ) ) )
		return;

	if ( isset( $_POST['arabic_page_content'] )  )
		update_post_meta( $post_id, 'arabic_page_content', $_POST['arabic_page_content'] );

	if ( isset( $_POST['arabic_title'] )  )
		update_post_meta( $post_id, 'arabic_title', $_POST['arabic_title'] );
    if ( isset( $_POST['English_background'] )  )
        update_post_meta( $post_id, 'English_background', $_POST['English_background'] );
    if ( isset( $_POST['Arabic_background'] )  )
        update_post_meta( $post_id, 'Arabic_background', $_POST['Arabic_background'] );

}

/*
 * This Function use For The Arabic Page Title Get
 * Get Data From Table post_meta on behalf of post_id
 * return Title Arabic Name
 * */
function arabic_page_title($post_id){
	global $wpdb;
	$arabic_title = $wpdb->get_results( "SELECT `meta_value` FROM $wpdb->postmeta WHERE `post_id` = '$post_id' AND `meta_key` = 'arabic_title'" );
	echo $arabic_title[0]->meta_value;
	//exit;

}


/*
 * This Function use For The Arabic Page Title Get
 * Get Data From Table post_meta on behalf of post_id
 * return Title Arabic Name
 * */
function page_background_image($post_id){
    global $wpdb;
    $metakey  = Language.'_background';
    $Background_Image = $wpdb->get_results( "SELECT `meta_value` FROM $wpdb->postmeta WHERE `post_id` = '$post_id' AND `meta_key` = '$metakey'" );
    return $Background_Image[0]->meta_value;
    //exit;

}

/*
 * This Function use For The Arabic post Title Get
 * Get Data From Table post_meta on behalf of post_id
 * return Title Arabic Name
 * */
function get_post_title_arabic($post_id){
	global $wpdb;
	$arabic_title = $wpdb->get_results( "SELECT `meta_value` FROM $wpdb->postmeta WHERE `post_id` = '$post_id' AND `meta_key` = 'arabic_post_title'" );
	return $arabic_title[0]->meta_value;
	//exit;
}



/*
 * This Function Get Slider shordcode
 * Get Data From Table post_meta on behalf of post_id
 * return Title Arabic Name
 * */
function get_Post_slider_code($post_id){
    global $wpdb;
    $arabic_title = $wpdb->get_results( "SELECT `meta_value` FROM $wpdb->postmeta WHERE `post_id` = '$post_id' AND `meta_key` = 'Post_slider_code'" );
    return $arabic_title[0]->meta_value;
    //exit;
}


/*
 * This Function use For The Arabic News Post Title Get
 * Get Data From Table post_meta on behalf of post_id
 * return Title Arabic Name
 * */
function get_news_title_arabic($post_id){
    global $wpdb;
    $arabic_title = $wpdb->get_results( "SELECT `meta_value` FROM $wpdb->postmeta WHERE `post_id` = '$post_id' AND `meta_key` = 'arabic_news_title'" );
    return $arabic_title[0]->meta_value;
    //exit;
}




/*
 * This Function use For The Arabic News Post Title Get
 * Get Data From Table post_meta on behalf of post_id
 * return Title Arabic Name
 * */
function get_news_text_arabic($post_id){
    global $wpdb;
    $arabic_title = $wpdb->get_results( "SELECT `meta_value` FROM $wpdb->postmeta WHERE `post_id` = '$post_id' AND `meta_key` = 'arabic_news_text'" );
    return $arabic_title[0]->meta_value;
    //exit;
}


/*
 * This Function use For The Arabic post Excerpt Get
 * Get Data From Table post_meta on behalf of post_id
 * return Excerpt Arabic Name
 * */
function get_post_excerpt_arabic($post_id){
	global $wpdb;
	$arabic_title = $wpdb->get_results( "SELECT `meta_value` FROM $wpdb->postmeta WHERE `post_id` = '$post_id' AND `meta_key` = 'arabic_post_excerpt'" );
	return $arabic_title[0]->meta_value;
	//exit;
}


/*
 * This Function use For The Arabic Page Content Get
 * Get Data From Table post_meta on behalf of post_id
 * return Arabic Page Content
 * */
function arabic_page_content($post_id){
	global $wpdb;
	$arabic_page_content = $wpdb->get_results( "SELECT `meta_value` FROM $wpdb->postmeta WHERE `post_id` = '$post_id' AND `meta_key` = 'arabic_page_content'" );
	return $arabic_page_content[0]->meta_value;
	//exit;

}


function get_tabs_content_arabic($post_id){
	global $wpdb;
	$arabic_page_content = $wpdb->get_results( "SELECT `meta_value` FROM $wpdb->postmeta WHERE `post_id` = '$post_id' AND `meta_key` = 'arabic_post_content'" );
	return $arabic_page_content[0]->meta_value;
	//exit;

}


function wpb_custom_new_menu() {
	register_nav_menus(
		array(
			'my-custom-menu' => __( 'My Custom Menu' ),
		)
	);
}
add_action( 'init', 'wpb_custom_new_menu' );



function wpb_page_sidebar_menu_English() {
    register_nav_menus(
        array(
            'page-sidebar-menu-English' => __( 'My Page Sidebar Menu English' ),
        )
    );
}
add_action( 'init', 'wpb_page_sidebar_menu_English' );


function wpb_page_sidebar_menu_Arabic() {
    register_nav_menus(
        array(
            'page-sidebar-menu-Arabic' => __( 'My Page Sidebar Menu Arabic' ),
        )
    );
}
add_action( 'init', 'wpb_page_sidebar_menu_Arabic' );



//post arabic feature add new text field and content
add_action( 'edit_form_after_editor', 'post_tabs_create' );
add_action( 'save_post', 'save_post_Fields', 10, 2 );

function post_tabs_create()
{
	global $post;
	if( 'post' != $post->post_type )
		return;

	$arabic_post_title   = get_post_meta( $post->ID, 'arabic_post_title', true);
    $arabic_event_id     = get_post_meta( $post->ID, 'arabic_event_id', true);
	$arabic_post_excerpt = get_post_meta( $post->ID, 'arabic_post_excerpt', true);
	$arabic_post_content = get_post_meta( $post->ID, 'arabic_post_content', true);
    $latest_promotion    = get_post_meta( $post->ID, 'latest_promotion', true);
    $Post_slider_code   = get_post_meta( $post->ID, 'Post_slider_code', true);

	wp_nonce_field( plugin_basename( __FILE__ ), 'wspe_114084' );

    echo '<div style="margin: 10px">';
    echo '<h2>Post Slider Shortcode</h2>';
    echo '<textarea rows="1" cols="40"  style="padding: 3px 8px;
    font-size: 1.7em;
    line-height: 100%;
    height: 1.7em;
    width: 100%;
    outline: 0;
    margin: 0 0 3px;
    background-color: #fff;" name="Post_slider_code"name="Post_slider_code" id="excerpt" aria-invalid="false" class="valid" >'.$Post_slider_code.'</textarea>';
   echo '</div>';




    echo '<div style="background-color:palegreen; margin: 10px"> <h2>Latest Promotions ';
    echo '<input type="radio" name="latest_promotion"  value="yes" ';
     if($latest_promotion == 'yes'){ echo  'checked';
     }
     echo ' style="margin-left:100px;" > Yes ';
    echo ' <input type="radio" name="latest_promotion"  value="No" ';
    if($latest_promotion == 'No'){ echo  'checked';
    }
    echo ' style="margin-left:10px;" > No ';
    echo ' <span style="background-color: white;margin-left:30px; "> Check Any One Please </span>';
    echo '</h2></div>';


    echo '<div style="margin: 10px">';
    echo '<h2>Arabic Event ID</h2>';
    echo '<input type="text" style="padding: 3px 8px;
    font-size: 1.7em;
    line-height: 100%;
    height: 1.7em;
    width: 100%;
    outline: 0;
    margin: 0 0 3px;
    background-color: #fff;" name="arabic_event_id" value="'.$arabic_event_id.'" spellcheck="true" autocomplete="off" aria-invalid="false" class="form-control" placeholder="Enter Event ID for Arabic" ><div style="background-color:black;color:white;">Leave Empty If no Event for This post in Arabic </div>';
    echo '</div>';




    echo '<div style="margin: 10px">';
	echo '<h2>Arabic Title</h2>';
	echo '<input type="text" style="padding: 3px 8px;
    font-size: 1.7em;
    line-height: 100%;
    height: 1.7em;
    width: 100%;
    outline: 0;
    margin: 0 0 3px;
    background-color: #fff;" name="arabic_post_title" value="'.$arabic_post_title.'" spellcheck="true" autocomplete="off" aria-invalid="false" class="form-control" dir="rtl"  >';
    echo '</div>';

    echo '<div style=" margin: 10px">';
    echo '<h2>Add Arabic Excerpt</h2>';
	echo '<textarea rows="1" cols="40" name="arabic_post_excerpt" id="excerpt" aria-invalid="false" class="valid"  dir="rtl" >'.$arabic_post_excerpt.'</textarea>';
    echo '</div>';
    echo '<div style="">';
	echo '<h2>Add Arabic Tabs Short Code</h2>';
	echo wp_editor( $arabic_post_content, 'arabic_post_content', array( 'textarea_name' => 'arabic_post_content' ) );
    echo '</div>';

}

function save_post_Fields( $post_id, $post_object )
{
	if( !isset( $post_object->post_type ) || 'post' != $post_object->post_type )
		return;

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return;

	if ( !isset( $_POST['wspe_114084'] ) || !wp_verify_nonce( $_POST['wspe_114084'], plugin_basename( __FILE__ ) ) )
		return;
    if ( isset( $_POST['latest_promotion'] )  )
        update_post_meta( $post_id, 'latest_promotion', $_POST['latest_promotion'] );

	if ( isset( $_POST['arabic_post_title'] )  )
		update_post_meta( $post_id, 'arabic_post_title', $_POST['arabic_post_title'] );

    if ( isset( $_POST['arabic_event_id'] )  )
        update_post_meta( $post_id, 'arabic_event_id', $_POST['arabic_event_id'] );

    if ( isset( $_POST['arabic_post_excerpt'] )  )
		update_post_meta( $post_id, 'arabic_post_excerpt', $_POST['arabic_post_excerpt'] );

	if ( isset( $_POST['arabic_post_content'] )  )
		update_post_meta( $post_id, 'arabic_post_content', $_POST['arabic_post_content'] );

    if ( isset( $_POST['Post_slider_code'] )  )
        update_post_meta( $post_id, 'Post_slider_code', $_POST['Post_slider_code'] );

}




//Post Category get Same category for event and post
//give data of 4 Event posts ID

function Events_data_fetch($post_id){
    $categoryName = get_the_category(get_the_ID())[0]->name;
    return $categoryName;
}
function Arabic_event_Name($post_id){

    global $wpdb;
    $query_promotion = $wpdb->get_results( "SELECT * FROM $wpdb->postmeta WHERE  `meta_key`= 'arabic_event_id' AND `post_id` = '$post_id' " );

    $arabic_event_id =  $query_promotion[0]->meta_value;;
    $categoryName = get_the_category($arabic_event_id)[0]->name;
    return $categoryName;

}

function excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...</br>';
    } else {
        $excerpt = implode(" ",$excerpt);
    }
    $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
    return $excerpt;
}

function my_excerpt($limit,$id) {

    $excerpt = explode(' ', get_post_excerpt_arabic($id), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...</br>';
    } else {
        $excerpt = implode(" ",$excerpt);
    }
    $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
    return $excerpt;
}

