<?php
$yj_layout = get_theme_mod( 'yj_homepage' );


// WP_Query arguments
$args = array(
	'posts_per_page' => 3,
    'meta_key' => 'featured_story_order',
    'orderby' => 'meta_value',
    'order' => 'ASC',
    'meta_query' => array(
            array(
                'key' => 'featured_story',
                'value' => 'Yes'
            )
        )
);

// The Query
$breaking_query = new WP_Query( $args );
$count = 0;
// The Loop
if ( $breaking_query->have_posts() ) {
	while ( $breaking_query->have_posts() ) {
		$breaking_query->the_post();
        $count++;
		if ($yj_layout == 'breaking' && $count == 1) {
            get_template_part('templates/content', 'breaking');
        } elseif ($yj_layout == 'breaking' && $count > 1) {
            get_template_part('templates/content', 'breaking-sub');
        } elseif ($yj_layout == "three") {
            include(locate_template('templates/content-three.php'));
            // Must use above to pass the $count variable to template part
            // get_template_part('templates/content', 'three');
        } else {
            get_template_part('templates/content', 'standard');
        }
	}
} else {
	// no posts found
}

// Restore original Post Data
wp_reset_postdata();

?>