		<?php

		CUSTOM TABLE UPDATE CODE 
		* The data format %s %d %f etc. are optional

		//WPDB RELATED WORKS 
		global $wpdb;

		$foo = "mpf insert 3";
		$bar = 3.000024;

		if ( is_front_page() ) {

			$tablename = $wpdb->prefix . "MPF_First_Table";

			$wpdb->delete(
				$tablename, 
				array('name' => $foo, 'text' => $bar), 
				array('%s', '%f')
			);

			$sql = "SELECT * FROM {$tablename}  ORDER BY time DESC LIMIT 5";	

			$results = $wpdb->get_results( $sql );
			echo "<pre>";
			print_r( $results );
			echo "</pre>";