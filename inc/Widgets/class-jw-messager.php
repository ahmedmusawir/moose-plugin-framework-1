<?php 

class MPFFirstWidget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
			'name' => 'Messager',
			'classname' => 'mpf_first_widget_css',
			'description' => 'MPF First Widget',
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
		// outputs the content of the widget
		// echo "<h1>Messager Test</h1>";
		echo "<pre style='color: black;'>";
		// echo $instance->class; //non object
		// print_r($args);
		print_r($this);
		echo "</pre>";
		

	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {

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
	}
}