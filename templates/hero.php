<?php
$yj_layout = get_theme_mod( 'yj_homepage' );

// WP_Query arguments
$args = array(
	// 'posts_per_page' => 3,
    'meta_key' => 'featured_story_featured_setting',
    'ignore_sticky_posts' => 1,
    'orderby' => 'meta_value',
    'order' => 'ASC',
    'meta_query' => array(
        array(
            'key' => 'featured_story_featured_setting',
            'value' => array('1 First story', '2 Second story', '3 Third story'),
            'compare' => 'IN'
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
        } elseif ($yj_layout == "three" && $count <= 3) {
            // include(locate_template('templates/content-three.php'));
            // Must use above to pass the $count variable to template part
            get_template_part('templates/content', 'three');
        } elseif ($yj_layout == "three" && $count >= 4) {
            get_template_part('templates/content', 'breaking-sub');
        } elseif ($yj_layout == "two" && $count <= 2) {
            get_template_part('templates/content', 'two');
            //include(locate_template('templates/content-two.php'));
        } elseif ($yj_layout == "two" && $count >= 3) {
            get_template_part('templates/content', 'breaking-sub');
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