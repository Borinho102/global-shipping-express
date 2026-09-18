<?php
/**
 * Theme functions and definitions
 *
 * @package Transportation Shipment
 */ 

if ( ! function_exists( 'transportation_shipment_enqueue_styles' ) ) :
	/**
	 * Load assets.
	 *
	 * @since 1.0.0
	 */
	function transportation_shipment_enqueue_styles() {
		wp_enqueue_style( 'bootstrap-css', get_template_directory_uri().'/css/bootstrap.css' );
		wp_enqueue_style( 'transportation-shipment-block-patterns-style-frontend', get_theme_file_uri('/css/block-frontend.css') );
		wp_enqueue_style( 'font-awesome-css', get_template_directory_uri().'/css/fontawesome-all.css' );
		wp_enqueue_style( 'transportation-shipment-style-parent', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'transportation-shipment-style', get_stylesheet_directory_uri() . '/style.css', array( 'transportation-shipment-style-parent' ), '1.0.0' );

		require get_parent_theme_file_path( '/tc-style.php' );
		wp_add_inline_style( 'logistic-transport-basic-style',$logistic_transport_custom_css );

		require get_theme_file_path( '/tc-style.php' );
		wp_add_inline_style( 'transportation-shipment-style',$transportation_shipment_custom_css );
	}
endif;
add_action( 'wp_enqueue_scripts', 'transportation_shipment_enqueue_styles');

/**
 * Enqueue block editor style
 */
function transportation_shipment_block_editor_styles() {
	wp_enqueue_style( 'logistic-transport-font', logistic_transport_font_url(), array() );
	wp_enqueue_style( 'transportation-shipment-block-patterns-style-editor', get_theme_file_uri( '/css/block-editor.css' ), false, '1.0', 'all' );
    wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/css/bootstrap.css' );
    wp_enqueue_style( 'font-awesome-css', get_template_directory_uri().'/css/fontawesome-all.css' );
}
add_action( 'enqueue_block_editor_assets', 'transportation_shipment_block_editor_styles' );

function transportation_shipment_customize_register() {
	global $wp_customize;
	$wp_customize->remove_setting( 'logistic_transport_theme_color_first' );
	$wp_customize->remove_control( 'logistic_transport_theme_color_first' );
	$wp_customize->remove_setting( 'logistic_transport_theme_color_second' );
	$wp_customize->remove_control( 'logistic_transport_theme_color_second' );
	$wp_customize->remove_setting( 'logistic_transport_time' );
	$wp_customize->remove_control( 'logistic_transport_time' );
	$wp_customize->remove_setting( 'logistic_transport_time_icon' );
	$wp_customize->remove_control( 'logistic_transport_time_icon' );
	$wp_customize->remove_section( 'logistic_transport_about_theme' );

	$wp_customize->add_setting('logistic_transport_location_icon',array(
		'default'	=> 'fas fa-map-marker-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Logistic_Transport_Icon_Changer(
        $wp_customize, 'logistic_transport_location_icon',array(
		'label'	=> __('Location Icon','transportation-shipment'),
		'section'	=> 'logistic_transport_header',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('logistic_transport_location',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('logistic_transport_location',array(
		'label'	=> __('Location','transportation-shipment'),
		'section'	=> 'logistic_transport_header',
		'setting'	=> 'logistic_transport_location',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('logistic_transport_section_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('logistic_transport_section_title',array(
		'label'	=> __('Section Title','transportation-shipment'),
		'section'	=> 'logistic_transport_discover',
		'setting'	=> 'logistic_transport_section_title',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('logistic_transport_experience_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('logistic_transport_experience_text',array(
		'label'	=> __('Experience Text','transportation-shipment'),
		'section'	=> 'logistic_transport_discover',
		'setting'	=> 'logistic_transport_experience_text',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('logistic_transport_image_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('logistic_transport_image_text',array(
		'label'	=> __('Image Text','transportation-shipment'),
		'section'	=> 'logistic_transport_discover',
		'setting'	=> 'logistic_transport_image_text',
		'type'	=> 'text'
	));

	//About Section
		$wp_customize->add_section( 'transportation_shipment_about_theme' , array(
	    	'title' => esc_html__( 'About Theme', 'transportation-shipment' ),
	    	'priority' => 10,
		) );

		$wp_customize->add_setting('transportation_shipment_demo_link',array(
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('transportation_shipment_demo_link',array(
			'type'=> 'hidden',
			'description' => "<h3>Theme Demo</h3>Our premium version of Transportation Shipment has unlimited sections with advanced control fields. Dedicated support and no limititation in any field.<br> <a target='_blank' href='". esc_url('https://www.themescaliber.com/transportation-shipment-pro/') ." '>View Demo</a>",
			'section'=> 'transportation_shipment_about_theme'
		));
		
		$wp_customize->add_setting('transportation_shipment_doc_link',array(
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('transportation_shipment_doc_link',array(
			'type'=> 'hidden',
			'description' => "<h3>Theme Documentation</h3>We have well prepared documentation that provides the general guidelines and suggestions needed for this theme.<br> <a target='_blank' href='". esc_url('https://themescaliber.com/demo/doc/free-transportation-shipment/') ." '>View Documentation</a>",
			'section'=> 'transportation_shipment_about_theme'
		));

		$wp_customize->add_setting('transportation_shipment_forum_link',array(
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('transportation_shipment_forum_link',array(
			'type'=> 'hidden',
			'description' => "<h3>Theme Support</h3>Regarding any theme issue, we offer 24/7 support. You can get assistance from our support staff in resolving any problem. Please get in touch with us.<br><a target='_blank' href='". esc_url('https://wordpress.org/support/theme/transportation-shipment/') ." '>Support Forum</a>",
			'section'=> 'transportation_shipment_about_theme'
		));
}
add_action( 'customize_register', 'transportation_shipment_customize_register', 11 );

/* Theme Setup */
if ( ! function_exists( 'transportation_shipment_setup' ) ) :

function transportation_shipment_setup() {

	$GLOBALS['content_width'] = apply_filters( 'transportation_shipment_content_width', 640 );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('transportation-shipment-homepage-thumb',240,145,true);

	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );

	add_theme_support ('html5', array (
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );

	add_theme_support('responsive-embeds');

	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	add_editor_style( array( 'css/editor-style.css' ) );
}

endif;
add_action( 'after_setup_theme', 'transportation_shipment_setup' );

function transportation_shipment_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'transportation-shipment' ),
		'description'   => __( 'Appears on blog page sidebar', 'transportation-shipment' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s mb-4 p-2">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title pt-0">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'transportation_shipment_widgets_init' );

function transportation_shipment_enqueue_comments_reply() {
    if( is_singular() && comments_open() && ( get_option( 'thread_comments' ) == 1) ) {
        wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );
    }
}
add_action( 'wp_enqueue_scripts', 'transportation_shipment_enqueue_comments_reply' );

add_action( 'init', 'transportation_shipment_remove_action');
function transportation_shipment_remove_action() {
    remove_action( 'admin_menu','logistic_transport_gettingstarted' );
    remove_action( 'admin_notices','logistic_transport_activation_notice' );
}

if ( ! defined( 'LOGISTIC_TRANSPORT_PRO_NAME' ) ) {
	define( 'LOGISTIC_TRANSPORT_PRO_NAME', esc_html__( 'Transportation Pro', 'transportation-shipment' ));
}
if ( ! defined( 'LOGISTIC_TRANSPORT_PRO_URL' ) ) {
	define( 'LOGISTIC_TRANSPORT_PRO_URL', esc_url('https://www.themescaliber.com/themes/shipment-wordpress-theme/'));
}

define('TRANSPORTATION_SHIPMENT_THEME_URL',__('https://www.themescaliber.com/themes/shipment-wordpress-theme/', 'transportation-shipment'));

function transportation_shipment_credit_link() {
    echo "<a href=".esc_url(TRANSPORTATION_SHIPMENT_THEME_URL)." target='_blank'>".esc_html__('Transportation Shipment WordPress Theme','transportation-shipment')."</a>";
}

/* Block Pattern */
require get_theme_file_path() . '/block-patterns.php';