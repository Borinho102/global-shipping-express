<?php
/**
 * Logistic Transport Theme Customizer
 *
 * @package Logistic Transport
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function logistic_transport_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-changer.php' );

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial(
		'blogname',
		array(
			'selector'        => '.site-title a',
			'render_callback' => 'logistic_transport_customize_partial_blogname',
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'blogdescription',
		array(
			'selector'        => '.site-description',
			'render_callback' => 'logistic_transport_customize_partial_blogdescription',
		)
	);

	//About Section
		$wp_customize->add_section( 'logistic_transport_about_theme' , array(
	    	'title' => esc_html__( 'About Theme', 'logistic-transport' ),
	    	'priority' => 10,
		) );

		$wp_customize->add_setting('logistic_transport_demo_link',array(
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('logistic_transport_demo_link',array(
			'type'=> 'hidden',
			'description' => "<h3>Theme Demo</h3>Our premium version of Logistic Transport has unlimited sections with advanced control fields. Dedicated support and no limititation in any field.<br> <a target='_blank' href='". esc_url('https://www.themescaliber.com/tc-logistics-transport-pro/') ." '>View Demo</a>",
			'section'=> 'logistic_transport_about_theme'
		));
		
		$wp_customize->add_setting('logistic_transport_doc_link',array(
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('logistic_transport_doc_link',array(
			'type'=> 'hidden',
			'description' => "<h3>Theme Documentation</h3>We have well prepared documentation that provides the general guidelines and suggestions needed for this theme.<br> <a target='_blank' href='". esc_url('https://themescaliber.com/demo/doc/free-tc-logistics-transport/') ." '>View Documentation</a>",
			'section'=> 'logistic_transport_about_theme'
		));

		$wp_customize->add_setting('logistic_transport_forum_link',array(
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('logistic_transport_forum_link',array(
			'type'=> 'hidden',
			'description' => "<h3>Theme Support</h3>Regarding any theme issue, we offer 24/7 support. You can get assistance from our support staff in resolving any problem. Please get in touch with us.<br><a target='_blank' href='". esc_url('https://wordpress.org/support/theme/logistic-transport/') ." '>Support Forum</a>",
			'section'=> 'logistic_transport_about_theme'
		));

	//add home page setting pannel
	$wp_customize->add_panel( 'logistic_transport_panel_id', array(
	    'priority' => 20,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'logistic-transport' ),
	) );

    $logistic_transport_font_array= array(
        '' =>'No Fonts',
        'Abril Fatface' => 'Abril Fatface',
        'Acme' =>'Acme', 
        'Anton' => 'Anton', 
        'Architects Daughter' =>'Architects Daughter',
        'Arimo' => 'Arimo', 
        'Arsenal' =>'Arsenal',
        'Arvo' =>'Arvo',
        'Alegreya' =>'Alegreya',
        'Alfa Slab One' =>'Alfa Slab One',
        'Averia Serif Libre' =>'Averia Serif Libre', 
        'Bangers' =>'Bangers', 
        'Boogaloo' =>'Boogaloo', 
        'Bad Script' =>'Bad Script',
        'Bitter' =>'Bitter', 
        'Bree Serif' =>'Bree Serif', 
        'BenchNine' =>'BenchNine',
        'Cabin' =>'Cabin',
        'Cardo' =>'Cardo', 
        'Courgette' =>'Courgette', 
        'Cherry Swash' =>'Cherry Swash',
        'Cormorant Garamond' =>'Cormorant Garamond', 
        'Crimson Text' =>'Crimson Text',
        'Cuprum' =>'Cuprum', 
        'Cookie' =>'Cookie',
        'Chewy' =>'Chewy',
        'Days One' =>'Days One',
        'Dosis' =>'Dosis',
        'Droid Sans' =>'Droid Sans', 
        'Economica' =>'Economica', 
        'Fredoka One' =>'Fredoka One',
        'Fjalla One' =>'Fjalla One',
        'Francois One' =>'Francois One', 
        'Frank Ruhl Libre' => 'Frank Ruhl Libre', 
        'Gloria Hallelujah' =>'Gloria Hallelujah',
        'Great Vibes' =>'Great Vibes', 
        'Handlee' =>'Handlee', 
        'Hammersmith One' =>'Hammersmith One',
        'Inconsolata' =>'Inconsolata',
        'Indie Flower' =>'Indie Flower', 
        'IM Fell English SC' =>'IM Fell English SC',
        'Julius Sans One' =>'Julius Sans One',
        'Josefin Slab' =>'Josefin Slab',
        'Josefin Sans' =>'Josefin Sans',
        'Kanit' =>'Kanit',
        'Lobster' =>'Lobster',
        'Lato' => 'Lato',
        'Lora' =>'Lora', 
        'Libre Baskerville' =>'Libre Baskerville',
        'Lobster Two' => 'Lobster Two',
        'Merriweather' =>'Merriweather',
        'Monda' =>'Monda',
        'Montserrat' =>'Montserrat',
        'Muli' =>'Muli',
        'Marck Script' =>'Marck Script',
        'Noto Serif' =>'Noto Serif',
        'Open Sans' =>'Open Sans',
        'Overpass' => 'Overpass', 
        'Overpass Mono' =>'Overpass Mono',
        'Oxygen' =>'Oxygen',
        'Orbitron' =>'Orbitron',
        'Patua One' =>'Patua One',
        'Pacifico' =>'Pacifico',
        'Padauk' =>'Padauk',
        'Playball' =>'Playball',
        'Playfair Display' =>'Playfair Display',
        'PT Sans' =>'PT Sans',
        'Philosopher' =>'Philosopher',
        'Permanent Marker' =>'Permanent Marker',
        'Poiret One' =>'Poiret One',
        'Quicksand' =>'Quicksand',
        'Quattrocento Sans' =>'Quattrocento Sans',
        'Raleway' =>'Raleway',
        'Rubik' =>'Rubik',
        'Rokkitt' =>'Rokkitt',
        'Russo One' => 'Russo One', 
        'Righteous' =>'Righteous', 
        'Slabo' =>'Slabo', 
        'Source Sans Pro' =>'Source Sans Pro',
        'Shadows Into Light Two' =>'Shadows Into Light Two',
        'Shadows Into Light' =>  'Shadows Into Light',
        'Sacramento' =>'Sacramento',
        'Shrikhand' =>'Shrikhand',
        'Tangerine' => 'Tangerine',
        'Ubuntu' =>'Ubuntu',
        'VT323' =>'VT323',
        'Varela Round' =>'Varela Round',
        'Vampiro One' =>'Vampiro One',
        'Vollkorn' => 'Vollkorn',
        'Volkhov' =>'Volkhov',
        'Kavoon' =>'Kavoon',
        'Yanone Kaffeesatz' =>'Yanone Kaffeesatz'
    );

	//Color / Font Pallete
	$wp_customize->add_section( 'logistic_transport_typography', array(
    	'title'      => __( 'Color / Font Pallete', 'logistic-transport' ),
		'priority'   => 30,
		'panel' => 'logistic_transport_panel_id'
	) );

	// This is Body Color setting
	$wp_customize->add_setting( 'logistic_transport_body_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'logistic_transport_body_color', array(
		'label' => __('Body Color', 'logistic-transport'),
		'section' => 'logistic_transport_typography',
		'settings' => 'logistic_transport_body_color',
	)));

	//This is Body FontFamily  setting
	$wp_customize->add_setting('logistic_transport_body_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'logistic_transport_sanitize_choices'
	));
	$wp_customize->add_control(
		'logistic_transport_body_font_family', array(
		'section'  => 'logistic_transport_typography',
		'label'    => __( 'Body Fonts','logistic-transport'),
		'type'     => 'select',
		'choices'  => $logistic_transport_font_array,
	));

    //This is Body Fontsize setting
	$wp_customize->add_setting('logistic_transport_body_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('logistic_transport_body_font_size',array(
		'label'	=> __('Body Font Size','logistic-transport'),
		'section'	=> 'logistic_transport_typography',
		'setting'	=> 'logistic_transport_body_font_size',
		'type'	=> 'text'
	));

	// Add the Theme Color Option section.
	$wp_customize->add_setting( 'logistic_transport_theme_color_first', array(
	    'default' => '#00cdfc',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'logistic_transport_theme_color_first', array(
  		'label' => 'Theme Color Option 1',
	    'section' => 'logistic_transport_typography',
	    'settings' => 'logistic_transport_theme_color_first',
  	)));

  	$wp_customize->add_setting( 'logistic_transport_theme_color_second', array(
	    'default' => '#1d2027',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'logistic_transport_theme_color_second', array(
  		'label' => 'Theme Color Option 2',
	    'section' => 'logistic_transport_typography',
	    'settings' => 'logistic_transport_theme_color_second',
  	)));
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'logistic_transport_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'logistic_transport_paragraph_color', array(
		'label' => __('Paragraph Color', 'logistic-transport'),
		'section' => 'logistic_transport_typography',
		'settings' => 'logistic_transport_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('logistic_transport_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'logistic_transport_sanitize_choices'
	));
	$wp_customize->add_control(
	    'logistic_transport_paragraph_font_family', array(
	    'section'  => 'logistic_transport_typography',
	    'label'    => __( 'Paragraph Fonts','logistic-transport'),
	    'type'     => 'select',
	    'choices'  => $logistic_transport_font_array,
	));

	$wp_customize->add_setting('logistic_transport_paragraph_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('logistic_transport_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','logistic-transport'),
		'section'	=> 'logistic_transport_typography',
		'setting'	=> 'logistic_transport_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'logistic_transport_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'logistic_transport_atag_color', array(
		'label' => __('"a" Tag Color', 'logistic-transport'),
		'section' => 'logistic_transport_typography',
		'settings' => 'logistic_transport_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('logistic_transport_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'logistic_transport_sanitize_choices'
	));
	$wp_customize->add_control(
	    'logistic_transport_atag_font_family', array(
	    'section'  => 'logistic_transport_typography',
	    'label'    => __( '"a" Tag Fonts','logistic-transport'),
	    'type'     => 'select',
	    'choices'  => $logistic_transport_font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'logistic_transport_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'logistic_transport_li_color', array(
		'label' => __('"li" Tag Color', 'logistic-transport'),
		'section' => 'logistic_transport_typography',
		'settings' => 'logistic_transport_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('logistic_transport_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'logistic_transport_sanitize_choices'
	));
	$wp_customize->add_control(
	    'logistic_transport_li_font_family', array(
	    'section'  => 'logistic_transport_typography',
	    'label'    => __( '"li" Tag Fonts','logistic-transport'),
	    'type'     => 'select',
	    'choices'  => $logistic_transport_font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'logistic_transport_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'logistic_transport_h1_color', array(
		'label' => __('h1 Color', 'logistic-transport'),
		'section' => 'logistic_transport_typography',
		'settings' => 'logistic_transport_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('logistic_transport_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'logistic_transport_sanitize_choices'
	));
	$wp_customize->add_control(
	    'logistic_transport_h1_font_family', array(
	    'section'  => 'logistic_transport_typography',
	    'label'    => __( 'h1 Fonts','logistic-transport'),
	    'type'     => 'select',
	    'choices'  => $logistic_transport_font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('logistic_transport_h1_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('logistic_transport_h1_font_size',array(
		'label'	=> __('h1 Font Size','logistic-transport'),
		'section'	=> 'logistic_transport_typography',
		'setting'	=> 'logistic_transport_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'logistic_transport_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'logistic_transport_h2_color', array(
		'label' => __('h2 Color', 'logistic-transport'),
		'section' => 'logistic_transport_typography',
		'settings' => 'logistic_transport_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('logistic_transport_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'logistic_transport_sanitize_choices'
	));
	$wp_customize->add_control(
	    'logistic_transport_h2_font_family', array(
	    'section'  => 'logistic_transport_typography',
	    'label'    => __( 'h2 Fonts','logistic-transport'),
	    'type'     => 'select',
	    'choices'  => $logistic_transport_font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('logistic_transport_h2_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('logistic_transport_h2_font_size',array(
		'label'	=> __('h2 Font Size','logistic-transport'),
		'section'	=> 'logistic_transport_typography',
		'setting'	=> 'logistic_transport_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'logistic_transport_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'logistic_transport_h3_color', array(
		'label' => __('h3 Color', 'logistic-transport'),
		'section' => 'logistic_transport_typography',
		'settings' => 'logistic_transport_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('logistic_transport_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'logistic_transport_sanitize_choices'
	));
	$wp_customize->add_control(
	    'logistic_transport_h3_font_family', array(
	    'section'  => 'logistic_transport_typography',
	    'label'    => __( 'h3 Fonts','logistic-transport'),
	    'type'     => 'select',
	    'choices'  => $logistic_transport_font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('logistic_transport_h3_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('logistic_transport_h3_font_size',array(
		'label'	=> __('h3 Font Size','logistic-transport'),
		'section'	=> 'logistic_transport_typography',
		'setting'	=> 'logistic_transport_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'logistic_transport_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'logistic_transport_h4_color', array(
		'label' => __('h4 Color', 'logistic-transport'),
		'section' => 'logistic_transport_typography',
		'settings' => 'logistic_transport_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('logistic_transport_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'logistic_transport_sanitize_choices'
	));
	$wp_customize->add_control(
	    'logistic_transport_h4_font_family', array(
	    'section'  => 'logistic_transport_typography',
	    'label'    => __( 'h4 Fonts','logistic-transport'),
	    'type'     => 'select',
	    'choices'  => $logistic_transport_font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('logistic_transport_h4_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('logistic_transport_h4_font_size',array(
		'label'	=> __('h4 Font Size','logistic-transport'),
		'section'	=> 'logistic_transport_typography',
		'setting'	=> 'logistic_transport_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'logistic_transport_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'logistic_transport_h5_color', array(
		'label' => __('h5 Color', 'logistic-transport'),
		'section' => 'logistic_transport_typography',
		'settings' => 'logistic_transport_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('logistic_transport_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'logistic_transport_sanitize_choices'
	));
	$wp_customize->add_control(
	    'logistic_transport_h5_font_family', array(
	    'section'  => 'logistic_transport_typography',
	    'label'    => __( 'h5 Fonts','logistic-transport'),
	    'type'     => 'select',
	    'choices'  => $logistic_transport_font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('logistic_transport_h5_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('logistic_transport_h5_font_size',array(
		'label'	=> __('h5 Font Size','logistic-transport'),
		'section'	=> 'logistic_transport_typography',
		'setting'	=> 'logistic_transport_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'logistic_transport_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'logistic_transport_h6_color', array(
		'label' => __('h6 Color', 'logistic-transport'),
		'section' => 'logistic_transport_typography',
		'settings' => 'logistic_transport_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('logistic_transport_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'logistic_transport_sanitize_choices'
	));
	$wp_customize->add_control(
	    'logistic_transport_h6_font_family', array(
	    'section'  => 'logistic_transport_typography',
	    'label'    => __( 'h6 Fonts','logistic-transport'),
	    'type'     => 'select',
	    'choices'  => $logistic_transport_font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('logistic_transport_h6_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('logistic_transport_h6_font_size',array(
		'label'	=> __('h6 Font Size','logistic-transport'),
		'section'	=> 'logistic_transport_typography',
		'setting'	=> 'logistic_transport_h6_font_size',
		'type'	=> 'text'
	));

	//Layouts
	$wp_customize->add_section( 'logistic_transport_left_right', array(
    	'title'      => __( 'Theme Layout Settings', 'logistic-transport' ),
		'priority'   => 30,
		'panel' => 'logistic_transport_panel_id'
	) );

	$wp_customize->add_setting('logistic_transport_width_options',array(
        'default' => 'Full Layout',
        'sanitize_callback' => 'logistic_transport_sanitize_choices'
	));
	$wp_customize->add_control('logistic_transport_width_options',array(
        'type' => 'select',
        'label' => __('Select Site Layout','logistic-transport'),
        'section' => 'logistic_transport_left_right',
        'choices' => array(
            'Full Layout' => __('Full Layout','logistic-transport'),
            'Contained Layout' => __('Contained Layout','logistic-transport'),
            'Boxed Layout' => __('Boxed Layout','logistic-transport'),
        ),
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('logistic_transport_theme_options',array(
	        'default' => 'Right Sidebar',
	        'sanitize_callback' => 'logistic_transport_sanitize_choices'
	) );
	$wp_customize->add_control('logistic_transport_theme_options',
	    array(
	        'type' => 'radio',
	        'label' => __('Sidebar Options','logistic-transport'),
	        'section' => 'logistic_transport_left_right',
	        'choices' => array(
	            'Left Sidebar' => __('Left Sidebar','logistic-transport'),
	            'Right Sidebar' => __('Right Sidebar','logistic-transport'),
	            'One Column' => __('One Column','logistic-transport'),
	            'Three Columns' => __('Three Columns','logistic-transport'),
	            'Four Columns' => __('Four Columns','logistic-transport'),
	            'Grid Layout' => __('Grid Layout','logistic-transport')
	        ),
	    )
    );

    // Add Settings and Controls for Layout
	$wp_customize->add_setting('logistic_transport_single_post_sidebar',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'logistic_transport_sanitize_choices'
	) );
	$wp_customize->add_control('logistic_transport_single_post_sidebar', array(
        'type' => 'radio',
        'label' => __('Single Post Sidebar Layout','logistic-transport'),
        'section' => 'logistic_transport_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','logistic-transport'),
            'Right Sidebar' => __('Right Sidebar','logistic-transport'),
            'One Column' => __('One Column','logistic-transport'),
        ),
    ));

    $wp_customize->add_setting('logistic_transport_single_page_sidebar_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'logistic_transport_sanitize_choices',
	));
	$wp_customize->add_control('logistic_transport_single_page_sidebar_layout',array(
		'type'           => 'radio',
		'label'          => __('Single Page Sidebar Layouts', 'logistic-transport'),
		'section'        => 'logistic_transport_left_right',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'logistic-transport'),
			'Right Sidebar' => __('Right Sidebar', 'logistic-transport'),
			'One Column'    => __('One Column', 'logistic-transport'),
		),
	));

    $wp_customize->add_setting( 'logistic_transport_single_page_breadcrumb',array(
		'default' => true,
      	'sanitize_callback'	=> 'logistic_transport_sanitize_checkbox'
    ) );
    $wp_customize->add_control('logistic_transport_single_page_breadcrumb',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Single Page Breadcrumb','logistic-transport' ),
        'section' => 'logistic_transport_left_right'
    ));

    $wp_customize->add_setting('logistic_transport_breadcrumb_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'logistic_transport_breadcrumb_color', array(
		'label'    => __('Breadcrumb Color', 'logistic-transport'),
		'section'  => 'logistic_transport_left_right',
	)));

	$wp_customize->add_setting('logistic_transport_breadcrumb_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'logistic_transport_breadcrumb_background_color', array(
		'label'    => __('Breadcrumb Background Color', 'logistic-transport'),
		'section'  => 'logistic_transport_left_right',
	)));

	$wp_customize->add_setting('logistic_transport_breadcrumb_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'logistic_transport_breadcrumb_hover_color', array(
		'label'    => __('Breadcrumb Hover Color', 'logistic-transport'),
		'section'  => 'logistic_transport_left_right',
	)));

	$wp_customize->add_setting('logistic_transport_breadcrumb_hover_bg_color', array(
		'default'           => ' ',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'logistic_transport_breadcrumb_hover_bg_color', array(
		'label'    => __('Breadcrumb Hover Background Color', 'logistic-transport'),
		'section'  => 'logistic_transport_left_right',
	)));

    //topbar
	$wp_customize->add_section('logistic_transport_topbar',array(
		'title'	=> __('Social Icons','logistic-transport'),
		'priority'	=> null,
		'panel' => 'logistic_transport_panel_id',
	));

	$wp_customize->selective_refresh->add_partial(
		'logistic_transport_facebook_url',
		array(
			'selector'        => '.social-media',
			'render_callback' => 'logistic_transport_customize_partial_logistic_transport_facebook_url',
		)
	);

	$wp_customize->add_setting('logistic_transport_facebook_icon',array(
		'default'	=> 'fab fa-facebook-f',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Logistic_Transport_Icon_Changer(
        $wp_customize, 'logistic_transport_facebook_icon',array(
		'label'	=> __('Facebook Icon','logistic-transport'),
		'section'	=> 'logistic_transport_topbar',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('logistic_transport_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('logistic_transport_facebook_url',array(
		'label'	=> __('Add Facebook link','logistic-transport'),
		'section'	=> 'logistic_transport_topbar',
		'setting'	=> 'logistic_transport_facebook_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('logistic_transport_twitter_icon',array(
		'default'	=> 'fab fa-twitter',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Logistic_Transport_Icon_Changer(
        $wp_customize, 'logistic_transport_twitter_icon',array(
		'label'	=> __('Twitter Icon','logistic-transport'),
		'section'	=> 'logistic_transport_topbar',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('logistic_transport_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('logistic_transport_twitter_url',array(
		'label'	=> __('Add Twitter link','logistic-transport'),
		'section'	=> 'logistic_transport_topbar',
		'setting'	=> 'logistic_transport_twitter_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('logistic_transport_instagram_icon',array(
		'default'	=> 'fab fa-instagram',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Logistic_Transport_Icon_Changer(
        $wp_customize, 'logistic_transport_instagram_icon',array(
		'label'	=> __('Instagram Icon','logistic-transport'),
		'section'	=> 'logistic_transport_topbar',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('logistic_transport_instagram_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('logistic_transport_instagram_url',array(
		'label'	=> __('Add Instagram link','logistic-transport'),
		'section'	=> 'logistic_transport_topbar',
		'setting'	=> 'logistic_transport_instagram_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('logistic_transport_linkedin_icon',array(
		'default'	=> 'fab fa-linkedin-in',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Logistic_Transport_Icon_Changer(
        $wp_customize, 'logistic_transport_linkedin_icon',array(
		'label'	=> __('Linkedin Icon','logistic-transport'),
		'section'	=> 'logistic_transport_topbar',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('logistic_transport_linkdin_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('logistic_transport_linkdin_url',array(
		'label'	=> __('Add Linkedin link','logistic-transport'),
		'section'	=> 'logistic_transport_topbar',
		'setting'	=> 'logistic_transport_linkdin_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('logistic_transport_youtube_icon',array(
		'default'	=> 'fab fa-youtube',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Logistic_Transport_Icon_Changer(
        $wp_customize, 'logistic_transport_youtube_icon',array(
		'label'	=> __('Youtube Icon','logistic-transport'),
		'section'	=> 'logistic_transport_topbar',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('logistic_transport_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('logistic_transport_youtube_url',array(
		'label'	=> __('Add Youtube link','logistic-transport'),
		'section'	=> 'logistic_transport_topbar',
		'setting'	=> 'logistic_transport_youtube_url',
		'type'		=> 'url'
	));
    
    /*social-icon font size*/
	$wp_customize->add_setting('logistic_transport_social_icon_fontsize',array(
		'default'=> '',
		'sanitize_callback'	=> 'logistic_transport_sanitize_float'
	));
	$wp_customize->add_control('logistic_transport_social_icon_fontsize',array(
		'label'	=> __('Social Icons Font Size','logistic-transport'),
		'input_attrs' => array(
            'step' => 1,
			'min'  => 0,
			'max'  => 100,
        ),
		'section'=> 'logistic_transport_topbar',
		'type'=> 'number',
	));

	//Header
	$wp_customize->add_section('logistic_transport_header',array(
		'title'	=> __('Header','logistic-transport'),
		'priority'	=> null,
		'panel' => 'logistic_transport_panel_id',
	));

	$wp_customize->selective_refresh->add_partial(
		'logistic_transport_topbar_hide',
		array(
			'selector'        => '.topbar',
			'render_callback' => 'logistic_transport_customize_partial_logistic_transport_topbar_hide',
		)
	);

	//Show /Hide Topbar
	$wp_customize->add_setting( 'logistic_transport_topbar_hide',array(
		'default' => false,
      	'sanitize_callback'	=> 'logistic_transport_sanitize_checkbox'
    ) );
    $wp_customize->add_control('logistic_transport_topbar_hide',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Topbar','logistic-transport' ),
        'section' => 'logistic_transport_header'
    ));

    $wp_customize->add_setting('logistic_transport_topbar_top_bottom',array(
		'default'=> '15',
		'sanitize_callback'	=> 'logistic_transport_sanitize_float'
	));
	$wp_customize->add_control('logistic_transport_topbar_top_bottom',array(
		'label'	=> __('Topbar Top Bottom Padding','logistic-transport'),
		'input_attrs' => array(
            'step' => 1,
			'min'  => 0,
			'max'  => 50,
        ),
		'section'=> 'logistic_transport_header',
		'type'=> 'number',
	));

	$wp_customize->add_setting('logistic_transport_search_icon',array(
		'default'	=> 'fas fa-search',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Logistic_Transport_Icon_Changer(
        $wp_customize, 'logistic_transport_search_icon',array(
		'label'	=> __('Search Icon','logistic-transport'),
		'section'	=> 'logistic_transport_header',
		'type'		=> 'icon'
	)));

	//Sticky Header
	$wp_customize->add_setting( 'logistic_transport_sticky_header',array(
      	'sanitize_callback'	=> 'logistic_transport_sanitize_checkbox'
    ) );
    $wp_customize->add_control('logistic_transport_sticky_header',array(
    	'type' => 'checkbox',
        'label' => __( 'Sticky Header','logistic-transport' ),
        'section' => 'logistic_transport_header'
    ));

    $wp_customize->add_setting('logistic_transport_sticky_header_padding', array(
		'default'=> '',
		'sanitize_callback'	=> 'logistic_transport_sanitize_float'
	));
	$wp_customize->add_control('logistic_transport_sticky_header_padding', array(
		'label'	=> __('Sticky Header Padding','logistic-transport'),
		'input_attrs' => array(
            'step' => 1,
			'min'  => 0,
			'max'  => 50,
        ),
		'section'=> 'logistic_transport_header',
		'type'=> 'number',
	));

	$wp_customize->add_setting('logistic_transport_phone_icon',array(
		'default'	=> 'fas fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Logistic_Transport_Icon_Changer(
        $wp_customize, 'logistic_transport_phone_icon',array(
		'label'	=> __('Phone Icon','logistic-transport'),
		'section'	=> 'logistic_transport_header',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('logistic_transport_call',array(
		'default'	=> '',
		'sanitize_callback'	=> 'logistic_transport_sanitize_phone_number'
	));	
	$wp_customize->add_control('logistic_transport_call',array(
		'label'	=> __('Call Number','logistic-transport'),
		'section'	=> 'logistic_transport_header',
		'setting'	=> 'logistic_transport_call',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('logistic_transport_mail_icon',array(
		'default'	=> 'fas fa-envelope',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Logistic_Transport_Icon_Changer(
        $wp_customize, 'logistic_transport_mail_icon',array(
		'label'	=> __('Mail Icon','logistic-transport'),
		'section'	=> 'logistic_transport_header',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('logistic_transport_mail',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));	
	$wp_customize->add_control('logistic_transport_mail',array(
		'label'	=> __('Email Address','logistic-transport'),
		'section'	=> 'logistic_transport_header',
		'setting'	=> 'logistic_transport_mail',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('logistic_transport_time_icon',array(
		'default'	=> 'far fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Logistic_Transport_Icon_Changer(
        $wp_customize, 'logistic_transport_time_icon',array(
		'label'	=> __('Time Icon','logistic-transport'),
		'section'	=> 'logistic_transport_header',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('logistic_transport_time',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('logistic_transport_time',array(
		'label'	=> __('Time','logistic-transport'),
		'section'	=> 'logistic_transport_header',
		'setting'	=> 'logistic_transport_time',
		'type'	=> 'text'
	));

	$wp_customize->selective_refresh->add_partial(
		'logistic_transport_request_btn_text',
		array(
			'selector'        => '.request-btn a',
			'render_callback' => 'logistic_transport_customize_partial_logistic_transport_request_btn_text',
		)
	);

	$wp_customize->add_setting('logistic_transport_request_btn_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('logistic_transport_request_btn_text',array(
		'label'	=> __('Add Button Text','logistic-transport'),
		'section'	=> 'logistic_transport_header',
		'setting'	=> 'logistic_transport_request_btn_text',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('logistic_transport_request_btn_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('logistic_transport_request_btn_url',array(
		'label'	=> __('Add Button url','logistic-transport'),
		'section'	=> 'logistic_transport_header',
		'setting'	=> 'logistic_transport_request_btn_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('logistic_transport_navigation_case',array(
        'default' => 'capitalize',
        'sanitize_callback' => 'logistic_transport_sanitize_choices'
	));
	$wp_customize->add_control('logistic_transport_navigation_case',array(
        'type' => 'select',
        'label' => __('Navigation Case','logistic-transport'),
        'section' => 'logistic_transport_header',
        'choices' => array(
            'uppercase' => __('Uppercase','logistic-transport'),
            'capitalize' => __('Capitalize','logistic-transport'),
        ),
	) );

	$wp_customize->add_setting( 'logistic_transport_nav_font_size', array(
		'default'           => 15,
		'sanitize_callback' => 'logistic_transport_sanitize_float',
	) );
	$wp_customize->add_control( 'logistic_transport_nav_font_size', array(
		'label' => __( 'Navigation Font Size','logistic-transport' ),
		'section'     => 'logistic_transport_header',
		'type'        => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 50,
		),
	) );

	$wp_customize->add_setting('logistic_transport_font_weight_menu_option',array(
        'default' => 'Defalt',
        'sanitize_callback' => 'logistic_transport_sanitize_choices'
    ));
    $wp_customize->add_control('logistic_transport_font_weight_menu_option',array(
        'type' => 'select',
        'label' => __('Navigation Font Weight','logistic-transport'),
        'section' => 'logistic_transport_header',
        'choices' => array(
            '100' => __('100','logistic-transport'),
            '200' => __('200','logistic-transport'),
            '300' => __('300','logistic-transport'),
            '400' => __('400','logistic-transport'),
            'Defalt' => __('500','logistic-transport'),
            '600' => __('600','logistic-transport'),
            '700' => __('700','logistic-transport'),
            '800' => __('800','logistic-transport'),
            '900' => __('900','logistic-transport'),
        ),
	) );

	// Preloader
	$wp_customize->add_setting( 'logistic_transport_preloader_hide',array(
		'default' => false,
      	'sanitize_callback'	=> 'logistic_transport_sanitize_checkbox'
    ) );
    $wp_customize->add_control('logistic_transport_preloader_hide',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Preloader','logistic-transport' ),
        'section' => 'logistic_transport_header'
    ));

    $wp_customize->add_setting('logistic_transport_preloader_type',array(
        'default'   => 'center-square',
        'sanitize_callback' => 'logistic_transport_sanitize_choices'
	));
	$wp_customize->add_control( 'logistic_transport_preloader_type', array(
		'label' => __( 'Preloader Type','logistic-transport' ),
		'section' => 'logistic_transport_header',
		'type'  => 'select',
		'settings' => 'logistic_transport_preloader_type',
		'choices' => array(
		    'center-square' => __('Center Square','logistic-transport'),
		    'chasing-square' => __('Chasing Square','logistic-transport'),
	    ),
	));

	$wp_customize->add_setting( 'logistic_transport_preloader_color', array(
	    'default' => '#333333',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'logistic_transport_preloader_color', array(
  		'label' => 'Preloader Color',
	    'section' => 'logistic_transport_header',
	    'settings' => 'logistic_transport_preloader_color',
  	)));

  	$wp_customize->add_setting( 'logistic_transport_preloader_bg_color', array(
	    'default' => '#fff',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'logistic_transport_preloader_bg_color', array(
  		'label' => 'Preloader Background Color',
	    'section' => 'logistic_transport_header',
	    'settings' => 'logistic_transport_preloader_bg_color',
  	)));

  	$wp_customize->add_setting('logistic_transport_menu_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'logistic_transport_menu_color', array(
		'label'    => __('Menu Color', 'logistic-transport'),
		'section'  => 'logistic_transport_header',
		'settings' => 'logistic_transport_menu_color',
	)));

	$wp_customize->add_setting('logistic_transport_menu_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'logistic_transport_menu_hover_color', array(
		'label'    => __('Menu Hover Color', 'logistic-transport'),
		'section'  => 'logistic_transport_header',
		'settings' => 'logistic_transport_menu_hover_color',
	)));

	$wp_customize->add_setting('logistic_transport_submenu_menu_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'logistic_transport_submenu_menu_color', array(
		'label'    => __('Submenu Color', 'logistic-transport'),
		'section'  => 'logistic_transport_header',
		'settings' => 'logistic_transport_submenu_menu_color',
	)));

	$wp_customize->add_setting( 'logistic_transport_submenu_hover_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'logistic_transport_submenu_hover_color', array(
  		'label' => __('Submenu Hover Color', 'logistic-transport'),
	    'section' => 'logistic_transport_header',
	    'settings' => 'logistic_transport_submenu_hover_color',
  	)));

	//home page slider
	$wp_customize->add_section( 'logistic_transport_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'logistic-transport' ),
		'priority'   => null,
		'panel' => 'logistic_transport_panel_id'
	) );

	$wp_customize->selective_refresh->add_partial(
		'logistic_transport_slider_hide_show',
		array(
			'selector'        => '#slider .inner_carousel h1',
			'render_callback' => 'logistic_transport_customize_partial_logistic_transport_slider_hide_show',
		)
	);

	$wp_customize->add_setting('logistic_transport_slider_hide_show',array(
       'default' => false,
       'sanitize_callback'	=> 'logistic_transport_sanitize_checkbox'
	));
	$wp_customize->add_control('logistic_transport_slider_hide_show',array(
	   'type' => 'checkbox',
	   'label' => __('Show / Hide slider','logistic-transport'),
	   'section' => 'logistic_transport_slidersettings',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'logistic_transport_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'logistic_transport_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'logistic_transport_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'logistic-transport' ),
			'section'  => 'logistic_transport_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting('logistic_transport_slider_title',array(
       'default' => 'true',
       'sanitize_callback'	=> 'logistic_transport_sanitize_checkbox'
	));
	$wp_customize->add_control('logistic_transport_slider_title',array(
	   'type' => 'checkbox',
	   'label' => __('Show / Hide slider Title','logistic-transport'),
	   'section' => 'logistic_transport_slidersettings',
	));

	$wp_customize->add_setting('logistic_transport_slider_content',array(
       'default' => 'true',
       'sanitize_callback'	=> 'logistic_transport_sanitize_checkbox'
	));
	$wp_customize->add_control('logistic_transport_slider_content',array(
	   'type' => 'checkbox',
	   'label' => __('Show / Hide slider Content','logistic-transport'),
	   'section' => 'logistic_transport_slidersettings',
	));

	$wp_customize->add_setting('logistic_transport_slider_button',array(
       'default' => 'true',
       'sanitize_callback'	=> 'logistic_transport_sanitize_checkbox'
	));
	$wp_customize->add_control('logistic_transport_slider_button',array(
	   'type' => 'checkbox',
	   'label' => __('Show / Hide slider Button','logistic-transport'),
	   'section' => 'logistic_transport_slidersettings',
	));

    //Slider excerpt
	$wp_customize->add_setting( 'logistic_transport_slider_excerpt', array(
		'default'              => 15,
		'sanitize_callback'    => 'logistic_transport_sanitize_float',
	) );
	$wp_customize->add_control( 'logistic_transport_slider_excerpt', array(
		'label' => esc_html__( 'Slider Excerpt length','logistic-transport' ),
		'section'     => 'logistic_transport_slidersettings',
		'type'        => 'number',
		'settings'    => 'logistic_transport_slider_excerpt',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 50,
		),
	) );

	$wp_customize->add_setting( 'logistic_transport_slider_button_text', array(
		'default'   => __('Read More','logistic-transport' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'logistic_transport_slider_button_text', array(
		'label'    => __( 'Slider Button text','logistic-transport' ),
		'section'  => 'logistic_transport_slidersettings',
		'type'     => 'text',
		'settings' => 'logistic_transport_slider_button_text'
	) );

	$wp_customize->add_setting('logistic_transport_slider_image_overlay',array(
        'default' => true,
        'sanitize_callback'	=> 'logistic_transport_sanitize_checkbox'
	));
	$wp_customize->add_control('logistic_transport_slider_image_overlay',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Slider Image Overlay','logistic-transport'),
      	'section' => 'logistic_transport_slidersettings'
	));

	$wp_customize->add_setting( 'logistic_transport_slider_overlay_color', array(
	    'default' => '#1d2027',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'logistic_transport_slider_overlay_color', array(
	    'label' => __('Slider Overlay Color', 'logistic-transport'),
	    'section' => 'logistic_transport_slidersettings'
  	)));

	//Opacity
	$wp_customize->add_setting('logistic_transport_slider_opacity',array(
        'default'   => 0.5,
        'sanitize_callback' => 'logistic_transport_sanitize_choices'
	));
	$wp_customize->add_control( 'logistic_transport_slider_opacity', array(
		'label'       => esc_html__( 'Slider Image Opacity','logistic-transport' ),
		'section'    => 'logistic_transport_slidersettings',
		'type'        => 'select',
		'settings'   => 'logistic_transport_slider_opacity',
		'choices' => array(
	      '0' =>  esc_attr('0','logistic-transport'),
	      '0.1' =>  esc_attr('0.1','logistic-transport'),
	      '0.2' =>  esc_attr('0.2','logistic-transport'),
	      '0.3' =>  esc_attr('0.3','logistic-transport'),
	      '0.4' =>  esc_attr('0.4','logistic-transport'),
	      '0.5' =>  esc_attr('0.5','logistic-transport'),
	      '0.6' =>  esc_attr('0.6','logistic-transport'),
	      '0.7' =>  esc_attr('0.7','logistic-transport'),
	      '0.8' =>  esc_attr('0.8','logistic-transport'),
	      '0.9' =>  esc_attr('0.9','logistic-transport')
	  ),
	));

	//content Alignment
    $wp_customize->add_setting('logistic_transport_slider_content_option',array(
    	'default' => 'Left',
        'sanitize_callback' => 'logistic_transport_sanitize_choices'
	));
	$wp_customize->add_control('logistic_transport_slider_content_option',array(
        'type' => 'select',
        'label' => __('Slider Content Alignment','logistic-transport'),
        'section' => 'logistic_transport_slidersettings',
        'choices' => array(
            'Center' => __('Center','logistic-transport'),
            'Left' => __('Left','logistic-transport'),
            'Right' => __('Right','logistic-transport'),
        ),
	) );

	$wp_customize->add_setting('logistic_transport_content_spacing',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('logistic_transport_content_spacing',array(
		'label'	=> esc_html__('Slider Content Spacing','logistic-transport'),
		'section'=> 'logistic_transport_slidersettings',
	));

	$wp_customize->add_setting( 'logistic_transport_slider_top_spacing', array(
		'default'  => '',
		'sanitize_callback'	=> 'logistic_transport_sanitize_float'
	) );
	$wp_customize->add_control( 'logistic_transport_slider_top_spacing', array(
		'label' => esc_html__( 'Top','logistic-transport' ),
		'section' => 'logistic_transport_slidersettings',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
		),
	) );

	$wp_customize->add_setting( 'logistic_transport_slider_bottom_spacing', array(
		'default'  => '',
		'sanitize_callback'	=> 'logistic_transport_sanitize_float'
	) );
	$wp_customize->add_control( 'logistic_transport_slider_bottom_spacing', array(
		'label' => esc_html__( 'Bottom','logistic-transport' ),
		'section' => 'logistic_transport_slidersettings',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
		),
	) );

	$wp_customize->add_setting( 'logistic_transport_slider_left_spacing', array(
		'default'  => '',
		'sanitize_callback'	=> 'logistic_transport_sanitize_float'
	) );
	$wp_customize->add_control( 'logistic_transport_slider_left_spacing', array(
		'label' => esc_html__( 'Left','logistic-transport'),
		'section' => 'logistic_transport_slidersettings',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
		),
	) );

	$wp_customize->add_setting( 'logistic_transport_slider_right_spacing', array(
		'default'  => '',
		'sanitize_callback'	=> 'logistic_transport_sanitize_float'
	) );
	$wp_customize->add_control( 'logistic_transport_slider_right_spacing', array(
		'label' => esc_html__('Right','logistic-transport'),
		'section' => 'logistic_transport_slidersettings',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
		),
	) );

	$wp_customize->add_setting( 'logistic_transport_slider_speed', array(
		'default'  => 3000,
		'sanitize_callback'	=> 'logistic_transport_sanitize_float'
	) );
	$wp_customize->add_control( 'logistic_transport_slider_speed', array(
		'label' => esc_html__('Slider Speed','logistic-transport'),
		'section' => 'logistic_transport_slidersettings',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 500,
			'min' => 500,
			'max' => 5000,
		),
	) );

	$wp_customize->add_setting( 'logistic_transport_slider_height', array(
		'default'  => ' ',
		'sanitize_callback'	=> 'logistic_transport_sanitize_float'
	) );
	$wp_customize->add_control( 'logistic_transport_slider_height', array(
		'label' => esc_html__('Slider Height','logistic-transport'),
		'section' => 'logistic_transport_slidersettings',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 5,
			'min' => 500,
			'max' => 1000,
		),
	) );

	//Services
	$wp_customize->add_section('logistic_transport_services',array(
		'title'	=> __('Services Section','logistic-transport'),
		'panel' => 'logistic_transport_panel_id',
	));	

	$wp_customize->selective_refresh->add_partial(
		'logistic_transport_services_category',
		array(
			'selector'        => '#services .service-box',
			'render_callback' => 'logistic_transport_customize_partial_logistic_transport_services_category',
		)
	);

	$categories = get_categories();
		$cat_posts = array();
			$i = 0;
			$cat_posts[]='Select';	
		foreach($categories as $category){
			if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('logistic_transport_services_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'logistic_transport_sanitize_choices',
	));
	$wp_customize->add_control('logistic_transport_services_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select Category to display Latest Post','logistic-transport'),
		'description'=> __('Size of image should be 80 x 80 ','logistic-transport'),
		'section' => 'logistic_transport_services',
	));

	$wp_customize->add_setting( 'logistic_transport_services_button_text', array(
		'default'   => __('LEARN MORE','logistic-transport' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'logistic_transport_services_button_text', array(
		'label'    => __( 'Services Button text','logistic-transport' ),
		'section'  => 'logistic_transport_services',
		'type'     => 'text',
		'settings' => 'logistic_transport_services_button_text'
	) );

	//About More
	$wp_customize->add_section('logistic_transport_discover',array(
		'title'	=> __('About Section','logistic-transport'),
		'panel' => 'logistic_transport_panel_id',
	));

	$wp_customize->selective_refresh->add_partial(
		'logistic_transport_discover_post',
		array(
			'selector'        => '#about h2',
			'render_callback' => 'logistic_transport_customize_partial_logistic_transport_discover_post',
		)
	);

	$args = array('numberposts' => -1);
	$post_list = get_posts($args);
	$i = 0;
	$posts[]='Select';	
	foreach($post_list as $post){
		$posts[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('logistic_transport_discover_post',array(
		'sanitize_callback' => 'logistic_transport_sanitize_choices',
	));
	$wp_customize->add_control('logistic_transport_discover_post',array(
		'type'    => 'select',
		'choices' => $posts,
		'label' => __('Select post','logistic-transport'),
		'section' => 'logistic_transport_discover',
	));

	$wp_customize->add_setting( 'logistic_transport_discover_post_excerpt_length', array(
		'default'              => 60,
		'sanitize_callback'	=> 'logistic_transport_sanitize_float'
	) );
	$wp_customize->add_control( 'logistic_transport_discover_post_excerpt_length', array(
		'label' => esc_html__( 'Post Excerpt Length','logistic-transport' ),
		'section'  => 'logistic_transport_discover',
		'type'  => 'number',
		'settings' => 'logistic_transport_discover_post_excerpt_length',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 60,
		),
	) );

	//Blog Post
	$wp_customize->add_section('logistic_transport_blog_post',array(
		'title'	=> __('Post Settings','logistic-transport'),
		'panel' => 'logistic_transport_panel_id',
	));	

	$wp_customize->add_setting('logistic_transport_date_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'logistic_transport_sanitize_checkbox'
    ));
    $wp_customize->add_control('logistic_transport_date_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Date','logistic-transport'),
       'section' => 'logistic_transport_blog_post'
    ));

    $wp_customize->add_setting('logistic_transport_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new logistic_transport_Icon_Changer(
        $wp_customize,'logistic_transport_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','logistic-transport'),
		'transport' => 'refresh',
		'section'	=> 'logistic_transport_blog_post',
		'setting'	=> 'logistic_transport_postdate_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('logistic_transport_author_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'logistic_transport_sanitize_checkbox'
    ));
    $wp_customize->add_control('logistic_transport_author_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Author','logistic-transport'),
       'section' => 'logistic_transport_blog_post'
    ));

    $wp_customize->add_setting('logistic_transport_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new logistic_transport_Icon_Changer(
        $wp_customize,'logistic_transport_author_icon',array(
		'label'	=> __('Add Post Author Icon','logistic-transport'),
		'transport' => 'refresh',
		'section'	=> 'logistic_transport_blog_post',
		'setting'	=> 'logistic_transport_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('logistic_transport_comment_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'logistic_transport_sanitize_checkbox'
    ));
    $wp_customize->add_control('logistic_transport_comment_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Comments','logistic-transport'),
       'section' => 'logistic_transport_blog_post'
    ));

    $wp_customize->add_setting('logistic_transport_comment_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new logistic_transport_Icon_Changer(
        $wp_customize,'logistic_transport_comment_icon',array(
		'label'	=> __('Add Post Comment Icon','logistic-transport'),
		'transport' => 'refresh',
		'section'	=> 'logistic_transport_blog_post',
		'setting'	=> 'logistic_transport_comment_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('logistic_transport_time_hide',array(
       'default' => false,
       'sanitize_callback'	=> 'logistic_transport_sanitize_checkbox'
    ));
    $wp_customize->add_control('logistic_transport_time_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Time','logistic-transport'),
       'section' => 'logistic_transport_blog_post'
    ));

    $wp_customize->add_setting('logistic_transport_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new logistic_transport_Icon_Changer(
        $wp_customize,'logistic_transport_time_icon',array(
		'label'	=> __('Add Post Time Icon','logistic-transport'),
		'transport' => 'refresh',
		'section'	=> 'logistic_transport_blog_post',
		'setting'	=> 'logistic_transport_time_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('logistic_transport_feature_image_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'logistic_transport_sanitize_checkbox'
    ));
    $wp_customize->add_control('logistic_transport_feature_image_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Featured Image','logistic-transport'),
       'section' => 'logistic_transport_blog_post'
    ));

    $wp_customize->add_setting( 'logistic_transport_featured_image_border_radius', array(
		'default' => 0,
		'sanitize_callback'	=> 'logistic_transport_sanitize_float'
	) );
	$wp_customize->add_control( 'logistic_transport_featured_image_border_radius', array(
		'label' => __( 'Featured image border radius','logistic-transport' ),
		'section' => 'logistic_transport_blog_post',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min'  => 0,
			'max'  => 50,
		),
	) );

    $wp_customize->add_setting( 'logistic_transport_featured_image_box_shadow', array(
		'default' => 0,
		'sanitize_callback'	=> 'logistic_transport_sanitize_float'
	) );
	$wp_customize->add_control( 'logistic_transport_featured_image_box_shadow', array(
		'label' => __( 'Featured image box shadow','logistic-transport' ),
		'section' => 'logistic_transport_blog_post',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min'  => 0,
			'max'  => 50,
		),
	) );

	$wp_customize->add_setting('logistic_transport_metabox_seperator',array(
       'default' => '|',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('logistic_transport_metabox_seperator',array(
       'type' => 'text',
       'label' => __('Metabox Seperator','logistic-transport'),
       'description' => __('Ex: "/", "|", "-", ...','logistic-transport'),
       'section' => 'logistic_transport_blog_post'
    ));

    $wp_customize->add_setting('logistic_transport_post_content',array(
    	'default' => 'Excerpt Content',
        'sanitize_callback' => 'logistic_transport_sanitize_choices'
	));
	$wp_customize->add_control('logistic_transport_post_content',array(
        'type' => 'radio',
        'label' => __('Post Content Type','logistic-transport'),
        'section' => 'logistic_transport_blog_post',
        'choices' => array(
            'No Content' => __('No Content','logistic-transport'),
            'Full Content' => __('Full Content','logistic-transport'),
            'Excerpt Content' => __('Excerpt Content','logistic-transport'),
        ),
	) );

    $wp_customize->add_setting( 'logistic_transport_post_excerpt_length', array(
		'default'              => 20,
		'sanitize_callback'	=> 'logistic_transport_sanitize_float'
	) );
	$wp_customize->add_control( 'logistic_transport_post_excerpt_length', array(
		'label' => esc_html__( 'Post Excerpt Length','logistic-transport' ),
		'section'  => 'logistic_transport_blog_post',
		'type'  => 'number',
		'settings' => 'logistic_transport_post_excerpt_length',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'logistic_transport_button_excerpt_suffix', array(
		'default'   => __('[...]','logistic-transport' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'logistic_transport_button_excerpt_suffix', array(
		'label'       => esc_html__( 'Excerpt Suffix','logistic-transport' ),
		'section'     => 'logistic_transport_blog_post',
		'type'        => 'text',
		'settings' => 'logistic_transport_button_excerpt_suffix'
	) );

	$wp_customize->add_setting( 'logistic_transport_post_button_text', array(
		'default'   => esc_html__('Read More','logistic-transport' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'logistic_transport_post_button_text', array(
		'label' => esc_html__('Post Button Text','logistic-transport' ),
		'section'     => 'logistic_transport_blog_post',
		'type'        => 'text',
		'settings'    => 'logistic_transport_post_button_text'
	) );

	$wp_customize->add_setting('logistic_transport_top_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'logistic_transport_sanitize_float'
	));
	$wp_customize->add_control('logistic_transport_top_button_padding',array(
		'label'	=> __('Top Bottom Button Padding','logistic-transport'),
		'input_attrs' => array(
            'step' => 1,
			'min'  => 0,
			'max'  => 50,
        ),
		'section'=> 'logistic_transport_blog_post',
		'type'=> 'number',
	));

	$wp_customize->add_setting('logistic_transport_left_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'logistic_transport_sanitize_float'
	));
	$wp_customize->add_control('logistic_transport_left_button_padding',array(
		'label'	=> __('Left Right Button Padding','logistic-transport'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'logistic_transport_blog_post',
		'type'=> 'number',
	));

	$wp_customize->add_setting( 'logistic_transport_button_border_radius', array(
		'default'=> '0',
		'sanitize_callback'	=> 'logistic_transport_sanitize_float'
	) );
	$wp_customize->add_control('logistic_transport_button_border_radius', array(
        'label'  => __('Button Border Radius','logistic-transport'),
        'type'=> 'number',
        'section'  => 'logistic_transport_blog_post',
        'input_attrs' => array(
        	'step' => 1,
            'min' => 0,
            'max' => 50,
        ),
    ));

    $wp_customize->add_setting( 'logistic_transport_post_blocks', array(
        'default'			=> 'Without box',
        'sanitize_callback'	=> 'logistic_transport_sanitize_choices'
    ));
    $wp_customize->add_control( 'logistic_transport_post_blocks', array(
        'section' => 'logistic_transport_blog_post',
        'type' => 'select',
        'label' => __( 'Post blocks', 'logistic-transport' ),
        'choices' => array(
            'Within box'  => __( 'Within box', 'logistic-transport' ),
            'Without box' => __( 'Without box', 'logistic-transport' ),
    )));

    $wp_customize->add_setting('logistic_transport_navigation_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'logistic_transport_sanitize_checkbox'
    ));
    $wp_customize->add_control('logistic_transport_navigation_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Navigation','logistic-transport'),
       'section' => 'logistic_transport_blog_post'
    ));

    $wp_customize->add_setting( 'logistic_transport_post_navigation_type', array(
        'default'			=> 'numbers',
        'sanitize_callback'	=> 'logistic_transport_sanitize_choices'
    ));
    $wp_customize->add_control( 'logistic_transport_post_navigation_type', array(
        'section' => 'logistic_transport_blog_post',
        'type' => 'select',
        'label' => __( 'Post Navigation Type', 'logistic-transport' ),
        'choices' => array(
            'numbers'  => __( 'Number', 'logistic-transport' ),
            'next-prev' => __( 'Next/Prev Button', 'logistic-transport' ),
    )));

    $wp_customize->add_setting( 'logistic_transport_post_navigation_position', array(
        'default'			=> 'bottom',
        'sanitize_callback'	=> 'logistic_transport_sanitize_choices'
    ));
    $wp_customize->add_control( 'logistic_transport_post_navigation_position', array(
        'section' => 'logistic_transport_blog_post',
        'type' => 'select',
        'label' => __( 'Post Navigation Position', 'logistic-transport' ),
        'choices' => array(
            'top'  => __( 'Top', 'logistic-transport' ),
            'bottom' => __( 'Bottom', 'logistic-transport' ),
            'both' => __( 'Both', 'logistic-transport' ),
    )));

    //Single Post Settings
	$wp_customize->add_section('logistic_transport_single_post',array(
		'title'	=> __('Single Post Settings','logistic-transport'),
		'panel' => 'logistic_transport_panel_id',
	));	

	$wp_customize->add_setting( 'logistic_transport_single_post_breadcrumb',array(
		'default' => true,
		'transport' => 'refresh',
      	'sanitize_callback'	=> 'logistic_transport_sanitize_checkbox'
    ) );
    $wp_customize->add_control('logistic_transport_single_post_breadcrumb',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Single Post Breadcrumb','logistic-transport' ),
        'section' => 'logistic_transport_single_post'
    ));

	$wp_customize->add_setting('logistic_transport_single_post_date',array(
       'default' => 'true',
       'sanitize_callback'	=> 'logistic_transport_sanitize_checkbox'
    ));
    $wp_customize->add_control('logistic_transport_single_post_date',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Date','logistic-transport'),
       'section' => 'logistic_transport_single_post'
    ));

    $wp_customize->add_setting('logistic_transport_single_post_author',array(
       'default' => 'true',
       'sanitize_callback'	=> 'logistic_transport_sanitize_checkbox'
    ));
    $wp_customize->add_control('logistic_transport_single_post_author',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Author','logistic-transport'),
       'section' => 'logistic_transport_single_post'
    ));

    $wp_customize->add_setting('logistic_transport_single_post_comment_no',array(
       'default' => 'true',
       'sanitize_callback'	=> 'logistic_transport_sanitize_checkbox'
    ));
    $wp_customize->add_control('logistic_transport_single_post_comment_no',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Comment Number','logistic-transport'),
       'section' => 'logistic_transport_single_post'
    ));

    $wp_customize->add_setting('logistic_transport_single_post_time_hide',array(
       'default' => false,
       'sanitize_callback'	=> 'logistic_transport_sanitize_checkbox'
    ));
    $wp_customize->add_control('logistic_transport_single_post_time_hide',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Time','logistic-transport'),
       'section' => 'logistic_transport_single_post'
    ));

    $wp_customize->add_setting('logistic_transport_feature_image',array(
       'default' => true,
       'sanitize_callback'	=> 'logistic_transport_sanitize_checkbox'
    ));
    $wp_customize->add_control('logistic_transport_feature_image',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Image','logistic-transport'),
       'section' => 'logistic_transport_single_post'
    ));

     $wp_customize->add_setting( 'logistic_transport_single_post_img_border_radius', array(
		'default'=> 0,
		'sanitize_callback'	=> 'logistic_transport_sanitize_float',
	) );
	$wp_customize->add_control( 'logistic_transport_single_post_img_border_radius', array(
		'label'       => esc_html__( 'Single Post Image Border Radius','logistic-transport' ),
		'section'     => 'logistic_transport_single_post',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 100,
		),
	) );

	$wp_customize->add_setting( 'logistic_transport_single_post_img_box_shadow',array(
		'default' => 0,
		'sanitize_callback'    => 'logistic_transport_sanitize_float',
	));
	$wp_customize->add_control('logistic_transport_single_post_img_box_shadow',array(
		'label' => esc_html__( 'Single Post Image Shadow','logistic-transport' ),
		'section' => 'logistic_transport_single_post',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type' => 'number'
	));

	$wp_customize->add_setting('logistic_transport_single_post_metabox_seperator',array(
       'default' => '|',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('logistic_transport_single_post_metabox_seperator',array(
       'type' => 'text',
       'label' => __('Metabox Seperator','logistic-transport'),
       'description' => __('Ex: "/", "|", "-", ...','logistic-transport'),
       'section' => 'logistic_transport_single_post'
    ));

    $wp_customize->add_setting('logistic_transport_show_hide_single_post_categories',array(
		'default' => true,
		'sanitize_callback'	=> 'logistic_transport_sanitize_checkbox'
 	));
 	$wp_customize->add_control('logistic_transport_show_hide_single_post_categories',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Single Post Categories','logistic-transport'),
		'section' => 'logistic_transport_single_post'
	));

	$wp_customize->add_setting('logistic_transport_category_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'logistic_transport_category_color', array(
		'label'    => __('Category Color', 'logistic-transport'),
		'section'  => 'logistic_transport_single_post',
	)));

	$wp_customize->add_setting('logistic_transport_category_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'logistic_transport_category_background_color', array(
		'label'    => __('Category Background Color', 'logistic-transport'),
		'section'  => 'logistic_transport_single_post',
	)));

	$wp_customize->add_setting('logistic_transport_tags',array(
       'default' => true,
       'sanitize_callback'	=> 'logistic_transport_sanitize_checkbox'
    ));
    $wp_customize->add_control('logistic_transport_tags',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Tags','logistic-transport'),
       'section' => 'logistic_transport_single_post'
    ));

    $wp_customize->add_setting('logistic_transport_comment',array(
       'default' => true,
       'sanitize_callback'	=> 'logistic_transport_sanitize_checkbox'
    ));
    $wp_customize->add_control('logistic_transport_comment',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Comment','logistic-transport'),
       'section' => 'logistic_transport_single_post'
    ));
	
    $wp_customize->add_setting( 'logistic_transport_comment_width', array(
		'default' => 100,
		'sanitize_callback'	=> 'logistic_transport_sanitize_float'
	) );
	$wp_customize->add_control( 'logistic_transport_comment_width', array(
		'label' => __( 'Comment Textarea Width', 'logistic-transport'),
		'section' => 'logistic_transport_single_post',
		'type' => 'number',
		'settings' => 'logistic_transport_comment_width',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
		),
	) );

    $wp_customize->add_setting('logistic_transport_comment_title',array(
       'default' => __('Leave a Reply','logistic-transport'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('logistic_transport_comment_title',array(
       'type' => 'text',
       'label' => __('Comment form Title','logistic-transport'),
       'section' => 'logistic_transport_single_post'
    ));

    $wp_customize->add_setting('logistic_transport_comment_submit_text',array(
       'default' => __('Post Comment','logistic-transport'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('logistic_transport_comment_submit_text',array(
       'type' => 'text',
       'label' => __('Comment Button Text','logistic-transport'),
       'section' => 'logistic_transport_single_post'
    ));

    $wp_customize->add_setting('logistic_transport_nav_links',array(
       'default' => true,
       'sanitize_callback'	=> 'logistic_transport_sanitize_checkbox'
    ));
    $wp_customize->add_control('logistic_transport_nav_links',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Nav Links','logistic-transport'),
       'section' => 'logistic_transport_single_post'
    ));

    $wp_customize->add_setting('logistic_transport_prev_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('logistic_transport_prev_text',array(
       'type' => 'text',
       'label' => __('Previous Navigation Text','logistic-transport'),
       'section' => 'logistic_transport_single_post'
    ));

    $wp_customize->add_setting('logistic_transport_next_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('logistic_transport_next_text',array(
       'type' => 'text',
       'label' => __('Next Navigation Text','logistic-transport'),
       'section' => 'logistic_transport_single_post'
    ));

    $wp_customize->add_setting('logistic_transport_related_posts',array(
       'default' => true,
       'sanitize_callback'	=> 'logistic_transport_sanitize_checkbox'
    ));
    $wp_customize->add_control('logistic_transport_related_posts',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Related Posts','logistic-transport'),
       'section' => 'logistic_transport_single_post'
    ));

    $wp_customize->add_setting('logistic_transport_related_posts_title',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('logistic_transport_related_posts_title',array(
       'type' => 'text',
       'label' => __('Related Posts Title','logistic-transport'),
       'section' => 'logistic_transport_single_post'
    ));

    $wp_customize->add_setting( 'logistic_transport_related_post_count', array(
		'default' => 3,
		'sanitize_callback'	=> 'logistic_transport_sanitize_float'
	) );
	$wp_customize->add_control( 'logistic_transport_related_post_count', array(
		'label' => esc_html__( 'Related Posts Count','logistic-transport' ),
		'section' => 'logistic_transport_single_post',
		'type' => 'number',
		'settings' => 'logistic_transport_related_post_count',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 6,
		),
	) );

    $wp_customize->add_setting( 'logistic_transport_post_order', array(
        'default' => 'categories',
        'sanitize_callback'	=> 'logistic_transport_sanitize_choices'
    ));
    $wp_customize->add_control( 'logistic_transport_post_order', array(
        'section' => 'logistic_transport_single_post',
        'type' => 'radio',
        'label' => __( 'Related Posts Order By', 'logistic-transport' ),
        'choices' => array(
            'categories' => __('Categories', 'logistic-transport'),
            'tags' => __( 'Tags', 'logistic-transport' ),
    )));

    //404 page settings
	$wp_customize->add_section('logistic_transport_404_page',array(
		'title'	=> __('404 & No Result Page Settings','logistic-transport'),
		'priority'	=> null,
		'panel' => 'logistic_transport_panel_id',
	));

	$wp_customize->add_setting('logistic_transport_404_title',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('logistic_transport_404_title',array(
       'type' => 'text',
       'label' => __('404 Page Title','logistic-transport'),
       'section' => 'logistic_transport_404_page'
    ));

    $wp_customize->add_setting('logistic_transport_404_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('logistic_transport_404_text',array(
       'type' => 'text',
       'label' => __('404 Page Text','logistic-transport'),
       'section' => 'logistic_transport_404_page'
    ));

    $wp_customize->add_setting('logistic_transport_404_button_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('logistic_transport_404_button_text',array(
       'type' => 'text',
       'label' => __('404 Page Button Text','logistic-transport'),
       'section' => 'logistic_transport_404_page'
    ));

    $wp_customize->add_setting('logistic_transport_no_result_title',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('logistic_transport_no_result_title',array(
       'type' => 'text',
       'label' => __('No Result Page Title','logistic-transport'),
       'section' => 'logistic_transport_404_page'
    ));

    $wp_customize->add_setting('logistic_transport_no_result_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('logistic_transport_no_result_text',array(
       'type' => 'text',
       'label' => __('No Result Page Text','logistic-transport'),
       'section' => 'logistic_transport_404_page'
    ));

    $wp_customize->add_setting('logistic_transport_show_search_form',array(
        'default' => true,
        'sanitize_callback'	=> 'logistic_transport_sanitize_checkbox'
	));
	$wp_customize->add_control('logistic_transport_show_search_form',array(
     	'type' => 'checkbox',
      	'label' => __('Show/Hide Search Form','logistic-transport'),
      	'section' => 'logistic_transport_404_page',
	));

	//Footer
	$wp_customize->add_section('logistic_transport_footer_section',array(
		'title'	=> __('Footer Section','logistic-transport'),
		'priority'	=> null,
		'panel' => 'logistic_transport_panel_id',
	));

	$wp_customize->selective_refresh->add_partial(
		'logistic_transport_show_back_to_top',
		array(
			'selector'        => '.scrollup',
			'render_callback' => 'logistic_transport_customize_partial_logistic_transport_show_back_to_top',
		)
	);

	$wp_customize->add_setting('logistic_transport_show_back_to_top',array(
        'default' => 'true',
        'sanitize_callback'	=> 'logistic_transport_sanitize_checkbox'
	));
	$wp_customize->add_control('logistic_transport_show_back_to_top',array(
     	'type' => 'checkbox',
      	'label' => __('Show/Hide Back to Top Button','logistic-transport'),
      	'section' => 'logistic_transport_footer_section',
	));

	$wp_customize->add_setting('logistic_transport_back_to_top_icon',array(
		'default'	=> 'fas fa-arrow-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Logistic_Transport_Icon_Changer(
        $wp_customize, 'logistic_transport_back_to_top_icon',array(
		'label'	=> __('Back to Top Icon','logistic-transport'),
		'section'	=> 'logistic_transport_footer_section',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('logistic_transport_scroll_icon_font_size',array(
		'default'=> 18,
		'sanitize_callback' => 'logistic_transport_sanitize_float'
	));
	$wp_customize->add_control('logistic_transport_scroll_icon_font_size',array(
		'label'	=> __('Back To Top Icon Font Size','logistic-transport'),
		'section'=> 'logistic_transport_footer_section',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	));

	$wp_customize->add_setting('logistic_transport_scroll_icon_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'logistic_transport_scroll_icon_color', array(
		'label'    => __('Back To Top Icon Color', 'logistic-transport'),
		'section'  => 'logistic_transport_footer_section',
	)));

	$wp_customize->add_setting('logistic_transport_back_to_top_text',array(
		'default'	=> __('Back to Top','logistic-transport'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));	
	$wp_customize->add_control('logistic_transport_back_to_top_text',array(
		'label'	=> __('Back to Top Button Text','logistic-transport'),
		'section'	=> 'logistic_transport_footer_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('logistic_transport_back_to_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'logistic_transport_sanitize_choices'
	));
	$wp_customize->add_control('logistic_transport_back_to_top_alignment',array(
        'type' => 'select',
        'label' => __('Back to Top Button Alignment','logistic-transport'),
        'section' => 'logistic_transport_footer_section',
        'choices' => array(
            'Left' => __('Left','logistic-transport'),
            'Right' => __('Right','logistic-transport'),
            'Center' => __('Center','logistic-transport'),
        ),
	) );

	$wp_customize->add_setting( 'logistic_transport_footer_hide_show',array(
      'default' => 'true',
      'sanitize_callback' => 'logistic_transport_sanitize_checkbox'
    ));
    $wp_customize->add_control('logistic_transport_footer_hide_show',array(
    	'type' => 'checkbox',
      'label' => esc_html__( 'Show / Hide Footer','logistic-transport' ),
      'section' => 'logistic_transport_footer_section'
    ));

	$wp_customize->add_setting('logistic_transport_footer_background_color', array(
		'default'           => '#1d2027',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'logistic_transport_footer_background_color', array(
		'label'    => __('Footer Background Color', 'logistic-transport'),
		'section'  => 'logistic_transport_footer_section',
	)));

	$wp_customize->add_setting('logistic_transport_footer_background_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'logistic_transport_footer_background_img',array(
        'label' => __('Footer Background Image','logistic-transport'),
        'section' => 'logistic_transport_footer_section'
	)));

	$wp_customize->add_setting('logistic_transport_footer_widget_layout',array(
        'default'           => '4',
        'sanitize_callback' => 'logistic_transport_sanitize_choices',
    ));
    $wp_customize->add_control('logistic_transport_footer_widget_layout',array(
        'type' => 'radio',
        'label'  => __('Footer widget layout', 'logistic-transport'),
        'section'     => 'logistic_transport_footer_section',
        'description' => __('Select the number of widget areas you want in the footer. After that, go to Appearance > Widgets and add your widgets.', 'logistic-transport'),
        'choices' => array(
            '1'     => __('One', 'logistic-transport'),
            '2'     => __('Two', 'logistic-transport'),
            '3'     => __('Three', 'logistic-transport'),
            '4'     => __('Four', 'logistic-transport')
        ),
    ));

    $wp_customize->add_setting('logistic_transport_footer_widgets_heading',array(
    'default' => 'Left',
    'transport' => 'refresh',
    'sanitize_callback' => 'logistic_transport_sanitize_choices'
	));
	$wp_customize->add_control('logistic_transport_footer_widgets_heading',array(
    'type' => 'select',
    'label' => __('Footer Widget Heading Alignment','logistic-transport'),
    'section' => 'logistic_transport_footer_section',
    'choices' => array(
    	'Left' => __('Left','logistic-transport'),
        'Center' => __('Center','logistic-transport'),
        'Right' => __('Right','logistic-transport')
      ),
	) );

	$wp_customize->add_setting('logistic_transport_footer_widgets_content',array(
    'default' => 'Left',
    'transport' => 'refresh',
    'sanitize_callback' => 'logistic_transport_sanitize_choices'
	));
	$wp_customize->add_control('logistic_transport_footer_widgets_content',array(
    'type' => 'select',
    'label' => __('Footer Widget Content Alignment','logistic-transport'),
    'section' => 'logistic_transport_footer_section',
    'choices' => array(
    	'Left' => __('Left','logistic-transport'),
        'Center' => __('Center','logistic-transport'),
        'Right' => __('Right','logistic-transport')
        ),
	) );

    $wp_customize->add_setting( 'logistic_transport_copyright_hide_show',array(
      'default' => 'true',
      'sanitize_callback' => 'logistic_transport_sanitize_checkbox'
    ));
    $wp_customize->add_control('logistic_transport_copyright_hide_show',array(
    	'type' => 'checkbox',
      'label' => esc_html__( 'Show / Hide Copyright','logistic-transport' ),
      'section' => 'logistic_transport_footer_section'
    ));

    $wp_customize->add_setting('logistic_transport_copyright_alignment',array(
        'default' => 'Center',
        'sanitize_callback' => 'logistic_transport_sanitize_choices'
	));
	$wp_customize->add_control('logistic_transport_copyright_alignment',array(
        'type' => 'select',
        'label' => __('Copyright Alignment','logistic-transport'),
        'section' => 'logistic_transport_footer_section',
        'choices' => array(
            'Left' => __('Left','logistic-transport'),
            'Right' => __('Right','logistic-transport'),
            'Center' => __('Center','logistic-transport'),
        ),
	) );

	$wp_customize->add_setting('logistic_transport_copyright_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'logistic_transport_copyright_color', array(
		'label'    => __('Copyright Color', 'logistic-transport'),
		'section'  => 'logistic_transport_footer_section',
	)));

	$wp_customize->add_setting('logistic_transport_copyright__hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'logistic_transport_copyright__hover_color', array(
		'label'    => __('Copyright Hover Color', 'logistic-transport'),
		'section'  => 'logistic_transport_footer_section',
	)));

	$wp_customize->add_setting('logistic_transport_copyright_fontsize',array(
		'default'	=> 16,
		'sanitize_callback'	=> 'logistic_transport_sanitize_float',
	));	
	$wp_customize->add_control('logistic_transport_copyright_fontsize',array(
		'label'	=> __('Copyright Font Size','logistic-transport'),
		'section'	=> 'logistic_transport_footer_section',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('logistic_transport_copyright_top_bottom_padding',array(
		'default'	=> 15,
		'sanitize_callback'	=> 'logistic_transport_sanitize_float',
	));	
	$wp_customize->add_control('logistic_transport_copyright_top_bottom_padding',array(
		'label'	=> __('Copyright Top Bottom Padding','logistic-transport'),
		'section'	=> 'logistic_transport_footer_section',
		'type'		=> 'number'
	));

    $wp_customize->selective_refresh->add_partial(
		'logistic_transport_footer_copy',
		array(
			'selector'        => '#footer p',
			'render_callback' => 'logistic_transport_customize_partial_logistic_transport_footer_copy',
		)
	);
	
	$wp_customize->add_setting('logistic_transport_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));	
	$wp_customize->add_control('logistic_transport_footer_copy',array(
		'label'	=> __('Copyright Text','logistic-transport'),
		'section'	=> 'logistic_transport_footer_section',
		'type'		=> 'text'
	));

	//Copyright Background Color
    $wp_customize->add_setting('logistic_transport_copyright_background_color', array(
		'default'           => '#1d2027',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'logistic_transport_copyright_background_color', array(
		'label'    => __('Copyright Background Color', 'logistic-transport'),
		'section'  => 'logistic_transport_footer_section',
	)));


	//Mobile Media Section
	$wp_customize->add_section( 'logistic_transport_mobile_media_options' , array(
    	'title'      => __( 'Mobile Media Options', 'logistic-transport' ),
		'priority'   => null,
		'panel' => 'logistic_transport_panel_id'
	) );

	$wp_customize->add_setting('logistic_transport_responsive_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Logistic_Transport_Icon_Changer(
        $wp_customize, 'logistic_transport_responsive_open_menu_icon',array(
		'label'	=> __('Open Menu Icon','logistic-transport'),
		'section'	=> 'logistic_transport_mobile_media_options',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'logistic_transport_menu_color_setting', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'logistic_transport_menu_color_setting', array(
  		'label' => __('Menu Icon Color Option', 'logistic-transport'),
		'section' => 'logistic_transport_mobile_media_options',
		'settings' => 'logistic_transport_menu_color_setting',
  	)));

	$wp_customize->add_setting('logistic_transport_responsive_close_menu_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Logistic_Transport_Icon_Changer(
        $wp_customize, 'logistic_transport_responsive_close_menu_icon',array(
		'label'	=> __('Close Menu Icon','logistic-transport'),
		'section'	=> 'logistic_transport_mobile_media_options',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'logistic_transport_responsive_topbar_hide',array(
		'default' => false,
      	'sanitize_callback'	=> 'logistic_transport_sanitize_checkbox'
    ) );
    $wp_customize->add_control('logistic_transport_responsive_topbar_hide',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Topbar','logistic-transport' ),
        'section' => 'logistic_transport_mobile_media_options'
    ));

    $wp_customize->add_setting('logistic_transport_mobile_media_slider',array(
       'default' => false,
       'sanitize_callback'	=> 'logistic_transport_sanitize_checkbox'
    ));
    $wp_customize->add_control('logistic_transport_mobile_media_slider',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Slider','logistic-transport'),
       'section' => 'logistic_transport_mobile_media_options'
    ));

    $wp_customize->add_setting('logistic_transport_slider_button_responsive',array(
		'default' => true,
		'sanitize_callback'	=> 'logistic_transport_sanitize_checkbox'
	));
	$wp_customize->add_control('logistic_transport_slider_button_responsive',array(
     	'type' => 'checkbox',
	   	'label' => __('Show / Hide Slider Button','logistic-transport'),
	   	'section' => 'logistic_transport_mobile_media_options'
	));	

    $wp_customize->add_setting('logistic_transport_responsive_show_back_to_top',array(
        'default' => true,
        'sanitize_callback'	=> 'logistic_transport_sanitize_checkbox'
	));
	$wp_customize->add_control('logistic_transport_responsive_show_back_to_top',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Back to Top Button','logistic-transport'),
      	'section' => 'logistic_transport_mobile_media_options',
	));

	$wp_customize->add_setting( 'logistic_transport_responsive_preloader_hide',array(
		'default' => false,
      	'sanitize_callback'	=> 'logistic_transport_sanitize_checkbox'
    ) );
    $wp_customize->add_control('logistic_transport_responsive_preloader_hide',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Preloader','logistic-transport' ),
        'section' => 'logistic_transport_mobile_media_options'
    ));

    $wp_customize->add_setting( 'logistic_transport_responsive_sticky_header',array(
		'default' => false,
      	'sanitize_callback'	=> 'logistic_transport_sanitize_checkbox'
    ) );
    $wp_customize->add_control('logistic_transport_responsive_sticky_header',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Sticky header','logistic-transport' ),
        'section' => 'logistic_transport_mobile_media_options'
    ));

    $wp_customize->add_setting( 'logistic_transport_sidebar_hide_show',array(
      'default' => true,
      'sanitize_callback'	=> 'logistic_transport_sanitize_checkbox'
    ));
    $wp_customize->add_control('logistic_transport_sidebar_hide_show',array(
      'type' => 'checkbox',
      'label' => esc_html__( 'Enable Sidebar','logistic-transport' ),
      'section' => 'logistic_transport_mobile_media_options'
    ));

	//Woocommerce Section
	$wp_customize->add_section( 'logistic_transport_woocommerce_options' , array(
    	'title'      => __( 'Additional WooCommerce Options', 'logistic-transport' ),
		'priority'   => null,
		'panel' => 'logistic_transport_panel_id'
	) );

	// Product Columns
	$wp_customize->add_setting( 'logistic_transport_products_per_row' , array(
		'default'           => '3',
		'sanitize_callback' => 'logistic_transport_sanitize_choices',
	) );

	$wp_customize->add_control('logistic_transport_products_per_row', array(
		'label' => __( 'Product per row', 'logistic-transport' ),
		'section'  => 'logistic_transport_woocommerce_options',
		'type'     => 'select',
		'choices'  => array(
			'2' => '2',
			'3' => '3',
			'4' => '4',
		),
	) );

	$wp_customize->add_setting('logistic_transport_product_per_page',array(
		'default'	=> '9',
		'sanitize_callback'	=> 'logistic_transport_sanitize_float'
	));	
	$wp_customize->add_control('logistic_transport_product_per_page',array(
		'label'	=> __('Product per page','logistic-transport'),
		'section'	=> 'logistic_transport_woocommerce_options',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('logistic_transport_shop_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'logistic_transport_sanitize_checkbox'
    ));
    $wp_customize->add_control('logistic_transport_shop_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Shop page sidebar','logistic-transport'),
       'section' => 'logistic_transport_woocommerce_options',
    ));

    // shop page sidebar alignment
    $wp_customize->add_setting('logistic_transport_shop_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'logistic_transport_sanitize_choices',
	));
	$wp_customize->add_control('logistic_transport_shop_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Shop Page layout', 'logistic-transport'),
		'section'        => 'logistic_transport_woocommerce_options',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'logistic-transport'),
			'Right Sidebar' => __('Right Sidebar', 'logistic-transport'),
		),
	));

	$wp_customize->add_setting( 'logistic_transport_wocommerce_single_page_sidebar',array(
		'default' => true,
		'sanitize_callback'	=> 'logistic_transport_sanitize_checkbox'
    ) );
    $wp_customize->add_control('logistic_transport_wocommerce_single_page_sidebar',array(
    	'type' => 'checkbox',
       	'label' => __('Enable / Disable Single Product Page Sidebar','logistic-transport'),
		'section' => 'logistic_transport_woocommerce_options'
    ));

    // single product page sidebar alignment
    $wp_customize->add_setting('logistic_transport_single_product_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'logistic_transport_sanitize_choices',
	));
	$wp_customize->add_control('logistic_transport_single_product_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Single product Page layout', 'logistic-transport'),
		'section'        => 'logistic_transport_woocommerce_options',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'logistic-transport'),
			'Right Sidebar' => __('Right Sidebar', 'logistic-transport'),
		),
	));

	$wp_customize->add_setting('logistic_transport_shop_page_pagination',array(
       'default' => true,
       'sanitize_callback'	=> 'logistic_transport_sanitize_checkbox'
    ));
    $wp_customize->add_control('logistic_transport_shop_page_pagination',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Shop page pagination','logistic-transport'),
       'section' => 'logistic_transport_woocommerce_options',
    ));

    $wp_customize->add_setting('logistic_transport_product_page_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'logistic_transport_sanitize_checkbox'
    ));
    $wp_customize->add_control('logistic_transport_product_page_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Product page sidebar','logistic-transport'),
       'section' => 'logistic_transport_woocommerce_options',
    ));

    $wp_customize->add_setting('logistic_transport_related_product',array(
       'default' => true,
       'sanitize_callback'	=> 'logistic_transport_sanitize_checkbox'
    ));
    $wp_customize->add_control('logistic_transport_related_product',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Related product','logistic-transport'),
       'section' => 'logistic_transport_woocommerce_options',
    ));

	$wp_customize->add_setting( 'logistic_transport_woocommerce_button_padding_top',array(
		'default' => 10,
		'sanitize_callback' => 'logistic_transport_sanitize_float'
	));
	$wp_customize->add_control( 'logistic_transport_woocommerce_button_padding_top',	array(
		'label' => esc_html__( 'Button Top Bottom Padding','logistic-transport' ),
		'type' => 'number',
		'section' => 'logistic_transport_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'logistic_transport_woocommerce_button_padding_right',array(
	 	'default' => 20,
	 	'sanitize_callback' => 'logistic_transport_sanitize_float'
	));
	$wp_customize->add_control('logistic_transport_woocommerce_button_padding_right',	array(
	 	'label' => esc_html__( 'Button Right Left Padding','logistic-transport' ),
		'type' => 'number',
		'section' => 'logistic_transport_woocommerce_options',
	 	'input_attrs' => array(
			'min' => 0,
			'max' => 50,
	 		'step' => 1,
		),
	));

	$wp_customize->add_setting( 'logistic_transport_woocommerce_button_border_radius',array(
		'default' => 0,
		'sanitize_callback' => 'logistic_transport_sanitize_float'
	));
	$wp_customize->add_control('logistic_transport_woocommerce_button_border_radius',array(
		'label' => esc_html__( 'Button Border Radius','logistic-transport' ),
		'type' => 'number',
		'section' => 'logistic_transport_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

    $wp_customize->add_setting('logistic_transport_woocommerce_product_border',array(
       'default' => true,
       'sanitize_callback'	=> 'logistic_transport_sanitize_checkbox'
    ));
    $wp_customize->add_control('logistic_transport_woocommerce_product_border',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable product border','logistic-transport'),
       'section' => 'logistic_transport_woocommerce_options',
    ));

	$wp_customize->add_setting( 'logistic_transport_woocommerce_product_padding_top',array(
		'default' => 10,
		'sanitize_callback' => 'logistic_transport_sanitize_float'
	));
	$wp_customize->add_control('logistic_transport_woocommerce_product_padding_top', array(
		'label' => esc_html__( 'Product Top Bottom Padding','logistic-transport' ),
		'type' => 'number',
		'section' => 'logistic_transport_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'logistic_transport_woocommerce_product_padding_right',array(
		'default' => 10,
		'sanitize_callback' => 'logistic_transport_sanitize_float'
	));
	$wp_customize->add_control('logistic_transport_woocommerce_product_padding_right', array(
		'label' => esc_html__( 'Product Right Left Padding','logistic-transport' ),
		'type' => 'number',
		'section' => 'logistic_transport_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'logistic_transport_woocommerce_product_border_radius',array(
		'default' => 0,
		'sanitize_callback' => 'logistic_transport_sanitize_float'
	));
	$wp_customize->add_control('logistic_transport_woocommerce_product_border_radius',array(
		'label' => esc_html__( 'Product Border Radius','logistic-transport' ),
		'type' => 'number',
		'section' => 'logistic_transport_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'logistic_transport_woocommerce_product_box_shadow',array(
		'default' => 0,
		'sanitize_callback' => 'logistic_transport_sanitize_float'
	));
	$wp_customize->add_control( 'logistic_transport_woocommerce_product_box_shadow',array(
		'label' => esc_html__( 'Product Box Shadow','logistic-transport' ),
		'type' => 'number',
		'section' => 'logistic_transport_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('logistic_transport_sale_position',array(
        'default' => 'right',
        'sanitize_callback' => 'logistic_transport_sanitize_choices'
	));
	$wp_customize->add_control('logistic_transport_sale_position',array(
        'type' => 'select',
        'label' => __('Sale badge Position','logistic-transport'),
        'section' => 'logistic_transport_woocommerce_options',
        'choices' => array(
            'left' => __('Left','logistic-transport'),
            'right' => __('Right','logistic-transport'),
        ),
	) );

	$wp_customize->add_setting( 'logistic_transport_woocommerce_sale_top_padding',array(
		'default' => 0,
		'sanitize_callback' => 'logistic_transport_sanitize_float'
	));
	$wp_customize->add_control( 'logistic_transport_woocommerce_sale_top_padding',	array(
		'label' => esc_html__( 'Sale Top Bottom Padding','logistic-transport' ),
		'type' => 'number',
		'section' => 'logistic_transport_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'logistic_transport_woocommerce_sale_left_padding',array(
	 	'default' => 0,
	 	'sanitize_callback' => 'logistic_transport_sanitize_float'
	));
	$wp_customize->add_control('logistic_transport_woocommerce_sale_left_padding',	array(
	 	'label' => esc_html__( 'Sale Right Left Padding','logistic-transport' ),
		'type' => 'number',
		'section' => 'logistic_transport_woocommerce_options',
	 	'input_attrs' => array(
			'min' => 0,
			'max' => 50,
	 		'step' => 1,
		),
	));

	$wp_customize->add_setting( 'logistic_transport_woocommerce_sale_border_radius',array(
		'default' => 50,
		'sanitize_callback' => 'logistic_transport_sanitize_float'
	));
	$wp_customize->add_control('logistic_transport_woocommerce_sale_border_radius',array(
		'label' => esc_html__( 'Sale Border Radius','logistic-transport' ),
		'type' => 'number',
		'section' => 'logistic_transport_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'logistic_transport_product_sale_font_size',array(
		'default' => 16,
		'sanitize_callback' => 'logistic_transport_sanitize_float'
	));
	$wp_customize->add_control('logistic_transport_product_sale_font_size',array(
		'label' => esc_html__( 'Sale Font Size','logistic-transport' ),
		'type' => 'number',
		'section' => 'logistic_transport_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));
}
add_action( 'customize_register', 'logistic_transport_customize_register' );

// logo resize
load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-width.php' );


/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Logistic_Transport_Customize {

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
		$manager->register_section_type( 'Logistic_Transport_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Logistic_Transport_Customize_Section_Pro(
				$manager,
				'logistic_transport_example_1',
				array(
					'priority' => 9,
					'title'    => esc_html( LOGISTIC_TRANSPORT_PRO_NAME ),
					'pro_text' => esc_html__( 'Go Pro','logistic-transport' ),
					'pro_url'  => esc_url( LOGISTIC_TRANSPORT_PRO_URL ),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'logistic-transport-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'logistic-transport-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Logistic_Transport_Customize::get_instance();