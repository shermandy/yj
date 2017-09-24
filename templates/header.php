<header class="banner">
    <div class="container">
        <a href="#" id="toggle" onclick="return false;"><span></span></a>
            <h1 class="logo">
                <?php if ( function_exists( 'the_custom_logo' ) ) {
            the_custom_logo();
            }?>
            </h1>
        <a href="#" id="search" onclick="return false;"><i class="fa fa-search" aria-hidden="true"></i></a>
    </div>
    <nav class="nav-primary" id="menu">
        <div class="container">
            <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
      endif;
      ?>
            <?php
      if (has_nav_menu('primary_navigation_social')) :
        wp_nav_menu(['theme_location' => 'primary_navigation_social', 'menu_class' => 'nav-social']);
      endif;
      ?>
        </div>
    </nav>
    <div class="search-box">
        <div class="container">
            <?php get_search_form(); ?>
        </div>
    </div>
    
</header>
