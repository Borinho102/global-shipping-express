<?php

/* Template Name: Front Page Template */

get_header(); ?>

<div id="content">
	<?php get_template_part( 'core/sections/slider' ); ?>
	<?php if ( get_theme_mod('logistic_cargo_trucking_services_box_enable',false) ) : ?>
		<?php get_template_part( 'core/sections/services' ); ?>
	<?php endif; ?>
	<?php get_template_part( 'core/sections/additional-content' ); ?>
</div>

<?php get_footer(); ?>
