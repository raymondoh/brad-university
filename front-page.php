<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package WordPress
 * @subpackage Your_Theme_Name
 * @since Your_Theme_Version
 */

get_header(); ?>

<!-- Your custom code goes here  -->
<div class="page-banner">
    <div class="page-banner__bg-image"
        style="background-image: url('<?php echo esc_url( get_theme_file_uri( '/dist/images/library-hero.jpg' ) ); ?>');">
    </div>

    <div class="page-banner__content container t-center c-white">
        <h1 class="headline headline--large">Welcome!</h1>
        <h2 class="headline headline--medium">We think you&rsquo;ll like it here.</h2>
        <h3 class="headline headline--small">Why don&rsquo;t you check out the <strong>major</strong> you&rsquo;re
            interested in?</h3>
        <a href="<?php echo get_post_type_archive_link('programs') ?>" class="btn btn--large btn--blue">Find Your
            Major</a>
    </div>
</div>

<div class="full-width-split group">
    <!-- Upcoming Events -->
    <?php get_template_part('template-parts/upcoming-events'); ?>


    <!-- Latest 2 posts -->
    <?php get_template_part('template-parts/from-our-blog'); ?>
</div>

<!-- Slider -->
<?php get_template_part('template-parts/hero-slider'); ?>





<!-- </div> -->

<?php get_footer(); ?>