<?php
//about theme info
add_action( 'admin_menu', 'vw_transport_cargo_gettingstarted' );
function vw_transport_cargo_gettingstarted() {
	add_theme_page( esc_html__('About VW Transport Cargo', 'vw-transport-cargo'), esc_html__('About VW Transport Cargo', 'vw-transport-cargo'), 'edit_theme_options', 'vw_transport_cargo_guide', 'vw_transport_cargo_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function vw_transport_cargo_admin_theme_style() {
   wp_enqueue_style('vw-transport-cargo-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
   wp_enqueue_script('vw-transport-cargo-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'vw_transport_cargo_admin_theme_style');

//guidline for about theme
function vw_transport_cargo_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'vw-transport-cargo' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to VW Transport Cargo Theme', 'vw-transport-cargo' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','vw-transport-cargo'); ?></p>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy VW Transport Cargo at 20% Discount','vw-transport-cargo'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','vw-transport-cargo'); ?> ( <span><?php esc_html_e('vwpro20','vw-transport-cargo'); ?></span> ) </h4> 
			<div class="info-link">
				<a href="<?php echo esc_url( VW_TRANSPORT_CARGO_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'vw-transport-cargo' ); ?></a>
			</div>
		</div>
    </div>

    <div class="tab-sec">
		<div class="tab">
			<button class="tablinks" onclick="vw_transport_cargo_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'vw-transport-cargo' ); ?></button>
			<button class="tablinks" onclick="vw_transport_cargo_open_tab(event, 'block_pattern')"><?php esc_html_e( 'Setup With Block Pattern', 'vw-transport-cargo' ); ?></button>
		  	<button class="tablinks" onclick="vw_transport_cargo_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'vw-transport-cargo' ); ?></button>
		  	<button class="tablinks" onclick="vw_transport_cargo_open_tab(event, 'product_addons_editor')"><?php esc_html_e( 'Woocommerce Product Addons', 'vw-transport-cargo' ); ?></button>
		  	<button class="tablinks" onclick="vw_transport_cargo_open_tab(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'vw-transport-cargo' ); ?></button>
			<button class="tablinks" onclick="vw_transport_cargo_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'vw-transport-cargo' ); ?></button>
		</div>

		<?php
			$vw_transport_cargo_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$vw_transport_cargo_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = VW_Transport_Cargo_Plugin_Activation_Settings::get_instance();
				$vw_transport_cargo_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-transport-cargo-recommended-plugins">
				    <div class="vw-transport-cargo-action-list">
				        <?php if ($vw_transport_cargo_actions): foreach ($vw_transport_cargo_actions as $key => $vw_transport_cargo_actionValue): ?>
				                <div class="vw-transport-cargo-action" id="<?php echo esc_attr($vw_transport_cargo_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_transport_cargo_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_transport_cargo_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_transport_cargo_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','vw-transport-cargo'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($vw_transport_cargo_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'vw-transport-cargo' ); ?></h3>
				<hr class="h3hr">
			  	<p><?php esc_html_e('VW Transport Cargo is one of the best designed, feature-rich, elegant, powerful and flexible transportation WordPress themes which has an impressive layout that vividly displays services of a transport company in the most convincing way. It is made for transport companies, packers and movers, cargo hubs, freight services, logistics companies, delivery services, shipment firms, goods carrier and tracking services, warehouses and all businesses related to transportation and logistics industry. It has three types of layout designs which can change the look of your website from classy to modern and vice versa. This transport WordPress theme is fully responsive, all-browser compatible, multilingual and retina ready. It focuses on giving optimized rank in search engine results. The theme is embedded with social media icons to promote your services and brand. It is integrated with WooCommerce so selling things come handy; it is compatible with other third party plugins as well. VW Transport Cargo has several predesigned inner pages. It is compatible with the latest WordPress version to keep website updated. It has numerous slides in the slider area, call to action (CTA) buttons, video section on homepage and many widgetized area.','vw-transport-cargo'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'vw-transport-cargo' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'vw-transport-cargo' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_TRANSPORT_CARGO_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'vw-transport-cargo' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'vw-transport-cargo'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'vw-transport-cargo'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'vw-transport-cargo'); ?></a>
					</div>
					<hr>				
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'vw-transport-cargo'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'vw-transport-cargo'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_TRANSPORT_CARGO_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'vw-transport-cargo'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'vw-transport-cargo'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'vw-transport-cargo'); ?>  </p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_TRANSPORT_CARGO_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'vw-transport-cargo'); ?></a>
					</div>
			  		<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-transport-cargo' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-transport-cargo'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-welcome-write-blog"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_transport_cargo_topbar') ); ?>" target="_blank"><?php esc_html_e('Topbar Settings','vw-transport-cargo'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_transport_cargo_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Section','vw-transport-cargo'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-editor-table"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_transport_cargo_contact_section') ); ?>" target="_blank"><?php esc_html_e('Contact us Section','vw-transport-cargo'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-transport-cargo'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_transport_cargo_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-transport-cargo'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_transport_cargo_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-transport-cargo'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_transport_cargo_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-transport-cargo'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_transport_cargo_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-transport-cargo'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-transport-cargo'); ?></a>
								</div> 
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','vw-transport-cargo'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','vw-transport-cargo'); ?></p>
	                <ul>
	                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','vw-transport-cargo'); ?></span><?php esc_html_e(' Go to ','vw-transport-cargo'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','vw-transport-cargo'); ?></b></p>

	                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','vw-transport-cargo'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
	                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','vw-transport-cargo'); ?></span><?php esc_html_e(' Go to ','vw-transport-cargo'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','vw-transport-cargo'); ?></b></p>
					  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','vw-transport-cargo'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
	                  	<p><?php esc_html_e(' Once you are done with this, then follow the','vw-transport-cargo'); ?> <a class="doc-links" href="https://www.vwthemesdemo.com/docs/free-vw-transport-cargo/" target="_blank"><?php esc_html_e('Documentation','vw-transport-cargo'); ?></a></p>
	                </ul>
			  	</div>
			</div>
		</div>	

		<div id="block_pattern" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = VW_Transport_Cargo_Plugin_Activation_Settings::get_instance();
			$vw_transport_cargo_actions = $plugin_ins->recommended_actions;
			?>
				<div class="vw-transport-cargo-recommended-plugins">
				    <div class="vw-transport-cargo-action-list">
				        <?php if ($vw_transport_cargo_actions): foreach ($vw_transport_cargo_actions as $key => $vw_transport_cargo_actionValue): ?>
				                <div class="vw-transport-cargo-action" id="<?php echo esc_attr($vw_transport_cargo_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_transport_cargo_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_transport_cargo_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_transport_cargo_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" href="javascript:void(0);" get-start-tab-id="gutenberg-editor-tab"><?php esc_html_e('Skip','vw-transport-cargo'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="gutenberg-editor-tab" style="<?php echo esc_attr($vw_transport_cargo_plugin_custom_css); ?>">
				<div class="block-pattern-img">
				  	<h3><?php esc_html_e( 'Block Patterns', 'vw-transport-cargo' ); ?></h3>
					<hr class="h3hr">
					<p><?php esc_html_e('Follow the below instructions to setup Home page with Block Patterns.','vw-transport-cargo'); ?></p>
	              	<p><b><?php esc_html_e('Click on Below Add new page button >> Click on "+" Icon.','vw-transport-cargo'); ?></span></b></p>
	              	<div class="vw-transport-cargo-pattern-page">
				    	<a href="javascript:void(0)" class="vw-pattern-page-btn button-primary button"><?php esc_html_e('Add New Page','vw-transport-cargo'); ?></a>
				    </div>
				    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern1.png" alt="" />
				    	<p><b><?php esc_html_e('Click on Patterns Tab >> Click on Theme Name >> Click on Sections >> Publish.','vw-transport-cargo'); ?></span></b></p>
	              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern.png" alt="" />
	            </div>

              	<div class="block-pattern-link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-transport-cargo' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-transport-cargo'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-networking"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_transport_cargo_social_icon_settings') ); ?>" target="_blank"><?php esc_html_e('Social Icons','vw-transport-cargo'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-transport-cargo'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_transport_cargo_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-transport-cargo'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_transport_cargo_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-transport-cargo'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_transport_cargo_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-transport-cargo'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_transport_cargo_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-transport-cargo'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-transport-cargo'); ?></a>
								</div> 
							</div>
						</div>
				</div>					
	        </div>
		</div>

		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = VW_Transport_Cargo_Plugin_Activation_Settings::get_instance();
			$vw_transport_cargo_actions = $plugin_ins->recommended_actions;
			?>
				<div class="vw-transport-cargo-recommended-plugins">
				    <div class="vw-transport-cargo-action-list">
				        <?php if ($vw_transport_cargo_actions): foreach ($vw_transport_cargo_actions as $key => $vw_transport_cargo_actionValue): ?>
				                <div class="vw-transport-cargo-action" id="<?php echo esc_attr($vw_transport_cargo_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($vw_transport_cargo_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_transport_cargo_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_transport_cargo_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'vw-transport-cargo' ); ?></h3>
				<hr class="h3hr">
				<div class="vw-transport-cargo-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','vw-transport-cargo'); ?></a>
			    </div>

			    <div class="link-customizer-with-guternberg-ibtana">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-transport-cargo' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-transport-cargo'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-networking"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_transport_cargo_social_icon_settings') ); ?>" target="_blank"><?php esc_html_e('Social Icons','vw-transport-cargo'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-transport-cargo'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_transport_cargo_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-transport-cargo'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_transport_cargo_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-transport-cargo'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_transport_cargo_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-transport-cargo'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_transport_cargo_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-transport-cargo'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-transport-cargo'); ?></a>
								</div> 
							</div>
						</div>
				</div>
			<?php } ?>
		</div>

		<div id="product_addons_editor" class="tabcontent">
			<?php if(!class_exists('IEPA_Loader')){
				$plugin_ins = VW_Transport_Cargo_Plugin_Activation_Woo_Products::get_instance();
				$vw_transport_cargo_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-transport-cargo-recommended-plugins">
					    <div class="vw-transport-cargo-action-list">
					        <?php if ($vw_transport_cargo_actions): foreach ($vw_transport_cargo_actions as $key => $vw_transport_cargo_actionValue): ?>
					                <div class="vw-transport-cargo-action" id="<?php echo esc_attr($vw_transport_cargo_actionValue['id']);?>">
				                        <div class="action-inner plugin-activation-redirect">
				                            <h3 class="action-title"><?php echo esc_html($vw_transport_cargo_actionValue['title']); ?></h3>
				                            <div class="action-desc"><?php echo esc_html($vw_transport_cargo_actionValue['desc']); ?></div>
				                            <?php echo wp_kses_post($vw_transport_cargo_actionValue['link']); ?>
				                        </div>
					                </div>
					            <?php endforeach;
					        endif; ?>
					    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Woocommerce Products Blocks', 'vw-transport-cargo' ); ?></h3>
				<hr class="h3hr">
				<div class="vw-transport-cargo-pattern-page">
					<p><?php esc_html_e('Follow the below instructions to setup Products Templates.','vw-transport-cargo'); ?></p>
					<p><b><?php esc_html_e('1. First you need to activate these plugins','vw-transport-cargo'); ?></b></p>
						<p><?php esc_html_e('1. Ibtana - WordPress Website Builder ','vw-transport-cargo'); ?></p>
						<p><?php esc_html_e('2. Ibtana - Ecommerce Product Addons.','vw-transport-cargo'); ?></p>
						<p><?php esc_html_e('3. Woocommerce','vw-transport-cargo'); ?></p>

					<p><b><?php esc_html_e('2. Go To Dashboard >> Ibtana Settings >> Woocommerce Templates','vw-transport-cargo'); ?></span></b></p>
	              	<div class="vw-transport-cargo-pattern-page">
			    		<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-woocommerce-templates&ive_wizard_view=parent' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Woocommerce Templates','vw-transport-cargo'); ?></a>
			    	</div>
	              	<p><?php esc_html_e('You can create a template as you like.','vw-transport-cargo'); ?></span></p>
			    </div>
			<?php } ?>
		</div>

		<div id="theme_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'vw-transport-cargo' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('This transport WordPress theme is a brilliant choice to design any website in transport and logistics industry. Its design is fresh, elegant and eye-catching. It is a versatile and smart theme that will make a modern and performance focused website in just a few clicks. Although it is essentially made for transport companies, packers and movers, logistics services, freight services, shipment firm and similar businesses but it can very well become the skin for other websites also. As this transport WordPress theme is a responsive one, it will scale the layouts of varying screen sizes looking absolute beauty everywhere. It is of premium grade with clean and bug-free code yielding a secure website. You get the chance to choose between boxed, full-width and full screen layout for the website. Even though this transport theme is loaded with advanced features and functionality, it loads with a great speed to give superb website using experience to visitors.','vw-transport-cargo'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( VW_TRANSPORT_CARGO_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'vw-transport-cargo'); ?></a>
					<a href="<?php echo esc_url( VW_TRANSPORT_CARGO_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'vw-transport-cargo'); ?></a>
					<a href="<?php echo esc_url( VW_TRANSPORT_CARGO_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'vw-transport-cargo'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'vw-transport-cargo' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'vw-transport-cargo'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'vw-transport-cargo'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'vw-transport-cargo'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'vw-transport-cargo'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'vw-transport-cargo'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'vw-transport-cargo'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'vw-transport-cargo'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'vw-transport-cargo'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'vw-transport-cargo'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'vw-transport-cargo'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'vw-transport-cargo'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'vw-transport-cargo'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'vw-transport-cargo'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'vw-transport-cargo'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-transport-cargo'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-transport-cargo'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'vw-transport-cargo'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'vw-transport-cargo'); ?></td>
								<td class="table-img"><?php esc_html_e('15', 'vw-transport-cargo'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'vw-transport-cargo'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'vw-transport-cargo'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'vw-transport-cargo'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'vw-transport-cargo'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'vw-transport-cargo'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'vw-transport-cargo'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'vw-transport-cargo'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'vw-transport-cargo'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'vw-transport-cargo'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'vw-transport-cargo'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'vw-transport-cargo'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'vw-transport-cargo'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'vw-transport-cargo'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'vw-transport-cargo'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'vw-transport-cargo'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'vw-transport-cargo'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'vw-transport-cargo'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'vw-transport-cargo'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'vw-transport-cargo'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'vw-transport-cargo'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'vw-transport-cargo'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'vw-transport-cargo'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'vw-transport-cargo'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'vw-transport-cargo'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'vw-transport-cargo'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'vw-transport-cargo'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'vw-transport-cargo'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'vw-transport-cargo'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'vw-transport-cargo'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'vw-transport-cargo'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'vw-transport-cargo'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( VW_TRANSPORT_CARGO_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'vw-transport-cargo'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'vw-transport-cargo'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'vw-transport-cargo'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_TRANSPORT_CARGO_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'vw-transport-cargo'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'vw-transport-cargo'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'vw-transport-cargo'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_TRANSPORT_CARGO_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'vw-transport-cargo'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">		  		
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'vw-transport-cargo'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'vw-transport-cargo'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_TRANSPORT_CARGO_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'vw-transport-cargo'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'vw-transport-cargo'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'vw-transport-cargo'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_TRANSPORT_CARGO_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','vw-transport-cargo'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'vw-transport-cargo'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'vw-transport-cargo'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_TRANSPORT_CARGO_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'vw-transport-cargo'); ?></a>
				</div>
		  	</div>
		</div>
	</div>
</div>
<?php } ?>