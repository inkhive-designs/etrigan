<?php
//Select the Default Theme Skin
function etrigan_customize_register_skin( $wp_customize ) {
    //Logo Settings
    $wp_customize->add_section( 'title_tagline' , array(
        'title'      => __( 'Title, Tagline & Logo', 'etrigan' ),
        'priority'   => 30,
    ) );

    $wp_customize->add_setting( 'etrigan_logo' , array(
        'default'     => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'etrigan_logo',
            array(
                'label' => __('Upload Logo','etrigan'),
                'section' => 'title_tagline',
                'settings' => 'etrigan_logo',
                'priority' => 5,
            )
        )
    );

    $wp_customize->add_setting( 'etrigan_logo_resize' , array(
        'default'     => 100,
        'sanitize_callback' => 'etrigan_sanitize_positive_number',
    ) );
    $wp_customize->add_control(
        'etrigan_logo_resize',
        array(
            'label' => __('Resize & Adjust Logo','etrigan'),
            'section' => 'title_tagline',
            'settings' => 'etrigan_logo_resize',
            'priority' => 6,
            'type' => 'range',
            'active_callback' => 'etrigan_logo_enabled',
            'input_attrs' => array(
                'min'   => 30,
                'max'   => 200,
                'step'  => 5,
            ),
        )
    );

    function etrigan_logo_enabled($control) {
        $option = $control->manager->get_setting('etrigan_logo');
        return $option->value() == true;
    }



    //Replace Header Text Color with, separate colors for Title and Description
    //Override etrigan_site_titlecolor
    $wp_customize->remove_control('display_header_text');
    $wp_customize->remove_setting('header_textcolor');
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
$wp_customize->add_section(
    'etrigan_skin_options',
    array(
        'title'     => __('Choose Skin','etrigan'),
        'priority'  => 39,
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