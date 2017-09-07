<?php
// CREATE THE fcp PANEL
function etrigan_customize_register_post_showcase( $wp_customize ) {
$wp_customize->add_panel( 'etrigan_a_fcp_panel', array(
    'priority'       => 40,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => 'Featured Posts Showcase',
    'description'    => '',
) );




//SLIDER
$wp_customize->add_section(
    'etrigan_a_fc_slider',
    array(
        'title'     => __('3D Cube Products Slider','etrigan'),
        'priority'  => 10,
        'panel'     => 'etrigan_a_fcp_panel',
        'description' => 'This is the Posts Slider, displayed left to the square boxes.',
    )
);


$wp_customize->add_setting(
    'etrigan_a_slider_title',
    array( 'sanitize_callback' => 'sanitize_text_field' )
);

$wp_customize->add_control(
    'etrigan_a_slider_title', array(
        'settings' => 'etrigan_a_slider_title',
        'label'    => __( 'Title for the Slider', 'etrigan' ),
        'section'  => 'etrigan_a_fc_slider',
        'type'     => 'text',
    )
);

$wp_customize->add_setting(
    'etrigan_a_slider_count',
    array( 'sanitize_callback' => 'etrigan_sanitize_positive_number' )
);

$wp_customize->add_control(
    'etrigan_a_slider_count', array(
        'settings' => 'etrigan_a_slider_count',
        'label'    => __( 'No. of Posts(Min:3, Max: 10)', 'etrigan' ),
        'section'  => 'etrigan_a_fc_slider',
        'type'     => 'range',
        'input_attrs' => array(
            'min'   => 3,
            'max'   => 10,
            'step'  => 1,
            'class' => 'test-class test',
            'style' => 'color: #0a0',
        ),
    )
);

$wp_customize->add_setting(
    'etrigan_a_slider_cat',
    array( 'sanitize_callback' => 'etrigan_sanitize_product_category' )
);

$wp_customize->add_control(
    new Etrigan_WP_Customize_Category_Control(
        $wp_customize,
        'etrigan_a_slider_cat',
        array(
            'label'    => __('Category For Slider.','etrigan'),
            'settings' => 'etrigan_a_slider_cat',
            'section'  => 'etrigan_a_fc_slider'
        )
    )
);



//COVERFLOW

$wp_customize->add_section(
    'etrigan_a_fc_coverflow',
    array(
        'title'     => __('Top CoverFlow Slider','etrigan'),
        'priority'  => 5,
        'panel'     => 'etrigan_a_fcp_panel'
    )
);

$wp_customize->add_setting(
    'etrigan_a_coverflow_title',
    array( 'sanitize_callback' => 'sanitize_text_field' )
);

$wp_customize->add_control(
    'etrigan_a_coverflow_title', array(
        'settings' => 'etrigan_a_coverflow_title',
        'label'    => __( 'Title for the Coverflow', 'etrigan' ),
        'section'  => 'etrigan_a_fc_coverflow',
        'type'     => 'text',
    )
);

$wp_customize->add_setting(
    'etrigan_a_coverflow_enable',
    array( 'sanitize_callback' => 'etrigan_sanitize_checkbox' )
);

$wp_customize->add_control(
    'etrigan_a_coverflow_enable', array(
        'settings' => 'etrigan_a_coverflow_enable',
        'label'    => __( 'Enable', 'etrigan' ),
        'section'  => 'etrigan_a_fc_coverflow',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'etrigan_a_coverflow_cat',
    array( 'sanitize_callback' => 'etrigan_sanitize_category' )
);


$wp_customize->add_control(
    new Etrigan_WP_Customize_Category_Control(
        $wp_customize,
        'etrigan_a_coverflow_cat',
        array(
            'label'    => __('Category For Image Grid','etrigan'),
            'settings' => 'etrigan_a_coverflow_cat',
            'section'  => 'etrigan_a_fc_coverflow'
        )
    )
);

$wp_customize->add_setting(
    'etrigan_a_coverflow_pc',
    array( 'sanitize_callback' => 'etrigan_sanitize_positive_number' )
);

$wp_customize->add_control(
    'etrigan_a_coverflow_pc', array(
        'settings' => 'etrigan_a_coverflow_pc',
        'label'    => __( 'Max No. of Posts in the Grid. Min: 5.', 'etrigan' ),
        'section'  => 'etrigan_a_fc_coverflow',
        'type'     => 'number',
        'default'  => '0'
    )
);


//SQUARE BOXES
$wp_customize->add_section(
    'etrigan_a_fc_boxes',
    array(
        'title'     => 'Square Boxes',
        'priority'  => 10,
        'panel'     => 'etrigan_a_fcp_panel'
    )
);

$wp_customize->add_setting(
    'etrigan_a_box_enable',
    array( 'sanitize_callback' => 'etrigan_sanitize_checkbox' )
);

$wp_customize->add_control(
    'etrigan_a_box_enable', array(
        'settings' => 'etrigan_a_box_enable',
        'label'    => __( 'Enable Square Boxes & Posts Slider.', 'etrigan' ),
        'section'  => 'etrigan_a_fc_boxes',
        'type'     => 'checkbox',
    )
);


$wp_customize->add_setting(
    'etrigan_a_box_title',
    array( 'sanitize_callback' => 'sanitize_text_field' )
);

$wp_customize->add_control(
    'etrigan_a_box_title', array(
        'settings' => 'etrigan_a_box_title',
        'label'    => __( 'Title for the Boxes','etrigan' ),
        'section'  => 'etrigan_a_fc_boxes',
        'type'     => 'text',
    )
);

$wp_customize->add_setting(
    'etrigan_a_box_cat',
    array( 'sanitize_callback' => 'etrigan_sanitize_product_category' )
);

$wp_customize->add_control(
    new Etrigan_WP_Customize_Category_Control(
        $wp_customize,
        'etrigan_a_box_cat',
        array(
            'label'    => __('Posts Category.','etrigan'),
            'settings' => 'etrigan_a_box_cat',
            'section'  => 'etrigan_a_fc_boxes'
        )
    )
);

//featured-post showcase
    $wp_customize->add_section(
        'etrigan_fpost_showcase',
        array(
            'title'     => 'Featured Posts Showcase',
            'priority'  => 40,
            'panel'     => 'etrigan_a_fcp_panel',
        )
    );
    $wp_customize->add_setting(
        'etrigan_fpost_showcase_enable',
        array( 'sanitize_callback' => 'etrigan_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'etrigan_fpost_showcase_enable', array(
            'settings' => 'etrigan_fpost_showcase_enable',
            'label'    => __( 'Enable Featured Posts Showcase .', 'etrigan' ),
            'section'  => 'etrigan_fpost_showcase',
            'type'     => 'checkbox',
        )
    );
    $wp_customize->add_setting(
        'etrigan_fpost_showcase_title',
        array( 'sanitize_callback' => 'sanitize_text_field' )
    );
    $wp_customize->add_control(
        'etrigan_fpost_showcase_title', array(
            'settings' => 'etrigan_fpost_showcase_title',
            'label'    => __( 'Title for the Showcase','etrigan' ),
            'decription' => __('It will be appear at left side of the showcase area.','etrigan'),
            'section'  => 'etrigan_fpost_showcase',
            'type'     => 'text',
        )
    );
    $wp_customize->add_setting(
        'etrigan_fpost_showcase_desc',
        array( 'sanitize_callback' => 'sanitize_text_field' )
    );
    $wp_customize->add_control(
        'etrigan_fpost_showcase_desc', array(
            'settings' => 'etrigan_fpost_showcase_desc',
            'label'    => __( 'Description for the Showcase','etrigan' ),
            'decription' => __('It will be appear at left side of the showcase area.','etrigan'),
            'section'  => 'etrigan_fpost_showcase',
            'type'     => 'textarea',
        )
    );

    $wp_customize->add_setting(
        'etrigan_fpost_showcase_post_title',
        array( 'sanitize_callback' => 'sanitize_text_field' )
    );

    $wp_customize->add_control(
        'etrigan_fpost_showcase_post_title', array(
            'settings' => 'etrigan_fpost_showcase_post_title',
            'label'    => __( 'Title for the Featured Posts','etrigan' ),
            'section'  => 'etrigan_fpost_showcase',
            'type'     => 'text',
        )
    );

    $wp_customize->add_setting(
        'fpost_showcase_cat',
        array( 'sanitize_callback' => 'etrigan_sanitize_product_category' )
    );
    $wp_customize->add_control(
        new Etrigan_WP_Customize_Category_Control(
            $wp_customize,
            'fpost_showcase_cat',
            array(
                'label'    => __('Posts Category.','etrigan'),
                'settings' => 'fpost_showcase_cat',
                'section'  => 'etrigan_fpost_showcase'
            )
        )
    );
}
add_action( 'customize_register', 'etrigan_customize_register_post_showcase' );