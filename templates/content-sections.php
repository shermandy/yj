<?php if ( has_post_thumbnail() ) {
    $has_thumb = "has-thumbnail";
} else {
    $has_thumb = "no-thumbnail";
}
?>

<article <?php post_class( 'section-news ' . $has_thumb ); ?>>
    <?php if ( has_post_thumbnail() ) { ?>
    <div class="section-image">
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('section-small'); ?>
        </a>
    </div>
    <?php } ?>
    <div class="section-summary">
        <h3 class="entry-title">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h3>
        <div class="section-meta">
            <?php // the_author_link(); ?> <time><?php the_time(get_option('date_format'));?></time>
        </div>
    </div>
</article>
