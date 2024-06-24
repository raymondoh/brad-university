<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Your_Theme_Name
 * @since Your_Theme_Version
 */

get_header(); ?>

<main>
    <?php
    while ( have_posts() ) : the_post(); ?>

    <!-- page banner here -->
    <?php pageBanner(array(
        //'title' => 'Our Campuses',
        //'subtitle' => 'We have several conveniently located campuses.'
    
    )); ?>


    <div class="container container--narrow page-section">
        <!-- Breadcrumbs -->
        <?php get_template_part('template-parts/metabox'); ?>

        <!-- Page Links -->
        <?php get_template_part('template-parts/page-links'); ?>
        <!-- The content of the page -->
        <div class="generic-content">
            <?php the_content(); ?>
        </div>
    </div>

    <?php endwhile; ?>
</main>

<?php get_footer(); ?>