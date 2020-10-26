<?php 
//INIT DEPENDENCIES
require_once(get_template_directory(). '/functions/theme-dependencies.php'); 
//INIT THEME HELPERS
require_once(get_template_directory(). '/functions/theme-helpers.php'); 
//BOOTSTRAP NAV WALKER
require_once(get_template_directory(). '/functions/class-wp-bootstrap-navwalker.php');
//THEME WIDGETS
require_once(get_template_directory(). '/functions/widgets.php');
//CUSTOM POST TYPES
require_once(get_template_directory(). '/functions/custom-post-types.php');
//LOG IN SCREEN CUSTOMIZATION
require_once(get_template_directory(). '/functions/log-in-screen.php');
//GET WOOCOMMERCE HOOKS 
require_once(get_template_directory(). '/functions/woocommerce-helpers.php');
//INCLUDE ACF IN SEARCH RESULTS
require_once(get_template_directory(). '/functions/acf-search.php');


//flush_rewrite_rules( false );
