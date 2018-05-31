WIDGET BODY (main code)

<?php 

class MPFFirstWidget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
			'name' => 'MPF First Widget',
			'classname' => 'mpf_first_widget_css',
			'description' => 'MPF First Widget Following Tutsplus',
		);
		parent::__construct( 'mpf_first_widget', '', $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {

		extract( $args );

		
		$input_text = $instance[ 'name' ];
		$textarea = $instance[ 'bio' ];
		$select = $instance[ 'position' ];
		$radio = $instance[ 'mpf_radio' ];
		$your_checkbox_var = $instance[ 'mpf_check' ] ? 'true' : 'false';
		// echo "</h1>" . $your_checkbox_var . "</h1>";

		?>

		<ul class="list-group">
			<li class="list-group-item">INPUT TEXT: <?php echo $input_text; ?></li>
			<li class="list-group-item">TEXT AREA: <?php echo $textarea; ?></li>
			<li class="list-group-item">SELECT: <?php echo $select; ?></li>
			<li class="list-group-item">RADIO: <?php echo $radio; ?></li>
			<li class="list-group-item">CHECKBOX: <?php echo $your_checkbox_var; ?></li>
		</ul>


		<?php


		/*======================================
		=            Debugging Code            =
		======================================*/
		
		// outputs the content of the widget
		// echo "<h1>Messager Test</h1>";
		// echo "<pre style='color: black;'>";
		// echo $instance->class; //non object
		// print_r($args);
		// print_r($this);
		// echo "</pre>";
		// $user_name = get_option( 'widget_mpf_first_widget', false );
		// $user_name = get_option( $this->option_name, true );
		// echo "<pre style='color: black;'>";
		// print_r($user_name);
		// echo "</pre>";
		// echo $user_name[4][ 'name' ] . "<br>";
		// echo $user_name[5][ 'name' ];
		 
		
		/*=====  End of Debugging Code  ======*/

	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {

		// extract( $instance );
		$instance = wp_parse_args( 
			(array) $instance, 
			array(
				'name' => '',
				'bio' => '',
				'position' => 'above',
				'mpf_check' => '',
				'mpf_radio' => ''
			) 
		);

		/**
		 *
		 * Widget Admin Form Code
		 *
		 */
		include( PLUGIN_DIR . '/views/mpf-first-widget-admin-view.php' );

	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
		$old_instance[ 'name' ] = strip_tags(stripcslashes( $new_instance[ 'name' ] ));
		$old_instance[ 'bio' ] = strip_tags(stripcslashes( $new_instance[ 'bio' ] ));
		$old_instance[ 'position' ] = strip_tags(stripcslashes( $new_instance[ 'position' ] ));
		$old_instance[ 'mpf_check' ] = strip_tags(stripcslashes( $new_instance[ 'mpf_check' ] ));
		$old_instance[ 'mpf_radio' ] = strip_tags(stripcslashes( $new_instance[ 'mpf_radio' ] ));

		return $old_instance;
	}
}
