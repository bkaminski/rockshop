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

//Widgetize Build
register_sidebar( array(
'name' => __( 'Footer Left Widget', 'the_rockshop' ),
'id' => 'rockshop-left-footer',
'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
'before_widget' => '<div>',
'after_widget'  => '</div>',
'before_title'  => '<h3 class="text-white">',
'after_title'   => '</h3>',
));
register_sidebar( array(
'name' => __( 'Footer Right Widget', 'the_rockshop' ),
'id' => 'rockshop-right-footer',
'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
'before_widget' => '<div>',
'after_widget'  => '</div>',
'before_title'  => '<h3 class="text-white">',
'after_title'   => '</h3>',
));

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
    return $output . '<a class="btn btn-info btn-lg text-uppercase mb-4" href="' . get_permalink() . '">More Info <i class="fas fa-angle-double-right fa-fw fa-lg"></i></a>';
}
add_filter('the_excerpt', 'excerpt_read_more_link');

// Register Custom Navigation Walker
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
register_nav_menus( array(
    'primary' => __( 'Rockshop Menu', 'the_rockshop' ),
) );
