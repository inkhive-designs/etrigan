<?php
//COVERFLOW
function etrigan_customize_register_top_coverflow_slider( $wp_customize ) {
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
}
add_action( 'customize_register', 'etrigan_customize_register_top_coverflow_slider' );