jQuery(document).ready(function($) {
	"use strict";

	alert("Titan");
	$('#mobmenu_header_font_size').parent().parent().hide();

	// Removes the last blank table in admin pages. This is because a blank table is left if the last
	// option is a save option
	$('.titan-framework-panel-wrap table.form-table').filter(function() {
		return $(this).find('tbody tr').length === 0;
	}).remove();
});