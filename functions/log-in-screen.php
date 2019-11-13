<?php 
//Style login page logo
function wbw_login_logo() { ?>
    <style type="text/css">
        .login h1 a {
            background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/img/wbw-diamond.svg') !important;
            background-size: contain !important;
            width: 300px !important;
            height: 300px !important
        }
        body {
            background: #ccc !important;
        }
        a:focus {
            box-shadow: none;
        }
        .login form {
            background: #b4a269ff !important;
            border: 2px solid #1d547e;
        }
        .login form::before {
            display: block;
            content: "Website Administration Area";
            margin-top: -20px;
            padding-bottom: 20px;
            font-size: 18px;
            text-align: center;
        }
        .login label {
            font-size: 18px;
            font-weight: bold;
            color: #222;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'wbw_login_logo' );
function wbw_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'wbw_login_logo_url' );
function wbw_login_logo_url_title() {
    return 'Wilmington Brew Works';
}
add_filter( 'login_headertitle', 'wbw_login_logo_url_title' );
/* End Style Login */


//ADMIN SECTION FAVICON ITEMS TO <head> SECTION
function wbwbeer_Favicon() {
	echo '<link rel="Icon" type="image/x-icon" href="//localhost/wbwbeer/wp-content/themes/superfluous-nomenclature/assets/img/favicon-32x32.png" />
	<link rel="Shortcut Icon" type="image/x-icon" href="//localhost/wbwbeer/wp-content/themes/superfluous-nomenclature/assets/img/favicon-32x32.png" />';
}
add_action( 'login_head', 'wbwbeer_Favicon' );
add_action( 'admin_head', 'wbwbeer_Favicon' );
