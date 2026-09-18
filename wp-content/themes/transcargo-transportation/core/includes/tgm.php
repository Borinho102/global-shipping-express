<?php
	
require get_template_directory() . '/core/includes/class-tgm-plugin-activation.php';

/**
 * Recommended plugins.
 */
function transcargo_transportation_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Kirki Customizer Framework', 'transcargo-transportation' ),
			'slug'             => 'kirki',
			'required'         => false,
			'force_activation' => false,
		),
	);
	$config = array();
	transcargo_transportation_tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'transcargo_transportation_register_recommended_plugins' );