<?php
function create_post_type_products(){
    register_post_type('products',
        array(
            'labels' => array(
                'name' => __('Products'),
                'singular_name' => __('Product')
            ),
            'public' => true,
            'has_archive' => true,
            'query_var' => 'false',
            'rewrite' => array('slug' => 'products'),
        )
    );
}
function product_post_register(){
    $labels = array(
        'name' => _x('Products', 'post type general name'),
        'singular_name' => _x('Product', 'post type singular name'),
        'add_new' => _x('Add New Product', ''),
        'add_new_item' => __('Add New Product'),
        'edit_item' => __('Edit Product'),
        'new_item' => __('New Product'),
        'view_item' => __('View Product'),
        'search_items' => __('Search Product'),
        'not_found' => __('Nothing found'),
        'not_found_in_trash' => __('Nothing found in Trash'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => false,
        'exclude_from_search' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'can_export' => true,
        'show_in_nav_menus' => true,
        'capability_type' => 'page',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'thumbnail', 'editor', 'excerpt'),
        'taxonomies' => array('post_tag', 'products-markets'),
        'menu_icon' => 'dashicons-clipboard',
    );
    register_post_type('products', $args);
    flush_rewrite_rules();
}
add_action('init', 'product_post_register');

add_action('init', 'create_product_category_tax');
function create_product_category_tax(){
    register_taxonomy(
        'products-category',
        'products',
        array(
            'label' => __('Category for Products'),
            'rewrite' => array('slug' => 'products-category'),
            'hierarchical' => true,
            'show_admin_column' => true,
        )
    );
}
function create_applications_taxonomies() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x( 'Applications', 'taxonomy general name' ),
        'singular_name'     => _x( 'Application', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Application' ),
        'all_items'         => __( 'All Application' ),
        'parent_item'       => __( 'Parent Application' ),
        'parent_item_colon' => __( 'Parent Application:' ),
        'edit_item'         => __( 'Edit Application' ),
        'update_item'       => __( 'Update Application' ),
        'add_new_item'      => __( 'Add New Application' ),
        'new_item_name'     => __( 'New Application Name' ),
        'menu_name'         => __( 'Applications' ),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
    );
    register_taxonomy( 'product-applications', array( 'page','products' ), $args );
}
add_action( 'init', 'create_applications_taxonomies', 0 );