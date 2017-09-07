<?php
function etrigan_customize_register_page_layout( $wp_customize ) {
    //page layout
    $wp_customize->add_panel(
        'etrigan_page_layout_panel',
        array(
            'title' => __('Custom Page', 'etrigan'),
            'priority'  => 30,
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
                'label' => __('Warning!','etrigan'),
                'description' => __('If you want to use Contact Page layout, 
                then you have to create a Contact Page first.','etrigan'),
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
        'etrigan_contactus_phone_set1',
        array( 'sanitize_callback' => 'etrigan_sanitize_text' )
    );

    $wp_customize->add_control(
        'etrigan_contactus_phone_set1', array(
            'settings' => 'etrigan_contactus_phone_set1',
            'label'    => __( 'Enter Phone no 1.', 'etrigan' ),
            'section'  => 'etrigan_contactus_section',
            'type'     => 'text',

        )
    );
    $wp_customize->add_setting(
        'etrigan_contactus_phone_set2',
        array( 'sanitize_callback' => 'etrigan_sanitize_text' )
    );

    $wp_customize->add_control(
        'etrigan_contactus_phone_set2', array(
            'settings' => 'etrigan_contactus_phone_set2',
            'label'    => __( 'Enter Phone no 2.', 'etrigan' ),
            'section'  => 'etrigan_contactus_section',
            'type'     => 'text',

        )
    );

    $wp_customize->add_setting(
        'etrigan_contactus_email_set1',
        array( 'sanitize_callback' => 'etrigan_sanitize_text' )
    );

    $wp_customize->add_control(
        'etrigan_contactus_email_set1', array(
            'settings' => 'etrigan_contactus_email_set1',
            'label'    => __( 'Enter Email Address 1.', 'etrigan' ),
            'section'  => 'etrigan_contactus_section',
            'type'     => 'email',

        )
    );
    $wp_customize->add_setting(
        'etrigan_contactus_email_set2',
        array( 'sanitize_callback' => 'etrigan_sanitize_text' )
    );

    $wp_customize->add_control(
        'etrigan_contactus_email_set2', array(
            'settings' => 'etrigan_contactus_email_set2',
            'label'    => __( 'Enter Email Address 2.', 'etrigan' ),
            'section'  => 'etrigan_contactus_section',
            'type'     => 'email',

        )
    );

    //image-upload//
    $wp_customize->add_setting(
        'etrigan_contactus_map_img_set',
        array('default' => '',
        ));

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'etrigan_contactus_map_img_set',
            array(
                'label'      => __( 'Upload a Map Image', 'etrigan' ),
                'section'    => 'etrigan_contactus_section',
                'settings'   => 'etrigan_contactus_map_img_set',
                'type'       => 'image',

            )
        )
    );
    $wp_customize->add_setting(
        'etrigan_contactus_map_url_set',
        array( 'sanitize_callback' => 'etrigan_sanitize_text' )
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
    $wp_customize->add_setting(
        'etrigan_contactform_message_set',
        array( 'sanitize_callback' => 'etrigan_sanitize_text' )
    );

    $wp_customize->add_control(
        'etrigan_contactform_message_set', array(
            'settings' => 'etrigan_contactform_message_set',
            'label'    => __( 'Contact Form Message.', 'etrigan' ),
            'description' => __('It is show on right side of the Contact Form','etrigan'),
            'section'  => 'etrigan_contactus_section',
            'type'     => 'textarea',

        )
    );
    //image-upload//
    $wp_customize->add_setting(
        'etrigan_contactus_form_img_set');

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