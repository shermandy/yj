<article <?php post_class( 'sticky alert alert-info'); ?>>
    <?php if ( has_post_thumbnail() ) { ?>
    <div class="sticky-img img-fluid">
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('breaking-sub-thumbnail'); ?>
        </a>
    </div>
    <?php } ?>
    <div class="sticky-summary">
        <h2 class="entry-title">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>
        <?php the_excerpt(); ?>
    </div>
</article>
