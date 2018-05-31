<?php

	WP SETTINGS TEXT FIELD CALLBACK 
		
	// callback: text field
	function mpf_plugin_callback_field_text( $args ) {
		
		$options = get_option( 'mpf_plugin_options', mpf_plugin_options_default() );
		
		$id    = isset( $args['id'] )    ? $args['id']    : '';
		$label = isset( $args['label'] ) ? $args['label'] : '';
		
		$value = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
		
		echo '<input id="mpf_plugin_options_'. $id .'" name="mpf_plugin_options['. $id .']" type="text" size="40" value="'. $value .'"><br />';
		echo '<label for="mpf_plugin_options_'. $id .'">'. $label .'</label>';
		
	}

