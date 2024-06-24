<?php
/**
 * The template for displaying archive page for events
 *
 * @package WordPress
 * @subpackage Your_Theme_Name
 * @since Your_Theme_Version
 */

get_header(); // Includes the header.php template file
// Debugging code
echo '<!-- archive-event.php is being used -->';
?>

<!-- Your custom code goes here  -->
<!-- <div class="page-banner">
    <div class="page-banner__bg-image"
        style="background-image: url('<?php //echo esc_url( get_theme_file_uri( '/dist/images/ocean.jpg' ) ); ?>')">
    </div>

    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">
            <?php //the_archive_title(); ?>
            All Events
        </h1>

        <div class="page-banner__intro">
            <p><?php //the_archive_description(); ?></p>
        </div>
    </div>
</div> -->
<!-- page banner here -->
<?php pageBanner(array(
        'title' => 'All Events',
        'subtitle' => 'See what is going on in our world'
    
    )); ?>
<!-- content -->
<div class="container container--narrow page-section">
    <?php
    while ( have_posts() ) : the_post(); ?>

    <div class="event-summary">
        <a class="event-summary__date t-center" href="<?php the_permalink(); ?>">
            <span class="event-summary__month">
                <?php
                            $eventDate = new DateTime(get_field('event_date'));
                            echo $eventDate->format('M');
                            ?>
            </span>
            <span class="event-summary__day"><?php echo $eventDate->format('d'); ?></span>
        </a>
        <div class="event-summary__content">
            <h5 class="event-summary__title headline headline--tiny">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h5>
            <p><?php echo wp_trim_words(get_the_excerpt(), 18); ?>
                <a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a>
            </p>
        </div>
    </div>



    <?php endwhile; ?>
    <!-- Pagination -->
    <?php echo paginate_links(); ?>

    <!--  -->
    <hr class="section-break">
    <p>Look for a recap of past events. Check out our <a href="<?php echo site_url('/past-events') ?>">archives</a> </p>
</div>

<?php get_footer(); // Includes the footer.php template file ?>