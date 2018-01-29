<?php
function etrigan_customize_register_page_layout( $wp_customize ) {
    //page layout
    $wp_customize->add_panel(
        'etrigan_page_layout_panel',
        array(
            'title' => __('Custom Page Templates', 'etrigan'),
            'priority'  => 60,
            'default' => 'false'
        )
    );
    $wp_customize->add_section(
        'etrigan_contactus_section',
        array(
            'title'     => __('Contact Page','etrigan'),
            'priority'  => 10,
            'panel'     => 'etrigan_page_layout_panel'
        )
    );
    $wp_customize->add_setting(
        'etrigan_page_war',
        array( 'sanitize_callback' => 'esc_textarea' )
    );

    $wp_customize->add_control(
        new Etrigan_WP_Customize_Upgrade_Control(
            $wp_customize,
            'etrigan_page_war',
            array(
                'label' => __('Important Note: ','etrigan'),
                'description' => __('To use this Feature, go to Pages - Add New, and create a new page and set its Template to Contact Us.','etrigan'),
                'section' => 'etrigan_contactus_section',
                'settings' => 'etrigan_page_war',

            )
        )
    );
    $wp_customize->add_setting(
        'etrigan_contactus_title_disable_set',
        array( 'sanitize_callback' => 'etrigan_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'etrigan_contactus_title_disable_set', array(
            'settings' => 'etrigan_contactus_title_disable_set',
            'label'    => __( 'Disable Contact Page Tilte', 'etrigan' ),
            'section'  => 'etrigan_contactus_section',
            'type'     => 'checkbox',

        )
    );

    $wp_customize->add_setting(
        'etrigan_contactus_content_disable_set',
        array( 'sanitize_callback' => 'etrigan_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'etrigan_contactus_content_disable_set', array(
            'settings' => 'etrigan_contactus_content_disable_set',
            'label'    => __( 'Disable Contact Page Content', 'etrigan' ),
            'section'  => 'etrigan_contactus_section',
            'type'     => 'checkbox',

        )
    );

    $wp_customize->add_setting(
        'etrigan_contactus_address_set',
        array( 'sanitize_callback' => 'etrigan_sanitize_text' )
        );

    $wp_customize->add_control(
        'etrigan_contactus_address_set', array(
            'settings' => 'etrigan_contactus_address_set',
            'label'    => __( 'Enter Address', 'etrigan' ),
            'section'  => 'etrigan_contactus_section',
            'type'     => 'textarea',

        )
    );
    $wp_customize->add_setting(
        'etrigan_conn_with_us_set',
        array( 'sanitize_callback' => 'etrigan_sanitize_text'
        )
    );

    $wp_customize->add_control(
        'etrigan_conn_with_us_set', array(
            'settings' => 'etrigan_conn_with_us_set',
            'label'    => __( 'Connect with us', 'etrigan' ),
            'section'  => 'etrigan_contactus_section',
            'type'     => 'textarea',

        )
    );



    //image-upload//
    $wp_customize->add_setting(
        'etrigan_contactus_map_img_set',
        array('sanitize_callback' => 'esc_url_raw' )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'etrigan_contactus_map_img_set',
            array(
                'label'      => __( 'Upload a Map Image', 'etrigan' ),
                'description' => __('Size 1200 X 400','etrigan'),
                'section'    => 'etrigan_contactus_section',
                'settings'   => 'etrigan_contactus_map_img_set',
                'type'       => 'image',

            )
        )
    );
    $wp_customize->add_setting(
        'etrigan_contactus_map_url_set',
        array( 'sanitize_callback' => 'esc_url_raw' )
    );

    $wp_customize->add_control(
        'etrigan_contactus_map_url_set', array(
            'settings' => 'etrigan_contactus_map_url_set',
            'label'    => __( 'Enter Map url.', 'etrigan' ),
            'description' => __('Enter full map url. Like http://','etrigan'),
            'section'  => 'etrigan_contactus_section',
            'type'     => 'url',

        )
    );

    $wp_customize->add_setting(
        'etrigan_contactform_title_set',
        array( 'sanitize_callback' => 'etrigan_sanitize_text' )
    );

    $wp_customize->add_control(
        'etrigan_contactform_title_set', array(
            'settings' => 'etrigan_contactform_title_set',
            'label'    => __( 'Enter Contact Form Title.', 'etrigan' ),
            'section'  => 'etrigan_contactus_section',
            'type'     => 'text',

        )
    );
    $wp_customize->add_setting(
        'etrigan_contactform_shortcode_set',
        array( 'sanitize_callback' => 'etrigan_sanitize_text' )
    );

    $wp_customize->add_control(
        'etrigan_contactform_shortcode_set', array(
            'settings' => 'etrigan_contactform_shortcode_set',
            'label'    => __( 'Enter Contact Form Shortcode.', 'etrigan' ),
            'section'  => 'etrigan_contactus_section',
            'type'     => 'text',

        )
    );
       //image-upload//
    $wp_customize->add_setting(
        'etrigan_contactus_form_img_set', array('sanitize_callback' => 'esc_url_raw'));

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'etrigan_contactus_form_img_set',
            array(
                'label'      => __( 'Upload Contact Form side image', 'etrigan' ),
                'section'    => 'etrigan_contactus_section',
                'description' => __('It is show on right side of the Contact Form','etrigan'),
                'settings'   => 'etrigan_contactus_form_img_set',
                'type'       => 'image',

            )
        )
    );

}
add_action('customize_register', 'etrigan_customize_register_page_layout');