<?php
function brad_custom_rest() {
    register_rest_field('post', 'author_name', array(
        'get_callback' => function() { return get_the_author(); }
    ));
    register_rest_field('post', 'featured_image_url', array(
        'get_callback' => function() { return get_the_post_thumbnail_url(); }
    ));
}
add_action('rest_api_init', 'brad_custom_rest');