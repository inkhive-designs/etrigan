<?php
// Layout and Design
function etrigan_customize_register_layouts( $wp_customize ) {
    $wp_customize->get_section('background_image')->panel = 'etrigan_design_panel';

$wp_customize->add_panel( 'etrigan_design_panel', array(
    'priority'       => 40,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Design & Layout','etrigan'),
) );

$wp_customize->add_section(
    'etrigan_design_options',
    array(
        'title'     => __('Blog Layout','etrigan'),
        'priority'  => 0,
        'panel'     => 'etrigan_design_panel'
    )
);


$wp_customize->add_setting(
    'etrigan_blog_layout',
    array( 'sanitize_callback' => 'etrigan_sanitize_blog_layout' )
);

function etrigan_sanitize_blog_layout( $input ) {
    if ( in_array($input, array('grid','grid_2_column','etrigan','etrigan_3_column','insights') ) )
        return $input;
    else
        return '';
}

$wp_customize->add_control(
    'etrigan_blog_layout',array(
        'label' => __('Select Layout','etrigan'),
        'settings' => 'etrigan_blog_layout',
        'section'  => 'etrigan_design_options',
        'type' => 'select',
        'choices' => array(
            'grid' => __('Standard Blog Layout','etrigan'),
            'etrigan' => __('Etrigan Theme Layout','etrigan'),
            'insights' => __('Insight Blog Layout','etrigan'),
             'etrigan_3_column' => __('Etrigan Theme Layout (3 Columns)','etrigan'),
            'grid_2_column' => __('Grid - 2 Column','etrigan'),

        )
    )
);

$wp_customize->add_section(
    'etrigan_sidebar_options',
    array(
        'title'     => __('Sidebar Layout','etrigan'),
        'priority'  => 0,
        'panel'     => 'etrigan_design_panel'
    )
);

$wp_customize->add_setting(
    'etrigan_disable_sidebar',
    array( 'sanitize_callback' => 'etrigan_sanitize_checkbox' )
);

$wp_customize->add_control(
    'etrigan_disable_sidebar', array(
        'settings' => 'etrigan_disable_sidebar',
        'label'    => __( 'Disable Sidebar Everywhere.','etrigan' ),
        'section'  => 'etrigan_sidebar_options',
        'type'     => 'checkbox',
        'default'  => false
    )
);

$wp_customize->add_setting(
    'etrigan_disable_sidebar_home',
    array( 'sanitize_callback' => 'etrigan_sanitize_checkbox' )
);

$wp_customize->add_control(
    'etrigan_disable_sidebar_home', array(
        'settings' => 'etrigan_disable_sidebar_home',
        'label'    => __( 'Disable Sidebar on Home/Blog.','etrigan' ),
        'section'  => 'etrigan_sidebar_options',
        'type'     => 'checkbox',
        'active_callback' => 'etrigan_show_sidebar_options',
        'default'  => false
    )
);

$wp_customize->add_setting(
    'etrigan_disable_sidebar_front',
    array( 'sanitize_callback' => 'etrigan_sanitize_checkbox' )
);

$wp_customize->add_control(
    'etrigan_disable_sidebar_front', array(
        'settings' => 'etrigan_disable_sidebar_front',
        'label'    => __( 'Disable Sidebar on Front Page.','etrigan' ),
        'section'  => 'etrigan_sidebar_options',
        'type'     => 'checkbox',
        'active_callback' => 'etrigan_show_sidebar_options',
        'default'  => false
    )
);


$wp_customize->add_setting(
    'etrigan_sidebar_width',
    array(
        'default' => 4,
        'sanitize_callback' => 'etrigan_sanitize_positive_number' )
);

$wp_customize->add_control(
    'etrigan_sidebar_width', array(
        'settings' => 'etrigan_sidebar_width',
        'label'    => __( 'Sidebar Width','etrigan' ),
        'description' => __('Min: 25%, Default: 33%, Max: 40%','etrigan'),
        'section'  => 'etrigan_sidebar_options',
        'type'     => 'range',
        'active_callback' => 'etrigan_show_sidebar_options',
        'input_attrs' => array(
            'min'   => 3,
            'max'   => 5,
            'step'  => 1,
            'class' => 'sidebar-width-range',
            'style' => 'color: #0a0',
        ),
    )
);

/* Active Callback Function */
function etrigan_show_sidebar_options($control) {

    $option = $control->manager->get_setting('etrigan_disable_sidebar');
    return $option->value() == false ;

}

class Etrigan_Custom_CSS_Control extends WP_Customize_Control {
    public $type = 'textarea';

    public function render_content() {
        ?>
        <label>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <textarea rows="8" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
        </label>
        <?php
    }
}

$wp_customize-> add_section(
    'etrigan_custom_codes',
    array(
        'title'			=> __('Custom CSS','etrigan'),
        'description'	=> __('Enter your Custom CSS to Modify design.','etrigan'),
        'priority'		=> 11,
        'panel'			=> 'etrigan_design_panel'
    )
);

$wp_customize->add_setting(
    'etrigan_custom_css',
    array(
        'default'		=> '',
        'capability'           => 'edit_theme_options',
        'sanitize_callback'    => 'wp_filter_nohtml_kses',
        'sanitize_js_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control(
    new Etrigan_Custom_CSS_Control(
        $wp_customize,
        'etrigan_custom_css',
        array(
            'section' => 'etrigan_custom_codes',
            'settings' => 'etrigan_custom_css'
        )
    )
);

function etrigan_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

$wp_customize-> add_section(
    'etrigan_custom_footer',
    array(
        'title'			=> __('Custom Footer Text','etrigan'),
        'description'	=> __('Enter your Own Copyright Text.','etrigan'),
        'priority'		=> 11,
        'panel'			=> 'etrigan_design_panel'
    )
);

$wp_customize->add_setting(
    'etrigan_footer_text',
    array(
        'default'		=> '',
        'sanitize_callback'	=> 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    'etrigan_footer_text',
    array(
        'section' => 'etrigan_custom_footer',
        'settings' => 'etrigan_footer_text',
        'type' => 'text'
    )
);

}
add_action( 'customize_register', 'etrigan_customize_register_layouts' );