<?php

add_action('login_enqueue_scripts', 'brad_custom_login_css');

function brad_custom_login_css()
{
    wp_enqueue_style('brad-css', get_template_directory_uri() . '/dist/css/main.css', array(), '1.0.0');
}

add_filter('login_headertitle', 'brad_login_ltitle');   // Change the URL of the logo on the login page
function brad_login_ltitle()
{
    return get_bloginfo('name');
}   // Change the URL of the logo on the login page