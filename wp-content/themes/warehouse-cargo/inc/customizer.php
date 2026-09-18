<?php
/**
 * Warehouse Cargo Theme Customizer
 *
 * @link: https://developer.wordpress.org/themes/customize-api/customizer-objects/
 *
 * @package Warehouse Cargo
 */

if ( ! defined( 'WAREHOUSE_CARGO_URL' ) ) {
define('WAREHOUSE_CARGO_URL',__('https://www.themagnifico.net/themes/warehouse-wordpress-theme/','warehouse-cargo'));
}
if ( ! defined( 'WAREHOUSE_CARGO_BUY_TEXT' ) ) {
    define( 'WAREHOUSE_CARGO_BUY_TEXT', __( 'Buy Warehouse Cargo Pro','warehouse-cargo' ));
}

use WPTRT\Customize\Section\Warehouse_Cargo_Button;

add_action( 'customize_register', function( $manager ) {

    $manager->register_section_type( Warehouse_Cargo_Button::class );

    $manager->add_section(
        new Warehouse_Cargo_Button( $manager, 'warehouse_cargo_pro', [
            'title'       => __( 'Warehouse Cargo Pro', 'warehouse-cargo' ),
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'warehouse-cargo' ),
            'button_url'  => esc_url( 'https://www.themagnifico.net/themes/warehouse-wordpress-theme/', 'warehouse-cargo')
        ] )
    );

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script(
        'warehouse-cargo-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
        [ 'customize-controls' ],
        $version,
        true
    );

    wp_enqueue_style(
        'warehouse-cargo-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
        [ 'customize-controls' ],
        $version
    );

} );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function warehouse_cargo_customize_register($wp_customize){

     // Pro Version
    class Warehouse_Cargo_Customize_Pro_Version extends WP_Customize_Control {
        public $type = 'pro_options';

        public function render_content() {
            echo '<span>For More <strong>'. esc_html( $this->label ) .'</strong>?</span>';
            echo '<a href="'. esc_url($this->description) .'" target="_blank">';
                echo '<span class="dashicons dashicons-info"></span>';
                echo '<strong> '. esc_html( WAREHOUSE_CARGO_BUY_TEXT,'warehouse-cargo' ) .'<strong></a>';
            echo '</a>';
        }
    }

    // Custom Controls
    function Warehouse_Cargo_sanitize_custom_control( $input ) {
        return $input;
    }
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    $wp_customize->add_setting('warehouse_cargo_logo_title', array(
        'default' => true,
        'sanitize_callback' => 'warehouse_cargo_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'warehouse_cargo_logo_title',array(
        'label'          => __( 'Enable Disable Title', 'warehouse-cargo' ),
        'section'        => 'title_tagline',
        'settings'       => 'warehouse_cargo_logo_title',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('warehouse_cargo_theme_description', array(
        'default' => false,
        'sanitize_callback' => 'warehouse_cargo_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'warehouse_cargo_theme_description',array(
        'label'          => __( 'Enable Disable Tagline', 'warehouse-cargo' ),
        'section'        => 'title_tagline',
        'settings'       => 'warehouse_cargo_theme_description',
        'type'           => 'checkbox',
    )));

     //Logo
    $wp_customize->add_setting('warehouse_cargo_logo_max_height',array(
        'default'   => '24',
        'sanitize_callback' => 'warehouse_cargo_sanitize_number_absint'
    ));
    $wp_customize->add_control('warehouse_cargo_logo_max_height',array(
        'label' => esc_html__('Logo Width','warehouse-cargo'),
        'section'   => 'title_tagline',
        'type'      => 'number'
    ));

    // Theme Color
    $wp_customize->add_section('warehouse_cargo_color_option',array(
        'title' => esc_html__('Theme Color','warehouse-cargo'),
        'priority'   => 10
    ));

    $wp_customize->add_setting( 'warehouse_cargo_theme_color', array(
        'default' => '#fb7b15',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'warehouse_cargo_theme_color', array(
        'label' => esc_html__('First Color Option','warehouse-cargo'),
        'section' => 'warehouse_cargo_color_option',
        'settings' => 'warehouse_cargo_theme_color'
    )));

    $wp_customize->add_setting( 'warehouse_cargo_theme_color_2', array(
        'default' => '#292119',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'warehouse_cargo_theme_color_2', array(
        'label' => esc_html__('Second Color Option','warehouse-cargo'),
        'section' => 'warehouse_cargo_color_option',
        'settings' => 'warehouse_cargo_theme_color_2'
    )));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_theme_color', array(
        'sanitize_callback' => 'Warehouse_Cargo_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Warehouse_Cargo_Customize_Pro_Version ( $wp_customize,'pro_version_theme_color', array(
        'section'     => 'warehouse_cargo_color_option',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'warehouse-cargo' ),
        'description' => esc_url( WAREHOUSE_CARGO_URL ),
        'priority'    => 100
    )));

    // General Settings
     $wp_customize->add_section('warehouse_cargo_general_settings',array(
        'title' => esc_html__('General Settings','warehouse-cargo'),
        'priority'   => 30,
    ));

    $wp_customize->add_setting('warehouse_cargo_preloader_hide', array(
        'default' => 0,
        'sanitize_callback' => 'warehouse_cargo_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'warehouse_cargo_preloader_hide',array(
        'label'          => __( 'Show Theme Preloader', 'warehouse-cargo' ),
        'section'        => 'warehouse_cargo_general_settings',
        'settings'       => 'warehouse_cargo_preloader_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting( 'warehouse_cargo_preloader_bg_color', array(
        'default' => '#000',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'warehouse_cargo_preloader_bg_color', array(
        'label' => esc_html__('Preloader Background Color','warehouse-cargo'),
        'section' => 'warehouse_cargo_general_settings',
        'settings' => 'warehouse_cargo_preloader_bg_color'
    )));

    $wp_customize->add_setting( 'warehouse_cargo_preloader_dot_1_color', array(
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'warehouse_cargo_preloader_dot_1_color', array(
        'label' => esc_html__('Preloader First Dot Color','warehouse-cargo'),
        'section' => 'warehouse_cargo_general_settings',
        'settings' => 'warehouse_cargo_preloader_dot_1_color'
    )));

    $wp_customize->add_setting( 'warehouse_cargo_preloader_dot_2_color', array(
        'default' => '#fb7b15',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'warehouse_cargo_preloader_dot_2_color', array(
        'label' => esc_html__('Preloader Second Dot Color','warehouse-cargo'),
        'section' => 'warehouse_cargo_general_settings',
        'settings' => 'warehouse_cargo_preloader_dot_2_color'
    )));

    $wp_customize->add_setting('warehouse_cargo_sticky_header', array(
        'default' => false,
        'sanitize_callback' => 'warehouse_cargo_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'warehouse_cargo_sticky_header',array(
        'label'          => __( 'Show Sticky Header', 'warehouse-cargo' ),
        'section'        => 'warehouse_cargo_general_settings',
        'settings'       => 'warehouse_cargo_sticky_header',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('warehouse_cargo_scroll_hide', array(
        'default' => false,
        'sanitize_callback' => 'warehouse_cargo_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'warehouse_cargo_scroll_hide',array(
        'label'          => __( 'Show Theme Scroll To Top', 'warehouse-cargo' ),
        'section'        => 'warehouse_cargo_general_settings',
        'settings'       => 'warehouse_cargo_scroll_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('warehouse_cargo_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'warehouse_cargo_sanitize_choices'
    ));
    $wp_customize->add_control('warehouse_cargo_scroll_top_position',array(
        'type' => 'radio',
        'section' => 'warehouse_cargo_general_settings',
        'choices' => array(
            'Right' => __('Right','warehouse-cargo'),
            'Left' => __('Left','warehouse-cargo'),
            'Center' => __('Center','warehouse-cargo')
        ),
    ) );

    //Woocommerce shop page Sidebar
    $wp_customize->add_setting('warehouse_cargo_woocommerce_shop_page_sidebar', array(
        'default' => true,
        'sanitize_callback' => 'warehouse_cargo_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'warehouse_cargo_woocommerce_shop_page_sidebar',array(
        'label'          => __( 'Hide Shop Page Sidebar', 'warehouse-cargo' ),
        'section'        => 'warehouse_cargo_general_settings',
        'settings'       => 'warehouse_cargo_woocommerce_shop_page_sidebar',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('warehouse_cargo_shop_page_sidebar_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'warehouse_cargo_sanitize_choices'
    ));
    $wp_customize->add_control('warehouse_cargo_shop_page_sidebar_layout',array(
        'type' => 'select',
        'label' => __('Woocommerce Shop Page Sidebar','warehouse-cargo'),
        'section' => 'warehouse_cargo_general_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','warehouse-cargo'),
            'Right Sidebar' => __('Right Sidebar','warehouse-cargo'),
        ),
    ) );

    //Woocommerce Single Product page Sidebar
    $wp_customize->add_setting('warehouse_cargo_woocommerce_single_product_page_sidebar', array(
        'default' => true,
        'sanitize_callback' => 'warehouse_cargo_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'warehouse_cargo_woocommerce_single_product_page_sidebar',array(
        'label'          => __( 'Hide Single Product Page Sidebar', 'warehouse-cargo' ),
        'section'        => 'warehouse_cargo_general_settings',
        'settings'       => 'warehouse_cargo_woocommerce_single_product_page_sidebar',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('warehouse_cargo_single_product_sidebar_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'warehouse_cargo_sanitize_choices'
    ));
    $wp_customize->add_control('warehouse_cargo_single_product_sidebar_layout',array(
        'type' => 'select',
        'label' => __('Woocommerce Single Product Page Sidebar','warehouse-cargo'),
        'section' => 'warehouse_cargo_general_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','warehouse-cargo'),
            'Right Sidebar' => __('Right Sidebar','warehouse-cargo'),
        ),
    ) );

     // Pro Version
    $wp_customize->add_setting( 'pro_version_general_setting', array(
        'sanitize_callback' => 'Warehouse_Cargo_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Warehouse_Cargo_Customize_Pro_Version ( $wp_customize,'pro_version_general_setting', array(
        'section'     => 'warehouse_cargo_general_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'warehouse-cargo' ),
        'description' => esc_url( WAREHOUSE_CARGO_URL ),
        'priority'    => 100
    )));

    // Top Header
    $wp_customize->add_section('warehouse_cargo_top_header',array(
        'title' => esc_html__('Top Header','warehouse-cargo'),
    ));

    $wp_customize->add_setting('warehouse_cargo_top_header_setting', array(
        'default' => 0,
        'sanitize_callback' => 'warehouse_cargo_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'warehouse_cargo_top_header_setting',array(
        'label'          => __( 'Enable Disable Top Header', 'warehouse-cargo' ),
        'section'        => 'warehouse_cargo_top_header',
        'settings'       => 'warehouse_cargo_top_header_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('warehouse_cargo_facebook_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('warehouse_cargo_facebook_url',array(
        'label' => esc_html__('Facebook Link','warehouse-cargo'),
        'section' => 'warehouse_cargo_top_header',
        'setting' => 'warehouse_cargo_facebook_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('warehouse_cargo_twitter_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('warehouse_cargo_twitter_url',array(
        'label' => esc_html__('Twitter Link','warehouse-cargo'),
        'section' => 'warehouse_cargo_top_header',
        'setting' => 'warehouse_cargo_twitter_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('warehouse_cargo_intagram_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('warehouse_cargo_intagram_url',array(
        'label' => esc_html__('Intagram Link','warehouse-cargo'),
        'section' => 'warehouse_cargo_top_header',
        'setting' => 'warehouse_cargo_intagram_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('warehouse_cargo_linkedin_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('warehouse_cargo_linkedin_url',array(
        'label' => esc_html__('Linkedin Link','warehouse-cargo'),
        'section' => 'warehouse_cargo_top_header',
        'setting' => 'warehouse_cargo_linkedin_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('warehouse_cargo_pintrest_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('warehouse_cargo_pintrest_url',array(
        'label' => esc_html__('Pinterest Link','warehouse-cargo'),
        'section' => 'warehouse_cargo_top_header',
        'setting' => 'warehouse_cargo_pintrest_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('warehouse_cargo_email_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('warehouse_cargo_email_icon',array(
        'label' => esc_html__('Add Email Icon','warehouse-cargo'),
        'section' => 'warehouse_cargo_top_header',
        'setting' => 'warehouse_cargo_email_icon',
        'type'  => 'text',
        'default' => 'fas fa-envelope',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fas fa-envelope','warehouse-cargo')
    ));

    $wp_customize->add_setting('warehouse_cargo_email',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_email'
    ));
    $wp_customize->add_control('warehouse_cargo_email',array(
        'label' => esc_html__('Add Email','warehouse-cargo'),
        'section' => 'warehouse_cargo_top_header',
        'setting' => 'warehouse_cargo_email',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('warehouse_cargo_phone_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('warehouse_cargo_phone_icon',array(
        'label' => esc_html__('Add Phone Icon','warehouse-cargo'),
        'section' => 'warehouse_cargo_top_header',
        'setting' => 'warehouse_cargo_phone_icon',
        'type'  => 'text',
        'default' => 'fas fa-phone',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fas fa-phone','warehouse-cargo')
    ));

    $wp_customize->add_setting('warehouse_cargo_phone',array(
        'default' => '',
        'sanitize_callback' => 'warehouse_cargo_sanitize_phone_number'
    ));
    $wp_customize->add_control('warehouse_cargo_phone',array(
        'label' => esc_html__('Add Phone Number','warehouse-cargo'),
        'section' => 'warehouse_cargo_top_header',
        'setting' => 'warehouse_cargo_phone',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('warehouse_cargo_location_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('warehouse_cargo_location_icon',array(
        'label' => esc_html__('Add Location Icon','warehouse-cargo'),
        'section' => 'warehouse_cargo_top_header',
        'setting' => 'warehouse_cargo_location_icon',
        'type'  => 'text',
        'default' => 'fas fa-map-marker-alt',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fas fa-map-marker-alt','warehouse-cargo')
    ));

    $wp_customize->add_setting('warehouse_cargo_location',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('warehouse_cargo_location',array(
        'label' => esc_html__('Add Location','warehouse-cargo'),
        'section' => 'warehouse_cargo_top_header',
        'setting' => 'warehouse_cargo_location',
        'type'  => 'text'
    ));
    $wp_customize->add_setting('warehouse_cargo_careers_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('warehouse_cargo_careers_icon',array(
        'label' => esc_html__('Add Careers Icon','warehouse-cargo'),
        'section' => 'warehouse_cargo_top_header',
        'setting' => 'warehouse_cargo_careers_icon',
        'type'  => 'text',
        'default' => 'fas fa-user',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fas fa-user','warehouse-cargo')
    ));

    $wp_customize->add_setting('warehouse_cargo_careers_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('warehouse_cargo_careers_text',array(
        'label' => esc_html__('Careers Text','warehouse-cargo'),
        'section' => 'warehouse_cargo_top_header',
        'setting' => 'warehouse_cargo_careers_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('warehouse_cargo_careers_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('warehouse_cargo_careers_url',array(
        'label' => esc_html__('Careers URL','warehouse-cargo'),
        'section' => 'warehouse_cargo_top_header',
        'setting' => 'warehouse_cargo_careers_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('warehouse_cargo_headerbtn_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('warehouse_cargo_headerbtn_text',array(
        'label' => esc_html__('Button Text','warehouse-cargo'),
        'section' => 'warehouse_cargo_top_header',
        'setting' => 'warehouse_cargo_headerbtn_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('warehouse_cargo_headerbtn_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('warehouse_cargo_headerbtn_url',array(
        'label' => esc_html__('Button URL','warehouse-cargo'),
        'section' => 'warehouse_cargo_top_header',
        'setting' => 'warehouse_cargo_headerbtn_url',
        'type'  => 'url'
    ));

     // Pro Version
    $wp_customize->add_setting( 'pro_version_header_setting', array(
        'sanitize_callback' => 'Warehouse_Cargo_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Warehouse_Cargo_Customize_Pro_Version ( $wp_customize,'pro_version_header_setting', array(
        'section'     => 'warehouse_cargo_top_header',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'warehouse-cargo' ),
        'description' => esc_url( WAREHOUSE_CARGO_URL ),
        'priority'    => 100
    )));

    //Slider
    $wp_customize->add_section('warehouse_cargo_top_slider',array(
        'title' => esc_html__('Slider Option','warehouse-cargo')
    ));

    $wp_customize->add_setting('warehouse_cargo_slider_setting', array(
        'default' => 0,
        'sanitize_callback' => 'warehouse_cargo_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'warehouse_cargo_slider_setting',array(
        'label'          => __( 'Enable Disable Slider', 'warehouse-cargo' ),
        'section'        => 'warehouse_cargo_top_slider',
        'settings'       => 'warehouse_cargo_slider_setting',
        'type'           => 'checkbox',
    )));

    for ( $count = 1; $count <= 3; $count++ ) {
        $wp_customize->add_setting( 'warehouse_cargo_top_slider_page' . $count, array(
            'default'           => '',
            'sanitize_callback' => 'warehouse_cargo_sanitize_dropdown_pages'
        ) );
        $wp_customize->add_control( 'warehouse_cargo_top_slider_page' . $count, array(
            'label'    => __( 'Select Slide Page', 'warehouse-cargo' ),
            'section'  => 'warehouse_cargo_top_slider',
            'type'     => 'dropdown-pages'
        ) );
    }

    //Slider Image Opacity
    $wp_customize->add_setting('warehouse_cargo_slider_opacity_color',array(
      'default' => '',
      'sanitize_callback' => 'warehouse_cargo_sanitize_choices'
    ));

    $wp_customize->add_control( 'warehouse_cargo_slider_opacity_color', array(
    'label'       => esc_html__( 'Slider Image Opacity','warehouse-cargo' ),
    'section'     => 'warehouse_cargo_top_slider',
    'type'        => 'select',
    'choices' => array(
      '0' =>  esc_attr('0','warehouse-cargo'),
      '0.1' =>  esc_attr('0.1','warehouse-cargo'),
      '0.2' =>  esc_attr('0.2','warehouse-cargo'),
      '0.3' =>  esc_attr('0.3','warehouse-cargo'),
      '0.4' =>  esc_attr('0.4','warehouse-cargo'),
      '0.5' =>  esc_attr('0.5','warehouse-cargo'),
      '0.6' =>  esc_attr('0.6','warehouse-cargo'),
      '0.7' =>  esc_attr('0.7','warehouse-cargo'),
      '0.8' =>  esc_attr('0.8','warehouse-cargo'),
      '0.9' =>  esc_attr('0.9','warehouse-cargo')
    ),
    ));

     // Pro Version
    $wp_customize->add_setting( 'pro_version_slider_setting', array(
        'sanitize_callback' => 'Warehouse_Cargo_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Warehouse_Cargo_Customize_Pro_Version ( $wp_customize,'pro_version_slider_setting', array(
        'section'     => 'warehouse_cargo_top_slider',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'warehouse-cargo' ),
        'description' => esc_url( WAREHOUSE_CARGO_URL ),
        'priority'    => 100
    )));

    // Details Section
    $wp_customize->add_section('warehouse_cargo_details_section',array(
        'title' => esc_html__('Contact Details Section','warehouse-cargo')
    ));

    $wp_customize->add_setting('warehouse_cargo_home_contact_setting', array(
        'default' => 0,
        'sanitize_callback' => 'warehouse_cargo_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'warehouse_cargo_home_contact_setting',array(
        'label'          => __( 'Enable Disable Contact', 'warehouse-cargo' ),
        'section'        => 'warehouse_cargo_details_section',
        'settings'       => 'warehouse_cargo_home_contact_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('warehouse_cargo_detail_call_heading',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('warehouse_cargo_detail_call_heading',array(
        'label' => esc_html__('Call Center Heading','warehouse-cargo'),
        'section'   => 'warehouse_cargo_details_section',
        'type'      => 'text',
    ));

    $wp_customize->add_setting('warehouse_cargo_detail_call_text',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('warehouse_cargo_detail_call_text',array(
        'label' => esc_html__('Calling Number','warehouse-cargo'),
        'section'   => 'warehouse_cargo_details_section',
        'type'      => 'text',
    ));

    $wp_customize->add_setting('warehouse_cargo_detail_working_heading',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('warehouse_cargo_detail_working_heading',array(
        'label' => esc_html__('Working Hour Heading','warehouse-cargo'),
        'section'   => 'warehouse_cargo_details_section',
        'type'      => 'text',
    ));

    $wp_customize->add_setting('warehouse_cargo_detail_working_text',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('warehouse_cargo_detail_working_text',array(
        'label' => esc_html__('Timming','warehouse-cargo'),
        'section'   => 'warehouse_cargo_details_section',
        'type'      => 'text',
    ));

    $wp_customize->add_setting('warehouse_cargo_detail_location_heading',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('warehouse_cargo_detail_location_heading',array(
        'label' => esc_html__('Location Heading','warehouse-cargo'),
        'section'   => 'warehouse_cargo_details_section',
        'type'      => 'text',
    ));

    $wp_customize->add_setting('warehouse_cargo_detail_location_text',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('warehouse_cargo_detail_location_text',array(
        'label' => esc_html__('Location','warehouse-cargo'),
        'section'   => 'warehouse_cargo_details_section',
        'type'      => 'text',
    ));

    $wp_customize->add_setting('warehouse_cargo_detail_quote_heading',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('warehouse_cargo_detail_quote_heading',array(
        'label' => esc_html__('Detailed Quote Heading','warehouse-cargo'),
        'section'   => 'warehouse_cargo_details_section',
        'type'      => 'text',
    ));

    $wp_customize->add_setting('warehouse_cargo_detail_quote_text',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('warehouse_cargo_detail_quote_text',array(
        'label' => esc_html__('Button Text','warehouse-cargo'),
        'section'   => 'warehouse_cargo_details_section',
        'type'      => 'text',
    ));

    $wp_customize->add_setting('warehouse_cargo_detail_quote_url',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('warehouse_cargo_detail_quote_url',array(
        'label' => esc_html__('Button URL','warehouse-cargo'),
        'section'   => 'warehouse_cargo_details_section',
        'type'      => 'url',
    ));

     // Pro Version
    $wp_customize->add_setting( 'pro_version_details_setting', array(
        'sanitize_callback' => 'Warehouse_Cargo_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Warehouse_Cargo_Customize_Pro_Version ( $wp_customize,'pro_version_details_setting', array(
        'section'     => 'warehouse_cargo_details_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'warehouse-cargo' ),
        'description' => esc_url( WAREHOUSE_CARGO_URL ),
        'priority'    => 100
    )));



    // Latest Post Section
    $wp_customize->add_section('warehouse_cargo_latest_post',array(
        'title' => esc_html__('Latest Post Section','warehouse-cargo')
    ));

    $wp_customize->add_setting('warehouse_cargo_latest_post_setting', array(
        'default' => 0,
        'sanitize_callback' => 'warehouse_cargo_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'warehouse_cargo_latest_post_setting',array(
        'label'          => __( 'Enable Disable Latest Post', 'warehouse-cargo' ),
        'section'        => 'warehouse_cargo_latest_post',
        'settings'       => 'warehouse_cargo_latest_post_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('warehouse_cargo_latest_post_loop',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('warehouse_cargo_latest_post_loop',array(
        'label' => esc_html__('No of latest post','warehouse-cargo'),
        'section'   => 'warehouse_cargo_latest_post',
        'type'      => 'number',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 0,
            'max'              => 12,
        ),
    ));

    $latest_post_loop = get_theme_mod('warehouse_cargo_latest_post_loop');

    $warehouse_cargo_args = array('numberposts' => -1);
    $post_list = get_posts($warehouse_cargo_args);
    $i = 1;
    $pst_sls[]= __('Select','warehouse-cargo');
    foreach ($post_list as $key => $p_post) {
        $pst_sls[$p_post->ID]=$p_post->post_title;
    }
    for ( $i = 1; $i <= $latest_post_loop; $i++ ) {
        $wp_customize->add_setting('warehouse_cargo_other_latest_post_section'.$i,array(
            'sanitize_callback' => 'warehouse_cargo_sanitize_choices',
        ));
        $wp_customize->add_control('warehouse_cargo_other_latest_post_section'.$i,array(
            'type'    => 'select',
            'choices' => $pst_sls,
            'label' => __('Select Post','warehouse-cargo'),
            'section' => 'warehouse_cargo_latest_post',
        ));
    }
    wp_reset_postdata();

     // Pro Version
    $wp_customize->add_setting( 'pro_version_latest_post_setting', array(
        'sanitize_callback' => 'Warehouse_Cargo_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Warehouse_Cargo_Customize_Pro_Version ( $wp_customize,'pro_version_latest_post_setting', array(
        'section'     => 'warehouse_cargo_latest_post',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'warehouse-cargo' ),
        'description' => esc_url( WAREHOUSE_CARGO_URL ),
        'priority'    => 100
    )));

    // Footer
    $wp_customize->add_section('warehouse_cargo_site_footer_section', array(
        'title' => esc_html__('Footer', 'warehouse-cargo'),
    ));

    $wp_customize->add_setting('warehouse_cargo_footer_text_setting', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('warehouse_cargo_footer_text_setting', array(
        'label' => __('Replace the footer text', 'warehouse-cargo'),
        'section' => 'warehouse_cargo_site_footer_section',
        'priority' => 1,
        'type' => 'text',
    ));

    $wp_customize->add_setting('warehouse_cargo_show_hide_copyright',array(
        'default' => true,
        'sanitize_callback' => 'warehouse_cargo_sanitize_checkbox'
    ));
    $wp_customize->add_control('warehouse_cargo_show_hide_copyright',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Copyright','warehouse-cargo'),
        'section' => 'warehouse_cargo_site_footer_section',
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_footer_setting', array(
        'sanitize_callback' => 'Warehouse_Cargo_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Warehouse_Cargo_Customize_Pro_Version ( $wp_customize,'pro_version_footer_setting', array(
        'section'     => 'warehouse_cargo_site_footer_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'warehouse-cargo' ),
        'description' => esc_url( WAREHOUSE_CARGO_URL ),
        'priority'    => 100
    )));

    // Post Settings
     $wp_customize->add_section('warehouse_cargo_post_settings',array(
        'title' => esc_html__('Post Settings','warehouse-cargo'),
        'priority'   =>40,
    ));

    $wp_customize->add_setting('warehouse_cargo_post_page_title',array(
        'sanitize_callback' => 'warehouse_cargo_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('warehouse_cargo_post_page_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Title', 'warehouse-cargo'),
        'section'     => 'warehouse_cargo_post_settings',
        'description' => esc_html__('Check this box to enable title on post page.', 'warehouse-cargo'),
    ));

    $wp_customize->add_setting('warehouse_cargo_post_page_thumb',array(
        'sanitize_callback' => 'warehouse_cargo_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('warehouse_cargo_post_page_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Thumbnail', 'warehouse-cargo'),
        'section'     => 'warehouse_cargo_post_settings',
        'description' => esc_html__('Check this box to enable thumbnail on post page.', 'warehouse-cargo'),
    ));

    $wp_customize->add_setting('warehouse_cargo_post_page_btn',array(
        'sanitize_callback' => 'warehouse_cargo_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('warehouse_cargo_post_page_btn',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Button', 'warehouse-cargo'),
        'section'     => 'warehouse_cargo_post_settings',
        'description' => esc_html__('Check this box to enable button on post page.', 'warehouse-cargo'),
    ));

    $wp_customize->add_setting('warehouse_cargo_single_post_thumb',array(
        'sanitize_callback' => 'warehouse_cargo_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('warehouse_cargo_single_post_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Thumbnail', 'warehouse-cargo'),
        'section'     => 'warehouse_cargo_post_settings',
        'description' => esc_html__('Check this box to enable post thumbnail on single post.', 'warehouse-cargo'),
    ));

    $wp_customize->add_setting('warehouse_cargo_single_post_title',array(
            'sanitize_callback' => 'warehouse_cargo_sanitize_checkbox',
            'default'           => 1,
    ));
    $wp_customize->add_control('warehouse_cargo_single_post_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Title', 'warehouse-cargo'),
        'section'     => 'warehouse_cargo_post_settings',
        'description' => esc_html__('Check this box to enable title on single post.', 'warehouse-cargo'),
    ));

    // Page Settings
    $wp_customize->add_section('warehouse_cargo_page_settings',array(
        'title' => esc_html__('Page Settings','warehouse-cargo'),
        'priority'   =>50,
    ));

    $wp_customize->add_setting('warehouse_cargo_single_page_title',array(
            'sanitize_callback' => 'warehouse_cargo_sanitize_checkbox',
            'default'           => 1,
    ));
    $wp_customize->add_control('warehouse_cargo_single_page_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Page Title', 'warehouse-cargo'),
        'section'     => 'warehouse_cargo_page_settings',
        'description' => esc_html__('Check this box to enable title on single page.', 'warehouse-cargo'),
    ));

    $wp_customize->add_setting('warehouse_cargo_single_page_thumb',array(
        'sanitize_callback' => 'warehouse_cargo_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('warehouse_cargo_single_page_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Page Thumbnail', 'warehouse-cargo'),
        'section'     => 'warehouse_cargo_page_settings',
        'description' => esc_html__('Check this box to enable page thumbnail on single page.', 'warehouse-cargo'),
    ));
     
}
add_action('customize_register', 'warehouse_cargo_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function warehouse_cargo_customize_partial_blogname(){
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function warehouse_cargo_customize_partial_blogdescription(){
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function warehouse_cargo_customize_preview_js(){
    wp_enqueue_script('warehouse-cargo-customizer', esc_url(get_template_directory_uri()) . '/assets/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'warehouse_cargo_customize_preview_js');

/*
** Load dynamic logic for the customizer controls area.
*/
function warehouse_cargo_panels_js() {
    wp_enqueue_style( 'warehouse-cargo-customizer-layout-css', get_theme_file_uri( '/assets/css/customizer-layout.css' ) );
    wp_enqueue_script( 'warehouse-cargo-customize-layout', get_theme_file_uri( '/assets/js/customize-layout.js' ), array(), '1.2', true );
}
add_action( 'customize_controls_enqueue_scripts', 'warehouse_cargo_panels_js' );

