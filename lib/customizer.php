<?php

namespace Roots\Sage\Customizer;

use Roots\Sage\Assets;

/**
 * Add postMessage support
 */
function customize_register($wp_customize) {
    // All sections, settings, and controls
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    
    $wp_customize->add_section(
        'yj_display_options',
        array(
            'title'     => 'Display Options',
            'priority'  => 1
        )
    );
    
    $wp_customize->add_setting(
        'yj_homepage',
            array(
                'default'     => 'three'
            )
    );
    
    $wp_customize->add_control(
        'yj_control_id', 
        array(
            'label'    => __( 'Front page style', 'yj' ),
            'section'  => 'yj_display_options',
            'settings' => 'yj_homepage',
            'type'     => 'select',
            'choices'  => array(
                'breaking'  => 'Breaking news layout',
                'three'  => 'Three stories layout',
                'two'  => 'Two stories layout',
                'standard' => 'Standard layout',
            ),
        )
    );
    
    $wp_customize->add_setting(
        'yj_campus',
            array(
                'default'     => 'three'
            )
    );
    
    $wp_customize->add_control(
        'yj_campus_control_id', 
        array(
            'label'    => __( 'Campus page style', 'yj' ),
            'section'  => 'yj_display_options',
            'settings' => 'yj_campus',
            'type'     => 'select',
            'choices'  => array(
                'breaking'  => 'Breaking news layout',
                'three'  => 'Three stories layout',
                'two'  => 'Two stories layout',
                'standard' => 'Standard layout',
            ),
        )
    );
    
    $wp_customize->add_setting(
        'yj_region',
            array(
                'default'     => 'three'
            )
    );
    
    $wp_customize->add_control(
        'yj_region_control_id', 
        array(
            'label'    => __( 'Region page style', 'yj' ),
            'section'  => 'yj_display_options',
            'settings' => 'yj_region',
            'type'     => 'select',
            'choices'  => array(
                'breaking'  => 'Breaking news layout',
                'three'  => 'Three stories layout',
                'two'  => 'Two stories layout',
                'standard' => 'Standard layout',
            ),
        )
    );
    
    $wp_customize->add_setting(
        'yj_arts-and-life',
            array(
                'default'     => 'three'
            )
    );
    
    $wp_customize->add_control(
        'yj_arts-and-life_control_id', 
        array(
            'label'    => __( 'Arts & Life page style', 'yj' ),
            'section'  => 'yj_display_options',
            'settings' => 'yj_arts-and-life',
            'type'     => 'select',
            'choices'  => array(
                'breaking'  => 'Breaking news layout',
                'three'  => 'Three stories layout',
                'two'  => 'Two stories layout',
                'standard' => 'Standard layout',
            ),
        )
    );
    
    $wp_customize->add_setting(
        'yj_opinion',
            array(
                'default'     => 'three'
            )
    );
    
    $wp_customize->add_control(
        'yj_op-ed_control_id', 
        array(
            'label'    => __( 'Op-ed page style', 'yj' ),
            'section'  => 'yj_display_options',
            'settings' => 'yj_op-ed',
            'type'     => 'select',
            'choices'  => array(
                'breaking'  => 'Breaking news layout',
                'three'  => 'Three stories layout',
                'two'  => 'Two stories layout',
                'standard' => 'Standard layout',
            ),
        )
    );
    
    $wp_customize->add_setting(
        'yj_sports',
            array(
                'default'     => 'three'
            )
    );
    
    $wp_customize->add_control(
        'yj_sports_control_id', 
        array(
            'label'    => __( 'Sports page style', 'yj' ),
            'section'  => 'yj_display_options',
            'settings' => 'yj_sports',
            'type'     => 'select',
            'choices'  => array(
                'breaking'  => 'Breaking news layout',
                'three'  => 'Three stories layout',
                'two'  => 'Two stories layout',
                'standard' => 'Standard layout',
            ),
        )
    );
    
    $wp_customize->add_setting(
        'yj_op-ed',
            array(
                'default'     => 'three'
            )
    );
    
    $wp_customize->add_control(
        'yj_op-ed_control_id', 
        array(
            'label'    => __( 'Op-ed page style', 'yj' ),
            'section'  => 'yj_display_options',
            'settings' => 'yj_op-ed',
            'type'     => 'select',
            'choices'  => array(
                'breaking'  => 'Breaking news layout',
                'three'  => 'Three stories layout',
                'two'  => 'Two stories layout',
                'standard' => 'Standard layout',
            ),
        )
    );
    
}
add_action('customize_register', __NAMESPACE__ . '\\customize_register');

/**
 * Customizer JS
 */
function customize_preview_js() {
  wp_enqueue_script('sage/customizer', Assets\asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
}
add_action('customize_preview_init', __NAMESPACE__ . '\\customize_preview_js');
