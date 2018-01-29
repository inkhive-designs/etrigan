<?php
//featured-post showcase
function etrigan_customize_register_featured_umega( $wp_customize ) {
$wp_customize->add_section(
    'etrigan_fumega_showcase',
    array(
        'title'     => 'Custom Posts Showcase',
        'priority'  => 40,
        'panel'     => 'etrigan_a_fcp_panel',
    )
);
$wp_customize->add_setting(
    'etrigan_fumega_enable',
    array( 'sanitize_callback' => 'etrigan_sanitize_checkbox' )
);

$wp_customize->add_control(
    'etrigan_fumega_enable', array(
        'settings' => 'etrigan_fumega_enable',
        'label'    => __( 'Enable Posts Showcase section.', 'etrigan' ),
        'description' =>__('Upto 30 word for better performance','etrigan'),
        'section'  => 'etrigan_fumega_showcase',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'etrigan_fumega_showcase_title',
    array( 'sanitize_callback' => 'sanitize_text_field' )
);

$wp_customize->add_control(
    'etrigan_fumega_showcase_title', array(
        'settings' => 'etrigan_fumega_showcase_title',
        'label'    => __( 'Title for the Featured Showcase section','etrigan' ),
        'section'  => 'etrigan_fumega_showcase',
        'type'     => 'text',
    )
);

$wp_customize->add_setting(
    'etrigan_fumega_showcase_desc',
    array( 'sanitize_callback' => 'sanitize_text_field' )
);
$wp_customize->add_control(
    'etrigan_fumega_showcase_desc', array(
        'settings' => 'etrigan_fumega_showcase_desc',
        'label'    => __( 'Description for the Featured Showcase section','etrigan' ),
        'description' => __( 'You can add 2 or 3 lines of description.','etrigan' ),
        'section'  => 'etrigan_fumega_showcase',
        'type'     => 'textarea',
    )
);



$wp_customize->add_setting(
    'etrigan_fumega_cat',
    array( 'sanitize_callback' => 'etrigan_sanitize_category' )
);
$wp_customize->add_control(
    new Etrigan_WP_Customize_Category_Control(
        $wp_customize,
        'etrigan_fumega_cat',
        array(
            'label'    => __('Posts Category.','etrigan'),
            'settings' => 'etrigan_fumega_cat',
            'section'  => 'etrigan_fumega_showcase'
        )
    )
);
}
add_action( 'customize_register', 'etrigan_customize_register_featured_umega' );