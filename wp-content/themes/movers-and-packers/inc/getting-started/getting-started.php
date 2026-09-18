<?php
//about theme info
add_action( 'admin_menu', 'movers_and_packers_gettingstarted' );
function movers_and_packers_gettingstarted() {    	
	add_theme_page( esc_html__('About Theme', 'movers-and-packers'), esc_html__('About Theme', 'movers-and-packers'), 'edit_theme_options', 'movers_and_packers_guide', 'movers_and_packers_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function movers_and_packers_admin_theme_style() {
   wp_enqueue_style('custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getting-started/getting-started.css');
}
add_action('admin_enqueue_scripts', 'movers_and_packers_admin_theme_style');

//guidline for about theme
function movers_and_packers_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'movers-and-packers' );

?>

<div class="wrapper-info">
	<div class="col-left">
		<div class="intro">
			<h3><?php esc_html_e( 'Welcome to Software Company WordPress Theme', 'movers-and-packers' ); ?> <span>Version: <?php echo esc_html($theme['Version']);?></span></h3>
		</div>
		<div class="started">
			<hr>
			<div class="free-doc">
				<div class="lz-4">
					<h4><?php esc_html_e( 'Start Customizing', 'movers-and-packers' ); ?></h4>
					<ul>
						<span><?php esc_html_e( 'Go to', 'movers-and-packers' ); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizer', 'movers-and-packers' ); ?> </a> <?php esc_html_e( 'and start customizing your website', 'movers-and-packers' ); ?></span>
					</ul>
				</div>
				<div class="lz-4">
					<h4><?php esc_html_e( 'Support', 'movers-and-packers' ); ?></h4>
					<ul>
						<span><?php esc_html_e( 'Send your query to our', 'movers-and-packers' ); ?> <a href="<?php echo esc_url( MOVERS_AND_PACKERS_SUPPORT ); ?>" target="_blank"> <?php esc_html_e( 'Support', 'movers-and-packers' ); ?></a></span>
					</ul>
				</div>
			</div>
			<p><?php esc_html_e( 'Movers and Packers is a modern-day free theme with a suitable design for logistics services, courier agencies, house moving and relocation services, shipping and storage, transportation agency, international shipping company, packers, and movers. It is created with a minimal style design and has an elegant look that makes your website looks exquisite. The clean and retina-ready design will show the various aspects of the business. Its user-friendly interface is going to give you an easy chance to create websites and doesn’t demand any kind of coding skills. It is responsive to make your website fit perfectly on every screen no matter what the screen resolution is. With a professional design, it also brings you a lot of personalization options. There is a Banner that looks beautiful, and this theme also has wonderful Team and Testimonial sections. With a lot of translation options for making your website support various languages along with RTL languages such as Arabic, Hebrew, etc. An exceptionally modern layout is going to make your website look stylish. It is compatible with all the popular web browsers such as Chrome, Safari, Firefox, Explorer, etc. This is a Bootstrap-based design that makes your website robust and super powerful and its highly optimized SEO-friendly codes will make your website have faster page load time.', 'movers-and-packers')?></p>
			<hr>
			<div class="col-left-inner">
				<h3><?php esc_html_e( 'Get started with Free Movers and Packers Theme', 'movers-and-packers' ); ?></h3>
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/customizer-image.png" alt="" />
			</div>
		</div>
	</div>
	<div class="col-right">
		<div class="col-left-area">
			<h3><?php esc_html_e('Premium Theme Information', 'movers-and-packers'); ?></h3>
			<hr>
		</div>
		<div class="centerbold">
			<a href="<?php echo esc_url( MOVERS_AND_PACKERS_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'movers-and-packers'); ?></a>
			<a href="<?php echo esc_url( MOVERS_AND_PACKERS_BUY_NOW ); ?>"><?php esc_html_e('Buy Pro', 'movers-and-packers'); ?></a>
			<a href="<?php echo esc_url( MOVERS_AND_PACKERS_PRO_DOCS ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'movers-and-packers'); ?></a>
			<hr class="secondhr">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/movers-and-packers.jpg" alt="" />
		</div>
		<h3><?php esc_html_e( 'PREMIUM THEME FEATURES', 'movers-and-packers'); ?></h3>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon01.png" alt="" />
			<h4><?php esc_html_e( 'Banner Slider', 'movers-and-packers'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon02.png" alt="" />
			<h4><?php esc_html_e( 'Theme Options', 'movers-and-packers'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon03.png" alt="" />
			<h4><?php esc_html_e( 'Custom Innerpage Banner', 'movers-and-packers'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon04.png" alt="" />
			<h4><?php esc_html_e( 'Custom Colors and Images', 'movers-and-packers'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon05.png" alt="" />
			<h4><?php esc_html_e( 'Fully Responsive', 'movers-and-packers'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon06.png" alt="" />
			<h4><?php esc_html_e( 'Hide/Show Sections', 'movers-and-packers'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon07.png" alt="" />
			<h4><?php esc_html_e( 'Woocommerce Support', 'movers-and-packers'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon08.png" alt="" />
			<h4><?php esc_html_e( 'Limit to display number of Posts', 'movers-and-packers'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon09.png" alt="" />
			<h4><?php esc_html_e( 'Multiple Page Templates', 'movers-and-packers'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon10.png" alt="" />
			<h4><?php esc_html_e( 'Custom Read More link', 'movers-and-packers'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon11.png" alt="" />
			<h4><?php esc_html_e( 'Code written with WordPress standard', 'movers-and-packers'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon12.png" alt="" />
			<h4><?php esc_html_e( '100% Multi language', 'movers-and-packers'); ?></h4>
		</div>
	</div>
</div>
<?php } ?>