<?php
/**
 * @package Logistic Transport
 * @subpackage logistic-transport
 * @since logistic-transport 1.0
 * Setup the WordPress core custom header feature.
 *
 * @uses logistic_transport_header_style()
*/

function logistic_transport_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'logistic_transport_custom_header_args', array(
		'default-text-color' => 'fff',
		'header-text' 	     =>	false,
		'width'              => 1280,
		'height'             => 110,
		'flex-height'        => true,
	    'flex-width'         => true,
		'wp-head-callback'   => 'logistic_transport_header_style',
	) ) );

}

add_action( 'after_setup_theme', 'logistic_transport_custom_header_setup' );

if ( ! function_exists( 'logistic_transport_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see logistic_transport_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'logistic_transport_header_style' );
function logistic_transport_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$logistic_transport_custom_css = "
        #header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
			background-size: 100% 100%;
		}
		@media screen and (max-width: 1000px){
			.site_header, .toggle-menu, .menubox.nav, .search-box, .sidebar, .request-btn{
				background: transparent;
			}
		}
		";
	   	wp_add_inline_style( 'logistic-transport-basic-style', $logistic_transport_custom_css );
	endif;
}
endif; // logistic_transport_header_style
