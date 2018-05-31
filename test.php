

===========================================================================================================================
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. Pellentesque in ipsum id orci porta dapibus. Quisque velit nisi, pretium ut lacinia in, elementum id enim.
</p>
<p>
Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Sed porttitor lectus nibh.
</p>
<p>
Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Nulla quis lorem ut libero malesuada feugiat. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Donec rutrum congue leo eget malesuada. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.</p>
<?php 
===========================================================


function sl_meta_box_sidebar(){
    global $post;
    $custom = get_post_custom($post->ID);
    $sl_meta_box_sidebar = $custom["sl-meta-box-sidebar"][0]; 
?>

<input type="checkbox" name="sl-meta-box-sidebar" <?php if( $sl_meta_box_sidebar == true ) { ?>checked="checked"<?php } ?> />  Check the Box.


<?php }

===========================================================
$upload_overrides = array( "test_form" => false );

$uploaded_file = wp_handle_upload ($file, $upload_overrides);

if( isset( $uploaded_file ["file"] )) {
	$file_name_and_location = $uploaded_file ["file"];
	$file_title_for_media_library = $title;

	$attachment = array(
		"post_mime_type" => $uploaded_file_type,
		"post_title" => addslashes( $file_title_for_media_library ),
		"post_content" => "",
		"post_status" => "inherit"
	);

	if( ! is_null( $post )) {
		if ( ! is_numeric( $post )) {
			$post = $post->ID;
		} // if ()

		$attachment ['post_parent'] = $post;
	} // if ()

	$id = wp_insert_attachment( $attachment, $file_name_and_location );

	require_once( ABSPATH."wp-admin/includes/image.php" );

	$attach_data = wp_generate_attachment_metadata( $id, $file_name_and_location );
	wp_update_attachment_metadata( $id, $attach_data );
} // if ()

===========================================================

function get_file() {
	
if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );

if ( ! function_exists( 'wp_generate_attachment_metadata' ) ) require_once( ABSPATH . 'wp-admin/includes/image.php' );

$uploadedfile = $_FILES['file'];

$upload_overrides = array( 'test_form' => false );

$movefile = wp_handle_upload( $uploadedfile, $upload_overrides );

if( isset( $movefile["file"] )) {
	$file_name_and_location = $movefile["file"];
	$file_title_for_media_library = $_POST['who'];
   $wp_upload_dir = wp_upload_dir();
	$filetype = wp_check_filetype( $uploadedfile );
	
	
	$attachment = array(
		"guid" => $movefile['file'],
		"post_mime_type" => $filetype['type'],
		"post_title" => addslashes( $file_title_for_media_library ),
		"post_content" => "",
		"post_status" => "inherit",
		"post_author" => 1
	);

	if( ! is_null( $post )) {
		if ( ! is_numeric( $post )) {
			$post = $post->ID;
		} // if ()

		$attachment ['post_parent'] = $post;
	} // if ()

	require_once( ABSPATH."wp-admin/includes/image.php" );
	
	$id = wp_insert_attachment( $attachment, $file_name_and_location );

	$attach_data = wp_generate_attachment_metadata( $id, $file_name_and_location );
	wp_update_attachment_metadata( $id, $attach_data );
	}
}

===========================================================

require_once( ABSPATH . 'wp-admin/includes/image.php' );
	require_once( ABSPATH . 'wp-admin/includes/file.php' );

$uploadedfile = $_FILES['file'];

$upload_overrides = array( 'test_form' => false );

$movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
$wp_upload_dir = wp_upload_dir();

	$attachment = array(
		"guid" => $movefile['file'], 
		"post_mime_type" => $movefile['type'],
		"post_title" => $_POST['who'],
		"post_content" => "",
		"post_status" => "draft",
		"post_author" => 1
	);

	$id = wp_insert_attachment( $attachment, $movefile['file'],0);

	$attach_data = wp_generate_attachment_metadata( $id, $movefile['file'] );
	wp_update_attachment_metadata( $id, $attach_data );
	