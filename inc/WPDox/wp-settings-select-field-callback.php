<?php

	WP SETTINGS SELECT FIELD CALLBACK 
		
	// callback: select field
	function mpf_plugin_callback_field_select( $args ) {
		
		$options = get_option( 'mpf_plugin_options', mpf_plugin_options_default() );
		
		$id    = isset( $args['id'] )    ? $args['id']    : '';
		$label = isset( $args['label'] ) ? $args['label'] : '';
		
		$selected_option = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
		
		$select_options = array(
			
			'default'   => 'Default',
			'light'     => 'Light',
			'blue'      => 'Blue',
			'coffee'    => 'Coffee',
			'ectoplasm' => 'Ectoplasm',
			'midnight'  => 'Midnight',
			'ocean'     => 'Ocean',
			'sunrise'   => 'Sunrise',
			
		);
		
		echo '<select id="mpf_plugin_options_'. $id .'" name="mpf_plugin_options['. $id .']">';
		
		foreach ( $select_options as $value => $option ) {
			
			$selected = selected( $selected_option === $value, true, false );
			
			echo '<option value="'. $value .'"'. $selected .'>'. $option .'</option>';
			
		}
		
		echo '</select> <label for="mpf_plugin_options_'. $id .'">'. $label .'</label>';
		
	}


