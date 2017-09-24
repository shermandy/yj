<?php
/*
 * Template Name: Featured Article
 * Template Post Type: post, page, product
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/entry', 'meta'); ?>
    <div class="featured-image">
        <?php if (has_post_thumbnail()) { ?>
            <?php the_post_thumbnail('single-full', array('class' => 'img-fluid')); ?>
            <div class="media-credit"><?php the_media_credit_html($post); ?></div>
    </div>
        <?php } ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
