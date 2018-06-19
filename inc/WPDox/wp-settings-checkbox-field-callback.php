<?php

	WP SETTINGS CHECKBOX FIELD CALLBACK 
		
	// callback: checkbox field
	function mpf_plugin_callback_field_checkbox( $args ) {
		
		$options = get_option( 'mpf_plugin_options', mpf_plugin_options_default() );
		
		$id    = isset( $args['id'] )    ? $args['id']    : '';
		$label = isset( $args['label'] ) ? $args['label'] : '';
		
		$checked = isset( $options[$id] ) ? checked( $options[$id], 1, false ) : '';
		
		echo '<input id="mpf_plugin_options_'. $id .'" name="mpf_plugin_options['. $id .']" type="checkbox" value="1"'. $checked .'> ';
		echo '<label for="mpf_plugin_options_'. $id .'">'. $label .'</label>';
		
	}