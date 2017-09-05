<?php
// Social Icons
function etrigan_customize_register_social( $wp_customize ) {
$wp_customize->add_section('etrigan_social_section', array(
    'title' => __('Social Icons','etrigan'),
    'priority' => 44 ,
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