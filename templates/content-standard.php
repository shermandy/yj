<?php if(has_post_thumbnail()) {
    $classes = array('standard-news', 'has-thumbnail');
} else {
    $classes = array('standard-news', 'no-thumbnail');
}?>
<article <?php post_class($classes); ?>>
  <header>
    <?php if ( has_post_thumbnail() ) { ?>
    <div class="section-image">
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('single-full', array('class' => 'img-fluid')); ?>
        </a>
    </div>
    <?php } ?>
      <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <?php get_template_part('templates/entry-meta'); ?>
  </header>
    
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
</article>