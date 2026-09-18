<?php
/**
 * The template part for header
 *
 * @package VW Transport Cargo 
 * @subpackage vw_transport_cargo
 * @since VW Transport Cargo 1.0
 */
?>

<div class="main-header">
  <div class="container">
    <div class="row m-0">
      <div class="col-lg-4 col-md-4 p-0 align-self-center">
        <?php dynamic_sidebar('social-widget'); ?>
      </div>
      <div class="col-lg-4 col-md-4 align-self-center">
        <div class="logo">
          <div class="logo-inner">
            <?php if ( has_custom_logo() ) : ?>
              <div class="site-logo"><?php the_custom_logo(); ?></div>
            <?php endif; ?>
            <?php $blog_info = get_bloginfo( 'name' ); ?>
              <?php if ( ! empty( $blog_info ) ) : ?>
                <?php if ( is_front_page() && is_home() ) : ?>
                  <?php if( get_theme_mod('vw_transport_cargo_logo_title_hide_show',true) == 1){ ?>
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                  <?php } ?>
                <?php else : ?>
                  <?php if( get_theme_mod('vw_transport_cargo_logo_title_hide_show',true) == 1){ ?>
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                  <?php } ?>
                <?php endif; ?>
              <?php endif; ?>
              <?php
                $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) :
              ?>
              <?php if( get_theme_mod('vw_transport_cargo_tagline_hide_show',false) == 1){ ?>
                <p class="site-description">
                  <?php echo esc_html($description); ?>
                </p>
              <?php } ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 align-self-center">
        <div class="top-btn">
          <?php if( get_theme_mod( 'vw_transport_cargo_button_text') != '' || get_theme_mod( 'vw_transport_cargo_button_url' )!= '' ) { ?>
            <a href="<?php echo esc_url(get_theme_mod('vw_transport_cargo_button_url',''));?>"><?php echo esc_html(get_theme_mod('vw_transport_cargo_button_text',''));?><span class="screen-reader-text"><?php esc_html_e( 'REQUEST A QUOTE','vw-transport-cargo' );?></span></a>
          <?php }?>
        </div>
      </div>
      <?php if( get_theme_mod('vw_transport_cargo_search_hide_show',true) == 1){ ?>
        <div class="col-lg-1 col-md-1 align-self-center">
          <div class="search-box">
            <span><a href="#"><i class="<?php echo esc_attr(get_theme_mod('vw_transport_cargo_search_icon','fas fa-search')); ?>"></i></a></span>
          </div>
        </div>
      <?php }?>
    </div>
    <div class="serach_outer">
      <div class="closepop"><a href="#maincontent"><i class="<?php echo esc_attr(get_theme_mod('vw_transport_cargo_search_close_icon','fa fa-window-close')); ?>"></i></a></div>
      <div class="serach_inner">
        <?php get_search_form(); ?>
      </div>
    </div>
     <div class="header-menu <?php if( get_theme_mod( 'vw_transport_cargo_sticky_header', false) == 1 || get_theme_mod( 'vw_transport_cargo_stickyheader_hide_show', false) == 1) { ?> header-sticky"<?php } else { ?>close-sticky <?php } ?>">
      <?php get_template_part( 'template-parts/header/navigation' ); ?>
    </div>
  </div>
</div>