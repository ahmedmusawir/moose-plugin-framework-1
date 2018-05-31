		<?php

		OPTIONS TABLE INSERT, REPLACE CODE & DELETE
		*Using Replace is better cuz if the options is not available, it will create a new one
		
		//WPDB RELATED WORKS 
		global $wpdb;


     	$table_name = 'wp_options';

		$wpdb->insert (	$table_name, array(	'option_name' => 'the_moose', 'option_value'  => 'Is Loose' ) );

		$wpdb->replace ( $table_name, array( 'option_id' => 1150, 'option_name' => 'the_moose', 'option_value'  => 'Is Loose 2' ) );

		$wpdb->delete ( $table_name, array( 'option_id' => 1150 ) );


		?>
