<?php
/**
 * Movers and Packers: Customizer
 *
 * @subpackage Movers and Packers
 * @since 1.0
 */

use WPTRT\Customize\Section\Movers_And_Packers_Button;

add_action( 'customize_register', function( $manager ) {

	$manager->register_section_type( Movers_And_Packers_Button::class );

	$manager->add_section(
		new Movers_And_Packers_Button( $manager, 'movers_and_packers_pro', [
			'title' => __( 'Movers and Packers Pro', 'movers-and-packers' ),
			'priority' => 0,
			'button_text' => __( 'Go Pro', 'movers-and-packers' ),
			'button_url'  => esc_url( 'https://www.luzuk.com/product/movers-packers-wordpress-theme/', 'movers-and-packers')
		] )
	);

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'movers-and-packers-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);

	wp_enqueue_style(
		'movers-and-packers-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );

function movers_and_packers_customize_register( $wp_customize ) {

	$wp_customize->add_setting('movers_and_packers_logo_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('movers_and_packers_logo_padding',array(
		'label' => __('Logo Margin','movers-and-packers'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('movers_and_packers_logo_top_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'movers_and_packers_sanitize_float'
	));
	$wp_customize->add_control('movers_and_packers_logo_top_padding',array(
		'type' => 'number',
		'description' => __('Top','movers-and-packers'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('movers_and_packers_logo_bottom_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'movers_and_packers_sanitize_float'
	));
	$wp_customize->add_control('movers_and_packers_logo_bottom_padding',array(
		'type' => 'number',
		'description' => __('Bottom','movers-and-packers'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('movers_and_packers_logo_left_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'movers_and_packers_sanitize_float'
	));
	$wp_customize->add_control('movers_and_packers_logo_left_padding',array(
		'type' => 'number',
		'description' => __('Left','movers-and-packers'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('movers_and_packers_logo_right_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'movers_and_packers_sanitize_float'
 	));
 	$wp_customize->add_control('movers_and_packers_logo_right_padding',array(
		'type' => 'number',
		'description' => __('Right','movers-and-packers'),
		'section' => 'title_tagline',
    ));

	$wp_customize->add_setting('movers_and_packers_show_site_title',array(
		'default' => true,
		'sanitize_callback'	=> 'movers_and_packers_sanitize_checkbox'
	));
	$wp_customize->add_control('movers_and_packers_show_site_title',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Title','movers-and-packers'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('movers_and_packers_site_title_fontsize',array(
		'default' => '',
		'sanitize_callback'	=> 'movers_and_packers_sanitize_float'
	));
	$wp_customize->add_control('movers_and_packers_site_title_fontsize',array(
		'type' => 'number',
		'label' => __('Site Title Font Size','movers-and-packers'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('movers_and_packers_show_tagline',array(
		'default' => true,
		'sanitize_callback'	=> 'movers_and_packers_sanitize_checkbox'
	));
	$wp_customize->add_control('movers_and_packers_show_tagline',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Tagline','movers-and-packers'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('movers_and_packers_site_tagline_fontsize',array(
		'default' => '',
		'sanitize_callback'	=> 'movers_and_packers_sanitize_float'
	));
	$wp_customize->add_control('movers_and_packers_site_tagline_fontsize',array(
		'type' => 'number',
		'label' => __('Site Tagline Font Size','movers-and-packers'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_panel( 'movers_and_packers_panel_id', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Settings', 'movers-and-packers' ),
		'description' => __( 'Description of what this panel does.', 'movers-and-packers' ),
	) );

	$wp_customize->add_section( 'movers_and_packers_theme_options_section', array(
    	'title'      => __( 'General Settings', 'movers-and-packers' ),
		'priority'   => 30,
		'panel' => 'movers_and_packers_panel_id'
	) );

	$wp_customize->add_setting('movers_and_packers_theme_options',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'movers_and_packers_sanitize_choices'
	));
	$wp_customize->add_control('movers_and_packers_theme_options',array(
		'type' => 'select',
		'label' => __('Blog Page Sidebar Layout','movers-and-packers'),
		'section' => 'movers_and_packers_theme_options_section',
		'choices' => array(
		   'Left Sidebar' => __('Left Sidebar','movers-and-packers'),
		   'Right Sidebar' => __('Right Sidebar','movers-and-packers'),
		   'One Column' => __('One Column','movers-and-packers'),
		   'Three Columns' => __('Three Columns','movers-and-packers'),
		   'Four Columns' => __('Four Columns','movers-and-packers'),
		   'Grid Layout' => __('Grid Layout','movers-and-packers')
		),
	));

	$wp_customize->add_setting('movers_and_packers_single_post_sidebar',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'movers_and_packers_sanitize_choices'
	));
	$wp_customize->add_control('movers_and_packers_single_post_sidebar',array(
        'type' => 'select',
        'label' => __('Single Post Sidebar Layout','movers-and-packers'),
        'section' => 'movers_and_packers_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','movers-and-packers'),
            'Right Sidebar' => __('Right Sidebar','movers-and-packers'),
            'One Column' => __('One Column','movers-and-packers')
        ),
	));

	$wp_customize->add_setting('movers_and_packers_page_sidebar',array(
		'default' => 'One Column',
		'sanitize_callback' => 'movers_and_packers_sanitize_choices'
	));
	$wp_customize->add_control('movers_and_packers_page_sidebar',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','movers-and-packers'),
        'section' => 'movers_and_packers_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','movers-and-packers'),
            'Right Sidebar' => __('Right Sidebar','movers-and-packers'),
            'One Column' => __('One Column','movers-and-packers')
        ),
	));

	$wp_customize->add_setting('movers_and_packers_archive_page_sidebar',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'movers_and_packers_sanitize_choices'
	));
	$wp_customize->add_control('movers_and_packers_archive_page_sidebar',array(
        'type' => 'select',
        'label' => __('Archive & Search Page Sidebar Layout','movers-and-packers'),
        'section' => 'movers_and_packers_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','movers-and-packers'),
            'Right Sidebar' => __('Right Sidebar','movers-and-packers'),
            'One Column' => __('One Column','movers-and-packers'),
		    'Three Columns' => __('Three Columns','movers-and-packers'),
		    'Four Columns' => __('Four Columns','movers-and-packers'),
            'Grid Layout' => __('Grid Layout','movers-and-packers')
        ),
	));

	//Header
	$wp_customize->add_section( 'movers_and_packers_topheader_section' , array(
    	'title'    => __( 'Top Header', 'movers-and-packers' ),
		'priority' => null,
		'panel' => 'movers_and_packers_panel_id'
	) );

	$wp_customize->add_setting('movers_and_packers_topbar_text',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movers_and_packers_topbar_text',array(
	   	'type' => 'text',
	   	'label' => __('Add Topbar Text','movers-and-packers'),
	   	'section' => 'movers_and_packers_topheader_section',
	));

	$wp_customize->add_setting('movers_and_packers_phone_number',array(
    	'default' => '',
    	'sanitize_callback'	=> 'movers_and_packers_sanitize_phone_number'
	));
	$wp_customize->add_control('movers_and_packers_phone_number',array(
	   	'type' => 'text',
	   	'label' => __('Add Phone Number','movers-and-packers'),
	   	'section' => 'movers_and_packers_topheader_section',
	));

	$wp_customize->add_setting('movers_and_packers_email_address',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_email'
	));
	$wp_customize->add_control('movers_and_packers_email_address',array(
	   	'type' => 'text',
	   	'label' => __('Add Email Address','movers-and-packers'),
	   	'section' => 'movers_and_packers_topheader_section',
	));

	$wp_customize->add_setting('movers_and_packers_facebook_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('movers_and_packers_facebook_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Facebook URL','movers-and-packers'),
	   	'section' => 'movers_and_packers_topheader_section',
	));

	$wp_customize->add_setting('movers_and_packers_instagram_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('movers_and_packers_instagram_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Instagram URL','movers-and-packers'),
	   	'section' => 'movers_and_packers_topheader_section',
	));

	$wp_customize->add_setting('movers_and_packers_twitter_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('movers_and_packers_twitter_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Twitter URL','movers-and-packers'),
	   	'section' => 'movers_and_packers_topheader_section',
	));

	$wp_customize->add_setting('movers_and_packers_linkedin_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('movers_and_packers_linkedin_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Linkedin URL','movers-and-packers'),
	   	'section' => 'movers_and_packers_topheader_section',
	));

	$wp_customize->add_setting( 'movers_and_packers_tptext_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'movers_and_packers_tptext_color', array(
		'label' => 'Top Header Text Color',
		'section' => 'movers_and_packers_topheader_section',
	)));

	$wp_customize->add_setting( 'movers_and_packers_tpicon_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'movers_and_packers_tpicon_color', array(
		'label' => 'Top Header Icon Color',
		'section' => 'movers_and_packers_topheader_section',
	)));

	//home page slider
	$wp_customize->add_section( 'movers_and_packers_slider_section' , array(
    	'title'    => __( 'Slider Settings', 'movers-and-packers' ),
		'priority' => null,
		'panel' => 'movers_and_packers_panel_id'
	) );

	$wp_customize->add_setting('movers_and_packers_slider_hide_show',array(
    	'default' => false,
    	'sanitize_callback'	=> 'movers_and_packers_sanitize_checkbox'
	));
	$wp_customize->add_control('movers_and_packers_slider_hide_show',array(
	   	'type' => 'checkbox',
	   	'label' => __('Show / Hide Slider','movers-and-packers'),
	   	'section' => 'movers_and_packers_slider_section',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'movers_and_packers_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'movers_and_packers_sanitize_dropdown_pages'
		));
		$wp_customize->add_control( 'movers_and_packers_slider' . $count, array(
			'label' => __('Select Slider Image Page', 'movers-and-packers' ),
			'description'=> __('Image size (700px x 550px)','movers-and-packers'),
			'section' => 'movers_and_packers_slider_section',
			'type' => 'dropdown-pages'
		));
	}

	$wp_customize->add_setting('movers_and_packers_slider_excerpt_length',array(
		'default' => '15',
		'sanitize_callback'	=> 'movers_and_packers_sanitize_float'
	));
	$wp_customize->add_control('movers_and_packers_slider_excerpt_length',array(
		'type' => 'number',
		'label' => __('Slider Excerpt Length','movers-and-packers'),
		'section' => 'movers_and_packers_slider_section',
	));

	$wp_customize->add_setting( 'movers_and_packers_slider_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'movers_and_packers_slider_color', array(
		'label' => 'Text Color',
		'section' => 'movers_and_packers_slider_section',
	)));

	//Services Section
	$wp_customize->add_section('movers_and_packers_service_section',array(
		'title'	=> __('Service Section','movers-and-packers'),
		'description'=> __('Note : This section will appear below the slider.','movers-and-packers'),
		'panel' => 'movers_and_packers_panel_id',
	));

    $wp_customize->add_setting('movers_and_packers_small_title',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('movers_and_packers_small_title',array(
		'label'	=> __('Section Small Title','movers-and-packers'),
		'section' => 'movers_and_packers_service_section',
		'type' => 'text'
	));

    $wp_customize->add_setting('movers_and_packers_section_title',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('movers_and_packers_section_title',array(
		'label'	=> __('Section Title','movers-and-packers'),
		'section' => 'movers_and_packers_service_section',
		'type' => 'text'
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_pst[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_pst[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('movers_and_packers_category_setting',array(
		'default' => 'select',
		'sanitize_callback' => 'movers_and_packers_sanitize_choices',
	));
	$wp_customize->add_control('movers_and_packers_category_setting',array(
		'type' => 'select',
		'choices' => $cat_pst,
		'label' => __('Select Category To Display Post','movers-and-packers'),
		'section' => 'movers_and_packers_service_section',
	));

	$wp_customize->add_setting( 'movers_and_packers_service_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	   ));
	 $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'movers_and_packers_service_color', array(
		   'label' => 'Text Color',
		'section' => 'movers_and_packers_service_section',
	   )));

	//Footer
    $wp_customize->add_section( 'movers_and_packers_footer', array(
    	'title'  => __( 'Footer Setting', 'movers-and-packers' ),
		'priority' => null,
		'panel' => 'movers_and_packers_panel_id'
	) );

	$wp_customize->add_setting('movers_and_packers_show_back_totop',array(
       'default' => true,
       'sanitize_callback'	=> 'movers_and_packers_sanitize_checkbox'
    ));
    $wp_customize->add_control('movers_and_packers_show_back_totop',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Back to Top','movers-and-packers'),
       'section' => 'movers_and_packers_footer'
    ));

    $wp_customize->add_setting('movers_and_packers_footer_copy',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('movers_and_packers_footer_copy',array(
		'label'	=> __('Copyright Text','movers-and-packers'),
		'section' => 'movers_and_packers_footer',
		'setting' => 'movers_and_packers_footer_copy',
		'type' => 'text'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'movers_and_packers_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'movers_and_packers_customize_partial_blogdescription',
	) );
}
add_action( 'customize_register', 'movers_and_packers_customize_register' );

function movers_and_packers_customize_partial_blogname() {
	bloginfo( 'name' );
}

function movers_and_packers_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function movers_and_packers_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

function movers_and_packers_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}