<?php
/*==========================News CPT Post Creation =======================*/
add_action('init', 'news_management');
function news_management(){
    $news_args = array(
        'public' => true,
        'query_ver' => 'news',
        'rewrite' => array(
            'slug' => 'snf-news',
            'with_front' => false
        ),
        'supports' => array(
            'title',
            'editor',
            'publicize' .
            'tag',
            'thumbnail',
            'custom-fields',
            'market',
            'page-attributes',
            'excerpt',
            'categories',
            'revisions',
        ),
        'labels' => array(
            'name' => 'News',
            'singular_name' => 'News',
            'add_new' => 'Add News Item',
            'add_new_item' => 'Add News Item',
            'edit_item' => 'Edit News Item',
            'new_item' => 'New News Item',
            'view_item' => 'View News Item',
            'search_items' => 'Search News Item',
            'not_found' => 'No News Item found',
            'not_found_in_trash' => 'No News Item Found in Trash'
        ),
        'menu_position' => 5,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
        'menu_icon' => 'dashicons-media-interactive',
        'taxonomies' => array('post_tag', 'market', 'category'),
    );
    register_post_type('news', $news_args);
}