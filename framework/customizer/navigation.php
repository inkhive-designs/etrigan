<?php
//Settings for Nav Area
function etrigan_customize_register_navigation( $wp_customize ) {
$wp_customize->add_section(
    'etrigan_menu_basic',
    array(
        'title'     => __('Basic Settings','etrigan'),
        'priority'  => 0,
        'panel'     => 'nav_menus'
    )
);

$wp_customize->add_setting( 'etrigan_disable_nav_desc' , array(
    'default'     => true,
    'sanitize_callback' => 'etrigan_sanitize_checkbox',
) );

$wp_customize->add_control(
    'etrigan_disable_nav_desc', array(
    'label' => __('Disable Description of Menu Items','etrigan'),
    'section' => 'etrigan_menu_basic',
    'settings' => 'etrigan_disable_nav_desc',
    'type' => 'checkbox'
) );

}
add_action( 'customize_register', 'etrigan_customize_register_navigation' );