<?php if(has_post_thumbnail()) {
    $classes = array('standard-news', 'has-thumbnail');
} else {
    $classes = array('standard-news', 'no-thumbnail');
}?>
<article <?php post_class($classes); ?>>
    <div class="section-summary">
        <h3 class="entry-title">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h3>
        <div class="section-meta">
            <?php if(!is_author()) {the_author_posts_link();} else {the_category(', ');} ?> <time><?php the_time(get_option('date_format'));?></time>
        </div>
        <?php if ( has_post_thumbnail() ) { ?>
        <div class="section-image">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('standard-thumbnail', array('class' => 'img-fluid')); ?>
            </a>
        </div>
        <?php } ?>
        <?php the_excerpt(); ?>
    </div>
</article>
