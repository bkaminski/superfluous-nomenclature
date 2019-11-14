<?php

//if ( !wp_next_scheduled('update_beer_list') ) {
//	wp_schedule_event(time(), 'hourly', 'get_beers_from_api');
//}

add_action('wp_ajax_nopriv_get_beers_from_api', 'get_beers_from_api');
add_action('wp_ajax_get_beers_from_api', 'get_beers_from_api');

function get_beers_from_api() {

	$current_page = ( ! empty($_POST['current_page']) ) ? $_POST['current_page'] : 1;
	$wbwbeers = [];

	$results = wp_remote_retrieve_body(wp_remote_get('https://wbwbeer.app/api/v1/beers?archived=false&tier=!cider'));

	$results = json_decode($results);

	$wbwbeers[] = $results;

	foreach ( $wbwbeers[0] as $wbwbeer ) {

		$beer_slug = $wbwbeer->name;

		//$existing_beer = get_page_by_path($beer_slug, 'OBJECT', 'wbwbeer');

		if ($existing_beer === null ) {

		$inserted_wbwbeer = wp_insert_post([
			'post_name' => $beer_slug,
			'post_title' => $beer_slug,
			'post_type' => 'wbwbeers',
			'post_status' => 'publish'
		]);

		if( is_wp_error( $inserted_wbwbeer ) ) {
			continue;
		}

		$fillable = [
			'field_5dc862b619530' => 'name',
			'field_5dc862ec19531' => 'style',
			'field_5dc863269b298' => 'description',
			'field_5dc8633738fad' => 'abv',
		];

		foreach ( $fillable as $key => $name ) {
			update_field( $key, $wbwbeer->$name, $inserted_wbwbeer);
		}
	} //else {
	//	$existing_beer = $existing_beer;
	//	$existing_beer_updatedOn = get_field('updated_at', $existing_beer );

	//	if ( $wbwbeer->updated_at >= $existing_beer_updatedOn ) {
	//		$fillable = [
	//		'field_5dc862b619530' => 'name',
	//		'field_5dc862ec19531' => 'style',
	//		'field_5dc863269b298' => 'description',
	//		'field_5dc8633738fad' => 'abv',
	//	];

	//	foreach ( $fillable as $key => $name ) {
	//		update_field( $key, $wbwbeer->$name, $existing_beer);
	//	}
	//}
//}
}
}
