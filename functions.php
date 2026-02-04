<?php
// Theme setup
function ecosphere_setup() {
    load_theme_textdomain('ecosphere', get_template_directory() . '/languages');
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form','comment-form','comment-list','gallery','caption'));
    add_theme_support('post-formats', array('aside','gallery','link','image','quote','status','video','audio'));
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'ecosphere'),
        'footer'  => __('Footer Menu', 'ecosphere'),
    ));
}
add_action('after_setup_theme', 'ecosphere_setup');

// Enqueue styles and scripts
function ecosphere_enqueue_assets() {
    wp_enqueue_style('ecosphere-main', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0');
    wp_enqueue_script('ecosphere-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'ecosphere_enqueue_assets');

// Register widget areas
function ecosphere_widgets_init() {
    register_sidebar(array(
        'name' => __('Primary Sidebar', 'ecosphere'),
        'id' => 'sidebar-1',
        'description' => __('Main sidebar that appears on blog and archive pages.', 'ecosphere'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'ecosphere_widgets_init');

// Register Custom Post Type: Eco Guides
function ecosphere_register_ecoguide_cpt() {
    $labels = array(
        'name' => 'Eco Guides',
        'singular_name' => 'Eco Guide',
        'menu_name' => 'Eco Guides',
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'eco-guides'),
        'supports' => array('title','editor','thumbnail','excerpt','author','comments'),
        'show_in_rest' => true,
        'taxonomies' => array('post_tag'),
    );
    register_post_type('ecoguide', $args);
}
add_action('init', 'ecosphere_register_ecoguide_cpt');

// Register taxonomy: Topics
function ecosphere_register_topic_taxonomy() {
    $labels = array(
        'name' => 'Topics',
        'singular_name' => 'Topic',
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'topic'),
        'show_in_rest' => true,
    );
    register_taxonomy('topic', array('ecoguide'), $args);
}
add_action('init', 'ecosphere_register_topic_taxonomy');

// Custom excerpt length
function ecosphere_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'ecosphere_excerpt_length');

// Fallback menu generator (used when no menu is assigned)
function ecosphere_fallback_menu() {
    echo '<ul class="menu">';
    $args = array(
        'title_li' => '',
        'depth' => 2,
        'post_type' => 'page'
    );
    wp_list_pages($args);
    echo '</ul>';
}

// Create default pages (About, Blog, Resources, Contact) on theme activation
function ecosphere_create_default_pages() {
    $pages = array(
        'about' => array('title' => 'About', 'content' => "<p>Welcome to EcoSphere — we share guides, news and resources about sustainability and nature.</p>", 'template' => 'page-about.php'),
        'blog' => array('title' => 'Blog', 'content' => "<p>Our blog features articles, opinion pieces and practical tips to live more sustainably.</p>", 'template' => 'page-blog.php'),
        'resources' => array('title' => 'Resources', 'content' => "<p>Curated resources, downloads and partner links to help your sustainability journey.</p>", 'template' => 'page-resources.php'),
        'contact' => array('title' => 'Contact', 'content' => "<p>Get in touch with EcoSphere for partnerships, questions and support.</p>", 'template' => 'page-contact.php'),
    );

    foreach ($pages as $slug => $data) {
        $existing = get_page_by_path($slug);
        if (!$existing) {
            $post_id = wp_insert_post(array(
                'post_title' => $data['title'],
                'post_name' => $slug,
                'post_content' => $data['content'],
                'post_status' => 'publish',
                'post_type' => 'page',
            ));
            if (!is_wp_error($post_id) && !empty($data['template'])) {
                update_post_meta($post_id, '_wp_page_template', $data['template']);
            }
        }
    }
}

function ecosphere_after_theme_activate() {
    ecosphere_create_default_pages();
    ecosphere_create_default_menu();
    // Ensure rewrite rules are flushed so CPT archives and pretty links work
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'ecosphere_after_theme_activate');

// Create default primary menu with links
function ecosphere_create_default_menu() {
    // Check if menu already exists
    if (wp_get_nav_menu_object('Main Menu')) {
        return;
    }

    // Create menu
    $menu_id = wp_create_nav_menu('Main Menu');
    if (is_wp_error($menu_id)) {
        return;
    }

    // Get page IDs
    $about = get_page_by_path('about');
    $blog = get_page_by_path('blog');
    $resources = get_page_by_path('resources');
    $contact = get_page_by_path('contact');

    // Add menu items
    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' => 'Home',
        'menu-item-url' => home_url('/'),
        'menu-item-status' => 'publish',
        'menu-item-type' => 'custom',
    ));

    if ($about) {
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'About',
            'menu-item-object-id' => $about->ID,
            'menu-item-object' => 'page',
            'menu-item-type' => 'post_type',
            'menu-item-status' => 'publish',
        ));
    }

    if ($blog) {
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'Blog',
            'menu-item-object-id' => $blog->ID,
            'menu-item-object' => 'page',
            'menu-item-type' => 'post_type',
            'menu-item-status' => 'publish',
        ));
    }

    // Add Eco Guides archive
    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' => 'Eco Guides',
        'menu-item-url' => get_post_type_archive_link('ecoguide'),
        'menu-item-status' => 'publish',
        'menu-item-type' => 'custom',
    ));

    if ($resources) {
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'Resources',
            'menu-item-object-id' => $resources->ID,
            'menu-item-object' => 'page',
            'menu-item-type' => 'post_type',
            'menu-item-status' => 'publish',
        ));
    }

    if ($contact) {
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'Contact',
            'menu-item-object-id' => $contact->ID,
            'menu-item-object' => 'page',
            'menu-item-type' => 'post_type',
            'menu-item-status' => 'publish',
        ));
    }

    // Assign menu to primary location
    $locations = get_theme_mod('nav_menu_locations');
    if (!isset($locations['primary'])) {
        $locations['primary'] = $menu_id;
        set_theme_mod('nav_menu_locations', $locations);
    }
}

