<?php

function clear_wbwbeers_from_db() {
  
  global $wpdb;
  $wpdb->query("DELETE FROM wp_posts WHERE post_type='wbwbeers'");
  $wpdb->query("DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts);");
  $wpdb->query("DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)");
}
clear_wbwbeers_from_db();

if ( ! wp_next_scheduled( 'update_beers_list' ) ) {
   wp_schedule_event( time(), 'hourly', 'update_beers_list' );
 }
add_action( 'update_beers_list', 'get_beers_from_api' );
add_action( 'wp_ajax_nopriv_get_beers_from_api', 'get_beers_from_api' );
add_action( 'wp_ajax_get_beers_from_api', 'get_beers_from_api' );

function get_beers_from_api() {
  $wbwbeers = [];
  // Should return an array of objects
  $results = wp_remote_retrieve_body( wp_remote_get('https://wbwbeer.app/api/v1/beers?tier=!cider&tier=!soda&tier=!cans') );
  // turn it into a PHP array from JSON string
  $results = json_decode( $results );    
  
  // Either the API is down or something else spooky happened. Just be done.
  if( ! is_array( $results ) || empty( $results ) ){
    return false;
  }
  $wbwbeers[] = $results;
  foreach( $wbwbeers[0] as $wbwbeer ){
    
    $wbwbeer_slug = slugify( $wbwbeer->name . '-' . $wbwbeer->id );     
    $existing_wbwbeer = get_page_by_path( $wbwbeer_slug, 'OBJECT', 'wbwbeers' );
    if( $existing_wbwbeer === null  ){
      
      $inserted_wbwbeer = wp_insert_post( [
        'post_name' => $wbwbeer_slug,
        'post_title' => $wbwbeer_slug,
        'post_type' => 'wbwbeers',
        'post_status' => 'publish'
      ] );
      if( is_wp_error( $inserted_wbwbeer ) || $inserted_wbwbeer === 0 ) {
        // die('Could not insert beer: ' . $wbwbeer_slug);
        // error_log( 'Could not insert beer: ' . $wbwbeer_slug );
        continue;
      }
      // add meta fields
      $fillable = [
			'field_5dc862b619530' => 'name',
			'field_5dc862ec19531' => 'style',
			'field_5dc863269b298' => 'description',
			'field_5dc8633738fad' => 'abv',
			'field_5debe196fece1' => 'updatedAt',
		];
      foreach( $fillable as $key => $name ) {
        update_field( $key, $wbwbeer->$name, $inserted_wbwbeer );
      }
      
    } else {
      
      $existing_wbwbeer_id = $existing_wbwbeer->id;
      $exisiting_wbwbeer_timestamp = get_field('updatedAt', $existing_wbwbeer_id);
      if( $wbwbeer->updatedAt >= $exisiting_wbwbeer_timestamp ){
        $fillable = [
			'field_5dc862b619530' => 'name',
			'field_5dc862ec19531' => 'style',
			'field_5dc863269b298' => 'description',
			'field_5dc8633738fad' => 'abv',
			'field_5debe196fece1' => 'updatedAt',
		];
        foreach( $fillable as $key => $name ){
          update_field( $name, $wbwbeer->$name, $existing_wbwbeer_id);
        }
      }
    }
  }

}

function slugify($text){
  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);
  // trim
  $text = trim($text, '-');
  // remove duplicate -
  $text = preg_replace('~-+~', '-', $text);
  // lowercase
  $text = strtolower($text);
  if (empty($text)) {
    return 'n-a';
  }
  return $text;
}
