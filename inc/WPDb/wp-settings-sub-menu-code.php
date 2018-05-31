<?php

	WP SETTINGS SUB MENU CODE 
		
// add sub-level administrative menu
function myplugin_add_sublevel_menu() {
	
	/*
	
	add_submenu_page(
		string   $parent_slug,
		string   $page_title,
		string   $menu_title,
		string   $capability,
		string   $menu_slug,
		callable $function = ''
	);
	
	*/
	
	add_submenu_page(
		'mpf-plugin',
		'MPF Plugin Sub Settings',
		'MPF Plugin Subpage',
		'manage_options',
		'mpf-subpage',
		'mpfplugin_display_sub_settings_page'
	);
	
}
add_action( 'admin_menu', 'myplugin_add_sublevel_menu' );