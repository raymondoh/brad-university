<?php
function debug_list_all_pages_with_ids() {
    $pages = get_pages();
    echo '<!-- Page IDs: ';
    foreach ( $pages as $page ) {
        echo $page->post_title . ' (ID: ' . $page->ID . '), ';
    }
    echo ' -->';
}
add_action('wp_footer', 'debug_list_all_pages_with_ids');