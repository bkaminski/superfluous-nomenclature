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
   			content: '\\f179';
     	}
     	#adminmenu .menu-icon-cornhole-league div.wp-menu-image:before {
   			font-family: Fontawesome !important;
   			content: '\\f091';
     	}
     	#adminmenu .menu-icon-employee-section div.wp-menu-image:before {
   			font-family: Fontawesome !important;
   			content: '\\f0c0';
     	}
     	</style>";
 }
add_action('admin_head', 'fontawesome_icon_dashboard');


// ======================================================================================== //

add_action('init', 'register_beers_cpt');
function register_beers_cpt() {
	register_post_type('wbwbeers', [
		'label' => 'Beers',
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
		'label' => 'Ciders',
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

// ======================================================================================== //


add_action('init', 'register_cornhole_cpt');
function register_cornhole_cpt() {
	register_post_type('cornhole-league', [
		'label' => 'Cornhole',
		'public' => true, 
		'capability_type' => 'post',
		'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', ),
		'taxonomies'  => array( 'category' ),
	]);
}

// Add Tag Support
function cornhole_tag() {
	register_taxonomy_for_object_type('post_tag', 'cornhole-league');
}
add_action('init', 'cornhole_tag');

// ======================================================================================== //


add_action('init', 'register_employee_section_cpt');
function register_employee_section_cpt() {
	register_post_type('employee-section', [
		'label' => 'Employees',
		'public' => true, 
		'capability_type' => 'post',
		'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', ),
		'taxonomies'  => array( 'category' ),
	]);
}

// Add Tag Support
function employee_tag() {
	register_taxonomy_for_object_type('post_tag', 'employee-section');
}
add_action('init', 'employee_tag');
