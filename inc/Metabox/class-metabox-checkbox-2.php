<?php 

/**
* Custom Metabox Checkbox Class
*/
class MPFAddCustomMetaboxCheckbox
{
	
	function __construct()
	{
		add_action( 'add_meta_boxes', array( $this, 'addMetaboxCheckbox' ) );
		add_action( 'save_post', array( $this, 'saveMetaboxCheckbox' ) );
	}

	public function addMetaboxCheckbox() {
		/**
		 *
		 * $id,
		   $title,
		   $callback,
		   $screen -> post type, comment etc.,
		   $context -> normal, side and advanced, 
		   $priority -> default, high, low,
		   $callback_args 
		 *
		 */
		
		add_meta_box( 
			'mpf_checkbox_metabox', 
			'MPF Checkbox Metabox', 
			array( $this, 'checkboxDisplayMPF' ), 
			'post', 
			'normal', 
			'high', 
			null 
		);
	}

	public function checkboxDisplayMPF( $post ) {

		$meta = get_post_meta( $post->ID );
		$mytheme_checkbox_value = ( isset( $meta['mytheme_checkbox_value'][0] ) &&  '1' === $meta['mytheme_checkbox_value'][0] ) ? 1 : 0;
		wp_nonce_field( basename( __FILE__ ), 'mpf_checkbox_meta_box_nonce' );

	?>

		<label>
			<input type="checkbox" name="mytheme_checkbox_value" value="1" <?php checked( $mytheme_checkbox_value, 1 ); ?> /><?php esc_attr_e( 'Checkbox value', 'mytheme' ); ?>
		</label>


	<?php
	}

	public function saveMetaboxCheckbox( $post_id )	{

		$is_autosave = wp_is_post_autosave( $post_id );
		$is_revision = wp_is_post_revision( $post_id );

		$is_valid_nonce = false;

		if ( isset( $_POST[ 'mpf_checkbox_meta_box_nonce' ] ) ) {

			if ( wp_verify_nonce( $_POST[ 'mpf_checkbox_meta_box_nonce' ], basename( __FILE__ ) ) ) {

				$is_valid_nonce = true;

			}

		}

		if ( $is_autosave || $is_revision || !$is_valid_nonce ) return;

		$mytheme_checkbox_value = ( isset( $_POST['mytheme_checkbox_value'] ) && '1' === $_POST['mytheme_checkbox_value'] ) ? 1 : 0; // Input var okay.

		update_post_meta( $post_id, 'mytheme_checkbox_value', esc_attr( $mytheme_checkbox_value ) );
	}	
}



























































