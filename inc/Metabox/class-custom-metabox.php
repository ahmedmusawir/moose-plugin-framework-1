<?php 

/**
* Custom Metabox Class
*/
class AddCustomMetaboxMPF
{
	
	function __construct()
	{
		add_action( 'add_meta_boxes', array( $this, 'addMetaBox' ) );
		add_action( 'save_post', array( $this, 'savePostNotice' ) );
	}

	public function addMetaBox()
	{
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
			'custom-metabox-mpf', 
			'Post Notice', 
			array( $this, 'metaboxDisplayMPF' ), 
			'post', 
			'normal', 
			'high', 
			null 
		);
	}

	public function metaboxDisplayMPF()
	{
		require_once( PLUGIN_DIR . '/views/post-notice-editor.php' );
	}

	public function savePostNotice( $post_id )
	{
		if ( ! $this->userCanSave( $post_id ) ) {
			return;
		}

		$post_notice = $_POST[ 'post-notice-editor' ];

		/**
		 *
		 * update post meta 
			
			$post_id,
			$meta_key,
			$meta_value,
			$previous_value (optional)
		 *
		 */

		update_post_meta( $post_id, 'post-notice-content-mpf', $post_notice );
	}

	public function userCanSave( $post_id ) 		
	{
		$is_autosave = wp_is_post_autosave( $post_id );
		$is_revision = wp_is_post_revision( $post_id );

		return ! ( $is_revision || $is_autosave );
	}
}



























































