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

// CREATE CUSTOM POST TYPE
function create_posttype_beers() {
 
    register_post_type( 'beers',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'WBW Beers' ),
                'singular_name' => __( 'Beer' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'wbwbeer'),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype_beers' );

// =============================================================================== //

function custom_post_type_beers() {
 
// Set UI labels for Custom Post Type
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
     
// Set other options for Custom Post Type
     
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
    // Registering your Custom Post Type
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
		'object_types'  => array( 'beers', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	));

	// Regular text field
	$cmb->add_field( array(
		'name'       => __( 'ABV', 'superflous-nomenclature' ),
		'desc'       => __( 'Enter Beer ABV Here', 'superflous-nomenclature' ),
		'id'         => 'beer_abv',
		'type'       => 'text',
	));

	// Select Box
	$cmb->add_field( array(
		'name' => __( 'Beer Style', 'superflous-nomenclature' ),
		'desc' => __( 'Choose style of beer', 'superflous-nomenclature' ),
		'id'   => 'beer_style',
		'type' => 'select',
		'show_option_none' => false,
		'default'          => 'custom',
		'options'          => array(
			'custom'   					=> __( 'Choose One', 'superflous-nomenclature' ),
			'Barrel Aged Black Imperial IPA' 		=> __( 'Barrel Aged Black Imperial IPA', 'superflous-nomenclature' ),
			'Barrel Aged Imperial Stout'     		=> __( 'Barrel Aged Imperial Stout', 'superflous-nomenclature' ),
			'Bavarian Style Wheat Lager'     		=> __( 'Bavarian Style Wheat Lager', 'superflous-nomenclature' ),
			'Belgian Dubbel'				=> __( 'Belgian Dubbel', 'superflous-nomenclature'),
			'Belgian Rye Stout'				=> __( 'Belgian Rye Stout' , 'superflous-nomenclature'),
			'Belgian Tripel'				=> __( 'Belgian Tripel', 'superflous-nomenclature'),
			'Black Imperial IPA'				=> __( 'Black Imperial IPA', 'superflous-nomenclature'),
			'Camp-Out Stout'				=> __( 'Camp-Out Stout', 'superflous-nomenclature'),
			'Chocolate Cherry Cordial' 			=> __( 'Chocolate Cherry Cordial', 'superflous-nomenclature'),
			'Classic IPA'					=> __( 'Classic IPA', 'superflous-nomenclature'),
			'Collaboration Beer'				=> __( 'Collaboration Beer', 'superflous-nomenclature'), 
			'Danish Pastry Quad'				=> __( 'Danish Pastry Quad', 'superflous-nomenclature'),
			'Dark Chocolate Milkshake Stout' 		=> __( 'Dark Chocolate Milkshake Stout', 'superflous-nomenclature'),
			'Desert Colada Sour'				=> __( 'Desert Colada Sour', 'superflous-nomenclature'),
			'Dessert Stout'					=> __( 'Dessert Stout', 'superflous-nomenclature'),
			'Doppelbock'					=> __( 'Doppelbock', 'superflous-nomenclature'),
			'Double NEIPA'					=> __( 'Double NEIPA', 'superflous-nomenclature'),
			'Dunkel'					=> __( 'Dunkel', 'superflous-nomenclature'),
			'Dry Hopped Milkshake Sour'			=> __( 'Dry Hopped Milkshake Sour', 'superflous-nomenclature'),
			'Espresso Stout'				=> __( 'Espresso Stout', 'superflous-nomenclature'),
			'Experimental NEIPA'				=> __( 'Experimental NEIPA', 'superflous-nomenclature'),
			'Farmhouse Saison'				=> __( 'Farmhouse Saison', 'superflous-nomenclature'),
			'Flanders Style Sour Lager'			=> __( 'Flanders Style Sour Lager', 'superflous-nomenclature'),
			'Fruited Milkshake Glitter Sour'		=> __( 'Fruited Milkshake Glitter Sour', 'superflous-nomenclature'),
			'Helles Bock'					=> __( 'Helles Bock', 'superflous-nomenclature'),
			'Helles Lager'					=> __( 'Helles Lager', 'superflous-nomenclature'), 
			'Imperial English Extra Special Brown Ale'	=> __( 'Imperial English Extra Special Brown Ale', 'superflous-nomenclature'),
			'Imperial Stout'				=> __( 'Imperial Stout', 'superflous-nomenclature'),
			'Imperial Viennese Lager'			=> __( 'Imperial Viennese Lager', 'superflous-nomenclature'),
			'Key Lime Pina Colada Sour'			=> __( 'Key Lime Pina Colada Sour', 'superflous-nomenclature'),
			'Lactose NEIPA'					=> __( 'Lactose NEIPA', 'superflous-nomenclature'),
			'Lager'						=> __( 'Lager', 'superflous-nomenclature'),
			'Mango Milkshake NEIPA'				=> __( 'Mango Milkshake NEIPA', 'superflous-nomenclature'),
			'Marzen'					=> __( 'Marzen', 'superflous-nomenclature'),
			'Milkshake IPA'					=> __( 'Milkshake IPA', 'superflous-nomenclature'),
			'Milkshake Sour'				=> __( 'Milkshake Sour', 'superflous-nomenclature'),
			'Milkshake Stout'				=> __( 'Milkshake Stout', 'superflous-nomenclature'),
			'Modern Pale Ale'				=> __( 'Modern Pale Ale', 'superflous-nomenclature'),
			'Northeast IPA'					=> __( 'Northeast IPA', 'superflous-nomenclature'),
			'Northeast Rye IPA'				=> __( 'Northeast Rye IPA', 'superflous-nomenclature'),
			'Pale Ale'					=> __( 'Pale Ale', 'superflous-nomenclature'),
			'Raz-Peach Milkshake IPA'			=> __( 'Raz-Peach Milkshake IPA', 'superflous-nomenclature'),
			'Sour Fruited Milkshake IPA'			=> __( 'Sour Fruited Milkshake IPA', 'superflous-nomenclature'),
			'Spicy Tropical Sour'				=> __( 'Spicy Tropical Sour', 'superflous-nomenclature'),
			'Strawberry Milkshake NEIPA'			=> __( 'Strawberry Milkshake NEIPA', 'superflous-nomenclature'),
			'Strong Ale'					=> __( 'Strong Ale', 'superflous-nomenclature'),
			'Triple IPA'					=> __( 'Triple IPA', 'superflous-nomenclature'),
			'Tropical NEIPA'				=> __( 'Tropical NEIPA', 'superflous-nomenclature'),
			'West Coast IPA'				=> __( 'West Coast IPA', 'superflous-nomenclature'),
			'Wild Belgian Wit'				=> __( 'Wild Belgian Wit', 'superflous-nomenclature'),
			'Wild Soured Belgian Wit'			=> __( 'Wild Soured Belgian Wit', 'superflous-nomenclature'),
			'Wild Wit with Hibiscus Tea'			=> __( 'Wild Wit with Hibiscus Tea', 'superflous-nomenclature'),
			'Yacht Deck Sour'				=> __( 'Yacht Deck Sour', 'superflous-nomenclature'),
		),
	));
}

//CIDERS
function create_posttype_ciders() {
 
    register_post_type( 'ciders',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Urban Orchard' ),
                'singular_name' => __( 'Cider' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'urban-orchard-works'),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype_ciders' );


/*
* Creating a function to create our CPT
*/
 
function custom_post_type_ciders() {
 
// Set UI labels for Custom Post Type
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
        'search_items'        => __( 'Search Cider', 'superflous-nomenclature' ),
        'not_found'           => __( 'Not Found', 'superflous-nomenclature' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'superflous-nomenclature' ),
    );
     
// Set other options for Custom Post Type
     
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
 
}
 
add_action( 'init', 'custom_post_type_ciders', 2 );
