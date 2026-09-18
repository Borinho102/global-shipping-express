<?php
	
	/*-----------------------First highlight color-------------------*/

	$vw_transport_cargo_first_color = get_theme_mod('vw_transport_cargo_first_color');

	$vw_transport_cargo_custom_css = '';

	if($vw_transport_cargo_first_color != false){
		$vw_transport_cargo_custom_css .='.logo-inner, .main-header .custom-social-icons i:hover, .top-btn a:hover, .search-box i:hover, .view-more, #contact_us, input[type="submit"], .footer .tagcloud a:hover, .sidebar .custom-social-icons i, .footer .custom-social-icons i, .footer-2, .sidebar .tagcloud a:hover, .pagination span, .pagination a, nav.woocommerce-MyAccount-navigation ul li, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .toggle-nav i, .sidebar .widget_price_filter .ui-slider .ui-slider-range, .sidebar .widget_price_filter .ui-slider .ui-slider-handle, .sidebar .woocommerce-product-search button, .footer .widget_price_filter .ui-slider .ui-slider-range, .footer .widget_price_filter .ui-slider .ui-slider-handle, .footer .woocommerce-product-search button, .footer a.custom_read_more, .sidebar a.custom_read_more, .woocommerce nav.woocommerce-pagination ul li a, .nav-previous a, .nav-next a, .wp-block-button__link, .footer .wp-block-search .wp-block-search__button, .sidebar .wp-block-search .wp-block-search__button,.bradcrumbs a,.post-categories li a,.bradcrumbs span, nav.navigation.posts-navigation .nav-previous a, nav.navigation.posts-navigation .nav-next a, .wp-block-tag-cloud a:hover{';
			$vw_transport_cargo_custom_css .='background-color: '.esc_attr($vw_transport_cargo_first_color).';';
		$vw_transport_cargo_custom_css .='}';
	}
	if($vw_transport_cargo_first_color != false){
		$vw_transport_cargo_custom_css .='#comments input[type="submit"].submit{';
			$vw_transport_cargo_custom_css .='background-color: '.esc_attr($vw_transport_cargo_first_color).'!important;';
		$vw_transport_cargo_custom_css .='}';
	}
	if($vw_transport_cargo_first_color != false){
		$vw_transport_cargo_custom_css .='.view-more:hover, .fa-angle-right:before, #about h3 span, #service-sec h4 span, .footer li a:hover, .post-main-box:hover h2, .main-navigation a:hover, #about h2 span, #service-sec h3 span, .sidebar ul li a:hover, .post-main-box:hover h2 a, .post-main-box:hover .post-info a, .single-post .post-info:hover a, #slider .inner_carousel h1 a:hover{';
			$vw_transport_cargo_custom_css .='color: '.esc_attr($vw_transport_cargo_first_color).';';
		$vw_transport_cargo_custom_css .='}';
	}
	if($vw_transport_cargo_first_color != false){
		$vw_transport_cargo_custom_css .='.view-more:hover{';
			$vw_transport_cargo_custom_css .='border-color: '.esc_attr($vw_transport_cargo_first_color).';';
		$vw_transport_cargo_custom_css .='}';
	}
	if($vw_transport_cargo_first_color != false){
		$vw_transport_cargo_custom_css .='.post-info hr{';
			$vw_transport_cargo_custom_css .='border-top-color: '.esc_attr($vw_transport_cargo_first_color).';';
		$vw_transport_cargo_custom_css .='}';
	}
	if($vw_transport_cargo_first_color != false){
		$vw_transport_cargo_custom_css .='.header-fixed{';
			$vw_transport_cargo_custom_css .='border-bottom-color: '.esc_attr($vw_transport_cargo_first_color).';';
		$vw_transport_cargo_custom_css .='}';
	}
	

	/*----------------Second highlight color-------------------*/

	$vw_transport_cargo_second_color = get_theme_mod('vw_transport_cargo_second_color');

	if($vw_transport_cargo_second_color != false){
		$vw_transport_cargo_custom_css .='.home-page-header, #contact_us i, .scrollup i, .sidebar .custom-social-icons i:hover, .footer .custom-social-icons i:hover, #comments input[type="submit"].submit:hover, .sidebar input[type="submit"]:hover, .error-btn a:hover, .content-bttn a:hover, .footer input[type="submit"]:hover, .pagination .current, .pagination a:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,#slider, .header-fixed, #comments a.comment-reply-link, .sidebar a.custom_read_more:hover, .footer a.custom_read_more:hover, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .nav-previous a:hover, .nav-next a:hover, .wp-block-button .wp-block-button__link:hover, #preloader, nav.navigation.posts-navigation .nav-previous a:hover, nav.navigation.posts-navigation .nav-next a:hover{';
			$vw_transport_cargo_custom_css .='background-color: '.esc_attr($vw_transport_cargo_second_color).';';
		$vw_transport_cargo_custom_css .='}';
	}
	if($vw_transport_cargo_second_color != false){
		$vw_transport_cargo_custom_css .='.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover{';
			$vw_transport_cargo_custom_css .='background-color: '.esc_attr($vw_transport_cargo_second_color).'!important;';
		$vw_transport_cargo_custom_css .='}';
	}
	if($vw_transport_cargo_second_color != false){
		$vw_transport_cargo_custom_css .='a, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, .main-navigation ul.sub-menu a:hover, .entry-content a, .sidebar .textwidget p a, .textwidget p a, #comments p a, .slider .inner_carousel p a, #contact_us p a:hover, .logo .site-title a:hover, .copyright a:hover, #about h2 a:hover, #service-sec h3 a:hover{';
			$vw_transport_cargo_custom_css .='color: '.esc_attr($vw_transport_cargo_second_color).';';
		$vw_transport_cargo_custom_css .='}';
	}
	if($vw_transport_cargo_second_color != false){
		$vw_transport_cargo_custom_css .='#header, p.bold-font, .main-navigation ul ul{';
			$vw_transport_cargo_custom_css .='border-bottom-color: '.esc_attr($vw_transport_cargo_second_color).';';
		$vw_transport_cargo_custom_css .='}';
	}
	if($vw_transport_cargo_second_color != false){
		$vw_transport_cargo_custom_css .='#header, .main-navigation ul ul{';
			$vw_transport_cargo_custom_css .='border-top-color: '.esc_attr($vw_transport_cargo_second_color).';';
		$vw_transport_cargo_custom_css .='}';
	}

	/*---------------------------Width Layout -------------------*/

	$vw_transport_cargo_theme_lay = get_theme_mod( 'vw_transport_cargo_width_option','Full Width');
    if($vw_transport_cargo_theme_lay == 'Boxed'){
		$vw_transport_cargo_custom_css .='body{';
			$vw_transport_cargo_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$vw_transport_cargo_custom_css .='}';
		$vw_transport_cargo_custom_css .='.scrollup i{';
			$vw_transport_cargo_custom_css .='right: 100px;';
		$vw_transport_cargo_custom_css .='}';
		$vw_transport_cargo_custom_css .='.scrollup.left i{';
			$vw_transport_cargo_custom_css .='left: 100px;';
		$vw_transport_cargo_custom_css .='}';
	}else if($vw_transport_cargo_theme_lay == 'Wide Width'){
		$vw_transport_cargo_custom_css .='body{';
			$vw_transport_cargo_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$vw_transport_cargo_custom_css .='}';
		$vw_transport_cargo_custom_css .='.scrollup i{';
			$vw_transport_cargo_custom_css .='right: 30px;';
		$vw_transport_cargo_custom_css .='}';
		$vw_transport_cargo_custom_css .='.scrollup.left i{';
			$vw_transport_cargo_custom_css .='left: 30px;';
		$vw_transport_cargo_custom_css .='}';
	}else if($vw_transport_cargo_theme_lay == 'Full Width'){
		$vw_transport_cargo_custom_css .='body{';
			$vw_transport_cargo_custom_css .='max-width: 100%;';
		$vw_transport_cargo_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$vw_transport_cargo_theme_lay = get_theme_mod( 'vw_transport_cargo_slider_opacity_color','0.5');
	if($vw_transport_cargo_theme_lay == '0'){
		$vw_transport_cargo_custom_css .='#slider img{';
			$vw_transport_cargo_custom_css .='opacity:0';
		$vw_transport_cargo_custom_css .='}';
		}else if($vw_transport_cargo_theme_lay == '0.1'){
		$vw_transport_cargo_custom_css .='#slider img{';
			$vw_transport_cargo_custom_css .='opacity:0.1';
		$vw_transport_cargo_custom_css .='}';
		}else if($vw_transport_cargo_theme_lay == '0.2'){
		$vw_transport_cargo_custom_css .='#slider img{';
			$vw_transport_cargo_custom_css .='opacity:0.2';
		$vw_transport_cargo_custom_css .='}';
		}else if($vw_transport_cargo_theme_lay == '0.3'){
		$vw_transport_cargo_custom_css .='#slider img{';
			$vw_transport_cargo_custom_css .='opacity:0.3';
		$vw_transport_cargo_custom_css .='}';
		}else if($vw_transport_cargo_theme_lay == '0.4'){
		$vw_transport_cargo_custom_css .='#slider img{';
			$vw_transport_cargo_custom_css .='opacity:0.4';
		$vw_transport_cargo_custom_css .='}';
		}else if($vw_transport_cargo_theme_lay == '0.5'){
		$vw_transport_cargo_custom_css .='#slider img{';
			$vw_transport_cargo_custom_css .='opacity:0.5';
		$vw_transport_cargo_custom_css .='}';
		}else if($vw_transport_cargo_theme_lay == '0.6'){
		$vw_transport_cargo_custom_css .='#slider img{';
			$vw_transport_cargo_custom_css .='opacity:0.6';
		$vw_transport_cargo_custom_css .='}';
		}else if($vw_transport_cargo_theme_lay == '0.7'){
		$vw_transport_cargo_custom_css .='#slider img{';
			$vw_transport_cargo_custom_css .='opacity:0.7';
		$vw_transport_cargo_custom_css .='}';
		}else if($vw_transport_cargo_theme_lay == '0.8'){
		$vw_transport_cargo_custom_css .='#slider img{';
			$vw_transport_cargo_custom_css .='opacity:0.8';
		$vw_transport_cargo_custom_css .='}';
		}else if($vw_transport_cargo_theme_lay == '0.9'){
		$vw_transport_cargo_custom_css .='#slider img{';
			$vw_transport_cargo_custom_css .='opacity:0.9';
		$vw_transport_cargo_custom_css .='}';
		}

	/*-------------------Slider Content Layout -------------------*/

	$vw_transport_cargo_theme_lay = get_theme_mod( 'vw_transport_cargo_slider_content_option','Center');
    if($vw_transport_cargo_theme_lay == 'Left'){
		$vw_transport_cargo_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_transport_cargo_custom_css .='text-align:left; left:15%; right:45%;';
		$vw_transport_cargo_custom_css .='}';
	}else if($vw_transport_cargo_theme_lay == 'Center'){
		$vw_transport_cargo_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_transport_cargo_custom_css .='text-align:center; left:20%; right:20%;';
		$vw_transport_cargo_custom_css .='}';
	}else if($vw_transport_cargo_theme_lay == 'Right'){
		$vw_transport_cargo_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_transport_cargo_custom_css .='text-align:right; left:45%; right:15%;';
		$vw_transport_cargo_custom_css .='}';
	}

	/*------------- Slider Content Padding Settings ------------------*/

	$vw_transport_cargo_slider_content_padding_top_bottom = get_theme_mod('vw_transport_cargo_slider_content_padding_top_bottom');
	$vw_transport_cargo_slider_content_padding_left_right = get_theme_mod('vw_transport_cargo_slider_content_padding_left_right');
	if($vw_transport_cargo_slider_content_padding_top_bottom != false || $vw_transport_cargo_slider_content_padding_left_right != false){
		$vw_transport_cargo_custom_css .='#slider .carousel-caption{';
			$vw_transport_cargo_custom_css .='top: '.esc_attr($vw_transport_cargo_slider_content_padding_top_bottom).'; bottom: '.esc_attr($vw_transport_cargo_slider_content_padding_top_bottom).';left: '.esc_attr($vw_transport_cargo_slider_content_padding_left_right).';right: '.esc_attr($vw_transport_cargo_slider_content_padding_left_right).';';
		$vw_transport_cargo_custom_css .='}';
	}

	/*---------------------------Slider Height ------------*/

	$vw_transport_cargo_slider_height = get_theme_mod('vw_transport_cargo_slider_height');
	if($vw_transport_cargo_slider_height != false){
		$vw_transport_cargo_custom_css .='#slider img{';
			$vw_transport_cargo_custom_css .='height: '.esc_attr($vw_transport_cargo_slider_height).';';
		$vw_transport_cargo_custom_css .='}';
	}

	/*--------------------------- Slider -------------------*/

	$vw_transport_cargo_slider = get_theme_mod('vw_transport_cargo_slider_hide_show');
	if($vw_transport_cargo_slider == false){
		$vw_transport_cargo_custom_css .='.page-template-custom-home-page #sec_second{';
			$vw_transport_cargo_custom_css .='padding: 2% 0;';
		$vw_transport_cargo_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$vw_transport_cargo_theme_lay = get_theme_mod( 'vw_transport_cargo_blog_layout_option','Default');
    if($vw_transport_cargo_theme_lay == 'Default'){
		$vw_transport_cargo_custom_css .='.post-main-box{';
			$vw_transport_cargo_custom_css .='';
		$vw_transport_cargo_custom_css .='}';
	}else if($vw_transport_cargo_theme_lay == 'Center'){
		$vw_transport_cargo_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn{';
			$vw_transport_cargo_custom_css .='text-align:center;';
		$vw_transport_cargo_custom_css .='}';
		$vw_transport_cargo_custom_css .='.post-info{';
			$vw_transport_cargo_custom_css .='margin-top:10px;';
		$vw_transport_cargo_custom_css .='}';
		$vw_transport_cargo_custom_css .='.post-info hr{';
			$vw_transport_cargo_custom_css .='margin:15px auto;';
		$vw_transport_cargo_custom_css .='}';
	}else if($vw_transport_cargo_theme_lay == 'Left'){
		$vw_transport_cargo_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$vw_transport_cargo_custom_css .='text-align:Left;';
		$vw_transport_cargo_custom_css .='}';
		$vw_transport_cargo_custom_css .='.post-main-box h2{';
			$vw_transport_cargo_custom_css .='margin-top:10px;';
		$vw_transport_cargo_custom_css .='}';
	}

	// featured image dimention
	$vw_transport_cargo_blog_post_featured_image_dimension = get_theme_mod('vw_transport_cargo_blog_post_featured_image_dimension', 'default');
	$vw_transport_cargo_blog_post_featured_image_custom_width = get_theme_mod('vw_transport_cargo_blog_post_featured_image_custom_width',250);
	$vw_transport_cargo_blog_post_featured_image_custom_height = get_theme_mod('vw_transport_cargo_blog_post_featured_image_custom_height',250);
	if($vw_transport_cargo_blog_post_featured_image_dimension == 'custom'){
		$vw_transport_cargo_custom_css .='.post-main-box img{';
			$vw_transport_cargo_custom_css .='width: '.esc_attr($vw_transport_cargo_blog_post_featured_image_custom_width).'; height: '.esc_attr($vw_transport_cargo_blog_post_featured_image_custom_height).';';
		$vw_transport_cargo_custom_css .='}';
	}

	/*--------------------- Blog Page Posts -------------------*/

	$vw_transport_cargo_blog_page_posts_settings = get_theme_mod( 'vw_transport_cargo_blog_page_posts_settings','Into Blocks');
    if($vw_transport_cargo_blog_page_posts_settings == 'Without Blocks'){
		$vw_transport_cargo_custom_css .='.post-main-box{';
			$vw_transport_cargo_custom_css .='box-shadow: none; border: none; margin:30px 0;';
		$vw_transport_cargo_custom_css .='}';
	}

	/*--------------------- Grid Posts -------------------*/

	$vw_transport_cargo_display_grid_posts_settings = get_theme_mod( 'vw_transport_cargo_display_grid_posts_settings','Into Blocks');
    if($vw_transport_cargo_display_grid_posts_settings == 'Without Blocks'){
		$vw_transport_cargo_custom_css .='.grid-post-main-box{';
			$vw_transport_cargo_custom_css .='box-shadow: none; border: none; margin:30px 0;';
		$vw_transport_cargo_custom_css .='}';
	}

	/*---------------------Responsive Media -----------------------*/

	$vw_transport_cargo_resp_stickyheader = get_theme_mod( 'vw_transport_cargo_stickyheader_hide_show',false);
	if($vw_transport_cargo_resp_stickyheader == true && get_theme_mod( 'vw_transport_cargo_sticky_header',false) != true){
    	$vw_transport_cargo_custom_css .='.header-fixed{';
			$vw_transport_cargo_custom_css .='position:static;';
		$vw_transport_cargo_custom_css .='} ';
	}
    if($vw_transport_cargo_resp_stickyheader == true){
    	$vw_transport_cargo_custom_css .='@media screen and (max-width:575px) {';
		$vw_transport_cargo_custom_css .='.header-fixed{';
			$vw_transport_cargo_custom_css .='position:fixed;';
		$vw_transport_cargo_custom_css .='} }';
	}else if($vw_transport_cargo_resp_stickyheader == false){
		$vw_transport_cargo_custom_css .='@media screen and (max-width:575px){';
		$vw_transport_cargo_custom_css .='.header-fixed{';
			$vw_transport_cargo_custom_css .='position:static;';
		$vw_transport_cargo_custom_css .='} }';
	}

	$vw_transport_cargo_resp_slider = get_theme_mod( 'vw_transport_cargo_resp_slider_hide_show',false);
	if($vw_transport_cargo_resp_slider == true && get_theme_mod( 'vw_transport_cargo_slider_hide_show', false) == false){
    	$vw_transport_cargo_custom_css .='#slider{';
			$vw_transport_cargo_custom_css .='display:none;';
		$vw_transport_cargo_custom_css .='} ';
	}
    if($vw_transport_cargo_resp_slider == true){
    	$vw_transport_cargo_custom_css .='@media screen and (max-width:575px) {';
		$vw_transport_cargo_custom_css .='#slider{';
			$vw_transport_cargo_custom_css .='display:block;';
		$vw_transport_cargo_custom_css .='} }';
	}else if($vw_transport_cargo_resp_slider == false){
		$vw_transport_cargo_custom_css .='@media screen and (max-width:575px) {';
		$vw_transport_cargo_custom_css .='#slider{';
			$vw_transport_cargo_custom_css .='display:none;';
		$vw_transport_cargo_custom_css .='} }';
	}

	$vw_transport_cargo_resp_sidebar = get_theme_mod( 'vw_transport_cargo_sidebar_hide_show',true);
    if($vw_transport_cargo_resp_sidebar == true){
    	$vw_transport_cargo_custom_css .='@media screen and (max-width:575px) {';
		$vw_transport_cargo_custom_css .='.sidebar{';
			$vw_transport_cargo_custom_css .='display:block;';
		$vw_transport_cargo_custom_css .='} }';
	}else if($vw_transport_cargo_resp_sidebar == false){
		$vw_transport_cargo_custom_css .='@media screen and (max-width:575px) {';
		$vw_transport_cargo_custom_css .='.sidebar{';
			$vw_transport_cargo_custom_css .='display:none;';
		$vw_transport_cargo_custom_css .='} }';
	}

	$vw_transport_cargo_resp_scroll_top = get_theme_mod( 'vw_transport_cargo_resp_scroll_top_hide_show',true);
	if($vw_transport_cargo_resp_scroll_top == true && get_theme_mod( 'vw_transport_cargo_hide_show_scroll',true) != true){
    	$vw_transport_cargo_custom_css .='.scrollup i{';
			$vw_transport_cargo_custom_css .='visibility:hidden !important;';
		$vw_transport_cargo_custom_css .='} ';
	}
    if($vw_transport_cargo_resp_scroll_top == true){
    	$vw_transport_cargo_custom_css .='@media screen and (max-width:575px) {';
		$vw_transport_cargo_custom_css .='.scrollup i{';
			$vw_transport_cargo_custom_css .='visibility:visible !important;';
		$vw_transport_cargo_custom_css .='} }';
	}else if($vw_transport_cargo_resp_scroll_top == false){
		$vw_transport_cargo_custom_css .='@media screen and (max-width:575px){';
		$vw_transport_cargo_custom_css .='.scrollup i{';
			$vw_transport_cargo_custom_css .='visibility:hidden !important;';
		$vw_transport_cargo_custom_css .='} }';
	}

	$vw_transport_cargo_resp_menu_toggle_btn_bg_color = get_theme_mod('vw_transport_cargo_resp_menu_toggle_btn_bg_color');
	if($vw_transport_cargo_resp_menu_toggle_btn_bg_color != false){
		$vw_transport_cargo_custom_css .='.toggle-nav i{';
			$vw_transport_cargo_custom_css .='background-color: '.esc_attr($vw_transport_cargo_resp_menu_toggle_btn_bg_color).';';
		$vw_transport_cargo_custom_css .='}';
	}

	/*-------------- Sticky Header Padding ----------------*/

	$vw_transport_cargo_sticky_header_padding = get_theme_mod('vw_transport_cargo_sticky_header_padding');
	if($vw_transport_cargo_sticky_header_padding != false){
		$vw_transport_cargo_custom_css .='.header-fixed{';
			$vw_transport_cargo_custom_css .='padding: '.esc_attr($vw_transport_cargo_sticky_header_padding).';';
		$vw_transport_cargo_custom_css .='}';
	}

	/*-------------- Menus Settings ----------------*/

	$vw_transport_cargo_navigation_menu_font_size = get_theme_mod('vw_transport_cargo_navigation_menu_font_size');
	if($vw_transport_cargo_navigation_menu_font_size != false){
		$vw_transport_cargo_custom_css .='.main-navigation a{';
			$vw_transport_cargo_custom_css .='font-size: '.esc_attr($vw_transport_cargo_navigation_menu_font_size).';';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_navigation_menu_font_weight = get_theme_mod('vw_transport_cargo_navigation_menu_font_weight','700');
	if($vw_transport_cargo_navigation_menu_font_weight != false){
		$vw_transport_cargo_custom_css .='.main-navigation a{';
			$vw_transport_cargo_custom_css .='font-weight: '.esc_attr($vw_transport_cargo_navigation_menu_font_weight).';';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_theme_lay = get_theme_mod( 'vw_transport_cargo_menu_text_transform','Uppercase');
	if($vw_transport_cargo_theme_lay == 'Capitalize'){
		$vw_transport_cargo_custom_css .='.main-navigation a{';
			$vw_transport_cargo_custom_css .='text-transform:Capitalize;';
		$vw_transport_cargo_custom_css .='}';
	}
	if($vw_transport_cargo_theme_lay == 'Lowercase'){
		$vw_transport_cargo_custom_css .='.main-navigation a{';
			$vw_transport_cargo_custom_css .='text-transform:Lowercase;';
		$vw_transport_cargo_custom_css .='}';
	}
	if($vw_transport_cargo_theme_lay == 'Uppercase'){
		$vw_transport_cargo_custom_css .='.main-navigation a{';
			$vw_transport_cargo_custom_css .='text-transform:Uppercase;';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_header_menus_color = get_theme_mod('vw_transport_cargo_header_menus_color');
	if($vw_transport_cargo_header_menus_color != false){
		$vw_transport_cargo_custom_css .='.main-navigation a{';
			$vw_transport_cargo_custom_css .='color: '.esc_attr($vw_transport_cargo_header_menus_color).';';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_header_menus_hover_color = get_theme_mod('vw_transport_cargo_header_menus_hover_color');
	if($vw_transport_cargo_header_menus_hover_color != false){
		$vw_transport_cargo_custom_css .='.main-navigation a:hover{';
			$vw_transport_cargo_custom_css .='color: '.esc_attr($vw_transport_cargo_header_menus_hover_color).';';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_header_submenus_color = get_theme_mod('vw_transport_cargo_header_submenus_color');
	if($vw_transport_cargo_header_submenus_color != false){
		$vw_transport_cargo_custom_css .='.main-navigation ul ul a{';
			$vw_transport_cargo_custom_css .='color: '.esc_attr($vw_transport_cargo_header_submenus_color).';';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_header_submenus_hover_color = get_theme_mod('vw_transport_cargo_header_submenus_hover_color');
	if($vw_transport_cargo_header_submenus_hover_color != false){
		$vw_transport_cargo_custom_css .='.main-navigation ul.sub-menu a:hover{';
			$vw_transport_cargo_custom_css .='color: '.esc_attr($vw_transport_cargo_header_submenus_hover_color).';';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_menus_item = get_theme_mod( 'vw_transport_cargo_menus_item_style','None');
    if($vw_transport_cargo_menus_item == 'None'){
		$vw_transport_cargo_custom_css .='.main-navigation a{';
			$vw_transport_cargo_custom_css .='';
		$vw_transport_cargo_custom_css .='}';
	}else if($vw_transport_cargo_menus_item == 'Zoom In'){
		$vw_transport_cargo_custom_css .='.main-navigation a:hover{';
			$vw_transport_cargo_custom_css .='transition: all 0.3s ease-in-out !important; transform: scale(1.2) !important; color:#000;';
		$vw_transport_cargo_custom_css .='}';
	}

	/*------------------ Search Settings -----------------*/
	
	$vw_transport_cargo_search_padding_top_bottom = get_theme_mod('vw_transport_cargo_search_padding_top_bottom');
	$vw_transport_cargo_search_padding_left_right = get_theme_mod('vw_transport_cargo_search_padding_left_right');
	$vw_transport_cargo_search_font_size = get_theme_mod('vw_transport_cargo_search_font_size');
	$vw_transport_cargo_search_border_radius = get_theme_mod('vw_transport_cargo_search_border_radius');
	if($vw_transport_cargo_search_padding_top_bottom != false || $vw_transport_cargo_search_padding_left_right != false || $vw_transport_cargo_search_font_size != false || $vw_transport_cargo_search_border_radius != false){
		$vw_transport_cargo_custom_css .='.search-box i{';
			$vw_transport_cargo_custom_css .='padding-top: '.esc_attr($vw_transport_cargo_search_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_transport_cargo_search_padding_top_bottom).';padding-left: '.esc_attr($vw_transport_cargo_search_padding_left_right).';padding-right: '.esc_attr($vw_transport_cargo_search_padding_left_right).';font-size: '.esc_attr($vw_transport_cargo_search_font_size).';border-radius: '.esc_attr($vw_transport_cargo_search_border_radius).'px;';
		$vw_transport_cargo_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$vw_transport_cargo_button_padding_top_bottom = get_theme_mod('vw_transport_cargo_button_padding_top_bottom');
	$vw_transport_cargo_button_padding_left_right = get_theme_mod('vw_transport_cargo_button_padding_left_right');
	if($vw_transport_cargo_button_padding_top_bottom != false || $vw_transport_cargo_button_padding_left_right != false){
		$vw_transport_cargo_custom_css .='.post-main-box .view-more{';
			$vw_transport_cargo_custom_css .='padding-top: '.esc_attr($vw_transport_cargo_button_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_transport_cargo_button_padding_top_bottom).';padding-left: '.esc_attr($vw_transport_cargo_button_padding_left_right).';padding-right: '.esc_attr($vw_transport_cargo_button_padding_left_right).';';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_button_border_radius = get_theme_mod('vw_transport_cargo_button_border_radius');
	if($vw_transport_cargo_button_border_radius != false){
		$vw_transport_cargo_custom_css .='.post-main-box .view-more{';
			$vw_transport_cargo_custom_css .='border-radius: '.esc_attr($vw_transport_cargo_button_border_radius).'px;';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_button_font_size = get_theme_mod('vw_transport_cargo_button_font_size',14);
	$vw_transport_cargo_custom_css .='.post-main-box .view-more{';
		$vw_transport_cargo_custom_css .='font-size: '.esc_attr($vw_transport_cargo_button_font_size).';';
	$vw_transport_cargo_custom_css .='}';

	$vw_transport_cargo_theme_lay = get_theme_mod( 'vw_transport_cargo_button_text_transform','Uppercase');
	if($vw_transport_cargo_theme_lay == 'Capitalize'){
		$vw_transport_cargo_custom_css .='.post-main-box .view-more{';
			$vw_transport_cargo_custom_css .='text-transform:Capitalize;';
		$vw_transport_cargo_custom_css .='}';
	}
	if($vw_transport_cargo_theme_lay == 'Lowercase'){
		$vw_transport_cargo_custom_css .='.post-main-box .view-more{';
			$vw_transport_cargo_custom_css .='text-transform:Lowercase;';
		$vw_transport_cargo_custom_css .='}';
	}
	if($vw_transport_cargo_theme_lay == 'Uppercase'){
		$vw_transport_cargo_custom_css .='.post-main-box .view-more{';
			$vw_transport_cargo_custom_css .='text-transform:Uppercase;';
		$vw_transport_cargo_custom_css .='}';
	} 

	$vw_transport_cargo_button_letter_spacing = get_theme_mod('vw_transport_cargo_button_letter_spacing',14);
	$vw_transport_cargo_custom_css .='.post-main-box .view-more{';
		$vw_transport_cargo_custom_css .='letter-spacing: '.esc_attr($vw_transport_cargo_button_letter_spacing).';';
	$vw_transport_cargo_custom_css .='}';

	/*------------- Single Blog Page------------------*/

	$vw_transport_cargo_featured_image_border_radius = get_theme_mod('vw_transport_cargo_featured_image_border_radius', 0);
	if($vw_transport_cargo_featured_image_border_radius != false){
		$vw_transport_cargo_custom_css .='.box-image img, .feature-box img{';
			$vw_transport_cargo_custom_css .='border-radius: '.esc_attr($vw_transport_cargo_featured_image_border_radius).'px;';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_featured_image_box_shadow = get_theme_mod('vw_transport_cargo_featured_image_box_shadow',0);
	if($vw_transport_cargo_featured_image_box_shadow != false){
		$vw_transport_cargo_custom_css .='.box-image img, .feature-box img, #content-vw img{';
			$vw_transport_cargo_custom_css .='box-shadow: '.esc_attr($vw_transport_cargo_featured_image_box_shadow).'px '.esc_attr($vw_transport_cargo_featured_image_box_shadow).'px '.esc_attr($vw_transport_cargo_featured_image_box_shadow).'px #cccccc;';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_single_blog_post_navigation_show_hide = get_theme_mod('vw_transport_cargo_single_blog_post_navigation_show_hide',true);
	if($vw_transport_cargo_single_blog_post_navigation_show_hide != true){
		$vw_transport_cargo_custom_css .='.post-navigation{';
			$vw_transport_cargo_custom_css .='display: none;';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_single_blog_comment_title = get_theme_mod('vw_transport_cargo_single_blog_comment_title', 'Leave a Reply');
	if($vw_transport_cargo_single_blog_comment_title == ''){
		$vw_transport_cargo_custom_css .='#comments h2#reply-title {';
			$vw_transport_cargo_custom_css .='display: none;';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_single_blog_comment_button_text = get_theme_mod('vw_transport_cargo_single_blog_comment_button_text', 'Post Comment');
	if($vw_transport_cargo_single_blog_comment_button_text == ''){
		$vw_transport_cargo_custom_css .='#comments p.form-submit {';
			$vw_transport_cargo_custom_css .='display: none;';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_comment_width = get_theme_mod('vw_transport_cargo_single_blog_comment_width');
	if($vw_transport_cargo_comment_width != false){
		$vw_transport_cargo_custom_css .='#comments textarea{';
			$vw_transport_cargo_custom_css .='width: '.esc_attr($vw_transport_cargo_comment_width).';';
		$vw_transport_cargo_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_transport_cargo_footer_background_color = get_theme_mod('vw_transport_cargo_footer_background_color');
	if($vw_transport_cargo_footer_background_color != false){
		$vw_transport_cargo_custom_css .='.footer{';
			$vw_transport_cargo_custom_css .='background-color: '.esc_attr($vw_transport_cargo_footer_background_color).';';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_copyright_font_size = get_theme_mod('vw_transport_cargo_copyright_font_size');
	if($vw_transport_cargo_copyright_font_size != false){
		$vw_transport_cargo_custom_css .='.copyright p{';
			$vw_transport_cargo_custom_css .='font-size: '.esc_attr($vw_transport_cargo_copyright_font_size).';';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_copyright_padding_top_bottom = get_theme_mod('vw_transport_cargo_copyright_padding_top_bottom');
	if($vw_transport_cargo_copyright_padding_top_bottom != false){
		$vw_transport_cargo_custom_css .='.footer-2{';
			$vw_transport_cargo_custom_css .='padding-top: '.esc_attr($vw_transport_cargo_copyright_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_transport_cargo_copyright_padding_top_bottom).';';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_copyright_alignment = get_theme_mod('vw_transport_cargo_copyright_alignment');
	if($vw_transport_cargo_copyright_alignment != false){
		$vw_transport_cargo_custom_css .='.copyright p{';
			$vw_transport_cargo_custom_css .='text-align: '.esc_attr($vw_transport_cargo_copyright_alignment).';';
		$vw_transport_cargo_custom_css .='}';
	}

		$vw_transport_cargo_footer_widgets_heading = get_theme_mod( 'vw_transport_cargo_footer_widgets_heading','Left');
    if($vw_transport_cargo_footer_widgets_heading == 'Left'){
		$vw_transport_cargo_custom_css .='.footer h3, .footer h3 .wp-block-search .wp-block-search__label{';
		$vw_transport_cargo_custom_css .='text-align: left;';
		$vw_transport_cargo_custom_css .='}';
	}else if($vw_transport_cargo_footer_widgets_heading == 'Center'){
		$vw_transport_cargo_custom_css .='.footer h3, .footer h3 .wp-block-search .wp-block-search__label{';
			$vw_transport_cargo_custom_css .='text-align: center;';
		$vw_transport_cargo_custom_css .='}';
	}else if($vw_transport_cargo_footer_widgets_heading == 'Right'){
		$vw_transport_cargo_custom_css .='.footer h3, .footer .wp-block-search .wp-block-search__label{';
			$vw_transport_cargo_custom_css .='text-align: right;';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_footer_widgets_content = get_theme_mod( 'vw_transport_cargo_footer_widgets_content','Left');
    if($vw_transport_cargo_footer_widgets_content == 'Left'){
		$vw_transport_cargo_custom_css .='.footer li{';
		$vw_transport_cargo_custom_css .='text-align: left;';
		$vw_transport_cargo_custom_css .='}';
	}else if($vw_transport_cargo_footer_widgets_content == 'Center'){
		$vw_transport_cargo_custom_css .='.footer li{';
			$vw_transport_cargo_custom_css .='text-align: center;';
		$vw_transport_cargo_custom_css .='}';
	}else if($vw_transport_cargo_footer_widgets_content == 'Right'){
		$vw_transport_cargo_custom_css .='.footer li{';
			$vw_transport_cargo_custom_css .='text-align: right;';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_footer_padding = get_theme_mod('vw_transport_cargo_footer_padding');
	if($vw_transport_cargo_footer_padding != false){
		$vw_transport_cargo_custom_css .='.footer{';
			$vw_transport_cargo_custom_css .='padding: '.esc_attr($vw_transport_cargo_footer_padding).' 0;';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_footer_icon = get_theme_mod('vw_transport_cargo_footer_icon');
	if($vw_transport_cargo_footer_icon == false){
		$vw_transport_cargo_custom_css .='.copyright p{';
			$vw_transport_cargo_custom_css .='width:100%; text-align:center; float:none;';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_footer_background_image = get_theme_mod('vw_transport_cargo_footer_background_image');
	if($vw_transport_cargo_footer_background_image != false){
		$vw_transport_cargo_custom_css .='.footer{';
			$vw_transport_cargo_custom_css .='background: url('.esc_attr($vw_transport_cargo_footer_background_image).');';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_theme_lay = get_theme_mod( 'vw_transport_cargo_img_footer','scroll');
	if($vw_transport_cargo_theme_lay == 'fixed'){
		$vw_transport_cargo_custom_css .='.footer{';
			$vw_transport_cargo_custom_css .='background-attachment: fixed !important;';
		$vw_transport_cargo_custom_css .='}';
	}elseif ($vw_transport_cargo_theme_lay == 'scroll'){
		$vw_transport_cargo_custom_css .='.footer{';
			$vw_transport_cargo_custom_css .='background-attachment: scroll !important;';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_copyright_background_color = get_theme_mod('vw_transport_cargo_copyright_background_color');
	if($vw_transport_cargo_copyright_background_color != false){
		$vw_transport_cargo_custom_css .='.footer-2{';
			$vw_transport_cargo_custom_css .='background-color: '.esc_attr($vw_transport_cargo_copyright_background_color).';';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_footer_img_position = get_theme_mod('vw_transport_cargo_footer_img_position','center center');
	if($vw_transport_cargo_footer_img_position != false){
		$vw_transport_cargo_custom_css .='.footer{';
			$vw_transport_cargo_custom_css .='background-position: '.esc_attr($vw_transport_cargo_footer_img_position).'!important;';
		$vw_transport_cargo_custom_css .='}';
	}  

	/*----------------Sroll to top Settings ------------------*/

	$vw_transport_cargo_scroll_to_top_font_size = get_theme_mod('vw_transport_cargo_scroll_to_top_font_size');
	if($vw_transport_cargo_scroll_to_top_font_size != false){
		$vw_transport_cargo_custom_css .='.scrollup i{';
			$vw_transport_cargo_custom_css .='font-size: '.esc_attr($vw_transport_cargo_scroll_to_top_font_size).';';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_scroll_to_top_padding = get_theme_mod('vw_transport_cargo_scroll_to_top_padding');
	$vw_transport_cargo_scroll_to_top_padding = get_theme_mod('vw_transport_cargo_scroll_to_top_padding');
	if($vw_transport_cargo_scroll_to_top_padding != false){
		$vw_transport_cargo_custom_css .='.scrollup i{';
			$vw_transport_cargo_custom_css .='padding-top: '.esc_attr($vw_transport_cargo_scroll_to_top_padding).';padding-bottom: '.esc_attr($vw_transport_cargo_scroll_to_top_padding).';';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_scroll_to_top_width = get_theme_mod('vw_transport_cargo_scroll_to_top_width');
	if($vw_transport_cargo_scroll_to_top_width != false){
		$vw_transport_cargo_custom_css .='.scrollup i{';
			$vw_transport_cargo_custom_css .='width: '.esc_attr($vw_transport_cargo_scroll_to_top_width).';';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_scroll_to_top_height = get_theme_mod('vw_transport_cargo_scroll_to_top_height');
	if($vw_transport_cargo_scroll_to_top_height != false){
		$vw_transport_cargo_custom_css .='.scrollup i{';
			$vw_transport_cargo_custom_css .='height: '.esc_attr($vw_transport_cargo_scroll_to_top_height).';';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_scroll_to_top_border_radius = get_theme_mod('vw_transport_cargo_scroll_to_top_border_radius');
	if($vw_transport_cargo_scroll_to_top_border_radius != false){
		$vw_transport_cargo_custom_css .='.scrollup i{';
			$vw_transport_cargo_custom_css .='border-radius: '.esc_attr($vw_transport_cargo_scroll_to_top_border_radius).'px;';
		$vw_transport_cargo_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$vw_transport_cargo_social_icon_font_size = get_theme_mod('vw_transport_cargo_social_icon_font_size');
	if($vw_transport_cargo_social_icon_font_size != false){
		$vw_transport_cargo_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_transport_cargo_custom_css .='font-size: '.esc_attr($vw_transport_cargo_social_icon_font_size).';';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_social_icon_padding = get_theme_mod('vw_transport_cargo_social_icon_padding');
	if($vw_transport_cargo_social_icon_padding != false){
		$vw_transport_cargo_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_transport_cargo_custom_css .='padding: '.esc_attr($vw_transport_cargo_social_icon_padding).';';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_social_icon_width = get_theme_mod('vw_transport_cargo_social_icon_width');
	if($vw_transport_cargo_social_icon_width != false){
		$vw_transport_cargo_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_transport_cargo_custom_css .='width: '.esc_attr($vw_transport_cargo_social_icon_width).';';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_social_icon_height = get_theme_mod('vw_transport_cargo_social_icon_height');
	if($vw_transport_cargo_social_icon_height != false){
		$vw_transport_cargo_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_transport_cargo_custom_css .='height: '.esc_attr($vw_transport_cargo_social_icon_height).';';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_social_icon_border_radius = get_theme_mod('vw_transport_cargo_social_icon_border_radius');
	if($vw_transport_cargo_social_icon_border_radius != false){
		$vw_transport_cargo_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_transport_cargo_custom_css .='border-radius: '.esc_attr($vw_transport_cargo_social_icon_border_radius).'px;';
		$vw_transport_cargo_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$vw_transport_cargo_related_product_show_hide = get_theme_mod('vw_transport_cargo_related_product_show_hide',true);
	if($vw_transport_cargo_related_product_show_hide != true){
		$vw_transport_cargo_custom_css .='.related.products{';
			$vw_transport_cargo_custom_css .='display: none;';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_products_padding_top_bottom = get_theme_mod('vw_transport_cargo_products_padding_top_bottom');
	if($vw_transport_cargo_products_padding_top_bottom != false){
		$vw_transport_cargo_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_transport_cargo_custom_css .='padding-top: '.esc_attr($vw_transport_cargo_products_padding_top_bottom).'!important; padding-bottom: '.esc_attr($vw_transport_cargo_products_padding_top_bottom).'!important;';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_products_padding_left_right = get_theme_mod('vw_transport_cargo_products_padding_left_right');
	if($vw_transport_cargo_products_padding_left_right != false){
		$vw_transport_cargo_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_transport_cargo_custom_css .='padding-left: '.esc_attr($vw_transport_cargo_products_padding_left_right).'!important; padding-right: '.esc_attr($vw_transport_cargo_products_padding_left_right).'!important;';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_products_box_shadow = get_theme_mod('vw_transport_cargo_products_box_shadow');
	if($vw_transport_cargo_products_box_shadow != false){
		$vw_transport_cargo_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$vw_transport_cargo_custom_css .='box-shadow: '.esc_attr($vw_transport_cargo_products_box_shadow).'px '.esc_attr($vw_transport_cargo_products_box_shadow).'px '.esc_attr($vw_transport_cargo_products_box_shadow).'px #ddd;';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_products_border_radius = get_theme_mod('vw_transport_cargo_products_border_radius', 0);
	if($vw_transport_cargo_products_border_radius != false){
		$vw_transport_cargo_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_transport_cargo_custom_css .='border-radius: '.esc_attr($vw_transport_cargo_products_border_radius).'px;';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_products_btn_padding_top_bottom = get_theme_mod('vw_transport_cargo_products_btn_padding_top_bottom');
	if($vw_transport_cargo_products_btn_padding_top_bottom != false){
		$vw_transport_cargo_custom_css .='.woocommerce a.button{';
			$vw_transport_cargo_custom_css .='padding-top: '.esc_attr($vw_transport_cargo_products_btn_padding_top_bottom).' !important; padding-bottom: '.esc_attr($vw_transport_cargo_products_btn_padding_top_bottom).' !important;';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_products_btn_padding_left_right = get_theme_mod('vw_transport_cargo_products_btn_padding_left_right');
	if($vw_transport_cargo_products_btn_padding_left_right != false){
		$vw_transport_cargo_custom_css .='.woocommerce a.button{';
			$vw_transport_cargo_custom_css .='padding-left: '.esc_attr($vw_transport_cargo_products_btn_padding_left_right).' !important; padding-right: '.esc_attr($vw_transport_cargo_products_btn_padding_left_right).' !important;';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_products_button_border_radius = get_theme_mod('vw_transport_cargo_products_button_border_radius', 0);
	if($vw_transport_cargo_products_button_border_radius != false){
		$vw_transport_cargo_custom_css .='.woocommerce ul.products li.product .button, a.checkout-button.button.alt.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
			$vw_transport_cargo_custom_css .='border-radius: '.esc_attr($vw_transport_cargo_products_button_border_radius).'px;';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_woocommerce_sale_position = get_theme_mod( 'vw_transport_cargo_woocommerce_sale_position','right');
    if($vw_transport_cargo_woocommerce_sale_position == 'left'){
		$vw_transport_cargo_custom_css .='.woocommerce ul.products li.product .onsale{';
			$vw_transport_cargo_custom_css .='left: -10px; right: auto;';
		$vw_transport_cargo_custom_css .='}';
	}else if($vw_transport_cargo_woocommerce_sale_position == 'right'){
		$vw_transport_cargo_custom_css .='.woocommerce ul.products li.product .onsale{';
			$vw_transport_cargo_custom_css .='left: auto; right: 0;';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_woocommerce_sale_font_size = get_theme_mod('vw_transport_cargo_woocommerce_sale_font_size');
	if($vw_transport_cargo_woocommerce_sale_font_size != false){
		$vw_transport_cargo_custom_css .='.woocommerce span.onsale{';
			$vw_transport_cargo_custom_css .='font-size: '.esc_attr($vw_transport_cargo_woocommerce_sale_font_size).';';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_woocommerce_sale_border_radius = get_theme_mod('vw_transport_cargo_woocommerce_sale_border_radius', 0);
	if($vw_transport_cargo_woocommerce_sale_border_radius != false){
		$vw_transport_cargo_custom_css .='.woocommerce span.onsale{';
			$vw_transport_cargo_custom_css .='border-radius: '.esc_attr($vw_transport_cargo_woocommerce_sale_border_radius).'px;';
		$vw_transport_cargo_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	// Site title Font Size
	$vw_transport_cargo_site_title_font_size = get_theme_mod('vw_transport_cargo_site_title_font_size');
	if($vw_transport_cargo_site_title_font_size != false){
		$vw_transport_cargo_custom_css .='.logo h1 a, .logo p.site-title a{';
			$vw_transport_cargo_custom_css .='font-size: '.esc_attr($vw_transport_cargo_site_title_font_size).';';
		$vw_transport_cargo_custom_css .='}';
	}

	// Site tagline Font Size
	$vw_transport_cargo_site_tagline_font_size = get_theme_mod('vw_transport_cargo_site_tagline_font_size');
	if($vw_transport_cargo_site_tagline_font_size != false){
		$vw_transport_cargo_custom_css .='.logo p.site-description{';
			$vw_transport_cargo_custom_css .='font-size: '.esc_attr($vw_transport_cargo_site_tagline_font_size).';';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_logo_padding = get_theme_mod('vw_transport_cargo_logo_padding');
	if($vw_transport_cargo_logo_padding != false){
		$vw_transport_cargo_custom_css .='.logo-inner{';
			$vw_transport_cargo_custom_css .='padding: '.esc_attr($vw_transport_cargo_logo_padding).';';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_logo_margin = get_theme_mod('vw_transport_cargo_logo_margin');
	if($vw_transport_cargo_logo_margin != false){
		$vw_transport_cargo_custom_css .='.logo-inner{';
			$vw_transport_cargo_custom_css .='margin: '.esc_attr($vw_transport_cargo_logo_margin).';';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_site_title_color = get_theme_mod('vw_transport_cargo_site_title_color');
	if($vw_transport_cargo_site_title_color != false){
		$vw_transport_cargo_custom_css .='p.site-title a{';
			$vw_transport_cargo_custom_css .='color: '.esc_attr($vw_transport_cargo_site_title_color).'!important;';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_site_tagline_color = get_theme_mod('vw_transport_cargo_site_tagline_color');
	if($vw_transport_cargo_site_tagline_color != false){
		$vw_transport_cargo_custom_css .='.logo p.site-description{';
			$vw_transport_cargo_custom_css .='color: '.esc_attr($vw_transport_cargo_site_tagline_color).';';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_logo_width = get_theme_mod('vw_transport_cargo_logo_width');
	if($vw_transport_cargo_logo_width != false){
		$vw_transport_cargo_custom_css .='.logo img{';
			$vw_transport_cargo_custom_css .='width: '.esc_attr($vw_transport_cargo_logo_width).';';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_logo_height = get_theme_mod('vw_transport_cargo_logo_height');
	if($vw_transport_cargo_logo_height != false){
		$vw_transport_cargo_custom_css .='.logo img{';
			$vw_transport_cargo_custom_css .='height: '.esc_attr($vw_transport_cargo_logo_height).';';
		$vw_transport_cargo_custom_css .='}';
	}

	// Woocommerce img

	$vw_transport_cargo_shop_featured_image_border_radius = get_theme_mod('vw_transport_cargo_shop_featured_image_border_radius', 0);
	if($vw_transport_cargo_shop_featured_image_border_radius != false){
		$vw_transport_cargo_custom_css .='.woocommerce ul.products li.product a img{';
			$vw_transport_cargo_custom_css .='border-radius: '.esc_attr($vw_transport_cargo_shop_featured_image_border_radius).'px;';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_shop_featured_image_box_shadow = get_theme_mod('vw_transport_cargo_shop_featured_image_box_shadow');
	if($vw_transport_cargo_shop_featured_image_box_shadow != false){
		$vw_transport_cargo_custom_css .='.woocommerce ul.products li.product a img{';
				$vw_transport_cargo_custom_css .='box-shadow: '.esc_attr($vw_transport_cargo_shop_featured_image_box_shadow).'px '.esc_attr($vw_transport_cargo_shop_featured_image_box_shadow).'px '.esc_attr($vw_transport_cargo_shop_featured_image_box_shadow).'px #ddd;';
		$vw_transport_cargo_custom_css .='}';
	}

	/*------------------ Preloader Background Color  -------------------*/

	$vw_transport_cargo_preloader_bg_color = get_theme_mod('vw_transport_cargo_preloader_bg_color');
	if($vw_transport_cargo_preloader_bg_color != false){
		$vw_transport_cargo_custom_css .='#preloader{';
			$vw_transport_cargo_custom_css .='background-color: '.esc_attr($vw_transport_cargo_preloader_bg_color).';';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_preloader_border_color = get_theme_mod('vw_transport_cargo_preloader_border_color');
	if($vw_transport_cargo_preloader_border_color != false){
		$vw_transport_cargo_custom_css .='.loader-line{';
			$vw_transport_cargo_custom_css .='border-color: '.esc_attr($vw_transport_cargo_preloader_border_color).'!important;';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_preloader_bg_img = get_theme_mod('vw_transport_cargo_preloader_bg_img');
	if($vw_transport_cargo_preloader_bg_img != false){
		$vw_transport_cargo_custom_css .='#preloader{';
			$vw_transport_cargo_custom_css .='background: url('.esc_attr($vw_transport_cargo_preloader_bg_img).');-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;';
		$vw_transport_cargo_custom_css .='}';
	}

	// Header Background Color

	$vw_transport_cargo_header_background_color = get_theme_mod('vw_transport_cargo_header_background_color');
	if($vw_transport_cargo_header_background_color != false){
		$vw_transport_cargo_custom_css .='.home-page-header{';
			$vw_transport_cargo_custom_css .='background-color: '.esc_attr($vw_transport_cargo_header_background_color).';';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_header_img_position = get_theme_mod('vw_transport_cargo_header_img_position','center top');
	if($vw_transport_cargo_header_img_position != false){
		$vw_transport_cargo_custom_css .='.main-header{';
			$vw_transport_cargo_custom_css .='background-position: '.esc_attr($vw_transport_cargo_header_img_position).'!important;';
		$vw_transport_cargo_custom_css .='}';
	}

	/*---------------------- Slider Image Overlay ------------------------*/

	$vw_transport_cargo_slider_image_overlay = get_theme_mod('vw_transport_cargo_slider_image_overlay', true);
	if($vw_transport_cargo_slider_image_overlay == false){
		$vw_transport_cargo_custom_css .='#slider img{';
			$vw_transport_cargo_custom_css .='opacity:1;';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_slider_image_overlay_color = get_theme_mod('vw_transport_cargo_slider_image_overlay_color', true);
	if($vw_transport_cargo_slider_image_overlay_color != false){
		$vw_transport_cargo_custom_css .='#slider{';
			$vw_transport_cargo_custom_css .='background-color: '.esc_attr($vw_transport_cargo_slider_image_overlay_color).';';
		$vw_transport_cargo_custom_css .='}';
	}