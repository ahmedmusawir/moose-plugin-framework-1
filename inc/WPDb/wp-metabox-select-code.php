<?php

WP METABOX SELECT CODE 

/**
* Custom Metabox Select Class
*/
class MPFAddCustomMetaboxSelect
{
	
	function __construct()
	{
		add_action( 'add_meta_boxes', array( $this, 'addMetaboxSelect' ) );
		add_action( 'save_post', array( $this, 'saveMetaboxSelect' ) );
	}

	public function addMetaboxSelect() {
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
			'mpf_select_metabox', 
			'MPF Select Metabox', 
			array( $this, 'selectDisplayMPF' ), 
			'post', 
			'normal', 
			'high', 
			null 
		);
	}

	public function selectDisplayMPF( $post ) {

		$value = get_post_meta( $post->ID, '_mpf_select_meta_key', true );

		wp_nonce_field( basename( __FILE__ ), 'mpf_select_meta_box_nonce' );

	?>

		<label for="mpf_select_metabox">Field Description</label>
		<select id="mpf_select_metabox" name="mpf_select_metabox">
			<option value="">Select option...</option>
			<option value="option-1" <?php selected( $value, 'option-1' ); ?>>Option 1</option>
			<option value="option-2" <?php selected( $value, 'option-2' ); ?>>Option 2</option>
			<option value="option-3" <?php selected( $value, 'option-3' ); ?>>Option 3</option>
		</select> 		
 			
	<?php
	}

	public function saveMetaboxSelect( $post_id )	{

		$is_autosave = wp_is_post_autosave( $post_id );
		$is_revision = wp_is_post_revision( $post_id );

		$is_valid_nonce = false;

		if ( isset( $_POST[ 'mpf_select_meta_box_nonce' ] ) ) {

			if ( wp_verify_nonce( $_POST[ 'mpf_select_meta_box_nonce' ], basename( __FILE__ ) ) ) {

				$is_valid_nonce = true;

			}

		}

		if ( $is_autosave || $is_revision || !$is_valid_nonce ) return;
		

		if ( array_key_exists( 'mpf_select_metabox', $_POST ) ) {		
			/**
			 *
			 * update post meta 
				
				$post_id,
				$meta_key,
				$meta_value,
				$previous_value (optional)
			 *
			 */
			$select_content = sanitize_text_field( $_POST[ 'mpf_select_metabox' ] );

			update_post_meta( 
				$post_id, 											 // Post ID
				'_mpf_select_meta_key', 							 // Meta key			
				$select_content									// Meta value 
			);
		}
	}	
}
