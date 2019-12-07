<?php

//if ( ! wp_next_scheduled('update_beer_list') ) {
//	wp_schedule_event(time(), 'daily', 'get_beers_from_api');
//}

add_action('wp_ajax_nopriv_get_beers_from_api', 'get_beers_from_api');
add_action('wp_ajax_get_beers_from_api', 'get_beers_from_api');

function get_beers_from_api() {

	//$file = get_stylesheet_directory() . '/jsontest.txt';
	$current_page = ( ! empty($_POST['current_page']) ) ? $_POST['current_page'] : 1;
	$wbwbeers = [];

	$results = wp_remote_retrieve_body(wp_remote_get('https://wbwbeer.app/api/v1/beers?tier=!cider&tier=!soda&tier=!cans'));

	//file_put_contents($file, "Current Page: " . $current_page. "\n\n", FILE_APPEND);

	$results = json_decode($results);

	if ( ! is_array( $results ) || empty( $results) ) {
		return false;
	}

	$wbwbeers[] = $results;

	foreach ( $wbwbeers[0] as $wbwbeer ) {

		$beer_slug = sanitize_title( $wbwbeer->name . '-' . $wbwbeer->id );

		$existing_beer = get_page_by_path( $beer_slug, 'OBJECT', 'wbwbeers' );

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
			'field_5debe196fece1' => 'updatedAt',
		];

		foreach ( $fillable as $key => $name ) {
			update_field( $key, $wbwbeer->$name, $inserted_wbwbeer );
		}
	} else {
		
		$existing_beer_id = $existing_beer->id;
		$existing_beer_timestamp = get_field('updatedAt', $existing_beer_id );

		if ( $wbwbeer->updatedAt >= $existing_beer_timestamp ) {
			$fillable = [
			'field_5dc862b619530' => 'name',
			'field_5dc862ec19531' => 'style',
			'field_5dc863269b298' => 'description',
			'field_5dc8633738fad' => 'abv',
			'field_5debe196fece1' => 'updatedAt',
		];

		foreach ( $fillable as $key => $name ) {
			update_field( $key, $wbwbeer->$name, $existing_beer_id);
		}
	}

	$current_page = $current_page;
	wp_remote_post( admin_url('admin-ajax.php?action=get_beers_from_api'), [
		'blocking' =>false,
		'sslverify' =>false,
		'body' => [
			'current_page' => $current_page
		]
	]);	 
}
}}
