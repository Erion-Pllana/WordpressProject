<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="site-header">
    <div class="wrap">
        <div class="site-branding">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="site-title">EcoSphere</a>
            <p class="site-description"><?php bloginfo('description'); ?></p>
        </div>

        <nav class="primary-navigation" role="navigation" aria-label="Primary menu">
            <?php if ( has_nav_menu('primary') ) : ?>
                <?php wp_nav_menu(array('theme_location'=>'primary','container'=>false,'menu_class'=>'menu','depth'=>2)); ?>
            <?php else : ?>
                <?php
                $about = get_page_by_path('about');
                $blog = get_page_by_path('blog');
                $resources = get_page_by_path('resources');
                $contact = get_page_by_path('contact');
                $ecoguide_archive = function_exists('get_post_type_archive_link') ? get_post_type_archive_link('ecoguide') : home_url('/eco-guides/');
                ?>
                <ul class="menu header-links">
                    <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                    <li><a href="<?php echo esc_url( $about ? get_permalink($about->ID) : home_url('/about/') ); ?>">About</a></li>
                    <li><a href="<?php echo esc_url( $blog ? get_permalink($blog->ID) : home_url('/blog/') ); ?>">Blog</a></li>
                    <li><a href="<?php echo esc_url( $ecoguide_archive ); ?>">Eco Guides</a></li>
                    <li><a href="<?php echo esc_url( $resources ? get_permalink($resources->ID) : home_url('/resources/') ); ?>">Resources</a></li>
                    <li><a href="<?php echo esc_url( $contact ? get_permalink($contact->ID) : home_url('/contact/') ); ?>">Contact</a></li>
                </ul>
            <?php endif; ?>

            <button id="mobile-menu-toggle" aria-expanded="false">Menu</button>
        </nav>

        <div class="header-search">
            <?php get_search_form(); ?>
        </div>
    </div>
</header>

<main id="content" class="site-content">
