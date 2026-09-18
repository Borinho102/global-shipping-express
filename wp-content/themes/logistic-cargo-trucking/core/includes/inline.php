<?php


$logistic_cargo_trucking_custom_css = '';

	/*---------------------------text-transform-------------------*/

	$logistic_cargo_trucking_text_transform = get_theme_mod( 'menu_text_transform_logistic_cargo_trucking','UPPERCASE');
    if($logistic_cargo_trucking_text_transform == 'CAPITALISE'){

		$logistic_cargo_trucking_custom_css .='#main-menu ul li a{';

			$logistic_cargo_trucking_custom_css .='text-transform: capitalize ; font-size: 15px;';

		$logistic_cargo_trucking_custom_css .='}';

	}else if($logistic_cargo_trucking_text_transform == 'UPPERCASE'){

		$logistic_cargo_trucking_custom_css .='#main-menu ul li a{';

			$logistic_cargo_trucking_custom_css .='text-transform: uppercase ; font-size: 15px;';

		$logistic_cargo_trucking_custom_css .='}';

	}else if($logistic_cargo_trucking_text_transform == 'LOWERCASE'){

		$logistic_cargo_trucking_custom_css .='#main-menu ul li a{';

			$logistic_cargo_trucking_custom_css .='text-transform: lowercase ; font-size: 15px;';

		$logistic_cargo_trucking_custom_css .='}';
	}

	/*---------------------------Container Width-------------------*/

$logistic_cargo_trucking_container_width = get_theme_mod('logistic_cargo_trucking_container_width');

		$logistic_cargo_trucking_custom_css .='body{';

			$logistic_cargo_trucking_custom_css .='width: '.esc_attr($logistic_cargo_trucking_container_width).'%; margin: auto;';

		$logistic_cargo_trucking_custom_css .='}';


		/*---------------------------Slider-content-alignment-------------------*/


		$logistic_cargo_trucking_slider_content_alignment = get_theme_mod( 'logistic_cargo_trucking_slider_content_alignment','CENTER-ALIGN');

		 if($logistic_cargo_trucking_slider_content_alignment == 'LEFT-ALIGN'){

				$logistic_cargo_trucking_custom_css .='.blog_inner_box{';

					$logistic_cargo_trucking_custom_css .='text-align:left;';

				$logistic_cargo_trucking_custom_css .='}';


			}else if($logistic_cargo_trucking_slider_content_alignment == 'CENTER-ALIGN'){

				$logistic_cargo_trucking_custom_css .='.blog_inner_box{';

					$logistic_cargo_trucking_custom_css .='text-align:center;';

				$logistic_cargo_trucking_custom_css .='}';


			}else if($logistic_cargo_trucking_slider_content_alignment == 'RIGHT-ALIGN'){

				$logistic_cargo_trucking_custom_css .='.blog_inner_box{';

					$logistic_cargo_trucking_custom_css .='text-align:right;';

				$logistic_cargo_trucking_custom_css .='}';

			}

	/*---------------------------Copyright Text alignment-------------------*/

$logistic_cargo_trucking_copyright_text_alignment = get_theme_mod( 'logistic_cargo_trucking_copyright_text_alignment','LEFT-ALIGN');

 if($logistic_cargo_trucking_copyright_text_alignment == 'LEFT-ALIGN'){

		$logistic_cargo_trucking_custom_css .='.copy-text p{';

			$logistic_cargo_trucking_custom_css .='text-align:left;';

		$logistic_cargo_trucking_custom_css .='}';


	}else if($logistic_cargo_trucking_copyright_text_alignment == 'CENTER-ALIGN'){

		$logistic_cargo_trucking_custom_css .='.copy-text p{';

			$logistic_cargo_trucking_custom_css .='text-align:center;';

		$logistic_cargo_trucking_custom_css .='}';


	}else if($logistic_cargo_trucking_copyright_text_alignment == 'RIGHT-ALIGN'){

		$logistic_cargo_trucking_custom_css .='.copy-text p{';

			$logistic_cargo_trucking_custom_css .='text-align:right;';

		$logistic_cargo_trucking_custom_css .='}';

	}

	/*---------------------------related Product Settings-------------------*/

	$logistic_cargo_trucking_related_product_setting = get_theme_mod('logistic_cargo_trucking_related_product_setting',true);

		if($logistic_cargo_trucking_related_product_setting == false){

			$logistic_cargo_trucking_custom_css .='.related.products, .related h2{';

				$logistic_cargo_trucking_custom_css .='display: none;';

			$logistic_cargo_trucking_custom_css .='}';
		}

/*---------------------------Scroll to Top Alignment Settings-------------------*/

	$logistic_cargo_trucking_scroll_top_position = get_theme_mod( 'logistic_cargo_trucking_scroll_top_position','Right');

	if($logistic_cargo_trucking_scroll_top_position == 'Right'){

		$logistic_cargo_trucking_custom_css .='.scroll-up{';

			$logistic_cargo_trucking_custom_css .='right: 20px;';

		$logistic_cargo_trucking_custom_css .='}';

	}else if($logistic_cargo_trucking_scroll_top_position == 'Left'){

		$logistic_cargo_trucking_custom_css .='.scroll-up{';

			$logistic_cargo_trucking_custom_css .='left: 20px;';

		$logistic_cargo_trucking_custom_css .='}';

	}else if($logistic_cargo_trucking_scroll_top_position == 'Center'){

		$logistic_cargo_trucking_custom_css .='.scroll-up{';

			$logistic_cargo_trucking_custom_css .='right: 50%;left: 50%;';

		$logistic_cargo_trucking_custom_css .='}';
	}
