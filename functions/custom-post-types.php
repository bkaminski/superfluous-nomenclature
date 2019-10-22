
<?php 

function fontawesome_dashboard() {
   wp_enqueue_script('fontawesome', 'https://kit.fontawesome.com/9a1bb2c83f.js'); 
}

add_action('admin_init', 'fontawesome_dashboard');
function fontawesome_icon_dashboard() {
   echo "<style type='text/css' media='screen'>
   		icon16.icon-media:before, #adminmenu .menu-icon-beers div.wp-menu-image:before {
   		font-family: Fontawesome !important;
   		content: '\\f0fc';
     }
     	</style>";
 }
add_action('admin_head', 'fontawesome_icon_dashboard');
// Our custom post type function
function create_posttype() {
 
    register_post_type( 'beers',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Beer Library' ),
                'singular_name' => __( 'Beer' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'wbw-beers'),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );


/*
* Creating a function to create our CPT
*/
 
function custom_post_type() {
 
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
        'label'               => __( 'New Beer', 'superflous-nomenclature' ),
        'description'         => __( 'Inclusive Beer List', 'superflous-nomenclature' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'styles' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
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
     
    // Registering your Custom Post Type
    register_post_type( 'beers', $args );
 
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
 
add_action( 'init', 'custom_post_type', 0 );
