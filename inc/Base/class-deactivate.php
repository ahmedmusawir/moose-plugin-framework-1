<?php 

/**
* PLUGIN DEACTIVATION CLASS
*/
class MPFDeactivate
{
	function __construct()
	{
		# code...
	}

	public static function deactivate() {

		flush_rewrite_rules();

	   	global $wpdb;
     	
     	$table_name = $wpdb->prefix . 'MPF_First_Table';
     	$sql = "DROP TABLE IF EXISTS $table_name";
     	$wpdb->query($sql);			

	}

}
