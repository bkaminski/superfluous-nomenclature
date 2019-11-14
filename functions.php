<?php 
//INIT DEPENDENCIES
require_once(get_template_directory(). '/functions/theme-dependencies.php'); 
//INIT THEME HELPERS
require_once(get_template_directory(). '/functions/theme-helpers.php'); 
//BOOTSTRAP NAV WALKER
require_once(get_template_directory(). '/functions/class-wp-bootstrap-navwalker.php');
//THEME CUSTOMIZER STUFF
require_once(get_template_directory(). '/functions/theme-customizer.php');
//THEME WIDGETS
require_once(get_template_directory(). '/functions/widgets.php');
//CUSTOM POST TYPES
require_once(get_template_directory(). '/functions/custom-post-types.php');
//LOG IN SCREEN CUSTOMIZATION
require_once(get_template_directory(). '/functions/log-in-screen.php');
//GET WBW API
require_once(get_template_directory(). '/functions/beers-api.php');
//GET URBAN CIDERS API
require_once(get_template_directory(). '/functions/ciders-api.php');


//flush_rewrite_rules( false );
