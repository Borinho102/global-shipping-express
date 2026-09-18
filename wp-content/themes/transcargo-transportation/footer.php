<footer>
  <div class="container">
    <?php
      if ( is_active_sidebar('transcargo-transportation-footer-sidebar')) {
        echo '<div class="row sidebar-area footer-area">';
          dynamic_sidebar('transcargo-transportation-footer-sidebar');
        echo '</div>';
      }
    ?>
    <div class="row">
      <div class="col-md-12">
        <p class="mb-0 py-3 text-center text-md-left">
          <?php
            if (!get_theme_mod('transcargo_transportation_footer_text') ) { ?>
              <a href="<?php echo esc_url('https://www.misbahwp.com/themes/free-transportation-wordpress-theme/'); ?>" target="_blank">
              <?php esc_html_e('Transcargo Transportation WordPress Theme ','transcargo-transportation'); ?></a>
            <?php } else {
              echo esc_html(get_theme_mod('transcargo_transportation_footer_text'));
            }
          ?>
          <?php if ( get_theme_mod('transcargo_transportation_copyright_enable', true) == true ) : ?>
            <?php
            /* translators: %s: Misbah WP */
            printf( esc_html__( 'by %s', 'transcargo-transportation' ), 'Misbah WP' ); ?>
            <a href="<?php echo esc_url(__('https://wordpress.org', 'transcargo-transportation' )); ?>" rel="generator"><?php  /* translators: %s: WordPress */  printf( esc_html__( ' | Proudly powered by %s', 'transcargo-transportation' ), 'WordPress' ); ?></a>
          <?php endif; ?>
        </p>
      </div>
    </div>
    <?php if ( get_theme_mod('transcargo_transportation_scroll_enable_setting', true) == true ) : ?>
      <div class="scroll-up">
          <a href="#tobottom"><i class="fa fa-arrow-up"></i></a>
      </div>
  <?php endif; ?>
  </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
