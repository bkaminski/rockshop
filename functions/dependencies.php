<?php 

//LOAD SCRIPTS
function enqueue_rockshop_scripts() {
    wp_enqueue_script('Popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', false, null, true, null);
    wp_enqueue_script('Bootstrap-4.3.1', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array('jquery'), null, true, null);
    wp_enqueue_script('font-awesome', 'https://use.fontawesome.com/releases/v5.6.3/js/all.js', false, null, null, false);
    wp_enqueue_script('rockshop-scripts', get_template_directory_uri() . '/assets/js/rockshopScripts.js', array('jquery'), null, true, null);
}
add_action('wp_enqueue_scripts', 'enqueue_rockshop_scripts');

//LOAD CSS
function enqueue_rockshop_styles() {
    wp_enqueue_style('bootstrap-4.3.1', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css', array(), null);
    wp_enqueue_style('rockshop', get_template_directory_uri() . '/assets/styles/rockshopStyles.css', array(), filemtime(get_template_directory() . '/assets/styles/scss'), 'all' );
}
add_action('wp_enqueue_scripts', 'enqueue_rockshop_styles');
