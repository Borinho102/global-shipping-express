<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'vw_transport_cargo_before_slider' ); ?>

  <?php if( get_theme_mod( 'vw_transport_cargo_slider_hide_show', false) == 1 || get_theme_mod( 'vw_transport_cargo_resp_slider_hide_show', false) == 1) { ?>

  <section id="slider">
    <?php if(get_theme_mod('vw_transport_cargo_slider_type', 'Default slider') == 'Default slider' ){ ?>
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="<?php echo esc_attr(get_theme_mod( 'vw_transport_cargo_slider_speed',4000)) ?>"> 
        <?php $vw_transport_cargo_slider_pages = array();
          for ( $count = 1; $count <= 3; $count++ ) {
            $mod = intval( get_theme_mod( 'vw_transport_cargo_slider_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $vw_transport_cargo_slider_pages[] = $mod;
            }
          }
          if( !empty($vw_transport_cargo_slider_pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $vw_transport_cargo_slider_pages,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              $i = 1;
        ?>     
        <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <?php if(has_post_thumbnail()){
                the_post_thumbnail();
              } else{?>
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/block-patterns/images/slider.png" alt="" />
              <?php } ?>
              <div class="carousel-caption">
                <div class="inner_carousel">
                  <h1 class=" wow zoomInDown delay-1000" data-wow-duration="2s"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                  <p class=" wow zoomInDown delay-1000" data-wow-duration="2s"><?php $vw_transport_cargo_excerpt = get_the_excerpt(); echo esc_html( vw_transport_cargo_string_limit_words( $vw_transport_cargo_excerpt, esc_attr(get_theme_mod('vw_transport_cargo_slider_excerpt_number','30')))); ?></p>
                  <?php if( get_theme_mod('vw_transport_cargo_slider_button_text','Read More') != ''){ ?>
                    <div class=" more-btn wow zoomInDown delay-1000" data-wow-duration="2s">
                      <a class="view-more" href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('vw_transport_cargo_slider_button_text',__('Read More','vw-transport-cargo')));?><i class="<?php echo esc_attr(get_theme_mod('vw_transport_cargo_slider_button_icon','fa fa-angle-right')); ?>"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_transport_cargo_slider_button_text',__('Read More','vw-transport-cargo')));?></span></a>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
            <div class="no-postfound"></div>
        <?php endif;
        endif;?>
        <a class="carousel-control-prev" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" role="button">
          <span class="carousel-control-prev-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Previous','vw-transport-cargo' );?></span>
        </a>
        <a class="carousel-control-next" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" role="button">
          <span class="carousel-control-next-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Next','vw-transport-cargo' );?></span>
        </a>
      </div>
      <div class="clearfix"></div>
        <?php } else if(get_theme_mod('vw_transport_cargo_slider_type', 'Advance slider') == 'Advance slider'){?>
            <?php echo do_shortcode(get_theme_mod('vw_transport_cargo_advance_slider_shortcode')); ?>
        <?php } ?>
  </section>

  <?php } ?>

  <?php do_action( 'vw_transport_cargo_after_slider' ); ?>

  <?php if ( get_theme_mod('vw_transport_cargo_call_text','') != "" | get_theme_mod('vw_transport_cargo_call','') != "" | get_theme_mod('vw_transport_cargo_email_text','') != "" | get_theme_mod('vw_transport_cargo_email','') != "" | get_theme_mod('vw_transport_cargo_time_text','') != "" | get_theme_mod('vw_transport_cargo_time','') != "" ) {?>
  <section id="contact_us" class=" wow slideInRight delay-1000" data-wow-duration="2s">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-3">
          <div class="row">
            <?php if ( get_theme_mod('vw_transport_cargo_call_text','') != "" | get_theme_mod('vw_transport_cargo_call','') != "" ) {?>
              <div class="col-lg-2 col-md-3">
                <i class="<?php echo esc_attr(get_theme_mod('vw_transport_cargo_phone_number_icon','fas fa-phone')); ?>"></i>
              </div>
              <div class="col-lg-10 col-md-9">
                <p class="bold-font"><?php echo esc_html( get_theme_mod('vw_transport_cargo_call_text','') ); ?></p>
                <p><a href="tel:<?php echo esc_attr( get_theme_mod('vw_transport_cargo_call','') ); ?>"><?php echo esc_html(get_theme_mod('vw_transport_cargo_call',''));?></a></p>
              </div>
            <?php }?>
          </div>
        </div>
        <div class="col-lg-4 col-md-5">
          <div class="row">
            <?php if ( get_theme_mod('vw_transport_cargo_email_text','') != "" | get_theme_mod('vw_transport_cargo_email','') != "" ) {?>
              <div class="col-lg-2 col-md-2">
                <i class="<?php echo esc_attr(get_theme_mod('vw_transport_cargo_email_adres_icon','fas fa-envelope')); ?>"></i>
              </div>
              <div class="col-lg-10 col-md-10">
                <p class="bold-font"><?php echo esc_html( get_theme_mod('vw_transport_cargo_email_text','') ); ?></p>
                <p><a href="mailto:<?php echo esc_attr(get_theme_mod('vw_transport_cargo_email',''));?>"><?php echo esc_html(get_theme_mod('vw_transport_cargo_email',''));?></a></p>
              </div>
            <?php }?>
          </div>
        </div>
        <div class="col-lg-4 col-md-4">
          <div class="row">
            <?php if ( get_theme_mod('vw_transport_cargo_time_text','') != "" | get_theme_mod('vw_transport_cargo_time','') != "" ) {?>
              <div class="col-lg-2 col-md-3">
                <i class="<?php echo esc_attr(get_theme_mod('vw_transport_cargo_timings_icon','far fa-clock')); ?>"></i>
              </div>
              <div class="col-lg-10 col-md-9">
                <p class="bold-font"><?php echo esc_html( get_theme_mod('vw_transport_cargo_time_text','') ); ?></p>
                <p><?php echo esc_html( get_theme_mod('vw_transport_cargo_time','') ); ?></p>
              </div>
            <?php }?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php } ?>

  <?php do_action( 'vw_transport_cargo_after_contact' ); ?>

  <section id="sec_second" class="wow bounceInDown delay-1000" data-wow-duration="2s">
    <div class="container">
      <div class="row m-0">
        <div class="col-lg-5 col-md-5">
          <section id="about">
            <?php $vw_transport_cargo_about_pages = array();
              $mod = absint( get_theme_mod( 'vw_transport_cargo_about_page' ));
              if ( 'page-none-selected' != $mod ) {
                $vw_transport_cargo_about_pages[] = $mod;
              }
              if( !empty($vw_transport_cargo_about_pages) ) :
                $args = array(
                  'post_type' => 'page',
                  'post__in' => $vw_transport_cargo_about_pages,
                  'orderby' => 'post__in'
                );
                $query = new WP_Query( $args );
                if ( $query->have_posts() ) :
                  while ( $query->have_posts() ) : $query->the_post(); ?>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
                    <hr>
                    <p><?php $vw_transport_cargo_excerpt = get_the_excerpt(); echo esc_html( vw_transport_cargo_string_limit_words( $vw_transport_cargo_excerpt, esc_attr(get_theme_mod('vw_transport_cargo_about_excerpt_number','30')))); ?></p>
                    <?php the_post_thumbnail(); ?>
                  <?php endwhile; ?>
              <?php else : ?>
                <div class="no-postfound"></div>
              <?php endif;
            endif; wp_reset_postdata() ?>
            <div class="clearfix"></div>
          </section>
        </div>
        <div class="col-lg-7 col-md-7">
          <section id="service-sec">        
            <?php
              $vw_transport_cargo_catData =  get_theme_mod('vw_transport_cargo_services','');
              if($vw_transport_cargo_catData){
              $page_query = new WP_Query(array( 'category_name' => esc_html($vw_transport_cargo_catData,'vw-transport-cargo'))); ?>
              <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                <div class="row cat_box">
                  <div class="col-lg-4 col-md-4">
                    <?php the_post_thumbnail(); ?>
                  </div>
                  <div class="col-lg-8 col-md-8">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a><span>______</span></h3>
                    <p><?php $vw_transport_cargo_excerpt = get_the_excerpt(); echo esc_html( vw_transport_cargo_string_limit_words( $vw_transport_cargo_excerpt, esc_attr(get_theme_mod('vw_transport_cargo_services_excerpt_number','30')))); ?></p>  
                  </div>
                </div>
              <?php endwhile;
              wp_reset_postdata();
            } ?>      
          </section>
        </div>
      </div>
    </div>
  </section>

  <?php do_action( 'vw_transport_cargo_after_services' ); ?>

  <div class="content-vw">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>