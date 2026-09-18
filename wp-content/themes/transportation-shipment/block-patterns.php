<?php
/**
 * Transportation Shipment: Block Patterns
 *
 * @package Transportation Shipment
 * @since   1.0.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'transportation-shipment',
		array( 'label' => __( 'Transportation Shipment', 'transportation-shipment' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'transportation-shipment/banner-section',
		array(
			'title'      => __( 'Banner Section', 'transportation-shipment' ),
			'categories' => array( 'transportation-shipment' ),
			'content'    => "<!-- wp:cover {\"url\":\"" . get_theme_file_uri() . "/images/Banner-image.png\",\"id\":2762,\"dimRatio\":0,\"align\":\"full\",\"className\":\"transportation-shipment-banner-section\"} -->\n<div class=\"wp-block-cover alignfull transportation-shipment-banner-section\"><span aria-hidden=\"true\" class=\"wp-block-cover__background has-background-dim-0 has-background-dim\"></span><img class=\"wp-block-cover__image-background wp-image-2762\" alt=\"\" src=\"" . get_theme_file_uri() . "/images/Banner-image.png\" data-object-fit=\"cover\"/><div class=\"wp-block-cover__inner-container\"><!-- wp:columns {\"className\":\"transportation-shipment-inner-section ps-lg-5 mx-lg-5\"} -->\n<div class=\"wp-block-columns transportation-shipment-inner-section ps-lg-5 mx-lg-5\"><!-- wp:column {\"width\":\"70.66%\",\"className\":\"transportation-shipment-text-section ps-4\"} -->\n<div class=\"wp-block-column transportation-shipment-text-section ps-4\" style=\"flex-basis:70.66%\"><!-- wp:heading {\"level\":1,\"style\":{\"typography\":{\"fontSize\":\"38px\"}},\"textColor\":\"white\"} -->\n<h1 class=\"has-white-color has-text-color\" style=\"font-size:38px\">WE ARE HERE TO MOVE</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"style\":{\"typography\":{\"fontSize\":\"18px\"}},\"textColor\":\"white\"} -->\n<p class=\"has-white-color has-text-color\" style=\"font-size:18px\">simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"textColor\":\"white\",\"style\":{\"border\":{\"radius\":\"0px\"},\"typography\":{\"fontSize\":\"16px\"},\"color\":{\"background\":\"#62e972\"}},\"className\":\"transportation-shipment-banner-section\"} -->\n<div class=\"wp-block-button has-custom-font-size transportation-shipment-banner-section\" style=\"font-size:16px\"><a class=\"wp-block-button__link has-white-color has-text-color has-background\" style=\"border-radius:0px;background-color:#62e972\">READ MORE</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"30.33%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:30.33%\"><!-- wp:paragraph -->\n<p></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->",
		)
	);

	register_block_pattern(
		'transportation-shipment/about-section',
		array(
			'title'      => __( 'About Section', 'transportation-shipment' ),
			'categories' => array( 'transportation-shipment' ),
			'content'    => "<!-- wp:group {\"className\":\"transportation-shipment-about-section py-5\"} -->\n<div class=\"wp-block-group transportation-shipment-about-section py-5\"><!-- wp:heading {\"textAlign\":\"center\"} -->\n<h2 class=\"has-text-align-center\">ABOUT LOGISTIC</h2>\n<!-- /wp:heading -->\n\n<!-- wp:columns {\"className\":\"pt-4\"} -->\n<div class=\"wp-block-columns pt-4\"><!-- wp:column {\"className\":\"transportation-shipment-about-image-section\"} -->\n<div class=\"wp-block-column transportation-shipment-about-image-section\"><!-- wp:image {\"id\":2764,\"sizeSlug\":\"full\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-full\"><img src=\"" . get_theme_file_uri() . "/images/About-image.png\" alt=\"\" class=\"wp-image-2764\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"transportation-shipment-about-text-section\"} -->\n<div class=\"wp-block-column transportation-shipment-about-text-section\"><!-- wp:heading {\"level\":3,\"style\":{\"typography\":{\"fontSize\":\"28px\"}}} -->\n<h3 style=\"font-size:28px\">Your Modern Logistic Partner</h3>\n<!-- /wp:heading -->\n\n<!-- wp:heading {\"level\":4,\"style\":{\"typography\":{\"fontSize\":\"22px\"}}} -->\n<h4 style=\"font-size:22px\">Lorem Ipsum has been the industry’s standard dummy text</h4>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"textColor\":\"black\",\"style\":{\"typography\":{\"fontSize\":\"15px\"},\"border\":{\"radius\":\"0px\"},\"color\":{\"background\":\"#62e972\"}}} -->\n<div class=\"wp-block-button has-custom-font-size\" style=\"font-size:15px\"><a class=\"wp-block-button__link has-black-color has-text-color has-background\" style=\"border-radius:0px;background-color:#62e972\">About Us More</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:group -->",
		)
	);
}