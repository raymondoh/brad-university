<?php
/**
 * The template for displaying all single professors
 *
 * This is the template that displays all single professor posts by default.
 * It is used when a visitor requests a single event post.
 *
 * @package WordPress
 * @subpackage Your_Theme_Name
 * @since Your_Theme_Version
 */

get_header(); 
// Debugging code
echo '<!-- single-professor.php is being used -->';
?>

<main>
    <?php
    while ( have_posts() ) : the_post(); ?>

    <?php pageBanner(); ?>


    <div class="container container--narrow page-section">



        <!-- The content of the page -->
        <div class="generic-content">
            <div class="row group">
                <div class="one-third">
                    <?php the_post_thumbnail('professorPortrait'); ?>
                </div>
                <div class="two-thirds">
                    <?php the_content(); ?>
                </div>
            </div>
            <!--  -->

            <!--  -->
            <?php
        $relatedPrograms = get_field('related_programs');
        $related_programs = get_field('related_programs');
echo '<!-- Related Programs: ';
print_r($related_programs);
echo ' -->';


        if ($relatedPrograms) {
            echo '<hr class="section-break">';
            echo '<h2 class="headline headline--medium">Subject(s) Taught</h2>';
            echo '<ul class="link-list min-list">';
            foreach ($relatedPrograms as $program) : ?>
            <li><a href="<?php echo get_the_permalink($program); ?>"><?php echo get_the_title($program); ?></a></li>
            <?php endforeach;
            echo '</ul>';
        }

        ?>
        </div>

        <?php endwhile;
    ?>
</main>

<?php get_footer(); ?>