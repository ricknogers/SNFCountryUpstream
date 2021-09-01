<?php
function excerpt_function($ID, $searchTerms) {
    global $wpdb;
    $thisPost = get_post_meta($ID);
    foreach ($thisPost as $key => $value) {
        if ( false !== stripos($value[0], $searchTerms) ) {
            $found = substr(strip_tags($value[0]), 0, 150);
            echo $found . ' ...';
        }
    }
}
// Custom Excerpt function for Advanced Custom Fields
function custom_field_excerpt() {
    global $post;
    $text = array(
        get_sub_field('sub_block_title'), //Replace 'your_field_name'
        get_sub_field('subsididary_section_title'),
        get_sub_field('subsididary_section_description'),
        get_sub_field('content_title'),
        get_sub_field('content_block'),
        get_sub_field('call_to_action_description'),
    );
    if ( '' != $text ) {
        $text = strip_shortcodes( $text );
        $text = apply_filters('the_content', $text);
        $text = str_replace(']]>', ']]>', $text);
        $excerpt_length = 20; // 20 words
        $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
        $text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
    }
    return apply_filters('the_excerpt', $text);
}