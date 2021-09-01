<?php
function search_content_highlight() {
    $content = wp_trim_words( get_the_content(), 50, '...' );
    $keys = implode('|', explode(' ', get_search_query()));
    $content = preg_replace('/(' . $keys .')/iu', '<strong class="search-highlight">\0</strong>', $content);
    echo '<p>' . $content . '</p>';
}