<?php
function brad_theme_setup () {
    // dynamic title tag
    add_theme_support('title-tag');

    // register nav menu
      register_nav_menus(array(
        'primary' => __('Primary Menu', 'brad'), // Desktop Menu
        'mobile' => __('Mobile Menu', 'brad'),    // Mobile Menu
        "footer_1" => __("Footer Menu 1", "brad"), // Footer Menu
        "footer_2" => __("Footer Menu 2", "brad"), // Footer Menu
    ));

}
add_action('after_setup_theme', 'brad_theme_setup');