<?php
//Fonts
function etrigan_customize_register_fonts( $wp_customize ) {
$wp_customize->add_section(
    'etrigan_typo_options',
    array(
        'title'     => __('Google Web Fonts','etrigan'),
        'priority'  => 41,
        'description' => __('Defaults: Droid Serif, Ubuntu.','etrigan'),
        'panel'     => 'etrigan_design_panel'

    )
);

$font_array = array('Raleway','Khula','Open Sans','Droid Sans','Salsa','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora','Source Sans Pro','PT Sans','Ubuntu','Lobster','Arimo','Bitter','Noto Sans');
$fonts = array_combine($font_array, $font_array);

$wp_customize->add_setting(
    'etrigan_title_font',
    array(
        'default'=> 'Droid Serif',
        'sanitize_callback' => 'etrigan_sanitize_gfont'
    )
);

function etrigan_sanitize_gfont( $input ) {
    if ( in_array($input, array('Raleway','Khula','Open Sans','Droid Sans','Salsa','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora','Source Sans Pro','PT Sans','Ubuntu','Lobster','Arimo','Bitter','Noto Sans') ) )
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

//Page and Post content Font size start
    $wp_customize->add_setting(
        'etrigan_content_page_post_fontsize_set',
        array(
            'default' => 'default',
            'sanitize_callback' => 'etrigan_sanitize_content_size'
        )
    );
    function etrigan_sanitize_content_size( $input ) {
        if ( in_array($input, array('default','small','medium','large','extra-large') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'etrigan_content_page_post_fontsize_set', array(
            'settings' => 'etrigan_content_page_post_fontsize_set',
            'label'    => __( 'Page/Post Font Size','etrigan' ),
            'description' => __('Choose your font size. This is only for Posts and Pages. It wont affect your blog page.','etrigan'),
            'section'  => 'etrigan_typo_options',
            'type'     => 'select',
            'choices' => array(
                'default'   => 'Default',
                'small' => 'Small',
                'medium'   => 'Medium',
                'large'  => 'Large',
                'extra-large' => 'Extra Large',
            ),
        )
    );

    //Page and Post content Font size end


    //site title Font size start
    $wp_customize->add_setting(
        'etrigan_content_site_title_fontsize_set',
        array(
            'default' => '55',
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control(
        'etrigan_content_site_title_fontsize_set', array(
            'settings' => 'etrigan_content_site_title_fontsize_set',
            'label'    => __( 'Site Title Font Size','etrigan' ),
            'description' => __('Choose your font size. This is only for Site Title.','etrigan'),
            'section'  => 'etrigan_typo_options',
            'type'     => 'number',
        )
    );
    //site title Font size end

    //site description Font size start
    $wp_customize->add_setting(
        'etrigan_content_site_desc_fontsize_set',
        array(
            'default' => '15',
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control(
        'etrigan_content_site_desc_fontsize_set', array(
            'settings' => 'etrigan_content_site_desc_fontsize_set',
            'label'    => __( 'Site Description Font Size','etrigan' ),
            'description' => __('Choose your font size. This is only for Site Description.','etrigan'),
            'section'  => 'etrigan_typo_options',
            'type'     => 'number',
        )
    );
    //site description Font size end


}
add_action( 'customize_register', 'etrigan_customize_register_fonts' );