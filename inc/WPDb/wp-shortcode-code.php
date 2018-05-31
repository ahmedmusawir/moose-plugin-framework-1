
		SOCIAL SHORTCODE CODE 
		[social facebook=ahmedmusawir twitter=billmaher linkedin=ahmedmusawir background=dodgerblue] Let's Socialize [/social] 
		[social facebook=ahmedmusawir twitter=billmaher linkedin=ahmedmusawir background=dodgerblue]  
		[social]


<?php

/**
* Class Social Shorcode
*/
class MPFSocialShortcode
{
	
	function __construct()
	{
		add_shortcode( 'social', array( $this, 'addSocialLinks' ) );	
	}

	public function addSocialLinks( $atts, $content )
	{
		$atts = shortcode_atts( 
			array(
				'content' 		=> !empty($content) ? $content : 'Social Block',
				'facebook'		=> 'htmlfivedev',
				'twitter'		=> 'htmlfivedev',
				'linkedin'		=> 'htmlfivedev',
				'background'	=> 'hotpink'

			), $atts );

		extract( $atts );

		ob_start(); // OUTPUT BUFFERING

	?>

<!--======================================
=            HTML BLOCK START            =
=======================================-->
<style type="text/css">
	#MPF-SOCIAL-BLOCK {
		background-color: <?php echo $background; ?>;
	}
</style>
<main id="MPF-SOCIAL-BLOCK">

	<div class="well">

		<h4 class="title"><?php echo $content; ?></h4>

		<ul>
			<li>
				<a href="http://facebook.com/<?php echo $facebook; ?>" target="_blank">
					<i class="fa fa-facebook-square" aria-hidden="true"></i>Connect With Me on Facebook
				</a>
			</li>
			<li>
				<a href="http://twitter.com/<?php echo $twitter; ?>" target="_blank">
					<i class="fa fa-twitter-square" aria-hidden="true"></i>Connect With Me on Twitter
				</a>
			</li>
			<li>
				<a href="http://linkedin.com/in/<?php echo $linkedin; ?>" target="_blank">
					<i class="fa fa-linkedin-square" aria-hidden="true"></i>Connect With Me on LinkedIn
				</a>
			</li>
		</ul>
	</div>
	
</main>

<!--====================================
=            HTML BLOCK END            =
=====================================-->

	<?php 

		$module_contents = ob_get_contents();

		ob_end_clean();		


		return $module_contents;
	}
}

//ADD SOCIAL SHORTCODE 	
$social_shortcode = new MPFSocialShortcode();