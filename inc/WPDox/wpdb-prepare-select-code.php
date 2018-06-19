		<?php

		SELECT WITH PREPARE QUERY CODE 
		* The data format %s %d %f etc. are string, digit, float etc.

		//WPDB RELATED WORKS 
		global $wpdb;

		//SELECT WITH PREPARED QUERY 

			$sql = $wpdb->prepare( "SELECT * FROM {$wpdb->options} WHERE option_id = '%d' ", 1174 );
			$results = $wpdb->get_results( $sql );
			echo "<pre>";
			print_r( $results );
			echo "</pre>";

			foreach ($results as $result) {
				echo "<h3>" . $result->option_id . "<h3>";
				echo "<h3>" . $result->option_name . "<h3>";
				echo "<h3>" . $result->option_value . "<h3>";
				echo "<h3>" . $result->autoload . "<h3>";
			}	
		
		//SECOND EXAMPLE:
		global $wpdb;


			$sql = $wpdb->prepare( "SELECT * FROM {$wpdb->posts} WHERE post_type = '%s' ", 'post' );

			$results = $wpdb->get_results( $sql );
			// echo "<pre>";
			// print_r( $results );
			// echo "</pre>";

			foreach ($results as $result) {
				
				echo "<pre>";
				echo $result->post_title . "<br>";
				echo $result->guid . "<br>";
				echo $result->post_date;
				echo "</pre>";
			}

		//THIRD EXAMPLE:
		$name = "mpf insert 7";

			// $sql = "SELECT * FROM {$wpdb->prefix}MPF_First_Table  ORDER BY time DESC LIMIT 3";	
			$sql = $wpdb->prepare("SELECT * FROM {$wpdb->prefix}MPF_First_Table WHERE name = %s ORDER BY time DESC LIMIT 50", $name);	

			$results = $wpdb->get_results( $sql );
			echo "<pre>";
			print_r( $results );
			echo "</pre>";

			OUTPUT:

			Array
			(
			    [0] => stdClass Object
			        (
			            [id] => 3
			            [time] => 2018-05-13 07:59:03
			            [name] => mpf insert 7
			            [text] => Description has been changed to 7
			            [url] => http://apple.com/iphone
			        )

			)

