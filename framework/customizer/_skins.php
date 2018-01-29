<?php
//Select the Default Theme Skin
function etrigan_customize_register_skin( $wp_customize ) {
    $wp_customize->get_section('colors')->panel = 'etrigan_skins&colors_panel';

    $wp_customize->add_panel('etrigan_skins&colors_panel', array(
        'priority' => 3,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __('Skins & Colors', 'etrigan'),
    ));
$wp_customize->add_section(
    'etrigan_skin_options',
    array(
        'title'     => __('Choose Skins','etrigan'),
        'priority'  => 39,
        'panel' => 'etrigan_skins&colors_panel'
    )
);

$wp_customize->add_setting(
    'etrigan_skin',
    array(
        'default'=> 'default',
        'sanitize_callback' => 'etrigan_sanitize_skin'
    )
);

$skins = array( 'default' => __('Default(blue)','etrigan'),
    'orange' =>  __('Orange','etrigan'),
    'red' =>  __('Red','etrigan'),
    'posy' =>  __('Posy','etrigan'),
    'grape' =>  __('Grape','etrigan'),
);


$wp_customize->add_control(
    'etrigan_skin',array(
        'settings' => 'etrigan_skin',
        'section'  => 'etrigan_skin_options',
        'description' => __('<a target="_blank" href="https://rohitink.com/product/etrigan-pro/">Etrigan Pro</a> has options for Unlimited Skins and a Custom Skin Builder. Watch this <a target="_blank" href="https://www.youtube.com/watch?v=wpx3LnsS7sg">Tutorial video</a> on How Skin Designer Works.','etrigan'),
        'type' => 'select',
        'choices' => $skins,
    )
);

function etrigan_sanitize_skin( $input ) {
    if ( in_array($input, array('default','orange','red','posy','grape') ) )
        return $input;
    else
        return '';
}
}
add_action( 'customize_register', 'etrigan_customize_register_skin' );