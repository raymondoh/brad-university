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

get_header(); 
// Debugging code
echo '<!-- single.php is being used -->';
?>
<main>
    <?php
    while ( have_posts() ) : the_post(); ?>
    <!-- <div class="page-banner">
        <div class="page-banner__bg-image"
            style="background-image: url('<?php //echo esc_url( get_theme_file_uri( '/dist/images/ocean.jpg' ) ); ?>')">
        </div>

        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?php //the_title(); ?></h1>
            <div class="page-banner__intro">
                <p>REPLACE LATER Learn how the school of your dreams got started.</p>
            </div>
        </div>
    </div> -->
    <!-- page banner here -->
    <?php pageBanner(); ?>

    <div class="container container--narrow page-section">
        <!-- Breadcrumbs -->
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
                <a class="metabox__blog-home-link" href="<?php echo site_url('/blog'); ?>">
                    <i class="fa fa-home" aria-hidden="true"></i> Blog Home
                </a>
                <span class="metabox__main">Posted by <?php the_author_posts_link(); ?> on
                    <?php the_time( 'F j, Y' ); ?> in
                    <?php echo get_the_category_list( ', ' ); ?></span>
            </p>
        </div>


        <!-- The content of the page -->
        <div class="generic-content">
            <?php the_content(); ?>
        </div>
    </div>

    <?php endwhile;
    ?>
</main>

<?php get_footer(); ?>