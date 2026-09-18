<?php

if ( class_exists("Kirki")){

	// LOGO

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'logistic_cargo_trucking_logo_resizer',
		'label'       => esc_html__( 'Adjust Your Logo Size ', 'logistic-cargo-trucking' ),
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
		'settings'    => 'logistic_cargo_trucking_enable_logo_text',
		'section'     => 'title_tagline',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Site Title and Tagline', 'logistic-cargo-trucking' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'logistic_cargo_trucking_display_header_title',
		'label'       => esc_html__( 'Site Title Enable / Disable Button', 'logistic-cargo-trucking' ),
		'section'     => 'title_tagline',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'logistic-cargo-trucking' ),
			'off' => esc_html__( 'Disable', 'logistic-cargo-trucking' ),
		],
		'partial_refresh'    => [
		'logistic_cargo_trucking_display_header_title' => [
			'selector'        => '.logo a',
			'render_callback' => function() {
				return get_bloginfo( 'name', 'display' );
			},
		],
	],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'logistic_cargo_trucking_display_header_text',
		'label'       => esc_html__( 'Tagline Enable / Disable Button', 'logistic-cargo-trucking' ),
		'section'     => 'title_tagline',
		'default'     => false,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'logistic-cargo-trucking' ),
			'off' => esc_html__( 'Disable', 'logistic-cargo-trucking' ),
		],
		'partial_refresh'    => [
		'logistic_cargo_trucking_display_header_text' => [
			'selector'        => '.logo-content span',
			'render_callback' => function() {
				return get_bloginfo( 'name', 'display' );
			},
		],
	],
	] );

	// FONT STYLE TYPOGRAPHY

	Kirki::add_panel( 'logistic_cargo_trucking_panel_id', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Typography', 'logistic-cargo-trucking' ),
	) );

	Kirki::add_section( 'logistic_cargo_trucking_font_style_section', array(
		'title'      => esc_attr__( 'Typography Option',  'logistic-cargo-trucking' ),
		'priority'   => 2,
		'capability' => 'edit_theme_options',
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'logistic_cargo_trucking_all_headings_typography',
		'section'     => 'logistic_cargo_trucking_font_style_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading Of All Sections',  'logistic-cargo-trucking' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'global', array(
		'type'        => 'typography',
		'settings'    => 'logistic_cargo_trucking_all_headings_typography',
		'label'       => esc_attr__( 'Heading Typography',  'logistic-cargo-trucking' ),
		'description' => esc_attr__( 'Select the typography options for your heading.',  'logistic-cargo-trucking' ),
		'section'     => 'logistic_cargo_trucking_font_style_section',
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
		'settings'    => 'logistic_cargo_trucking_body_content_typography',
		'section'     => 'logistic_cargo_trucking_font_style_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Body Content',  'logistic-cargo-trucking' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'global', array(
		'type'        => 'typography',
		'settings'    => 'logistic_cargo_trucking_body_content_typography',
		'label'       => esc_attr__( 'Content Typography',  'logistic-cargo-trucking' ),
		'description' => esc_attr__( 'Select the typography options for your content.',  'logistic-cargo-trucking' ),
		'section'     => 'logistic_cargo_trucking_font_style_section',
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

	Kirki::add_panel( 'logistic_cargo_trucking_panel_id', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Theme Options', 'logistic-cargo-trucking' ),
	) );

	// Additional Settings

	Kirki::add_section( 'logistic_cargo_trucking_additional_settings', array(
	    'title'          => esc_html__( 'Additional Settings', 'logistic-cargo-trucking' ),
	    'description'    => esc_html__( 'Scroll To Top', 'logistic-cargo-trucking' ),
	    'panel'          => 'logistic_cargo_trucking_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'logistic_cargo_trucking_scroll_enable_setting',
		'label'       => esc_html__( 'Here you can enable or disable your scroller.', 'logistic-cargo-trucking' ),
		'section'     => 'logistic_cargo_trucking_additional_settings',
		'default'     => '1',
		'priority'    => 10,
		'partial_refresh'    => [
		'logistic_cargo_trucking_scroll_enable_setting' => [
			'selector'        => '.scroll-up a',
			'render_callback' => function() {
				return get_bloginfo( 'name', 'display' );
			},
		],
	],
	] );

	new \Kirki\Field\Radio_Buttonset(
	[
		'settings'    => 'logistic_cargo_trucking_scroll_top_position',
		'label'       => esc_html__( 'Alignment for Scroll To Top', 'logistic-cargo-trucking' ),
		'section'     => 'logistic_cargo_trucking_additional_settings',
		'default'     => 'Right',
		'priority'    => 10,
		'choices'     => [
			'Left'   => esc_html__( 'Left', 'logistic-cargo-trucking' ),
			'Center' => esc_html__( 'Center', 'logistic-cargo-trucking' ),
			'Right'  => esc_html__( 'Right', 'logistic-cargo-trucking' ),
		],
	]
	);

	new \Kirki\Field\Select(
	[
		'settings'    => 'menu_text_transform_logistic_cargo_trucking',
		'label'       => esc_html__( 'Menus Text Transform', 'logistic-cargo-trucking' ),
		'section'     => 'logistic_cargo_trucking_additional_settings',
		'default'     => 'CAPITALISE',
		'placeholder' => esc_html__( 'Choose an option', 'logistic-cargo-trucking' ),
		'choices'     => [
			'CAPITALISE' => esc_html__( 'CAPITALISE', 'logistic-cargo-trucking' ),
			'UPPERCASE' => esc_html__( 'UPPERCASE', 'logistic-cargo-trucking' ),
			'LOWERCASE' => esc_html__( 'LOWERCASE', 'logistic-cargo-trucking' ),

		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'logistic_cargo_trucking_container_width',
		'label'       => esc_html__( 'Theme Container Width', 'logistic-cargo-trucking' ),
		'section'     => 'logistic_cargo_trucking_additional_settings',
		'default'     => 100,
		'choices'     => [
			'min'  => 50,
			'max'  => 100,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
	'type'        => 'toggle',
	'settings'    => 'logistic_cargo_trucking_sticky_header',
	'label'       => esc_html__( 'Here you can enable or disable your Sticky Header.', 'logistic-cargo-trucking' ),
	'section'     => 'logistic_cargo_trucking_additional_settings',
	'default'     => false,
	'priority'    => 10,
] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'logistic_cargo_trucking_site_loader',
		'label'       => esc_html__( 'Here you can enable or disable your Site Loader.', 'logistic-cargo-trucking' ),
		'section'     => 'logistic_cargo_trucking_additional_settings',
		'default'     => false,
		'priority'    => 10,
	] );

	if ( class_exists("woocommerce")){

	// Woocommerce Settings

	Kirki::add_section( 'logistic_cargo_trucking_woocommerce_settings', array(
			'title'          => esc_html__( 'Woocommerce Settings', 'logistic-cargo-trucking' ),
			'description'    => esc_html__( 'Shop Page', 'logistic-cargo-trucking' ),
			'panel'          => 'logistic_cargo_trucking_panel_id',
			'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'logistic_cargo_trucking_shop_sidebar',
		'label'       => esc_html__( 'Here you can enable or disable shop page sidebar.', 'logistic-cargo-trucking' ),
		'section'     => 'logistic_cargo_trucking_woocommerce_settings',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'logistic_cargo_trucking_product_sidebar',
		'label'       => esc_html__( 'Here you can enable or disable product page sidebar.', 'logistic-cargo-trucking' ),
		'section'     => 'logistic_cargo_trucking_woocommerce_settings',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'logistic_cargo_trucking_related_product_setting',
		'label'       => esc_html__( 'Here you can enable or disable your related products.', 'logistic-cargo-trucking' ),
		'section'     => 'logistic_cargo_trucking_woocommerce_settings',
		'default'     => true,
		'priority'    => 10,
	] );

	new \Kirki\Field\Number(
	[
		'settings' => 'logistic_cargo_trucking_per_columns',
		'label'    => esc_html__( 'Product Per Row', 'logistic-cargo-trucking' ),
		'section'  => 'logistic_cargo_trucking_woocommerce_settings',
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
		'settings' => 'logistic_cargo_trucking_product_per_page',
		'label'    => esc_html__( 'Product Per Page', 'logistic-cargo-trucking' ),
		'section'  => 'logistic_cargo_trucking_woocommerce_settings',
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

	Kirki::add_section( 'logistic_cargo_trucking_section_color', array(
	    'title'          => esc_html__( 'Global Color', 'logistic-cargo-trucking' ),
	    'description'    => esc_html__( 'Theme Color Settings', 'logistic-cargo-trucking' ),
	    'panel'          => 'logistic_cargo_trucking_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'logistic_cargo_trucking_global_colors',
		'section'     => 'logistic_cargo_trucking_section_color',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Here you can change your theme color on one click.', 'logistic-cargo-trucking' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'logistic_cargo_trucking_global_color',
		'label'       => __( 'choose your Appropriate Color', 'logistic-cargo-trucking' ),
		'section'     => 'logistic_cargo_trucking_section_color',
		'default'     => '#fab704',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'logistic_cargo_trucking_global_color_2',
		'label'       => __( 'Choose Your Second Color', 'logistic-cargo-trucking' ),
		'section'     => 'logistic_cargo_trucking_section_color',
		'default'     => '#000000',
	] );

	// HEADER SECTION

	Kirki::add_section( 'logistic_cargo_trucking_section_header', array(
	    'title'          => esc_html__( 'Header Settings', 'logistic-cargo-trucking' ),
	    'description'    => esc_html__( 'Here you can add different type of social icons.', 'logistic-cargo-trucking' ),
	    'panel'          => 'logistic_cargo_trucking_panel_id',
	    'priority'       => 160,
	) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'logistic_cargo_trucking_top_header_heading',
		'section'     => 'logistic_cargo_trucking_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Top Header Text', 'logistic-cargo-trucking' ) . '</h3>',
		'priority'    => 10,
		'partial_refresh'    => [
		'logistic_cargo_trucking_top_header_heading' => [
			'selector'        => '.top-header p',
			'render_callback' => function() {
				return get_bloginfo( 'name', 'display' );
			},
		],
	],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'logistic_cargo_trucking_top_header_text',
		'section'  => 'logistic_cargo_trucking_section_header',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'logistic_cargo_trucking_enable_search',
		'section'     => 'logistic_cargo_trucking_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Search Box', 'logistic-cargo-trucking' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'logistic_cargo_trucking_search_box_enable',
		'label'       => esc_html__( 'Search Enable / Disable Button', 'logistic-cargo-trucking' ),
		'section'     => 'logistic_cargo_trucking_section_header',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'logistic-cargo-trucking' ),
			'off' => esc_html__( 'Disable', 'logistic-cargo-trucking' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'logistic_cargo_trucking_header_button_heading',
		'section'     => 'logistic_cargo_trucking_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Button Text & URL', 'logistic-cargo-trucking' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'logistic_cargo_trucking_header_button_text',
		'label'    => __( 'Button Text', 'logistic-cargo-trucking' ),
		'section'  => 'logistic_cargo_trucking_section_header',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'link',
		'settings' => 'logistic_cargo_trucking_header_button_url',
		'label'    => __( 'Button URL', 'logistic-cargo-trucking' ),
		'section'  => 'logistic_cargo_trucking_section_header',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'logistic_cargo_trucking_enable_button',
		'section'     => 'logistic_cargo_trucking_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Button Box', 'logistic-cargo-trucking' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'logistic_cargo_trucking_button_box_enable',
		'label'       => esc_html__( 'Quote Enable / Disable Button', 'logistic-cargo-trucking' ),
		'section'     => 'logistic_cargo_trucking_section_header',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'logistic-cargo-trucking' ),
			'off' => esc_html__( 'Disable', 'logistic-cargo-trucking' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'logistic_cargo_trucking_enable_socail_link',
		'section'     => 'logistic_cargo_trucking_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Social Media Link', 'logistic-cargo-trucking' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'repeater',
		'section'     => 'logistic_cargo_trucking_section_header',
		'priority'    => 10,
		'row_label' => [
			'type'  => 'field',
			'value' => esc_html__( 'Social Icon', 'logistic-cargo-trucking' ),
			'field' => 'link_text',
		],
		'button_label' => esc_html__('Add New Social Icon', 'logistic-cargo-trucking' ),
		'settings'     => 'logistic_cargo_trucking_social_links_settings',
		'default'      => '',
		'fields' 	   => [
			'link_text' => [
				'type'        => 'text',
				'label'       => esc_html__( 'Icon', 'logistic-cargo-trucking' ),
				'description' => esc_html__( 'Add the fontawesome class ex: "fab fa-facebook-f".', 'logistic-cargo-trucking' ),
				'default'     => '',
			],
			'link_url' => [
				'type'        => 'url',
				'label'       => esc_html__( 'Social Link', 'logistic-cargo-trucking' ),
				'description' => esc_html__( 'Add the social icon url here.', 'logistic-cargo-trucking' ),
				'default'     => '',
			],
		],
		'choices' => [
			'limit' => 5
		],
		'partial_refresh'    => [
		'logistic_cargo_trucking_social_links_settings' => [
			'selector'        => '.social-links i',
			'render_callback' => function() {
				return get_bloginfo( 'name', 'display' );
			},
		],
	],
	] );

	// CONTACT INFORMATION

	Kirki::add_section( 'logistic_cargo_trucking_section_contact', array(
	    'title'          => esc_html__( 'Contact Info Settings', 'logistic-cargo-trucking' ),
	    'description'    => esc_html__( 'Here you can add your personal contact details.', 'logistic-cargo-trucking' ),
	    'panel'          => 'logistic_cargo_trucking_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'logistic_cargo_trucking_phone_number_heading_1',
		'section'     => 'logistic_cargo_trucking_section_contact',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Choose Your Icon', 'logistic-cargo-trucking' ) . '</h3>',
		'priority'    => 10,
		'partial_refresh'    => [
		'logistic_cargo_trucking_phone_number_heading_1' => [
			'selector'        => '.header p',
			'render_callback' => function() {
				return get_bloginfo( 'name', 'display' );
			},
		],
	],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'dashicons',
		'settings' => 'logistic_cargo_trucking_dashicons_setting_1',
		'label'    => esc_html__( 'Select Appropriate Icon', 'logistic-cargo-trucking' ),
		'section'  => 'logistic_cargo_trucking_section_contact',
		'default'  => 'dashicons dashicons-phone',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'logistic_cargo_trucking_phone_number_heading',
		'section'     => 'logistic_cargo_trucking_section_contact',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Phone Number', 'logistic-cargo-trucking' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'logistic_cargo_trucking_header_phone_number',
		'section'  => 'logistic_cargo_trucking_section_contact',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'logistic_cargo_trucking_phone_number_heading_2',
		'section'     => 'logistic_cargo_trucking_section_contact',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Choose Your Icon', 'logistic-cargo-trucking' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'dashicons',
		'settings' => 'logistic_cargo_trucking_dashicons_setting_2',
		'label'    => esc_html__( 'Select Appropriate Icon', 'logistic-cargo-trucking' ),
		'section'  => 'logistic_cargo_trucking_section_contact',
		'default'  => 'dashicons dashicons-email',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'logistic_cargo_trucking_email_address_heading',
		'section'     => 'logistic_cargo_trucking_section_contact',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Email Address', 'logistic-cargo-trucking' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'logistic_cargo_trucking_header_email_address',
		'section'  => 'logistic_cargo_trucking_section_contact',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'dashicons',
		'settings' => 'logistic_cargo_trucking_dashicons_setting_3',
		'label'    => esc_html__( 'Select Appropriate Icon', 'logistic-cargo-trucking' ),
		'section'  => 'logistic_cargo_trucking_section_contact',
		'default'  => 'dashicons dashicons-clock',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'logistic_cargo_trucking_open_timings_heading',
		'section'     => 'logistic_cargo_trucking_section_contact',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Timings', 'logistic-cargo-trucking' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'logistic_cargo_trucking_header_open_timings',
		'section'  => 'logistic_cargo_trucking_section_contact',
		'default'  => '',
		'priority' => 10,
	] );

	// SLIDER SECTION

	Kirki::add_section( 'logistic_cargo_trucking_blog_slide_section', array(
        'title'          => esc_html__( ' Slider Settings', 'logistic-cargo-trucking' ),
        'description'    => esc_html__( 'You have to select post category to show slider.', 'logistic-cargo-trucking' ),
        'panel'          => 'logistic_cargo_trucking_panel_id',
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'logistic_cargo_trucking_enable_heading',
		'section'     => 'logistic_cargo_trucking_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Slider', 'logistic-cargo-trucking' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'logistic_cargo_trucking_blog_box_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'logistic-cargo-trucking' ),
		'section'     => 'logistic_cargo_trucking_blog_slide_section',
		'default'     => false,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'logistic-cargo-trucking' ),
			'off' => esc_html__( 'Disable', 'logistic-cargo-trucking' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'logistic_cargo_trucking_slide_title_unable_disable',
		'label'       => esc_html__( 'Slide Title Enable / Disable', 'logistic-cargo-trucking' ),
		'section'     => 'logistic_cargo_trucking_blog_slide_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'logistic-cargo-trucking' ),
			'off' => esc_html__( 'Disable', 'logistic-cargo-trucking' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'logistic_cargo_trucking_slide_text_unable_disable',
		'label'       => esc_html__( 'Slide Text Enable / Disable', 'logistic-cargo-trucking' ),
		'section'     => 'logistic_cargo_trucking_blog_slide_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'logistic-cargo-trucking' ),
			'off' => esc_html__( 'Disable', 'logistic-cargo-trucking' ),
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'logistic_cargo_trucking_slider_heading',
		'section'     => 'logistic_cargo_trucking_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Slider', 'logistic-cargo-trucking' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'settings'    => 'logistic_cargo_trucking_blog_slide_number',
		'label'       => esc_html__( 'Number of slides to show', 'logistic-cargo-trucking' ),
		'section'     => 'logistic_cargo_trucking_blog_slide_section',
		'default'     => 3,
		'choices'     => [
			'min'  => 0,
			'max'  => 5,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'select',
		'settings'    => 'logistic_cargo_trucking_blog_slide_category',
		'label'       => esc_html__( 'Select the category to show slider ( Image Dimension 1600 x 600 )', 'logistic-cargo-trucking' ),
		'section'     => 'logistic_cargo_trucking_blog_slide_section',
		'default'     => '',
		'placeholder' => esc_html__( 'Select an category...', 'logistic-cargo-trucking' ),
		'priority'    => 10,
		'choices'     => logistic_cargo_trucking_get_categories_select(),
		'partial_refresh'    => [
		'logistic_cargo_trucking_blog_slide_category' => [
			'selector'        => '.blog_box h3',
			'render_callback' => function() {
				return get_bloginfo( 'name', 'display' );
			},
		],
	],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'logistic_cargo_trucking_slider_text_heading',
		'section'     => 'logistic_cargo_trucking_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Number Of Slider Text', 'logistic-cargo-trucking' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'logistic_cargo_trucking_excerpt_number',
		'label'       => esc_html__( 'Slide Content Range', 'logistic-cargo-trucking' ),
		'section'     => 'logistic_cargo_trucking_blog_slide_section',
		'default'     => 10,
		'choices'     => [
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'logistic_cargo_trucking_slider_button_heading',
		'section'     => 'logistic_cargo_trucking_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Slider Button Text', 'logistic-cargo-trucking' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'logistic_cargo_trucking_slider_button_text',
		'section'  => 'logistic_cargo_trucking_blog_slide_section',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
	'type'        => 'custom',
	'settings'    => 'logistic_cargo_trucking_enable_heading',
	'section'     => 'logistic_cargo_trucking_blog_slide_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Content Alignment', 'logistic-cargo-trucking' ) . '</h3>',
	'priority'    => 10,
] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'logistic_cargo_trucking_slider_content_alignment',
		'label'       => esc_html__( 'Slider Content Alignment', 'logistic-cargo-trucking' ),
		'section'     => 'logistic_cargo_trucking_blog_slide_section',
		'default'     => 'CENTER-ALIGN',
		'placeholder' => esc_html__( 'Choose an option', 'logistic-cargo-trucking' ),
		'choices'     => [
			'LEFT-ALIGN' => esc_html__( 'LEFT-ALIGN', 'logistic-cargo-trucking' ),
			'CENTER-ALIGN' => esc_html__( 'CENTER-ALIGN', 'logistic-cargo-trucking' ),
			'RIGHT-ALIGN' => esc_html__( 'RIGHT-ALIGN', 'logistic-cargo-trucking' ),

		],
	] );

	// SERVICES SECTION

	Kirki::add_section( 'logistic_cargo_trucking_featured_post_section', array(
        'title'          => esc_html__( 'Services Settings', 'logistic-cargo-trucking' ),
        'description'    => esc_html__( 'You have to select post category to show services.', 'logistic-cargo-trucking' ),
        'panel'          => 'logistic_cargo_trucking_panel_id',
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'logistic_cargo_trucking_services_enable_heading',
		'section'     => 'logistic_cargo_trucking_featured_post_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Services Section', 'logistic-cargo-trucking' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'logistic_cargo_trucking_services_box_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'logistic-cargo-trucking' ),
		'section'     => 'logistic_cargo_trucking_featured_post_section',
		'default'     => false,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'logistic-cargo-trucking' ),
			'off' => esc_html__( 'Disable', 'logistic-cargo-trucking' ),
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'logistic_cargo_trucking_post_heading',
		'section'     => 'logistic_cargo_trucking_featured_post_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Services', 'logistic-cargo-trucking' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'settings'    => 'logistic_cargo_trucking_services_number',
		'label'       => esc_html__( 'Number of services to show', 'logistic-cargo-trucking' ),
		'section'     => 'logistic_cargo_trucking_featured_post_section',
		'default'     => 5,
		'choices'     => [
			'min'  => 0,
			'max'  => 80,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'select',
		'settings'    => 'logistic_cargo_trucking_services_category',
		'label'       => esc_html__( 'Select the category to show services', 'logistic-cargo-trucking' ),
		'section'     => 'logistic_cargo_trucking_featured_post_section',
		'default'     => '',
		'placeholder' => esc_html__( 'Select an category...', 'logistic-cargo-trucking' ),
		'priority'    => 10,
		'choices'     => logistic_cargo_trucking_get_categories_select(),
		'partial_refresh'    => [
		'logistic_cargo_trucking_services_category' => [
			'selector'        => '.services h4',
			'render_callback' => function() {
				return get_bloginfo( 'name', 'display' );
			},
		],
	],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'logistic_cargo_trucking_service_text_heading',
		'section'     => 'logistic_cargo_trucking_featured_post_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Number Of Text', 'logistic-cargo-trucking' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'logistic_cargo_trucking_service_excerpt_number',
		'label'       => esc_html__( 'Services Content Range', 'logistic-cargo-trucking' ),
		'section'     => 'logistic_cargo_trucking_featured_post_section',
		'default'     => 15,
		'choices'     => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'logistic_cargo_trucking_services_button_heading',
		'section'     => 'logistic_cargo_trucking_featured_post_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Services Button Text', 'logistic-cargo-trucking' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'logistic_cargo_trucking_services_button_text',
		'section'  => 'logistic_cargo_trucking_featured_post_section',
		'default'  => '',
		'priority' => 10,
	] );


	// FOOTER SECTION

	Kirki::add_section( 'logistic_cargo_trucking_footer_section', array(
        'title'          => esc_html__( 'Footer Settings', 'logistic-cargo-trucking' ),
        'description'    => esc_html__( 'Here you can change copyright text', 'logistic-cargo-trucking' ),
        'panel'          => 'logistic_cargo_trucking_panel_id',
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'logistic_cargo_trucking_footer_text_heading',
		'section'     => 'logistic_cargo_trucking_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Text', 'logistic-cargo-trucking' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'logistic_cargo_trucking_footer_text',
		'section'  => 'logistic_cargo_trucking_footer_section',
		'default'  => '',
		'priority' => 10,
		'partial_refresh'    => [
		'logistic_cargo_trucking_footer_text' => [
			'selector'        => '.copy-text p',
			'render_callback' => function() {
				return get_bloginfo( 'name', 'display' );
			},
		],
	],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'logistic_cargo_trucking_footer_enable_heading',
		'section'     => 'logistic_cargo_trucking_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Footer Link', 'logistic-cargo-trucking' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'logistic_cargo_trucking_copyright_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'logistic-cargo-trucking' ),
		'section'     => 'logistic_cargo_trucking_footer_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'logistic-cargo-trucking' ),
			'off' => esc_html__( 'Disable', 'logistic-cargo-trucking' ),
		],
	] );

		Kirki::add_field( 'theme_config_id', [
	'type'        => 'custom',
	'settings'    => 'logistic_cargo_trucking_footer_text_heading_2',
	'section'     => 'logistic_cargo_trucking_footer_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Alignment', 'logistic-cargo-trucking' ) . '</h3>',
	'priority'    => 10,
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'logistic_cargo_trucking_copyright_text_alignment',
		'label'       => esc_html__( 'Copyright text Alignment', 'logistic-cargo-trucking' ),
		'section'     => 'logistic_cargo_trucking_footer_section',
		'default'     => 'LEFT-ALIGN',
		'placeholder' => esc_html__( 'Choose an option', 'logistic-cargo-trucking' ),
		'choices'     => [
			'LEFT-ALIGN' => esc_html__( 'LEFT-ALIGN', 'logistic-cargo-trucking' ),
			'CENTER-ALIGN' => esc_html__( 'CENTER-ALIGN', 'logistic-cargo-trucking' ),
			'RIGHT-ALIGN' => esc_html__( 'RIGHT-ALIGN', 'logistic-cargo-trucking' ),

		],
	] );

	Kirki::add_field( 'theme_config_id', [
	'type'        => 'custom',
	'settings'    => 'logistic_cargo_trucking_footer_text_heading_1',
	'section'     => 'logistic_cargo_trucking_footer_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Background Color', 'logistic-cargo-trucking' ) . '</h3>',
	'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'logistic_cargo_trucking_copyright_bg',
		'label'       => __( 'Choose Your Copyright Background Color', 'logistic-cargo-trucking' ),
		'section'     => 'logistic_cargo_trucking_footer_section',
		'default'     => '',
	] );
}
