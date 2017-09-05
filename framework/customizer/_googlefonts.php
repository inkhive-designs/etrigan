<?php
//Fonts
function etrigan_customize_register_fonts( $wp_customize ) {
$wp_customize->add_section(
    'etrigan_typo_options',
    array(
        'title'     => __('Google Web Fonts','etrigan'),
        'priority'  => 41,
        'description' => __('Defaults: Droid Serif, Ubuntu.','etrigan')
    )
);

$font_array = array('Raleway','Khula','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora','Source Sans Pro','PT Sans','Ubuntu','Lobster','Arimo','Bitter','Noto Sans');
$fonts = array_combine($font_array, $font_array);

$wp_customize->add_setting(
    'etrigan_title_font',
    array(
        'default'=> 'Droid Serif',
        'sanitize_callback' => 'etrigan_sanitize_gfont'
    )
);

function etrigan_sanitize_gfont( $input ) {
    if ( in_array($input, array('Raleway','Khula','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora','Source Sans Pro','PT Sans','Ubuntu','Lobster','Arimo','Bitter','Noto Sans') ) )
        return $input;
    else
        return '';
}

$wp_customize->add_control(
    'etrigan_title_font',array(
        'label' => __('Title','etrigan'),
        'settings' => 'etrigan_title_font',
        'section'  => 'etrigan_typo_options',
        'type' => 'select',
        'choices' => $fonts,
    )
);

$wp_customize->add_setting(
    'etrigan_body_font',
    array(	'default'=> 'Ubuntu',
        'sanitize_callback' => 'etrigan_sanitize_gfont' )
);

$wp_customize->add_control(
    'etrigan_body_font',array(
        'label' => __('Body','etrigan'),
        'settings' => 'etrigan_body_font',
        'section'  => 'etrigan_typo_options',
        'type' => 'select',
        'choices' => $fonts
    )
);
}
add_action( 'customize_register', 'etrigan_customize_register_fonts' );