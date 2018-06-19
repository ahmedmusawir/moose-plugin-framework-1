
		LOREM SHORTCODE CODE 
		[lorem repeat=3]There is nothing divine anywhere ...[/lorem] 
		[lorem]

<?php

/**
* Class Social Shorcode
*/
class MPFLoremShortcode
{
	
	function __construct()
	{
		add_shortcode( 'lorem', array( $this, 'addSocialLinks' ) );	
	}

	public function addSocialLinks( $atts, $content )
	{
		$atts = shortcode_atts( 
			array(
				'content' 		=> !empty($content) ? $content : 'Default Title',
				'repeat'		=> 1

			), $atts );

		extract( $atts );

		ob_start(); // OUTPUT BUFFERING

	?>

<!--======================================
=            HTML BLOCK START            =
=======================================-->

<main id="MPF-LOREM-BLOCK">

	<div class="well" style="padding-top: 2rem;">

		<h3><?php echo $content; ?></h3>

		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>
	</div>
	
</main>

<!--====================================
=            HTML BLOCK END            =
=====================================-->

	<?php 

		$module_contents = ob_get_contents();

		ob_end_clean();		


		return str_repeat( $module_contents, $repeat );
	}
}

//ADD SOCIAL SHORTCODE 	
$social_shortcode = new MPFLoremShortcode();