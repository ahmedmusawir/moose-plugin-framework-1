<?php 

/**
* PLUGIN DEACTIVATION CLASS
*/
class MooseDeactivate
{
	function __construct()
	{
		# code...
	}

	public static function deactivate() {

		flush_rewrite_rules();

	}

}
