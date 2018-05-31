		<?php

		DROP TABLE CODE 
		
		//WPDB RELATED WORKS 
		global $wpdb;


     	$table_name = $wpdb->prefix . 'MPF_First_Table';
     	$sql = "DROP TABLE IF EXISTS $table_name";
     	$wpdb->query($sql);			

		?>
