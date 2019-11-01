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

//META BOX ADDITION
function beer_info_meta_box() {

    $screens = array( 'beers' );

    foreach ( $screens as $screen ) {
        add_meta_box(
            'beer-abv',
            __( 'Beer ABV (percent sign auto generated, just input numbers)', 'superflous-nomenclature' ),
            'beer_abv_meta_box_callback',
            $screen
        );
        add_meta_box(
        	'beer-style',
        	__('Beer Style (please select)', 'superflous-nomenclature'),
        	$screen
        );
    }
}

add_action( 'add_meta_boxes', 'beer_info_meta_box' );

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
        'register_meta_box_cb' => 'beer_info_meta_box', //Meta Box Callback
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

//META BOX STRUCTURE
function beer_abv_meta_box_callback( $post ) {
    // Add a nonce field so we can check for it later.
    wp_nonce_field( 'beer_abv_nonce', 'beer_abv_nonce' );

    $value = get_post_meta( $post->ID, '_beer_abv', true );

    echo '<textarea style="width:50%" id="beer_abv" name="beer_abv">' . esc_attr( $value ) . '</textarea>';
}

function save_beer_abv_meta_box_data( $post_id ) {
	
	//SECURITY CHECKS

    if ( ! isset( $_POST['beer_abv_nonce'] ) ) {
        return;
    }
    if ( ! wp_verify_nonce( $_POST['beer_abv_nonce'], 'beer_abv_nonce' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return;
        }
    }
    else {
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }
    //SECURITY PASSED VALIDATION

    if ( ! isset( $_POST['beer_abv'] ) ) {
        return;
    }

    //SANITIZE USER INPUT
    $my_data = sanitize_text_field( $_POST['beer_abv'] );
    update_post_meta( $post_id, '_beer_abv', $my_data );
}
add_action( 'save_post', 'save_beer_abv_meta_box_data' );

//META BOX OUTPUT
function beer_abv( $content ) {
	global $post;
    $beer_abv = esc_attr( get_post_meta( $post->ID, '_beer_abv', true ) );
    $abv_notice = "<div class=\"alert alert-success rounded-0\">ABV: $beer_abv%</div>";
    return $abv_notice . $content;
}

add_filter( 'the_content', 'beer_abv' );


// =============================================================================== //

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
