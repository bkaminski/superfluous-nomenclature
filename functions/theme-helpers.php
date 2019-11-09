<?php
//GUTENBERG SUPPORT
add_theme_support( 'align-wide' );
add_theme_support( 'responsive-embeds' );
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
//REMOVE THE TYPE ATTRIBUTE FROM JAVASCRIPT FILES
add_action('wp_loaded', 'prefix_output_buffer_start');
function prefix_output_buffer_start() { 
	ob_start("prefix_output_callback"); 
}
add_action('shutdown', 'prefix_output_buffer_end');
function prefix_output_buffer_end() { 
	ob_end_flush(); 
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
//REMOVE JSON API
remove_action( 'wp_head', 'rest_output_link_wp_head');
remove_action( 'wp_head', 'wp_oembed_add_discovery_links');
remove_action( 'template_redirect', 'rest_output_link_header', 11);
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
//AUTO UPDATE PLUGINS
add_filter( 'auto_update_plugin', '__return_true' );

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
