<?php 

//if ( !wp_next_scheduled('update_cider_list') ) {
//	wp_schedule_event(time(), 'hourly', 'get_ciders_from_api');
//}

add_action('wp_ajax_nopriv_get_ciders_from_api', 'get_ciders_from_api');
add_action('wp_ajax_get_ciders_from_api', 'get_ciders_from_api');

function get_ciders_from_api() {

	$current_page = ( ! empty($_POST['current_page']) ) ? $_POST['current_page'] : 1;
	$uowciders = [];

	$results = wp_remote_retrieve_body(wp_remote_get('https://wbwbeer.app/api/v1/beers?tier=cider'));

	$results = json_decode($results);

	$uowciders[] = $results;

	foreach ( $uowciders[0] as $uowcider ) {

		$cider_slug = $uowcider->name;

		//$existing_cider = get_page_by_path($cider_slug, 'OBJECT', 'urban-orchard-works');

		if ($existing_cider === null ) {

		$inserted_uowcider = wp_insert_post([
			'post_name' => $cider_slug,
			'post_title' => $cider_slug,
			'post_type' => 'urban-orchard-works',
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
			'field_5dcc3ed5e9e6d' => 'updatedSince',
		];

		foreach ( $fillable as $key => $name ) {
			update_field( $key, $uowcider->$name, $inserted_uowcider);
		}
	} //else {
	//	$existing_cider = $existing_cider;
	//	$existing_cider_updatedSince = get_field('updatedSince', $existing_cider );

	//	if ( $uowcider->updatedSince >= $existing_cider_updatedSince ) {
	//		$fillable = [
	//		'field_5dc862b619530' => 'name',
	//		'field_5dc862ec19531' => 'style',
	//		'field_5dc863269b298' => 'description',
	//		'field_5dc8633738fad' => 'abv',
	//		'field_5dcc3ed5e9e6d' => 'updatedSince',
	//	];

	//	foreach ( $fillable as $key => $name ) {
	//		updatedSince( $key, $uowcider->$name, $existing_cider);
	//	}
	//}
//}

}
}

