<?php

// Force WP to rewrite the rules
flush_rewrite_rules();

// We need to use the function get_stylesheet_directory_uri()
// cause the one with template_directory will search the folder from the parent template
add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style( 'wp_best_events_index_css', get_stylesheet_directory_uri() . '/assets/css/index.css' );
	wp_enqueue_script( 'wp_best_events_index_js', get_stylesheet_directory_uri() . '/assets/js/index.js' );
} );

require __DIR__ . '/inc/custom-post-type.php';
require __DIR__ . '/inc/taxonomy.php';
require __DIR__ . '/inc/meta-boxes.php';
require __DIR__ . '/inc/register-sidebar.php';

