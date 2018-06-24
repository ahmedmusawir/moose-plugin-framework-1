<?php 
/**
 * WP DB Tesing
 */
class MPFWPHelpdesk
{
	
	function __construct()
	{
		add_action( 'wp_footer', array(  $this, 'displayWBDbResults' ), 110 );
		// add_action( 'wp_footer', array(  $this, 'displayWBDbResults' ) );
		// add_action( 'wp_head', array(  $this, 'displayWBDbResults' ) );
	}

	public function displayWBDbResults()
	{

		?>

		<section id="mpf-header-box">

			<h4>
				Moose Plugin Framework 1.0!
			</h4>
			<style type="text/css">
				.active {
					margin-right: .5rem;
				}
			</style>
			
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
			  <a class="navbar-brand" href="#">Navbar</a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarNavDropdown">
			    <ul class="navbar-nav">
			      <li class="nav-item dropdown">
			        <!-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
			        <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          WPDB API <i class="fa fa-arrow-down" aria-hidden="true"></i>
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			          <a class="dropdown-item" href="#create">CREATE TABLE</a>
			          <a class="dropdown-item" href="#drop">DROP TABLE</a>
			          <a class="dropdown-item" href="#insert">INSERT INTO TABLE</a>
			          <a class="dropdown-item" href="#update">UPDATE TABLE</a>
			          <a class="dropdown-item" href="#delete">DELETE FROM TABLE</a>
			          <a class="dropdown-item" href="#wp-options">WP-OPTIONS TABLE</a>
			          <a class="dropdown-item" href="#prepare">PREPARED QUERY</a>
			        </div>
			      </li>	
			      <li class="nav-item dropdown">
			        <!-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
			        <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          WP SETTINGS API <i class="fa fa-arrow-down" aria-hidden="true"></i>
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			          <a class="dropdown-item" href="#settings">SETTINGS API</a>
			          <a class="dropdown-item" href="#top-menu">TOP LEVEL MENU</a>
			          <a class="dropdown-item" href="#sub-menu">SUBMENU</a>
			          <a class="dropdown-item" href="#settings-reg">SETTINGS REGISTRATION</a>
			          <a class="dropdown-item" href="#settings-fields">SETTINGS FIELDS Defaults</a>
			          <a class="dropdown-item" href="#settings-text">TEXT FIELD</a>
			          <a class="dropdown-item" href="#settings-textarea">TEXTAREA FIELD</a>
			          <a class="dropdown-item" href="#settings-checkbox">CHECKBOX FIELD</a>
			          <a class="dropdown-item" href="#settings-radio">RADIO FIELD</a>
			          <a class="dropdown-item" href="#settings-select">SELECT FIELD</a>
			          <a class="dropdown-item" href="#settings-validation">SETTINGS VALIDATION</a>
			          <a class="dropdown-item" href="#settings-frontend">SETTINGS FRONTEND DISPLAY</a>
			        </div>
			      </li>
			      <li class="nav-item dropdown">
			        <!-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
			        <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          WP METABOX API <i class="fa fa-arrow-down" aria-hidden="true"></i>
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			          <a class="dropdown-item" href="#metabox">METABOX API</a>
			          <a class="dropdown-item" href="#metabox-text">TEXT FIELD</a>
			          <a class="dropdown-item" href="#metabox-textarea">TEXTAREA FIELD</a>
			          <a class="dropdown-item" href="#metabox-checkbox">CHECKBOX FIELD</a>
			          <a class="dropdown-item" href="#metabox-radio">RADIO FIELD</a>
			          <a class="dropdown-item" href="#metabox-select">SELECT FIELD</a>
			        </div>
			      </li>
			      <li class="nav-item">
			          <a class="nav-link" href="#shortcode">WP SHORTCODE API</a>
			      </li>
			      <li class="nav-item">
			          <a class="nav-link" href="#cpt">WP CUSTOM POST TYPE API</a>
			      </li>
			      <li class="nav-item">
			          <a class="nav-link" href="#widget">WP WIDGET API</a>
			      </li>
			    </ul>
			  </div>
			</nav>

		<?php

		global $wpdb;
		echo '<hr>';
		echo '<h1>WPDB API</h1> <br>';
		echo '<hr>';
		echo '<h5>Returns 1st row title:(SQL must be single quote not double)</h5> <br>';
		echo '<p>$wpdb->get_var( "SELECT post_title FROM wp_posts" )</p><br>';
		$result = $wpdb->get_var( 'SELECT post_title FROM wp_posts' );
		echo '<div class="result-box">' . $result . '</div><br>';

		echo '<p>$wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->users" )</p> <br>';
		$user_count = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->users" );
		echo '<div class="result-box">User count is   ' . $user_count . '</div>' . '<br>';

		
		//Returns 5 column offset & 4 row offset
		echo '<h5>Shows 6th column & 5th row variable:</h5> <br>';
		echo '<p>$wpdb->get_var( "SELECT * FROM wp_posts", 5, 4 )</p> <br>';
		$result = $wpdb->get_var( 'SELECT * FROM wp_posts', 5, 4 );
		echo '<div class="result-box">User count is   ' . $result . '</div><br>';

		echo '<h5>Returns Post Object for the 1st Row:</h5> <br>';
		echo '<h5>$wpdb->get_row( "SELECT * FROM wp_posts" )</h5> <br>';
		$result = $wpdb->get_row( 'SELECT * FROM wp_posts' );
		echo '<pre>';
		print_r($result) . '<br>';
		echo '</pre>';

		echo '<h5>Returns Post Object for the 14TH Row:</h5> <br>';
		echo '<h5>$wpdb->get_row( "SELECT * FROM wp_posts", OBJECT, 14 )</h5> <br>';
		$result = $wpdb->get_row( 'SELECT * FROM wp_posts', OBJECT, 14 );
		echo '<pre>';
		print_r($result) . '<br>';
		echo '</pre>';

		echo '<h5>Returns Post Array for the 6TH COLUMN by offsetting 5:</h5> <br>';
		echo '<h5>$wpdb->get_col( "SELECT * FROM wp_posts LIMIT 10", 5 )</h5> <br>';
		$result = $wpdb->get_col( 'SELECT * FROM wp_posts LIMIT 10', 5 );
		echo '<pre>';
		print_r($result) . '<br>';
		echo '</pre>';

		echo '<h5>Returns Every Post As an OBJECT. Can be output like print_r( $result[ n ] ) * where n is the index</h5> <br>';
		echo '<h5>$wpdb->get_results( "SELECT * FROM wp_posts", OBJECT )</h5> <br>';
		$result = $wpdb->get_results( 'SELECT * FROM wp_posts', OBJECT );
		// echo '<pre>';
		// print_r($result) . '<br>';
		print_r($result[2]) . '<br>';
		echo '<h5>print_r($result[2]->post_title)</h5><br>';
		print_r($result[2]->post_title) . '<br>';
		echo '</pre>';

		echo '<hr>';
		echo '<h5>FROM wp_helpdesk_table</h5> <br>';
		echo '<h5>$wpdb->get_results( "SELECT * FROM wp_helpdesk_table", OBJECT )</h5> <br>';
		$results = $wpdb->get_results( 'SELECT * FROM wp_helpdesk_table', OBJECT );
		echo '<pre>';
		// echo '<h5>print_r($result[2]->id)</h5><br>';
		// print_r($results[2]->id) . '<br>';
		print_r($results) . '<br>';

		foreach ($results as $result) {
			
			echo "<ul class='list-group'>";
			echo "<li class='list-group-item' style='color:black'>";
			echo $result->name;
			echo "</li>";
			echo "</ul>";
		}

		echo '</pre>';	

		echo '<h5 id="create">CREATE TABLE wp_helpdesk_table</h5> <a href="#mpf-header-box" class="btn btn-primary float-right">GO TO MENU</a><br>';
		echo '<pre style="background-color: #e0e0e0;">';
		highlight_file('wpdb-create-table-code.php');
		echo '</pre>';

		echo '<h5 id="drop">DROP TABLE wp_helpdesk_table</h5> <a href="#mpf-header-box" class="btn btn-primary float-right">GO TO MENU</a><br>';
		echo '<pre style="background-color: #e0e0e0;">';
		highlight_file('wpdb-drop-table-code.php');
		echo '</pre>';

		echo '<h5 id="insert">INSERT INTO wp_helpdesk_table</h5> <a href="#mpf-header-box" class="btn btn-primary float-right">GO TO MENU</a><br>';
		echo '<pre style="background-color: #e0e0e0;">';
		highlight_file('wpdb-insert-code.php');
		echo '</pre>';

		echo '<h5 id="update">UPDATE INTO wp_helpdesk_table</h5> <a href="#mpf-header-box" class="btn btn-primary float-right">GO TO MENU</a><br>';
		echo '<pre style="background-color: #e0e0e0;">';
		highlight_file('wpdb-update-code.php');
		echo '</pre>';

		echo '<h5 id="delete">DELETE FROM wp_helpdesk_table</h5> <a href="#mpf-header-box" class="btn btn-primary float-right">GO TO MENU</a><br>';
		echo '<pre style="background-color: #e0e0e0;">';
		highlight_file('wpdb-delete-code.php');
		echo '</pre>';

		echo '<h5 id="wp-options">INSERT INTO wp_options Table</h5> <a href="#mpf-header-box" class="btn btn-primary float-right">GO TO MENU</a><br>';
		echo '<pre style="background-color: #e0e0e0;">';
		highlight_file('wpdb-options-table-code.php');
		echo '</pre>';

		echo '<h5 id="prepare">PREPARE QUERY INSERT INTO wp_options Table</h5> <a href="#mpf-header-box" class="btn btn-primary float-right">GO TO MENU</a><br>';
		echo '<pre style="background-color: #e0e0e0;">';
		highlight_file('wpdb-prepare-insert-code.php');
		echo '</pre>';

		echo '<h5>PREPARE QUERY SELECT From wp_options Table</h5> <a href="#mpf-header-box" class="btn btn-primary float-right">GO TO MENU</a><br>';
		echo '<pre style="background-color: #e0e0e0;">';
		highlight_file('wpdb-prepare-select-code.php');
		echo '</pre>';

		/*===========================================
		=            WP SETTING API CODE            =
		===========================================*/
		echo '<div id="settings">';

			echo '<hr>';
			echo '<h1 id="settings">WP SETTINGS API</h1> <br>';
			echo '<hr>';
			echo '<h5 id="top-menu">WP SETTINGS TOP Level Menu</h5> <a href="#mpf-header-box" class="btn btn-primary float-right">GO TO MENU</a> <br>';
			echo '<pre style="background-color: #e0e0e0;">';
			highlight_file('wp-settings-main-menu-code.php');
			echo '</pre>';		

			echo '<h5 id="sub-menu">WP SETTINGS SUB Level Menu</h5>  <a href="#mpf-header-box" class="btn btn-primary float-right">GO TO MENU</a><br>';
			echo '<pre style="background-color: #e0e0e0;">';
			highlight_file('wp-settings-sub-menu-code.php');
			echo '</pre>';
			
			
			echo '<h5 id="settings-reg">WP SETTINGS Display Callback</h5> <a href="#mpf-header-box" class="btn btn-primary float-right">GO TO MENU</a> <br>';
			echo '<pre style="background-color: #e0e0e0;">';
			highlight_file('wp-settings-menu-display-callback-code.php');
			echo '</pre>';

			echo '<h5 id="settings-reg">WP SETTINGS Registration</h5> <a href="#mpf-header-box" class="btn btn-primary float-right">GO TO MENU</a> <br>';
			echo '<pre style="background-color: #e0e0e0;">';
			highlight_file('wp-settings-registration-code.php');
			echo '</pre>';

			echo '<h5 id="settings-fields">WP SETTINGS Defaults</h5> <a href="#mpf-header-box" class="btn btn-primary float-right">GO TO MENU</a> <br>';
			echo '<pre style="background-color: #e0e0e0;">';
			highlight_file('wp-settings-defaults-code.php');
			echo '</pre>';

			echo '<h5 id="settings-text">WP SETTINGS TEXT FIELD CALLBACK</h5> <a href="#mpf-header-box" class="btn btn-primary float-right">GO TO MENU</a> <br>';
			echo '<pre style="background-color: #e0e0e0;">';
			highlight_file('wp-settings-text-field-callback.php');
			echo '</pre>';

			echo '<h5 id="settings-radio">WP SETTINGS RADIO FIELD CALLBACK</h5> <a href="#mpf-header-box" class="btn btn-primary float-right">GO TO MENU</a> <br>';
			echo '<pre style="background-color: #e0e0e0;">';
			highlight_file('wp-settings-radio-field-callback.php');
			echo '</pre>';

			echo '<h5 id="settings-textarea">WP SETTINGS TEXT AREA FIELD CALLBACK</h5> <a href="#mpf-header-box" class="btn btn-primary float-right">GO TO MENU</a> <br>';
			echo '<pre style="background-color: #e0e0e0;">';
			highlight_file('wp-settings-textarea-field-callback.php');
			echo '</pre>';

			echo '<h5 id="settings-checkbox">WP SETTINGS CHECKBOX FIELD CALLBACK</h5> <a href="#mpf-header-box" class="btn btn-primary float-right">GO TO MENU</a> <br>';
			echo '<pre style="background-color: #e0e0e0;">';
			highlight_file('wp-settings-checkbox-field-callback.php');
			echo '</pre>';

			echo '<h5 id="settings-select">WP SETTINGS SELECT FIELD CALLBACK</h5> <a href="#mpf-header-box" class="btn btn-primary float-right">GO TO MENU</a> <br>';
			echo '<pre style="background-color: #e0e0e0;">';
			highlight_file('wp-settings-select-field-callback.php');
			echo '</pre>';

			echo '<h5 id="settings-validation">WP SETTINGS VALIDATION CALLBACK</h5> <a href="#mpf-header-box" class="btn btn-primary float-right">GO TO MENU</a> <br>';
			echo '<pre style="background-color: #e0e0e0;">';
			highlight_file('wp-settings-validation-callback.php');
			echo '</pre>';

			echo '<h5 id="settings-frontend">WP SETTINGS FRONTEND DISPLAY</h5> <a href="#mpf-header-box" class="btn btn-primary float-right">GO TO MENU</a> <br>';
			echo '<pre style="background-color: #e0e0e0;">';
			highlight_file('wp-settings-frontend-display-code.php');
			echo '</pre>';

		echo '</div>';

		/*=====  End of WP SETTING API CODE  ======*/

		/*======================================
		=            WP METABOX API            =
		======================================*/
		echo '<div id="metabox">';

			echo '<hr>';
			echo '<h1>WP METABOX API</h1><br>';
			echo '<hr>';
			
			echo '<h5 id="metabox-text">TEXT INPUT METABOX</h5> <a href="#mpf-header-box" class="btn btn-primary float-right">GO TO MENU</a><br>';
			echo '<pre style="background-color: #e0e0e0;">';
			highlight_file('wp-metabox-text-input-code.php');
			echo '</pre>';

			echo '<h5 id="metabox-textarea">TEXTAREA METABOX</h5> <a href="#mpf-header-box" class="btn btn-primary float-right">GO TO MENU</a><br>';
			echo '<pre style="background-color: #e0e0e0;">';
			highlight_file('wp-metabox-textarea-code.php');
			echo '</pre>';	

			echo '<h5 id="metabox-checkbox">CHECKBOX METABOX</h5> <a href="#mpf-header-box" class="btn btn-primary float-right">GO TO MENU</a><br>';
			echo '<pre style="background-color: #e0e0e0;">';
			highlight_file('wp-metabox-checkbox-code.php');
			echo '</pre>';

			echo '<h5 id="metabox-radio">RADIO METABOX</h5> <a href="#mpf-header-box" class="btn btn-primary float-right">GO TO MENU</a><br>';
			echo '<pre style="background-color: #e0e0e0;">';
			highlight_file('wp-metabox-radio-code.php');
			echo '</pre>';

			echo '<h5 id="metabox-select">SELECT METABOX</h5> <a href="#mpf-header-box" class="btn btn-primary float-right">GO TO MENU</a><br>';
			echo '<pre style="background-color: #e0e0e0;">';
			highlight_file('wp-metabox-select-code.php');
			echo '</pre>';	

		echo '</div>';	
		
		/*=====  End of WP METABOX API  ======*/

		/*========================================
		=            WP SHORTCODE API            =
		========================================*/
		echo '<div id="shortcode">';

			echo '<hr>';
			echo '<h1>WP SHORTCODE API </h1><br>';
			echo '<hr>';

			?>

			<img class="img-fluid" style="padding-bottom: 2rem;" src="<?php echo plugins_url( '/social-shortcode.png', __FILE__ ); ?>">

			<?php

			
			echo '<h5 id="metabox-text">EXAMPLE 1: MPF SOCIAL LINKS</h5> <a href="#mpf-header-box" class="btn btn-primary float-right">GO TO MENU</a><br>';
			echo '<pre style="background-color: #e0e0e0;">';
			highlight_file('wp-shortcode-code.php');
			echo '</pre>';

			?>

			<img class="img-fluid" style="padding-bottom: 2rem;" src="<?php echo plugins_url( '/lorem-shortcode.png', __FILE__ ); ?>">

			<?php


			echo '<h5 id="metabox-text">EXAMPLE 2: MPF LOREM REPEAT</h5> <a href="#mpf-header-box" class="btn btn-primary float-right">GO TO MENU</a><br>';
			echo '<pre style="background-color: #e0e0e0;">';
			highlight_file('wp-shortcode2-code.php');
			echo '</pre>';
			

		echo '</div>';	
		
		
		/*=====  End of WP SHORTCODE API  ======*/

		/*========================================
		=            CUSTOM POST TYPE            =
		========================================*/
		
		echo '<div id="cpt">';

			echo '<hr>';
			echo '<h1>WP CUSTOM POST TYPE API </h1><br>';
			echo '<hr>';
			
			echo '<h5 id="metabox-text">CUSTOM POST TYPE : PORTFOLIO WITH PORTFOLIO ITEM TAXONOMY & PORTFOLIO SLUG</h5> <a href="#mpf-header-box" class="btn btn-primary float-right">GO TO MENU</a><br>';
			echo '<pre style="background-color: #e0e0e0;">';
			highlight_file('wp-cpt-code.php');
			echo '</pre>';

		echo '</div>';	
				
		
		/*=====  End of CUSTOM POST TYPE  ======*/

		/*=====================================
		=            WP WIDGET API            =
		=====================================*/
		
		echo '<div id="widget">';

			echo '<hr>';
			echo '<h1>WP WIDGET API </h1><br>';
			echo '<hr>';
			
			echo '<h5 id="metabox-text">WIDGET: MAIN</h5> <a href="#mpf-header-box" class="btn btn-primary float-right">GO TO MENU</a><br>';
			echo '<pre style="background-color: #e0e0e0;">';
			highlight_file('wp-widget-main-code.php');
			echo '</pre>';

			echo '<h5 id="metabox-text">WIDGET: BODY</h5> <a href="#mpf-header-box" class="btn btn-primary float-right">GO TO MENU</a><br>';
			echo '<pre style="background-color: #e0e0e0;">';
			highlight_file('wp-widget-body-code.php');
			echo '</pre>';

			?>

			<img class="img-fluid" style="padding-bottom: 2rem;" src="<?php echo plugins_url( '/mfp-first-widget.png', __FILE__ ); ?>">

			<?php



			echo '<h5 id="metabox-text">WIDGET: ADMIN VIEW</h5> <a href="#mpf-header-box" class="btn btn-primary float-right">GO TO MENU</a><br>';
			echo '<pre style="background-color: #e0e0e0;">';
			highlight_file('wp-widget-admin-view-code.php');
			echo '</pre>';

		echo '</div>';	
		
		/*=====  End of WP WIDGET API  ======*/
		
		
		
		
		echo '</section>';
	}
}






























































