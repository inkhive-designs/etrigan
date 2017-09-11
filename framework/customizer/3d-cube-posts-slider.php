<?php
function etrigan_customize_register_3d_cube_slider( $wp_customize ) {
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
'title'     => __('3D Cube Posts Slider','etrigan'),
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
array( 'sanitize_callback' => 'etrigan_sanitize_category' )
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
}
add_action( 'customize_register', 'etrigan_customize_register_3d_cube_slider' );
?>
