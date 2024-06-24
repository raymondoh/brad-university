<?php
/**
 * The template for displaying archive pages (such as category, tag, author, or date archives)
 *
 * @package WordPress
 * @subpackage Your_Theme_Name
 * @since Your_Theme_Version
 */

get_header(); // Includes the header.php template file
// Debugging code
echo '<!-- archive.php is being used -->';
?>

<!-- Your custom code goes here  -->
<!-- <div class="page-banner">
    <div class="page-banner__bg-image"
        style="background-image: url('<?php //echo esc_url( get_theme_file_uri( '/dist/images/ocean.jpg' ) ); ?>')">
    </div>

    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">
            <?php //the_archive_title(); ?>
        </h1>

        <div class="page-banner__intro">
            <p><?php //the_archive_description(); ?></p>
        </div>
    </div>
</div> -->
<!-- page banner here -->
<?php pageBanner(array(
        'title' => get_the_archive_title(),
        'subtitle' => get_the_archive_description()
    )); ?>
<!-- content -->
<div class="container container--narrow page-section">
    <?php
    while ( have_posts() ) : the_post(); ?>

    <div class="post-item">
        <h2 class="headline headline--medium headline--post-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
        <div class="metabox">
            <p>Posted by <?php the_author_posts_link(); ?> on <?php the_time( 'F j, Y' ); ?> in
                <?php echo get_the_category_list( ', ' ); ?></p>
        </div>
        <div class="generic-content">
            <?php the_excerpt(); ?>
            <p><a class="btn btn--blue" href="<?php the_permalink(); ?>">Continue readings &raquo;</a></p>
        </div>
    </div>

    <?php endwhile; ?>
    <!-- Pagination -->
    <?php echo paginate_links(); ?>
</div>

<?php get_footer(); // Includes the footer.php template file ?>