		<?php

		CUSTOM TABLE UPDATE CODE 
		* The data format %s %d %f etc. are optional

		//WPDB RELATED WORKS 
		global $wpdb;

		$table_name = $wpdb->prefix . "MPF_First_Table";
		$wpdb->update (
			$table_name,
			array(
				'time' =>  current_time('mysql', 1),
				'name' => 'mpf insert 7',
				'text' => 'Description has been changed to 7', 
				'url'  => 'http://apple.com/iphone'	
			),
			array(
				'id' => 3
			),
			array(
				'%s',
				'%s',
				'%s',
				'%s', 
			),
			array(
				'%d'
			)
		);

		//SECOND EXAMPLE
		global $wpdb;


		$foo = "mpf insert 7";
		$foobar = "What the what";
		$bar = 3.000024;

		if ( is_front_page() ) {

			$tablename = $wpdb->prefix . "MPF_First_Table";

			$wpdb->update( 
				$tablename, 
				array('name' => $foobar, 'text' => $bar), 
				array('name' => $foo), 
				array('%s', '%f'), 
				array('%s')
			);

			$sql = "SELECT * FROM {$tablename}  ORDER BY time DESC LIMIT 3";	
			// $sql = $wpdb->prepare("SELECT * FROM {$wpdb->prefix}MPF_First_Table WHERE name = %s ORDER BY time DESC LIMIT 50", $foo);	

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
		            [name] => What the what
		            [text] => 3.000024
		            [url] => http://apple.com/iphone
		        )

		    [1] => stdClass Object
		        (
		            [id] => 5
		            [time] => 2018-05-13 07:41:22
		            [name] => mpf insert 3
		            [text] => Description text aaa bbb cc 55555
		            [url] => http://apple.com
		        )

		    [2] => stdClass Object
		        (
		            [id] => 4
		            [time] => 2018-05-13 07:40:59
		            [name] => mpf insert 3
		            [text] => Description text aaa bbb cc 55555
		            [url] => http://apple.com
		        )

		)	

