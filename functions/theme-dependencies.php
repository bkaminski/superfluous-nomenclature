<?php 
//LOAD SCRIPTS
function enqueue_wbwbeer_scripts() {
    wp_enqueue_script('Ajax-Popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', false, null, true, null);
    wp_enqueue_script('Bootstrap-4.1.3', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array('jquery'), null, true, null);
    wp_enqueue_script('font-awesome', 'https://use.fontawesome.com/releases/v5.6.3/js/all.js', false, null, null, false);
    wp_enqueue_script('integral-scripts', get_template_directory_uri() . '/assets/js/wbwScripts.min.js', array('jquery'), null, true, null);
}
add_action('wp_enqueue_scripts', 'enqueue_wbwbeer_scripts');
//LOAD CSS
function enqueue_wbwbeer_styles() {
    wp_enqueue_style('bootstrap-4.3.1', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css', array(), null);
    wp_enqueue_style('integral-styles', get_template_directory_uri() . '/assets/styles/wbwStyles.min.css');
}
add_action('wp_enqueue_scripts', 'enqueue_wbwbeer_styles');
