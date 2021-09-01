<?php
add_action( 'init', 'register_my_menus' );
function register_my_menus() {
    register_nav_menus(
        array(
            'snf_subsidiary_main_nav' => __( 'Header Main Menu' ),
            'snf_subsidiary_footer_menu' => __( 'Footer Menu'),
            'municipal-water-menu' => __( 'Municipal Water Menu' ),
        )
    );
}
function snf_subsidiary_main_nav($depth) {
    // display the wp3 menu if available
    require_once get_template_directory() . '/inc/wp_bootstrap_navwalker.php';
    wp_nav_menu(
        array(
            'menu' => 'snf_subsidiary_main_nav',  /* menu name */
            'menu_class' => 'nav navbar-nav',
            'theme_location' => 'snf_subsidiary_main_nav', /* where in the theme it's assigned */
            'container' => 'div', /* container class */
            'container_class' => 'collapse navbar-collapse',
            'container_id' => 'main-menu',
            'fallback_cb' => 'wp_bootstrap_main_nav_fallback', /* menu fallback */
            'depth' => 5,  //suppress lower levels for now
            'walker' => new wp_bootstrap_navwalker()
        )
    );
}
function snf_markets_municipal_nav($depth) {
    // display the wp3 menu if available
    require_once get_template_directory() . '/inc/wp_bootstrap_navwalker.php';
    wp_nav_menu(
        array(
            'menu' => 'market_menu',  /* menu name */
            'menu_class' => 'nav navbar-nav',
            'theme_location' => 'municipal-water-menu', /* where in the theme it's assigned */
            'container' => 'nav', /* container class */
            'container_class' => 'collapse navbar-collapse',
            'container_id' => 'main-menu',
            'fallback_cb' => 'wp_bootstrap_main_nav_fallback', /* menu fallback */
            'depth' => "{$depth}",  //suppress lower levels for now
            'walker' => new wp_bootstrap_navwalker()
        )
    );
}

function snf_subsidiary_footer_menu($depth) {
    // display the wp3 menu if available
    require_once get_template_directory() . '/inc/wp_bootstrap_navwalker.php';
    wp_nav_menu(
        array(
            'menu' => 'snf_subsidiary_footer_menu',  /* menu name */
            'menu_class' => 'nav navbar-nav',
            'theme_location' => 'snf_subsidiary_footer_menu', /* where in the theme it's assigned */
            'container' => 'div', /* container class */
            'container_class' => 'footer-links',
            'container_id' => 'footer-menu',
            'fallback_cb' => 'wp_bootstrap_main_nav_fallback', /* menu fallback */
            'depth' => "{$depth}",  //suppress lower levels for now
            'walker' => new wp_bootstrap_navwalker()
        )
    );
}