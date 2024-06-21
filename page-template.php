<?php
/**
 * Template Name: Custom Page Template
 *
 * This is a custom page template that you can use for specific pages.
 * To use this template, select it from the Page Attributes section
 * in the page editor.
 *
 * @package WordPress
 * @subpackage Your_Theme_Name
 * @since Your_Theme_Version
 */

get_header(); ?>

<main>
    <?php
    while ( have_posts() ) :
        the_post();
        get_template_part( 'template-parts/content', 'page' );
    endwhile;
    ?>
</main>

<?php get_footer(); ?>