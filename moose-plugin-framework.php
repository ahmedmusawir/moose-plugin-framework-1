<?php 

/**
 *
 * Plugin Name: Moose Plugin Framework
 * Plugin URI:	https://htmlfivedev.com 
 * Description: Base Code for MPF 1.0. Should be replicated
 * Version: 	1.0
 * Author URI: 	https://www.linkedin.com/in/ahmedmusawir
 * License: 	GPL-2.0+ 
 *
 */

//If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die("Cannot Access Directly");
}

// echo plugin_dir_path( __FILE__ );
// echo plugins_url( '/assets/js/admin.js', __FILE__ );
// die;

require_once( plugin_dir_path( __FILE__ ) . 'class-moose-plugin-framework.php' );
require_once( plugin_dir_path( __FILE__ ) . 'class-enqueue.php' );

function moose_post_notice_start() {

	$post_notice = new Enqueue();
	$post_notice->initialize();

}

moose_post_notice_start();

// Activation
require_once plugin_dir_path( __FILE__ ) . 'inc/Base/class-activate.php';
register_activation_hook( __FILE__, array( 'MooseActivate', 'activate' ) );

// Activation
require_once plugin_dir_path( __FILE__ ) . 'inc/Base/class-deactivate.php';
register_activation_hook( __FILE__, array( 'MooseDeactivate', 'deactivate' ) );