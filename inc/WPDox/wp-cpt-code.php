
	CUSTOM POST TYPE
	
	portfolio (slug)
	portfolio-item (taxonomy)
	portfolio (taxonomy slug)
	REST API enabled

<?php 

/**
* 
*/
class CustomPostType
{
	
	public function __construct()
	{
  	add_action( 'init', array( $this, 'createPortfolioCpt' ) );
	  add_action( 'init', array( $this, 'createPortfolioItemTaxonomies' ) );

	}

	public function createPortfolioCpt() {
	  	$labels = array(
	  		'name'               => _x( 'Portfolio', 'post type general name', 'moose-framework' ),
	  		'singular_name'      => _x( 'Portfolio Item', 'post type singular name', 'moose-framework' ),
	  		'menu_name'          => _x( 'Portfolio', 'admin menu', 'moose-framework' ),
	  		'name_admin_bar'     => _x( 'Portfolio Item', 'add new on admin bar', 'moose-framework' ),
	  		'add_new'            => _x( 'Add New', 'Portfolio Item', 'moose-framework' ),
	  		'add_new_item'       => __( 'Add New Portfolio Item', 'moose-framework' ),
	  		'new_item'           => __( 'New Portfolio Item', 'moose-framework' ),
	  		'edit_item'          => __( 'Edit Portfolio Item', 'moose-framework' ),
	  		'view_item'          => __( 'View Portfolio Item', 'moose-framework' ),
	  		'all_items'          => __( 'All Portfolio', 'moose-framework' ),
	  		'search_items'       => __( 'Search Portfolio', 'moose-framework' ),
	  		'parent_item_colon'  => __( 'Parent Portfolio:', 'moose-framework' ),
	  		'not_found'          => __( 'No Portfolio found.', 'moose-framework' ),
	  		'not_found_in_trash' => __( 'No Portfolio found in Trash.', 'moose-framework' )
	  	);
	  
	  	$args = array(
	  		'labels'             => $labels,
	  		'description'        => __( 'Description.', 'moose-framework' ),
	  		'public'             => true,
	  		'publicly_queryable' => true,
	  		'show_ui'            => true,
	  		'show_in_menu'       => true,
	  		'query_var'          => true,
	  		'rewrite'            => array( 'slug' => 'portfolio', 'with_front' => true ),
	  		'capability_type'    => 'post',
	  		'has_archive'        => true,
	  		'hierarchical'       => false,
	  		'menu_position'      => null,
	  		'show_in_rest'       => true,
	  		'rest_base'          => 'portfolio',
	  		'rest_controller_class' => 'WP_REST_Posts_Controller',
	  		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	  	);
	  
	  	register_post_type( 'portfolio', $args );
	}


	// create two taxonomies, Product Types and writers for the post type "book"
	function createPortfolioItemTaxonomies() {
	  // Add new taxonomy, make it hierarchical (like categories)
	  $labels = array(
	    'name'              => _x( 'Portfolio Items', 'taxonomy general name', 'moose-framework' ),
	    'singular_name'     => _x( 'Portfolio Item', 'taxonomy singular name', 'moose-framework' ),
	    'search_items'      => __( 'Search Portfolio Items', 'moose-framework' ),
	    'all_items'         => __( 'All Portfolio Items', 'moose-framework' ),
	    'parent_item'       => __( 'Parent Portfolio Item', 'moose-framework' ),
	    'parent_item_colon' => __( 'Parent Portfolio Item:', 'moose-framework' ),
	    'edit_item'         => __( 'Edit Portfolio Item', 'moose-framework' ),
	    'update_item'       => __( 'Update Portfolio Item', 'moose-framework' ),
	    'add_new_item'      => __( 'Add New Portfolio Item', 'moose-framework' ),
	    'new_item_name'     => __( 'New Portfolio Item Name', 'moose-framework' ),
	    'menu_name'         => __( 'Portfolio Items', 'moose-framework' ),
	  );

	  $args = array(
	    'hierarchical'      => true,
	    'labels'            => $labels,
	    'show_ui'           => true,
	    'show_in_rest'      => true,
	    'show_admin_column' => true,
	    'query_var'         => true,
	    'rewrite'           => array( 'slug' => 'portfolio' ),
	  );

	  register_taxonomy( 'portfolio-item', array( 'portfolio' ), $args );
	 
	}	
}

//MAKE PORTFOLIO CUSTOM POST TYPE 
$make_cpt = new CustomPostType();

