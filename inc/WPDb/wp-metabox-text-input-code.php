<?php

WP METABOX TEXT INPUT CODE 
		
/**
* Custom Metabox TextInput Class
*/
class MPFAddCustomMetaboxTextInput
{
	
	function __construct()
	{
		add_action( 'add_meta_boxes', array( $this, 'addMetaboxTextInput' ) );
		add_action( 'save_post', array( $this, 'saveMetaboxTextInput' ) );
	}

	public function addMetaboxTextInput() {
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
			'mpf_textinput_metabox', 
			'MPF Text Input Metabox', 
			array( $this, 'textinputDisplayMPF' ), 
			'post', 
			'normal', 
			'high', 
			null 
		);
	}

	public function textinputDisplayMPF( $post ) {

		$value = get_post_meta( $post->ID, '_mpf_textinput_meta_key', true );

		wp_nonce_field( basename( __FILE__ ), 'mpf_textinput_meta_box_nonce' );

	?>

 		<input type="text" class="widefat" name="mpf_textinput_metabox" value="<?php echo $value; ?>"/>
 			
	<?php
	}

	public function saveMetaboxTextInput( $post_id )	{

		$is_autosave = wp_is_post_autosave( $post_id );
		$is_revision = wp_is_post_revision( $post_id );

		$is_valid_nonce = false;

		if ( isset( $_POST[ 'mpf_textinput_meta_box_nonce' ] ) ) {

			if ( wp_verify_nonce( $_POST[ 'mpf_textinput_meta_box_nonce' ], basename( __FILE__ ) ) ) {

				$is_valid_nonce = true;

			}

		}

		if ( $is_autosave || $is_revision || !$is_valid_nonce ) return;
		
		if ( array_key_exists( 'mpf_textinput_metabox', $_POST ) ) {		
			/**
			 *
			 * update post meta 
				
				$post_id,
				$meta_key,
				$meta_value,
				$previous_value (optional)
			 *
			 */
			$textinput_content = sanitize_text_field( $_POST[ 'mpf_textinput_metabox' ] );

			update_post_meta( 
				$post_id, 											 // Post ID
				'_mpf_textinput_meta_key', 							 // Meta key			
				$textinput_content									// Meta value 
			);
		}
	}	
}
