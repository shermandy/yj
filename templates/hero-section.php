<?php

$current_category = get_category( get_query_var( 'cat' ) );
$cat_slug = $current_category->slug;
$section_layout_setting = get_theme_mod( 'yj_'.$cat_slug );

// WP_Query arguments
$args = array(

    'cat' => $cat,
    'meta_key' => 'featured_in_section_order',
    'orderby' => 'meta_value',
    'order' => 'ASC',
    'meta_query' => array(
        array(
            'key' => 'featured_in_section_order',
            'value' => 'Not featured',
            'compare' => '!='
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
		if ($section_layout_setting == 'breaking' && $count == 1) {
            get_template_part('templates/content', 'breaking');
        } elseif ($section_layout_setting == 'breaking' && $count > 1) {
            get_template_part('templates/content', 'breaking-sub');
        } elseif ($section_layout_setting == "three" && $count <= 3) {
            // include(locate_template('templates/content-three.php'));
            // Must use above to pass the $count variable to template part
            get_template_part('templates/content', 'three');
        } elseif ($section_layout_setting == "three" && $count >= 4) {
            get_template_part('templates/content', 'breaking-sub');
        } elseif ($section_layout_setting == "two" && $count <= 2) {
            // include(locate_template('templates/content-three.php'));
            // Must use above to pass the $count variable to template part
            get_template_part('templates/content', 'two');
        } elseif ($section_layout_setting == "two" && $count >= 3) {
            get_template_part('templates/content', 'breaking-sub');
        } else {
            get_template_part('templates/content', 'standard');
        }
	}
}

// Restore original Post Data
wp_reset_postdata();

?>