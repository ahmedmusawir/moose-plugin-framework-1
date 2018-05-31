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

		$value = get_post_meta( $post->ID, '_mpf_checkbox_meta_key', true );

		$custom = get_post_custom($post->ID);

		$field_id = $custom["_mpf_checkbox_meta_key"][0];

		// echo "<pre>";
		// print_r($custom);
		// echo "</pre>";
		// echo $field_id;
		// die;

		// $checked = isset( $value ) ? checked( $value, 1, false ) : '';

		// echo $checked;

		echo "Value: " . $value . "<br>";

		wp_nonce_field( basename( __FILE__ ), 'mpf_checkbox_meta_box_nonce' );

		
		$field_id_checked = '';
		
		$field_id_value = get_post_meta($post->ID, '_mpf_checkbox_meta_key', true);
		  
		  if($field_id_value == "yes") {
		  	$field_id_checked = 'checked="checked"'; 
		  } 

	?>

		<!-- <input type="checkbox" name="mpf_checkbox_metabox" <?php checked( $value, 'on', true ); ?>/> -->

		  <label>Check for yes</label>

		    <input type="checkbox" name="mpf_checkbox_metabox" value="yes" <?php echo $field_id_checked; ?> />

 			
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

		// if ( $is_autosave || $is_revision || !$is_valid_nonce ) return;
		// echo "<pre>";
		// print_r( $_POST );
		// echo "</pre>";
		// die;

		if ( array_key_exists( 'mpf_checkbox_metabox', $_POST ) ) {		
			/**
			 *
			 * update post meta 
				
				$post_id,
				$meta_key,
				$meta_value,
				$previous_value (optional)
			 *
			 */
			$checkbox_content = $_POST[ 'mpf_checkbox_metabox' ];




			update_post_meta( 
				$post_id, 											 // Post ID
				'_mpf_checkbox_meta_key', 							 // Meta key			
				$checkbox_content									// Meta value 
			);
		}
	}	
}



























































