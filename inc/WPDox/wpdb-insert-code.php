		<?php

		INSERTING TABLE DATA 
		$table_name = $wpdb->prefix . 'MPF_First_Table';
		$wpdb->insert (
			$table_name,
			array(
				'time' => current_time('mysql', 1),
				'name' => 'mpf insert 1',
				'text' => 'Description text aaa bbb ccc', 
				'url'  => 'http://google.com'	
			),
			array(
				'%s',
				'%s',
				'%s',
				'%s', 
			)
		);
		
		?>
