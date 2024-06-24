<?php
/**
 * Template Name: Past Events
 * Description: A custom page template for displaying past events.
 *
 * This template displays a list of past events, ordered by event date.
 *
 * @package WordPress
 * @subpackage Your_Theme_Name
 * @since Your_Theme_Version
 */

get_header(); // Includes the header.php template file
?>
<!-- <div class="page-banner">
    <div class="page-banner__bg-image"
        style="background-image: url('<?php //echo esc_url( get_theme_file_uri( '/dist/images/ocean.jpg' ) ); ?>')">
    </div>

    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">
            <?php //the_archive_title(); ?>
            Past Events
        </h1>

        <div class="page-banner__intro">
            <p>A recap of our pst events</p>
        </div>
    </div>
</div> -->
<!-- page banner here -->
<?php pageBanner(array(
        'title' => 'Past Events',
        'subtitle' => 'A recap of our past events'
    )); ?>

<main>
    <div class="container container--narrow page-section">


        <?php
        // Get today's date in Ymd format
        $today = date('Ymd');

          // Get current page number
          $paged = get_query_var('paged') ? get_query_var('paged') : 1;

        // Custom query for past events
        $pastEvents = new WP_Query(array(
            'posts_per_page' => 10, // Number of past events per page
            'post_type' => 'event', // Custom post type
            'meta_key' => 'event_date', // Custom field for event date
            'orderby' => 'meta_value_num', // Order by numeric value of custom field
            'order' => 'DESC', // Show the most recent past events first
            'paged' => $paged, // Handle pagination
            'meta_query' => array(
                array(
                    'key' => 'event_date', // Custom field for event date
                    'compare' => '<', // Compare if the event date is less than today's date
                    'value' => $today,
                    'type' => 'numeric' // Treat the value as a numeric value
                )
            )
        ));

        // Check if there are any past events
        if ($pastEvents->have_posts()) : 
            while ($pastEvents->have_posts()) : $pastEvents->the_post(); ?>

        <div class="event-summary">
            <a class="event-summary__date t-center" href="<?php the_permalink(); ?>">
                <span class="event-summary__month">
                    <?php
                            // Get the event date and format it to display month
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
                    <a href="<?php the_permalink(); ?>" class="nu gray">Read more</a>
                </p>
            </div>
        </div>

        <?php endwhile; 
          // Pagination
          echo paginate_links(array(
            'total' => $pastEvents->max_num_pages,
            'current' => $paged, // Highlight the current page number
            'mid_size' => 2,
            'prev_text' => __('« Prev'),
            'next_text' => __('Next »'),
        ));
        else : // If no past events were found ?>
        <p>No past events found.</p>
        <?php endif; ?>

        <?php wp_reset_postdata(); // Restore original post data ?>
    </div>
</main>

<?php get_footer(); // Includes the footer.php template file ?>