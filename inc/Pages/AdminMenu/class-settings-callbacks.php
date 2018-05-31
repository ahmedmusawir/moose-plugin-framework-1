<?php 

/**
 *
 * Settings Callbacks Class
 *
 */
class SettingsCallbacks extends ValidateSettingsMPF
{


	public function jwCallbackSectionOne() {

		echo "<h4>This is Section One</h4>";
	}

	public function jwCallbackSectionTwo() {
		
		echo "<h4>This is Section Two</h4>";
	}

	// default plugin options
	public function jw_options_default() {

		return array(
			'custom_url'     => 'https://wordpress.org/',
			'custom_title'   => 'Powered by WordPress',
			'custom_style'   => 'disable',
			'custom_message' => '<p class="custom-message">My custom message</p>',
			'custom_footer'  => 'Special message for users',
			'custom_toolbar' => false,
			'custom_scheme'  => 'default',
			'custom_image'   => '/wp-content/uploads/2018/05/logo-round.png',
		);

	}

	public function jwCallbackFieldText( $args ) {

		$options = get_option( 'jw_options', $this->jw_options_default() );
		
		$id    = isset( $args['id'] )    ? $args['id']    : '';
		$label = isset( $args['label'] ) ? $args['label'] : '';
		
		$value = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
		
		echo '<input id="jw_options_'. $id .'" name="jw_options['. $id .']" type="text" size="40" value="'. $value .'"><br />';
		echo '<label for="jw_options_'. $id .'">'. $label .'</label>';		

		// echo "<pre>the options:";
		// echo var_dump($options);
		// echo "</pre>";		

		// echo "<pre>the ARGS:";
		// echo var_dump($args);
		// echo "</pre>";
	}

	// callback: radio field
	public function jwCallbackFieldRadio( $args ) {
		
		$options = get_option( 'jw_options', $this->jw_options_default() );
		
		$id    = isset( $args['id'] )    ? $args['id']    : '';
		$label = isset( $args['label'] ) ? $args['label'] : '';
		
		$selected_option = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
		
		$radio_options = array(
			
			'enable'  => 'Enable custom styles',
			'disable' => 'Disable custom styles'
			
		);
		
		foreach ( $radio_options as $value => $label ) {
			
			$checked = checked( $selected_option === $value, true, false );
			
			echo '<label><input name="jw_options['. $id .']" type="radio" value="'. $value .'"'. $checked .'> ';
			echo '<span>'. $label .'</span></label><br />';
			
		}

		// echo "<pre>the options:";
		// echo var_dump($options);
		// echo "</pre>";
		
	}

	//callback: image upload field 
	public function jwCallbackFieldImage( $args ) {

		$options = get_option( 'jw_options', $this->jw_options_default() );
		
		$id    = isset( $args['id'] )    ? $args['id']    : '';
		$label = isset( $args['label'] ) ? $args['label'] : '';

		echo '<input type="file" id="jw_options_'. $id .'" name="jw_options_'. $id .'" ><br />';
		// echo '<input type="file" id="jw_options_'. $id .'" name="jw_options_custom_image" ><br />';
		echo '<label for="jw_options_'. $id .'">'. $label .'</label>';

		if ( isset($options[ $id ]) ) {
			echo "<img src=" . $options[ $id ] . " width='20%'>";
		}
	}

	// callback: textarea field
	public function jwCallbackFieldTextarea( $args ) {
		
		$options = get_option( 'jw_options', $this->jw_options_default() );
		
		$id    = isset( $args['id'] )    ? $args['id']    : '';
		$label = isset( $args['label'] ) ? $args['label'] : '';
		
		$allowed_tags = wp_kses_allowed_html( 'post' );
		
		$value = isset( $options[$id] ) ? wp_kses( stripslashes_deep( $options[$id] ), $allowed_tags ) : '';
		
		echo '<textarea id="jw_options_'. $id .'" name="jw_options['. $id .']" rows="5" cols="50">'. $value .'</textarea><br />';
		echo '<label for="jw_options_'. $id .'">'. $label .'</label>';
		
	}	

	// callback: checkbox field
	function jwCallbackFieldCheckbox( $args ) {
		
		$options = get_option( 'jw_options', $this->jw_options_default() );
		
		$id    = isset( $args['id'] )    ? $args['id']    : '';
		$label = isset( $args['label'] ) ? $args['label'] : '';
		
		$checked = isset( $options[$id] ) ? checked( $options[$id], 1, false ) : '';
		
		echo '<input id="jw_options_'. $id .'" name="jw_options['. $id .']" type="checkbox" value="1"'. $checked .'> ';
		echo '<label for="jw_options_'. $id .'">'. $label .'</label>';

		// echo "<pre>the options:";
		// echo var_dump($options);
		// echo "</pre>";
		
	}	

	// callback: select field
	public function jwCallbackFieldSelect( $args ) {
		
		$options = get_option( 'jw_options', $this->jw_options_default() );
		
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
		
		echo '<select id="jw_options_'. $id .'" name="jw_options['. $id .']">';
		
		foreach ( $select_options as $value => $option ) {
			
			$selected = selected( $selected_option === $value, true, false );
			
			echo '<option value="'. $value .'"'. $selected .'>'. $option .'</option>';
			
		}
		
		echo '</select> <label for="jw_options_'. $id .'">'. $label .'</label>';
		
	}	

}






































