<?php 

/**
* PLUGIN ACTIVATION CLASS
*/
class MooseActivate
{
	function __construct()
	{
		# code...
	}

	public static function activate() {

		flush_rewrite_rules();
	}
}
