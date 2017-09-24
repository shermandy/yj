<?php get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
<div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
</div>
<?php get_search_form(); ?>
<?php endif; 

// $count = 0;

// while (have_posts()) : the_post();
//    $count++;
//    $yj_layout = get_theme_mod( 'yj_homepage' );

//    if ($yj_layout == 'breaking' && $count == 1) {
//        get_template_part('templates/content', 'breaking');
//    } elseif ($yj_layout == 'breaking' && $count > 1) {
//        get_template_part('templates/content', 'breaking-sub');
//    } else {
//        get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format());
//    }

    ?>
<?php // endwhile; ?>



<?php 
// Campus query
$campus_args = array(
    'category_name' => 'campus',
    'posts_per_page' => 5,
    'meta_query' => array(
        'relation' => 'AND',
        array(
            'key' => 'featured_story_featured_setting',
            'value' => 'Not featured'
        ),
    ),
    
); ?>
    

<?php $campus_query = new WP_Query( $campus_args );
$campus_count = 0;

if ( $campus_query->have_posts() ) : ?>
        <div class="campus yj-section">
            <?php $category_id = get_cat_ID( 'campus' );
            $category_link = get_category_link( $category_id ); ?>
            <h2><a href="<?php echo $category_link; ?>" title="Category Name">Campus</a></h2>
                <div class="row">
	<!-- pagination here -->
	<?php while ( $campus_query->have_posts() ) : $campus_query->the_post(); ?>
            <?php $campus_count++; ?>
            <?php if ($campus_count == 1) { ?>
            <div class="col-md-6 large-story">
                <?php get_template_part('templates/content', 'sections-top'); ?>
            </div>
            <div class="col-md-6 small-stories">
            <?php } else { ?>
                <?php get_template_part('templates/content', 'sections'); ?>
            <?php } ?>
                        
	<?php endwhile; ?>
                    </div>
                </div>
	<!-- pagination here -->
            
	<?php wp_reset_postdata(); ?>

<?php else : ?>
	   <div class="campus yj-section">
     <?php $category_id = get_cat_ID( 'campus' );
            $category_link = get_category_link( $category_id ); ?>
            <h2><a href="<?php echo $category_link; ?>" title="Campus">Campus</a></h2>
           <p><?php _e( 'No posts available. Something went wrong.' ); ?></p>
        </div>
<?php endif; ?>
        </div>


<?php 
// Sports query
$sports_args = array(
    'category_name' => 'sports',
    'posts_per_page' => 5,
     'meta_query' => array(
        'relation' => 'AND',
        array(
            'key' => 'featured_story_featured_setting',
            'value' => 'Not featured'
        ),
    ),
    
); ?>

<?php $sports_query = new WP_Query( $sports_args );
$sports_count = 0;
if ( $sports_query->have_posts() ) : ?>
        <div class="sports yj-section">
            <?php $category_id = get_cat_ID( 'sports' );
            $category_link = get_category_link( $category_id ); ?>
            <h2><a href="<?php echo $category_link; ?>" title="Category Name">Sports</a></h2>
                <div class="row">
	<!-- pagination here -->
	<?php while ( $sports_query->have_posts() ) : $sports_query->the_post(); ?>
		<?php $sports_count++; ?>
                    <?php if ($sports_count == 1) { ?>
                    <div class="col-md-6 large-story">
                        <?php get_template_part('templates/content', 'sections-top'); ?>
                    </div>
                    <div class="col-md-6 small-stories">
                    <?php } else { ?>
                        <?php get_template_part('templates/content', 'sections'); ?>
                    <?php } ?>
                        
	<?php endwhile; ?>
                    </div>
                </div>
	<!-- pagination here -->
	<?php wp_reset_postdata(); ?>

<?php else : ?>
        <div class="sports yj-section">
     <?php $category_id = get_cat_ID( 'sports' );
            $category_link = get_category_link( $category_id ); ?>
            <h2><a href="<?php echo $category_link; ?>" title="Category Name">Sports</a></h2>	       <p><?php _e( 'No posts available. Something went wrong.' ); ?></p>
        </div>
    <?php endif; ?>
        </div>

<?php 
// Arts and Life query
$arts_args = array(
    'category_name' => 'arts-and-life',
    'posts_per_page' => 5,
     'meta_query' => array(
        'relation' => 'AND',
        array(
            'key' => 'featured_story_featured_setting',
            'value' => 'Not featured'
        ),
    ),
    
); ?>

<?php $arts_query = new WP_Query( $arts_args );
$arts_count = 0;
if ( $arts_query->have_posts() ) : ?>
        <div class="arts yj-section">
     <?php $category_id = get_cat_ID( 'arts-and-life' );
            $category_link = get_category_link( $category_id ); ?>
            <h2><a href="<?php echo $category_link; ?>" title="Arts &amp; Life">Arts &amp; Life</a></h2>
            <div class="row">
	<!-- pagination here -->
	<?php while ( $arts_query->have_posts() ) : $arts_query->the_post(); ?>
		<?php $arts_count++; ?>
                    <?php if ($arts_count == 1) { ?>
                    <div class="col-md-6 large-story">
                        <?php get_template_part('templates/content', 'sections-top'); ?>
                    </div>
                    <div class="col-md-6 small-stories">
                    <?php } else { ?>
                        <?php get_template_part('templates/content', 'sections'); ?>
                    <?php } ?>
                        
	<?php endwhile; ?>
                    </div>
                </div>
	<!-- pagination here -->
	<?php wp_reset_postdata(); ?>

<?php else : ?>
        <div class="arts yj-section">
     <?php $category_id = get_cat_ID( 'arts-and-life' );
            $category_link = get_category_link( $category_id ); ?>
            <h2><a href="<?php echo $category_link; ?>" title="Arts &amp; Life">Arts &amp; Life</a></h2>
	       <p><?php _e( 'No posts available. Something went wrong.' ); ?></p>
        </div>
<?php endif; ?>

<?php 
// Region query
$region_args = array(
    'category_name' => 'region',
    'posts_per_page' => 5,
     'meta_query' => array(
        'relation' => 'AND',
        array(
            'key' => 'featured_story_featured_setting',
            'value' => 'Not featured'
        ),
    ),
    
); ?>

<?php $region_query = new WP_Query( $region_args );
$region_count = 0;
if ( $region_query->have_posts() ) : ?>
        <div class="region yj-section">
     <?php $category_id = get_cat_ID( 'region' );
            $category_link = get_category_link( $category_id ); ?>
            <h2><a href="<?php echo $category_link; ?>" title="Region">Region</a></h2>
                <div class="row">
	<!-- pagination here -->
	<?php while ( $region_query->have_posts() ) : $region_query->the_post(); ?>
		<?php $region_count++; ?>
                    <?php if ($region_count == 1) { ?>
                    <div class="col-md-6 large-story">
                        <?php get_template_part('templates/content', 'sections-top'); ?>
                    </div>
                    <div class="col-md-6 small-stories">
                    <?php } else { ?>
                        <?php get_template_part('templates/content', 'sections'); ?>
                    <?php } ?>
                        
	<?php endwhile; ?>
                    </div>
                </div>
	<!-- pagination here -->
	<?php wp_reset_postdata(); ?>

<?php else : ?>
        <div class="region yj-section">
     <?php $category_id = get_cat_ID( 'Region' );
            $category_link = get_category_link( $category_id ); ?>
            <h2><a href="<?php echo $category_link; ?>" title="Region">Arts &amp; Life</a></h2>
	       <p><?php _e( 'No posts available. Something went wrong.' ); ?></p>
        </div>
<?php endif; ?>
            
            
            
<?php 
// Region query
$oped_args = array(
    'category_name' => 'op-ed',
    'posts_per_page' => 5,
     'meta_query' => array(
        'relation' => 'AND',
        array(
            'key' => 'featured_story_featured_setting',
            'value' => 'Not featured'
        ),
    ),
    
); ?>

<?php $oped_query = new WP_Query( $oped_args );
$oped_count = 0;
if ( $oped_query->have_posts() ) : ?>
        <div class="op-ed yj-section">
     <?php $category_id = get_cat_ID( 'opinion-editorial' );
            $category_link = get_category_link( $category_id ); ?>
            <h2><a href="<?php echo $category_link; ?>" title="Opinion">Opinion</a></h2>
                <div class="row">
	<!-- pagination here -->
	<?php while ( $oped_query->have_posts() ) : $oped_query->the_post(); ?>
		<?php $oped_count++; ?>
                    <?php if ($oped_count == 1) { ?>
                    <div class="col-md-6 large-story">
                        <?php get_template_part('templates/content', 'sections-top'); ?>
                    </div>
                    <div class="col-md-6 small-stories">
                    <?php } else { ?>
                        <?php get_template_part('templates/content', 'sections'); ?>
                    <?php } ?>
                        
	<?php endwhile; ?>
                    </div>
                </div>
	<!-- pagination here -->
	<?php wp_reset_postdata(); ?>

<?php else : ?>
        <div class="op-ed yj-section">
     <?php $category_id = get_cat_ID( 'op-ed' );
            $category_link = get_category_link( $category_id ); ?>
            <h2><a href="<?php echo $category_link; ?>" title="Opinion">Opinion</a></h2>
	       <p><?php _e( 'No posts available. Something went wrong.' ); ?></p>
        </div>
<?php endif; ?>