<?php
// Social Icons
function etrigan_customize_register_social( $wp_customize ) {
$wp_customize->add_section('etrigan_social_section', array(
    'title' => __('Social Icons','etrigan'),
    'priority' => 2 ,
    'panel' => 'etrigan_header_panel'

));

$social_networks = array( //Redefinied in Sanitization Function.
    'none' => __('-','etrigan'),
    'facebook' => __('Facebook','etrigan'),
    'twitter' => __('Twitter','etrigan'),
    'google-plus' => __('Google Plus','etrigan'),
    'instagram' => __('Instagram','etrigan'),
    'rss' => __('RSS Feeds','etrigan'),
    'vine' => __('Vine','etrigan'),
    'vimeo-square' => __('Vimeo','etrigan'),
    'youtube' => __('Youtube','etrigan'),
    'flickr' => __('Flickr','etrigan'),
);
    //social icons style
    $social_style = array(
        'hvr-outline-out'  => __('Default', 'etrigan'),
        'hvr-back-pulse'   => __('Style 1', 'etrigan'),
        'hvr-curl-bottom-left'   => __('Style 2', 'etrigan'),
        'hvr-outline-in'   => __('Style 3', 'etrigan'),
        'hvr-glow'   => __('Style 4', 'etrigan'),

    );
    $wp_customize->add_setting(
        'etrigan_social_icon_style_set', array(
        'sanitize_callback' => 'etrigan_sanitize_social_style',
        'default' => 'hvr-outline-out'
    ));

    function etrigan_sanitize_social_style( $input ) {
        if ( in_array($input, array('hvr-back-pulse','hvr-curl-bottom-left','hvr-outline-out','hvr-outline-in','hvr-glow') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control( 'etrigan_social_icon_style_set', array(
        'settings' => 'etrigan_social_icon_style_set',
        'label' => __('Social Icon Style ','etrigan'),
        'description' => __('You can choose your icon style','etrigan'),
        'section' => 'etrigan_social_section',
        'type' => 'select',
        'choices' => $social_style,
    ));
$social_count = count($social_networks);

for ($x = 1 ; $x <= ($social_count - 3) ; $x++) :

    $wp_customize->add_setting(
        'etrigan_social_'.$x, array(
        'sanitize_callback' => 'etrigan_sanitize_social',
        'default' => 'none'
    ));

    $wp_customize->add_control( 'etrigan_social_'.$x, array(
        'settings' => 'etrigan_social_'.$x,
        'label' => __('Icon ','etrigan').$x,
        'section' => 'etrigan_social_section',
        'type' => 'select',
        'choices' => $social_networks,
    ));

    $wp_customize->add_setting(
        'etrigan_social_url'.$x, array(
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control( 'etrigan_social_url'.$x, array(
        'settings' => 'etrigan_social_url'.$x,
        'description' => __('Icon ','etrigan').$x.__(' Url','etrigan'),
        'section' => 'etrigan_social_section',
        'type' => 'url',
        'choices' => $social_networks,
    ));

endfor;

function etrigan_sanitize_social( $input ) {
    $social_networks = array(
        'none' ,
        'facebook',
        'twitter',
        'google-plus',
        'instagram',
        'rss',
        'vine',
        'vimeo-square',
        'youtube',
        'flickr'
    );
    if ( in_array($input, $social_networks) )
        return $input;
    else
        return '';
}
}
add_action( 'customize_register', 'etrigan_customize_register_social' );