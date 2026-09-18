<?php

if ( class_exists("Kirki")){

	// LOGO

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'transcargo_transportation_logo_resizer',
		'label'       => esc_html__( 'Adjust Your Logo Size ', 'transcargo-transportation' ),
		'section'     => 'title_tagline',
		'default'     => 70,
		'choices'     => [
			'min'  => 10,
			'max'  => 300,
			'step' => 10,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'transcargo_transportation_enable_logo_text',
		'section'     => 'title_tagline',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Site Title and Tagline', 'transcargo-transportation' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'transcargo_transportation_display_header_title',
		'label'       => esc_html__( 'Site Title Enable / Disable Button', 'transcargo-transportation' ),
		'section'     => 'title_tagline',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'transcargo-transportation' ),
			'off' => esc_html__( 'Disable', 'transcargo-transportation' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'transcargo_transportation_display_header_text',
		'label'       => esc_html__( 'Tagline Enable / Disable Button', 'transcargo-transportation' ),
		'section'     => 'title_tagline',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'transcargo-transportation' ),
			'off' => esc_html__( 'Disable', 'transcargo-transportation' ),
		],
	] );

	// FONT STYLE TYPOGRAPHY

	Kirki::add_panel( 'transcargo_transportation_panel_id', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Typography', 'transcargo-transportation' ),
	) );

	Kirki::add_section( 'transcargo_transportation_font_style_section', array(
		'title'      => esc_attr__( 'Typography Option',  'transcargo-transportation' ),
		'priority'   => 2,
		'capability' => 'edit_theme_options',
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'transcargo_transportation_all_headings_typography',
		'section'     => 'transcargo_transportation_font_style_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading Of All Sections',  'transcargo-transportation' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'global', array(
		'type'        => 'typography',
		'settings'    => 'transcargo_transportation_all_headings_typography',
		'label'       => esc_attr__( 'Heading Typography',  'transcargo-transportation' ),
		'description' => esc_attr__( 'Select the typography options for your heading.',  'transcargo-transportation' ),
		'section'     => 'transcargo_transportation_font_style_section',
		'priority'    => 10,
		'default'     => array(
			'font-family'    => '',
			'variant'        => '',
		),
		'output' => array(
			array(
				'element' => array( 'h1','h2','h3','h4','h5','h6', ),
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'transcargo_transportation_body_content_typography',
		'section'     => 'transcargo_transportation_font_style_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Body Content',  'transcargo-transportation' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'global', array(
		'type'        => 'typography',
		'settings'    => 'transcargo_transportation_body_content_typography',
		'label'       => esc_attr__( 'Content Typography',  'transcargo-transportation' ),
		'description' => esc_attr__( 'Select the typography options for your content.',  'transcargo-transportation' ),
		'section'     => 'transcargo_transportation_font_style_section',
		'priority'    => 10,
		'default'     => array(
			'font-family'    => '',
			'variant'        => '',
		),
		'output' => array(
			array(
				'element' => array( 'body', ),
			),
		),
	) );

	// PANEL

	Kirki::add_panel( 'transcargo_transportation_panel_id', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Theme Options', 'transcargo-transportation' ),
	) );

	// Scroll Top

	Kirki::add_section( 'transcargo_transportation_additional_settings', array(
	    'title'          => esc_html__( 'Additional Settings', 'transcargo-transportation' ),
	    'description'    => esc_html__( 'Scroll To Top', 'transcargo-transportation' ),
	    'panel'          => 'transcargo_transportation_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'transcargo_transportation_scroll_enable_setting',
		'label'       => esc_html__( 'Here you can enable or disable your scroller.', 'transcargo-transportation' ),
		'section'     => 'transcargo_transportation_additional_settings',
		'default'     => '1',
		'priority'    => 10,
	] );

		new \Kirki\Field\Radio_Buttonset(
	[
		'settings'    => 'transcargo_transportation_scroll_top_position',
		'label'       => esc_html__( 'Alignment for Scroll To Top', 'transcargo-transportation' ),
		'section'     => 'transcargo_transportation_additional_settings',
		'default'     => 'Right',
		'priority'    => 10,
		'choices'     => [
			'Left'   => esc_html__( 'Left', 'transcargo-transportation' ),
			'Center' => esc_html__( 'Center', 'transcargo-transportation' ),
			'Right'  => esc_html__( 'Right', 'transcargo-transportation' ),
		],
	]
	);

	new \Kirki\Field\Select(
	[
		'settings'    => 'menu_text_transform_transcargo_transportation',
		'label'       => esc_html__( 'Menus Text Transform', 'transcargo-transportation' ),
		'section'     => 'transcargo_transportation_additional_settings',
		'default'     => 'CAPITALISE',
		'placeholder' => esc_html__( 'Choose an option', 'transcargo-transportation' ),
		'choices'     => [
			'CAPITALISE' => esc_html__( 'CAPITALISE', 'transcargo-transportation' ),
			'UPPERCASE' => esc_html__( 'UPPERCASE', 'transcargo-transportation' ),
			'LOWERCASE' => esc_html__( 'LOWERCASE', 'transcargo-transportation' ),

		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'transcargo_transportation_container_width',
		'label'       => esc_html__( 'Theme Container Width', 'transcargo-transportation' ),
		'section'     => 'transcargo_transportation_additional_settings',
		'default'     => 100,
		'choices'     => [
			'min'  => 50,
			'max'  => 100,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'transcargo_transportation_site_loader',
		'label'       => esc_html__( 'Here you can enable or disable your Site Loader.', 'transcargo-transportation' ),
		'section'     => 'transcargo_transportation_additional_settings',
		'default'     => false,
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'transcargo_transportation_sticky_header',
		'label'       => esc_html__( 'Here you can enable or disable your Sticky Header.', 'transcargo-transportation' ),
		'section'     => 'transcargo_transportation_additional_settings',
		'default'     => false,
		'priority'    => 10,
	] );

	// Woocommerce Settings

	if ( class_exists("woocommerce")){

	Kirki::add_section( 'transcargo_transportation_woocommerce_settings', array(
		'title'          => esc_html__( 'Woocommerce Settings', 'transcargo-transportation' ),
		'description'    => esc_html__( 'Shop Page', 'transcargo-transportation' ),
		'panel'          => 'transcargo_transportation_panel_id',
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'transcargo_transportation_shop_sidebar',
		'label'       => esc_html__( 'Here you can enable or disable shop page sidebar.', 'transcargo-transportation' ),
		'section'     => 'transcargo_transportation_woocommerce_settings',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'transcargo_transportation_product_sidebar',
		'label'       => esc_html__( 'Here you can enable or disable product page sidebar.', 'transcargo-transportation' ),
		'section'     => 'transcargo_transportation_woocommerce_settings',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'transcargo_transportation_related_product_setting',
		'label'       => esc_html__( 'Here you can enable or disable your related products.', 'transcargo-transportation' ),
		'section'     => 'transcargo_transportation_woocommerce_settings',
		'default'     => true,
		'priority'    => 10,
	] );

	new \Kirki\Field\Number(
		[
			'settings' => 'transcargo_transportation_per_columns',
			'label'    => esc_html__( 'Product Per Row', 'transcargo-transportation' ),
			'section'  => 'transcargo_transportation_woocommerce_settings',
			'default'  => 3,
			'choices'  => [
				'min'  => 1,
				'max'  => 4,
				'step' => 1,
			],
		]
	);

	new \Kirki\Field\Number(
		[
			'settings' => 'transcargo_transportation_product_per_page',
			'label'    => esc_html__( 'Product Per Page', 'transcargo-transportation' ),
			'section'  => 'transcargo_transportation_woocommerce_settings',
			'default'  => 9,
			'choices'  => [
				'min'  => 1,
				'max'  => 15,
				'step' => 1,
			],
		]
	);

}


	// COLOR SECTION

	Kirki::add_section( 'transcargo_transportation_section_color', array(
	    'title'          => esc_html__( 'Global Color', 'transcargo-transportation' ),
	    'description'    => esc_html__( 'Theme Color Settings', 'transcargo-transportation' ),
	    'panel'          => 'transcargo_transportation_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'transcargo_transportation_global_colors',
		'section'     => 'transcargo_transportation_section_color',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Here you can change your theme color on one click.', 'transcargo-transportation' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'transcargo_transportation_global_color',
		'label'       => __( 'choose your Appropriate Color', 'transcargo-transportation' ),
		'section'     => 'transcargo_transportation_section_color',
		'default'     => '#ff824a',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'transcargo_transportation_global_color_2',
		'label'       => __( 'Choose Your Second Color', 'transcargo-transportation' ),
		'section'     => 'transcargo_transportation_section_color',
		'default'     => '#131f3c',
	] );

	// HEADER SECTION

	Kirki::add_section( 'transcargo_transportation_section_header', array(
	    'title'          => esc_html__( 'Header Settings', 'transcargo-transportation' ),
	    'description'    => esc_html__( 'Here you can add different type of social icons.', 'transcargo-transportation' ),
	    'panel'          => 'transcargo_transportation_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'transcargo_transportation_enable_search',
		'section'     => 'transcargo_transportation_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Search Box', 'transcargo-transportation' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'transcargo_transportation_search_box_enable',
		'label'       => esc_html__( 'Search Enable / Disable Button', 'transcargo-transportation' ),
		'section'     => 'transcargo_transportation_section_header',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'transcargo-transportation' ),
			'off' => esc_html__( 'Disable', 'transcargo-transportation' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'transcargo_transportation_header_button_heading',
		'section'     => 'transcargo_transportation_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Button Text & URL', 'transcargo-transportation' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'transcargo_transportation_header_button_text',
		'label'    => __( 'Button Text', 'transcargo-transportation' ),
		'section'  => 'transcargo_transportation_section_header',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'link',
		'settings' => 'transcargo_transportation_header_button_url',
		'label'    => __( 'Button URL', 'transcargo-transportation' ),
		'section'  => 'transcargo_transportation_section_header',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'transcargo_transportation_enable_button',
		'section'     => 'transcargo_transportation_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Button Box', 'transcargo-transportation' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'transcargo_transportation_button_box_enable',
		'label'       => esc_html__( 'Quote Enable / Disable Button', 'transcargo-transportation' ),
		'section'     => 'transcargo_transportation_section_header',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'transcargo-transportation' ),
			'off' => esc_html__( 'Disable', 'transcargo-transportation' ),
		],
	] );

	// CONTACT INFORMATION

	Kirki::add_section( 'transcargo_transportation_section_contact', array(
	    'title'          => esc_html__( 'Contact Info Settings', 'transcargo-transportation' ),
	    'description'    => esc_html__( 'Here you can add your personal contact details.', 'transcargo-transportation' ),
	    'panel'          => 'transcargo_transportation_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'transcargo_transportation_phone_number_heading_1',
		'section'     => 'transcargo_transportation_section_contact',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Choose Your Icon', 'transcargo-transportation' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'dashicons',
		'settings' => 'transcargo_transportation_dashicons_setting_1',
		'label'    => esc_html__( 'Select Appropriate Icon', 'transcargo-transportation' ),
		'section'  => 'transcargo_transportation_section_contact',
		'default'  => 'dashicons dashicons-phone',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'transcargo_transportation_phone_number_heading',
		'section'     => 'transcargo_transportation_section_contact',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Phone Number', 'transcargo-transportation' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'transcargo_transportation_header_phone_number',
		'section'  => 'transcargo_transportation_section_contact',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'transcargo_transportation_phone_number_heading_2',
		'section'     => 'transcargo_transportation_section_contact',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Choose Your Icon', 'transcargo-transportation' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'dashicons',
		'settings' => 'transcargo_transportation_dashicons_setting_2',
		'label'    => esc_html__( 'Select Appropriate Icon', 'transcargo-transportation' ),
		'section'  => 'transcargo_transportation_section_contact',
		'default'  => 'dashicons dashicons-email',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'transcargo_transportation_email_address_heading',
		'section'     => 'transcargo_transportation_section_contact',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Email Address', 'transcargo-transportation' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'transcargo_transportation_header_email_address',
		'section'  => 'transcargo_transportation_section_contact',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'dashicons',
		'settings' => 'transcargo_transportation_dashicons_setting_3',
		'label'    => esc_html__( 'Select Appropriate Icon', 'transcargo-transportation' ),
		'section'  => 'transcargo_transportation_section_contact',
		'default'  => 'dashicons dashicons-clock',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'transcargo_transportation_open_timings_heading',
		'section'     => 'transcargo_transportation_section_contact',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Timings', 'transcargo-transportation' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'transcargo_transportation_header_open_timings',
		'section'  => 'transcargo_transportation_section_contact',
		'default'  => '',
		'priority' => 10,
	] );

	// SLIDER SECTION

	Kirki::add_section( 'transcargo_transportation_blog_slide_section', array(
        'title'          => esc_html__( ' Slider Settings', 'transcargo-transportation' ),
        'description'    => esc_html__( 'You have to select post category to show slider.', 'transcargo-transportation' ),
        'panel'          => 'transcargo_transportation_panel_id',
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'transcargo_transportation_enable_heading',
		'section'     => 'transcargo_transportation_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Slider', 'transcargo-transportation' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'transcargo_transportation_blog_box_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'transcargo-transportation' ),
		'section'     => 'transcargo_transportation_blog_slide_section',
		'default'     => '0',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'transcargo-transportation' ),
			'off' => esc_html__( 'Disable', 'transcargo-transportation' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'transcargo_transportation_slide_title_unable_disable',
		'label'       => esc_html__( 'Slide Title Enable / Disable', 'transcargo-transportation' ),
		'section'     => 'transcargo_transportation_blog_slide_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'transcargo-transportation' ),
			'off' => esc_html__( 'Disable', 'transcargo-transportation' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'transcargo_transportation_slide_text_unable_disable',
		'label'       => esc_html__( 'Slide Text Enable / Disable', 'transcargo-transportation' ),
		'section'     => 'transcargo_transportation_blog_slide_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'transcargo-transportation' ),
			'off' => esc_html__( 'Disable', 'transcargo-transportation' ),
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'transcargo_transportation_slider_heading',
		'section'     => 'transcargo_transportation_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Slider', 'transcargo-transportation' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'settings'    => 'transcargo_transportation_blog_slide_number',
		'label'       => esc_html__( 'Number of slides to show', 'transcargo-transportation' ),
		'section'     => 'transcargo_transportation_blog_slide_section',
		'default'     => 3,
		'choices'     => [
			'min'  => 0,
			'max'  => 80,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'select',
		'settings'    => 'transcargo_transportation_blog_slide_category',
		'label'       => esc_html__( 'Select the category to show slider ( Image Dimension 1600 x 600 )', 'transcargo-transportation' ),
		'section'     => 'transcargo_transportation_blog_slide_section',
		'default'     => '',
		'placeholder' => esc_html__( 'Select an category...', 'transcargo-transportation' ),
		'priority'    => 10,
		'choices'     => transcargo_transportation_get_categories_select(),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'transcargo_transportation_slider_text_heading',
		'section'     => 'transcargo_transportation_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Number Of Slider Text', 'transcargo-transportation' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'transcargo_transportation_excerpt_number',
		'label'       => esc_html__( 'Slide Content Range', 'transcargo-transportation' ),
		'section'     => 'transcargo_transportation_blog_slide_section',
		'default'     => 10,
		'choices'     => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'transcargo_transportation_slider_button_heading',
		'section'     => 'transcargo_transportation_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Slider Button Text', 'transcargo-transportation' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'transcargo_transportation_slider_button_text',
		'section'  => 'transcargo_transportation_blog_slide_section',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'transcargo_transportation_slider_button_heading_22',
		'section'     => 'transcargo_transportation_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Content Alignment', 'transcargo-transportation' ) . '</h3>',
		'priority'    => 10,
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'transcargo_transportation_slider_content_alignment',
		'label'       => esc_html__( 'Slider Content Alignment', 'transcargo-transportation' ),
		'section'     => 'transcargo_transportation_blog_slide_section',
		'default'     => 'LEFT-ALIGN',
		'placeholder' => esc_html__( 'Choose an option', 'transcargo-transportation' ),
		'choices'     => [
			'LEFT-ALIGN' => esc_html__( 'LEFT-ALIGN', 'transcargo-transportation' ),
			'CENTER-ALIGN' => esc_html__( 'CENTER-ALIGN', 'transcargo-transportation' ),
			'RIGHT-ALIGN' => esc_html__( 'RIGHT-ALIGN', 'transcargo-transportation' ),

		],
	] );


	// ABOUT US SECTION

	Kirki::add_section( 'transcargo_transportation_about_us_section', array(
        'title'          => esc_html__( 'About Us Settings', 'transcargo-transportation' ),
        'description'    => esc_html__( 'You have to select page to show about us section.', 'transcargo-transportation' ),
        'panel'          => 'transcargo_transportation_panel_id',
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'transcargo_transportation_about_us_section_enable_heading',
		'section'     => 'transcargo_transportation_about_us_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable About Us Section', 'transcargo-transportation' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'transcargo_transportation_about_us_section_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'transcargo-transportation' ),
		'section'     => 'transcargo_transportation_about_us_section',
		'default'     => '0',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'transcargo-transportation' ),
			'off' => esc_html__( 'Disable', 'transcargo-transportation' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'transcargo_transportation_about_us_section_title_heading',
		'section'     => 'transcargo_transportation_about_us_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Section Title', 'transcargo-transportation' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'transcargo_transportation_about_us_section_title',
		'section'  => 'transcargo_transportation_about_us_section',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'transcargo_transportation_about_us_page_heading',
		'section'     => 'transcargo_transportation_about_us_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Page Dropdown', 'transcargo-transportation' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'dropdown-pages',
		'settings'    => 'transcargo_transportation_about_us',
		'section'     => 'transcargo_transportation_about_us_section',
		'default'     => 42,
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'transcargo_transportation_about_excerpt_heading',
		'section'     => 'transcargo_transportation_about_us_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Number Of Text', 'transcargo-transportation' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'transcargo_transportation_about_excerpt_number',
		'label'       => esc_html__( 'Number of text to show', 'transcargo-transportation' ),
		'section'     => 'transcargo_transportation_about_us_section',
		'default'     => 60,
		'choices'     => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
	] );

	// FOOTER SECTION

	Kirki::add_section( 'transcargo_transportation_footer_section', array(
        'title'          => esc_html__( 'Footer Settings', 'transcargo-transportation' ),
        'description'    => esc_html__( 'Here you can change copyright text', 'transcargo-transportation' ),
        'panel'          => 'transcargo_transportation_panel_id',
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'transcargo_transportation_footer_text_heading',
		'section'     => 'transcargo_transportation_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Text', 'transcargo-transportation' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'transcargo_transportation_footer_text',
		'section'  => 'transcargo_transportation_footer_section',
		'default'  => '',
		'priority' => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'transcargo_transportation_footer_enable_heading',
		'section'     => 'transcargo_transportation_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Footer Link', 'transcargo-transportation' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'transcargo_transportation_copyright_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'transcargo-transportation' ),
		'section'     => 'transcargo_transportation_footer_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'transcargo-transportation' ),
			'off' => esc_html__( 'Disable', 'transcargo-transportation' ),
		],
	] );
}
