<?php 

	$movers_and_packers_custom_style = '';

	// Logo Size
	$movers_and_packers_logo_top_padding = get_theme_mod('movers_and_packers_logo_top_padding');
	$movers_and_packers_logo_bottom_padding = get_theme_mod('movers_and_packers_logo_bottom_padding');
	$movers_and_packers_logo_left_padding = get_theme_mod('movers_and_packers_logo_left_padding');
	$movers_and_packers_logo_right_padding = get_theme_mod('movers_and_packers_logo_right_padding');

	if( $movers_and_packers_logo_top_padding != '' || $movers_and_packers_logo_bottom_padding != '' || $movers_and_packers_logo_left_padding != '' || $movers_and_packers_logo_right_padding != ''){
		$movers_and_packers_custom_style .=' .logo {';
			$movers_and_packers_custom_style .=' padding-top: '.esc_attr($movers_and_packers_logo_top_padding).'px; padding-bottom: '.esc_attr($movers_and_packers_logo_bottom_padding).'px; padding-left: '.esc_attr($movers_and_packers_logo_left_padding).'px; padding-right: '.esc_attr($movers_and_packers_logo_right_padding).'px;';
		$movers_and_packers_custom_style .=' }';
	}

	// Site Title Font Size
	$movers_and_packers_slider_hide_show = get_theme_mod('movers_and_packers_slider_hide_show',false);
	if( $movers_and_packers_slider_hide_show == false){
		$movers_and_packers_custom_style .=' .page-template-custom-home-page #header {';
			$movers_and_packers_custom_style .=' position: static; border-bottom: 1px solid #fcb90f;';
		$movers_and_packers_custom_style .=' }';
	}

	// Header Image
	$header_image_url = movers_and_packers_banner_image( $image_url = '' );
	if( $header_image_url != ''){
		$movers_and_packers_custom_style .=' #inner-pages-header {';
			$movers_and_packers_custom_style .=' background-image: url('. esc_url( $header_image_url ).'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed;';
		$movers_and_packers_custom_style .=' }';
		$movers_and_packers_custom_style .=' .header-overlay {';
			$movers_and_packers_custom_style .=' position: absolute; 	width: 100%; height: 100%; 	top: 0; left: 0; background: #000; opacity: 0.3;';
		$movers_and_packers_custom_style .=' }';
	} else {
		$movers_and_packers_custom_style .=' #inner-pages-header {';
			$movers_and_packers_custom_style .=' background: linear-gradient(0deg,#ccc,#f4f4f4 80%) no-repeat; ';
		$movers_and_packers_custom_style .=' }';
		$movers_and_packers_custom_style .=' #inner-pages-header h1, #inner-pages-header .theme-breadcrumb a, #inner-pages-header .theme-breadcrumb {';
			$movers_and_packers_custom_style .=' color: #000; ';
		$movers_and_packers_custom_style .=' }';
	}

	$movers_and_packers_slider_hide_show = get_theme_mod('movers_and_packers_slider_hide_show',false);
	if( $movers_and_packers_slider_hide_show == true){
		$movers_and_packers_custom_style .=' .page-template-custom-home-page #inner-pages-header {';
			$movers_and_packers_custom_style .=' display:none;';
		$movers_and_packers_custom_style .=' }';
	}

	$movers_and_packers_tptext_color = get_theme_mod('movers_and_packers_tptext_color');
	if ( $movers_and_packers_tptext_color != '') {
		$movers_and_packers_custom_style .=' .top-header .contact a, .top-header p.topbar-text {';
			$movers_and_packers_custom_style .=' color:'.esc_attr($movers_and_packers_tptext_color).';';
		$movers_and_packers_custom_style .=' }';
	}

	$movers_and_packers_tpicon_color = get_theme_mod('movers_and_packers_tpicon_color');
	if ( $movers_and_packers_tpicon_color != '') {
		$movers_and_packers_custom_style .=' .top-header .contact a i, .top-header i {';
			$movers_and_packers_custom_style .=' color:'.esc_attr($movers_and_packers_tpicon_color).';';
		$movers_and_packers_custom_style .=' }';
	}

	// Site Title Font Size
	$movers_and_packers_site_title_fontsize = get_theme_mod('movers_and_packers_site_title_fontsize');
	if( $movers_and_packers_site_title_fontsize != ''){
		$movers_and_packers_custom_style .=' .logo h1.site-title, .logo p.site-title {';
			$movers_and_packers_custom_style .=' font-size: '.esc_attr($movers_and_packers_site_title_fontsize).'px;';
		$movers_and_packers_custom_style .=' }';
	}

	// Site Title Font Size
	$movers_and_packers_site_tagline_fontsize = get_theme_mod('movers_and_packers_site_tagline_fontsize');
	if( $movers_and_packers_site_tagline_fontsize != ''){
		$movers_and_packers_custom_style .=' .logo p.site-description {';
			$movers_and_packers_custom_style .=' font-size: '.esc_attr($movers_and_packers_site_tagline_fontsize).'px;';
		$movers_and_packers_custom_style .=' }';
	}

	//Slider color
	$movers_and_packers_slider_color = get_theme_mod('movers_and_packers_slider_color');

	if ( $movers_and_packers_slider_color != '') {
		$movers_and_packers_custom_style .=' #slider h2 a, #slider .carousel-caption p {';
			$movers_and_packers_custom_style .=' color:'.esc_attr($movers_and_packers_slider_color).';';
		$movers_and_packers_custom_style .=' }';
	}

	//Service color
	$movers_and_packers_service_color = get_theme_mod('movers_and_packers_service_color');

	if ( $movers_and_packers_service_color != '') {
		$movers_and_packers_custom_style .=' .service-box h4 a, .service-box p {';
			$movers_and_packers_custom_style .=' color:'.esc_attr($movers_and_packers_service_color).';';
		$movers_and_packers_custom_style .=' }';
	}