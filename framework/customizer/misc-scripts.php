<?php
//upgrade
function etrigan_customize_register_misc( $wp_customize ) {
$wp_customize->add_section(
    'etrigan_sec_upgrade',
    array(
        'title'     => __('Discover ETRIGAN PRO','etrigan'),
        'priority'  => 1,
    )
);

$wp_customize->add_setting(
    'etrigan_upgrade',
    array( 'sanitize_callback' => 'esc_textarea' )
);

$wp_customize->add_control(
    new Etrigan_WP_Customize_Upgrade_Control(
        $wp_customize,
        'etrigan_upgrade',
        array(
            'label' => __('More of Everything','etrigan'),
            'description' => __('Etrigan Pro has more of Everything. More New Features, More Options, More Colors, More Fonts, More Layouts, Configurable Slider, Inbuilt Advertising Options, Multiple Skins, More Widgets, and a lot more options and comes with Dedicated Support. To Know More about the Pro Version, click here: <a href="https://inkhive.com/product/etrigan-pro/">Upgrade to Pro</a>.','etrigan'),
            'section' => 'etrigan_sec_upgrade',
            'settings' => 'etrigan_upgrade',
        )
    )
);

$wp_customize->add_section(
    'etrigan_sec_upgrade_help',
    array(
        'title'     => __('Etrigan Theme - Help & Support','etrigan'),
        'priority'  => 45,
    )
);

$wp_customize->add_setting(
    'etrigan_upgrade_help',
    array( 'sanitize_callback' => 'esc_textarea' )
);

$wp_customize->add_control(
    new Etrigan_WP_Customize_Upgrade_Control(
        $wp_customize,
        'etrigan_upgrade_help',
        array(
            'label' => __('Thank You','etrigan'),
            'description' => __('Thank You for Choosing Etrigan Theme by Inkhive.com. Etrigan is a Powerful Wordpress theme which also supports WooCommerce in the best possible way. It is "as we say" the last theme you would ever need. It has all the basic and advanced features needed to run a gorgeous looking site. For any Help related to this theme, please visit  <a href="https://inkhive.com/contact-us/">Etrigan Help & Support</a>.','etrigan'),
            'section' => 'etrigan_sec_upgrade_help',
            'settings' => 'etrigan_upgrade_help',
        )
    )
);
}
add_action( 'customize_register', 'etrigan_customize_register_misc' );