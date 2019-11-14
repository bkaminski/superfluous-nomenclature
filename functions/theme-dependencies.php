<?php 
//LOAD SCRIPTS
function enqueue_wbwbeer_scripts() {
    wp_enqueue_script('Ajax-Popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', false, null, true, null);
    wp_enqueue_script('Bootstrap-4.1.3', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array('jquery'), null, true, null);
    wp_enqueue_script('font-awesome', 'https://kit.fontawesome.com/9a1bb2c83f.js', false, null, null, false);
    wp_enqueue_script('integral-scripts', get_template_directory_uri() . '/assets/js/wbwScripts.min.js', array('jquery'), null, true, null);
    wp_enqueue_script('google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat|Roboto&display=swap', false);
}
add_action('wp_enqueue_scripts', 'enqueue_wbwbeer_scripts');
//LOAD CSS
function enqueue_wbwbeer_styles() {
    wp_enqueue_style('bootstrap-4.3.1', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css', array(), null);
    wp_enqueue_style('integral-styles', get_template_directory_uri() . '/assets/styles/wbwStyles.min.css');
    wp_enqueue_style('animate', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css', array(), null);
}
add_action('wp_enqueue_scripts', 'enqueue_wbwbeer_styles');

// Register Custom Navigation Walker
require_once get_template_directory() . '/functions/class-wp-bootstrap-navwalker.php';
register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'superfluous-nomenclature' ),
));
// Nav Walker
