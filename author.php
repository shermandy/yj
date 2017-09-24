</main>
</div>
</div>
<?php
        get_template_part('templates/author-bio');
?>

<div class="wrap container">
<div class="row">
    <main class="main col-md-8">
<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>

<?php endwhile; ?>

<?php if ( function_exists('Roots\Sage\Extras\wp_bootstrap_pagination') ) {
    Roots\Sage\Extras\wp_bootstrap_pagination();
} else {
    the_posts_pagination( array( 'mid_size' => 2 ) );
} ?>
        

<?php $author_id = get_the_author_meta('ID'); ?>
<?php display_author_media($author_id, $sidebar = false, $limit = 0, $link_without_parent = false, $header = "<h3>Recent Photographs</h3>", $exclude_unattached = true); ?>