<h2>
    <?php bloginfo('name'); ?> Staff</h2>
<?php if (!have_posts()) : ?>



<div class="alert alert-warning">
    <?php _e('Uhhh.... we cannot find any staff members.', 'sage'); ?>
</div>
<?php get_search_form(); ?>
<?php endif; ?>

<?php while (have_posts()) : the_post();
global $post;
$slug = $post->post_name;
?>
<div class="staff-member">
    <?php 
    $image = get_field('photo');
    $size = 'staff-section-thumb';
    $size_square = 'staff-section-square-thumb';

    if( $image ) { ?>
        <a href="#<?php echo $slug ?>Modal" data-toggle="modal" data-target="#<?php echo $slug ?>Modal">
            <?php
            echo wp_get_attachment_image( $image, $size );
            ?>
        </a>
    <?php }
    
    the_title( '<h3><a href="#' . $slug . 'Modal" data-toggle="modal" data-target="#' . $slug . 'Modal">', '</a></h3>' );
    ?>
        <h4>
            <a href="#<?php echo $slug ?>Modal" data-toggle="modal" data-target="#<?php echo $slug ?>Modal">
                <?php the_field('staff_position'); ?>
            </a>
        </h4>

        <!-- Modal -->
        <div class="modal fade" id="<?php echo $slug ?>Modal" tabindex="-1" role="dialog" aria-labelledby="<?php echo $slug ?>ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                    <div class="modal-body">
                        <?php if( $image ) { ?>
                        <div class="modal-picture">
                            <div class="img-circle">
                                <?php echo wp_get_attachment_image( $image, $size_square ); ?>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="modal-bio">
                            <?php the_title( '<h3>', '</h3>' ); ?>
                            <h4><?php the_field('staff_position'); ?></h4>
                            <p class="modal-bio-text"><?php the_field('bio'); ?></p>
                            <ul class="modal-links">
                                <?php if (get_field('twitter')) { ?>
                                <li><a href="<?php the_field('twitter');?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i>Twitter</a></li>
                                <?php } ?>
                                <?php if (get_field('facebook')) { ?>
                                <li><a href="<?php the_field('facebook');?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i>Facebook</a></li>
                                <?php } ?>
                                <?php if (get_field('url')) { ?>
                                <li><a href="<?php the_field('url');?>" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i>Website</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php endwhile; ?>

<?php if ( function_exists('Roots\Sage\Extras\wp_bootstrap_pagination') ) {
    Roots\Sage\Extras\wp_bootstrap_pagination();
} else {
    the_posts_pagination( array( 'mid_size' => 2 ) );
} ?>
