<?php

	WP SETTINGS REGISTRATION CODE 
		
	// register plugin settings
	function mpf_plugin_register_settings() {
		
		/*
		
		register_setting( 
			string   $option_group, 
			string   $option_name, 
			callable $sanitize_callback
		);
		
		*/
		
		register_setting( 
			'mpf_plugin_options_group', 
			'mpf_plugin_options', 
			'mpf_plugin_callback_validate_options' 
		); 

/*=========================================
=            SETTINGS SECTIONS            =
=========================================*/
		/*
		
		add_settings_section( 
			string   $id, 
			string   $title, 
			callable $callback, 
			string   $page
		);
		
		*/
		
		add_settings_section( 
			'mpf_plugin_section_login', 
			'Customize Login Page', 
			'mpf_plugin_callback_section_login', 
			'mpf-plugin'
		);
		
		add_settings_section( 
			'mpf_plugin_section_admin', 
			'Customize Admin Area', 
			'mpf_plugin_callback_section_admin', 
			'mpf-plugin'
		);

/*=======================================
	=            SETTINGS FIELDS            =
	=======================================*/

	/*
	/*

	add_settings_field(
    	string   $id,
		string   $title,
		callable $callback,
		string   $page,
		string   $section = 'default',
		array    $args = []
	);

	*/

	add_settings_field(
		'custom_url',
		'Custom URL',
		'mpf_plugin_callback_field_text',
		'mpf-plugin',
		'mpf_plugin_section_login',
		[ 'id' => 'custom_url', 'label' => 'Custom URL for the login logo link' ]
	);

	add_settings_field(
		'custom_title',
		'Custom Title',
		'mpf_plugin_callback_field_text',
		'mpf-plugin',
		'mpf_plugin_section_login',
		[ 'id' => 'custom_title', 'label' => 'Custom title attribute for the logo link' ]
	);

	add_settings_field(
		'custom_style',
		'Custom Style',
		'mpf_plugin_callback_field_radio',
		'mpf-plugin',
		'mpf_plugin_section_login',
		[ 'id' => 'custom_style', 'label' => 'Custom CSS for the Login screen' ]
	);

	add_settings_field(
		'custom_message',
		'Custom Message',
		'mpf_plugin_callback_field_textarea',
		'mpf-plugin',
		'mpf_plugin_section_login',
		[ 'id' => 'custom_message', 'label' => 'Custom text and/or markup' ]
	);

	add_settings_field(
		'custom_footer',
		'Custom Footer',
		'mpf_plugin_callback_field_text',
		'mpf-plugin',
		'mpf_plugin_section_admin',
		[ 'id' => 'custom_footer', 'label' => 'Custom footer text' ]
	);

	add_settings_field(
		'custom_toolbar',
		'Custom Toolbar',
		'mpf_plugin_callback_field_checkbox',
		'mpf-plugin',
		'mpf_plugin_section_admin',
		[ 'id' => 'custom_toolbar', 'label' => 'Remove new post and comment links from the Toolbar' ]
	);

	add_settings_field(
		'custom_scheme',
		'Custom Scheme',
		'mpf_plugin_callback_field_select',
		'mpf-plugin',
		'mpf_plugin_section_admin',
		[ 'id' => 'custom_scheme', 'label' => 'Default color scheme for new users' ]
	);

}
add_action( 'admin_init', 'mpf_plugin_register_settings' );






	//FOLLOWING CALLBACKS ARE PLACE HOLDERS

	// validate plugin settings
	function mpf_plugin_validate_options($input) {
		
		// todo: add validation functionality..
		
		return $input;
		
	}



	// callback: login section
	function mpf_plugin_callback_section_login() {
		
		echo '<p>These settings enable you to customize the WP Login screen.</p>';
		
	}



	// callback: admin section
	function mpf_plugin_callback_section_admin() {
		
		echo '<p>These settings enable you to customize the WP Admin Area.</p>';
		
	}


