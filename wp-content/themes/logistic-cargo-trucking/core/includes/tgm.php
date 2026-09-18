<?php
	
require get_template_directory() . '/core/includes/class-tgm-plugin-activation.php';

/**
 * Recommended plugins.
 */
function logistic_cargo_trucking_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Kirki Customizer Framework', 'logistic-cargo-trucking' ),
			'slug'             => 'kirki',
			'required'         => false,
			'force_activation' => false,
		),
	);
	$config = array();
	logistic_cargo_trucking_tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'logistic_cargo_trucking_register_recommended_plugins' );