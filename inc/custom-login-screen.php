<?php



function ourHeaderUrl()
{
    return esc_url(site_url('/'));
}
add_filter('login_headerurl', 'ourHeaderUrl');