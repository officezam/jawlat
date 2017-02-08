<?php
    /*
	*
	*	Plugin Styling 
	*	------------------------------------------------
	*	WP Mobile Menu
	* 	Copyright WP Mobile Menu 2016 - http://www.wpmobilemenu.com
	*
	*	sf_custom_styles()
	*	sf_custom_script()
	*
	*/

    /* CUSTOM CSS OUTPUT
 	================================================== */
			 
	$titan = TitanFramework::getInstance( 'mobmenu' );
	// Determine the Width of the Footer li elements base on the admin options


	// Check if the Mobile Menu is enable in the plugin options
	if ( 'yes' == $titan->getOption( 'enabled' ) ){

		

		if ( $titan->getOption('enabled_naked_header') ) {
			$header_bg_color = 'transparent';
			$wrap_padding_top = '0';
		} else {
			$header_bg_color = $titan->getOption('header_bg_color');
			$wrap_padding_top = $titan->getOption('header_height');
		}

		$trigger_res = $titan->getOption( 'width_trigger' );
		$right_menu_width = $titan->getOption( 'right_menu_width' ) . 'px';

	if( $titan->getOption( 'right_menu_width_units' ) ) {
		$right_menu_width = $titan->getOption( 'right_menu_width' ) . 'px';
		$right_menu_width_translate = $right_menu_width;
	} else {
		$right_menu_width = $titan->getOption( 'right_menu_width_percentage' ) . '%';
		$right_menu_width_translate = '100%';
	}
	

	if( $titan->getOption( 'left_menu_width_units' ) ) {
		$left_menu_width = $titan->getOption( 'left_menu_width' ) . 'px';
		$left_menu_width_translate = $left_menu_width;
	} else {
		$left_menu_width = $titan->getOption( 'left_menu_width_percentage' ) . '%';
		$left_menu_width_translate = '100%';
	}
	 
	?>

	<style>

	/* Our css Custom Options values */
	
	@media only screen and (max-width:<?php	echo $trigger_res; ?>px){
		<?php echo $titan->getOption('hide_elements'); ?> {
			display:none !important;
		}
		nav{
			display:none!important;
		}

		#mobmenuright li a{
    		padding-left: 35px;
		}

		.mobmenu, .mob-menu-left-panel, .mob-menu-right-panel{
			display: block;
		}	
		.mobmenur-container .mobmenu-right-bt{
		 	color: <?php echo $titan->getOption('right_menu_icon_color'); ?> ;
		}
		.mobmenul-container .mobmenu-left-bt{
			color: <?php echo $titan->getOption('left_menu_icon_color'); ?> ;
		}
		#mobmenuleft li a , #mobmenuleft li a:visited {
			color: <?php echo $titan->getOption('left_panel_text_color');?> ;

		}
		.mobmenu_content h2, .mobmenu_content h3{
    		color: <?php echo $titan->getOption('left_panel_text_color');?> ;
		}

		.mobmenu_content #mobmenuleft li:hover, .mobmenu_content #mobmenuright li:hover  {
 	         background-color: <?php echo $titan->getOption("left_panel_hover_bgcolor");?>;
		}

		.mobmenu_content #mobmenuright li:hover  {
 	         background-color: <?php echo $titan->getOption("right_panel_hover_bgcolor");?> ;
		}
		
		.mobmenu_content #mobmenuleft .sub-menu  {
 	         background-color: <?php echo $titan->getOption("left_panel_submenu_bgcolor");?> ;
 	         margin: 0;
 	         color: <?php echo $titan->getOption("left_panel_submenu_text_color");?> ;
 	         width: 100%;
 	         
		}
		.mob-menu-left-bg-holder{
    		background: url(<?php echo wp_get_attachment_url( $titan->getOption("left_menu_bg_image") );?>);
    		opacity: <?php echo $titan->getOption("left_menu_bg_opacity") / 100  ; ?>;
    		background-attachment: fixed ;
			background-position: center top ;
			-webkit-background-size: cover ;
			-moz-background-size: cover ;
			background-size: cover ;
		}
		.mob-menu-right-bg-holder{
    		background: url(<?php echo wp_get_attachment_url( $titan->getOption("right_menu_bg_image") );?>);
    		opacity: <?php echo $titan->getOption("right_menu_bg_opacity") / 100  ; ?>;
    		background-attachment: fixed ;
			background-position: center top ;
			-webkit-background-size: cover ;
			-moz-background-size: cover ;
			background-size: cover ;
		}

		.mobmenu_content #mobmenuleft .sub-menu a {
 	         color: <?php echo $titan->getOption("left_panel_submenu_text_color");?> ;
		}

		.mobmenu_content #mobmenuright .sub-menu  a{
 	         color: <?php echo $titan->getOption("right_panel_submenu_text_color");?> ;
		}

		.mobmenu_content #mobmenuright .sub-menu  {
 	         background-color: <?php echo $titan->getOption("right_panel_submenu_bgcolor");?> ;
 	         margin: 0;  
 	         color: <?php echo $titan->getOption("right_panel_submenu_text_color");?> ;
		}

		#mobmenuleft li a:hover {
			color: <?php echo $titan->getOption("left_panel_hover_text_color");?> ;

		}
		
		#mobmenuright li a , #mobmenuright li a:visited{
			color: <?php echo $titan->getOption('right_panel_text_color');?> ;
		}

		#mobmenuright li a:hover {
			color: <?php echo $titan->getOption('right_panel_hover_text_color');?> ;
		}

		.mobmenul-container{
			top: <?php echo $titan->getOption('left_icon_top_margin'); ?>px;
			margin-left: <?php echo $titan->getOption('left_icon_left_margin'); ?>px;

		}

		.mobmenur-container{
			top: <?php	echo $titan->getOption('right_icon_top_margin'); ?>px;
			margin-right: <?php	echo $titan->getOption('right_icon_right_margin'); ?>px;

		}
  
		.logo-holder{
			padding-top: <?php echo $titan->getOption('logo_top_margin'); ?>px;
			text-align:center;
		}

		.mob_menu_header_div{

			background-color: <?php	echo $header_bg_color; ?>;
			height: <?php	echo $titan->getOption('header_height'); ?>px;
			width: 100%;
			font-weight:bold;
			font-size:12px;
			position:fixed;
			top:0px;	
			right: 0px;
			z-index: 99998;
			color:#000;
			display: block;
		}

		.mobmenu-push-wrap{
    		padding-top: <?php	echo $wrap_padding_top; ?>px;
		}

		.mob-menu-left-panel{
			background-color: <?php	echo $titan->getOption('left_panel_bg_color'); ?>;
			width:  <?php echo $left_menu_width; ?>;  
			-webkit-transform: translateX(-<?php echo $left_menu_width_translate; ?>);
            -moz-transform: translateX(-<?php echo $left_menu_width_translate; ?>);
            -ms-transform: translateX(-<?php echo $left_menu_width_translate; ?>);
            -o-transform: translateX(-<?php echo $left_menu_width_translate; ?>);
            transform: translateX(-<?php echo $left_menu_width_translate; ?>);
		}

		.mob-menu-right-panel{
			background-color: <?php	echo $titan->getOption('right_panel_bg_color'); ?>;
			width:  <?php echo $right_menu_width; ?>;  
			-webkit-transform: translateX( <?php echo $right_menu_width_translate; ?> );
            -moz-transform: translateX( <?php echo $right_menu_width_translate; ?> );
            -ms-transform: translateX( <?php echo $right_menu_width_translate; ?> );
            -o-transform: translateX( <?php echo $right_menu_width_translate; ?> );
            transform: translateX( <?php echo $right_menu_width_translate; ?> );
		}

		/* Will animate the content to the right 275px revealing the hidden nav */
		.show-nav-left .mobmenu-push-wrap, .show-nav-left .mob_menu_header_div {

		    -webkit-transform: translate(<?php echo $left_menu_width_translate; ?>, 0);
		    -moz-transform: translate(<?php echo $left_menu_width_translate; ?>, 0);
		    -ms-transform: translate(<?php echo $left_menu_width_translate; ?>, 0);
		    -o-transform: translate(<?php echo $left_menu_width_translate; ?>, 0);
		    transform: translate(<?php echo $left_menu_width_translate; ?>, 0);

		    -webkit-transform: translate3d(<?php echo $left_menu_width; ?>, 0, 0);
		    -moz-transform: translate3d(<?php echo $left_menu_width; ?>, 0, 0);
		    -ms-transform: translate3d(<?php echo $left_menu_width; ?>, 0, 0);
		    -o-transform: translate3d(<?php echo $left_menu_width; ?>, 0, 0);
		    transform: translate3d(<?php echo $left_menu_width; ?>, 0, 0);
		}

		.show-nav-right .mobmenu-push-wrap , .show-nav-right .mob_menu_header_div{

		    -webkit-transform: translate(-<?php echo $right_menu_width_translate; ?>, 0);
		    -moz-transform: translate(-<?php echo $right_menu_width_translate; ?>, 0);
		    -ms-transform: translate(-<?php echo $right_menu_width_translate; ?>, 0);
		    -o-transform: translate(-<?php echo $right_menu_width_translate; ?>, 0);
		    transform: translate(-<?php echo $right_menu_width_translate; ?>, 0);

		    -webkit-transform: translate3d(-<?php echo $right_menu_width; ?>, 0, 0);
		    -moz-transform: translate3d(-<?php echo $right_menu_width; ?>, 0, 0);
		    -ms-transform: translate3d(-<?php echo $right_menu_width; ?>, 0, 0);
		    -o-transform: translate3d(-<?php echo $right_menu_width; ?>, 0, 0);
		    transform: translate3d(-<?php echo $right_menu_width; ?>, 0, 0);
		}
  
		.mobmenu .headertext{ 
			color: <?php echo $titan->getOption('header_text_color'); ?> ;
		}

				
		/* Adds a transition and the resting translate state */
		.mobmenu-push-wrap, .mob_menu_header_div {
			
		    -webkit-transition: all 300ms ease 0;
		    -moz-transition: all 300ms ease 0;
		    -o-transition: all 300ms ease 0;
		    transition: all 300ms ease 0;

		    -webkit-transform: translate(0, 0);
		    -moz-transform: translate(0, 0);
		    -ms-transform: translate(0, 0);
		    -o-transform: translate(0, 0);
		    transform: translate(0, 0);

		    -webkit-transform: translate3d(0, 0, 0);
		    -moz-transform: translate3d(0, 0, 0);
		    -ms-transform: translate3d(0, 0, 0);
		    -o-transform: translate3d(0, 0, 0);
		    transform: translate3d(0, 0, 0);

		    -webkit-transition: -webkit-transform .5s;
		    -moz-transition: -moz-transform .5s;
		    -ms-transition: -ms-transform .5s;
		    -o-transition: -o-transform .5s;
		    transition: transform .5s;
		}
		
	}
	@media only screen and (min-width:<?php	echo $trigger_res; ?>px){
		
		.mob_menu, .mob_menu_left_panel, .mob_menu_right_panel{
			display: none;
		}
	}

	</style>

	<?php  }  ?>