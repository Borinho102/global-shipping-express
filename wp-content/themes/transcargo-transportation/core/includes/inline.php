<?php


$transcargo_transportation_custom_css = '';

	/*---------------------------text-transform-------------------*/

	$transcargo_transportation_text_transform = get_theme_mod( 'menu_text_transform_transcargo_transportation','UPPERCASE');
    if($transcargo_transportation_text_transform == 'CAPITALISE'){

		$transcargo_transportation_custom_css .='#main-menu ul li a{';

			$transcargo_transportation_custom_css .='text-transform: capitalize ; font-size: 15px !important;';

		$transcargo_transportation_custom_css .='}';

	}else if($transcargo_transportation_text_transform == 'UPPERCASE'){

		$transcargo_transportation_custom_css .='#main-menu ul li a{';

			$transcargo_transportation_custom_css .='text-transform: uppercase ; font-size: 15px !important';

		$transcargo_transportation_custom_css .='}';

	}else if($transcargo_transportation_text_transform == 'LOWERCASE'){

		$transcargo_transportation_custom_css .='#main-menu ul li a{';

			$transcargo_transportation_custom_css .='text-transform: lowercase ; font-size: 15px !important';

		$transcargo_transportation_custom_css .='}';
	}

	/*---------------------------Container Width-------------------*/

$transcargo_transportation_container_width = get_theme_mod('transcargo_transportation_container_width');

		$transcargo_transportation_custom_css .='body{';

			$transcargo_transportation_custom_css .='width: '.esc_attr($transcargo_transportation_container_width).'%; margin: auto';

		$transcargo_transportation_custom_css .='}';

		/*---------------------------related Product Settings-------------------*/

	$transcargo_transportation_related_product_setting = get_theme_mod('transcargo_transportation_related_product_setting',true);

		if($transcargo_transportation_related_product_setting == false){

			$transcargo_transportation_custom_css .='.related.products, .related h2{';

				$transcargo_transportation_custom_css .='display: none;';

			$transcargo_transportation_custom_css .='}';
		}

/*---------------------------Scroll to Top Alignment Settings-------------------*/

	$transcargo_transportation_scroll_top_position = get_theme_mod( 'transcargo_transportation_scroll_top_position','Right');

	if($transcargo_transportation_scroll_top_position == 'Right'){

		$transcargo_transportation_custom_css .='.scroll-up{';

			$transcargo_transportation_custom_css .='right: 20px;';

		$transcargo_transportation_custom_css .='}';

	}else if($transcargo_transportation_scroll_top_position == 'Left'){

		$transcargo_transportation_custom_css .='.scroll-up{';

			$transcargo_transportation_custom_css .='left: 20px;';

		$transcargo_transportation_custom_css .='}';

	}else if($transcargo_transportation_scroll_top_position == 'Center'){

		$transcargo_transportation_custom_css .='.scroll-up{';

			$transcargo_transportation_custom_css .='right: 50%;left: 50%;';

		$transcargo_transportation_custom_css .='}';
	}

	/*---------------------------Slider-content-alignment-------------------*/

	$transcargo_transportation_slider_content_alignment = get_theme_mod( 'transcargo_transportation_slider_content_alignment','LEFT-ALIGN');

	 if($transcargo_transportation_slider_content_alignment == 'LEFT-ALIGN'){

			$transcargo_transportation_custom_css .='.blog_box{';

				$transcargo_transportation_custom_css .='text-align:left;';

			$transcargo_transportation_custom_css .='}';


		}else if($transcargo_transportation_slider_content_alignment == 'CENTER-ALIGN'){

			$transcargo_transportation_custom_css .='.blog_box{';

				$transcargo_transportation_custom_css .='text-align:center; right:30%; left:30%';

			$transcargo_transportation_custom_css .='}';


		}else if($transcargo_transportation_slider_content_alignment == 'RIGHT-ALIGN'){

			$transcargo_transportation_custom_css .='.blog_box{';

				$transcargo_transportation_custom_css .='text-align:right; right:15%; left:55%';

			$transcargo_transportation_custom_css .='}';

		}


