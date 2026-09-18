<?php
/**
 * Logistic Transport: Block Patterns
 *
 * @package Logistic Transport
 * @since   1.0.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'logistic-transport',
		array( 'label' => __( 'Logistic Transport', 'logistic-transport' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'logistic-transport/banner-section',
		array(
			'title'      => __( 'Banner Section', 'logistic-transport' ),
			'categories' => array( 'logistic-transport' ),
			'content'    => "<!-- wp:cover {\"url\":\"" . esc_url(get_template_directory_uri()) . "/images/Banner.png\",\"id\":2699,\"dimRatio\":40,\"isDark\":false,\"align\":\"full\",\"className\":\"logistic-transport-banner-section\"} -->\n<div class=\"wp-block-cover alignfull is-light logistic-transport-banner-section\"><span aria-hidden=\"true\" class=\"wp-block-cover__background has-background-dim-40 has-background-dim\"></span><img class=\"wp-block-cover__image-background wp-image-2699\" alt=\"\" src=\"" . esc_url(get_template_directory_uri()) . "/images/Banner.png\" data-object-fit=\"cover\"/><div class=\"wp-block-cover__inner-container\"><!-- wp:columns {\"className\":\"logistic-transport-inner-section ps-lg-5 mx-lg-5\"} -->\n<div class=\"wp-block-columns logistic-transport-inner-section ps-lg-5 mx-lg-5\"><!-- wp:column {\"width\":\"70.66%\",\"className\":\"logistic-transport-text-section ps-4\"} -->\n<div class=\"wp-block-column logistic-transport-text-section ps-4\" style=\"flex-basis:70.66%\"><!-- wp:heading {\"level\":1,\"style\":{\"typography\":{\"fontSize\":\"38px\"}},\"textColor\":\"white\"} -->\n<h1 class=\"has-white-color has-text-color\" style=\"font-size:38px\">WE ARE HERE TO MOVE</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"style\":{\"typography\":{\"fontSize\":\"18px\"}},\"textColor\":\"white\"} -->\n<p class=\"has-white-color has-text-color\" style=\"font-size:18px\">simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"textColor\":\"black\",\"style\":{\"border\":{\"radius\":\"0px\"},\"typography\":{\"fontSize\":\"16px\"},\"color\":{\"background\":\"#00cdfc\"}},\"className\":\"is-style-fill\"} -->\n<div class=\"wp-block-button has-custom-font-size is-style-fill\" style=\"font-size:16px\"><a class=\"wp-block-button__link has-black-color has-text-color has-background\" style=\"border-radius:0px;background-color:#00cdfc\">READ MORE</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"30.33%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:30.33%\"><!-- wp:paragraph -->\n<p></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->",
		)
	);

	register_block_pattern(
		'logistic-transport/services-section',
		array(
			'title'      => __( 'Services Section', 'logistic-transport' ),
			'categories' => array( 'logistic-transport' ),
			'content'    => "<!-- wp:group -->\n<div class=\"wp-block-group\"><!-- wp:columns {\"className\":\"learn-more-group-section\"} -->\n<div class=\"wp-block-columns learn-more-group-section\"><!-- wp:column {\"className\":\"logistic-transport-learn-more-section1\"} -->\n<div class=\"wp-block-column logistic-transport-learn-more-section1\"><!-- wp:columns {\"className\":\"logistic-transport-learn-more-section\"} -->\n<div class=\"wp-block-columns logistic-transport-learn-more-section\"><!-- wp:column {\"style\":{\"color\":{\"background\":\"#00cdfc\"}},\"className\":\"logistic-transport-shipping-section\"} -->\n<div class=\"wp-block-column logistic-transport-shipping-section has-background\" style=\"background-color:#00cdfc\"><!-- wp:image {\"align\":\"center\",\"id\":2721,\"width\":62,\"height\":41,\"sizeSlug\":\"full\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image aligncenter size-full is-resized\"><img src=\"" . esc_url(get_template_directory_uri()) . "/images/learnmore-image1.png\" alt=\"\" class=\"wp-image-2721\" width=\"62\" height=\"41\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":3,\"style\":{\"typography\":{\"fontSize\":\"22px\"}}} -->\n<h3 class=\"has-text-align-center\" style=\"font-size:22px\">GROUND SHIPPING</h3>\n<!-- /wp:heading -->\n\n<!-- wp:buttons {\"layout\":{\"type\":\"flex\",\"verticalAlignment\":\"top\",\"justifyContent\":\"center\"}} -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"style\":{\"border\":{\"radius\":\"0px\"}},\"className\":\"is-style-outline\",\"fontSize\":\"medium\"} -->\n<div class=\"wp-block-button has-custom-font-size is-style-outline has-medium-font-size\"><a class=\"wp-block-button__link\" style=\"border-radius:0px\">LEARN MORE</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"style\":{\"color\":{\"background\":\"#00cdfc\"}},\"className\":\"logistic-transport-shipping-section\"} -->\n<div class=\"wp-block-column logistic-transport-shipping-section has-background\" style=\"background-color:#00cdfc\"><!-- wp:image {\"align\":\"center\",\"id\":2745,\"sizeSlug\":\"full\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image aligncenter size-full\"><img src=\"" . esc_url(get_template_directory_uri()) . "/images/learnmore-image2.png\" alt=\"\" class=\"wp-image-2745\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":3,\"style\":{\"typography\":{\"fontSize\":\"22px\"}}} -->\n<h3 class=\"has-text-align-center\" style=\"font-size:22px\">AIR DELIVERY</h3>\n<!-- /wp:heading -->\n\n<!-- wp:buttons {\"layout\":{\"type\":\"flex\",\"verticalAlignment\":\"top\",\"justifyContent\":\"center\"}} -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"style\":{\"border\":{\"radius\":\"0px\"}},\"className\":\"is-style-outline\",\"fontSize\":\"medium\"} -->\n<div class=\"wp-block-button has-custom-font-size is-style-outline has-medium-font-size\"><a class=\"wp-block-button__link\" style=\"border-radius:0px\">LEARN MORE</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"style\":{\"color\":{\"background\":\"#00cdfc\"}},\"className\":\"logistic-transport-shipping-section\"} -->\n<div class=\"wp-block-column logistic-transport-shipping-section has-background\" style=\"background-color:#00cdfc\"><!-- wp:image {\"align\":\"center\",\"id\":2746,\"sizeSlug\":\"full\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image aligncenter size-full\"><img src=\"" . esc_url(get_template_directory_uri()) . "/images/learnmore-image3.png\" alt=\"\" class=\"wp-image-2746\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":3,\"style\":{\"typography\":{\"fontSize\":\"22px\"}}} -->\n<h3 class=\"has-text-align-center\" style=\"font-size:22px\">SEA DELIVERY</h3>\n<!-- /wp:heading -->\n\n<!-- wp:buttons {\"layout\":{\"type\":\"flex\",\"verticalAlignment\":\"top\",\"justifyContent\":\"center\"}} -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"style\":{\"border\":{\"radius\":\"0px\"}},\"className\":\"is-style-outline\",\"fontSize\":\"medium\"} -->\n<div class=\"wp-block-button has-custom-font-size is-style-outline has-medium-font-size\"><a class=\"wp-block-button__link\" style=\"border-radius:0px\">LEARN MORE</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:group -->",
		)
	);

	register_block_pattern(
		'logistic-transport/about-section',
		array(
			'title'      => __( 'About Section', 'logistic-transport' ),
			'categories' => array( 'logistic-transport' ),
			'content'    => "<!-- wp:group {\"className\":\"logistic-transport-about-section\"} -->\n<div class=\"wp-block-group logistic-transport-about-section\"><!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"id\":2733,\"sizeSlug\":\"full\",\"linkDestination\":\"none\",\"className\":\"logistic-transport-about-image-section\"} -->\n<figure class=\"wp-block-image size-full logistic-transport-about-image-section\"><img src=\"" . esc_url(get_template_directory_uri()) . "/images/about-image.png\" alt=\"\" class=\"wp-image-2733\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"logistic-transport-about-text-section\"} -->\n<div class=\"wp-block-column logistic-transport-about-text-section\"><!-- wp:heading {\"style\":{\"typography\":{\"fontSize\":\"28px\"}}} -->\n<h2 style=\"font-size:28px\">ABOUT LOGISTIC</h2>\n<!-- /wp:heading -->\n\n<!-- wp:heading {\"level\":3,\"style\":{\"typography\":{\"fontSize\":\"22px\"}}} -->\n<h3 style=\"font-size:22px\">Lorem Ipsum has been the industry’s standard dummy text</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:group -->",
		)
	);
}