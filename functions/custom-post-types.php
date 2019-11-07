<?php 

//FONTAWESOME ICONS ON DASHBOARD MENU

function fontawesome_dashboard() {
   wp_enqueue_script('fontawesome', 'https://kit.fontawesome.com/9a1bb2c83f.js'); 
}

add_action('admin_init', 'fontawesome_dashboard');
function fontawesome_icon_dashboard() {
   echo "<style type='text/css' media='screen'>
   		#adminmenu .menu-icon-beers div.wp-menu-image:before {
   			font-family: Fontawesome !important;
   			content: '\\f0fc';
     	}
     	#adminmenu .menu-icon-ciders div.wp-menu-image:before {
   			font-family: Fontawesome !important;
   			content: '\\f179';
     	}
     	</style>";
 }
add_action('admin_head', 'fontawesome_icon_dashboard');

// =============================================================================== //

//BEERS
function create_posttype_beers() {
 register_post_type( 'beers',
 array(
 	'labels' => array(
 		'name' => __( 'WBW Beers' ),
 		'singular_name' => __( 'Beer' )
 	),
 	'public' => true,
 	'has_archive' => true,
 	'rewrite' => array('slug' => 'wbwbeer'),
 ));
}

add_action( 'init', 'create_posttype_beers' );

// =============================================================================== //

function custom_post_type_beers() {
	$labels = array(
		'name'                => _x( 'Beer Library', 'Post Type General Name', 'superflous-nomenclature' ),
		'singular_name'       => _x( 'Beer', 'Post Type Singular Name', 'superflous-nomenclature' ),
		'menu_name'           => __( 'Beer Library', 'superflous-nomenclature' ),
		'parent_item_colon'   => __( 'Parent Beer', 'superflous-nomenclature' ),
		'all_items'           => __( 'All Beers', 'superflous-nomenclature' ),
		'view_item'           => __( 'View Beer', 'superflous-nomenclature' ),
		'add_new_item'        => __( 'Add New Beer', 'superflous-nomenclature' ),
		'add_new'             => __( 'Add New', 'superflous-nomenclature' ),
		'edit_item'           => __( 'Edit Beer', 'superflous-nomenclature' ),
		'update_item'         => __( 'Update Beer', 'superflous-nomenclature' ),
		'search_items'        => __( 'Search Beer', 'superflous-nomenclature' ),
		'not_found'           => __( 'Not Found', 'superflous-nomenclature' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'superflous-nomenclature' ),
	);
	$args = array(
		'label'               => __( 'WBW Beers', 'superflous-nomenclature' ),
		'description'         => __( 'Inclusive Beer List', 'superflous-nomenclature' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', ),
		'taxonomies'          => array( 'category' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 4,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);

	// Add Tag Support
	function beer_tag() {
		register_taxonomy_for_object_type('post_tag', 'beers');
	}
	add_action('init', 'beer_tag');
	register_post_type( 'beers', $args );
}

add_action( 'init', 'custom_post_type_beers', 0 );

// =============================================================================== //


//CMB2 Integration == BEER INFO
add_action( 'cmb2_admin_init', 'wbwbeer_beer_info_metabox' );

function wbwbeer_beer_info_metabox() {
	$cmb = new_cmb2_box( array(
		'id'            => 'beer_info',
		'title'         => __( 'Beer Information', 'superflous-nomenclature' ),
		'object_types'  => array( 'beers', ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true,
	));

	// Regular text field
	$cmb->add_field( array(
		'name'       => __( 'ABV', 'superflous-nomenclature' ),
		'desc'       => __( 'Enter Beer ABV Here (percent sign is auto generated)', 'superflous-nomenclature' ),
		'id'         => 'beer_abv',
		'type'       => 'text',
	));

	//BEER STYLE
	$cmb->add_field( array(
		'name'       => __( 'Beer Style', 'superflous-nomenclature' ),
		'desc'       => __( 'Enter Beer Style Here', 'superflous-nomenclature' ),
		'id'         => 'beer_style',
		'type'       => 'text',
	));

	//BEER LOGO 
	$cmb->add_field( array(
		'name'    => 'Beer Logo',
		'desc'    => 'Upload an image or enter an URL.',
		'id'      => 'beer_logo_image',
		'type'    => 'file',
		'options' => array(
			'url' => true, 
		),
		'text'    => array(
			'add_upload_file_text' => 'Add Logo'
		),
		'query_args' => array(
			'type' => array(
				'image/gif',
				'image/jpeg',
				'image/png',
				'image/svg+xml',
			),
		),
		'preview_size' => 'small',
	));

	//UNTAPPD LINK
	$cmb->add_field( array(
		'name' => __( 'Untappd Link URL', 'superflous-nomenclature' ),
		'id'   => 'untappd_url',
		'type' => 'text_url',
		'protocols' => array( 'http', 'https' ), 
	));
}

// =============================================================================== //

//CIDERS
function create_posttype_ciders() {
	register_post_type( 'ciders',
	array(
		'labels' => array(
			'name' => __( 'Urban Orchard' ),
			'singular_name' => __( 'Cider' )
		),
		'public' => true,
		'has_archive' => true,
		'rewrite' => array('slug' => 'urban-orchard-works'),
	));
}

add_action( 'init', 'create_posttype_ciders' );

// =============================================================================== //

function custom_post_type_ciders() {

	$labels = array(
		'name'                => _x( 'Cider Library', 'Post Type General Name', 'superflous-nomenclature' ),
		'singular_name'       => _x( 'Cider', 'Post Type Singular Name', 'superflous-nomenclature' ),
		'menu_name'           => __( 'Cider Library', 'superflous-nomenclature' ),
		'parent_item_colon'   => __( 'Parent Cider', 'superflous-nomenclature' ),
		'all_items'           => __( 'All Ciders', 'superflous-nomenclature' ),
		'view_item'           => __( 'View Ciders', 'superflous-nomenclature' ),
		'add_new_item'        => __( 'Add New Cider', 'superflous-nomenclature' ),
		'add_new'             => __( 'Add New', 'superflous-nomenclature' ),
		'edit_item'           => __( 'Edit Cider', 'superflous-nomenclature' ),
		'update_item'         => __( 'Update Cider', 'superflous-nomenclature' ),
		'search_items'        => __( 'Search Ciders', 'superflous-nomenclature' ),
		'not_found'           => __( 'Not Found', 'superflous-nomenclature' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'superflous-nomenclature' ),
	);

	$args = array(
		'label'               => __( 'New Cider', 'superflous-nomenclature' ),
		'description'         => __( 'Inclusive Cider List', 'superflous-nomenclature' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', ),
		'taxonomies'          => array( 'category' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);

	// Add Tag Support
	function cider_tag() {
		register_taxonomy_for_object_type('post_tag', 'ciders');
	}
	add_action('init', 'cider_tag');
	register_post_type( 'ciders', $args );

    //CMB2 Integration == CIDER INFO
    add_action( 'cmb2_admin_init', 'urban_orchard_info_metabox' );
    function urban_orchard_info_metabox() {
    	$cmb = new_cmb2_box( array(
    		'id'            => 'cider_info',
    		'title'         => __( 'Cider Information', 'superflous-nomenclature' ),
    		'object_types'  => array( 'ciders', ),
    		'context'       => 'normal',
    		'priority'      => 'high',
    		'show_names'    => true,
    	));
    	$cmb->add_field( array(
    		'name'       => __( 'ABV', 'superflous-nomenclature' ),
    		'desc'       => __( 'Enter Cider ABV Here (percent sign is auto generated)', 'superflous-nomenclature' ),
    		'id'         => 'cider_abv',
    		'type'       => 'text',
    	));

    	//CIDER STYLE
    	$cmb->add_field( array(
    		'name'       => __( 'Cider Style', 'superflous-nomenclature' ),
    		'desc'       => __( 'Enter Cider Style Here', 'superflous-nomenclature' ),
    		'id'         => 'cider_style',
    		'type'       => 'text',
    	));

    	//CIDER LOGO 
    	$cmb->add_field( array(
    		'name'    => 'Cider Logo',
    		'desc'    => 'Upload an image or enter an URL.',
    		'id'      => 'cider_logo_image',
    		'type'    => 'file',
    		'options' => array(
    			'url' => true, 
    		),
    		'text'    => array(
    			'add_upload_file_text' => 'Add Logo'
    		),
    		'query_args' => array(
    			'type' => array(
    				'image/gif',
    				'image/jpeg',
    				'image/png',
    				'image/svg+xml',
    			),
    		),
    		'preview_size' => 'small',
    	));
    }
}

add_action( 'init', 'custom_post_type_ciders', 2 );
