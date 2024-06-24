<?php
/**
 * The template for displaying archive page for programs
 *
 * @package WordPress
 * @subpackage Your_Theme_Name
 * @since Your_Theme_Version
 */

get_header(); // Includes the header.php template file

// Debugging code
echo '<!-- archive-program.php is being used -->';
?>

<!-- Your custom code goes here  -->
<!-- <div class="page-banner">
    <div class="page-banner__bg-image"
        style="background-image: url('<?php //echo esc_url( get_theme_file_uri( '/dist/images/ocean.jpg' ) ); ?>')">
    </div>

    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">
            <?php //the_archive_title(); ?>
            All Programs
        </h1>

        <div class="page-banner__intro">
            <p><?php //the_archive_description(); ?>There is something for everyone</p>
        </div>
    </div>
</div> -->
<!-- page banner here -->
<?php pageBanner(array(
        'title' => 'All Programs',
        'subtitle' => 'There is something for everyone'
    )); ?>
<!-- content -->
<div class="container container--narrow page-section">
    <ul class="link-list min-list">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post(); ?>
        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php endwhile;
            // Pagination
            echo paginate_links();
        else :
            echo '<p>No programs found.</p>';
        endif;
        ?>
    </ul>
    <!--  -->

</div>

<?php get_footer(); ?>