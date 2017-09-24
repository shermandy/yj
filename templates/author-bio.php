<div class="author-bio">
    <div class="container">
        <?php echo get_avatar( get_the_author_meta( 'ID' ) , 125 ); ?>
        <h2>
            <?php the_author(); ?>
        </h2>
        <?php if (get_the_author_meta('position')) { ?>
            <h3><?php the_author_meta('position'); ?></h3>
        <?php } ?>
        
        <p><?php the_author_meta('description'); ?></p>
        <ul class="author-links">
            <?php if (get_the_author_meta('twitter')) { ?>
                <li><a href="<?php the_author_meta('twitter'); ?>" target="_new"><i class="fa fa-twitter" aria-hidden="true"></i>Twitter</a></li>
            <?php }
            if (get_the_author_meta('facebook')) { ?>
                <li><a href="<?php the_author_meta('facebook'); ?>" target="_new"><i class="fa fa-facebook" aria-hidden="true"></i>Facebook</a></li>
            <?php }
            if (get_the_author_meta('url')) { ?>
                <li><a href="<?php the_author_meta('url'); ?>" target="_new"><i class="fa fa-globe" aria-hidden="true"></i>Website</a></li>
            <?php } ?>
        </ul>
    </div>
</div>
