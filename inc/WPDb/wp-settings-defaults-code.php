<?php

	WP SETTINGS DEFAULTS CODE 
		
	// default plugin options
	function mpf_plugin_options_default() {

		return array(
			'custom_url'     => 'https://wordpress.org/',
			'custom_title'   => 'Powered by WordPress',
			'custom_style'   => 'disable',
			'custom_message' => '<p class="custom-message">My custom message</p>',
			'custom_footer'  => 'Special message for users',
			'custom_toolbar' => false,
			'custom_scheme'  => 'default',
		);

	}
