<?php
/**
 * The template for displaying all single events
 *
 * This is the template that displays all single event posts by default.
 * It is used when a visitor requests a single event post.
 *
 * @package WordPress
 * @subpackage Your_Theme_Name
 * @since Your_Theme_Version
 */

get_header();
// Debugging code
echo '<!-- single-event.php is being used -->';
?>

<main>
    <?php
    while ( have_posts() ) : the_post(); ?>
    <!-- <div class="page-banner">
        <div class="page-banner__bg-image"
            style="background-image: url('<?php //echo esc_url( get_theme_file_uri( '/dist/images/ocean.jpg' ) ); ?>')">
        </div>

        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?php //the_title(); ?>dd</h1>
            <div class="page-banner__intro">
                <p>!!!!REPLACE LATER Learn how the school of your dreams got started.</p>
            </div>
        </div>
    </div> -->
    <!-- page banner here -->
    <?php pageBanner(); ?>

    <div class="container container--narrow page-section">
        <!-- Breadcrumbs -->
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
                <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('event'); ?>">
                    <i class="fa fa-home" aria-hidden="true"></i> Events Home
                </a>
                <span class="metabox__main"><?php the_title(); ?></span>
            </p>
        </div>

        <!-- The content of the page -->
        <div class="generic-content">
            <?php the_content(); ?>
        </div>

        <!-- Related Programs -->
        <?php
        $relatedPrograms = get_field('related_programs');

        // Debugging output
        //echo '<!-- Related Programs: ';
        //print_r($relatedPrograms);
        //echo ' -->';

        if ($relatedPrograms) {
            echo '<hr class="section-break">';
            echo '<h2 class="headline headline--medium">Related Program(s)</h2>';
            echo '<ul class="link-list min-list">';
            foreach ($relatedPrograms as $program) :
                // Check if $program is a post ID or a post object
                if (is_object($program)) {
                    $program_id = $program->ID;
                } else {
                    $program_id = $program;
                }

                $program_link = get_permalink($program_id);
                $program_title = get_the_title($program_id);

                // Debugging output
                //echo '<!-- Program ID: ' . $program_id . ' -->';
                //echo '<!-- Program Link: ' . $program_link . ' -->';
                ?>
        <li><a href="<?php echo esc_url($program_link); ?>"><?php echo esc_html($program_title); ?></a></li>
        <?php endforeach;
            echo '</ul>';
        } else {
            echo '<p class="headline headline--medium">No related programs found.</p>';
        } // end if ($relatedPrograms)
       
        ?>
    </div>

    <?php endwhile; ?>
</main>

<?php get_footer(); ?>