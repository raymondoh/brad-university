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

    <div class="page-banner">
        <div class="page-banner__bg-image"
            style="background-image: url('<?php echo esc_url( get_theme_file_uri( '/dist/images/ocean.jpg' ) ); ?>')">
        </div>

        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?php the_title(); ?></h1>
            <div class="page-banner__intro">
                <p>REPLACE LATER Learn how the school of your dreams got started.</p>
            </div>
        </div>
    </div>

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