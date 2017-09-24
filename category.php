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