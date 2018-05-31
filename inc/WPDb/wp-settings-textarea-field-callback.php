<?php

	WP SETTINGS TEXT AREA FIELD CALLBACK 
		
	// callback: textarea field
	function mpf_plugin_callback_field_textarea( $args ) {
		
		$options = get_option( 'mpf_plugin_options', mpf_plugin_options_default() );
		
		$id    = isset( $args['id'] )    ? $args['id']    : '';
		$label = isset( $args['label'] ) ? $args['label'] : '';
		
		$allowed_tags = wp_kses_allowed_html( 'post' );
		
		$value = isset( $options[$id] ) ? wp_kses( stripslashes_deep( $options[$id] ), $allowed_tags ) : '';
		
		echo '<textarea id="mpf_plugin_options_'. $id .'" name="mpf_plugin_options['. $id .']" rows="5" cols="50">'. $value .'</textarea><br />';
		echo '<label for="mpf_plugin_options_'. $id .'">'. $label .'</label>';
		
	}
