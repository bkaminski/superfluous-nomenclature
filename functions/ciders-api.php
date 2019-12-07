<?php

//if ( ! wp_next_scheduled('update_beer_list') ) {
//	wp_schedule_event(time(), 'daily', 'get_beers_from_api');
//}

add_action('wp_ajax_nopriv_get_ciders_from_api', 'get_ciders_from_api');
add_action('wp_ajax_get_ciders_from_api', 'get_ciders_from_api');

function get_ciders_from_api() {

	//$file = get_stylesheet_directory() . '/jsontest.txt';
	$current_page = ( ! empty($_POST['current_page']) ) ? $_POST['current_page'] : 1;
	$wbwbeers = [];

	$results = wp_remote_retrieve_body(wp_remote_get('https://wbwbeer.app/api/v1/beers?tier=!soda&tier=!tier1&tier=!tier2&tier=!tier3&tier=!cask&tier=!can'));

	//file_put_contents($file, "Current Page: " . $current_page. "\n\n", FILE_APPEND);

	$results = json_decode($results);

	if ( ! is_array( $results ) || empty( $results) ) {
		return false;
	}

	$wbwciders[] = $results;

	foreach ( $wbwciders[0] as $wbwcider ) {

		$cider_slug = sanitize_title( $wbwcider->name . '-' . $wbwcider->id );

		$existing_cider = get_page_by_path( $beer_slug, 'OBJECT', 'urban-orchard-works' );

		if ($existing_cider === null ) {

		$inserted_wbwcider = wp_insert_post([
			'post_name' => $cider_slug,
			'post_title' => $cider_slug,
			'post_type' => 'urban-orchard-works',
			'post_status' => 'publish'
		]);

		if( is_wp_error( $inserted_wbwcider ) ) {
			continue;
		}

		$fillable = [
			'field_5dc862b619530' => 'name',
			'field_5dc862ec19531' => 'style',
			'field_5dcc2fb600364' => 'description',
			'field_5dcc2fc319814' => 'abv',
			'field_5dcc3ed5e9e6d' => 'updatedAt',
		];

		foreach ( $fillable as $key => $name ) {
			update_field( $key, $wbwcider->$name, $inserted_wbwcider );
		}
	} else {
		
		$existing_cider_id = $existing_cider->id;
		$existing_cider_timestamp = get_field('updatedAt', $existing_cider_id );

		if ( $wbwcider->updatedAt >= $existing_cider_timestamp ) {
			$fillable = [
			'field_5dc862b619530' => 'name',
			'field_5dc862ec19531' => 'style',
			'field_5dcc2fb600364' => 'description',
			'field_5dcc2fc319814' => 'abv',
			'field_5dcc3ed5e9e6d' => 'updatedAt',
		];

		foreach ( $fillable as $key => $name ) {
			update_field( $key, $wbwcider->$name, $existing_cider_id);
		}
	}

	$current_page = $current_page;
	wp_remote_post( admin_url('admin-ajax.php?action=get_ciders_from_api'), [
		'blocking' =>false,
		'sslverify' =>false,
		'body' => [
			'current_page' => $current_page
		]
	]);	 
}
}}
