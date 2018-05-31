<?php 

/**
 *
 * Submenu Settings Callbacks Class
 *
 */
class ShortcodeSubmenuSettingsCallbacks 
{


	public function jwCallbackSectionOne() {

		ob_start(); // OUTPUT BUFFERING

	?>
	
		<section class="container-fluid">
			<article id="block-one" class="row">

				<div class="col-sm-6">
					<h4>JW SOCIAL SHORTCODE</h4>
					<p>Generates Social Links with customizable links and background color. Default is htmlfivedev. </p>
					<h5>
						[social facebook=ahmedmusawir twitter=billmaher linkedin=ahmedmusawir background=dodgerblue] Let's Socialize [/social]
					</h5>
				</div>	
				<div class="col-sm-6">
					<h4>LOREM REPEAT SHORTCODE</h4>
					<p>Generates multiple copies of the lorem text with middle content as a Title </p>
					<h5>
						[lorem repeat=3]There is nothing divine anywhere ...[/lorem]
					</h5>
				</div>							
				
			</article>
			<hr>
		</section>
	<?php 

		$module_contents = ob_get_contents();

		ob_end_clean();

		echo $module_contents;		
	}

	public function jwCallbackSectionTwo() {

		ob_start(); // OUTPUT BUFFERING

	?>
		<div class="col-sm-6">
	
			<!-- <p>Generates multiple copies of the lorem text with middle content as a Title </p> -->
			<h3>
				Coming Soon ...
			</h3>
			<hr>
		</div>
	<?php 

		$module_contents = ob_get_contents();

		ob_end_clean();

		echo $module_contents;				
		
	}
}






































