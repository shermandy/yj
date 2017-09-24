<?php while (have_posts()) : the_post(); ?>

<article <?php post_class(); ?>>
    <header>
        <h1 class="entry-title">
            <?php the_title(); ?>
        </h1>
        <?php get_template_part('templates/entry-meta'); ?>
    </header>
    <div class="entry-content">
        <?php if (has_post_thumbnail()) { ?>
        <?php the_post_thumbnail('single-full', array('class' => 'img-fluid')); ?>
        <div class="media-credit">
            <?php the_media_credit_html($post); ?>
        </div>
        <?php } ?>
        <?php the_content(); ?>
    </div>
    <footer>
        <?php wp_link_pages(['before' => '<nav class="page-nav"><p><span class="link-pages-title">' . __('Pages:', 'sage') . '</span>', 'after' => '</p></nav>', 'link_before' => '<span>', 'link_after'  => '</span>',]); ?>
    </footer>

    <?php comments_template('/templates/comments.php'); ?>
</article>
<?php endwhile; ?>
