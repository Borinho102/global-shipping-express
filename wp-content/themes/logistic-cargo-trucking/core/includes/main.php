<?php

add_action( 'admin_menu', 'logistic_cargo_trucking_getting_started' );
function logistic_cargo_trucking_getting_started() {
	add_theme_page( esc_html__('Get Started', 'logistic-cargo-trucking'), esc_html__('Get Started', 'logistic-cargo-trucking'), 'edit_theme_options', 'logistic-cargo-trucking-guide-page', 'logistic_cargo_trucking_test_guide');
}

function logistic_cargo_trucking_admin_enqueue_scripts() {
	wp_enqueue_style( 'logistic-cargo-trucking-admin-style', esc_url( get_template_directory_uri() ).'/css/main.css' );
}
add_action( 'admin_enqueue_scripts', 'logistic_cargo_trucking_admin_enqueue_scripts' );

if ( ! defined( 'LOGISTIC_CARGO_TRUCKING_DOCS_FREE' ) ) {
define('LOGISTIC_CARGO_TRUCKING_DOCS_FREE',__('https://www.misbahwp.com/docs/logistic-cargo-trucking-free-docs/','logistic-cargo-trucking'));
}
if ( ! defined( 'LOGISTIC_CARGO_TRUCKING_DOCS_PRO' ) ) {
define('LOGISTIC_CARGO_TRUCKING_DOCS_PRO',__('https://www.misbahwp.com/docs/logistic-cargo-trucking-pro-docs','logistic-cargo-trucking'));
}
if ( ! defined( 'LOGISTIC_CARGO_TRUCKING_BUY_NOW' ) ) {
define('LOGISTIC_CARGO_TRUCKING_BUY_NOW',__('https://www.misbahwp.com/themes/trucking-wordpress-theme/','logistic-cargo-trucking'));
}
if ( ! defined( 'LOGISTIC_CARGO_TRUCKING_SUPPORT_FREE' ) ) {
define('LOGISTIC_CARGO_TRUCKING_SUPPORT_FREE',__('https://wordpress.org/support/theme/logistic-cargo-trucking','logistic-cargo-trucking'));
}
if ( ! defined( 'LOGISTIC_CARGO_TRUCKING_REVIEW_FREE' ) ) {
define('LOGISTIC_CARGO_TRUCKING_REVIEW_FREE',__('https://wordpress.org/support/theme/logistic-cargo-trucking/reviews/#new-post','logistic-cargo-trucking'));
}
if ( ! defined( 'LOGISTIC_CARGO_TRUCKING_DEMO_PRO' ) ) {
define('LOGISTIC_CARGO_TRUCKING_DEMO_PRO',__('https://www.misbahwp.com/demo/logistic-cargo-trucking/','logistic-cargo-trucking'));
}
if( ! defined( 'LOGISTIC_CARGO_TRUCKING_THEME_BUNDLE' ) ) {
define('LOGISTIC_CARGO_TRUCKING_THEME_BUNDLE',__('https://www.misbahwp.com/themes/wordpress-bundle/','logistic-cargo-trucking'));
}

function logistic_cargo_trucking_test_guide() { ?>
	<?php $logistic_cargo_trucking_theme = wp_get_theme(); ?>

	<div class="wrap" id="main-page">
		<div id="lefty">
			<div id="admin_links">
				<a href="<?php echo esc_url( LOGISTIC_CARGO_TRUCKING_DOCS_FREE ); ?>" target="_blank" class="blue-button-1"><?php esc_html_e( 'Documentation', 'logistic-cargo-trucking' ) ?></a>
				<a href="<?php echo esc_url( admin_url('customize.php') ); ?>" id="customizer" target="_blank"><?php esc_html_e( 'Customize', 'logistic-cargo-trucking' ); ?> </a>
				<a class="blue-button-1" href="<?php echo esc_url( LOGISTIC_CARGO_TRUCKING_SUPPORT_FREE ); ?>" target="_blank" class="btn3"><?php esc_html_e( 'Support', 'logistic-cargo-trucking' ) ?></a>
				<a class="blue-button-2" href="<?php echo esc_url( LOGISTIC_CARGO_TRUCKING_REVIEW_FREE ); ?>" target="_blank" class="btn4"><?php esc_html_e( 'Review', 'logistic-cargo-trucking' ) ?></a>
			</div>
			<div id="description">
				<h3><?php esc_html_e('Welcome! Thank you for choosing ','logistic-cargo-trucking'); ?><?php echo esc_html( $logistic_cargo_trucking_theme ); ?>  <span><?php esc_html_e('Version: ', 'logistic-cargo-trucking'); ?><?php echo esc_html($logistic_cargo_trucking_theme['Version']);?></span></h3>
				<img class="img_responsive" style="width:100%;" src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.png">
				<div id="description-inside">
					<?php
						$logistic_cargo_trucking_theme = wp_get_theme();
						echo wp_kses_post( apply_filters( 'misbah_theme_description', esc_html( $logistic_cargo_trucking_theme->get( 'Description' ) ) ) );
					?>
				</div>
			</div>
		</div>

		<div id="righty">
			<div class="postbox donate">
				<h3 class="hndle"><?php esc_html_e( 'Upgrade to Premium', 'logistic-cargo-trucking' ); ?></h3>
				<div class="inside">
					<p><?php esc_html_e('Discover upgraded pro features with premium version click to upgrade.','logistic-cargo-trucking'); ?></p>
					<div id="admin_pro_links">
						<a class="blue-button-2" href="<?php echo esc_url( LOGISTIC_CARGO_TRUCKING_BUY_NOW ); ?>" target="_blank"><?php esc_html_e( 'Go Pro', 'logistic-cargo-trucking' ); ?></a>
						<a class="blue-button-1" href="<?php echo esc_url( LOGISTIC_CARGO_TRUCKING_DEMO_PRO ); ?>" target="_blank"><?php esc_html_e( 'Live Demo', 'logistic-cargo-trucking' ) ?></a>
						<a class="blue-button-2" href="<?php echo esc_url( LOGISTIC_CARGO_TRUCKING_DOCS_PRO ); ?>" target="_blank"><?php esc_html_e( 'Pro Docs', 'logistic-cargo-trucking' ) ?></a>
					</div>
				</div>

				<h3 class="hndle bundle"><?php esc_html_e( 'Go For Theme Bundle', 'logistic-cargo-trucking' ); ?></h3>
				<div class="inside theme-bundle">
					<p class="offer"><?php esc_html_e('Get 50+ Perfect WordPress Theme In A Single Package at just $79."','logistic-cargo-trucking'); ?></p>
					<p class="coupon"><?php esc_html_e('Exclusive Offer !! Get Our Theme Pack of 60+ WordPress Themes At 10% Off','logistic-cargo-trucking'); ?><span class="coupon-code"><?php esc_html_e('"Themespack10"','logistic-cargo-trucking'); ?></span></p>
					<div id="admin_pro_linkss">
						<a class="blue-button-1" href="<?php echo esc_url( LOGISTIC_CARGO_TRUCKING_THEME_BUNDLE ); ?>" target="_blank"><?php esc_html_e( 'Theme Bundle', 'logistic-cargo-trucking' ) ?></a>
					</div>
				</div>
				<div class="d-table">
			    <ul class="d-column">
			      <li class="feature"><?php esc_html_e('Features','logistic-cargo-trucking'); ?></li>
			      <li class="free"><?php esc_html_e('Pro','logistic-cargo-trucking'); ?></li>
			      <li class="plus"><?php esc_html_e('Free','logistic-cargo-trucking'); ?></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('24hrs Priority Support','logistic-cargo-trucking'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Kirki Framework','logistic-cargo-trucking'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Posttype','logistic-cargo-trucking'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('One Click Demo Import','logistic-cargo-trucking'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Section Reordering','logistic-cargo-trucking'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Enable / Disable Option','logistic-cargo-trucking'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Multiple Sections','logistic-cargo-trucking'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Color Pallete','logistic-cargo-trucking'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Widgets','logistic-cargo-trucking'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Page Templates','logistic-cargo-trucking'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Typography','logistic-cargo-trucking'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Section Background Image / Color ','logistic-cargo-trucking'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
	  		</div>
			</div>
		</div>
	</div>

<?php } ?>
