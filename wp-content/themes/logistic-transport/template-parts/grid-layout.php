<?php
/**
 * The template part for displaying slider
 *
 * @package Logistic Transport
 * @subpackage logistic_transport
 * @since Logistic Transport 1.0
 */
?>
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?>
<div class="col-lg-4 col-md-4">
  <article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
    <div class="services-box mb-4">    
      <?php if(has_post_thumbnail() && get_theme_mod( 'logistic_transport_feature_image_hide',true) != '') { ?>
        <div class="service-image">
          <a href="<?php echo esc_url( get_permalink() ); ?>">
            <?php the_post_thumbnail(); ?>
            <span class="screen-reader-text"><?php the_title(); ?></span>
          </a>
        </div>
      <?php }?>
      <div class="tc-category-section">
      <div class="tc-category">
      <?php the_category(); ?>
    </div>
      <h2 class="py-3"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h2>
      <div class="lower-box">
        <?php if(get_the_excerpt()) { ?>
          <p><?php $logistic_transport_excerpt = get_the_excerpt(); echo esc_html( logistic_transport_string_limit_words( $logistic_transport_excerpt, esc_attr(get_theme_mod('logistic_transport_post_excerpt_length','20')))); ?><?php echo esc_html( get_theme_mod('logistic_transport_button_excerpt_suffix','[...]') ); ?></p>
        <?php }?>
        <?php if ( get_theme_mod('logistic_transport_post_button_text','Read More') != '' ) {?>
          <div class="read-btn mt-4">
            <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small" ><?php echo esc_html( get_theme_mod('logistic_transport_post_button_text',__( 'Read More','logistic-transport' )) ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('logistic_transport_post_button_text',__( 'Read More','logistic-transport' )) ); ?></span>
            </a>
          </div>
        <?php }?>
      </div>
     </div>
   </div>
  </article>
</div>