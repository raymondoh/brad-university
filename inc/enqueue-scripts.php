<?php
// Enqueue scripts and styles
function university_enqueue_assets() {
    // Enqueue Font Awesome CSS from CDN
    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css',
        array(),
        null
    );
     // Enqueue Google Fonts
     wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Roboto:ital,wght@0,100;0,300;0,400;0,700;1,400;1,700&display=swap', false );

    // Enqueue Swiper.js CSS from CDN
    wp_enqueue_style(
        'swiper-css',
        'https://unpkg.com/swiper/swiper-bundle.min.css',
        array(),
        null
    );

    // Enqueue your theme's main CSS
    wp_enqueue_style(
        'university-css',
        get_template_directory_uri() . '/dist/css/main.css',
        array(),
        '1.0.0',
        'all'
    );

    // Enqueue Alpine.js from CDN
    wp_enqueue_script(
        'alpine-js',
        'https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.4.2/cdn.min.js',
        array(),
        null,
        true // Load in footer
    );

    // Enqueue Swiper.js from CDN
    wp_enqueue_script(
        'swiper-js',
        'https://unpkg.com/swiper/swiper-bundle.min.js',
        array(),
        null,
        true // Load in footer
    );

    // Enqueue main.js with Alpine.js and Swiper.js as dependencies
    wp_enqueue_script(
        'university-js',
        get_template_directory_uri() . '/dist/js/main.js',
        array('alpine-js', 'swiper-js'),
        '1.0.0',
        true // Load in footer
    );
}
add_action('wp_enqueue_scripts', 'university_enqueue_assets');