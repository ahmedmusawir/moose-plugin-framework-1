<?php 

/**
* PLUGIN ACTIVATION CLASS
*/
class MPFActivate
{
	function __construct()
	{
		# code...
	}

	public static function activate() {

		flush_rewrite_rules();

		//WPDB RELATED WORKS 
		global $wpdb;

		$charset_collate = $wpdb->get_charset_collate();
		$table_name = $wpdb->prefix . "MPF_First_Table";

		$sql = "CREATE TABLE $table_name (
		  id mediumint(9) NOT NULL AUTO_INCREMENT,
		  time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		  name tinytext NOT NULL,
		  text text NOT NULL,
		  url varchar(55) DEFAULT '' NOT NULL,
		  PRIMARY KEY  (id)
		) $charset_collate;";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );		


		// INSERTING TABLE DATA 
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
	}
}
