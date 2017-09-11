<?php
//SQUARE BOXES
function etrigan_customize_register_fposts_square_boxes( $wp_customize ) {
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
    array( 'sanitize_callback' => 'etrigan_sanitize_category' )
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
}
add_action( 'customize_register', 'etrigan_customize_register_fposts_square_boxes' );