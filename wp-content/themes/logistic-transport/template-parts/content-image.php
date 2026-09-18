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
<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="services-box mb-4">
    <?php if( get_theme_mod( 'logistic_transport_feature_image_hide',true) != '') { ?>    
      <div class="service-image">
        <a href="<?php echo esc_url( get_permalink() ); ?>"><?php 
          if(has_post_thumbnail()) { 
            the_post_thumbnail(); 
          }
          ?>
        </a>
      </div>
    <?php }?>
    <div class="tc-category-section">
    <div class="tc-category">
      <?php the_category(); ?>
    </div>
    <h2 class="py-3"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
    <div class="lower-box">
      <?php if( get_theme_mod( 'logistic_transport_date_hide',true) != '' || get_theme_mod( 'logistic_transport_comment_hide',true) != '' || get_theme_mod( 'logistic_transport_author_hide',true) != '' || get_theme_mod( 'logistic_transport_time_hide',true) != '') { ?>
        <div class="metabox ps-3 mb-3">
          <?php if( get_theme_mod( 'logistic_transport_date_hide',true) != '') { ?>
            <span class="entry-date me-2 "><i class="far fa-calendar-alt me-1"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
          <?php } ?>
          <?php if( get_theme_mod( 'logistic_transport_author_hide',true) != '') { ?>
            <span class="entry-author me-2 "><i class="fas fa-user me-1"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
          <?php } ?>
          <?php if( get_theme_mod( 'logistic_transport_comment_hide',true) != '') { ?>
            <span class="entry-comments me-2 "> <i class="fas fa-comments me-1"></i><?php comments_number( __('0 Comments','logistic-transport'), __('0 Comments','logistic-transport'), __('% Comments','logistic-transport') ); ?></span>
          <?php } ?>
          <?php if( get_theme_mod( 'logistic_transport_time_hide',false) != '') { ?>
            <span class="entry-time me-2 "><i class="fas fa-clock me-1"></i> <?php echo esc_html( get_the_time() ); ?></span>
          <?php }?>
        </div>
      <?php } ?>
      <?php if(get_theme_mod('logistic_transport_post_content') == 'Full Content'){ ?>
        <?php the_content(); ?>
      <?php }
      if(get_theme_mod('logistic_transport_post_content', 'Excerpt Content') == 'Excerpt Content'){ ?>
        <?php if(get_the_excerpt()) { ?>
          <p><?php $logistic_transport_excerpt = get_the_excerpt(); echo esc_html( logistic_transport_string_limit_words( $logistic_transport_excerpt, esc_attr(get_theme_mod('logistic_transport_post_excerpt_length','20')))); ?><?php echo esc_html( get_theme_mod('logistic_transport_button_excerpt_suffix','[...]') ); ?></p>
        <?php }?>
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