<?php

// Removed default jQuery
if (!is_admin()) {
    add_action("wp_enqueue_scripts", function(){
        wp_deregister_script('jquery');
    }, 11);
}

/* REGISTER NAV MENUS */
register_nav_menus(array(
    "primary" => __('Primary Menu'),
    "footer" => __('Footer Menu'),
));

/* THEMES SUPPORT */
add_theme_support('menus');
add_theme_support('post-thumbnails');

add_action( 'init', function(){

    // Themas
    register_post_type('thema',
        array(
            'labels' => array(
                'name' => __('Témata'),
                'singular_name' => __('Téma'),
                'add_new' => __('Přidat článek'),
                'all_items' => __('Seznam článků'),
            ),
            'show_in_nav_menus' => true,
            'publicly_queryable' => true,
            'show_in_menu' => true,
            'show_ui' => true,
            'query_var' => true,
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'reference'),
            'supports' => array('title', 'editor', 'thumbnail')
        )
    );


    // Themas - type
    register_taxonomy(
        'type',
        'thema',
        array(
            'show_in_nav_menus' => true,
            'label' => __( 'Témata - kategorie' ),
            'rewrite' => array( 'slug' => 'sluzba' ),
            'hierarchical' => true,
            'show_in_menu' => true,
            'public' => true,
            'query_var' => true,
            'show_ui'           => true,
            'show_admin_column' => true,
        )
    );

    // Banners
    register_post_type('banner', array(
        "label" => "Banner",
        "public" => true,
        "excluded_from_search" => false,
        "has_archive" => true,
        "supports" => array('title', 'editor', 'thumbnail', 'custom-fields')
    ));



});
