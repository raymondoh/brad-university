<?php
/**
 * Theme functions and definitions
 *
 * Sets up the theme and provides some helper functions,
 * which are used in the theme as custom template tags.
 * Others are attached to action and filter hooks in WordPress
 * to change core functionality.
 *
 * @package WordPress
 * @subpackage Your_Theme_Name
 * @since Your_Theme_Version
 */

// Your custom functions go here
require_once get_template_directory() . '/inc/enqueue-scripts.php';
require_once get_template_directory() . '/inc/theme-setup.php';
require_once get_template_directory() . '/inc/adjust-custom-query.php';
require_once get_template_directory() . '/inc/debug-page-ids.php';
require_once get_template_directory() . '/inc/page-banner.php';
require_once get_template_directory() . '/inc/custom-rest.php';
require_once get_template_directory() . '/inc/custom-search-route.php';
require_once get_template_directory() . '/inc/redirect-subscribers.php';
require_once get_template_directory() . '/inc/custom-login-screen.php';
require_once get_template_directory() . '/inc/enqueue-login-css.php';