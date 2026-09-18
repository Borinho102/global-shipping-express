<?php
/**
 * The header for our theme
 *
 * @subpackage Movers and Packers
 * @since 1.0
 * @version 0.1
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
}?>

<a class="screen-reader-text skip-link" href="#skip-content"><?php esc_html_e( 'Skip to content', 'movers-and-packers' ); ?></a>

<div id="header">
	<?php if(get_theme_mod('movers_and_packers_topbar_text') != '' || get_theme_mod('movers_and_packers_phone_number') != '' || get_theme_mod('movers_and_packers_email_address') != '' || get_theme_mod('movers_and_packers_facebook_url') != '' || get_theme_mod('movers_and_packers_instagram_url') != '' || get_theme_mod('movers_and_packers_twitter_url') != '' || get_theme_mod('movers_and_packers_linkedin_url') != '') {?>
		<div class="top-header">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-md-12">
						<?php if (get_theme_mod('movers_and_packers_topbar_text') != ''){ ?>
							<p class="topbar-text mb-0 text-lg-left text-center"><?php echo esc_html(get_theme_mod('movers_and_packers_topbar_text')); ?></p>
						<?php }?>
					</div>
					<div class="col-lg-2 col-md-4 contact text-center">
						<?php if (get_theme_mod('movers_and_packers_phone_number') != ''){ ?>
							<a href="tel:<?php echo esc_attr(get_theme_mod('movers_and_packers_phone_number')); ?>"><i class="fas fa-phone mr-2"></i><?php echo esc_html(get_theme_mod('movers_and_packers_phone_number')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('movers_and_packers_phone_number')); ?></span></a>
						<?php }?>
					</div>
					<div class="col-lg-3 col-md-4 contact text-center">
						<?php if (get_theme_mod('movers_and_packers_email_address') != ''){ ?>
							<a href="mailto:<?php echo esc_attr(get_theme_mod('movers_and_packers_email_address')); ?>"><i class="far fa-envelope mr-2"></i><?php echo esc_html(get_theme_mod('movers_and_packers_email_address')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('movers_and_packers_email_address')); ?></span></a>
						<?php }?>
					</div>
					<div class="col-lg-2 col-md-4 social-icons text-lg-right text-center">
						<?php if(get_theme_mod('movers_and_packers_facebook_url') != '') { ?>
							<a href="<?php echo esc_url(get_theme_mod('movers_and_packers_facebook_url')); ?>"><i class="fab fa-facebook-f"></i><span class="screen-reader-text"><?php echo esc_html('Facebook', 'movers-and-packers'); ?></span></a>
						<?php }?>
						<?php if(get_theme_mod('movers_and_packers_instagram_url') != '') { ?>
							<a href="<?php echo esc_url(get_theme_mod('movers_and_packers_instagram_url')); ?>"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php echo esc_html('Instagram', 'movers-and-packers'); ?></span></a>
						<?php }?>
						<?php if(get_theme_mod('movers_and_packers_twitter_url') != '') { ?>
							<a href="<?php echo esc_url(get_theme_mod('movers_and_packers_twitter_url')); ?>"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php echo esc_html('Twitter', 'movers-and-packers'); ?></span></a>
						<?php }?>
						<?php if(get_theme_mod('movers_and_packers_linkedin_url') != '') { ?>
							<a href="<?php echo esc_url(get_theme_mod('movers_and_packers_linkedin_url')); ?>"><i class="fab fa-linkedin-in"></i><span class="screen-reader-text"><?php echo esc_html('Linkedin', 'movers-and-packers'); ?></span></a>
						<?php }?>
					</div>
				</div>
			</div>
		</div>
	<?php }?>
	<div class="menu-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-5 col-9 align-self-center">
					<div class="logo">
						<?php if ( has_custom_logo() ) : ?>
		            		<?php the_custom_logo(); ?>
			            <?php endif; ?>
		             	<?php if (get_theme_mod('movers_and_packers_show_site_title',true)) {?>
		          			<?php $blog_info = get_bloginfo( 'name' ); ?>
			                <?php if ( ! empty( $blog_info ) ) : ?>
			                  	<?php if ( is_front_page() && is_home() ) : ?>
			                    	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			                  	<?php else : ?>
		                      		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
		                  		<?php endif; ?>
			                <?php endif; ?>
			            <?php }?>
			            <?php if (get_theme_mod('movers_and_packers_show_tagline',true)) {?>
			                <?php $description = get_bloginfo( 'description', 'display' );
		                  	if ( $description || is_customize_preview() ) : ?>
			                  	<p class="site-description"><?php echo esc_html($description); ?></p>
		              		<?php endif; ?>
		          		<?php }?>
					</div>
				</div>
				<div class="col-lg-9 col-md-7 col-3 align-self-center">
					<div class="menu-bar">
						<div class="toggle-menu responsive-menu text-right">
							<?php if(has_nav_menu('primary')){ ?>
				            	<button onclick="movers_and_packers_open()" role="tab" class="mobile-menu"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','movers-and-packers'); ?></span></button>
				            <?php }?>
				        </div>
						<div id="sidelong-menu" class="nav sidenav text-lg-right">
			                <nav id="primary-site-navigation" class="nav-menu" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'movers-and-packers' ); ?>">
			                  	<?php if(has_nav_menu('primary')){
				                    wp_nav_menu( array( 
										'theme_location' => 'primary',
										'container_class' => 'main-menu-navigation clearfix' ,
										'menu_class' => 'clearfix',
										'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
										'fallback_cb' => 'wp_page_menu',
				                    ) ); 
			                  	} ?>
			                  	<a href="javascript:void(0)" class="closebtn responsive-menu" onclick="movers_and_packers_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','movers-and-packers'); ?></span></a>
			                </nav>
			            </div>
			        </div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php if(is_singular()) {?>
	<div id="inner-pages-header">
		<div class="header-overlay"></div>
	    <div class="header-content">
		    <div class="container text-center"> 
		      	<h1><?php single_post_title(); ?></h1>
		      	<div class="theme-breadcrumb mt-3">
					<?php movers_and_packers_breadcrumb();?>
				</div>
		    </div>
		</div>
	</div>
<?php } ?>