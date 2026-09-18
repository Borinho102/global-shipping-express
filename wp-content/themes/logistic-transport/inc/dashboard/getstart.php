<?php
//about theme info
add_action( 'admin_menu', 'logistic_transport_gettingstarted' );
function logistic_transport_gettingstarted() {    	
	add_theme_page( esc_html__('Get Started', 'logistic-transport'), esc_html__('Get Started', 'logistic-transport'), 'edit_theme_options', 'logistic_transport_guide', 'logistic_transport_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function logistic_transport_admin_theme_style() {
   wp_enqueue_style('logistic-transport-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/dashboard/getstart.css');
   wp_enqueue_script('tabs', esc_url(get_template_directory_uri()) . '/inc/dashboard/js/tab.js');
}
add_action('admin_enqueue_scripts', 'logistic_transport_admin_theme_style');

//guidline for about theme
function logistic_transport_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'logistic-transport' );
?>

<div class="wrapper-info">  
    <div class="tab-sec">
		<div class="tab">
			<div class="logo">
				<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/logo.png" alt="" />
			</div>
			<button role="tab" class="tablinks home" onclick="logistic_transport_openCity(event, 'tc_index')"><?php esc_html_e( 'Free Theme Information', 'logistic-transport' ); ?></button>
		  	<button role="tab" class="tablinks" onclick="logistic_transport_openCity(event, 'tc_pro')"><?php esc_html_e( 'Premium Theme Information', 'logistic-transport' ); ?></button>
		  	<button role="tab" class="tablinks" onclick="logistic_transport_openCity(event, 'tc_create')"><?php esc_html_e( 'Theme Support', 'logistic-transport' ); ?></button>				
		</div>

		<div  id="tc_index" class="tabcontent">
			<h2><?php esc_html_e( 'Welcome to Logistic Transport Theme', 'logistic-transport' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
			<hr>
			<div class="info-link">
				<a href="<?php echo esc_url( LOGISTIC_TRANSPORT_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'logistic-transport' ); ?></a>
				<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'logistic-transport'); ?></a>
				<a class="get-pro" href="<?php echo esc_url( LOGISTIC_TRANSPORT_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'logistic-transport'); ?></a>
			</div>
			<div class="col-tc-6">
				<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/screenshot.png" alt="" />
			</div>
			<div class="col-tc-6">
				<P><?php esc_html_e( 'Logistics Transport is a smart, dynamic, reliable, robust and beautiful transport and logistics WordPress theme. It is made for transportation companies, packers and movers, logistic services, delivery and shipping companies, heavy equipment transport, logistic department, trailer, courier, delivery company, delivery service, transport agency, relocation services, shipment firms, goods carrier and tracking services, warehouses, postal services, home shifters, contractor, localization, freight service provider, cargo hubs, Sea Freight, Warehouse packers, truck, and multipurpose business, track your parcel, supplier, express delivery, shipment services, proffesional websites, personel websites, home movers, flat mover, heavy duty trailers, tower cranes, heavy machinaries, delivery, fleet, Routes, trucking, Road Freight, air freight, warehousing and carrier services. It proves to be the best skin to provide a professional and interactive design throughout the website, never disappointing you with its performance and the vast collection of options it has to design the website easily. It has multiple features like responsive, footer-widgets, full width template, sticky-post, one-coulmn page layout, minimal design, personalization options, social media options, and many more. You can translate this theme into different languages such as Arabic, German, Spanish, French, Italian, Russian, Turkish and Chinese.', 'logistic-transport' ); ?></P>
			</div>
    	</div>

		<div id="tc_pro" class="tabcontent">
			<h3><?php esc_html_e( 'Logistic Transport Theme Information', 'logistic-transport' ); ?></h3>
			<hr>
			<div class="pro-image">
				<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/resize.png" alt="" />
			</div>
			<div class="info-link-pro">
				<p><a href="<?php echo esc_url( LOGISTIC_TRANSPORT_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Buy Now', 'logistic-transport' ); ?></a></p>
				<p><a href="<?php echo esc_url( LOGISTIC_TRANSPORT_LIVE_DEMO ); ?>" target="_blank"> <?php esc_html_e( 'Live Demo', 'logistic-transport' ); ?></a></p>
				<p><a href="<?php echo esc_url( LOGISTIC_TRANSPORT_PRO_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Pro Documentation', 'logistic-transport' ); ?></a></p>
			</div>
			<div class="col-pro-5">
				<h4><?php esc_html_e( 'Logistic Transport Pro Theme', 'logistic-transport' ); ?></h4>
				<P><?php esc_html_e( 'The transport WordPress theme is smart, engaging, enticing and feature-rich with a great use for logistics, packers and movers, warehousing and freight businesses. It focuses on several theme designing tools as well as business-boosting aspects, relieving you from the responsibilities that come with a website. As it has a responsive layout, your website will get easy access to everyone’s mobile, tablet and desktop. It is cross-browser compatible, translation ready and RTL supportive. This transport WordPress theme is easy to use and even easier to customize through theme customizer which allows changing its color, background, menu, logo, and layouts of the header, footer, sidebars, blogs and pages in just a few clicks. Our developers have used Font Awesome icons related to logistics to make the website look more interesting. The theme is designed keeping in mind the needs of a transportation website and sections are included accordingly. Each section has the option to switch it on or off anytime. It has a rich set of shortcodes to include specific functionality without involving in its coding part. This transport WP theme offers premium membership to its users wherein you will get access to regular theme updates and our dedicated support to help you out with your theme-related queries.', 'logistic-transport' ); ?></P>		
			</div>
			<div class="col-pro-6">				
				<h4><?php esc_html_e( 'Theme Features', 'logistic-transport' ); ?></h4>
				<ul>
					<li><?php esc_html_e( 'Theme Options using Customizer API', 'logistic-transport' ); ?></li>
					<li><?php esc_html_e( 'Responsive design', 'logistic-transport' ); ?></li>
					<li><?php esc_html_e( 'Favicon, Logo, title and tagline customization', 'logistic-transport' ); ?></li>
					<li><?php esc_html_e( 'Advanced Color options', 'logistic-transport' ); ?></li>
					<li><?php esc_html_e( '100+ Font Family Options', 'logistic-transport' ); ?></li>
					<li><?php esc_html_e( 'Background Image Option', 'logistic-transport' ); ?></li>
					<li><?php esc_html_e( 'Simple Menu Option', 'logistic-transport' ); ?></li>
					<li><?php esc_html_e( 'Additional section for products', 'logistic-transport' ); ?></li>
					<li><?php esc_html_e( 'Enable-Disable options on All sections', 'logistic-transport' ); ?></li>
					<li><?php esc_html_e( 'Home Page setting for different sections', 'logistic-transport' ); ?></li>
					<li><?php esc_html_e( 'Advance Slider with unlimited slides', 'logistic-transport' ); ?></li>
					<li><?php esc_html_e( 'Partner Section', 'logistic-transport' ); ?></li>
					<li><?php esc_html_e( 'Promotional Banner Section for Products', 'logistic-transport' ); ?></li>
					<li><?php esc_html_e( 'Seperate Newsletter Section', 'logistic-transport' ); ?></li>
					<li><?php esc_html_e( 'Text and call to action button for each slides', 'logistic-transport' ); ?></li>
					<li><?php esc_html_e( 'Pagination option', 'logistic-transport' ); ?></li>
					<li><?php esc_html_e( 'Custom CSS option', 'logistic-transport' ); ?></li>
					<li><?php esc_html_e( 'Translations Ready', 'logistic-transport' ); ?></li>
					<li><?php esc_html_e( 'Custom Backgrounds, Colors, Headers, Logo & Menu', 'logistic-transport' ); ?></li>
					<li><?php esc_html_e( 'Customizable Home Page', 'logistic-transport' ); ?></li>
					<li><?php esc_html_e( 'Full-Width Template', 'logistic-transport' ); ?></li>
					<li><?php esc_html_e( 'Footer Widgets & Editor Style', 'logistic-transport' ); ?></li>
					<li><?php esc_html_e( 'Banner & Post Type Plugin Functionality', 'logistic-transport' ); ?></li>
					<li><?php esc_html_e( 'Woo Commerce Compatible', 'logistic-transport' ); ?></li>
					<li><?php esc_html_e( 'Multiple Inner Page Templates', 'logistic-transport' ); ?></li>
					<li><?php esc_html_e( 'Product Sliders', 'logistic-transport' ); ?></li>
					<li><?php esc_html_e( 'Testimonial Slider', 'logistic-transport' ); ?></li>
					<li><?php esc_html_e( 'Testimonial Posttype', 'logistic-transport' ); ?></li>
					<li><?php esc_html_e( 'Testimonial Listing With Shortcode', 'logistic-transport' ); ?></li>
					<li><?php esc_html_e( 'Contact page template', 'logistic-transport' ); ?></li>
					<li><?php esc_html_e( 'Contact Widget', 'logistic-transport' ); ?></li>
					<li><?php esc_html_e( 'Advance Social Media Feature', 'logistic-transport' ); ?></li>
				</ul>				
			</div>
		</div>	

		<div id="tc_create" class="tabcontent">
			<h3><?php esc_html_e( 'Support', 'logistic-transport' ); ?></h3>
			<hr>
			<div class="tab-cont">
		  		<h4><?php esc_html_e( 'Need Support?', 'logistic-transport' ); ?></h4>				
				<div class="info-link-support">
					<P><?php esc_html_e( 'Our team is obliged to help you in every way possible whenever you face any type of difficulties and doubts.', 'logistic-transport' ); ?></P>
					<a href="<?php echo esc_url( LOGISTIC_TRANSPORT_SUPPORT ); ?>" target="_blank"> <?php esc_html_e( 'Support Forum', 'logistic-transport' ); ?></a>
				</div>
			</div>
			<div class="tab-cont">	
				<h4><?php esc_html_e('Reviews', 'logistic-transport'); ?></h4>				
				<div class="info-link-support">
					<P><?php esc_html_e( 'It is commendable to have such a theme inculcated with amazing features and robust functionalities. I feel grateful to recommend this theme to one and all.', 'logistic-transport' ); ?></P>
					<a href="<?php echo esc_url( LOGISTIC_TRANSPORT_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'logistic-transport'); ?></a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>