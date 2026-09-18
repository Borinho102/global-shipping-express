<?php
/**
 * Plugin Name: GES Jetpack Identity Crisis Rescue
 * Description: Keeps Jetpack Safe Mode actions from returning HTML 500s, and offers an admin fallback that does not use /wp-json/.
 *
 * @package GES
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Prevent a malformed unique_connection option from throwing a PHP 8 TypeError during disconnect.
 *
 * @param mixed  $value Option value.
 * @param string $name  Option name without the jetpack_ prefix.
 * @return mixed
 */
function ges_jetpack_normalize_unique_connection( $value, $name ) {
	if ( 'unique_connection' === $name && $value && ! is_array( $value ) ) {
		return array(
			'connected'    => 0,
			'disconnected' => 0,
			'version'      => '3.6.1',
		);
	}

	return $value;
}
add_filter( 'jetpack_options', 'ges_jetpack_normalize_unique_connection', 10, 2 );

/**
 * Run Jetpack IDC REST callbacks inside try/catch so fatals become JSON.
 *
 * @param mixed           $result  Dispatch result.
 * @param WP_REST_Server  $server  REST server.
 * @param WP_REST_Request $request Request.
 * @return mixed
 */
function ges_jetpack_idc_rest_pre_dispatch( $result, $server, $request ) { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter.FoundAfterLastUsed
	if ( null !== $result ) {
		return $result;
	}

	$route = $request->get_route();

	if ( '/jetpack/v4/site/benefits' === $route ) {
		if ( ! current_user_can( 'jetpack_manage_modules' ) ) {
			return $result;
		}

		try {
			if ( class_exists( 'Jetpack_Core_API_Site_Endpoint' ) ) {
				return Jetpack_Core_API_Site_Endpoint::get_benefits();
			}
		} catch ( Throwable $e ) {
			return rest_ensure_response(
				array(
					'code'    => 'success',
					'message' => 'Site benefits unavailable.',
					'data'    => '[]',
				)
			);
		}

		return $result;
	}

	$idc_routes = array(
		'/jetpack/v4/identity-crisis/start-fresh',
		'/jetpack/v4/identity-crisis/migrate',
		'/jetpack/v4/identity-crisis/confirm-safe-mode',
	);

	if ( ! in_array( $route, $idc_routes, true ) ) {
		return $result;
	}

	if ( ! in_array( $request->get_method(), array( 'POST', 'PUT', 'PATCH' ), true ) ) {
		return $result;
	}

	if ( ! current_user_can( 'jetpack_disconnect' ) && ! current_user_can( 'manage_options' ) ) {
		return $result;
	}

	if ( ! class_exists( '\Automattic\Jetpack\IdentityCrisis\REST_Endpoints' ) ) {
		return $result;
	}

	try {
		if ( '/jetpack/v4/identity-crisis/start-fresh' === $route ) {
			$response = \Automattic\Jetpack\IdentityCrisis\REST_Endpoints::start_fresh_connection( $request );
		} elseif ( '/jetpack/v4/identity-crisis/migrate' === $route ) {
			$response = \Automattic\Jetpack\IdentityCrisis\REST_Endpoints::migrate_stats_and_subscribers();
		} else {
			$response = \Automattic\Jetpack\IdentityCrisis\REST_Endpoints::confirm_safe_mode();
		}

		if ( is_wp_error( $response ) ) {
			$data = $response->get_error_data();
			if ( ! is_array( $data ) || empty( $data['status'] ) ) {
				$response->add_data( array( 'status' => 400 ) );
			}
		}

		return $response;
	} catch ( Throwable $e ) {
		return new WP_Error(
			'ges_jetpack_idc_fatal',
			$e->getMessage() . ' in ' . basename( $e->getFile() ) . ':' . $e->getLine(),
			array( 'status' => 500 )
		);
	}
}
add_filter( 'rest_pre_dispatch', 'ges_jetpack_idc_rest_pre_dispatch', 10, 3 );

/**
 * Whether Jetpack currently reports an identity crisis.
 *
 * @return bool
 */
function ges_jetpack_is_in_idc() {
	return class_exists( '\Automattic\Jetpack\Identity_Crisis' )
		&& false !== \Automattic\Jetpack\Identity_Crisis::check_identity_crisis();
}

/**
 * Admin fallback that does not depend on /wp-json/.
 *
 * @return void
 */
function ges_jetpack_idc_admin_notice() {
	if ( ! current_user_can( 'manage_options' ) || ! ges_jetpack_is_in_idc() ) {
		return;
	}

	$action = admin_url( 'admin-post.php' );
	?>
	<div id="ges-jetpack-idc-rescue" class="notice notice-error" style="position:relative;z-index:2147483647;padding:12px 16px;">
		<p><strong>Jetpack Safe Mode:</strong> the on-screen buttons talk to <code>/wp-json/</code> and are currently returning HTTP 500. Use these fallbacks instead (they go through <code>admin-post.php</code>).</p>
		<form method="post" action="<?php echo esc_url( $action ); ?>" style="display:inline-block;margin:0 8px 8px 0;">
			<?php wp_nonce_field( 'ges_jetpack_idc' ); ?>
			<input type="hidden" name="action" value="ges_jetpack_idc" />
			<input type="hidden" name="ges_idc_task" value="start_fresh" />
			<button type="submit" class="button button-primary">Create a fresh connection</button>
		</form>
		<form method="post" action="<?php echo esc_url( $action ); ?>" style="display:inline-block;margin:0 8px 8px 0;">
			<?php wp_nonce_field( 'ges_jetpack_idc' ); ?>
			<input type="hidden" name="action" value="ges_jetpack_idc" />
			<input type="hidden" name="ges_idc_task" value="migrate" />
			<button type="submit" class="button">Move settings from expressship.online</button>
		</form>
		<form method="post" action="<?php echo esc_url( $action ); ?>" style="display:inline-block;margin:0 8px 8px 0;">
			<?php wp_nonce_field( 'ges_jetpack_idc' ); ?>
			<input type="hidden" name="action" value="ges_jetpack_idc" />
			<input type="hidden" name="ges_idc_task" value="safe_mode" />
			<button type="submit" class="button">Stay in Safe Mode</button>
		</form>
	</div>
	<?php
}
add_action( 'admin_notices', 'ges_jetpack_idc_admin_notice', 1 );

/**
 * Handle IDC fallback actions.
 *
 * @return void
 */
function ges_jetpack_idc_admin_post() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( esc_html__( 'You are not allowed to do this.', 'ges' ) );
	}

	check_admin_referer( 'ges_jetpack_idc' );

	$task = isset( $_POST['ges_idc_task'] ) ? sanitize_key( wp_unslash( $_POST['ges_idc_task'] ) ) : '';

	try {
		if ( 'start_fresh' === $task ) {
			if ( ! class_exists( '\Automattic\Jetpack\Connection\Manager' ) ) {
				wp_die( 'Jetpack Connection Manager is not available.' );
			}

			do_action( 'jetpack_idc_disconnect' );

			$connection = new \Automattic\Jetpack\Connection\Manager();
			$result     = $connection->try_registration( true );

			if ( is_wp_error( $result ) ) {
				wp_die(
					'Jetpack registration failed: ' . esc_html( $result->get_error_code() ) . ' — ' . esc_html( $result->get_error_message() ),
					'Jetpack',
					array( 'back_link' => true )
				);
			}

			$url = $connection->get_authorization_url( null, admin_url( 'admin.php?page=jetpack' ) );
			wp_safe_redirect( $url );
			exit;
		}

		if ( 'migrate' === $task && class_exists( '\Automattic\Jetpack\IdentityCrisis\REST_Endpoints' ) ) {
			$response = \Automattic\Jetpack\IdentityCrisis\REST_Endpoints::migrate_stats_and_subscribers();
			if ( is_wp_error( $response ) ) {
				wp_die( esc_html( $response->get_error_message() ), 'Jetpack', array( 'back_link' => true ) );
			}
			wp_safe_redirect( admin_url( 'admin.php?page=jetpack' ) );
			exit;
		}

		if ( 'safe_mode' === $task && class_exists( '\Automattic\Jetpack\IdentityCrisis\REST_Endpoints' ) ) {
			$response = \Automattic\Jetpack\IdentityCrisis\REST_Endpoints::confirm_safe_mode();
			if ( is_wp_error( $response ) ) {
				wp_die( esc_html( $response->get_error_message() ), 'Jetpack', array( 'back_link' => true ) );
			}
			wp_safe_redirect( admin_url( 'index.php' ) );
			exit;
		}

		wp_die( 'Unknown Jetpack IDC task.' );
	} catch ( Throwable $e ) {
		wp_die(
			'Fatal error: ' . esc_html( $e->getMessage() ) . ' in ' . esc_html( $e->getFile() ) . ':' . (int) $e->getLine(),
			'Jetpack',
			array( 'back_link' => true )
		);
	}
}
add_action( 'admin_post_ges_jetpack_idc', 'ges_jetpack_idc_admin_post' );
