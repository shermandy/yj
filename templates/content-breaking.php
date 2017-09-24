<?php if(has_post_thumbnail()) {
    $classes = array('breaking-news', 'has-thumbnail');
} else {
    $classes = array('breaking-news', 'no-thumbnail');
}?>
<article <?php post_class($classes); ?>>
  <header>
      <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('breaking-thumbnail'); ?></a>
      <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  </header>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
</article>