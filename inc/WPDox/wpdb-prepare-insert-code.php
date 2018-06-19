		<?php

		INSERT WITH PREPARE QUERY CODE 
		* The data format %s %d %f etc. are string, digit, float etc.

		//WPDB RELATED WORKS 
		global $wpdb;

		//INSERT WITH PREPARED QUERY 
		$wpdb->query( 
			$wpdb->prepare( 
				"INSERT into $wpdb->options 
				( option_name, option_value ) 
				VALUES ( '%s', '%d' )", 
				"moose_age", 43 
			)
		);		

		?>
