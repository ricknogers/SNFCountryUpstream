<?php
/**
 * SNF  functions and definitions
 *
 * @package SNF Subsidiary
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
    $content_width = 1140; /* pixels */
}
if ( ! function_exists( 'snf_subsidiary_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function snf_subsidiary_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Childers YMCA, use a find and replace
         * to change 'snf_subsidiary' to the name of your theme in all the template files
         */
        load_theme_textdomain( 'snf_subsidiary', get_template_directory() . '/languages' );
        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );
        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support( 'post-thumbnails' );
        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
                'snf_subsidiary_footer_menu' => __( 'Footer Menu'),
            )
        );
        // Setup the WordPress core custom background feature.
        // Enable support for HTML5 markup.
        add_theme_support( 'html5', array(
            'comment-list',
            'search-form',
            'comment-form',
            'gallery',
            'caption',
        ) );
        add_theme_support( 'post-thumbnails' );
    }
endif; // snf_subsidiary_setup
add_action( 'after_setup_theme', 'snf_subsidiary_setup' );
/**
 * Enqueue styles.
 */
function snf_subsidiary_add_styles() {
    wp_enqueue_style( 'snf_subsidiary-style', get_stylesheet_uri() );
    wp_enqueue_style( 'snf_subsidiary-header-style',  get_template_directory_uri() . '/css/header.css');
    wp_enqueue_style('boot-css', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css');
    wp_enqueue_style( 'front-page-style-css', get_template_directory_uri() . '/css/front-page.css' );
    wp_enqueue_style( 'Flag Icons', 'https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css' );
    wp_enqueue_style( 'font-awesome', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css','screen' );
    wp_enqueue_style( 'snf_products-style', get_template_directory_uri() . '/css/products.css');
    wp_enqueue_style('snf-market-slider-css', get_template_directory_uri() . "/css/markets.css");
    wp_enqueue_style('snf-market-page-css', get_template_directory_uri() . "/css/market-page.css");
    wp_enqueue_style('snf-gf-override-page-css', get_template_directory_uri() . "/css/gravity-form-override.css");
    wp_enqueue_style('snf-notification-popup-css', get_template_directory_uri() . "/css/notification-popup.css");
    wp_enqueue_style('snf-footer-css', get_template_directory_uri() . "/css/footer.css");
    wp_enqueue_style('snf-oops-css', get_template_directory_uri() . "/css/oops.css");
    wp_enqueue_style('snf-search-results-css', get_template_directory_uri() . "/css/search-results.css");
}
add_action( 'wp_enqueue_scripts', 'snf_subsidiary_add_styles' );
/**
 * Enqueue scripts
 */
function snf_subsidiary_add_scripts() {
    global $wp_scripts;
    wp_register_script( 'html5_shiv', 'https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js', '', '', false );
    wp_register_script( 'respond_js', 'https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js', '', '', false );
    $wp_scripts->add_data( 'html5_shiv', 'conditional', 'lt IE 9' );
    $wp_scripts->add_data( 'respond_js', 'conditional', 'lt IE 9' );
    wp_enqueue_script( 'snf_subsidiary-app-defer', get_template_directory_uri() . '/js/app.js', array('jquery'), 'custom', true );
    wp_enqueue_script('snf-markets-defer', get_template_directory_uri() . '/js/markets.js', array('jquery'), 'custom', true);
    wp_enqueue_script('snf-footer-defer', get_template_directory_uri() . '/js/footer.js', array('jquery'), 'custom', true );
    wp_enqueue_script('snf-news-scripts-defer', get_template_directory_uri() . '/js/news-scripts.js', array('jquery'), 'custom', true);
    wp_enqueue_script('snf-contact-form-slide-out-js', get_template_directory_uri() . '/js/contact-form-slide-out.js', array('jquery'), 'custom', true);
    // Bootstrap JS CDN
    wp_enqueue_script( 'slim-jquery-defer','https://code.jquery.com/jquery-3.3.1.min.js', true);
    wp_enqueue_script( 'boot-pooper-js-defer','https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', true);
    wp_enqueue_script( 'boot-js-defer','https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array('jquery'), true);
    wp_enqueue_script('jquery-ui-defer', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', array('jquery'), true);

}

add_action( 'wp_enqueue_scripts', 'snf_subsidiary_add_scripts' );
/**
 * Only Enqueue Specific Scripts for these conditions
 */
function specific_scripts() {
    if( is_404() ){
        wp_enqueue_script('snf-oops-js', get_template_directory_uri() . '/js/oops.js', array('jquery'), 'custom', true);
    }
}
add_action('wp_enqueue_scripts', 'specific_scripts');
/**
 * Only Enqueue Specific Styles for these conditions
 */
if(!function_exists('archives_page_styles')) :
    function archives_page_styles() {
        if(is_page_template('tmpl_archives.php')) {
            wp_enqueue_style('archives-page-style', get_template_directory_uri() . '/css/archives-page-style.css'); // standard way of adding style sheets in WP.
        }
    }
endif;
add_action('wp_enqueue_scripts', 'archives_page_styles');

/**
 * Additional Resources, CPT, Taxonomies, etc..
 */
require_once('additional/cpt/locations.php');
require_once('additional/cpt/homepage-hero.php');
require_once('additional/cpt/country-products.php');
require_once('additional/cpt/subsidiary-news.php');
require_once('additional/nav-walker.php');
require_once('additional/country-user-admin.php');
//require_once('additional/new-page-notification.php');
require_once('additional/general-settings-additional-fields.php');
require_once('additional/breadcrumbs.php');
require_once('additional/snf-navigation-shrink.php');
require_once('additional/snf-search-results-highlight.php');
require_once('additional/snf-pagination.php');
require_once('additional/snf-acf-search-results.php');
require_once('additional/bootstrap-pagination.php');
require_once('additional/archives-sidebar.php');
require_once('additional/acf-preview.php');
require_once('additional/dynamic-sidebar-register.php');
require_once('additional/eliminate-render-blocking-resources.php');
// WP-ADMIN Logo Change
function my_login_logo() {
    ?>
    <style type="text/css">
        body.login {
            background: rgb(0,45,115);
            background: linear-gradient(167deg, rgba(0,45,115,1) 0%, rgba(0,45,115,0.9920343137254902) 36%, rgba(255,255,255,1) 100%);
        }
        .login #backtoblog a, .login #nav a{
            color:#fff !important;
        }
        .login form{
            background-color: #fff;
            opacity: .9;
        }
        body.login div#login h1 a {
            background-image: url('<?php bloginfo('template_directory'); ?>/images/SNF-White.png');
            height:96px;
            width:330px;
            background-size: cover;
            background-repeat: no-repeat;
            padding-bottom: 30px;
        }
    </style>
    <?php
} add_action( 'login_enqueue_scripts', 'my_login_logo' );

/**
 * Market Taxonomy for Page Selections
 */
function create_custom_taxonomies() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x( 'Markets', 'taxonomy general name' ),
        'singular_name'     => _x( 'Market', 'taxonomy singular name' ),
        'search_items'      => __( 'Search market' ),
        'all_items'         => __( 'All Market' ),
        'parent_item'       => __( 'Parent Market' ),
        'parent_item_colon' => __( 'Parent Market:' ),
        'edit_item'         => __( 'Edit Market' ),
        'update_item'       => __( 'Update Market' ),
        'add_new_item'      => __( 'Add New Market' ),
        'new_item_name'     => __( 'New Market Name' ),
        'menu_name'         => __( 'Market' ),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
    );
    register_taxonomy( 'market', array( 'page','news','locations','products','marketing_materials', 'trade_shows', 'press_release', 'post' ), $args );
}
add_action( 'init', 'create_custom_taxonomies', 0 );

/**
 * Function for retrieving the Categories for a post/page
 */

function snf_subsidiary_get_cats(){
    $cats_list = get_the_category_list( ', ' );
    if ( $cats_list){
        echo "<span class='tags-links'>Posted in {$cats_list}</span>";
    }
}
/**
 * Function for retrieving the tags for a post/page
 */
function snf_subsidiary_get_tags(){
    $tags_list = get_the_tag_list( ' ', ',' );
    if ( $tags_list ) {
        echo "<span class='tags-links'>Tagged with {$tags_list}</span>";
    }
}
/**
 *  DIY Popular Posts for News and Single Posts @ https://digwp.com/2016/03/diy-popular-posts/
 */
function shapeSpace_popular_posts($post_id) {
    $count_key = 'popular_posts';
    $count = get_post_meta($post_id, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($post_id, $count_key);
        add_post_meta($post_id, $count_key, '0');
    } else {
        $count++;
        update_post_meta($post_id, $count_key, $count);
    }
}
function shapeSpace_track_posts($post_id) {
    if (!is_single()) return;
    if (empty($post_id)) {
        global $post;
        $post_id = $post->ID;
    }
    shapeSpace_popular_posts($post_id);
}
add_action('wp_head', 'shapeSpace_track_posts');\
/**
 *  Adding Excerpt support to pages for search result usage
 */
    add_post_type_support( 'page', 'excerpt' );
/**
 *  Display News CPT on the same category page as your default
 */
add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
    if( is_category() ) {
        $post_type = get_query_var('post_type');
        if($post_type)
            $post_type = $post_type;
        else
            $post_type = array('nav_menu_item', 'post', 'news'); // don't forget nav_menu_item to allow menus to work!
        $query->set('post_type',$post_type);
        return $query;
    }
}
/**
 *  Setting Default Page Template if the user is not an administrator
 */
add_action('add_meta_boxes', 'snf_default_page_template', 1);
function snf_default_page_template() {

    global $post;
    if ( 'page' == $post->post_type
        && 0 != count( get_page_templates( $post ) )
        && get_option( 'page_for_posts' ) != $post->ID // Not the page for listing posts
        && '' == $post->page_template // Only when page_template is not set
    ) {
        $post->page_template = "inner-page-with-features.php";
    }
}
/**
 *  Removes Comments From Dashboard
 */

// Removes from admin menu
add_action( 'admin_menu', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
// Removes from post and pages
add_action('init', 'remove_comment_support', 100);

function remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
// Removes from admin bar
function mytheme_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');

}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );
/**
 *  Adds Bootstrap Class Img Fluid to all Imgs added to Post Pages
 */
function add_image_class($class){
    $class .= ' img-fluid';
    return $class;
}
add_filter('get_image_tag_class','add_image_class');

/**
 *  Strips <br /> from WYSIWYG
 */
function better_wpautop($pee){
    return wpautop($pee,false);
}
remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'better_wpautop' , 99);
add_filter( 'the_content', 'shortcode_unautop',100 );

/**
 *  Single Template Function that returns a list of CPT with Similar Taxonomy you select for sidebar:
 *
 *  if ( function_exists( 'get_related_posts' ) ) {
        $related_posts = get_related_posts( 'market', array( 'posts_per_page' => -1) );
        if ( $related_posts ) {
            foreach ( $related_posts as $post ) {
                setup_postdata( $post );
 *              your HTML Structure Here
 *          }
 *       }
 *   }
 */
require_once('additional/get-related-cpt-post.php');

// add classes to wp_list_pages
function wp_list_pages_filter($output) {
    $output = str_replace('page_item', 'page_item list-group-item', $output);
    return $output;
}
add_filter('wp_list_pages', 'wp_list_pages_filter');

/**
 * Gravity Forms Bootstrap Styles
 *
 * Applies bootstrap classes to various common field types.
 * Requires Bootstrap to be in use by the theme.
 *
 * Using this function allows use of Gravity Forms default CSS
 * in conjuction with Bootstrap (benefit for fields types such as Address).
 *
 * @see  gform_field_content
 * @link http://www.gravityhelp.com/documentation/page/Gform_field_content
 *
 * @return string Modified field content
 */
add_filter("gform_field_content", "bootstrap_styles_for_gravityforms_fields", 10, 5);
function bootstrap_styles_for_gravityforms_fields($content, $field, $value, $lead_id, $form_id){

    // Currently only applies to most common field types, but could be expanded.

    if($field["type"] != 'hidden' && $field["type"] != 'list' && $field["type"] != 'multiselect' && $field["type"] != 'checkbox' && $field["type"] != 'fileupload' && $field["type"] != 'date' && $field["type"] != 'html' && $field["type"] != 'address') {
        $content = str_replace('class=\'medium', 'class=\'form-control medium', $content);
    }

    if($field["type"] == 'name' || $field["type"] == 'address') {
        $content = str_replace('<input ', '<input class=\'form-control\' ', $content);
    }

    if($field["type"] == 'textarea') {
        $content = str_replace('class=\'textarea', 'class=\'form-control textarea', $content);
    }

    if($field["type"] == 'checkbox') {
        $content = str_replace('li class=\'', 'li class=\'form-check ', $content);
        $content = str_replace('<input ', '<input style=\'margin-top:-2px\' ', $content);
        $content = str_replace('<label ', '<label class=\'form-check-label\' ', $content);
    }

    if($field["type"] == 'radio') {
        $content = str_replace('li class=\'', 'li class=\'radio ', $content);
        $content = str_replace('<input ', '<input style=\'margin-left:1px;\' ', $content);
    }

    return $content;

} // End bootstrap_styles_for_gravityforms_fields()

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';