<?php 

/**
* Post Notice Class
*/
class ShortcodeSubmenuOptionMPF extends ShortcodeSubmenuSettingsCallbacks
{
	public $options;

	function __construct()
	{
		add_action( 'admin_menu', array(  $this, 'addSubMenuPage' ) );
		add_action( 'admin_init', array( $this, 'jwRegisterSettingsAndFields' ) );

	}

	public function addSubMenuPage() {

		/*
		add_menu_page (
			string 		$parent_slug,
			string 		$page_title,
			string 		$menu_title,
			string 		$capability,
			string 		$menu_slug or $page_slug,
			callable 	$function = '',
			string 		$icon_url = '',
			int 		$position = null
		)
		*/

		add_submenu_page( 
			'jw-option-mpf', 
			'Shortcodes List', 
			'Shortcodes', 
			'administrator', 
			'shortcode-submenu-option-mpf', 
			array( $this, 'submenuDisplaySettingsPage' ),
			'dashicons-backup',
			null
		);

	}

	public function submenuDisplaySettingsPage() {

	// check if user is allowed access
	if ( ! current_user_can( 'manage_options' ) ) return;
	
	?>
	
		<div class="wrap">
			<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
			<form action="options.php" method="post" enctype="multipart/form-data">
				
				<?php
				
				// output security fields
				settings_fields( 'shortcode_submenu_options' );
				
				// output setting sections
				do_settings_sections( 'shortcode-submenu-option-mpf' );
				
				// submit button
				// submit_button();
				
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
			'shortcode_submenu_options', 
			'shortcode_submenu'
			// array( $this, 'submenuValidateOptions')
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
			'Simple Shortcodes', 
			array( $this, 'jwCallbackSectionOne' ),
			'shortcode-submenu-option-mpf'
		);
		
		add_settings_section( 
			'myplugin_section_two', 
			'Complex Shortcodes', 
			array( $this, 'jwCallbackSectionTwo' ),
			'shortcode-submenu-option-mpf'
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

		// // FOR SECTION ONE 
		
		// add_settings_field(
		// 	'custom_url',
		// 	'Custom URL',
		// 	array( $this, 'submenuCallbackFieldText' ),
		// 	'submenu-option-mpf',
		// 	'myplugin_section_one',
		// 	[ 'id' => 'custom_url', 'label' => 'Custom URL - Basic Text Input' ]
		// );			

		// add_settings_field(
		// 	'custom_title',
		// 	'Custom Title',
		// 	array( $this, 'submenuCallbackFieldText' ),
		// 	'submenu-option-mpf',
		// 	'myplugin_section_one',
		// 	[ 'id' => 'custom_title', 'label' => 'Custom Title - Basic Text 2 Input' ]
		// );	

		// add_settings_field(
		// 	'custom_radio',
		// 	'Custom Radio',
		// 	array( $this, 'submenuCallbackFieldRadio' ),
		// 	'submenu-option-mpf',
		// 	'myplugin_section_one',
		// 	[ 'id' => 'custom_radio', 'label' => 'Custom Radio - Basic Radio Input' ]
		// );

		// add_settings_field(
		// 	'custom_image',
		// 	'Custom Image',
		// 	array( $this, 'submenuCallbackFieldImage' ),
		// 	'submenu-option-mpf',
		// 	'myplugin_section_one',
		// 	[ 'id' => 'custom_image', 'label' => 'Custom Image - File Upload' ]
		// );

		// // FOR SECTION TWO 

		// add_settings_field(
		// 	'custom_textarea',
		// 	'Custom Text Area',
		// 	array( $this, 'submenuCallbackFieldTextarea' ),
		// 	'submenu-option-mpf',
		// 	'myplugin_section_two',
		// 	[ 'id' => 'custom_textarea', 'label' => 'Custom Textarea - Basic TextArea Input' ]
		// );

		// add_settings_field(
		// 	'custom_checkbox',
		// 	'Custom Checkbox',
		// 	array( $this, 'submenuCallbackFieldCheckbox' ),
		// 	'submenu-option-mpf',
		// 	'myplugin_section_two',
		// 	[ 'id' => 'custom_checkbox', 'label' => 'Custom Textarea - Basic TextArea Input' ]
		// );

		// add_settings_field(
		// 	'custom_select',
		// 	'Custom Select',
		// 	array( $this, 'submenuCallbackFieldSelect' ),
		// 	'submenu-option-mpf',
		// 	'myplugin_section_two',
		// 	[ 'id' => 'custom_select', 'label' => 'Custom Textarea - Basic TextArea Input' ]
		// );			
	}

}




























