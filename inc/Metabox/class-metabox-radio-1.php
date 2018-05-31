<?php 

/**
* Custom Metabox Radio Class
*/
class MPFAddCustomMetaboxRadio
{
	
	function __construct()
	{
		add_action( 'add_meta_boxes', array( $this, 'addMetaboxRadio' ) );
		add_action( 'save_post', array( $this, 'saveMetaboxRadio' ) );
	}

	public function addMetaboxRadio() {
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
			'mpf_radio_metabox', 
			'MPF Radio Metabox', 
			array( $this, 'radioDisplayMPF' ), 
			'post', 
			'normal', 
			'high', 
			null 
		);
	}

	public function radioDisplayMPF( $post ) {

		$meta = get_post_meta( $post->ID );
		$_mpf_radio_meta_key = ( isset( $meta['_mpf_radio_meta_key'][0] ) &&  '1' === $meta['_mpf_radio_meta_key'][0] ) ? 1 : 0;
		wp_nonce_field( basename( __FILE__ ), 'mpf_radio_meta_box_nonce' );

	?>

		<label>
			<input type="radio" name="_mpf_radio_meta_key" value="1" <?php checked( $_mpf_radio_meta_key, 1 ); ?> /><?php esc_attr_e( 'Radio value', 'mytheme' ); ?>
		</label>


	<?php
	}

	public function saveMetaboxRadio( $post_id )	{

		$is_autosave = wp_is_post_autosave( $post_id );
		$is_revision = wp_is_post_revision( $post_id );

		$is_valid_nonce = false;

		if ( isset( $_POST[ 'mpf_radio_meta_box_nonce' ] ) ) {

			if ( wp_verify_nonce( $_POST[ 'mpf_radio_meta_box_nonce' ], basename( __FILE__ ) ) ) {

				$is_valid_nonce = true;

			}

		}

		if ( $is_autosave || $is_revision || !$is_valid_nonce ) return;

		$_mpf_radio_meta_key = ( isset( $_POST['_mpf_radio_meta_key'] ) && '1' === $_POST['_mpf_radio_meta_key'] ) ? 1 : 0; // Input var okay.

		update_post_meta( $post_id, '_mpf_radio_meta_key', esc_attr( $_mpf_radio_meta_key ) );
	}	
}



























































