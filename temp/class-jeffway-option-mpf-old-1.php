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
				settings_fields( 'jw_options' );
				
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
		register_setting (
			string 		$options_group,
			string 		$options_name,
			callable 	$sanize_callback
		)
		*/

		register_setting( 
			'jw_options', 
			'jw_options', 
			array( $this, 'jwValidateOptions')
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
			'myplugin_section_one', 
			'Customize Section One', 
			array( $this, 'jwCallbackSectionOne' ),
			'jw-option-mpf'
		);
		
		add_settings_section( 
			'myplugin_section_two', 
			'Customize Section Two', 
			array( $this, 'jwCallbackSectionTwo' ),
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
			array( $this, 'jwCallbackFieldText' ),
			'jw-option-mpf',
			'myplugin_section_one',
			[ 'id' => 'custom_url', 'label' => 'Custom URL for the login logo link' ]
		);			
	}

	public function jwValidateOptions( $input ) {

		return $input;
	}

	public function jwCallbackSectionOne() {

		echo "<h3>This is Section One</h3>";
	}

	public function jwCallbackSectionTwo() {
		
		echo "<h3>This is Section Two</h3>";
	}

	// default plugin options
	public function jw_options_default() {

		return array(
			'custom_url'     => 'https://wordpress.org/',
			'custom_title'   => 'Powered by WordPress',
			'custom_style'   => 'disable',
			'custom_message' => '<p class="custom-message">My custom message</p>',
			'custom_footer'  => 'Special message for users',
			'custom_toolbar' => false,
			'custom_scheme'  => 'default',
		);

	}

	public function jwCallbackFieldText( $args ) {

		$options = get_option( 'jw_options', jw_options_default() );
		
		$id    = isset( $args['id'] )    ? $args['id']    : '';
		$label = isset( $args['label'] ) ? $args['label'] : '';
		
		$value = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
		
		echo '<input id="jw_options_'. $id .'" name="jw_options['. $id .']" type="text" size="40" value="'. $value .'"><br />';
		echo '<label for="jw_options_'. $id .'">'. $label .'</label>';		

		echo "<pre>the options:";
		echo print_r($id);
		echo var_dump($options);
		echo "</pre>";		
	}
}







































