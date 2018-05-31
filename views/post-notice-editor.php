<textarea class="widefat" name="post-notice-editor" rows="20">

	<?php 

	/**
	 *
	 * get_post_meta( 
	 	$post_id, 
	 	'$meta_key', 
	 	false --> true returns a single string 
	 	);
	 *
	 */
	
		echo get_post_meta( get_the_ID(), 'post-notice-content-mpf', true );

	?>
	
</textarea>