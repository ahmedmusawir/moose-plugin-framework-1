<?php 
add_action( 'add_meta_boxes', 'mytheme_add_meta_box' );
if ( ! function_exists( 'mytheme_add_meta_box' ) ) {
/**
* Add meta box to page screen
*
* This function handles the addition of variuos meta boxes to your page or post screens.
* You can add as many meta boxes as you want, but as a rule of thumb it's better to add
* only what you need. If you can logically fit everything in a single metabox then add
* it in a single meta box, rather than putting each control in a separate meta box.
*
* @since 1.0.0
*/
	function mytheme_add_meta_box() {
		add_meta_box( 
			'additional-page-metabox-options', 
			esc_html__( 'Metabox Controls', 'mytheme' ), 
			'mytheme_metabox_controls', 
			'page', 
			'normal', 
			'low' 
		);
	}
}

if ( ! function_exists( 'mytheme_metabox_controls' ) ) {
/**
* Meta box render function
*
* @param  object $post Post object.
* @since  1.0.0
*/
function mytheme_metabox_controls( $post ) {
$meta = get_post_meta( $post->ID );
$mytheme_input_field = ( isset( $meta['mytheme_input_field'][0] ) && '' !== $meta['mytheme_input_field'][0] ) ? $meta['mytheme_input_field'][0] : '';
$mytheme_radio_value = ( isset( $meta['mytheme_radio_value'][0] ) && '' !== $meta['mytheme_radio_value'][0] ) ? $meta['mytheme_radio_value'][0] : '';
$mytheme_checkbox_value = ( isset( $meta['mytheme_checkbox_value'][0] ) &&  '1' === $meta['mytheme_checkbox_value'][0] ) ? 1 : 0;
	wp_nonce_field( 'mytheme_control_meta_box', 'mytheme_control_meta_box_nonce' ); // Always add nonce to your meta boxes!
	?>
	<style type="text/css">
	.post_meta_extras p{margin: 20px;}
	.post_meta_extras label{display:block; margin-bottom: 10px;}
	</style>
			<div class="post_meta_extras">
			<p>
				<label><?php esc_attr_e( 'Input text', 'mytheme' ); ?></label>
			 	<input type="text" name="mytheme_input_field" value="<?php echo esc_attr( $mytheme_input_field ); ?>">
			</p>
			<p>
				<label>
					<input type="radio" name="mytheme_radio_value" value="value_1" <?php checked( $mytheme_radio_value, 'value_1' ); ?>>
					<?php esc_attr_e( 'Radio value 1', 'mytheme' ); ?>
				</label>
				<label>
					<input type="radio" name="mytheme_radio_value" value="value_2" <?php checked( $mytheme_radio_value, 'value_2' ); ?>>
					<?php esc_attr_e( 'Radio value 2', 'mytheme' ); ?>
				</label>

				<label>
					<input type="radio" name="mytheme_radio_value" value="value_3" <?php checked( $mytheme_radio_value, 'value_3' ); ?>>
					<?php esc_attr_e( 'Radio value 3', 'mytheme' ); ?>
				</label>
			</p>
			<p>
				<label><input type="checkbox" name="mytheme_checkbox_value" value="1" <?php checked( $mytheme_checkbox_value, 1 ); ?> /><?php esc_attr_e( 'Checkbox value', 'mytheme' ); ?></label>
			</p>
	<?php
	}
}

add_action( 'save_post', 'mytheme_save_metaboxes' );
if ( ! function_exists( 'mytheme_save_metaboxes' ) ) {
/**
* Save controls from the meta boxes
*
* @param  int $post_id Current post id.
* @since 1.0.0
*/
	function mytheme_save_metaboxes( $post_id ) {
	/*
	* We need to verify this came from the our screen and with proper authorization,
	* because save_post can be triggered at other times. Add as many nonces, as you
	* have metaboxes.
	*/
	if ( ! isset( $_POST['mytheme_control_meta_box_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['mytheme_control_meta_box_nonce'] ), 'mytheme_control_meta_box' ) ) { // Input var okay.
	return $post_id;
	}
	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' === $_POST['post_type'] ) { // Input var okay.
		if ( ! current_user_can( 'edit_page', $post_id ) ) {
		return $post_id;
		}
	} else {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return $post_id;
		}
	}
	/*
	* If this is an autosave, our form has not been submitted,
	* so we don't want to do anything.
	*/
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
	return $post_id;
	}
	/* Ok to save */
	if ( isset( $_POST['mytheme_input_field'] ) ) { // Input var okay.
	update_post_meta( $post_id, 'mytheme_input_field', sanitize_text_field( wp_unslash( $_POST['mytheme_input_field'] ) ) ); // Input var okay.
	}
	if ( isset( $_POST['mytheme_radio_value'] ) ) { // Input var okay.
	update_post_meta( $post_id, 'mytheme_radio_value', sanitize_text_field( wp_unslash( $_POST['mytheme_radio_value'] ) ) ); // Input var okay.
	}
	$mytheme_checkbox_value = ( isset( $_POST['mytheme_checkbox_value'] ) && '1' === $_POST['mytheme_checkbox_value'] ) ? 1 : 0; // Input var okay.
	update_post_meta( $post_id, 'mytheme_checkbox_value', esc_attr( $mytheme_checkbox_value ) );
	}
}

