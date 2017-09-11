<?php
//SQUARE BOXES
//WOOCOMMERCE ENABLED STUFF

function etrigan_customize_register_fproducts_square_boxes( $wp_customize ) {
    if ( class_exists('woocommerce') ) :
        // CREATE THE fcp PANEL
        $wp_customize->add_panel( 'etrigan_fcp_panel', array(
            'priority'       => 40,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => 'Featured Product Showcase',
            'description'    => '',
        ) );

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
endif;
}
    add_action( 'customize_register', 'etrigan_customize_register_fproducts_square_boxes' );