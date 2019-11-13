<?php 

// ======================================================================================== //

add_action('init', 'register_ciders_cpt');
function register_ciders_cpt() {
	register_post_type('urban-orchard-ciders', [
		'label' => 'Urban Orchard Works',
		'public' => true, 
		'capability_type' => 'post',
		'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', ),
	]);
}

// Add Tag Support
function cider_tag() {
	register_taxonomy_for_object_type('post_tag', 'urban-orchard-ciders');
}
add_action('init', 'cider_tag');

// ======================================================================================== //


add_action('wp_ajax_nopriv_get_ciders_from_api', 'get_ciders_from_api');
add_action('wp_ajax_get_ciders_from_api', 'get_ciders_from_api');

function get_ciders_from_api() {

	$current_page = ( ! empty($_POST['current_page']) ) ? $_POST['current_page'] : 1;
	$uowciders = [];

	$results = wp_remote_retrieve_body(wp_remote_get('https://wbwbeer.app/api/v1/beers?tier=cider&archived=false'));

	$results = json_decode($results);

	$uowciders[] = $results;

	foreach ( $uowciders[0] as $uowcider ) {

		$cider_slug = $uowcider->name;

		$inserted_uowcider = wp_insert_post([
			'post_name' => $cider_slug,
			'post_title' => $cider_slug,
			'post_type' => 'urban-orchard-ciders',
			'post_status' => 'publish'
		]);

		if( is_wp_error( $inserted_uowcider ) ) {
			continue;
		}

		$fillable = [
			'field_5dcc2efe46779' => 'name',
			'field_5dcc2f9d419e4' => 'style',
			'field_5dcc2fb600364' => 'description',
			'field_5dcc2fc319814' => 'abv',
		];

		foreach ( $fillable as $key => $name ) {
			update_field( $key, $uowcider->$name, $inserted_uowcider);
		}
	}

}
