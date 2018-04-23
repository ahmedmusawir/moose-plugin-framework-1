<?php 

/**
* MPF Scripts Enqueue Class
*/
class Enqueue
{
	
	function __construct()
	{

	}

	public function initialize() {

		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_public_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_public_scripts' ) );

	}

	public function enqueue_styles() {

		wp_enqueue_style(
			
			'moose-post-notice-admin',
			plugins_url( '/assets/css/admin.css', __FILE__ ),
			array(),
			'1.0'

		);
	}
	public function enqueue_public_styles() {

		wp_enqueue_style(
			
			'moose-post-notice-public',
			plugins_url( '/assets/css/public.css', __FILE__ ),
			array(),
			'1.0'

		);
	}


	public function enqueue_scripts() {

		wp_enqueue_script(
			
			'moose-post-notice-admin',
			plugins_url( '/assets/js/admin.js', __FILE__ ),
			array('jquery'),
			'1.0'

		);
		
	}	
	public function enqueue_public_scripts() {

		wp_enqueue_script(
			
			'moose-post-notice-public',
			plugins_url( '/assets/js/public.js', __FILE__ ),
			array('jquery'),
			'1.0'

		);
	}	
}


















