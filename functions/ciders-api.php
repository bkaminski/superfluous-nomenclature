<?php

function clear_wbwciders_from_db() {
  
  global $wpdb;
  $wpdb->query("DELETE FROM wp_posts WHERE post_type='urban-orchard-works'");
  $wpdb->query("DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts);");
  $wpdb->query("DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)");
}
clear_wbwciders_from_db();

if ( ! wp_next_scheduled( 'update_ciders_list' ) ) {
   wp_schedule_event( time(), 'hourly', 'update_ciders_list' );
 }
add_action( 'update_ciders_list', 'get_ciders_from_api' );
add_action( 'wp_ajax_nopriv_get_ciders_from_api', 'get_ciders_from_api' );
add_action( 'wp_ajax_get_ciders_from_api', 'get_ciders_from_api' );

function get_ciders_from_api() {
  $wbwciders = [];
  // Should return an array of objects
  $results = wp_remote_retrieve_body( wp_remote_get('https://wbwbeer.app/api/v1/beers?tier=!soda&tier=!tier1&tier=!tier2&tier=!tier3&tier=!cask&tier=!can') );
  // turn it into a PHP array from JSON string
  $results = json_decode( $results );

	if ( ! is_array( $results ) || empty( $results) ) {
		return false;
	}

	$wbwciders[] = $results;

	foreach ( $wbwciders[0] as $wbwcider ) {

		$cider_slug = sanitize_title( $wbwcider->name . '-' . $wbwcider->id );

		$existing_cider = get_page_by_path( $cider_slug, 'OBJECT', 'urban-orchard-works' );

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
    }
  }

}
