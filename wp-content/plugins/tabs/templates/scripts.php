<?php

/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

		
	$html.= "<script type='text/javascript'>
	jQuery(document).ready(function ($) {
		$('#responsiveTabs-".$post_id."').responsiveTabs({
			collapsible: ".$tabs_items_collapsible.",
			animation: '".$tabs_items_animation."',
			duration: ".$tabs_items_animation_duration.",
			active:".$tabs_active.",			
			});
	
	
		});
	</script>";	