<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

    <!doctype html>
    <html <?php language_attributes(); ?>>
    <?php get_template_part('templates/head'); ?>

    <body <?php body_class(); ?>>
        <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
        <?php
    do_action('get_header');
    get_template_part('templates/header');
    $yj_layout = get_theme_mod( 'yj_homepage' );

    if (is_category()){
        $current_category = get_category( get_query_var( 'cat' ) );
        $cat_slug = $current_category->slug;
        $section_layout_setting = get_theme_mod( 'yj_'.$cat_slug );
    }
    ?>
        
            <div class="wrap container" role="document">
                <div class="content row">
                    <?php if(is_sticky() && !is_single()) {
                        get_template_part('templates/content', 'sticky');
                    }?>
                    <?php if(is_home()) { ?>
                        <div class="hero <?php if ($yj_layout == 'three') {echo 'three-hero';} elseif ($yj_layout == 'two') {echo 'two-hero';}?>">
                            <?php get_template_part('templates/hero'); ?>
                        </div>
                    <?php } elseif (is_category()) { ?>
                        <div class="hero <?php if ($section_layout_setting == 'three') {echo 'three-hero';} elseif ($section_layout_setting == 'two') {echo 'two-hero';}?>">
                            <?php get_template_part('templates/hero-section'); ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="row">
                    <main class="main col-md-8">
                        <?php include Wrapper\template_path(); ?>
                    </main>
                    <!-- /.main -->
                    <?php if (Setup\display_sidebar()) : ?>
                    <aside class="sidebar col-md-4">
                        <?php include Wrapper\sidebar_path(); ?>
                    </aside>
                    <!-- /.sidebar -->
                    <?php endif; ?>
                </div>
                <!-- /.content -->
            </div>
            <!-- /.wrap -->
            <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      wp_footer();
    ?>
    </body>

    </html>
