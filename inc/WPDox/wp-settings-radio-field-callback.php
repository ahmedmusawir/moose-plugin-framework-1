<?php

	WP SETTINGS RADIO FIELD CALLBACK 
		
// callback: radio field
function mpf_plugin_callback_field_radio( $args ) {
	
	$options = get_option( 'mpf_plugin_options', mpf_plugin_options_default() );
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$selected_option = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
	
	$radio_options = array(
		
		'enable'  => 'Enable custom styles',
		'disable' => 'Disable custom styles'
		
	);
	
	foreach ( $radio_options as $value => $label ) {
		
		$checked = checked( $selected_option === $value, true, false );
		
		echo '<label><input name="mpf_plugin_options['. $id .']" type="radio" value="'. $value .'"'. $checked .'> ';
		echo '<span>'. $label .'</span></label><br />';
		
	}
	
}