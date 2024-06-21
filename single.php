<?php
/**
 * The template for displaying all single posts
 *
 * This is the template that displays all single posts by default.
 * You can also create specific templates for single post types by using
 * single-{post_type}.php.
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
        get_template_part( 'template-parts/content', get_post_type() );
    endwhile;
    ?>
</main>

<?php get_footer(); ?>