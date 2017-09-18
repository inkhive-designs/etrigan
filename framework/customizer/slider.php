<?php
function etrigan_customize_register_main_slider( $wp_customize ) {
    // SLIDER PANEL
        $wp_customize->add_panel( 'etrigan_slider_panel', array(
            'priority'       => 35,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __('Main Slider','etrigan'),
        ) );

        $wp_customize->add_section(
            'etrigan_sec_slider_options',
            array(
                'title'     => __('Enable/Disable','etrigan'),
                'priority'  => 0,
                'panel'     => 'etrigan_slider_panel'
            )
        );


        $wp_customize->add_setting(
            'etrigan_main_slider_enable',
            array( 'sanitize_callback' => 'etrigan_sanitize_checkbox' )
        );

        $wp_customize->add_control(
            'etrigan_main_slider_enable', array(
                'settings' => 'etrigan_main_slider_enable',
                'label'    => __( 'Enable Slider on HomePage.', 'etrigan' ),
                'section'  => 'etrigan_sec_slider_options',
                'type'     => 'checkbox',
            )
        );


        $wp_customize->add_setting(
            'etrigan_main_slider_count',
            array(
                'default' => '0',
                'sanitize_callback' => 'etrigan_sanitize_positive_number'
            )
        );

    // Select How Many Slides the User wants, and Reload the Page.
    $wp_customize->add_control(
        'etrigan_main_slider_count', array(
            'settings' => 'etrigan_main_slider_count',
            'label'    => __( 'No. of Slides(Min:0, Max: 3)' ,'etrigan'),
            'section'  => 'etrigan_sec_slider_options',
            'type'     => 'number',
            'description' => __('Save the Settings, and Reload this page to Configure the Slides.','etrigan'),

        )
    );

    for ( $i = 1 ; $i <= 3 ; $i++ ) :

        //Create the settings Once, and Loop through it.
        static $x = 0;
        $wp_customize->add_section(
            'etrigan_slide_sec'.$i,
            array(
                'title'     => 'Slide '.$i,
                'priority'  => $i,
                'panel'     => 'etrigan_slider_panel',

            )
        );

        $wp_customize->add_setting(
            'etrigan_slide_img'.$i,
            array( 'sanitize_callback' => 'esc_url_raw' )
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'etrigan_slide_img'.$i,
                array(
                    'label' => '',
                    'section' => 'etrigan_slide_sec'.$i,
                    'settings' => 'etrigan_slide_img'.$i,
                )
            )
        );

        $wp_customize->add_setting(
            'etrigan_slide_title'.$i,
            array( 'sanitize_callback' => 'sanitize_text_field' )
        );

        $wp_customize->add_control(
            'etrigan_slide_title'.$i, array(
                'settings' => 'etrigan_slide_title'.$i,
                'label'    => __( 'Slide Title','etrigan' ),
                'section'  => 'etrigan_slide_sec'.$i,
                'type'     => 'text',
            )
        );

        $wp_customize->add_setting(
            'etrigan_slide_desc'.$i,
            array( 'sanitize_callback' => 'sanitize_text_field' )
        );

        $wp_customize->add_control(
            'etrigan_slide_desc'.$i, array(
                'settings' => 'etrigan_slide_desc'.$i,
                'label'    => __( 'Slide Description','etrigan' ),
                'section'  => 'etrigan_slide_sec'.$i,
                'type'     => 'text',
            )
        );



        $wp_customize->add_setting(
            'etrigan_slide_CTA_button'.$i,
            array( 'sanitize_callback' => 'sanitize_text_field' )
        );

        $wp_customize->add_control(
            'etrigan_slide_CTA_button'.$i, array(
                'settings' => 'etrigan_slide_CTA_button'.$i,
                'label'    => __( 'Custom Call to Action Button Text(Optional)','etrigan' ),
                'section'  => 'etrigan_slide_sec'.$i,
                'type'     => 'text',
            )
        );

        $wp_customize->add_setting(
            'etrigan_slide_url'.$i,
            array( 'sanitize_callback' => 'esc_url_raw' )
        );

        $wp_customize->add_control(
            'etrigan_slide_url'.$i, array(
                'settings' => 'etrigan_slide_url'.$i,
                'label'    => __( 'Target URL','etrigan' ),
                'section'  => 'etrigan_slide_sec'.$i,
                'type'     => 'url',
            )
        );

    endfor;

}
add_action( 'customize_register', 'etrigan_customize_register_main_slider' );