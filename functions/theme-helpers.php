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

//AUTO UPDATE PLUGINS
add_filter( 'auto_update_plugin', '__return_true' );

//ADD TAG SUPPORT TO PAGES
function tags_support_all() {
    register_taxonomy_for_object_type('post_tag', 'page');
}

//Widgetize Build
register_sidebar( array(
'name' => __( 'Footer Right Widget', 'the_rockshop' ),
'id' => 'rockshop-right-footer',
'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'the_rockshop' ),
'before_widget' => '<div>',
'after_widget'  => '</div>',
'before_title'  => '<h3 class="text-white">',
'after_title'   => '</h3>',
));
register_sidebar( array(
'name' => __( 'Footer Left Widget', 'the_rockshop' ),
'id' => 'rockshop-left-footer',
'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'the_rockshop' ),
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

//begin pagination
function rockshop_pagination($pages = '', $range = 1)
{
    $showitems = ($range * 1) + 1;
    
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

//Change WP Emails and email address away from "WordPress" as sender
function rockshop_mail_name( $email ){
  return 'The Rockshop'; // new email name from sender.
}
add_filter( 'wp_mail_from_name', 'rockshop_mail_name' );
function rockshop_mail_from ($email ){
  return 'info@bnbrockshop.com'; // new email address from sender.
}
add_filter( 'wp_mail_from', 'rockshop_mail_from' );

// ensure all tags are included in queries
function tags_support_query($wp_query)
{
    if ($wp_query->get('tag'))
        $wp_query->set('post_type', 'any');
}

add_action( 'pre_get_posts', 'se338152_future_post_tag_and_search' );
function se338152_future_post_tag_and_search( $query )
{
    // apply changes only for search and tag archive
    if ( ! ( $query->is_main_query() && (is_tag() || is_search()) ) )
        return;

    $status = $query->get('post_status');
    if ( empty($status) )
        $status = ['publish'];
    if ( !is_array($status) )
        $status = (array)$status;
    $status[] = 'future';

    $query->set('post_status', $status);
}

function show_future_posts($posts)
{
   global $wp_query, $wpdb;
   if(is_single() && $wp_query->post_count == 0)
   {
      $posts = $wpdb->get_results($wp_query->request);
   }
   return $posts;
}
add_filter('the_posts', 'show_future_posts');

//ENAMBEL WEBP SUPPORT
function webp_upload_mimes( $existing_mimes ) {
  $existing_mimes['webp'] = 'image/webp';
  return $existing_mimes;
}
add_filter( 'mime_types', 'webp_upload_mimes' );
