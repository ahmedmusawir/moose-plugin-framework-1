WIDGET MAIN (INITIALIZE)

<?php 
define( "PLUGIN_DIR", ABSPATH . 'wp-content/plugins/jeffway-option-mpf' );

require_once( PLUGIN_DIR . '/inc/Widgets/class-mpf-first-widget.php' );
/**
 * Widget Main Class
 */
class WidgetMain
{
	
	function __construct()
	{
		add_action( 'widgets_init', array( $this, 'mpf_first_widget' ) );
	}

	public function mpf_first_widget()	
	{
		register_widget( 'MPFFirstWidget' );
	}
}