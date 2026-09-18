<?php

add_action( 'admin_menu', 'transcargo_transportation_getting_started' );
function transcargo_transportation_getting_started() {
	add_theme_page( esc_html__('Get Started', 'transcargo-transportation'), esc_html__('Get Started', 'transcargo-transportation'), 'edit_theme_options', 'transcargo-transportation-guide-page', 'transcargo_transportation_test_guide');
}

function transcargo_transportation_admin_enqueue_scripts() {
	wp_enqueue_style( 'transcargo-transportation-admin-style', esc_url( get_template_directory_uri() ).'/css/main.css' );
}
add_action( 'admin_enqueue_scripts', 'transcargo_transportation_admin_enqueue_scripts' );

if ( ! defined( 'TRANSCARGO_TRANSPORTATION_DOCS_FREE' ) ) {
define('TRANSCARGO_TRANSPORTATION_DOCS_FREE',__('https://www.misbahwp.com/docs/transcargo-transportation-free-docs/','transcargo-transportation'));
}
if ( ! defined( 'TRANSCARGO_TRANSPORTATION_DOCS_PRO' ) ) {
define('TRANSCARGO_TRANSPORTATION_DOCS_PRO',__('https://www.misbahwp.com/docs/transcargo-transportation-pro-docs','transcargo-transportation'));
}
if ( ! defined( 'TRANSCARGO_TRANSPORTATION_BUY_NOW' ) ) {
define('TRANSCARGO_TRANSPORTATION_BUY_NOW',__('https://www.misbahwp.com/themes/transcargo-wordpress-theme/','transcargo-transportation'));
}
if ( ! defined( 'TRANSCARGO_TRANSPORTATION_SUPPORT_FREE' ) ) {
define('TRANSCARGO_TRANSPORTATION_SUPPORT_FREE',__('https://wordpress.org/support/theme/transcargo-transportation','transcargo-transportation'));
}
if ( ! defined( 'TRANSCARGO_TRANSPORTATION_REVIEW_FREE' ) ) {
define('TRANSCARGO_TRANSPORTATION_REVIEW_FREE',__('https://wordpress.org/support/theme/transcargo-transportation/reviews/#new-post','transcargo-transportation'));
}
if ( ! defined( 'TRANSCARGO_TRANSPORTATION_DEMO_PRO' ) ) {
define('TRANSCARGO_TRANSPORTATION_DEMO_PRO',__('https://www.misbahwp.com/demo/transcargo-transportation/','transcargo-transportation'));
}
if( ! defined( 'TRANSCARGO_TRANSPORTATION_THEME_BUNDLE' ) ) {
define('TRANSCARGO_TRANSPORTATION_THEME_BUNDLE',__('https://www.misbahwp.com/themes/wordpress-bundle/','transcargo-transportation'));
}

function transcargo_transportation_test_guide() { ?>
	<?php $transcargo_transportation_theme = wp_get_theme(); ?>

	<div class="wrap" id="main-page">
		<div id="lefty">
			<div id="admin_links">
				<a href="<?php echo esc_url( TRANSCARGO_TRANSPORTATION_DOCS_FREE ); ?>" target="_blank" class="blue-button-1"><?php esc_html_e( 'Documentation', 'transcargo-transportation' ) ?></a>
				<a href="<?php echo esc_url( admin_url('customize.php') ); ?>" id="customizer" target="_blank"><?php esc_html_e( 'Customize', 'transcargo-transportation' ); ?> </a>
				<a class="blue-button-1" href="<?php echo esc_url( TRANSCARGO_TRANSPORTATION_SUPPORT_FREE ); ?>" target="_blank" class="btn3"><?php esc_html_e( 'Support', 'transcargo-transportation' ) ?></a>
				<a class="blue-button-2" href="<?php echo esc_url( TRANSCARGO_TRANSPORTATION_REVIEW_FREE ); ?>" target="_blank" class="btn4"><?php esc_html_e( 'Review', 'transcargo-transportation' ) ?></a>
			</div>
			<div id="description">
				<h3><?php esc_html_e('Welcome! Thank you for choosing ','transcargo-transportation'); ?><?php echo esc_html( $transcargo_transportation_theme ); ?>  <span><?php esc_html_e('Version: ', 'transcargo-transportation'); ?><?php echo esc_html($transcargo_transportation_theme['Version']);?></span></h3>
				<img class="img_responsive" style="width: 100%;" src="<?php echo esc_url( $transcargo_transportation_theme->get_screenshot() ); ?>" />
				<div id="description-inside">
					<?php
						$transcargo_transportation_theme = wp_get_theme();
						echo wp_kses_post( apply_filters( 'misbah_theme_description', esc_html( $transcargo_transportation_theme->get( 'Description' ) ) ) );
					?>
				</div>
			</div>
		</div>

		<div id="righty">
			<div class="postbox donate">
				<h3 class="hndle"><?php esc_html_e( 'Upgrade to Premium', 'transcargo-transportation' ); ?></h3>
				<div class="inside">
					<p><?php esc_html_e('Discover upgraded pro features with premium version click to upgrade.','transcargo-transportation'); ?></p>
					<div id="admin_pro_links">
						<a class="blue-button-2" href="<?php echo esc_url( TRANSCARGO_TRANSPORTATION_BUY_NOW ); ?>" target="_blank"><?php esc_html_e( 'Go Pro', 'transcargo-transportation' ); ?></a>
						<a class="blue-button-1" href="<?php echo esc_url( TRANSCARGO_TRANSPORTATION_DEMO_PRO ); ?>" target="_blank"><?php esc_html_e( 'Live Demo', 'transcargo-transportation' ) ?></a>
						<a class="blue-button-2" href="<?php echo esc_url( TRANSCARGO_TRANSPORTATION_DOCS_PRO ); ?>" target="_blank"><?php esc_html_e( 'Pro Docs', 'transcargo-transportation' ) ?></a>
					</div>
				</div>

				<h3 class="hndle bundle"><?php esc_html_e( 'Go For Theme Bundle', 'transcargo-transportation' ); ?></h3>
				<div class="inside theme-bundle">
					<p class="offer"><?php esc_html_e('Get 50+ Perfect WordPress Theme In A Single Package at just $79."','transcargo-transportation'); ?></p>
					<p class="coupon"><?php esc_html_e('Exclusive Offer !! Get Our Theme Pack of 60+ WordPress Themes At 10% Off','transcargo-transportation'); ?><span class="coupon-code"><?php esc_html_e('"Themespack10"','transcargo-transportation'); ?></span></p>
					<div id="admin_pro_linkss">
						<a class="blue-button-1" href="<?php echo esc_url( TRANSCARGO_TRANSPORTATION_THEME_BUNDLE ); ?>" target="_blank"><?php esc_html_e( 'Theme Bundle', 'transcargo-transportation' ) ?></a>
					</div>
				</div>
				<div class="d-table">
			    <ul class="d-column">
			      <li class="feature"><?php esc_html_e('Features','transcargo-transportation'); ?></li>
			      <li class="free"><?php esc_html_e('Pro','transcargo-transportation'); ?></li>
			      <li class="plus"><?php esc_html_e('Free','transcargo-transportation'); ?></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('24hrs Priority Support','transcargo-transportation'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('LearnPress Campatiblity','transcargo-transportation'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Kirki Framework','transcargo-transportation'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Posttype','transcargo-transportation'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('One Click Demo Import','transcargo-transportation'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Section Reordering','transcargo-transportation'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Enable / Disable Option','transcargo-transportation'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Multiple Sections','transcargo-transportation'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Color Pallete','transcargo-transportation'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Widgets','transcargo-transportation'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Page Templates','transcargo-transportation'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Typography','transcargo-transportation'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Section Background Image / Color ','transcargo-transportation'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
	  		</div>
				<h3 class="hndle"><?php esc_html_e( 'Upgrade to Premium', 'transcargo-transportation' ); ?></h3>
				<div class="inside">
					<p><?php esc_html_e('Discover upgraded pro features with premium version click to upgrade.','transcargo-transportation'); ?></p>
					<div id="admin_pro_links">
						<a class="blue-button-2" href="<?php echo esc_url( TRANSCARGO_TRANSPORTATION_BUY_NOW ); ?>" target="_blank"><?php esc_html_e( 'Go Pro', 'transcargo-transportation' ); ?></a>
						<a class="blue-button-1" href="<?php echo esc_url( TRANSCARGO_TRANSPORTATION_DEMO_PRO ); ?>" target="_blank"><?php esc_html_e( 'Live Demo', 'transcargo-transportation' ) ?></a>
						<a class="blue-button-2" href="<?php echo esc_url( TRANSCARGO_TRANSPORTATION_DOCS_PRO ); ?>" target="_blank"><?php esc_html_e( 'Pro Docs', 'transcargo-transportation' ) ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php } ?>
