<?php

WP SETTINGS FONTEND DISPLAY CODE 


/**
 *
 * A Class for Frontend Display of Options
 *
 */

/**
* MPF Options Display
*/

	public function displayResults( $content ) {


		$options = get_option( 'jw_options', $this->jw_options_default() );

		// CUSTOM TEXT FIELD 1

		if ( isset( $options['custom_url'] ) && ! empty( $options['custom_url'] ) ) {

			$url = esc_url( $options['custom_url'] );
		} else {
			
			$url = '';
		}

		// CUSTOM TEXT FIELD 2

		if ( isset( $options['custom_title'] ) && ! empty( $options['custom_title'] ) ) {

			$title = esc_attr( $options['custom_title'] );
		} else {

			$title = '';
		}

		// CUTOM RADIO FIELD

		if ( isset( $options['custom_radio'] ) && ! empty( $options['custom_radio'] ) ) {

			$radio = sanitize_text_field( $options['custom_radio'] );
		} else {
		
			$radio = '';
		}

		// CUSTOM TEXT AREA 
		if ( isset( $options['custom_textarea'] ) && ! empty( $options['custom_textarea'] ) ) {
		
			$textarea = wp_kses_post( $options['custom_textarea'] );
			
		} else {
		
			$textarea = '';
		}

		// CUSTOM CHECK BOX 
		// $toolbar = false;
	
		if ( isset( $options['custom_checkbox'] ) && ! empty( $options['custom_checkbox'] ) ) {
			
			$checkbox_enabled = (bool) $options['custom_checkbox'];
			
		} else {
		
			$checkbox_enabled = '';
		}

		// CUSTOM SELECT 
		if ( isset( $options['custom_select'] ) && ! empty( $options['custom_select'] ) ) {
		
			$select = sanitize_text_field( $options['custom_select'] );
			
		} else {
		
			$select = '';
		}

		// CUSTOM IMAGE
		if ( isset( $options['custom_image'] ) && ! empty( $options['custom_image'] ) ) {
		
			$image = $options['custom_image'];
			
		} else {
		
			$image = '';
		}

		?>


		<?php if ( is_front_page() ) : ?>

		<section id="frontend-options-display">

			<div class="options-content">
				<ul class="list-group">
					<li class="list-group-item"><?php echo "Custom URL:&nbsp; " . $url; ?></li>
					<li class="list-group-item"><?php echo "Custom Title:&nbsp; " . $title; ?></li>
					<li class="list-group-item"><?php echo "Custom Radio:&nbsp; " . $radio; ?></li>
					<li class="list-group-item"><?php echo "Custom TextArea:&nbsp; " . $textarea; ?></li>
					<li class="list-group-item"><?php echo "Custom Checkbox:&nbsp; " . $checkbox_enabled; ?></li>
					<li class="list-group-item"><?php echo "Custom Select:&nbsp; " . $select; ?></li>
					<li class="list-group-item"><?php echo "Custom Image:&nbsp; " . $image; ?></li>
				</ul>
			</div>
			
		</section>

		<?php endif; ?>

		<?php

		return $content;
	}

	add_filter( 'the_content', 'displayResults' );


