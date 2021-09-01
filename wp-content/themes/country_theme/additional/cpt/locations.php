<?php
$searchQuery;
/*==========================Location Post Creation =======================*/
function create_post_type_location() {
    register_post_type( 'location',
        array(
            'labels' => array(
                'name' => __( 'Locations' ),
                'singular_name' => __( 'Location' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'locations'),
        )
    );
}
function location_post_register() {
    $labels = array(
        'name' => _x('Locations', 'post type general name'),
        'singular_name' => _x('Location', 'post type singular name'),
        'add_new' => _x('Add New', 'Location'),
        'add_new_item' => __('Add New Location'),
        'edit_item' => __('Edit Location'),
        'new_item' => __('New Location'),
        'view_item' => __('View Location'),
        'search_items' => __('Search Banner'),
        'not_found' =>  __('Nothing found'),
        'not_found_in_trash' => __('Nothing found in Trash'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'show_ui' => true,
        'query_var' => false,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'locations', 'thumbnail'),
        'taxonomies' => array('post_tag')
    );
    register_post_type( 'locations' , $args );
    flush_rewrite_rules();
}
add_action('init', 'location_post_register');

add_action( 'init', 'create_locations_country_tax' );
function create_locations_country_tax() {
    register_taxonomy(
        'country',
        'locations',
        array(
            'label' => __( 'Country'),
            'rewrite' => array( 'slug' => 'snf-countries'),
            'hierarchical' => true,
            'show_admin_column' => true,
        )
    );
}
add_action( 'init', 'create_locations_facility_type' );
function create_locations_facility_type() {
    register_taxonomy(
        'facility_type',
        'locations',
        array(
            'label' => __( 'Facility Type'),
            'rewrite' => array( 'slug' => 'snf_facility_type'),
            'hierarchical' => true,
            'show_admin_column' => true,
        )
    );
}
add_action( 'init', 'create_locations_continent' );
function create_locations_continent() {
    register_taxonomy(
        'region',
        'locations',
        array(
            'label' => __( 'Region'),
            'rewrite' => array( 'slug' => 'snf_region'),
            'hierarchical' => true,
            'show_admin_column' => true,
        )
    );
}
/**==================================================================
 * Get Location query [without $post?]
===================================================================*/
function snf_locations_page_query( array $options = array()){
    global $searchOptions, $searchQuery, $post;
    $options = array_merge($searchOptions, $options);
    $args = array(
        'post_type' => 'locations',
        'nopaging' => false,
        'offset' => snf_get_query_offset(),
        'post_per_page' => 10,
        'post_status' => 'publish',
        'meta_key' => 'subsidiary',
        'orderby' => 'meta_value',
        'order' => "ASC",
    );
    $args["tax_query"] = array();
    $args['meta_query'] = array();
    if( !empty($options['zone']) ){
        $args["meta_query"][] = array(
            array(
                'key' => 'zone',
                'value' => $options['zone'],
                'compare' => '='
            )
        );
    }
    if( !empty($options['country']) ){
        $args["meta_query"][] = array(
            array(
                'key' => 'country',
                'value' => $options['country'],
                'compare' => '='
            )
        );
    }
    if( !empty($options['facility_type']) ){
        $args["meta_query"][] = array(
            array(
                'key' => 'facility_type',
                'value' => $options['facility_type'],
                'compare' => '='
            )
        );
    }
    $searchQuery = new WP_Query( $args );
    return $searchQuery;
}
function snf_get_paged_offset(){
    return get_query_var('paged') ? get_query_var('paged') : 1;
}
function snf_get_query_offset(){
    return (snf_get_paged_offset() - 1) * 10;
}
$searchOptions = array();
$country = array("Australia","Brasil","Belgium", "Canada","China","Columbia","Croatia","Czech Republic", "Egypt", "Emirates", "Finland","France", "Germany", "India","Korea",  "Hungary","Indonesia", "Italy", "Japan", "Kazakstan", "Mexico", "Netherlands", "Oman","Philippines","Portugal","Poland","Russia","Saudi Arabia", "Singapore","Slovakia","South Africa","Spain", "Sweden","Switzerland","Taiwan","Thailand","Turkey","United Kingdom","USA", );
$continent = array("Asia", "Americas",  "Europe", "Africa", "Australia", "Oceania");
$facilityType = array("Sales", "Production & Sales");
//echo var_dump( $searchOptions );
if( isset($_GET['locations']) ){
    $searchOptions['zone'] = $_GET['locations']['zone']? $_GET['locations']['zone']: null;
    $searchOptions['country'] = ($_GET['locations']['country'])? $_GET['locations']['country']: null;
    $searchOptions['facility_type'] = ($_GET['locations']['facility_type'])? $_GET['locations']['facility_type']: null;
}