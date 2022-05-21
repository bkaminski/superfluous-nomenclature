<?php

//HTML 5 SUPPORT
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
//HIDE ADMIN BAR FROM FRONT END
show_admin_bar(false);
//TITLE TAG SUPPORT
add_theme_support( 'title-tag' );
//ALLOW POSTS AND PAGES FEATURED IMAGE
add_theme_support('post-thumbnails');
//ADD RSS/ATOM SUPPORT
add_theme_support( 'automatic-feed-links' );
//ADD TAG SUPPORT TO PAGES
function tags_support_all() {
    register_taxonomy_for_object_type('post_tag', 'page');
}
//SIDEBAR REGISTER 
add_action( 'widgets_init', 'wbwbeer_register_sidebars' );
function wbwbeer_register_sidebars() {
    /* Register the 'primary' sidebar. */
    register_sidebar(
        array(
            'id'            => 'primary',
            'name'          => __( 'Primary Sidebar' ),
            'description'   => __( '' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
}
//WordPress Fluid Images Bootstrap 4.3.1
function bootstrap_fluid_images($html)
{
    $classes = 'img-fluid';
    if (preg_match('/<img.*? class="/', $html)) {
        $html = preg_replace('/(<img.*? class=".*?)(".*?\/>)/', '$1 ' . $classes . '$2', $html);
    } else {
        $html = preg_replace('/(<img.*?)(\/>)/', '$1 class="' . $classes . '"$2', $html);
    }
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}
add_filter('the_content', 'bootstrap_fluid_images', 10);
add_filter('post_thumbnail_html', 'bootstrap_fluid_images', 10);
//DISABLE EMOJI BLOAT
function disable_wp_emoji() {
//REMOVE ALL ACTIONS USING EMOJI
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
//REMOVE EDITOR EMOJIS
add_filter( 'tiny_mce_plugins', 'disable_emoji_tinymce' );
  
//REMOVE DNS PREFETCH
add_filter( 'emoji_svg_url', '__return_false' );
}
add_action( 'init', 'disable_wp_emoji' );
function disable_emoji_tinymce( $plugins ) {
if ( is_array( $plugins ) ) {
	return array_diff( $plugins, array( 'wpemoji' ) );
} else {
	return array();
}}

//MAKE MAIL COME FROM EMAIL ADDRESS RATHER THAN WORDPRESS
function wbwbeer_mail_name( $email ){
  return 'Wilmington Brew Works'; // new email name from sender.
}
add_filter( 'wp_mail_from_name', 'wbwbeer_mail_name' );
function wbwbeer_mail_from ($email ){
  return 'ben@wilmingtonbrewworks.com'; // new email address from sender.
}
add_filter( 'wp_mail_from', 'wbwbeer_mail_from' );

//REMOVE THE TYPE ATTRIBUTE FROM JAVASCRIPT FILES
add_action('wp_loaded', 'prefix_output_buffer_start');
function prefix_output_buffer_start() { 
	ob_start("prefix_output_callback"); 
}

function prefix_output_callback($buffer) {
	return preg_replace( "%[ ]type=[\'\"]text\/(javascript|css)[\'\"]%", '', $buffer );
}
//INCLUDE TAGS IN SEARCH QUERIES
function tags_support_query($wp_query)
{
    if ($wp_query->get('tag'))
        $wp_query->set('post_type', 'any');
}
//TAG HOOKS
add_action('init', 'tags_support_all');
add_action('pre_get_posts', 'tags_support_query');
// REMOVE WP VERSION PARAM FROM ENQUEUED SCRIPTS AND CSS
function vc_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
//BEGIN READ MORE BUTTON ON TAGS AND BLOG
function excerpt_read_more_link($output)
{
    global $post;
    return $output . '<a class="btn btn-lg btn-blue text-uppercase rounded-0 pr-4 pl-4" href="' . get_permalink() . '">Read More <i class="fas fa-angle-double-right fa-fw fa-lg"></i></a>';
}
add_filter('the_excerpt', 'excerpt_read_more_link');
//REMOVE COMMENTS FEED RSS
add_filter( 'feed_links_show_comments_feed', '__return_false' );

//REMOVE WP VERSION FROM CODE
function wbwBeer_remove_version() {
return '';
}
add_filter('the_generator', 'wbwBeer_remove_version');
//REMOVE YOAST SEO COMMENTS
if (defined('WPSEO_VERSION')) {
 add_action('wp_head',function() { ob_start(function($o) {
 return preg_replace('/^\n?<!--.*?[Y]oast.*?-->\n?$/mi','',$o);
 }); },~PHP_INT_MAX);
}

//DISABLE GUTENBERG CSS
add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );
function wps_deregister_styles() {
    wp_dequeue_style( 'wp-block-library' );
}

//begin pagination
function wbwbeer_pagination($pages = '', $range = 1)
{
    $showitems = ($range * 2) + 1;
    
    global $paged;
    if (empty($paged))
        $paged = 1;
    
    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }
    
    if (1 != $pages) {
        echo "<nav aria-label='Blog Navigation pagination'>";
        echo "<ul class='pagination justify-content-center'>";
        echo "<li class='page-item'>";
        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages)
            echo "<a class='page-link' aria-label='First Page' href='" . get_pagenum_link(1) . "'>
                          <i class='fas fa-angle-double-left fa-lg'></i>
                          <span class='sr-only'>go to first page</span>
                      </a>";
        echo "</li>";
        echo "<li class='page-item'>";
        if ($paged > 1 && $showitems < $pages)
            echo "<a class='page-link' href='" . get_pagenum_link($paged - 1) . "'>
                          <i class='fas fa-angle-left fa-lg'></i>
                          <span class='sr-only'>go to previous page</span>
                      </a>";
        echo "</li>";
        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                echo ($paged == $i) ? "<li class='page-link'>" . $i . "</li>" : "<a href='" . get_pagenum_link($i) . "' class='page-link' >" . $i . "</a>";
            }
        }
        if ($paged < $pages && $showitems < $pages)
            echo "<a class='page-link' aria-label='Next Page' href='" . get_pagenum_link($paged + 1) . "'>
                          <i class='fas fa-angle-right fa-lg'></i>
                          <span class='sr-only'>go to next page</span>
                        </a>";
        if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages)
            echo "<a class='page-link' aria-label='Last Page' href='" . get_pagenum_link($pages) . "'>
                          <i class='fas fa-angle-double-right fa-lg'></i>
                          <span class='sr-only'>go to last page</span>
                        </a>";
        global $wp_query;
        echo "</ul></nav>";
    }
}
//end pagination

// REMOVE ALL COMMENT OPTIONS
add_action( 'admin_menu', 'wbwbeer_remove_admin_menus' );
function wbwbeer_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
// Removes from post and pages
add_action('init', 'remove_comment_support', 100);

function remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
// Removes from admin bar
function wbwbeer_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'wbwbeer_admin_bar_render' );

//REMOVE COMMENTS FROM MEDIA
function filter_media_comment_status( $open, $post_id ) {
    $post = get_post( $post_id );
    if( $post->post_type == 'attachment' ) {
        return false;
    }
    return $open;
}
add_filter( 'comments_open', 'filter_media_comment_status', 10 , 2 );

//HIGHLIGHT SEARCH TERMS
function search_excerpt_highlight() {
    $excerpt = get_the_excerpt();
    $keys = implode('|', explode(' ', get_search_query()));
    $excerpt = preg_replace('/(' . $keys .')/iu', '<strong class="search-highlight">\0</strong>', $excerpt);

    echo '<p>' . $excerpt . '</p>';
    echo '<a href="' . get_permalink() . '" class="btn btn-lg btn-blue text-uppercase rounded-0 pr-4 pl-4" />Read More <i class="fas fa-angle-double-right fa-fw fa-lg"></i></a>';
}

function search_title_highlight() {
    $title = get_the_title();
    $keys = implode('|', explode(' ', get_search_query()));
    $title = preg_replace('/(' . $keys .')/iu', '<strong class="search-highlight">\0</strong>', $title);

    echo $title;
}


//REMOVE YOAST OG TAGS FROM EVENTS
add_action('wp_head', 'remove_all_wpseo_og', 1);
function remove_all_wpseo_og() {
	if ( eme_is_events_page() ) {
		remove_action( 'wpseo_head', array( $GLOBALS['wpseo_og'], 'opengraph' ), 30 );
	}
}

add_action('wp_head', 'remove_all_wpseo_twitter', 1);
function remove_all_wpseo_twitter() {
	if ( eme_is_events_page() ) {
		remove_action( 'wpseo_head' , array( 'WPSEO_Twitter' , 'get_instance' ) , 40 );
	}
}

//WOOCOMMERCE SUPPORT
function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

/**
 * Exclude products from a particular category on the shop page
 */
function custom_pre_get_posts_query( $q ) {

    $tax_query = (array) $q->get( 'tax_query' );

    $tax_query[] = array(
           'taxonomy' => 'product_cat',
           'field' => 'slug',
           'terms' => array( 'merchandise', 'clothing' ), // Don't display products in the clothing category on the shop page.
           'operator' => 'NOT IN'
    );


    $q->set( 'tax_query', $tax_query );

}
add_action( 'woocommerce_product_query', 'custom_pre_get_posts_query' );  

