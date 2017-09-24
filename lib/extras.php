<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

/**
 * Add new thumbnail size
 */
add_image_size( 'breaking-thumbnail', 800, 600 );
add_image_size( 'breaking-sub-thumbnail', 300, 200 );
add_image_size( 'three-large', 627, 400, array( 'center', 'top' ) );
add_image_size( 'section-top', 510, 340 );
add_image_size( 'standard-thumbnail', 450, 300 );
add_image_size( 'section-small', 100, 70, array( 'center', 'top' ) );
add_image_size( 'single-full', 730, 9999 );

/**
 * Add custom meta box for featured stories
 */

/**
 * Generated by the WordPress Meta Box generator
 * at http://jeremyhixon.com/tool/wordpress-meta-box-generator/
 */

function featured_story_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}

function featured_story_add_meta_box() {
	add_meta_box(
		'featured_story-featured-story',
		__( 'Featured story', 'featured_story' ),
		__NAMESPACE__ . '\\featured_story_html',
		'post',
		'side',
		'high'
	);
}
add_action( 'add_meta_boxes', __NAMESPACE__ . '\\featured_story_add_meta_box' );

function featured_story_html( $post) {
	wp_nonce_field( '_featured_story_nonce', 'featured_story_nonce' ); ?>

	<p>Featured stories will appear at the top of the homepage. Featured stories must have a "featured image".</p>

	<p>
		<label for="featured_story_featured_setting"><?php _e( 'Featured setting', 'featured_story' ); ?></label><br>
		<select name="featured_story_featured_setting" id="featured_story_featured_setting">
			<option <?php echo (featured_story_get_meta( 'featured_story_featured_setting' ) === '4 Not featured' ) ? 'selected' : '' ?>>Not featured</option>
			<option <?php echo (featured_story_get_meta( 'featured_story_featured_setting' ) === '1 First story' ) ? 'selected' : '' ?>>1 First story</option>
			<option <?php echo (featured_story_get_meta( 'featured_story_featured_setting' ) === '2 Second story' ) ? 'selected' : '' ?>>2 Second story</option>
			<option <?php echo (featured_story_get_meta( 'featured_story_featured_setting' ) === '3 Third story' ) ? 'selected' : '' ?>>3 Third story</option>
		</select>
	</p><?php
}

function featured_story_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['featured_story_nonce'] ) || ! wp_verify_nonce( $_POST['featured_story_nonce'], '_featured_story_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['featured_story_featured_setting'] ) )
		update_post_meta( $post_id, 'featured_story_featured_setting', esc_attr( $_POST['featured_story_featured_setting'] ) );
}
add_action( 'save_post', __NAMESPACE__ . '\\featured_story_save' );

/*
	Usage: featured_story_get_meta( 'featured_story_featured_setting' )
*/




// Add custom meta box for the "featured in section" feature



function featured_in_section_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}

function featured_in_section_add_meta_box() {
	add_meta_box(
		'featured_in_section-featured-in-section',
		__( 'Featured in section', 'featured_in_section' ),
		__NAMESPACE__ . '\\featured_in_section_html',
		'post',
		'side',
		'high'
	);
}
add_action( 'add_meta_boxes', __NAMESPACE__ . '\\featured_in_section_add_meta_box' );

function featured_in_section_html( $post) {
	wp_nonce_field( '_featured_in_section_nonce', 'featured_in_section_nonce' ); ?>

        <p>These featured stories appear at the top of the section page, but not the necessarily the homepage.</p>

        <p>
            <label for="featured_in_section_order"><?php _e( 'Featured setting', 'featured_in_section' ); ?></label><br>
            <select name="featured_in_section_order" id="featured_in_section_order">
			<option <?php echo (featured_in_section_get_meta( 'featured_in_section_order' ) === '4 Not featured' ) ? 'selected' : '' ?>>Not featured</option>
			<option <?php echo (featured_in_section_get_meta( 'featured_in_section_order' ) === '1 First story' ) ? 'selected' : '' ?>>1 First story</option>
			<option <?php echo (featured_in_section_get_meta( 'featured_in_section_order' ) === '2 Second story' ) ? 'selected' : '' ?>>2 Second story</option>
			<option <?php echo (featured_in_section_get_meta( 'featured_in_section_order' ) === '3 Third story' ) ? 'selected' : '' ?>>3 Third story</option>
		</select>
        </p>
        <?php
}

function featured_in_section_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['featured_in_section_nonce'] ) || ! wp_verify_nonce( $_POST['featured_in_section_nonce'], '_featured_in_section_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['featured_in_section_order'] ) ) {
		update_post_meta( $post_id, 'featured_in_section_order', esc_attr( $_POST['featured_in_section_order'] ) );
    }
}
add_action( 'save_post', __NAMESPACE__ . '\\featured_in_section_save' );









// Add a column to the edit post list for featured stories
add_filter( 'manage_edit-post_columns', __NAMESPACE__ . '\\add_new_columns');
/**
 * Add new columns to the post table
 https://dzone.com/articles/add-custom-post-meta-data-post
 *
 * @param Array $columns - Current columns on the list post
 */
function add_new_columns( $columns ) {
 	$column_meta = array( 'featured' => 'featured' );
    $column_meta3 = array( 'sectionorder' => 'sectionorder' );
	$columns = array_slice( $columns, 0, 4, true ) + $column_meta + array_slice( $columns, 2, NULL, true );
    $columns = array_slice( $columns, 0, 5, true ) + $column_meta3 + array_slice( $columns, 2, NULL, true );
    
    $columns['featured'] = "Feat.";
    $columns['sectionorder'] = "Sec. order";
    
    return $columns;
    
}


add_action( 'manage_posts_custom_column' , __NAMESPACE__ . '\\custom_columns', 10, 2 );

function custom_columns( $column, $post_id ) {
	switch ( $column ) {
		case 'featured':
			$featured_value = get_post_meta( $post_id, 'featured_story_featured_setting', true );
            if ($featured_value == '1 First story' ) {
                echo '1';
            } elseif ($featured_value == '2 Second story') {
                echo '2';
            } elseif ($featured_value == '3 Third story') {
                echo '3';
            } elseif ($featured_value == 'Not featured') {
                echo '—';
            }
			break;
            
        case 'sectionorder':
			$featured_value = get_post_meta( $post_id, 'featured_in_section_order', true );
            if ($featured_value == '1 First story' ) {
                echo '1';
            } elseif ($featured_value == '2 Second story') {
                echo '2';
            } elseif ($featured_value == '3 Third story') {
                echo '3';
            } else {
                echo '—';
            }
			break;
	}
}

function register_sortable_columns( $columns ) {
    $columns['featured'] = "featured";
    $columns['sectionorder'] = "sectionorder";
    return $columns;
}
add_filter( 'manage_edit-post_sortable_columns', __NAMESPACE__ . '\\register_sortable_columns' );

function sort_views_column( $vars ) 
{
    if ( isset( $vars['orderby'] ) && 'featured' == $vars['orderby'] ) {
        $vars = array_merge( $vars, array(
            'meta_key' => 'featured_story_featured_setting', //Custom field key
            'orderby' => 'meta_value') //Custom field value (number)
        );
    }
    if ( isset( $vars['orderby'] ) && 'sectionorder' == $vars['orderby'] ) {
        $vars = array_merge( $vars, array(
            'meta_key' => 'featured_in_section_order', //Custom field key
            'orderby' => 'meta_value') //Custom field value (number)
        );
    }
    return $vars;
}
add_filter( 'request', __NAMESPACE__ . '\\sort_views_column' );




add_action('admin_head', __NAMESPACE__ . '\\custom_admin_css');
function custom_admin_css() {
  echo '<style>
  #meta, #meta2, #meta3 {width: 8%}
  </style>';
}


// Remove hero posts from the section pages ... category.php


function exclude_hero( $query ) {
    if ( !is_admin() && $query->is_category() && $query->is_main_query() ) {

        $meta_query = $query->get('meta_query');

        //Add our meta query to the original meta queries
        $meta_query[] = array(
                            'relation' => 'OR',
                            array(
                                'key'=>'featured_in_section_order',
                                'value'=>array("1 First story", "2 Second story", "3 Third story"),
                                'compare'=>'NOT IN',
                            ),
                            array(
                                'key'=>'featured_in_section_order',
                                'compare'=>'NOT EXISTS',
                            )
                        );
        $query->set('meta_query',$meta_query);
        $query->set('posts_per_page', 10);
        
    }
}
add_action( 'pre_get_posts', __NAMESPACE__ . '\\exclude_hero' );



/**
 * WordPress Bootstrap Pagination
 */

function wp_bootstrap_pagination( $args = array() ) {
    
    $defaults = array(
        'range'           => 4,
        'custom_query'    => FALSE,
        'previous_string' => __( 'Previous', 'text-domain' ),
        'next_string'     => __( 'Next', 'text-domain' ),
        'before_output'   => '<nav aria-label="Page navigation"><ul class="pagination">',
        'after_output'    => '</ul></nav>'
    );
    
    $args = wp_parse_args( 
        $args, 
        apply_filters( 'wp_bootstrap_pagination_defaults', $defaults )
    );
    
    $args['range'] = (int) $args['range'] - 1;
    if ( !$args['custom_query'] )
        $args['custom_query'] = @$GLOBALS['wp_query'];
    $count = (int) $args['custom_query']->max_num_pages;
    $page  = intval( get_query_var( 'paged' ) );
    $ceil  = ceil( $args['range'] / 2 );
    
    if ( $count <= 1 )
        return FALSE;
    
    if ( !$page )
        $page = 1;
    
    if ( $count > $args['range'] ) {
        if ( $page <= $args['range'] ) {
            $min = 1;
            $max = $args['range'] + 1;
        } elseif ( $page >= ($count - $ceil) ) {
            $min = $count - $args['range'];
            $max = $count;
        } elseif ( $page >= $args['range'] && $page < ($count - $ceil) ) {
            $min = $page - $ceil;
            $max = $page + $ceil;
        }
    } else {
        $min = 1;
        $max = $count;
    }
    
    $echo = '';
    $previous = intval($page) - 1;
    $previous = esc_attr( get_pagenum_link($previous) );
    
//    $firstpage = esc_attr( get_pagenum_link(1) );
//    if ( $firstpage && (1 != $page) )
//        $echo .= '<li><a class="page-link" aria-label="Previous" href="' . $firstpage . '">' . __( 'First', 'text-domain' ) . '</a></li>';

    if ( $previous && (1 != $page) )
        $echo .= '<li><a class="page-link" aria-label="Next" href="' . $previous . '" title="' . __( 'previous', 'text-domain') . '">' . $args['previous_string'] . '</a></li>';
    
    if ( !empty($min) && !empty($max) ) {
        for( $i = $min; $i <= $max; $i++ ) {
            if ($page == $i) {
                $echo .= '<li class="page-item active"><span class="active page-link">' . str_pad( (int)$i, 2, '0', STR_PAD_LEFT ) . '</span></li>';
            } else {
                $echo .= sprintf( '<li class="page-item"><a class="page-link" href="%s">%002d</a></li>', esc_attr( get_pagenum_link($i) ), $i );
            }
        }
    }
    
    $next = intval($page) + 1;
    $next = esc_attr( get_pagenum_link($next) );
    if ($next && ($count != $page) )
        $echo .= '<li><a class="page-link" href="' . $next . '" title="' . __( 'next', 'text-domain') . '">' . $args['next_string'] . '</a></li>';
    
//    $lastpage = esc_attr( get_pagenum_link($count) );
//    if ( $lastpage ) {
//        $echo .= '<li class="next"><a class="page-link" href="' . $lastpage . '">' . __( 'Last', 'text-domain' ) . '</a></li>';
//    }

    if ( isset($echo) )
        echo $args['before_output'] . $echo . $args['after_output'];
}



// UPDATE META FOR MULTIPLE POSTS
//
//add_action('init', __NAMESPACE__ . '\\update_all_templates_to_new');
//function update_all_templates_to_new()
//{
//    $args = array(
//        'posts_per_page'   => -1,
//        'meta_query' => array(
//            array(
//                'key'     => 'featured_story_featured_setting',
//                'value'   => 'Not featured',
//                'compare' => '',
//            ),
//        ),
//
//    );
//    $posts_array = get_posts( $args );
//    foreach($posts_array as $post_array)
//    {
//        update_post_meta($post_array->ID, 'featured_story_featured_setting', 'Not featured');
//    }
//}