<article <?php post_class('three-news'); ?>>
    <?php if(has_post_thumbnail()) {?>
    <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail('three-large'); ?>
    </a>
    <?php } ?>
    <a href="<?php the_permalink(); ?>">
        <h2><?php the_title(); ?></h2>
    </a>
</article>
