<?php
/**
 * Created by PhpStorm.
 * User: Gourav
 * Date: 1/29/2018
 * Time: 3:49 PM
 */
function etrigan_customize_register_header( $wp_customize )
{
    $wp_customize->add_panel('etrigan_header_panel', array(
        'priority' => 2,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __('Header Settings', 'etrigan'),
    ));
    //Logo Settings
    $wp_customize->add_section( 'title_tagline' , array(
        'title'      => __( 'Title, Tagline & Logo', 'etrigan' ),
        'priority'   => 1,
        'panel' => 'etrigan_header_panel'
    ) );
    //Replace Header Text Color with, separate colors for Title and Description
    //Override etrigan_site_titlecolor
    $wp_customize->remove_control('display_header_text');
    $wp_customize->remove_setting('header_textcolor');
    $wp_customize->get_section('header_image')->panel = 'etrigan_header_panel';



    $wp_customize->add_setting('etrigan_site_titlecolor', array(
        'default'     => '#FFFFFF',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'etrigan_site_titlecolor', array(
            'label' => __('Site Title Color','etrigan'),
            'section' => 'colors',
            'settings' => 'etrigan_site_titlecolor',
            'type' => 'color'
        ) )
    );

    $wp_customize->add_setting('etrigan_header_desccolor', array(
        'default'     => '#FFFFFF',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'etrigan_header_desccolor', array(
            'label' => __('Site Tagline Color','etrigan'),
            'section' => 'colors',
            'settings' => 'etrigan_header_desccolor',
            'type' => 'color'
        ) )
    );
}add_action( 'customize_register', 'etrigan_customize_register_header' );