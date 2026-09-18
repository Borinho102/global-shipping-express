<?php
/**
 * The template part for displaying grid post
 *
 * @package VW Transport Cargo
 * @subpackage vw-transport-cargo
 * @since VW Transport Cargo 1.0
 */
?>
<?php 
  $vw_transport_cargo_archive_year  = get_the_time('Y'); 
  $vw_transport_cargo_archive_month = get_the_time('m'); 
  $vw_transport_cargo_archive_day   = get_the_time('d'); 
?>
<div class="col-lg-4 col-md-6">
	<article  id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
	    <div class="grid-post-main-box wow slideInLeft delay-1000" data-wow-duration="2s">
	      	<div class="box-image">
	          	<?php 
		            if(has_post_thumbnail() && get_theme_mod( 'vw_transport_cargo_featured_image_hide_show',true) == 1) { 
		              the_post_thumbnail(); 
		            }
	          	?>
	        </div>
	        <h2 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
	        <?php if( get_theme_mod( 'vw_transport_cargo_grid_postdate',true) == 1 || get_theme_mod( 'vw_transport_cargo_grid_author',true) == 1 || get_theme_mod( 'vw_transport_cargo_grid_comments',true) == 1) { ?>
	            <div class="post-info">
	              <?php if(get_theme_mod('vw_transport_cargo_grid_postdate',true)==1){ ?>
	                <i class="<?php echo esc_attr(get_theme_mod('vw_transport_cargo_grid_postdate_icon','fas fa-calendar-alt')); ?>"></i><span class="entry-date"><a href="<?php echo esc_url( get_day_link( $vw_transport_cargo_archive_year, $vw_transport_cargo_archive_month, $vw_transport_cargo_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><span><?php echo esc_html(get_theme_mod('vw_transport_cargo_grid_post_meta_field_separator', '|'));?></span> 
	              <?php } ?>

	              <?php if(get_theme_mod('vw_transport_cargo_grid_author',true)==1){ ?>
	                <i class="<?php echo esc_attr(get_theme_mod('vw_transport_cargo_grid_author_icon','far fa-user')); ?>"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span><span><?php echo esc_html(get_theme_mod('vw_transport_cargo_grid_post_meta_field_separator', '|'));?></span> 
	              <?php } ?>

	              <?php if(get_theme_mod('vw_transport_cargo_grid_comments',true)==1){ ?>
	                <i class="<?php echo esc_attr(get_theme_mod('vw_transport_cargo_grid_comments_icon','fa fa-comments')); ?>" aria-hidden="true"></i><span class="entry-comments"><?php comments_number( __('0 Comment', 'vw-transport-cargo'), __('0 Comments', 'vw-transport-cargo'), __('% Comments', 'vw-transport-cargo') ); ?> </span>
	              <?php } ?>
	              <hr>
	            </div>
          	<?php } ?>
	        <div class="new-text">
	        	<div class="entry-content">
	        		<p>
			          <?php $vw_transport_cargo_excerpt = get_the_excerpt(); echo esc_html( vw_transport_cargo_string_limit_words( $vw_transport_cargo_excerpt, esc_attr(get_theme_mod('vw_transport_cargo_related_posts_excerpt_number','30')))); ?> <?php echo esc_html( get_theme_mod('vw_transport_cargo_excerpt_suffix','') ); ?>
			        </p>
	        	</div>
	        </div>
	        <?php if( get_theme_mod('vw_transport_cargo_blog_button_text','Read More') != ''){ ?>
		        <div class="content-bttn">
		          <a class="view-more" href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('vw_transport_cargo_blog_button_text',__('Read More','vw-transport-cargo')));?><i class="<?php echo esc_attr(get_theme_mod('vw_transport_cargo_blog_button_icon','fa fa-angle-right')); ?>"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_transport_cargo_blog_button_text',__('Read More','vw-transport-cargo')));?></span></a>
		        </div>
		    <?php } ?>
	    </div>
	    <div class="clearfix"></div>
  	</article >
</div>