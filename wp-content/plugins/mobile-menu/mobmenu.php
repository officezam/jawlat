<?php

/* 
	Plugin Name: Mobile Menu
	Plugin URI: http://www.wpmobilemenu.com/ 
	Description: An easy to use WordPress responsive mobile menu. Keep your mobile visitors engaged.
	Version: 2.3
	Author: Takanakui 
	Author URI: http://www.jedipress.com
	License: GPLv2 
*/


function mm_fs() {
    global $mm_fs;

    if ( ! isset( $mm_fs ) ) {
        // Include Freemius SDK.
        require_once dirname(__FILE__) . '/freemius/start.php';

        $mm_fs = fs_dynamic_init( array(
            'id'                => '235',
            'slug'              => 'mobile-menu',
            'public_key'        => 'pk_1ec93edfb66875251b62505b96489',
            'is_premium'        => false,
            'has_addons'        => false,
            'has_paid_plans'    => false,
            'menu'              => array(
            'slug'              => 'mobile-menu-options',
            ),
        ) );
    }

    return $mm_fs;
}


// Init Freemius.
$mm_fs = mm_fs();

//Uninstall Action
$mm_fs->add_action('after_uninstall', 'mm_fs_uninstall_cleanup');

require_once( 'titan-framework/titan-framework-embedder.php' );

// Filters
add_filter('wp_head', 'mob_menu_dynamic_css_style');

//Hooks

// Admin Scripts
add_action( 'admin_enqueue_scripts', 'mobmenu_enqueue_admin_scripts' );

// Frontend Scripts
add_action('wp_enqueue_scripts', 'mobmenu_enqueue_scripts',100);

// Sidebar Menu Widgets
add_action( 'wp_loaded', 'mob_menu_register_sidebar' );

//Enqueu Html to the Footer
if ( !is_admin() ){
 	add_action( 'wp_footer', 'mob_menu_markup');	

}

add_action( 'tf_create_options', 'wp_mobile_menu_create_options' );
function wp_mobile_menu_create_options() {


	$prefix = ''; 
    // Initialize Titan with my special unique namespace
    $titan = TitanFramework::getInstance( 'mobmenu' );

	// Create my admin panel
    $panel = $titan->createAdminPanel( array(
        'name' => 'Mobile Menu Options',
		'icon' => 'dashicons-smartphone',
    ) );
	
	// Create General Options panel
	$general_tab = $panel->createTab( array( 'name' => 'General Options' ) );

	// Create Header Options panel
	$header_tab = $panel->createTab( array( 'name' => 'Header options' ) );

	// Create Left Menu Options panel
	$left_menu_tab = $panel->createTab( array( 'name' => 'Left Menu options' ) );

	// Create Right Menu Options panel
	$right_menu_tab = $panel->createTab( array( 'name' => 'Right Menu options' ) );

 	// Create Color Options panel
	$colors_tab = $panel->createTab( array( 'name' => 'Color Options' ) );
 
    // Enable/Disable WP Mobile Menu
    $general_tab->createOption( array(
    	'name'    => 'Enable Mobile Menu',
    	'id'      => 'enabled',
    	'type'    => 'enable',
    	'default' => true,
    	'desc'    => 'Enable or disable the WP Mobile Menu without deactivate the plugin.',
    	'enabled'  => 'On',
    	'disabled' => 'Off',
	) );


    $enable_left_menu = get_option('mobmenu_opt_left_menu_enabled');    
    
    if ( $enable_left_menu == 'false'){
        $enable_left_menu = false; 
    } else {
        $enable_left_menu = true;
    }

    // Enable/Disable Left Header Menu
    $general_tab->createOption( array(
        'name'    => 'Enable Left Header Menu',
        'id'      => 'enable_left_menu',
        'type'    => 'enable',
        'default' => $enable_left_menu,
        'desc'    => 'Enable or disable the WP Mobile Menu without deactivate the plugin.',
        'enabled'  => 'On',
        'disabled' => 'Off',
    ) );

    $enable_right_menu = get_option('mobmenu_opt_right_menu_enabled');
    
    if ( $enable_right_menu == 'false'){
        $enable_right_menu = false; 
    } else {
        $enable_right_menu = true;
    }

    // Enable/Disable Right Header Menu
    $general_tab->createOption( array(
        'name'     => 'Enable Right Header Menu',
        'id'       => 'enable_right_menu',
        'type'     => 'enable',
        'default'  => $enable_right_menu,
        'desc'     => 'Enable or disable the WP Mobile Menu without deactivate the plugin.',
        'enabled'  => 'On',
        'disabled' => 'Off',
    ) );
	
	// Width trigger
	$general_tab->createOption( array(
    	'name'    => 'Width Trigger',
    	'id'      => 'width_trigger',
    	'type'    => 'number',
    	'desc'    => 'Specify the width that will trigger the display of the mobile menu',
    	'default' => get_option( 'mobmenu_opt_res_trigger' , '1024' ),
    	'max'     => '2000',
    	'min'     => '479',
    	'unit'    => 'px'

	) );

	// Hide Html Elements
    $general_tab->createOption( array(
        'name'    => 'Hide Elements',  
        'id'      => 'hide_elements',  
        'type'    => 'text',
        'default' => get_option( 'mobmenu_opt_hide_selectors' , '' ),
        'desc'    => '<p>This will hide the desired elements when the Mobile menu is trigerred at the chosen width.</p><p>You can use css class or IDs.</p><p> Example: .menu , #nav</p>',
    ) );

    //Custom css
    $general_tab->createOption( array(
        'name' => 'Custom CSS',
        'id' => 'custom_css',
        'type' => 'code',
        'desc' => 'Put your custom CSS rules here',
        'lang' => 'css',
    ) );  
   
    // Enable/Disable Site Logo
    $header_tab->createOption( array(
    	'name'    => 'Site Logo',
    	'id'      => 'enabled_logo',
    	'type'    => 'enable',
    	'default' => false,
    	'desc'    => 'Choose if you want to display an image has logo or text instead.',
    	'enabled'  => 'Logo',
    	'disabled' => 'Text',
	) );

    //Site Logo Image
	$header_tab->createOption( array(
	    'name' => 'Logo',
    	'id'   => 'logo_img',
    	'type' => 'upload', 
    	'desc' => 'Upload your logo image',
    	'default' => get_option( 'mobmenu_opt_site_logo_img' )

	) );

    // Enable/Disable Naked Header
    $header_tab->createOption( array(
        'name'    => 'Naked Header',
        'id'      => 'enabled_naked_header',
        'type'    => 'enable',
        'default' => false,
        'desc'    => 'Choose if you want to display a naked header with no background color(transparent).',
        'enabled'  => 'Yes',
        'disabled' => 'No',
    ) );

  
    //Alternative Site URL
    $header_tab->createOption( array(
        'name' => 'Alternative Logo URL',
        'id'   => 'logo_url',
        'type' => 'text', 
        'desc' => 'Enter you alternative logo URL. If you leave it blank it will use the Site URL.',
        'default' => ''

    ) );

    // Enable/Disable Logo Url
    $header_tab->createOption( array(
        'name'    => 'Disable Logo URL ',
        'id'      => 'disabled_logo_url',
        'type'    => 'enable',
        'default' => false,
        'desc'    => 'Choose if you want to disable the logo url to avoid being redirect to the homepage or alternative home url when touching the header logo.',
        'enabled'  => 'Yes',
        'disabled' => 'No',
    ) );

	//Header Height
	$header_tab->createOption( array(
    	'name'    => 'Header Height',
    	'id'      => 'header_height',
    	'type'    => 'number',
    	'desc'    => 'Enter the height of the header',
    	'default' => get_option( 'mobmenu_opt_header_height' , '40' ),
    	'max'     => '500',
    	'min'     => '20',
    	'unit'    => 'px'

	) );

    //Logo Top Margin
	$header_tab->createOption( array(
    	'name'    => 'Logo Top Margin',
    	'id'      => 'logo_top_margin',
    	'type'    => 'number',
    	'desc'    => 'Enter the logo top margin',
    	'default' => get_option( 'mobmenu_opt_header_logo_topmargin' , '5' ),
    	'max'     => '450',
    	'min'     => '0',
    	'unit'    => 'px'

	) );

    // Header Text
    $header_tab->createOption( array(
        'name'    => 'Header Text',  
        'id'      => 'header_text',
        'type'    => 'text',
        'desc'    => 'Enter the desired text for the Mobile Header',
        'default' => get_option('mobmenu_opt_header_text', ''),
    ) );
 
    //Header Text Font Size
    
	$header_tab->createOption( array(
    	'name'    => 'Header Text Font Size',
    	'id'      => 'header_font_size',
    	'type'    => 'number',
    	'desc'    => 'Enter the header text font size',
    	'default' => get_option( 'mobmenu_opt_header_font_size', '20' ),
    	'max'     => '100',
    	'min'     => '5',
    	'unit'    => 'px'

	) );

    $def_value = $titan->getOption( 'header_font_size'  );
    
    if ( $def_value > 0 ) {
         $def_value .= 'px';
    } else {
        $def_value = '';
    }
   
    $header_tab->createOption( array(
        'name' => 'Header Menu Font',
        'id' => 'header_menu_font',
        'type' => 'font',
        'desc' => 'Select a style',
        'show_font_weight' => true, 
        'show_font_style' => true,
        'show_line_height' => true,
        'show_letter_spacing' => true,
        'show_text_transform' => true,
        'show_font_variant' => false,
        'show_text_shadow' => false,
        'show_color' => false,
        'css' => '.mobmenu .headertext {
                     value
         }',
        'default' => array( 
                        'line-height' => '1.5em',
                        'font-family' => 'Dosis',
                        'font-size'   => $def_value
                        ),
   
) );


	$menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) );
	$menus_options = array();
	$menus_options[0] = 'Choose one menu';

	foreach( $menus as $menu ){ 
		$menus_options[$menu->name] =  $menu->name ;
	} 

    //Left Menu
	$left_menu_tab->createOption( array(
		'name' => 'Left Menu',
		'id' => 'left_menu',
		'type' => 'select',
		'desc' => 'Select the menu that will open in the left side.',
    	'options' => $menus_options,
        'default' => get_option( 'mobmenu_opt_left_menu', '0' ) ,
		
	) );

     $left_menu_tab->createOption( array(
        'name' => 'Left Menu Font',
        'id' => 'left_menu_font',
        'type' => 'font',
        'desc' => 'Select a style',
        'show_font_weight' => true, 
        'show_font_style' => true,
        'show_line_height' => true,
        'show_letter_spacing' => true,  
        'show_text_transform' => true,
        'show_font_variant' => false,
        'show_text_shadow' => false,
        'show_color' => false,
        'css' => '#mobmenuleft > .widgettitle, #mobmenuleft li a, #mobmenuleft li a:visited, #mobmenuleft .mobmenu_content h2, #mobmenuleft .mobmenu_content h3 {
                     value
         }',
        'default' => array( 
                        'line-height' => '1.5em',
                        'font-family' => 'Dosis'
                        ),
   
    ) );


     //Left Menu Background Image
    $left_menu_tab->createOption( array( 
        'name'    => 'Left Menu Background Image',
        'id'      => 'left_menu_bg_image',
        'type'    => 'upload',
        'desc'    => 'Upload your left menu background image(this will override the Background color option)',

    ) );

    //Left Menu Background Image Opacity
    $left_menu_tab->createOption( array(
        'name'    => 'Left Menu Background Image Opacity',
        'id'      => 'left_menu_bg_opacity',
        'type'    => 'number',
        'desc'    => 'Enter the Left Background image opacity',
        'default' => '100',
        'max'     => '100',
        'min'     => '10',
        'step'    => '10',
        'unit'    => '%'

    ) );


 	// Icon Image/text Option
    $left_menu_tab->createOption( array(
    	'name'    => 'Menu Icon',
    	'id'      => 'left_menu_icon_opt',
    	'type'    => 'enable',
    	'default' => true,
    	'desc'    => 'Choose if you want to display an image or an icon.',
    	'enabled'  => 'Image',
    	'disabled' => 'Icon Font',
	) );

	//Left Menu Icon
	$left_menu_tab->createOption( array(
	    'name' => 'Menu Icon Image',
    	'id'   => 'left_menu_icon',
    	'type' => 'upload',
    	'desc' => 'Upload your left menu icon image',
    	'default' => get_option( 'mobmenu_opt_left_icon')

	) );

    // Left Menu Panel Width Units
    $left_menu_tab->createOption( array(
        'name'    => 'Left Menu Width Units',
        'id'      => 'left_menu_width_units',
        'type'    => 'enable',
        'default' => true,
        'desc'    => 'Choose the width units.',
        'enabled'  => 'Pixels',
        'disabled' => 'Percentage',
    ) );

	 //Left Menu Panel Width
	$left_menu_tab->createOption( array(
    	'name'    => 'Menu Panel Width(Pixels)',
    	'id'      => 'left_menu_width',
    	'type'    => 'number',
    	'desc'    => 'Enter the Left Menu Panel Width',
    	'default' => '270',
    	'max'     => '1000',
    	'min'     => '0',
    	'unit'    => 'px'

	) );


     //Left Menu Panel Width
    $left_menu_tab->createOption( array(
        'name'    => 'Menu Panel Width(Percentage)',
        'id'      => 'left_menu_width_percentage',
        'type'    => 'number',
        'desc'    => 'Enter the Left Menu Panel Width',
        'default' => '70',
        'max'     => '90',
        'min'     => '0',
        'unit'    => '%'

    ) );

	 //Left Menu Icon Top Margin
	$left_menu_tab->createOption( array(
    	'name'    => 'Icon Top Margin',
    	'id'      => 'left_icon_top_margin',
    	'type'    => 'number',
    	'desc'    => 'Enter the Left Icon Top Margin',
    	'default' => get_option( 'mobmenu_opt_left_icon_topmargin', '10' ),
    	'max'     => '450',
    	'min'     => '0',
    	'unit'    => 'px'

	) );

	 //Left Menu Icon Left Margin
	$left_menu_tab->createOption( array(
    	'name'    => 'Icon Left Margin',
    	'id'      => 'left_icon_left_margin',
    	'type'    => 'number',
    	'desc'    => 'Enter the Left Icon Left Margin',
    	'default' => '5',
    	'max'     => '450',
    	'min'     => '0',
    	'unit'    => 'px'

	) );

	//Right Menu
	$right_menu_tab->createOption( array(
		'name' => 'Right Menu',
		'id' => 'right_menu',
		'type' => 'select',
		'desc' => 'Select the menu that will open in the right side.',
    	'options' => $menus_options,
        'default' => get_option( 'mobmenu_opt_right_menu', '0' ) ,
		
	) );  
	
	// Icon Image/Icon Font
    $right_menu_tab->createOption( array(
    	'name'    => 'Menu Icon',
    	'id'      => 'right_menu_icon_opt',
    	'type'    => 'enable',
    	'default' => true,
    	'desc'    => 'Choose if you want to display an image or an icon.',
    	'enabled'  => 'Image',
    	'disabled' => 'Icon Font',
	) );

	//Right Menu Icon
	$right_menu_tab->createOption( array(
	    'name' => 'Menu Icon Image',
    	'id'   => 'right_menu_icon',
    	'type' => 'upload',
    	'desc' => 'Upload your right menu icon image',
    	'default' => get_option( 'mobmenu_opt_right_icon')

	) );

    //Right Menu Font
    $right_menu_tab->createOption( array(
        'name' => 'Right Menu Font',
        'id' => 'right_menu_font',
        'type' => 'font',
        'desc' => 'Select a style',
        'show_font_weight' => true, 
        'show_font_style' => true,
        'show_line_height' => true,
        'show_letter_spacing' => true,
        'show_text_transform' => true,
        'show_font_variant' => false,
        'show_text_shadow' => false,
        'show_color' => false,
        'css' => '#mobmenuright li a, #mobmenuright li a:visited, #mobmenuright .mobmenu_content h2, #mobmenuright .mobmenu_content h3 {
                     value
         }',
        'default' => array( 
                        'line-height' => '1.5em',
                        'font-family' => 'Dosis'
                        ),
   
    ) );

    //Right Menu Background Image
    $right_menu_tab->createOption( array(
        'name' => 'Right Menu Background Image',
        'id'   => 'right_menu_bg_image',
        'type' => 'upload',
        'desc' => 'upload your right menu background image(this will override the Background color option)',

    ) );

    //Right Menu Background Image Opacity
    $right_menu_tab->createOption( array(
        'name'    => 'Right Menu Background Image Opacity',
        'id'      => 'right_menu_bg_opacity',
        'type'    => 'number',
        'desc'    => 'Enter the Right Background image opacity',
        'default' => '100',
        'max'     => '100',
        'min'     => '10',
        'step'    => '10',
        'unit'    => '%'

    ) );

    //Right Menu Panel Width Units
    $right_menu_tab->createOption( array(
        'name'    => 'Right Menu Width Units',
        'id'      => 'right_menu_width_units',
        'type'    => 'enable',
        'default' => true,
        'desc'    => 'Choose the width units.',
        'enabled'  => 'Pixels',
        'disabled' => 'Percentage',
    ) );
    
    //Right Menu Panel Width
    $right_menu_tab->createOption( array(
        'name'    => 'Right Menu Panel Width(Pixels)',
        'id'      => 'right_menu_width',
        'type'    => 'number',
        'desc'    => 'Enter the Right Menu Panel Width',
        'default' => '270',
        'max'     => '450',
        'min'     => '0',
        'unit'    => 'px'

    ) );

     //Right Menu Panel Width
    $right_menu_tab->createOption( array(
        'name'    => 'Right Menu Panel Width(Percentage)',
        'id'      => 'right_menu_width_percentage',
        'type'    => 'number',
        'desc'    => 'Enter the Right Menu Panel Width',
        'default' => '70',
        'max'     => '90',
        'min'     => '0',
        'unit'    => '%'

    ) );	

	 //Right Menu Icon Top Margin
	$right_menu_tab->createOption( array(
    	'name'    => 'Icon Top Margin',
    	'id'      => 'right_icon_top_margin',
    	'type'    => 'number',
    	'desc'    => 'Enter the Right Icon Top Margin',
    	'default' => get_option( 'mobmenu_opt_right_icon_topmargin', '10' ),
    	'max'     => '450',
    	'max'     => '450',
    	'min'     => '0',
    	'unit'    => 'px'

	) );

	 //Right Menu Icon Right Margin
	$right_menu_tab->createOption( array(
    	'name'    => 'Icon Right Margin',
    	'id'      => 'right_icon_right_margin',
    	'type'    => 'number',
    	'desc'    => 'Enter the Right Icon Right Margin',
    	'default' => '5',
    	'max'     => '450',
    	'min'     => '0',
    	'unit'    => 'px'

	) );

	//Header Background color
	$colors_tab->createOption( array(
    	'name' => 'Header Background Color',
    	'id' => 'header_bg_color',
    	'type' => 'color',
    	'desc' => '',
        'alpha' => true,
    	'default' => get_option( 'mobmenu_opt_header_bgcolor' , '#3f444c' ),
	) );

	//Header Text color
	$colors_tab->createOption( array(
    	'name' => 'Header Text Color',
    	'id' => 'header_text_color',
    	'type' => 'color',
    	'desc' => '',
        'alpha' => true,
    	'default' => get_option( 'mobmenu_opt_header_textcolor', '#fff' ),
	) );

	// Header Left Menu Section	
	$colors_tab->createOption( array(
    	'name' => 'Left Menu Colors',
		'type' => 'heading',
	) );


	//Left Menu Header Icon color
	$colors_tab->createOption( array(
    	'name' => 'Left Menu Icon Color',
    	'id' => 'left_menu_icon_color',
    	'type' => 'color',
    	'desc' => '',
        'alpha' => true,
    	'default' => '#fff',
	) );

	//Left Panel Background color
	$colors_tab->createOption( array(
    	'name' => 'Background Color',
    	'id' => 'left_panel_bg_color',
    	'type' => 'color',
    	'desc' => '',
        'alpha' => true,
    	'default' => get_option( 'mobmenu_opt_left_menu_bgcolor', '#38404c' )
	) );

	//Left Panel Text color
	$colors_tab->createOption( array(
    	'name' => 'Text Color',
    	'id' => 'left_panel_text_color',
    	'type' => 'color',
    	'desc' => '',
        'alpha' => true,
    	'default' => get_option( 'mobmenu_opt_left_text_color', '#fff' ),
	) );

    //Left Panel Background Hover Color
    $colors_tab->createOption( array(
        'name' => 'Background Hover Color',
        'id' => 'left_panel_hover_bgcolor',
        'type' => 'color',
        'desc' => '',
        'alpha' => true,
        'default' => get_option( 'mobmenu_opt_left_bg_color_hover', '#8dacba' ),
    ) );

	//Left Panel Text color Hover  
	$colors_tab->createOption( array(
    	'name' => 'Hover Text Color',
    	'id' => 'left_panel_hover_text_color',
    	'type' => 'color',
    	'desc' => '',
        'alpha' => true,
    	'default' => get_option( 'mobmenu_opt_left_text_color_hover', '#fff' ),
	) );


    //Left Panel Sub-menu Background Color
    $colors_tab->createOption( array(
        'name' => 'Submenu Background Color',
        'id' => 'left_panel_submenu_bgcolor',
        'type' => 'color',
        'desc' => '',
        'alpha' => true,
        'default' => get_option( 'mobmenu_opt_left_submenu_bg_color', '#3a3a3a' ),
    ) );

    //Left Panel Sub-menu Text Color
    $colors_tab->createOption( array(
        'name' => 'Submenu Text Color',
        'id' => 'left_panel_submenu_text_color',
        'type' => 'color',
        'desc' => '',
        'alpha' => true,
        'default' => get_option( 'mobmenu_opt_left_submenu_text_color', '#fff' ),
    ) );


	// Header Right Menu Section	
	$colors_tab->createOption( array(
    	'name' => 'Right Menu Colors',
		'type' => 'heading',

	) );

	//Right Menu Header Icon color
	$colors_tab->createOption( array(
    	'name' => 'Right Menu Icon Color',
    	'id' => 'right_menu_icon_color',
    	'type' => 'color',
    	'desc' => '',
        'alpha' => true,
    	'default' => '#fff',
	) );

	//Right Panel Background color
	$colors_tab->createOption( array(
    	'name' => 'Panel Background Color',
    	'id' => 'right_panel_bg_color',
    	'type' => 'color',
    	'desc' => '',
        'alpha' => true,
		'default' => get_option( 'mobmenu_opt_right_menu_bgcolor', '#38404c' )
	) );

	//Right Panel Text color
	$colors_tab->createOption( array(
    	'name' => 'Text Color',
    	'id' => 'right_panel_text_color',
    	'type' => 'color',
    	'desc' => '',
        'alpha' => true,
    	'default' => get_option( 'mobmenu_opt_right_text_color', '#fff' ),
	) );

      //Right Panel Background Hover Color
    $colors_tab->createOption( array(
        'name' => 'Background Hover Color',
        'id' => 'right_panel_hover_bgcolor',
        'type' => 'color',
        'desc' => '',
        'alpha' => true,
        'default' => get_option( 'mobmenu_opt_right_bg_color_hover', '#8dacba' ),
    ) );

	//Right Panel Text color Hover
	$colors_tab->createOption( array(
    	'name' => 'Hover Text Color',
    	'id' => 'right_panel_hover_text_color',
    	'type' => 'color',
    	'desc' => '',
        'alpha' => true,
    	'default' => get_option( 'mobmenu_opt_right_text_color_hover', '#fff' ),
	) );

     //Right Panel Sub-menu Background Color
    $colors_tab->createOption( array(
        'name' => 'Submenu Background Color',
        'id' => 'right_panel_submenu_bgcolor',
        'type' => 'color',
        'desc' => '',
        'alpha' => true,
        'default' => get_option( 'mobmenu_opt_right_submenu_bg_color', '#3a3a3a' ),
    ) );

     //Right Panel Sub-menu Text Color
    $colors_tab->createOption( array(
        'name' => 'Submenu Text Color',
        'id' => 'right_panel_submenu_text_color',
        'type' => 'color',
        'desc' => '',
        'alpha' => true,
        'default' => get_option( 'mobmenu_opt_right_submenu_text_color', '#fff' ),
    ) );

    $panel->createOption( array(
        'type' => 'save'
    ) );
	
	
}


function mob_menu_dynamic_css_style() {

	include_once('includes/style.php');

}

//Admin Scripts
function mobmenu_enqueue_admin_scripts( ) {
   
	wp_enqueue_style('cssmobmenu-icons',plugins_url('css/mobmenu-icons.css', __FILE__ ));
}

//Frontend Scripts
function mobmenu_enqueue_scripts(){ 
	 wp_register_script('mobmenujs',plugins_url('js/mobmenu.js',__FILE__), array( 'jquery' ) );
	 wp_enqueue_script('mobmenujs');
	 wp_enqueue_style('cssmobmenu',plugins_url('css/mobmenu.css', __FILE__ ));
	 wp_enqueue_style('cssmobmenu-icons',plugins_url('css/mobmenu-icons.css', __FILE__ ));
 }

 //Register Sidebar Menu Widgets
function mob_menu_register_sidebar(){
	
	$args = array(
		'name'          => 'Left Menu Top',
		'id'            => 'mobmlefttop',
		'description'   => '',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>' ); 

	register_sidebar( $args );

	$args = array(
		'name'          => 'Left Menu Bottom',
		'id'            => 'mobmleftbottom',
		'description'   => '',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>' ); 

	register_sidebar( $args );
	
	$args = array(
		'name'          => 'Right Menu Top',
		'id'            => 'mobmrighttop',
		'description'   => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>' ); 

	register_sidebar( $args );

	$args = array(
		'name'          => 'Right Menu Bottom',
		'id'            => 'mobmrightbottom',
		'description'   => '',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>' ); 

	register_sidebar( $args );

}



//Build the Mobile Menu Html Markup

function mob_menu_markup(){ 

	$titan = TitanFramework::getInstance( 'mobmenu' );
	$output = '';

	// Check if Header Menu Toolbar is enabled
	if ( 'yes' == $titan->getOption('enabled') ){

		$output .= '<div class="mob_menu_header_div mobmenu">';

		if( $titan->getOption('enable_left_menu') ){
			
			$output .= '<div  class="mobmenul-container"><a href="#" id="mobmenu-center" class="mobmenu-left-bt">';
			$left_icon_image = wp_get_attachment_image_src(  $titan->getOption( 'left_menu_icon' )  );
            $left_icon_image = $left_icon_image[0];

			if ( !$titan->getOption( 'left_menu_icon_opt' ) || $left_icon_image == '' ) {
				$output  .= '<i class="mob-icon-menu"></i><i class="mob-icon-cancel"></i>';
			} else {
				$output .= '<img src="' .$left_icon_image . '" alt="Left Menu Icon">';
			}
							
			$output .= '</a></div>';

		}


        $logo_img = wp_get_attachment_image_src(  $titan->getOption('logo_img'), 'full'  );
        $logo_img = $logo_img[0];   
        
        if ( $titan->getOption( 'disabled_logo_url' ) ) {
             $logo_url = '<h3 class="headertext">';
             $logo_url_end = '</h3>';

        } else {

            if ( $titan->getOption( 'logo_url' ) === '' ){
                $logo_url = get_bloginfo( 'url' );
            } else {
                $logo_url = $titan->getOption( 'logo_url' );
            }
            
            $logo_url_end = '</a>';
            $logo_url = '<a href="' . $logo_url . '" class="headertext">';
        }

		$output .= '<div class="logo-holder">' . $logo_url ;
		
		
		if ( $titan->getOption( 'enabled_logo' ) && $logo_img != '' ) {
			$output .= '<img src="' . $logo_img . '"  alt="Logo Header Menu">';									
		} else {  
				   		
			$header_text = $titan->getOption( 'header_text' );
						
			if ( $header_text == '' ){
				$header_text = get_bloginfo();
			}

			$output .= $header_text;

		}

		$output .= $logo_url_end . '</div>';

		

		if( $titan->getOption( 'enable_right_menu' ) ) { 

			$output .= '<div  class="mobmenur-container"><a href="#" class="mobmenu-right-bt">';
			$right_icon_image = wp_get_attachment_image_src(  $titan->getOption( 'right_menu_icon' )  );
            $right_icon_image = $right_icon_image[0];

			if ( !$titan->getOption( 'right_menu_icon_opt' ) || $right_icon_image == '' ) {
				$output  .= '<i class="mob-icon-menu"></i><i class="mob-icon-cancel"></i>';
			} else {
				$output .= '<img src="' . $right_icon_image . '" alt="Right Menu Icon">';
			}
							
			$output .= '</a></div>';

		}

		$output .= '</div></ul></div>'; 
		echo $output;
	

	 } 

	if ( $titan->getOption('enable_left_menu') ) {
		
		$output = '';
		$output .= '<div class="mob-menu-left-panel mobmenu">
						<div class="mobmenu_content">
							<div class="leftmtop">';
		echo $output;
		
		dynamic_sidebar( 'Left Menu Top' );

		$output = '</div><ul id="mobmenuleft">';
		  
		echo $output;
		  
		wp_nav_menu( array(
							'menu' => $titan->getOption( 'left_menu' ),
							'items_wrap' => '<li>%3$s</li>',
							'container_class' => 'menu rounded',
							'container'       => '',
							'fallback_cb' => false,
							'depth' => 2
						) ); 
  
				                   

		echo '</ul><ul class="leftmbottom">';
        dynamic_sidebar( 'Left Menu Bottom' ); 
        echo '</ul></div><div class="mob-menu-left-bg-holder"></div></div>';

	}
?>
	<!--  Right Panel Structure -->
	<div class="mob-menu-right-panel mobmenu">
		<div class="mobmenu_content">

			<!-- Right Menu Top Widget -->
			<div class="rightmtop">

				 <?php dynamic_sidebar( 'Right Menu Top' ); ?>

			</div>

			<!-- Right Menu Content -->
			<ul id="mobmenuright">

				<?php wp_nav_menu( array(

					'menu' => $titan->getOption( 'right_menu' ),
					'items_wrap' => '<li>%3$s</li>',
					'container_class' => 'menu rounded',
					'container'       => '',
					'fallback_cb' => false,
					'depth' => 2

				) ); 

			?>    
			</ul>

			<!-- Right Menu Bottom Widget -->
			<div class="rightmbottom">
				 <?php dynamic_sidebar( 'Right Menu Bottom' ); ?>
			</div>					

		</div> 
        <div class="mob-menu-right-bg-holder"></div>
	</div>


<?php


}


?>