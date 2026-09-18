<?php
/**
 * VW Transport Cargo Theme Customizer
 *
 * @package VW Transport Cargo
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_transport_cargo_custom_controls() {

    load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_transport_cargo_custom_controls' );

function vw_transport_cargo_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'vw_transport_cargo_customize_partial_blogname', 
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'vw_transport_cargo_customize_partial_blogdescription', 
	));

   	//add home page setting pannel
	$VWTransportCargoParentPanel = new VW_Transport_Cargo_WP_Customize_Panel( $wp_customize, 'vw_transport_cargo_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'VW Settings', 'vw-transport-cargo' ),
		'priority' => 10,
	));

	$wp_customize->add_panel( $VWTransportCargoParentPanel );

	$HomePageParentPanel = new VW_Transport_Cargo_WP_Customize_Panel( $wp_customize, 'vw_transport_cargo_homepage_panel', array(
		'title' => __( 'Homepage Settings', 'vw-transport-cargo' ),
		'panel' => 'vw_transport_cargo_panel_id',
	));

	$wp_customize->add_panel( $HomePageParentPanel );

	//Topbar
	$wp_customize->add_section( 'vw_transport_cargo_topbar', array(
    	'title'      => __( 'Topbar Settings', 'vw-transport-cargo' ),
		'priority'   => null,
		'panel' => 'vw_transport_cargo_homepage_panel'
	) );

   	// Header Background color
	$wp_customize->add_setting('vw_transport_cargo_header_background_color', array(
		'default'           => '#3761c8',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_transport_cargo_header_background_color', array(
		'label'    => __('Header Background Color', 'vw-transport-cargo'),
		'section'  => 'header_image',
	)));

	$wp_customize->add_setting('vw_transport_cargo_header_img_position',array(
	  'default' => 'center top',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'vw_transport_cargo_sanitize_choices'
	));
	$wp_customize->add_control('vw_transport_cargo_header_img_position',array(
		'type' => 'select',
		'label' => __('Header Image Position','vw-transport-cargo'),
		'section' => 'header_image',
		'choices' 	=> array(
			'left top' 		=> esc_html__( 'Top Left', 'vw-transport-cargo' ),
			'center top'   => esc_html__( 'Top', 'vw-transport-cargo' ),
			'right top'   => esc_html__( 'Top Right', 'vw-transport-cargo' ),
			'left center'   => esc_html__( 'Left', 'vw-transport-cargo' ),
			'center center'   => esc_html__( 'Center', 'vw-transport-cargo' ),
			'right center'   => esc_html__( 'Right', 'vw-transport-cargo' ),
			'left bottom'   => esc_html__( 'Bottom Left', 'vw-transport-cargo' ),
			'center bottom'   => esc_html__( 'Bottom', 'vw-transport-cargo' ),
			'right bottom'   => esc_html__( 'Bottom Right', 'vw-transport-cargo' ),
		),
	));

    //Sticky Header
	$wp_customize->add_setting( 'vw_transport_cargo_sticky_header',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_sticky_header',array(
        'label' => esc_html__( 'Show / Hide Sticky Header','vw-transport-cargo' ),
        'section' => 'vw_transport_cargo_topbar'
    )));

    $wp_customize->add_setting('vw_transport_cargo_sticky_header_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_sticky_header_padding',array(
		'label'	=> __('Sticky Header Padding','vw-transport-cargo'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_transport_cargo_search_hide_show',
       array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_search_hide_show',
       array(
      'label' => esc_html__( 'Show / Hide Search','vw-transport-cargo' ),
      'section' => 'vw_transport_cargo_topbar'
    )));

    $wp_customize->add_setting('vw_transport_cargo_search_icon',array(
		'default'	=> 'fas fa-search',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Transport_Cargo_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_transport_cargo_search_icon',array(
		'label'	=> __('Add Search Icon','vw-transport-cargo'),
		'transport' => 'refresh',
		'section'	=> 'vw_transport_cargo_topbar',
		'setting'	=> 'vw_transport_cargo_search_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_transport_cargo_search_close_icon',array(
		'default'	=> 'fa fa-window-close',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Transport_Cargo_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_transport_cargo_search_close_icon',array(
		'label'	=> __('Add Search Close Icon','vw-transport-cargo'),
		'transport' => 'refresh',
		'section'	=> 'vw_transport_cargo_topbar',
		'setting'	=> 'vw_transport_cargo_search_close_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('vw_transport_cargo_search_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_search_font_size',array(
		'label'	=> __('Search Font Size','vw-transport-cargo'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_search_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_search_padding_top_bottom',array(
		'label'	=> __('Search Padding Top Bottom','vw-transport-cargo'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_search_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_search_padding_left_right',array(
		'label'	=> __('Search Padding Left Right','vw-transport-cargo'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_transport_cargo_search_border_radius', array(
		'default'              => "",
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_transport_cargo_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_transport_cargo_search_border_radius', array(
		'label'       => esc_html__( 'Search Border Radius','vw-transport-cargo' ),
		'section'     => 'vw_transport_cargo_topbar',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_transport_cargo_button_text', array( 
		'selector' => '.top-btn a', 
		'render_callback' => 'vw_transport_cargo_customize_partial_vw_transport_cargo_button_text', 
	));

	$wp_customize->add_setting('vw_transport_cargo_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_transport_cargo_button_text',array(
		'label'	=> __('Add Button Text','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( 'REQUEST A QUOTE', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_topbar',
		'type'=> 'text'
	));		

	$wp_customize->add_setting('vw_transport_cargo_button_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('vw_transport_cargo_button_url',array(
		'label'	=> __('Add Button URL','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( 'www.example.com', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_topbar',
		'type'=> 'url'
	));	

	//Menus Settings
	$wp_customize->add_section( 'vw_transport_cargo_menu_section' , array(
    	'title' => __( 'Menus Settings', 'vw-transport-cargo' ),
		'panel' => 'vw_transport_cargo_homepage_panel'
	) );

	$wp_customize->add_setting('vw_transport_cargo_navigation_menu_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_navigation_menu_font_size',array(
		'label'	=> __('Menus Font Size','vw-transport-cargo'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_menu_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_navigation_menu_font_weight',array(
        'default' => 700,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_transport_cargo_sanitize_choices'
	));
	$wp_customize->add_control('vw_transport_cargo_navigation_menu_font_weight',array(
        'type' => 'select',
        'label' => __('Menus Font Weight','vw-transport-cargo'),
        'section' => 'vw_transport_cargo_menu_section',
        'choices' => array(
        	'100' => __('100','vw-transport-cargo'),
            '200' => __('200','vw-transport-cargo'),
            '300' => __('300','vw-transport-cargo'),
            '400' => __('400','vw-transport-cargo'),
            '500' => __('500','vw-transport-cargo'),
            '600' => __('600','vw-transport-cargo'),
            '700' => __('700','vw-transport-cargo'),
            '800' => __('800','vw-transport-cargo'),
            '900' => __('900','vw-transport-cargo'),
        ),
	) );

	// text trasform
	$wp_customize->add_setting('vw_transport_cargo_menu_text_transform',array(
		'default'=> 'Uppercase',
		'sanitize_callback'	=> 'vw_transport_cargo_sanitize_choices'
	));
	$wp_customize->add_control('vw_transport_cargo_menu_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Menus Text Transform','vw-transport-cargo'),
		'choices' => array(
            'Uppercase' => __('Uppercase','vw-transport-cargo'),
            'Capitalize' => __('Capitalize','vw-transport-cargo'),
            'Lowercase' => __('Lowercase','vw-transport-cargo'),
        ),
		'section'=> 'vw_transport_cargo_menu_section',
	));

	$wp_customize->add_setting('vw_transport_cargo_menus_item_style',array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_transport_cargo_sanitize_choices'
	));
	$wp_customize->add_control('vw_transport_cargo_menus_item_style',array(
        'type' => 'select',
        'section' => 'vw_transport_cargo_menu_section',
		'label' => __('Menu Item Hover Style','vw-transport-cargo'),
		'choices' => array(
            'None' => __('None','vw-transport-cargo'),
            'Zoom In' => __('Zoom In','vw-transport-cargo'),
        ),
	) );

	$wp_customize->add_setting('vw_transport_cargo_header_menus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_transport_cargo_header_menus_color', array(
		'label'    => __('Menus Color', 'vw-transport-cargo'),
		'section'  => 'vw_transport_cargo_menu_section',
	)));

	$wp_customize->add_setting('vw_transport_cargo_header_menus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_transport_cargo_header_menus_hover_color', array(
		'label'    => __('Menus Hover Color', 'vw-transport-cargo'),
		'section'  => 'vw_transport_cargo_menu_section',
	)));

	$wp_customize->add_setting('vw_transport_cargo_header_submenus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_transport_cargo_header_submenus_color', array(
		'label'    => __('Sub Menus Color', 'vw-transport-cargo'),
		'section'  => 'vw_transport_cargo_menu_section',
	)));

	$wp_customize->add_setting('vw_transport_cargo_header_submenus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_transport_cargo_header_submenus_hover_color', array(
		'label'    => __('Sub Menus Hover Color', 'vw-transport-cargo'),
		'section'  => 'vw_transport_cargo_menu_section',
	)));

	//Social links
	$wp_customize->add_section(
		'vw_transport_cargo_social_links', array(
			'title'		=>	__('Social Links', 'vw-transport-cargo'),
			'priority'	=>	null,
			'panel'		=>	'vw_transport_cargo_homepage_panel'
		)
	);

	$wp_customize->add_setting('vw_transport_cargo_social_icons',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_social_icons',array(
		'label' =>  __('Steps to setup social icons','vw-transport-cargo'),
		'description' => __('<p>1. Go to Dashboard >> Appearance >> Widgets</p>
			<p>2. Add Vw Social Icon Widget in Social Widget area.</p>
			<p>3. Add social icons url and save.</p>','vw-transport-cargo'),
		'section'=> 'vw_transport_cargo_social_links',
		'type'=> 'hidden'
	));
	$wp_customize->add_setting('vw_transport_cargo_social_icon_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_social_icon_btn',array(
		'description' => "<a target='_blank' href='". admin_url('widgets.php') ." '>Setup Social Icons</a>",
		'section'=> 'vw_transport_cargo_social_links',
		'type'=> 'hidden'
	));
    
	//Slider
	$wp_customize->add_section( 'vw_transport_cargo_slidersettings' , array(
    	'title'      => __( 'Slider Section', 'vw-transport-cargo' ),
    	'description' => __('Free theme has 3 slides options, For unlimited slides and more options </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/transport-wordpress-theme/">GO PRO</a>','vw-transport-cargo'),
		'priority'   => null,
		'panel' => 'vw_transport_cargo_homepage_panel'
	) );

	$wp_customize->add_setting( 'vw_transport_cargo_slider_hide_show',
       array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_slider_hide_show',
       array(
      'label' => esc_html__( 'Show / Hide Slider','vw-transport-cargo' ),
      'section' => 'vw_transport_cargo_slidersettings'
    )));

    $wp_customize->add_setting('vw_transport_cargo_slider_type',array(
        'default' => 'Default slider',
        'sanitize_callback' => 'vw_transport_cargo_sanitize_choices'
	) );
	$wp_customize->add_control('vw_transport_cargo_slider_type', array(
        'type' => 'select',
        'label' => __('Slider Type','vw-transport-cargo'),
        'section' => 'vw_transport_cargo_slidersettings',
        'choices' => array(
            'Default slider' => __('Default slider','vw-transport-cargo'),
            'Advance slider' => __('Advance slider','vw-transport-cargo'),
        ),
	));

	$wp_customize->add_setting('vw_transport_cargo_advance_slider_shortcode',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_advance_slider_shortcode',array(
		'label'	=> __('Add Slider Shortcode','vw-transport-cargo'),
		'section'=> 'vw_transport_cargo_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_transport_cargo_advance_slider'
	));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_transport_cargo_slider_hide_show',array(
		'selector'        => '#slider .inner_carousel h1',
		'render_callback' => 'vw_transport_cargo_customize_partial_vw_transport_cargo_slider_hide_show',
	));

	for ( $count = 1; $count <= 3; $count++ ) {
		$wp_customize->add_setting( 'vw_transport_cargo_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_transport_cargo_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_transport_cargo_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'vw-transport-cargo' ),
			'description' => __('Slider image size (1500 x 590)','vw-transport-cargo'),
			'section'  => 'vw_transport_cargo_slidersettings',
			'type'     => 'dropdown-pages',
			'active_callback' => 'vw_transport_cargo_default_slider'
		) );
	}

	$wp_customize->add_setting('vw_transport_cargo_slider_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_slider_button_text',array(
		'label'	=> __('Add Slider Button Text','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( 'Read More', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_transport_cargo_default_slider'
	));

	$wp_customize->add_setting('vw_transport_cargo_slider_button_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Transport_Cargo_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_transport_cargo_slider_button_icon',array(
		'label'	=> __('Add Slider Button Icon','vw-transport-cargo'),
		'transport' => 'refresh',
		'section'	=> 'vw_transport_cargo_slidersettings',
		'setting'	=> 'vw_transport_cargo_slider_button_icon',
		'type'		=> 'icon',
		'active_callback' => 'vw_transport_cargo_default_slider'
	)));

	//content layout
	$wp_customize->add_setting('vw_transport_cargo_slider_content_option',array(
        'default' => 'Center',
        'sanitize_callback' => 'vw_transport_cargo_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Transport_Cargo_Image_Radio_Control($wp_customize, 'vw_transport_cargo_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','vw-transport-cargo'),
        'section' => 'vw_transport_cargo_slidersettings',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/slider-content1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/slider-content2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/slider-content3.png',
    ),
        'active_callback' => 'vw_transport_cargo_default_slider'
    )));

    //Slider content padding
    $wp_customize->add_setting('vw_transport_cargo_slider_content_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_slider_content_padding_top_bottom',array(
		'label'	=> __('Slider Content Padding Top Bottom','vw-transport-cargo'),
		'description'	=> __('Enter a value in %. Example:20%','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_transport_cargo_default_slider'
	));

	$wp_customize->add_setting('vw_transport_cargo_slider_content_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_slider_content_padding_left_right',array(
		'label'	=> __('Slider Content Padding Left Right','vw-transport-cargo'),
		'description'	=> __('Enter a value in %. Example:20%','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_transport_cargo_default_slider'
	));

    //Slider excerpt
	$wp_customize->add_setting( 'vw_transport_cargo_slider_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_transport_cargo_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_transport_cargo_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','vw-transport-cargo' ),
		'section'     => 'vw_transport_cargo_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_transport_cargo_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),'active_callback' => 'vw_transport_cargo_default_slider'
	) );

	//Slider height
	$wp_customize->add_setting('vw_transport_cargo_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_slider_height',array(
		'label'	=> __('Slider Height','vw-transport-cargo'),
		'description'	=> __('Specify the slider height (px).','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_transport_cargo_default_slider'
	));

	$wp_customize->add_setting( 'vw_transport_cargo_slider_speed', array(
		'default'  => 4000,
		'sanitize_callback'	=> 'vw_transport_cargo_sanitize_float'
	) );
	$wp_customize->add_control( 'vw_transport_cargo_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','vw-transport-cargo'),
		'section' => 'vw_transport_cargo_slidersettings',
		'type'  => 'number',
		'active_callback' => 'vw_transport_cargo_default_slider'
	) );

	//Opacity
	$wp_customize->add_setting('vw_transport_cargo_slider_opacity_color',array(
      'default'              => 0.5,
      'sanitize_callback' => 'vw_transport_cargo_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_transport_cargo_slider_opacity_color', array(
		'label'       => esc_html__( 'Slider Image Opacity','vw-transport-cargo' ),
		'section'     => 'vw_transport_cargo_slidersettings',
		'type'        => 'select',
		'settings'    => 'vw_transport_cargo_slider_opacity_color',
		'choices' => array(
	      '0' =>  esc_attr('0','vw-transport-cargo'),
	      '0.1' =>  esc_attr('0.1','vw-transport-cargo'),
	      '0.2' =>  esc_attr('0.2','vw-transport-cargo'),
	      '0.3' =>  esc_attr('0.3','vw-transport-cargo'),
	      '0.4' =>  esc_attr('0.4','vw-transport-cargo'),
	      '0.5' =>  esc_attr('0.5','vw-transport-cargo'),
	      '0.6' =>  esc_attr('0.6','vw-transport-cargo'),
	      '0.7' =>  esc_attr('0.7','vw-transport-cargo'),
	      '0.8' =>  esc_attr('0.8','vw-transport-cargo'),
	      '0.9' =>  esc_attr('0.9','vw-transport-cargo')
	),'active_callback' => 'vw_transport_cargo_default_slider'
	));

	$wp_customize->add_setting( 'vw_transport_cargo_slider_image_overlay',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_slider_image_overlay',array(
      	'label' => esc_html__( 'Show / Hide Slider Image Overlay','vw-transport-cargo' ),
      	'section' => 'vw_transport_cargo_slidersettings',
      	'active_callback' => 'vw_transport_cargo_default_slider'
    )));

    $wp_customize->add_setting('vw_transport_cargo_slider_image_overlay_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_transport_cargo_slider_image_overlay_color', array(
		'label'    => __('Slider Image Overlay Color', 'vw-transport-cargo'),
		'section'  => 'vw_transport_cargo_slidersettings',
		'active_callback' => 'vw_transport_cargo_default_slider'
	)));

	//Contact Us
	$wp_customize->add_section( 'vw_transport_cargo_contact_section' , array(
    	'title'      => __( 'Contact us Section', 'vw-transport-cargo' ),
		'priority'   => null,
		'panel' => 'vw_transport_cargo_homepage_panel'
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_transport_cargo_call_text', array( 
		'selector' => '#contact_us p', 
		'render_callback' => 'vw_transport_cargo_customize_partial_vw_transport_cargo_call_text',
	));


	$wp_customize->add_setting('vw_transport_cargo_phone_number_icon',array(
		'default'	=> 'fas fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Transport_Cargo_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_transport_cargo_phone_number_icon',array(
		'label'	=> __('Add Phone Icon','vw-transport-cargo'),
		'transport' => 'refresh',
		'section'	=> 'vw_transport_cargo_contact_section',
		'setting'	=> 'vw_transport_cargo_phone_number_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_transport_cargo_call_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_transport_cargo_call_text',array(
		'label'	=> __('Add Phone Text','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( 'Call us', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_contact_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_call',array(
		'default'=> '',
		'sanitize_callback'	=> 'vw_transport_cargo_sanitize_phone_number'
	));	
	$wp_customize->add_control('vw_transport_cargo_call',array(
		'label'	=> __('Add Phone Number','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '+123-7896-123', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_contact_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_email_adres_icon',array(
		'default'	=> 'fas fa-envelope',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Transport_Cargo_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_transport_cargo_email_adres_icon',array(
		'label'	=> __('Add Email Icon','vw-transport-cargo'),
		'transport' => 'refresh',
		'section'	=> 'vw_transport_cargo_contact_section',
		'setting'	=> 'vw_transport_cargo_email_adres_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_transport_cargo_email_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_transport_cargo_email_text',array(
		'label'	=> __('Add Email Text','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( 'Drop us Email', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_contact_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_email',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));	
	$wp_customize->add_control('vw_transport_cargo_email',array(
		'label'	=> __('Add Email Address','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( 'transport@gmail.com', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_contact_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_timings_icon',array(
		'default'	=> 'far fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Transport_Cargo_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_transport_cargo_timings_icon',array(
		'label'	=> __('Add Timing Icon','vw-transport-cargo'),
		'transport' => 'refresh',
		'section'	=> 'vw_transport_cargo_contact_section',
		'setting'	=> 'vw_transport_cargo_timings_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_transport_cargo_time_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_transport_cargo_time_text',array(
		'label'	=> __('Add Time Text','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( 'Timming', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_contact_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_time',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_transport_cargo_time',array(
		'label'	=> __('Add Opening Time','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( 'Mon to Fri 8:00am - 9:00pm', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_contact_section',
		'type'=> 'text'
	));

	//About
	$wp_customize->add_section( 'vw_transport_cargo_about_section' , array(
    	'title'      => __( 'About Section', 'vw-transport-cargo' ),
    	'description' => __('For more options of the about section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/transport-wordpress-theme/">GO PRO</a>','vw-transport-cargo'),
		'priority'   => null,
		'panel' => 'vw_transport_cargo_homepage_panel'
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_transport_cargo_about_page', array( 
		'selector' => '#about h2 a', 
		'render_callback' => 'vw_transport_cargo_customize_partial_vw_transport_cargo_about_page',
	));

	$wp_customize->add_setting( 'vw_transport_cargo_about_page', array(
		'default'           => '',
		'sanitize_callback' => 'vw_transport_cargo_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'vw_transport_cargo_about_page', array(
		'label'    => __( 'About Page', 'vw-transport-cargo' ),
		'section'  => 'vw_transport_cargo_about_section',
		'type'     => 'dropdown-pages'
	) );

	//About excerpt
	$wp_customize->add_setting( 'vw_transport_cargo_about_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_transport_cargo_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_transport_cargo_about_excerpt_number', array(
		'label'       => esc_html__( 'About Excerpt length','vw-transport-cargo' ),
		'section'     => 'vw_transport_cargo_about_section',
		'type'        => 'range',
		'settings'    => 'vw_transport_cargo_about_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//records Section
	$wp_customize->add_section('vw_transport_cargo_records', array(
		'title'       => __('Records Section', 'vw-transport-cargo'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-transport-cargo'),
		'priority'    => null,
		'panel'       => 'vw_transport_cargo_homepage_panel',
	));

	$wp_customize->add_setting('vw_transport_cargo_records_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_records_text',array(
		'description' => __('<p>1. More options for records section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for records section.</p>','vw-transport-cargo'),
		'section'=> 'vw_transport_cargo_records',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_transport_cargo_records_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_records_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_transport_cargo_guide') ." '>More Info</a>",
		'section'=> 'vw_transport_cargo_records',
		'type'=> 'hidden'
	));

	//Services
	$wp_customize->add_section( 'vw_transport_cargo_service_section' , array(
    	'title'      => __( 'Services Section', 'vw-transport-cargo' ),
    	'description' => __('For more options of the services section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/transport-wordpress-theme/">GO PRO</a>','vw-transport-cargo'),
		'priority'   => null,
		'panel' => 'vw_transport_cargo_homepage_panel'
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_transport_cargo_services', array( 
		'selector' => '#service-sec h3 a', 
		'render_callback' => 'vw_transport_cargo_customize_partial_vw_transport_cargo_services',
	));

	$categories = get_categories();
	$cat_post = array();
	$cat_post[]= 'select';
	$i = 0;	
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_transport_cargo_services',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vw_transport_cargo_sanitize_choices',
	));
	$wp_customize->add_control('vw_transport_cargo_services',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display services','vw-transport-cargo'),
		'description' => __('Image Size (50 x 45)','vw-transport-cargo'),
		'section' => 'vw_transport_cargo_service_section',
	));

	//Services excerpt
	$wp_customize->add_setting( 'vw_transport_cargo_services_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_transport_cargo_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_transport_cargo_services_excerpt_number', array(
		'label'       => esc_html__( 'Services Excerpt length','vw-transport-cargo' ),
		'section'     => 'vw_transport_cargo_service_section',
		'type'        => 'range',
		'settings'    => 'vw_transport_cargo_services_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//records Section
	$wp_customize->add_section('vw_transport_cargo_records', array(
		'title'       => __('Records Section', 'vw-transport-cargo'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-transport-cargo'),
		'priority'    => null,
		'panel'       => 'vw_transport_cargo_homepage_panel',
	));

	$wp_customize->add_setting('vw_transport_cargo_records_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_records_text',array(
		'description' => __('<p>1. More options for records section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for records section.</p>','vw-transport-cargo'),
		'section'=> 'vw_transport_cargo_records',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_transport_cargo_records_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_records_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_transport_cargo_guide') ." '>More Info</a>",
		'section'=> 'vw_transport_cargo_records',
		'type'=> 'hidden'
	));

	//features Section
	$wp_customize->add_section('vw_transport_cargo_features', array(
		'title'       => __('Features Section', 'vw-transport-cargo'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-transport-cargo'),
		'priority'    => null,
		'panel'       => 'vw_transport_cargo_homepage_panel',
	));

	$wp_customize->add_setting('vw_transport_cargo_features_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_features_text',array(
		'description' => __('<p>1. More options for features section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for features section.</p>','vw-transport-cargo'),
		'section'=> 'vw_transport_cargo_features',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_transport_cargo_features_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_features_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_transport_cargo_guide') ." '>More Info</a>",
		'section'=> 'vw_transport_cargo_features',
		'type'=> 'hidden'
	));

	//pricing plan Section
	$wp_customize->add_section('vw_transport_cargo_pricing_plan', array(
		'title'       => __('Pricing Plan Section', 'vw-transport-cargo'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-transport-cargo'),
		'priority'    => null,
		'panel'       => 'vw_transport_cargo_homepage_panel',
	));

	$wp_customize->add_setting('vw_transport_cargo_pricing_plan_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_pricing_plan_text',array(
		'description' => __('<p>1. More options for pricing plan section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for pricing plan section.</p>','vw-transport-cargo'),
		'section'=> 'vw_transport_cargo_pricing_plan',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_transport_cargo_pricing_plan_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_pricing_plan_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_transport_cargo_guide') ." '>More Info</a>",
		'section'=> 'vw_transport_cargo_pricing_plan',
		'type'=> 'hidden'
	));

	//why choose us Section
	$wp_customize->add_section('vw_transport_cargo_why_choose_us', array(
		'title'       => __('Choose Us Section', 'vw-transport-cargo'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-transport-cargo'),
		'priority'    => null,
		'panel'       => 'vw_transport_cargo_homepage_panel',
	));

	$wp_customize->add_setting('vw_transport_cargo_why_choose_us_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_why_choose_us_text',array(
		'description' => __('<p>1. More options for choose us section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for choose us section.</p>','vw-transport-cargo'),
		'section'=> 'vw_transport_cargo_why_choose_us',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_transport_cargo_why_choose_us_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_why_choose_us_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_transport_cargo_guide') ." '>More Info</a>",
		'section'=> 'vw_transport_cargo_why_choose_us',
		'type'=> 'hidden'
	));

	//team Section
	$wp_customize->add_section('vw_transport_cargo_team', array(
		'title'       => __('Team Section', 'vw-transport-cargo'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-transport-cargo'),
		'priority'    => null,
		'panel'       => 'vw_transport_cargo_homepage_panel',
	));

	$wp_customize->add_setting('vw_transport_cargo_team_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_team_text',array(
		'description' => __('<p>1. More options for team section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for team section.</p>','vw-transport-cargo'),
		'section'=> 'vw_transport_cargo_team',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_transport_cargo_team_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_team_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_transport_cargo_guide') ." '>More Info</a>",
		'section'=> 'vw_transport_cargo_team',
		'type'=> 'hidden'
	));

	//request quote Section
	$wp_customize->add_section('vw_transport_cargo_request_quote', array(
		'title'       => __('Request Quote Section', 'vw-transport-cargo'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-transport-cargo'),
		'priority'    => null,
		'panel'       => 'vw_transport_cargo_homepage_panel',
	));

	$wp_customize->add_setting('vw_transport_cargo_request_quote_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_request_quote_text',array(
		'description' => __('<p>1. More options for request quote section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for request quote section.</p>','vw-transport-cargo'),
		'section'=> 'vw_transport_cargo_request_quote',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_transport_cargo_request_quote_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_request_quote_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_transport_cargo_guide') ." '>More Info</a>",
		'section'=> 'vw_transport_cargo_request_quote',
		'type'=> 'hidden'
	));

	//testimonials Section
	$wp_customize->add_section('vw_transport_cargo_testimonials', array(
		'title'       => __('Testimonials Section', 'vw-transport-cargo'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-transport-cargo'),
		'priority'    => null,
		'panel'       => 'vw_transport_cargo_homepage_panel',
	));

	$wp_customize->add_setting('vw_transport_cargo_testimonials_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_testimonials_text',array(
		'description' => __('<p>1. More options for testimonials section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for testimonials section.</p>','vw-transport-cargo'),
		'section'=> 'vw_transport_cargo_testimonials',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_transport_cargo_testimonials_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_testimonials_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_transport_cargo_guide') ." '>More Info</a>",
		'section'=> 'vw_transport_cargo_testimonials',
		'type'=> 'hidden'
	));

	//how we work Section
	$wp_customize->add_section('vw_transport_cargo_how_we_work', array(
		'title'       => __('Transport Process Section', 'vw-transport-cargo'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-transport-cargo'),
		'priority'    => null,
		'panel'       => 'vw_transport_cargo_homepage_panel',
	));

	$wp_customize->add_setting('vw_transport_cargo_how_we_work_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_how_we_work_text',array(
		'description' => __('<p>1. More options for transport process section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for transport process section.</p>','vw-transport-cargo'),
		'section'=> 'vw_transport_cargo_how_we_work',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_transport_cargo_how_we_work_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_how_we_work_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_transport_cargo_guide') ." '>More Info</a>",
		'section'=> 'vw_transport_cargo_how_we_work',
		'type'=> 'hidden'
	));

	//latest news Section
	$wp_customize->add_section('vw_transport_cargo_latest_news', array(
		'title'       => __('Latest News Section', 'vw-transport-cargo'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-transport-cargo'),
		'priority'    => null,
		'panel'       => 'vw_transport_cargo_homepage_panel',
	));

	$wp_customize->add_setting('vw_transport_cargo_latest_news_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_latest_news_text',array(
		'description' => __('<p>1. More options for latest news section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for latest news section.</p>','vw-transport-cargo'),
		'section'=> 'vw_transport_cargo_latest_news',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_transport_cargo_latest_news_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_latest_news_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_transport_cargo_guide') ." '>More Info</a>",
		'section'=> 'vw_transport_cargo_latest_news',
		'type'=> 'hidden'
	));

	//Footer Text
	$wp_customize->add_section('vw_transport_cargo_footer',array(
		'title'	=> __('Footer','vw-transport-cargo'),
		'description' => __('For more options of the footer section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/transport-wordpress-theme/">GO PRO</a>','vw-transport-cargo'),
		'panel' => 'vw_transport_cargo_homepage_panel',
	));	

	$wp_customize->add_setting( 'vw_transport_cargo_footer_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ));
    $wp_customize->add_control( new vw_transport_cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_footer_hide_show',array(
      'label' => esc_html__( 'Show / Hide Footer','vw-transport-cargo' ),
      'section' => 'vw_transport_cargo_footer'
    )));

	$wp_customize->add_setting('vw_transport_cargo_footer_background_color', array(
		'default'           => '#2c2c2d',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_transport_cargo_footer_background_color', array(
		'label'    => __('Footer Background Color', 'vw-transport-cargo'),
		'section'  => 'vw_transport_cargo_footer',
	)));

	$wp_customize->add_setting('vw_transport_cargo_footer_background_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'vw_transport_cargo_footer_background_image',array(
        'label' => __('Footer Background Image','vw-transport-cargo'),
        'section' => 'vw_transport_cargo_footer'
	)));

	$wp_customize->add_setting('vw_transport_cargo_footer_img_position',array(
	  'default' => 'center center',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'vw_transport_cargo_sanitize_choices'
	));
	$wp_customize->add_control('vw_transport_cargo_footer_img_position',array(
		'type' => 'select',
		'label' => __('Footer Image Position','vw-transport-cargo'),
		'section' => 'vw_transport_cargo_footer',
		'choices' 	=> array(
			'left top' 		=> esc_html__( 'Top Left', 'vw-transport-cargo' ),
			'center top'   => esc_html__( 'Top', 'vw-transport-cargo' ),
			'right top'   => esc_html__( 'Top Right', 'vw-transport-cargo' ),
			'left center'   => esc_html__( 'Left', 'vw-transport-cargo' ),
			'center center'   => esc_html__( 'Center', 'vw-transport-cargo' ),
			'right center'   => esc_html__( 'Right', 'vw-transport-cargo' ),
			'left bottom'   => esc_html__( 'Bottom Left', 'vw-transport-cargo' ),
			'center bottom'   => esc_html__( 'Bottom', 'vw-transport-cargo' ),
			'right bottom'   => esc_html__( 'Bottom Right', 'vw-transport-cargo' ),
		),
	));

	// Footer
	$wp_customize->add_setting('vw_transport_cargo_img_footer',array(
		'default'=> 'scroll',
		'sanitize_callback'	=> 'vw_transport_cargo_sanitize_choices'
	));
	$wp_customize->add_control('vw_transport_cargo_img_footer',array(
		'type' => 'select',
		'label'	=> __('Footer Background Attatchment','vw-transport-cargo'),
		'choices' => array(
            'fixed' => __('fixed','vw-transport-cargo'),
            'scroll' => __('scroll','vw-transport-cargo'),
        ),
		'section'=> 'vw_transport_cargo_footer',
	));

	// footer padding
	$wp_customize->add_setting('vw_transport_cargo_footer_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_footer_padding',array(
		'label'	=> __('Footer Top Bottom Padding','vw-transport-cargo'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-transport-cargo'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-transport-cargo' ),
    ),
		'section'=> 'vw_transport_cargo_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_footer_widgets_heading',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_transport_cargo_sanitize_choices'
	));
	$wp_customize->add_control('vw_transport_cargo_footer_widgets_heading',array(
        'type' => 'select',
        'label' => __('Footer Widget Heading','vw-transport-cargo'),
        'section' => 'vw_transport_cargo_footer',
        'choices' => array(
        	'Left' => __('Left','vw-transport-cargo'),
            'Center' => __('Center','vw-transport-cargo'),
            'Right' => __('Right','vw-transport-cargo')
        ),
	) );

	$wp_customize->add_setting('vw_transport_cargo_footer_widgets_content',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_transport_cargo_sanitize_choices'
	));
	$wp_customize->add_control('vw_transport_cargo_footer_widgets_content',array(
        'type' => 'select',
        'label' => __('Footer Widget Content','vw-transport-cargo'),
        'section' => 'vw_transport_cargo_footer',
        'choices' => array(
        	'Left' => __('Left','vw-transport-cargo'),
            'Center' => __('Center','vw-transport-cargo'),
            'Right' => __('Right','vw-transport-cargo')
        ),
	) );

    // footer social icon
  	$wp_customize->add_setting( 'vw_transport_cargo_footer_icon',array(
		'default' => false,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ) );
  	$wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_footer_icon',array(
		'label' => esc_html__( 'Show / Hide Footer Social Icon','vw-transport-cargo' ),
		'section' => 'vw_transport_cargo_footer'
    )));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_transport_cargo_footer_text', array( 
		'selector' => '.copyright p', 
		'render_callback' => 'vw_transport_cargo_customize_partial_vw_transport_cargo_footer_text', 
	));

	$wp_customize->add_setting( 'vw_transport_cargo_copyright_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ));
    $wp_customize->add_control( new vw_transport_cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_copyright_hide_show',array(
      'label' => esc_html__( 'Show / Hide Copyright','vw-transport-cargo' ),
      'section' => 'vw_transport_cargo_footer'
    )));

	$wp_customize->add_setting('vw_transport_cargo_copyright_background_color', array(
		'default'           => '#ffe819',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_transport_cargo_copyright_background_color', array(
		'label'    => __('Copyright Background Color', 'vw-transport-cargo'),
		'section'  => 'vw_transport_cargo_footer',
	)));
	
	$wp_customize->add_setting('vw_transport_cargo_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_transport_cargo_footer_text',array(
		'label'	=> __('Copyright Text','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( 'Copyright 2018, .....', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_footer',
		'type'=> 'text'
	));	

	$wp_customize->add_setting('vw_transport_cargo_copyright_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_copyright_font_size',array(
		'label'	=> __('Copyright Font Size','vw-transport-cargo'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_copyright_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_copyright_padding_top_bottom',array(
		'label'	=> __('Copyright Padding Top Bottom','vw-transport-cargo'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_copyright_alignment',array(
        'default' => 'center',
        'sanitize_callback' => 'vw_transport_cargo_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Transport_Cargo_Image_Radio_Control($wp_customize, 'vw_transport_cargo_copyright_alignment', array(
        'type' => 'select',
        'label' => __('Copyright Alignment','vw-transport-cargo'),
        'section' => 'vw_transport_cargo_footer',
        'settings' => 'vw_transport_cargo_copyright_alignment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

	$wp_customize->add_setting( 'vw_transport_cargo_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-transport-cargo' ),
      	'section' => 'vw_transport_cargo_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_transport_cargo_scroll_t_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'vw_transport_cargo_customize_partial_vw_transport_cargo_scroll_t_top_icon', 
	));

    $wp_customize->add_setting('vw_transport_cargo_scroll_t_top_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Transport_Cargo_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_transport_cargo_scroll_t_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','vw-transport-cargo'),
		'transport' => 'refresh',
		'section'	=> 'vw_transport_cargo_footer',
		'setting'	=> 'vw_transport_cargo_scroll_t_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_transport_cargo_scroll_to_top_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_scroll_to_top_font_size',array(
		'label'	=> __('Icon Font Size','vw-transport-cargo'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_scroll_to_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_scroll_to_top_padding',array(
		'label'	=> __('Icon Top Bottom Padding','vw-transport-cargo'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_scroll_to_top_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_scroll_to_top_width',array(
		'label'	=> __('Icon Width','vw-transport-cargo'),
		'description'	=> __('Enter a value in pixels Example:20px','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_scroll_to_top_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_scroll_to_top_height',array(
		'label'	=> __('Icon Height','vw-transport-cargo'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_transport_cargo_scroll_to_top_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_transport_cargo_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_transport_cargo_scroll_to_top_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-transport-cargo' ),
		'section'     => 'vw_transport_cargo_footer',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_transport_cargo_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'vw_transport_cargo_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Transport_Cargo_Image_Radio_Control($wp_customize, 'vw_transport_cargo_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','vw-transport-cargo'),
        'section' => 'vw_transport_cargo_footer',
        'settings' => 'vw_transport_cargo_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));

	//Blog Post

	$BlogPostParentPanel = new VW_Transport_Cargo_WP_Customize_Panel( $wp_customize, 'blog_post_parent_panel', array(
		'title' => __( 'Blog Post Settings', 'vw-transport-cargo' ),
		'panel' => 'vw_transport_cargo_panel_id',
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'vw_transport_cargo_post_settings', array(
		'title' => __( 'Post Settings', 'vw-transport-cargo' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Blog layout
    $wp_customize->add_setting('vw_transport_cargo_blog_layout_option',array(
        'default' => 'Default',
        'sanitize_callback' => 'vw_transport_cargo_sanitize_choices'
    ));
    $wp_customize->add_control(new VW_Transport_Cargo_Image_Radio_Control($wp_customize, 'vw_transport_cargo_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','vw-transport-cargo'),
        'section' => 'vw_transport_cargo_post_settings',
        'choices' => array(
            'Default' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout2.png',
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout3.png',
    ))));

   	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_transport_cargo_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_transport_cargo_sanitize_choices'	        
	) );
	$wp_customize->add_control('vw_transport_cargo_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-transport-cargo'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-transport-cargo'),
        'section' => 'vw_transport_cargo_post_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-transport-cargo'),
            'Right Sidebar' => __('Right Sidebar','vw-transport-cargo'),
            'One Column' => __('One Column','vw-transport-cargo'),
            'Three Columns' => __('Three Columns','vw-transport-cargo'),
            'Four Columns' => __('Four Columns','vw-transport-cargo'),
            'Grid Layout' => __('Grid Layout','vw-transport-cargo')
        ),
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_transport_cargo_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'vw_transport_cargo_customize_partial_vw_transport_cargo_toggle_postdate', 
	));

	$wp_customize->add_setting( 'vw_transport_cargo_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_toggle_postdate',array(
        'label' => esc_html__( 'Show / Hide Post Date','vw-transport-cargo' ),
        'section' => 'vw_transport_cargo_post_settings'
    )));

    $wp_customize->add_setting('vw_transport_cargo_toggle_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Transport_Cargo_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_transport_cargo_toggle_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','vw-transport-cargo'),
		'transport' => 'refresh',
		'section'	=> 'vw_transport_cargo_post_settings',
		'setting'	=> 'vw_transport_cargo_toggle_postdate_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_transport_cargo_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_toggle_author',array(
		'label' => esc_html__( 'Show / Hide Author','vw-transport-cargo' ),
		'section' => 'vw_transport_cargo_post_settings'
    )));

    $wp_customize->add_setting('vw_transport_cargo_toggle_author_icon',array(
		'default'	=> 'far fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Transport_Cargo_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_transport_cargo_toggle_author_icon',array(
		'label'	=> __('Add Author Icon','vw-transport-cargo'),
		'transport' => 'refresh',
		'section'	=> 'vw_transport_cargo_post_settings',
		'setting'	=> 'vw_transport_cargo_toggle_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_transport_cargo_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_toggle_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','vw-transport-cargo' ),
		'section' => 'vw_transport_cargo_post_settings'
    )));

    $wp_customize->add_setting('vw_transport_cargo_toggle_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Transport_Cargo_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_transport_cargo_toggle_comments_icon',array(
		'label'	=> __('Add Comments Icon','vw-transport-cargo'),
		'transport' => 'refresh',
		'section'	=> 'vw_transport_cargo_post_settings',
		'setting'	=> 'vw_transport_cargo_toggle_comments_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_transport_cargo_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_toggle_time',array(
		'label' => esc_html__( 'Show / Hide Time','vw-transport-cargo' ),
		'section' => 'vw_transport_cargo_post_settings'
    )));

    $wp_customize->add_setting('vw_transport_cargo_toggle_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Transport_Cargo_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_transport_cargo_toggle_time_icon',array(
		'label'	=> __('Add Time Icon','vw-transport-cargo'),
		'transport' => 'refresh',
		'section'	=> 'vw_transport_cargo_post_settings',
		'setting'	=> 'vw_transport_cargo_toggle_time_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_transport_cargo_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_featured_image_hide_show', array(
		'label' => esc_html__( 'Show / Hide Featured Image','vw-transport-cargo' ),
		'section' => 'vw_transport_cargo_post_settings'
    )));

    $wp_customize->add_setting( 'vw_transport_cargo_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_transport_cargo_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_transport_cargo_featured_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','vw-transport-cargo' ),
		'section'     => 'vw_transport_cargo_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_transport_cargo_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_transport_cargo_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_transport_cargo_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Featured Image Box Shadow','vw-transport-cargo' ),
		'section'     => 'vw_transport_cargo_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );


	//Featured Image
	$wp_customize->add_setting('vw_transport_cargo_blog_post_featured_image_dimension',array(
	       'default' => 'default',
	       'sanitize_callback'	=> 'vw_transport_cargo_sanitize_choices'
	));
  	$wp_customize->add_control('vw_transport_cargo_blog_post_featured_image_dimension',array(
	     'type' => 'select',
	     'label'	=> __('Blog Post Featured Image Dimension','vw-transport-cargo'),
	     'section'	=> 'vw_transport_cargo_post_settings',
	     'choices' => array(
          'default' => __('Default','vw-transport-cargo'),
          'custom' => __('Custom Image Size','vw-transport-cargo'),
      ),
  	));

	$wp_customize->add_setting('vw_transport_cargo_blog_post_featured_image_custom_width',array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
	$wp_customize->add_control('vw_transport_cargo_blog_post_featured_image_custom_width',array(
			'label'	=> __('Featured Image Custom Width','vw-transport-cargo'),
			'description'	=> __('Enter a value in pixels. Example:20px','vw-transport-cargo'),
			'input_attrs' => array(
	    	'placeholder' => __( '10px', 'vw-transport-cargo' ),),
			'section'=> 'vw_transport_cargo_post_settings',
			'type'=> 'text',
			'active_callback' => 'vw_transport_cargo_blog_post_featured_image_dimension'
		));

	$wp_customize->add_setting('vw_transport_cargo_blog_post_featured_image_custom_height',array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_blog_post_featured_image_custom_height',array(
			'label'	=> __('Featured Image Custom Height','vw-transport-cargo'),
			'description'	=> __('Enter a value in pixels. Example:20px','vw-transport-cargo'),
			'input_attrs' => array(
	    	'placeholder' => __( '10px', 'vw-transport-cargo' ),),
			'section'=> 'vw_transport_cargo_post_settings',
			'type'=> 'text',
			'active_callback' => 'vw_transport_cargo_blog_post_featured_image_dimension'
	));

    $wp_customize->add_setting( 'vw_transport_cargo_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_transport_cargo_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_transport_cargo_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-transport-cargo' ),
		'section'     => 'vw_transport_cargo_post_settings',
		'type'        => 'range',
		'settings'    => 'vw_transport_cargo_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_transport_cargo_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-transport-cargo'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-transport-cargo'),
		'section'=> 'vw_transport_cargo_post_settings',
		'type'=> 'text'
	));

    $wp_customize->add_setting('vw_transport_cargo_blog_page_posts_settings',array(
        'default' => 'Into Blocks',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_transport_cargo_sanitize_choices'
	));
	$wp_customize->add_control('vw_transport_cargo_blog_page_posts_settings',array(
        'type' => 'select',
        'label' => __('Display Blog Posts','vw-transport-cargo'),
        'section' => 'vw_transport_cargo_post_settings',
        'choices' => array(
        	'Into Blocks' => __('Into Blocks','vw-transport-cargo'),
            'Without Blocks' => __('Without Blocks','vw-transport-cargo')
        ),
	) );

    $wp_customize->add_setting('vw_transport_cargo_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_transport_cargo_sanitize_choices'
	));
	$wp_customize->add_control('vw_transport_cargo_excerpt_settings',array(
        'type' => 'select',
        'label' => __('Post Content','vw-transport-cargo'),
        'section' => 'vw_transport_cargo_post_settings',
        'choices' => array(
        	'Content' => __('Content','vw-transport-cargo'),
            'Excerpt' => __('Excerpt','vw-transport-cargo'),
            'No Content' => __('No Content','vw-transport-cargo')
        ),
	) );

	$wp_customize->add_setting('vw_transport_cargo_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_transport_cargo_blog_pagination_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_blog_pagination_hide_show',array(
      'label' => esc_html__( 'Show / Hide Blog Pagination','vw-transport-cargo' ),
      'section' => 'vw_transport_cargo_post_settings'
    )));

	$wp_customize->add_setting( 'vw_transport_cargo_blog_pagination_type', array(
        'default'			=> 'blog-page-numbers',
        'sanitize_callback'	=> 'vw_transport_cargo_sanitize_choices'
    ));
    $wp_customize->add_control( 'vw_transport_cargo_blog_pagination_type', array(
        'section' => 'vw_transport_cargo_post_settings',
        'type' => 'select',
        'label' => __( 'Blog Pagination', 'vw-transport-cargo' ),
        'choices'		=> array(
            'blog-page-numbers'  => __( 'Numeric', 'vw-transport-cargo' ),
            'next-prev' => __( 'Older Posts/Newer Posts', 'vw-transport-cargo' ),
    )));

    // Button Settings
	$wp_customize->add_section( 'vw_transport_cargo_button_settings', array(
		'title' => __( 'Button Settings', 'vw-transport-cargo' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_transport_cargo_blog_button_text', array( 
		'selector' => '.post-main-box .content-bttn a', 
		'render_callback' => 'vw_transport_cargo_customize_partial_vw_transport_cargo_blog_button_text', 
	));

    $wp_customize->add_setting('vw_transport_cargo_blog_button_text',array(
		'default'=> esc_html__( 'Read More', 'vw-transport-cargo' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_blog_button_text',array(
		'label'	=> __('Add Button Text','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( 'Read More', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_button_settings',
		'type'=> 'text'
	));

	// font size button
	$wp_customize->add_setting('vw_transport_cargo_button_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_button_font_size',array(
		'label'	=> __('Button Font Size','vw-transport-cargo'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-transport-cargo'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-transport-cargo' ),
    ),
    'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'vw_transport_cargo_button_settings',
	));

	$wp_customize->add_setting( 'vw_transport_cargo_button_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_transport_cargo_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_transport_cargo_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vw-transport-cargo' ),
		'section'     => 'vw_transport_cargo_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_transport_cargo_blog_button_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Transport_Cargo_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_transport_cargo_blog_button_icon',array(
		'label'	=> __('Add Button Icon','vw-transport-cargo'),
		'transport' => 'refresh',
		'section'	=> 'vw_transport_cargo_button_settings',
		'setting'	=> 'vw_transport_cargo_blog_button_icon',
		'type'		=> 'icon'
	)));


	$wp_customize->add_setting('vw_transport_cargo_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_button_padding_top_bottom',array(
		'label'	=> __('Padding Top Bottom','vw-transport-cargo'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_button_padding_left_right',array(
		'label'	=> __('Padding Left Right','vw-transport-cargo'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_button_letter_spacing',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_button_letter_spacing',array(
		'label'	=> __('Button Letter Spacing','vw-transport-cargo'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-transport-cargo'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'vw-transport-cargo' ),
    ),
    	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'vw_transport_cargo_button_settings',
	));

	// text trasform
	$wp_customize->add_setting('vw_transport_cargo_button_text_transform',array(
		'default'=> 'Uppercase',
		'sanitize_callback'	=> 'vw_transport_cargo_sanitize_choices'
	));
	$wp_customize->add_control('vw_transport_cargo_button_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Button Text Transform','vw-transport-cargo'),
		'choices' => array(
            'Uppercase' => __('Uppercase','vw-transport-cargo'),
            'Capitalize' => __('Capitalize','vw-transport-cargo'),
            'Lowercase' => __('Lowercase','vw-transport-cargo'),
        ),
		'section'=> 'vw_transport_cargo_button_settings',
	));

	// Related Post Settings
	$wp_customize->add_section( 'vw_transport_cargo_related_posts_settings', array(
		'title' => __( 'Related Posts Settings', 'vw-transport-cargo' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_transport_cargo_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'vw_transport_cargo_customize_partial_vw_transport_cargo_related_post_title', 
	));

    $wp_customize->add_setting( 'vw_transport_cargo_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_related_post',array(
		'label' => esc_html__( 'Show / Hide Related Post','vw-transport-cargo' ),
		'section' => 'vw_transport_cargo_related_posts_settings'
    )));

    $wp_customize->add_setting('vw_transport_cargo_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_related_post_title',array(
		'label'	=> __('Add Related Post Title','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( 'Related Post', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('vw_transport_cargo_related_posts_count',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_transport_cargo_sanitize_float'
	));
	$wp_customize->add_control('vw_transport_cargo_related_posts_count',array(
		'label'	=> __('Add Related Post Count','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '3', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_related_posts_settings',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'vw_transport_cargo_related_posts_excerpt_number', array(
		'default'              => 20,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_transport_cargo_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_transport_cargo_related_posts_excerpt_number', array(
		'label'       => esc_html__( 'Related Posts Excerpt length','vw-transport-cargo' ),
		'section'     => 'vw_transport_cargo_related_posts_settings',
		'type'        => 'range',
		'settings'    => 'vw_transport_cargo_related_posts_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	// Single Posts Settings
	$wp_customize->add_section( 'vw_transport_cargo_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'vw-transport-cargo' ),
		'panel' => 'blog_post_parent_panel',
	));

  	$wp_customize->add_setting('vw_transport_cargo_single_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new vw_transport_cargo_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_transport_cargo_single_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','vw-transport-cargo'),
		'transport' => 'refresh',
		'section'	=> 'vw_transport_cargo_single_blog_settings',
		'setting'	=> 'vw_transport_cargo_single_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_transport_cargo_single_postdate',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_single_postdate',array(
	    'label' => esc_html__( 'Show / Hide Date','vw-transport-cargo' ),
	   'section' => 'vw_transport_cargo_single_blog_settings'
	)));

	$wp_customize->add_setting('vw_transport_cargo_single_author_icon',array(
		'default'	=> 'far fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new vw_transport_cargo_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_transport_cargo_single_author_icon',array(
		'label'	=> __('Add Author Icon','vw-transport-cargo'),
		'transport' => 'refresh',
		'section'	=> 'vw_transport_cargo_single_blog_settings',
		'setting'	=> 'vw_transport_cargo_single_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_transport_cargo_single_author',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_single_author',array(
	    'label' => esc_html__( 'Show / Hide Author','vw-transport-cargo' ),
	    'section' => 'vw_transport_cargo_single_blog_settings'
	)));

   	$wp_customize->add_setting('vw_transport_cargo_single_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new vw_transport_cargo_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_transport_cargo_single_comments_icon',array(
		'label'	=> __('Add Comments Icon','vw-transport-cargo'),
		'transport' => 'refresh',
		'section'	=> 'vw_transport_cargo_single_blog_settings',
		'setting'	=> 'vw_transport_cargo_single_comments_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_transport_cargo_single_comments',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_single_comments',array(
	    'label' => esc_html__( 'Show / Hide Comments','vw-transport-cargo' ),
	    'section' => 'vw_transport_cargo_single_blog_settings'
	)));

  	$wp_customize->add_setting('vw_transport_cargo_single_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new vw_transport_cargo_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_transport_cargo_single_time_icon',array(
		'label'	=> __('Add Time Icon','vw-transport-cargo'),
		'transport' => 'refresh',
		'section'	=> 'vw_transport_cargo_single_blog_settings',
		'setting'	=> 'vw_transport_cargo_single_time_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_transport_cargo_single_time',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_single_time',array(
	    'label' => esc_html__( 'Show / Hide Time','vw-transport-cargo' ),
	    'section' => 'vw_transport_cargo_single_blog_settings'
	)));

	$wp_customize->add_setting('vw_transport_cargo_single_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_single_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-transport-cargo'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-transport-cargo'),
		'section'=> 'vw_transport_cargo_single_blog_settings',
		'type'=> 'text'
	));


	$wp_customize->add_setting( 'vw_transport_cargo_toggle_tags',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_toggle_tags', array(
		'label' => esc_html__( 'Show / Hide Tags','vw-transport-cargo' ),
		'section' => 'vw_transport_cargo_single_blog_settings'
    )));

	$wp_customize->add_setting( 'vw_transport_cargo_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_single_blog_post_navigation_show_hide', array(
		'label' => esc_html__( 'Show / Hide Post Navigation','vw-transport-cargo' ),
		'section' => 'vw_transport_cargo_single_blog_settings'
    )));

    $wp_customize->add_setting( 'vw_transport_cargo_single_post_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_single_post_breadcrumb',array(
		'label' => esc_html__( 'Show / Hide Breadcrumb','vw-transport-cargo' ),
		'section' => 'vw_transport_cargo_single_blog_settings'
    )));

    // Single Posts Category
  	$wp_customize->add_setting( 'vw_transport_cargo_single_post_category',array(
		'default' => true,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ) );
  	$wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_single_post_category',array(
		'label' => esc_html__( 'Show / Hide Category','vw-transport-cargo' ),
		'section' => 'vw_transport_cargo_single_blog_settings'
    )));

	//navigation text
	$wp_customize->add_setting('vw_transport_cargo_single_blog_prev_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( 'PREVIOUS', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_single_blog_next_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( 'NEXT', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_single_blog_comment_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_transport_cargo_single_blog_comment_title',array(
		'label'	=> __('Add Comment Title','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( 'Leave a Reply', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_single_blog_comment_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_transport_cargo_single_blog_comment_button_text',array(
		'label'	=> __('Add Comment Button Text','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( 'Post Comment', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_single_blog_comment_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_single_blog_comment_width',array(
		'label'	=> __('Comment Form Width','vw-transport-cargo'),
		'description'	=> __('Enter a value in %. Example:50%','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '100%', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_single_blog_settings',
		'type'=> 'text'
	));

	// Grid layout setting
	$wp_customize->add_section( 'vw_transport_cargo_grid_layout_settings', array(
		'title' => __( 'Grid Layout Settings', 'vw-transport-cargo' ),
		'panel' => 'blog_post_parent_panel',
	));

  	$wp_customize->add_setting('vw_transport_cargo_grid_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new vw_transport_cargo_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_transport_cargo_grid_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','vw-transport-cargo'),
		'transport' => 'refresh',
		'section'	=> 'vw_transport_cargo_grid_layout_settings',
		'setting'	=> 'vw_transport_cargo_grid_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_transport_cargo_grid_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_grid_postdate',array(
        'label' => esc_html__( 'Show / Hide Post Date','vw-transport-cargo' ),
        'section' => 'vw_transport_cargo_grid_layout_settings'
    )));

	$wp_customize->add_setting('vw_transport_cargo_grid_author_icon',array(
		'default'	=> 'far fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new vw_transport_cargo_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_transport_cargo_grid_author_icon',array(
		'label'	=> __('Add Author Icon','vw-transport-cargo'),
		'transport' => 'refresh',
		'section'	=> 'vw_transport_cargo_grid_layout_settings',
		'setting'	=> 'vw_transport_cargo_grid_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_transport_cargo_grid_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_grid_author',array(
		'label' => esc_html__( 'Show / Hide Author','vw-transport-cargo' ),
		'section' => 'vw_transport_cargo_grid_layout_settings'
    )));

   	$wp_customize->add_setting('vw_transport_cargo_grid_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new vw_transport_cargo_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_transport_cargo_grid_comments_icon',array(
		'label'	=> __('Add Comments Icon','vw-transport-cargo'),
		'transport' => 'refresh',
		'section'	=> 'vw_transport_cargo_grid_layout_settings',
		'setting'	=> 'vw_transport_cargo_grid_comments_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_transport_cargo_grid_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_grid_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','vw-transport-cargo' ),
		'section' => 'vw_transport_cargo_grid_layout_settings'
    )));

 	$wp_customize->add_setting('vw_transport_cargo_grid_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_grid_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-transport-cargo'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-transport-cargo'),
		'section'=> 'vw_transport_cargo_grid_layout_settings',
		'type'=> 'text'
	));  

  	$wp_customize->add_setting('vw_transport_cargo_display_grid_posts_settings',array(
	    'default' => 'Into Blocks',
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_transport_cargo_sanitize_choices'
	));
	$wp_customize->add_control('vw_transport_cargo_display_grid_posts_settings',array(
	    'type' => 'select',
	    'label' => __('Display Grid Posts','vw-transport-cargo'),
	    'section' => 'vw_transport_cargo_grid_layout_settings',
	    'choices' => array(
	    	'Into Blocks' => __('Into Blocks','vw-transport-cargo'),
	      	'Without Blocks' => __('Without Blocks','vw-transport-cargo')
	    ),
	) );

	// other settings
	$OtherParentPanel = new VW_Transport_Cargo_WP_Customize_Panel( $wp_customize, 'vw_transport_cargo_other_panel_id', array(
		'title' => __( 'Others Settings', 'vw-transport-cargo' ),
		'panel' => 'vw_transport_cargo_panel_id',
	));

	$wp_customize->add_panel( $OtherParentPanel );

	$wp_customize->add_section( 'vw_transport_cargo_left_right', array(
    	'title'      => esc_html__( 'General Settings', 'vw-transport-cargo' ),
		'panel' => 'vw_transport_cargo_other_panel_id'
	) );

	$wp_customize->add_setting('vw_transport_cargo_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'vw_transport_cargo_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Transport_Cargo_Image_Radio_Control($wp_customize, 'vw_transport_cargo_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','vw-transport-cargo'),
        'description' => __('Here you can change the width layout of Website.','vw-transport-cargo'),
        'section' => 'vw_transport_cargo_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
    ))));

	$wp_customize->add_setting('vw_transport_cargo_page_layout',array(
        'default' => 'One Column',
        'sanitize_callback' => 'vw_transport_cargo_sanitize_choices'
	));
	$wp_customize->add_control('vw_transport_cargo_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-transport-cargo'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-transport-cargo'),
        'section' => 'vw_transport_cargo_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-transport-cargo'),
            'Right Sidebar' => __('Right Sidebar','vw-transport-cargo'),
            'One Column' => __('One Column','vw-transport-cargo')
        ),
	) );

	$wp_customize->add_setting( 'vw_transport_cargo_single_page_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ) );
    $wp_customize->add_control( new vw_transport_cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_single_page_breadcrumb',array(
		'label' => esc_html__( 'Show / Hide Page Breadcrumb','vw-transport-cargo' ),
		'section' => 'vw_transport_cargo_left_right'
    )));

	//Wow Animation
	$wp_customize->add_setting( 'vw_transport_cargo_animation',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_animation',array(
        'label' => esc_html__( 'Show / Hide Animation ','vw-transport-cargo' ),
        'description' => __('Here you can disable overall site animation effect','vw-transport-cargo'),
        'section' => 'vw_transport_cargo_left_right'
    )));

    $wp_customize->add_setting('vw_transport_cargo_reset_all_settings',array(
      'sanitize_callback'	=> 'sanitize_text_field',
   	));
   	$wp_customize->add_control(new VW_Transport_Cargo_Reset_Custom_Control($wp_customize, 'vw_transport_cargo_reset_all_settings',array(
      'type' => 'reset_control',
      'label' => __('Reset All Settings', 'vw-transport-cargo'),
      'description' => 'vw_transport_cargo_reset_all_settings',
      'section' => 'vw_transport_cargo_left_right'
   	)));

	//Pre-Loader
	$wp_customize->add_setting( 'vw_transport_cargo_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_loader_enable',array(
        'label' => esc_html__( 'Show / Hide Pre-Loader','vw-transport-cargo' ),
        'section' => 'vw_transport_cargo_left_right'
    )));

	$wp_customize->add_setting('vw_transport_cargo_preloader_bg_color', array(
		'default'           => '#3761c8',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_transport_cargo_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'vw-transport-cargo'),
		'section'  => 'vw_transport_cargo_left_right',
	)));

	$wp_customize->add_setting('vw_transport_cargo_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_transport_cargo_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'vw-transport-cargo'),
		'section'  => 'vw_transport_cargo_left_right',
	)));

	$wp_customize->add_setting('vw_transport_cargo_preloader_bg_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'vw_transport_cargo_preloader_bg_img',array(
        'label' => __('Preloader Background Image','vw-transport-cargo'),
        'section' => 'vw_transport_cargo_left_right'
	)));

    //404 Page Setting
	$wp_customize->add_section('vw_transport_cargo_404_page',array(
		'title'	=> __('404 Page Settings','vw-transport-cargo'),
		'panel' => 'vw_transport_cargo_other_panel_id',
	));	

	$wp_customize->add_setting('vw_transport_cargo_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_transport_cargo_404_page_title',array(
		'label'	=> __('Add Title','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_transport_cargo_404_page_content',array(
		'label'	=> __('Add Text','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_404_page_button_text',array(
		'label'	=> __('Add Button Text','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( 'Return to the home page', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_404_page_button_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Transport_Cargo_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_transport_cargo_404_page_button_icon',array(
		'label'	=> __('Add Button Icon','vw-transport-cargo'),
		'transport' => 'refresh',
		'section'	=> 'vw_transport_cargo_404_page',
		'setting'	=> 'vw_transport_cargo_404_page_button_icon',
		'type'		=> 'icon'
	)));

	//No Result Page Setting
	$wp_customize->add_section('vw_transport_cargo_no_results_page',array(
		'title'	=> __('No Results Page Settings','vw-transport-cargo'),
		'panel' => 'vw_transport_cargo_other_panel_id',
	));	

	$wp_customize->add_setting('vw_transport_cargo_no_results_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_transport_cargo_no_results_page_title',array(
		'label'	=> __('Add Title','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( 'Nothing Found', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_no_results_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_no_results_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_transport_cargo_no_results_page_content',array(
		'label'	=> __('Add Text','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_no_results_page',
		'type'=> 'text'
	));

	//Social Icon Setting
	$wp_customize->add_section('vw_transport_cargo_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','vw-transport-cargo'),
		'panel' => 'vw_transport_cargo_other_panel_id',
	));	

	$wp_customize->add_setting('vw_transport_cargo_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','vw-transport-cargo'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_social_icon_padding',array(
		'label'	=> __('Icon Padding','vw-transport-cargo'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_social_icon_width',array(
		'label'	=> __('Icon Width','vw-transport-cargo'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_social_icon_height',array(
		'label'	=> __('Icon Height','vw-transport-cargo'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_transport_cargo_social_icon_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_transport_cargo_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_transport_cargo_social_icon_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-transport-cargo' ),
		'section'     => 'vw_transport_cargo_social_icon_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Responsive Media Settings
	$wp_customize->add_section('vw_transport_cargo_responsive_media',array(
		'title'	=> __('Responsive Media','vw-transport-cargo'),
		'panel' => 'vw_transport_cargo_other_panel_id',
	));

    $wp_customize->add_setting( 'vw_transport_cargo_stickyheader_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_stickyheader_hide_show',array(
      'label' => esc_html__( 'Show / Hide Sticky Header','vw-transport-cargo' ),
      'section' => 'vw_transport_cargo_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_transport_cargo_resp_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_resp_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','vw-transport-cargo' ),
      'section' => 'vw_transport_cargo_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_transport_cargo_sidebar_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_sidebar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Sidebar','vw-transport-cargo' ),
      'section' => 'vw_transport_cargo_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_transport_cargo_resp_scroll_top_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_resp_scroll_top_hide_show',array(
      'label' => esc_html__( 'Show / Hide Scroll To Top','vw-transport-cargo' ),
      'section' => 'vw_transport_cargo_responsive_media'
    )));

    $wp_customize->add_setting('vw_transport_cargo_resp_menu_toggle_btn_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_transport_cargo_resp_menu_toggle_btn_bg_color', array(
		'label'    => __('Toggle Button Bg Color', 'vw-transport-cargo'),
		'section'  => 'vw_transport_cargo_responsive_media',
	)));

    $wp_customize->add_setting('vw_transport_cargo_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Transport_Cargo_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_transport_cargo_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','vw-transport-cargo'),
		'transport' => 'refresh',
		'section'	=> 'vw_transport_cargo_responsive_media',
		'setting'	=> 'vw_transport_cargo_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_transport_cargo_res_close_menus_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Transport_Cargo_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_transport_cargo_res_close_menus_icon',array(
		'label'	=> __('Add Close Menu Icon','vw-transport-cargo'),
		'transport' => 'refresh',
		'section'	=> 'vw_transport_cargo_responsive_media',
		'setting'	=> 'vw_transport_cargo_res_close_menus_icon',
		'type'		=> 'icon'
	)));

	
    //Woocommerce settings
	$wp_customize->add_section('vw_transport_cargo_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'vw-transport-cargo'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

  	//Shop Page Featured Image
	$wp_customize->add_setting( 'vw_transport_cargo_shop_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_transport_cargo_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_transport_cargo_shop_featured_image_border_radius', array(
		'label'       => esc_html__( 'Shop Page Featured Image Border Radius','vw-transport-cargo' ),
		'section'     => 'vw_transport_cargo_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_transport_cargo_shop_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_transport_cargo_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_transport_cargo_shop_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Shop Page Featured Image Box Shadow','vw-transport-cargo' ),
		'section'     => 'vw_transport_cargo_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_transport_cargo_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product .sidebar', 
		'render_callback' => 'vw_transport_cargo_customize_partial_vw_transport_cargo_woocommerce_shop_page_sidebar', ) );

    //Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_transport_cargo_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Show / Hide Shop Page Sidebar','vw-transport-cargo' ),
		'section' => 'vw_transport_cargo_woocommerce_section'
    )));

    $wp_customize->add_setting('vw_transport_cargo_shop_page_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_transport_cargo_sanitize_choices'
	));
	$wp_customize->add_control('vw_transport_cargo_shop_page_layout',array(
        'type' => 'select',
        'label' => __('Shop Page Sidebar Layout','vw-transport-cargo'),
        'section' => 'vw_transport_cargo_woocommerce_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-transport-cargo'),
            'Right Sidebar' => __('Right Sidebar','vw-transport-cargo'),
        ),
	) );

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_transport_cargo_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product .sidebar', 
		'render_callback' => 'vw_transport_cargo_customize_partial_vw_transport_cargo_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_transport_cargo_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Show / Hide Single Product Sidebar','vw-transport-cargo' ),
		'section' => 'vw_transport_cargo_woocommerce_section'
    )));

     $wp_customize->add_setting('vw_transport_cargo_single_product_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_transport_cargo_sanitize_choices'
	));
	$wp_customize->add_control('vw_transport_cargo_single_product_layout',array(
        'type' => 'select',
        'label' => __('Single Product Sidebar Layout','vw-transport-cargo'),
        'section' => 'vw_transport_cargo_woocommerce_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-transport-cargo'),
            'Right Sidebar' => __('Right Sidebar','vw-transport-cargo'),
        ),
	) );

    //Products per page
    $wp_customize->add_setting('vw_transport_cargo_products_per_page',array(
		'default'=> '9',
		'sanitize_callback'	=> 'vw_transport_cargo_sanitize_float'
	));
	$wp_customize->add_control('vw_transport_cargo_products_per_page',array(
		'label'	=> __('Products Per Page','vw-transport-cargo'),
		'description' => __('Display on shop page','vw-transport-cargo'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'vw_transport_cargo_woocommerce_section',
		'type'=> 'number',
	));

    //Products per row
    $wp_customize->add_setting('vw_transport_cargo_products_per_row',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_transport_cargo_sanitize_choices'
	));
	$wp_customize->add_control('vw_transport_cargo_products_per_row',array(
		'label'	=> __('Products Per Row','vw-transport-cargo'),
		'description' => __('Display on shop page','vw-transport-cargo'),
		'choices' => array(
            '2' => '2',
			'3' => '3',
			'4' => '4',
        ),
		'section'=> 'vw_transport_cargo_woocommerce_section',
		'type'=> 'select',
	));

	//Products padding
	$wp_customize->add_setting('vw_transport_cargo_products_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_products_padding_top_bottom',array(
		'label'	=> __('Products Padding Top Bottom','vw-transport-cargo'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_products_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_products_padding_left_right',array(
		'label'	=> __('Products Padding Left Right','vw-transport-cargo'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_woocommerce_section',
		'type'=> 'text'
	));

	//Products box shadow
	$wp_customize->add_setting( 'vw_transport_cargo_products_box_shadow', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_transport_cargo_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_transport_cargo_products_box_shadow', array(
		'label'       => esc_html__( 'Products Box Shadow','vw-transport-cargo' ),
		'section'     => 'vw_transport_cargo_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products border radius
    $wp_customize->add_setting( 'vw_transport_cargo_products_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_transport_cargo_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_transport_cargo_products_border_radius', array(
		'label'       => esc_html__( 'Products Border Radius','vw-transport-cargo' ),
		'section'     => 'vw_transport_cargo_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_transport_cargo_products_btn_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_products_btn_padding_top_bottom',array(
		'label'	=> __('Products Button Padding Top Bottom','vw-transport-cargo'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_products_btn_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_products_btn_padding_left_right',array(
		'label'	=> __('Products Button Padding Left Right','vw-transport-cargo'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_transport_cargo_products_button_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_transport_cargo_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_transport_cargo_products_button_border_radius', array(
		'label'       => esc_html__( 'Products Button Border Radius','vw-transport-cargo' ),
		'section'     => 'vw_transport_cargo_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products Sale Badge
	$wp_customize->add_setting('vw_transport_cargo_woocommerce_sale_position',array(
        'default' => 'right',
        'sanitize_callback' => 'vw_transport_cargo_sanitize_choices'
	));
	$wp_customize->add_control('vw_transport_cargo_woocommerce_sale_position',array(
        'type' => 'select',
        'label' => __('Sale Badge Position','vw-transport-cargo'),
        'section' => 'vw_transport_cargo_woocommerce_section',
        'choices' => array(
            'left' => __('Left','vw-transport-cargo'),
            'right' => __('Right','vw-transport-cargo'),
        ),
	) );

	$wp_customize->add_setting('vw_transport_cargo_woocommerce_sale_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_woocommerce_sale_font_size',array(
		'label'	=> __('Sale Font Size','vw-transport-cargo'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_transport_cargo_woocommerce_sale_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_transport_cargo_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_transport_cargo_woocommerce_sale_border_radius', array(
		'label'       => esc_html__( 'Sale Border Radius','vw-transport-cargo' ),
		'section'     => 'vw_transport_cargo_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

   // Related Product
    $wp_customize->add_setting( 'vw_transport_cargo_related_product_show_hide',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_related_product_show_hide',array(
        'label' => esc_html__( 'Show / Hide Related Product','vw-transport-cargo' ),
        'section' => 'vw_transport_cargo_woocommerce_section'
    ))); 

    // Has to be at the top
	$wp_customize->register_panel_type( 'VW_Transport_Cargo_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'VW_Transport_Cargo_WP_Customize_Section' );
}

add_action( 'customize_register', 'vw_transport_cargo_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class VW_Transport_Cargo_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'vw_transport_cargo_panel';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;
      	return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class VW_Transport_Cargo_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'vw_transport_cargo_section';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;

	      if ( $this->panel ) {
	        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
	      } else {
	        $array['customizeAction'] = 'Customizing';
	      }
	      return $array;
    	}
  	}
}

// Enqueue our scripts and styles
function vw_transport_cargo_customize_controls_scripts() {
  wp_enqueue_script( 'customizer-controls', get_theme_file_uri( '/assets/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'vw_transport_cargo_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Transport_Cargo_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Transport_Cargo_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(new VW_Transport_Cargo_Customize_Section_Pro($manager,'vw_transport_cargo_upgrade_pro_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'VW Transport Cargo', 'vw-transport-cargo' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-transport-cargo' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/transport-wordpress-theme/'),
		)));

		// Register sections.
		$manager->add_section(new VW_Transport_Cargo_Customize_Section_Pro($manager,'vw_transport_cargo_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'vw-transport-cargo' ),
			'pro_text' => esc_html__( 'DOCS', 'vw-transport-cargo' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/transport-wordpress-theme/'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-transport-cargo-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-transport-cargo-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/css/customize-controls.css' );

		wp_localize_script(
		'vw-transport-cargo-customize-controls',
		'vw_transport_cargo_customizer_params',
		array(
			'ajaxurl' =>	admin_url( 'admin-ajax.php' )
		));
	}
}

// Doing this customizer thang!
VW_Transport_Cargo_Customize::get_instance();