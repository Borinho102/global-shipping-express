<?php $args = array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'category_name' =>  get_theme_mod('logistic_cargo_trucking_services_category'),
  'posts_per_page' => get_theme_mod('logistic_cargo_trucking_services_number'),
); ?>

<div class="services">
  <div class="row m-0">
    <?php $logistic_cargo_trucking_arr_posts = new WP_Query( $args );
    if ( $logistic_cargo_trucking_arr_posts->have_posts() ) :
      while ( $logistic_cargo_trucking_arr_posts->have_posts() ) :
        $logistic_cargo_trucking_arr_posts->the_post();
        ?>
        <div class="col-lg-6 col-md-12 col-sm-12 services-outer-box">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 align-self-center p-0">
              <div class="box-image">
                <?php the_post_thumbnail(); ?>
                <h4 class="title mb-3 mt-0"><a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php the_title(); ?></a></h4>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 align-self-center p-0 text-center">
              <h4 class="title mb-3 mt-0"><a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php the_title(); ?></a></h4>
              <p><?php echo esc_html( wp_trim_words( get_the_content(), 20, '...' ) ); ?></p>
              <?php if ( get_theme_mod('logistic_cargo_trucking_services_button_text', '') == true ) : ?>
                <p class="slider_btn my-5">
                  <a href="<?php the_permalink(); ?>" class="py-3 px-4"><?php echo esc_html( get_theme_mod('logistic_cargo_trucking_services_button_text' ) ); ?></a>
                </p>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php
    endwhile;
    wp_reset_postdata();
    endif; ?>
  </div>
</div>