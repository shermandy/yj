<?php get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
<div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
</div>
<?php get_search_form(); ?>
<?php endif; 

$count = 0;

while (have_posts()) : the_post();
    $count++;
    $yj_layout = get_theme_mod( 'yj_homepage' );

    if ($yj_layout == 'breaking' && $count == 1) {
        get_template_part('templates/content', 'breaking');
    } elseif ($yj_layout == 'breaking' && $count > 1) {
        get_template_part('templates/content', 'breaking-sub');
    } else {
        get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format());
    }

    ?>
<?php endwhile; ?>



<?php 
// Campus query
$campus_args = array(
    'category_name' => 'campus',
    'posts_per_page' => 5,
     'meta_query' => array(
        'relation' => 'AND',
        array(
            'key' => 'featured_story',
            'value' => 'No'
        ),
    ),
    
); ?>
    

<?php $campus_query = new WP_Query( $campus_args );

if ( $campus_query->have_posts() ) : ?>
    
        <div class="campus yj-section">
            <h3>Campus</h3>
       
	<!-- pagination here -->

	<!-- the loop -->
	<?php while ( $campus_query->have_posts() ) : $campus_query->the_post(); ?>
		<?php get_template_part('templates/content', 'breaking-sub'); ?>

	<?php endwhile; ?>
	<!-- end of the loop -->
        </div>
	<!-- pagination here -->
	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<?php 
// Sports query
$sports_args = array(
    'category_name' => 'sports',
    'posts_per_page' => 5,
     'meta_query' => array(
        'relation' => 'AND',
        array(
            'key' => 'featured_story',
            'value' => 'No'
        ),
    ),
    
);

// The Query
$sports_query = new WP_Query( $sports_args );

if ( $sports_query->have_posts() ) : ?>
        <div class="sports yj-section">
            <h3>Sports</h3>
        
	<!-- pagination here -->

	<!-- the loop -->
	<?php while ( $sports_query->have_posts() ) : $sports_query->the_post(); ?>
		<?php get_template_part('templates/content', 'breaking-sub'); ?>

	<?php endwhile; ?>
	<!-- end of the loop -->

	<!-- pagination here -->
        </div>
	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<?php 
if (!is_home() ) {
    the_posts_navigation();
}
?>

</div>