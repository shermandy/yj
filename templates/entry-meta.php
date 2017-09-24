<div class="entry-meta">
    <time class="updated" datetime="<?= get_post_time('c', true); ?>"><?= get_the_date(); ?></time>
    <p class="byline author vcard"><?= __('By', 'sage'); ?> 
    <?php if ( function_exists( 'coauthors_posts_links' ) ) {
        coauthors_posts_links();
    } else {
        the_author_posts_link();
    } ?>
        
    </p>
</div>
