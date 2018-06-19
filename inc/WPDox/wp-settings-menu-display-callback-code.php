<?php

	WP SETTINGS MENU DISPLAY CALLBACK CODE 
		
	// display the plugin settings page
	function mpf_plugin_display_settings_page() {
		
		// check if user is allowed access
		if ( ! current_user_can( 'manage_options' ) ) return;
		
		?>
		
		<div class="wrap">
			<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
			<form action="options.php" method="post">
				
				<?php
				
				// output security fields
				settings_fields( 'mpf_plugin_options_group' );
				
				// output setting sections
				do_settings_sections( 'mpf-plugin' ); //Page Slug or Menu Slug
				
				// submit button
				submit_button();
				
				?>
				
			</form>
		</div>
		
		<?php
		
	}