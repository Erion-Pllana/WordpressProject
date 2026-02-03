<?php
/**
 * Theme functions and setup
 */

if ( ! function_exists( 'wp_project_setup' ) ) :
    function wp_project_setup() {
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

        register_nav_menus( array(
            'primary' => esc_html__( 'Primary Menu', 'wordpressproject' ),
        ) );
    }
endif;
add_action( 'after_setup_theme', 'wp_project_setup' );

function wp_project_enqueue_assets() {
    wp_enqueue_style( 'wp-project-main', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0' );
    wp_enqueue_script( 'wp-project-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'wp_project_enqueue_assets' );

function wp_project_widgets_init() {
    register_sidebar( array(
        'name' => esc_html__( 'Sidebar', 'wordpressproject' ),
        'id' => 'sidebar-1',
        'description' => esc_html__( 'Add widgets here.', 'wordpressproject' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ) );
}
add_action( 'widgets_init', 'wp_project_widgets_init' );

// Simple helper for excerpt length
function wp_project_excerpt_length( $length ) {
    return 24;
}
add_filter( 'excerpt_length', 'wp_project_excerpt_length', 999 );
