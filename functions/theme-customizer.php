<?
function wbwbeer_theme_customize_register( $wp_customize ) {
 $wp_customize->remove_control('header_image');
 // removing panels now throws PHP error
 //$wp_customize->remove_panel('widgets');
 //$wp_customize->remove_panel('nav_menus');
 $wp_customize->remove_section('colors');
 $wp_customize->remove_section('background_image');
 $wp_customize->remove_section('static_front_page');
 $wp_customize->remove_section('title_tagline');
 $wp_customize->remove_section('custom_css');
}
add_action( 'customize_register', 'wbwbeer_theme_customize_register', 20 );

function wbwbeerCarousel_image_area( $wp_customize ) {
    $wp_customize->add_section('home_carousel_images', array(
        'title' => 'Home Carousel Image Uploader',
        'description' => 'Update or Edit Images in Slideshow',
        'priority' => 30,
    ));
    $wp_customize->add_setting( 'wbwbeer_img_upload_1' );
 	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wbwbeer_img_upload_1', array(
        'label'    => __( 'Upload first image:', 'superfluous-nomenclature' ),
        'section' => 'home_carousel_images',
        'settings' => 'wbwbeer_img_upload_1',
        'description' => 'Upload your first carousel image here.'
    )));
    $wp_customize->add_setting( 'wbwbeer_Image_Alt_1', array(
        'default' => 'Enter descriptive text for image here',
        'sanitize_callback' => 'sanitize_alt_one_text',
    )); 
    function sanitize_alt_one_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
	}
	$wp_customize->add_control( 'wbwbeer_Image_Alt_1', array(
        'type' => 'text',
        'label'    => __( 'Image Alt Text Here:', 'superfluous-nomenclature' ),
        'section' => 'home_carousel_images'
    ));


    $wp_customize->add_setting( 'wbwbeer_img_upload_2' );
 	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wbwbeer_img_upload_2', array(
        'label'    => __( 'Upload second image:', 'superfluous-nomenclature' ),
        'section' => 'home_carousel_images',
        'settings' => 'wbwbeer_img_upload_2',
        'description' => 'Upload your second carousel image here.'
    )));
    $wp_customize->add_setting( 'wbwbeer_Image_Alt_2', array(
        'default' => 'Enter descriptive text for image here',
        'sanitize_callback' => 'sanitize_alt_two_text',
    )); 
    function sanitize_alt_two_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
	}
	$wp_customize->add_control( 'wbwbeer_Image_Alt_2', array(
        'type' => 'text',
        'label'    => __( 'Image Alt Text Here:', 'superfluous-nomenclature' ),
        'section' => 'home_carousel_images'
    ));

    
	$wp_customize->add_setting( 'wbwbeer_img_upload_3' );
 	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wbwbeer_img_upload_3', array(
        'label'    => __( 'Upload third image:', 'superfluous-nomenclature' ),
        'section' => 'home_carousel_images',
        'settings' => 'wbwbeer_img_upload_3',
        'description' => 'Upload your third carousel image here.'
    )));
    $wp_customize->add_setting( 'wbwbeer_Image_Alt_3', array(
        'default' => 'Enter descriptive text for image here',
        'sanitize_callback' => 'sanitize_alt_three_text',
    )); 
    function sanitize_alt_three_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
	}
	$wp_customize->add_control( 'wbwbeer_Image_Alt_3', array(
        'type' => 'text',
        'label'    => __( 'Image Alt Text Here:', 'superfluous-nomenclature' ),
        'section' => 'home_carousel_images'
    ));
 	
}
add_action( 'customize_register', 'wbwbeerCarousel_image_area' );
