<?php 

/**
* Post Notice Class
*/
class JeffwayOptionMPF
{
	public $options;

	function __construct()
	{
		add_action( 'admin_menu', array(  $this, 'addMenuPage' ) );
		add_action( 'admin_init', array( $this, 'jwRegisterSettingsAndFields' ) );
	}

	public function addMenuPage() {

		/*
		add_menu_page (
			string 		$page_title,
			string 		$menu_title,
			string 		$capability,
			string 		$menu_slug,
			callable 	$function = '',
			string 		$icon_url = '',
			int 		$position = null
		)
		*/

		add_menu_page( 
			'JW Theme Options', 
			'JW Options', 
			'administrator', 
			'jw-option-mpf', 
			array( $this, 'jwDisplaySettingsPage' ),
			'dashicons-backup',
			null
		);

	}

	public function jwDisplaySettingsPage() {

	// check if user is allowed access
	if ( ! current_user_can( 'manage_options' ) ) return;
	
	?>
	
		<div class="wrap">
			<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
			<form action="options.php" method="post">
				
				<?php
				
				// output security fields
				settings_fields( 'myplugin_options' );
				
				// output setting sections
				do_settings_sections( 'jw-option-mpf' );
				
				// submit button
				submit_button();
				
				?>
				
			</form>
		</div>
	
	<?php
	}

	public function jwRegisterSettingsAndFields() {

		/*
		
		register_setting( 
			string   $option_group, 
			string   $option_name, 
			callable $sanitize_callback
		);
		
		*/
		
		register_setting( 
			'myplugin_options', 
			'myplugin_options', 
			array( $this, 'myplugin_callback_validate_options' ) 
		); 		

		/*
		
		add_settings_section( 
			string   $id, 
			string   $title, 
			callable $callback, 
			string   $page
		);
		
		*/
		
		add_settings_section( 
			'myplugin_section_login', 
			'Customize Login Page', 
			array($this, 'myplugin_callback_section_login'), 
			'jw-option-mpf'
		);
		
		add_settings_section( 
			'myplugin_section_admin', 
			'Customize Admin Area', 
			array($this, 'myplugin_callback_section_admin'), 
			'jw-option-mpf'
		);

		/*

		add_settings_field(
	    	string   $id,
			string   $title,
			callable $callback,
			string   $page,
			string   $section = 'default',
			array    $args = []
		);

		*/

		add_settings_field(
			'custom_url',
			'Custom URL',
			array($this, 'myplugin_callback_field_text'),
			'jw-option-mpf',
			'myplugin_section_login',
			[ 'id' => 'custom_url', 'label' => 'Custom URL for the login logo link' ]
		);				


	}

	// validate plugin settings
	function myplugin_validate_options($input) {
		
		// todo: add validation functionality..
		
		return $input;
		
	}

	// validate plugin settings
	function myplugin_callback_section_login() {
		
		echo "section one";		
		
	}

	// validate plugin settings
	function myplugin_callback_section_admin() {
		
		echo "section two";		
	}		

	// callback: text field
	function myplugin_callback_field_text( $args ) {
		
		$options = get_option( 'myplugin_options', myplugin_options_default() );
		
		$id    = isset( $args['id'] )    ? $args['id']    : '';
		$label = isset( $args['label'] ) ? $args['label'] : '';
		
		$value = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
		
		echo '<input id="myplugin_options_'. $id .'" name="myplugin_options['. $id .']" type="text" size="40" value="'. $value .'"><br />';
		echo '<label for="myplugin_options_'. $id .'">'. $label .'</label>';
		
	}


}







































