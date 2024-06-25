<?php


function brad_register_search() {
    register_rest_route('brad/v1', 'search', array(
        'methods' => WP_REST_SERVER::READABLE,
        'callback' => 'brad_search_results'
    ));
}
add_action('rest_api_init', 'brad_register_search'); // Register the custom search route

function brad_search_results($data) {
    $results = array(
        'generalInfo' => array(),
        'professors' => array(),
        'programs' => array(),
        'events' => array(),
        'campuses' => array(),
        'relatedPrograms' => array()
    );

    try {
        $mainQuery = new WP_Query(array(
            'post_type' => array('post', 'page', 'professor', 'program', 'campus', 'event'),
            's' => sanitize_text_field($data['term'])
        ));

        while($mainQuery->have_posts()) {
            $mainQuery->the_post();

            if (get_post_type() == 'post' OR get_post_type() == 'page') {
                array_push($results['generalInfo'], array(
                    'title' => get_the_title(),
                    'permalink' => get_the_permalink()
                ));
            }

            if (get_post_type() == 'professor') {
                array_push($results['professors'], array(
                    'title' => get_the_title(),
                    'permalink' => get_the_permalink()
                ));
            }

            if (get_post_type() == 'program') {
                array_push($results['programs'], array(
                    'title' => get_the_title(),
                    'permalink' => get_the_permalink()
                ));
            }

            if (get_post_type() == 'campus') {
                array_push($results['campuses'], array(
                    'title' => get_the_title(),
                    'permalink' => get_the_permalink()
                ));
            }

            if (get_post_type() == 'event') {
                $eventPrograms = get_field('related_programs'); // Assuming 'related_programs' is the ACF field name

                array_push($results['events'], array(
                    'title' => get_the_title(),
                    'permalink' => get_the_permalink()
                ));

                if ($eventPrograms) {
                    foreach ($eventPrograms as $program) {
                        array_push($results['relatedPrograms'], array(
                            'title' => get_the_title($program),
                            'permalink' => get_the_permalink($program)
                        ));
                    }
                }
            }
        }
    } catch (Exception $e) {
        error_log('Error in brad_search_results: ' . $e->getMessage());
    }

    return $results;
}