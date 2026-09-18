/*
** Scripts within the customizer controls window.
*/

(function( $ ) {
	wp.customize.bind( 'ready', function() {

	/*
	** Reusable Functions
	*/
		var optPrefix = '#customize-control-warehouse_cargo_options-';
		
		// Label
		function warehouse_cargo_customizer_label( id, title ) {

			// Colors

			if ( id === 'warehouse_cargo_theme_color' || id === 'background_color' || id === 'background_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-warehouse_cargo_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Site Identity

			if ( id === 'custom_logo' || id === 'site_icon' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-warehouse_cargo_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Top Header

			if ( id === 'warehouse_cargo_email_icon' ||  id === 'warehouse_cargo_phone_icon' ||  id === 'warehouse_cargo_location_icon' ||  id === 'warehouse_cargo_careers_icon' || id === 'warehouse_cargo_headerbtn_text' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-warehouse_cargo_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// General Setting

			if ( id === 'warehouse_cargo_preloader_hide' || id === 'warehouse_cargo_sticky_header' || id === 'warehouse_cargo_scroll_hide' || id === 'warehouse_cargo_scroll_top_position' || id === 'warehouse_cargo_woocommerce_shop_page_sidebar') {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-warehouse_cargo_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Social Icon

			if ( id === 'warehouse_cargo_facebook_url' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-warehouse_cargo_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Slider

			if ( id === 'warehouse_cargo_slider_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-warehouse_cargo_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Header Image

			if ( id === 'header_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-warehouse_cargo_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}
			
			// Latest Post

			if ( id === 'warehouse_cargo_home_contact_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-warehouse_cargo_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Contact Details 

			if ( id === 'warehouse_cargo_latest_post_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-warehouse_cargo_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}


			// Footer

			if ( id === 'warehouse_cargo_footer_text_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-warehouse_cargo_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Single Post Setting

			if ( id === 'warehouse_cargo_single_post_thumb' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-warehouse_cargo_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Post Setting

			if ( id === 'warehouse_cargo_post_page_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-warehouse_cargo_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Page Setting

			if ( id === 'warehouse_cargo_single_page_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-warehouse_cargo_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}
			
		}


	/*
	** Tabs
	*/

		// Colors
		warehouse_cargo_customizer_label( 'warehouse_cargo_theme_color', 'Theme Color' );
		warehouse_cargo_customizer_label( 'background_color', 'Colors' );
		warehouse_cargo_customizer_label( 'background_image', 'Image' );

		// Site Identity
		warehouse_cargo_customizer_label( 'custom_logo', 'Logo Setup' );
		warehouse_cargo_customizer_label( 'site_icon', 'Favicon' );

		// Top Header
		warehouse_cargo_customizer_label( 'warehouse_cargo_email_icon', 'Email' );
		warehouse_cargo_customizer_label( 'warehouse_cargo_phone_icon', 'Phone' );
		warehouse_cargo_customizer_label( 'warehouse_cargo_location_icon', 'Location' );
		warehouse_cargo_customizer_label( 'warehouse_cargo_careers_icon', 'Careers' );
		warehouse_cargo_customizer_label( 'warehouse_cargo_headerbtn_text', 'Button' );

		// General Setting
		warehouse_cargo_customizer_label( 'warehouse_cargo_preloader_hide', 'Preloader' );
		warehouse_cargo_customizer_label( 'warehouse_cargo_sticky_header', 'Sticky Header' );
		warehouse_cargo_customizer_label( 'warehouse_cargo_scroll_hide', 'Scroll To Top' );
		warehouse_cargo_customizer_label( 'warehouse_cargo_scroll_top_position', 'Scroll to top Position' );
		warehouse_cargo_customizer_label( 'warehouse_cargo_woocommerce_shop_page_sidebar', 'Woocommerce Settings' );

		// Social Icon
		warehouse_cargo_customizer_label( 'warehouse_cargo_facebook_url', 'Social Links' );

		//Slider
		warehouse_cargo_customizer_label( 'warehouse_cargo_slider_setting', 'Slider' );

		//Header Image
		warehouse_cargo_customizer_label( 'header_image', 'Header Image' );

		//Contact Details 
		warehouse_cargo_customizer_label( 'warehouse_cargo_home_contact_setting', 'Contact Details ' );

		//Latest Post
		warehouse_cargo_customizer_label( 'warehouse_cargo_latest_post_setting', 'Latest Post' );

		//Footer
		warehouse_cargo_customizer_label( 'warehouse_cargo_footer_text_setting', 'Footer' );

		//Single Post Setting
		warehouse_cargo_customizer_label( 'warehouse_cargo_single_post_thumb', 'Single Post Setting' );

		// Post Setting
		warehouse_cargo_customizer_label( 'warehouse_cargo_post_page_title', 'Post Setting' );

		// Page Setting
		warehouse_cargo_customizer_label( 'warehouse_cargo_single_page_title', 'Page Setting' );
	

	}); // wp.customize ready

})( jQuery );
