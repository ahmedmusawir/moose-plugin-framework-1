<?php

	WP SETTINGS MENU CODE 
		
	// add top-level administrative menu
	function mpf_plugin_add_toplevel_menu() {
		
		/* 
			add_menu_page(
				string   $page_title, 
				string   $menu_title, 
				string   $capability, 
				string   $menu_slug, 
				callable $function = '', 
				string   $icon_url = '', 
				int      $position = null 
			)
		*/
		
		add_menu_page(
			'MPF Plugin Settings',
			'MPF Plugin',
			'manage_options',
			'mpf-plugin',
			'mpf_plugin_display_settings_page',
			'dashicons-admin-generic',
			null
		);
		
	}
	add_action( 'admin_menu', 'mpf_plugin_add_toplevel_menu' );
