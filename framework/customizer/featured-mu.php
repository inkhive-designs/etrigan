<?php
//SQUARE BOXES
//WOOCOMMERCE ENABLED STUFF

function etrigan_customize_register_product_showcase( $wp_customize ) {

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

    if ( class_exists('woocommerce') ) :
        // CREATE THE fcp PANEL
        $wp_customize->add_panel( 'etrigan_fcp_panel', array(
            'priority'       => 40,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => 'Featured Product Showcase',
            'description'    => '',
        ) );





        //SLIDER
        $wp_customize->add_section(
            'etrigan_fc_slider',
            array(
                'title'     => __('3D Cube Products Slider','etrigan'),
                'priority'  => 10,
                'panel'     => 'etrigan_fcp_panel',
                'description' => 'This is the Posts Slider, displayed left to the square boxes.',
            )
        );


        $wp_customize->add_setting(
            'etrigan_slider_title',
            array( 'sanitize_callback' => 'sanitize_text_field' )
        );

        $wp_customize->add_control(
            'etrigan_slider_title', array(
                'settings' => 'etrigan_slider_title',
                'label'    => __( 'Title for the Slider', 'etrigan' ),
                'section'  => 'etrigan_fc_slider',
                'type'     => 'text',
            )
        );

        $wp_customize->add_setting(
            'etrigan_slider_count',
            array( 'sanitize_callback' => 'etrigan_sanitize_positive_number' )
        );

        $wp_customize->add_control(
            'etrigan_slider_count', array(
                'settings' => 'etrigan_slider_count',
                'label'    => __( 'No. of Posts(Min:3, Max: 10)', 'etrigan' ),
                'section'  => 'etrigan_fc_slider',
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
            'etrigan_slider_cat',
            array( 'sanitize_callback' => 'etrigan_sanitize_product_category' )
        );

        $wp_customize->add_control(
            new Etrigan_WP_Customize_Product_Category_Control(
                $wp_customize,
                'etrigan_slider_cat',
                array(
                    'label'    => __('Category For Slider.','etrigan'),
                    'settings' => 'etrigan_slider_cat',
                    'section'  => 'etrigan_fc_slider'
                )
            )
        );


    endif; //end class exists woocommerce


$wp_customize->add_section(
    'etrigan_fc_boxes',
    array(
        'title'     => __('Square Boxes','etrigan'),
        'priority'  => 10,
        'panel'     => 'etrigan_fcp_panel'
    )
);

$wp_customize->add_setting(
    'etrigan_box_enable',
    array( 'sanitize_callback' => 'etrigan_sanitize_checkbox' )
);

$wp_customize->add_control(
    'etrigan_box_enable', array(
        'settings' => 'etrigan_box_enable',
        'label'    => __( 'Enable Square Boxes & Posts Slider.', 'etrigan' ),
        'section'  => 'etrigan_fc_boxes',
        'type'     => 'checkbox',
    )
);


$wp_customize->add_setting(
    'etrigan_box_title',
    array( 'sanitize_callback' => 'sanitize_text_field' )
);

$wp_customize->add_control(
    'etrigan_box_title', array(
        'settings' => 'etrigan_box_title',
        'label'    => __( 'Title for the Boxes','etrigan' ),
        'section'  => 'etrigan_fc_boxes',
        'type'     => 'text',
    )
);

$wp_customize->add_setting(
    'etrigan_box_cat',
    array( 'sanitize_callback' => 'etrigan_sanitize_product_category' )
);

$wp_customize->add_control(
    new Etrigan_WP_Customize_Product_Category_Control(
        $wp_customize,
        'etrigan_box_cat',
        array(
            'label'    => __('Product Category.','etrigan'),
            'settings' => 'etrigan_box_cat',
            'section'  => 'etrigan_fc_boxes'
        )
    )
);
}
add_action( 'customize_register', 'etrigan_customize_register_product_showcase' );