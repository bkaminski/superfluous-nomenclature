<?php

//FONTAWESOME ICONS ON DASHBOARD MENU

function fontawesome_dashboard() {
   wp_enqueue_script('fontawesome', 'https://kit.fontawesome.com/9a1bb2c83f.js'); 
}

add_action('admin_init', 'fontawesome_dashboard');
function fontawesome_icon_dashboard() {
   echo "<style type='text/css' media='screen'>
   		#adminmenu .menu-icon-wbwbeers div.wp-menu-image:before {
   			font-family: Fontawesome !important;
   			content: '\\f0fc';
     	}
     	#adminmenu .menu-icon-urban-orchard-works div.wp-menu-image:before {
   			font-family: Fontawesome !important;
   			content: '\\f000';
     	}
     	</style>";
 }
add_action('admin_head', 'fontawesome_icon_dashboard');


// ======================================================================================== //

add_action('init', 'register_beers_cpt');
function register_beers_cpt() {
	register_post_type('wbwbeers', [
		'label' => 'WBW Beers',
		'public' => true, 
		'capability_type' => 'post',
		'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', ),
		'taxonomies'  => array( 'category' ),
	]);
}

// Add Tag Support
function beer_tag() {
	register_taxonomy_for_object_type('post_tag', 'wbwbeers');
}
add_action('init', 'beer_tag');

// ======================================================================================== //


add_action('init', 'register_ciders_cpt');
function register_ciders_cpt() {
	register_post_type('urban-orchard-works', [
		'label' => 'Urban Orchard Works',
		'public' => true, 
		'capability_type' => 'post',
		'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', ),
		'taxonomies'  => array( 'category' ),
	]);
}

// Add Tag Support
function cider_tag() {
	register_taxonomy_for_object_type('post_tag', 'urban-orchard-works');
}
add_action('init', 'cider_tag');
