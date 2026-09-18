<?php
/**
 * Custom header implementation
 */

function movers_and_packers_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'movers_and_packers_custom_header_args', array(
		'default-text-color' => 'fff',
		'header-text' 	     =>	false,
		'width'              => 1200,
		'height'             => 80,
		'flex-width'         => true,
		'flex-height'        => true,
		'wp-head-callback'   => 'movers_and_packers_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'movers_and_packers_custom_header_setup' );

if ( ! function_exists( 'movers_and_packers_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see movers_and_packers_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'movers_and_packers_header_style' );
function movers_and_packers_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
        #header {
			background-image:url('".esc_url(get_header_image())."');
			background-position: bottom center;
			background-size: 100% 100%;
		}";
	   	wp_add_inline_style( 'movers-and-packers-basic-style', $custom_css );
	endif;
}
endif; // movers_and_packers_header_style